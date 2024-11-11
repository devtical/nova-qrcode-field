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
     * Constructor for the Qrcode field.
     *
     * @param  mixed  ...$attributes
     */
    public function __construct(...$attributes)
    {
        parent::__construct(...$attributes);

        $this->exceptOnForms()
            ->margin(5)
            ->indexSize(100)
            ->detailSize(300);
    }

    /**
     * Set the background image for the QR code.
     *
     * @return $this
     */
    public function background(?string $background = null)
    {
        return $this->withMeta(['background' => $this->renderImage($background)]);
    }

    /**
     * Set the logo image for the QR code.
     *
     * @return $this
     */
    public function logo(?string $logo = null)
    {
        return $this->withMeta(['logo' => $this->renderImage($logo)]);
    }

    /**
     * Set the size of the QR code for index view.
     *
     * @return $this
     */
    public function indexSize(int $size)
    {
        return $this->withMeta(['indexSize' => $size]);
    }

    /**
     * Set the size of the QR code for detail view.
     *
     * @return $this
     */
    public function detailSize(int $size)
    {
        return $this->withMeta(['detailSize' => $size]);
    }

    /**
     * Set the margin for the QR code.
     *
     * @return $this
     */
    public function margin(int $size)
    {
        return $this->withMeta(['margin' => $size]);
    }

    /**
     * Render the image as a base64 encoded data URI.
     *
     * @return string|false
     */
    protected function renderImage(?string $url = null)
    {
        if ($url && filter_var($url, FILTER_VALIDATE_URL)) {
            return Cache::rememberForever('qr-img-'.md5($url), function () use ($url) {
                $image = @file_get_contents($url);
                if ($image === false) {
                    return false;
                }

                $fileInfo = new \finfo(FILEINFO_MIME_TYPE);
                $mimeType = $fileInfo->buffer($image);

                return 'data:'.$mimeType.';base64,'.base64_encode($image);
            });
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): array
    {
        return array_merge(parent::jsonSerialize(), [
            'value' => (string) $this->value,
        ]);
    }
}
