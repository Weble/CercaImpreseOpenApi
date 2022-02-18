# Laravel Package for OpenAPI.it Cerca Imprese Integration

[![Latest Version on Packagist](https://img.shields.io/packagist/v/weble/cercaimprese.svg?style=flat-square)](https://packagist.org/packages/weble/cercaimprese)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/weble/cercaimprese/run-tests?label=tests)](https://github.com/weble/cercaimprese/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/weble/cercaimprese/Check%20&%20fix%20styling?label=code%20style)](https://github.com/weble/cercaimprese/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/weble/cercaimprese.svg?style=flat-square)](https://packagist.org/packages/weble/cercaimprese)

With this laravel package you can interact with the [Cerca Imprese OpenAPI](https://openapi.it/business-information/cerca-azienda). 

It's built on top of the amazing [Saloon Package](https://github.com/Sammyjo20/Saloon) and requires PHP8.

## Installation

You can install the package via composer:

```bash
composer require weble/cercaimprese
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="cercaimprese-config"
```

This is the contents of the published config file:

```php
return [
    'token' => env('CERCAIMPRESE_TOKEN', ''),
    'test' => env('CERCAIMPRESE_TEST', true)
];
```


## Usage

You can use directly the Facade to interact with the package:

### Base Request

Result is a Laravel Collection of the data of the company requested

```php
$result = \Weble\CercaImprese\Facades\CercaImprese::base(search: '[PIVA_OR_CF_OR_ID]');
```

### Advanced Request
The result is a Laravel Collection of the resulting list of companies.

You can search by anoyone of the parameters, or all of them together in any combination (thanks php8 named parameters!).

```php 
$result = \Weble\CercaImprese\Facades\CercaImprese::advanced( 
    denominazione: $denominazione,
    provincia: $provincia,
    codice_ateco: $codice_ateco,
    fatturato_min: $fatturato_min,
    fatturato_max: $fatturato_max,
    dipendenti_min: $dipendenti_min,
    dipendenti_max: $dipendenti_max,
    limite: $limite,
    dry_run: $dry_run
);
```

## Testing

You need either an env variable set for `CERCAIMPRESE_TOKEN` or a `.env` file with the same variable set.

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Daniele Rosario](https://github.com/Skullbock)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
