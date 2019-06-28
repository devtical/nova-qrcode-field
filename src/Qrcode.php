<?php

namespace Kristories\Qrcode;

use Cache;
use Laravel\Nova\Fields\Field;

class Qrcode extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'qrcode';
    
    
    public function __construct()
    {
        $this->exceptOnForms();
    }

    public function text($text = null)
    {
        return $this->withMeta(['text' => $text]);
    }

    public function background($background = null)
    {

        return $this->withMeta(['background' => $this->_renderImage($background)]);
    }

    public function logo($logo = null)
    {
        return $this->withMeta(['logo' => $this->_renderImage($logo)]);
    }

    protected function _renderImage($url = null)
    {
        if ($url and curl_init($url)) {
            $image = Cache::rememberForever('qr-img-' . md5($url), function () use ($url) {
                $image     = file_get_contents($url);
                $file_info = new \finfo(FILEINFO_MIME_TYPE);
                $mime_type = $file_info->buffer($image);

                return 'data: ' . $mime_type . ';base64,' . base64_encode(file_get_contents($url));
            });

            return $image;
        }

        return false;
    }
}
