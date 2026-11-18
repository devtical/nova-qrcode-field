<?php

namespace Devtical\Qrcode;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FieldServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('qrcode', __DIR__.'/../dist/js/field.js');
            Nova::style('qrcode', __DIR__.'/../dist/css/field.css');
        });
    }
}
