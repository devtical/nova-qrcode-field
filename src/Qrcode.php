<?php

namespace Devtical\Qrcode;

use Illuminate\Support\Facades\Cache;
use Laravel\Nova\Fields\Field;

class Qrcode extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'qrcode';

    /**
     * @param  mixed  ...$attributes
     */
    public function __construct(...$attributes)
    {
        parent::__construct(...$attributes);

        $this
            ->exceptOnForms()
            ->margin(0)
            ->indexSize(50)
            ->detailSize(200);
    }

    public function background($background = null)
    {
        return $this->withMeta(['background' => $this->_renderImage($background)]);
    }

    public function logo($logo = null)
    {
        return $this->withMeta(['logo' => $this->_renderImage($logo)]);
    }

    public function indexSize(int $size)
    {
        return $this->withMeta(['indexSize' => $size]);
    }

    public function detailSize(int $size)
    {
        return $this->withMeta(['detailSize' => $size]);
    }

    public function margin(int $size)
    {
        return $this->withMeta(['margin' => $size]);
    }

    protected function _renderImage($url = null)
    {
        if ($url and curl_init($url)) {
            $image = Cache::rememberForever('qr-img-' . md5($url), function () use ($url) {
                $image = file_get_contents($url);
                $file_info = new \finfo(FILEINFO_MIME_TYPE);
                $mime_type = $file_info->buffer($image);

                return 'data: ' . $mime_type . ';base64,' . base64_encode(file_get_contents($url));
            });

            return $image;
        }

        return false;
    }

    /**
     * @inheritdoc
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return array_merge(parent::jsonSerialize(), [
            'value' => (string) $this->value,
        ]);
    }
}
