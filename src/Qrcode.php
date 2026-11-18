<?php

namespace Devtical\Qrcode;

use Closure;
use finfo;
use Illuminate\Support\Facades\Cache;
use Laravel\Nova\Fields\Field;

class Qrcode extends Field
{
    public $component = 'qrcode';

    protected ?Closure $hideCallback = null;

    public function __construct(...$attributes)
    {
        parent::__construct(...$attributes);

        $this->exceptOnForms()
            ->margin(5)
            ->indexSize(100)
            ->detailSize(300);
    }

    public function background(?string $background = null): static
    {
        return $this->withMeta(['background' => $this->renderImage($background)]);
    }

    public function logo(?string $logo = null): static
    {
        return $this->withMeta(['logo' => $this->renderImage($logo)]);
    }

    public function indexSize(int $size): static
    {
        return $this->withMeta(['indexSize' => $size]);
    }

    public function detailSize(int $size): static
    {
        return $this->withMeta(['detailSize' => $size]);
    }

    public function margin(int $size): static
    {
        return $this->withMeta(['margin' => $size]);
    }

    public function hideWhen(callable $callback): static
    {
        $this->hideCallback = Closure::fromCallable($callback);

        return $this;
    }

    public function isHidden(): bool
    {
        if (! $this->hideCallback) {
            return false;
        }

        if (! $this->resource) {
            return false;
        }

        return (bool) call_user_func($this->hideCallback, $this->resource);
    }

    public function jsonSerialize(): array
    {
        $hidden = $this->isHidden();

        return array_merge(parent::jsonSerialize(), [
            'hidden' => $hidden,
            'value' => $hidden ? null : (string) $this->value,
        ]);
    }

    protected function renderImage(?string $url = null): string|false
    {
        if (! $url) {
            return false;
        }

        if (! filter_var($url, FILTER_VALIDATE_URL)) {
            return false;
        }

        $cacheKey = 'qr-img-'.md5($url);

        if ($cached = Cache::get($cacheKey)) {
            return $cached;
        }

        $image = @file_get_contents($url);

        if ($image === false) {
            return false;
        }

        $mimeType = (new finfo(FILEINFO_MIME_TYPE))->buffer($image);

        $dataUri = "data:{$mimeType};base64,".base64_encode($image);

        Cache::forever($cacheKey, $dataUri);

        return $dataUri;
    }
}
