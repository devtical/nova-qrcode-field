# Nova QR Code

[![Latest Version on Packagist](https://img.shields.io/packagist/v/devtical/nova-qrcode-field.svg?style=flat-square)](https://packagist.org/packages/devtical/laravel-drunk-on-419)
[![Total Downloads](https://img.shields.io/packagist/dt/devtical/nova-qrcode-field.svg?style=flat-square)](https://packagist.org/packages/devtical/laravel-drunk-on-419)

A Laravel Nova field to generate QR Code.

![Logo & background](art/cover.png)

## Installation

You can install the Nova field in to a [Laravel](http://laravel.com) app that uses [Nova](http://nova.laravel.com) via composer :

```cli
composer require devtical/nova-qrcode-field
```

## Usage

```
use Devtical\Qrcode\Qrcode;
```

#### Basic QR Code

To create a basic QR code with default settings:

```php
Qrcode::make('QR Code', 'field')
```

#### Setting QR Code Sizes

Specify the sizes for index and detail views:

```php
Qrcode::make('QR Code', 'field')
    ->indexSize(100)     // QR size for index view
    ->detailSize(500)    // QR size for detail view
```

![Size](art/1-size.png)

### Margin Customization

Control the padding around the QR code for optimal appearance:

```php
Qrcode::make('QR Code', 'field')
    ->margin(10)
```

The margin value for the QR code adjusts based on its size: if the size is greater than `250`, it uses the margin value specified in `->margin()`, otherwise it defaults to a margin value of `1`.

### Adding a Logo

Add a logo to the center of the QR code:

```php
Qrcode::make('QR Code', 'field')
    ->logo('http://source.to/logo.png')
```

![Logo](art/2-logo.png)

### Setting a Background Image

Set a background image for the QR code:

```php
Qrcode::make('QR Code', 'field')
    ->background('http://source.to/background.png')
```

![Background](art/3-background.png)

### Combining Logo & Background

Include both a logo and a background image for the QR code:

```php
Qrcode::make('QR Code', 'field')
    ->logo('http://source.to/logo.png')
    ->background('http://source.to/background.png')
```

![Logo & background](art/4-logo-background.png)

## Related

- [Nova QR Code Manager](https://github.com/Devtical/nova-qrcode-manager)

## Credits

- [vue-qr](https://github.com/Binaryify/vue-qr)
- [Awesome-qr.js](https://github.com/SumiMakito/Awesome-qr.js)

## License

The MIT License (MIT).
