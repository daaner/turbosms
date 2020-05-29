# Laravel TurboSMS API gateway http://turbosms.ua

Send SMS and Viber message via TurboSMS ([turbosms.ua](https://turbosms.ua/)) using this Laravel framework package ([Laravel](https://laravel.com)).


#### Laravel > 7, PHP >= 7.2.5


## Installation

Require this package with composer.

``` bash
composer require daaner/turbosms
```

If you don't use auto-discovery, add the ServiceProvider to the providers array in `config/app.php`

```php
Daaner\TurboSMS\TurboSMSServiceProvider::class,
```

Add the `TurboSMS` facade to your facades array:

```php
'TurboSMS' => Daaner\TurboSMS\Facades\TurboSMS::class,
```

Copy the package config to your local config with the publish command:
``` bash
php artisan vendor:publish --provider="Daaner\TurboSMS\TurboSMSServiceProvider"
```

## Configuration

Once you have published the configuration files, please edit the config file in `config/turbosms.php`.

- Create an account on [turbosms.ua](https://turbosms.ua)
- Add your project, copy the `HTTP API`, params and paste into `config/turbosms.php`
- After the configuration has been published, edit `config/turbosms.php`


## Usage



## Example



## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Daan](https://github.com/daaner)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
