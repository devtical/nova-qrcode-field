<?php

namespace Devtical\Qrcode\Tests;

use Devtical\Qrcode\Qrcode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class QrcodeTest extends TestCase
{
    public function test_it_serializes_default_meta(): void
    {
        $field = Qrcode::make('QR Code', 'code');

        $field->resolve($this->resource(['code' => 'ABC-123']));

        $data = $field->jsonSerialize();

        $this->assertSame('qrcode', $data['component']);
        $this->assertSame('ABC-123', $data['value']);
        $this->assertFalse($data['hidden']);
        $this->assertSame(5, $data['margin']);
        $this->assertSame(100, $data['indexSize']);
        $this->assertSame(300, $data['detailSize']);
    }

    public function test_size_and_margin_can_be_customized(): void
    {
        $data = Qrcode::make('QR Code', 'code')
            ->indexSize(50)
            ->detailSize(500)
            ->margin(10)
            ->jsonSerialize();

        $this->assertSame(50, $data['indexSize']);
        $this->assertSame(500, $data['detailSize']);
        $this->assertSame(10, $data['margin']);
    }

    public function test_hide_when_hides_field_and_value_when_condition_is_met(): void
    {
        $field = Qrcode::make('QR Code', 'code')
            ->hideWhen(fn ($resource) => $resource->status === 0);

        $field->resolve($this->resource(['code' => 'SECRET', 'status' => 0]));

        $data = $field->jsonSerialize();

        $this->assertTrue($data['hidden']);
        $this->assertNull($data['value']);
    }

    public function test_hide_when_shows_field_when_condition_is_not_met(): void
    {
        $field = Qrcode::make('QR Code', 'code')
            ->hideWhen(fn ($resource) => $resource->status === 0);

        $field->resolve($this->resource(['code' => 'VISIBLE', 'status' => 1]));

        $data = $field->jsonSerialize();

        $this->assertFalse($data['hidden']);
        $this->assertSame('VISIBLE', $data['value']);
    }

    public function test_hidden_meta_is_json_encodable_as_boolean(): void
    {
        $field = Qrcode::make('QR Code', 'code')
            ->hideWhen(fn () => false);

        $field->resolve($this->resource(['code' => 'X']));

        $this->assertStringContainsString('"hidden":false', json_encode($field));
    }

    public function test_invalid_image_urls_are_ignored(): void
    {
        $data = Qrcode::make('QR Code', 'code')
            ->logo('not-a-url')
            ->background(null)
            ->jsonSerialize();

        $this->assertFalse($data['logo']);
        $this->assertFalse($data['background']);
    }

    public function test_images_are_embedded_as_data_uri_and_cached(): void
    {
        $path = tempnam(sys_get_temp_dir(), 'qr');
        file_put_contents($path, base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII='));
        $url = "file://{$path}";

        $data = Qrcode::make('QR Code', 'code')->logo($url)->jsonSerialize();

        $this->assertStringStartsWith('data:image/png;base64,', $data['logo']);
        $this->assertSame($data['logo'], Cache::get('qr-img-'.md5($url)));

        unlink($path);
    }

    public function test_failed_image_downloads_are_not_cached(): void
    {
        $url = 'file:///non/existent/image.png';

        $data = Qrcode::make('QR Code', 'code')->logo($url)->jsonSerialize();

        $this->assertFalse($data['logo']);
        $this->assertFalse(Cache::has('qr-img-'.md5($url)));
    }

    private function resource(array $attributes): Model
    {
        return (new class extends Model
        {
            protected $guarded = [];
        })->forceFill($attributes);
    }
}
