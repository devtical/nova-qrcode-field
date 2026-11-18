<?php

namespace Devtical\Qrcode\Tests;

use Devtical\Qrcode\FieldServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            FieldServiceProvider::class,
        ];
    }
}
