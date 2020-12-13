# Nova QR Code

A Laravel Nova field to generate QR Code.

## Installation

You can install the Nova field in to a [Laravel](http://laravel.com) app that uses [Nova](http://nova.laravel.com) via composer :

```cli
composer require kristories/nova-qrcode-field
```

## Usage

#### Basic

```php
Qrcode::make('QR Code')
    ->text('http://laravel.com')
```

![Basic](https://i.imgur.com/V15fjwl.png)

#### Setting sizes

```php
Qrcode::make('QR Code')
    ->text('http://laravel.com')
    ->indexSize(100)
    ->detailSize(500)
```


#### With logo

```php
Qrcode::make('QR Code')
    ->text('http://laravel.com')
    ->logo('http://source.to/logo.png')
```

![Logo](https://i.imgur.com/YFlAvo3.png)

#### With background

```php
Qrcode::make('QR Code')
    ->text('http://laravel.com')
    ->background('http://source.to/background.png')
```

![Background](https://i.imgur.com/nAbuKCc.png)

#### With logo & background

```php
Qrcode::make('QR Code')
    ->text('http://laravel.com')
    ->logo('http://source.to/logo.png')
    ->background('http://source.to/background.png')
```

![Logo & background](https://i.imgur.com/ppVi4jn.png)

## Related

- [Nova QR Code Manager](https://github.com/Kristories/nova-qrcode-manager)

## Credits

- [vue-qr](https://github.com/Binaryify/vue-qr)
- [Awesome-qr.js](https://github.com/SumiMakito/Awesome-qr.js)

## License

The MIT License (MIT).
