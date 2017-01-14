# laravel-ongkir

Laravel ongkir provide the use of raja ongkir API in Laravel 5.

## Contents

- [Installation](#installation)
- [Usage](#usage)

## Installation

1) To install laravel-ongkir, add the following code to composer.json. Then run `composer update`:
```json
"bronanza/laravel-ongkir": "dev-master"
```

2) Open your `config/app.php` and add the following code to provider:
```php
Bronanza\LaravelOngkir\OngkirServiceProvider::class,
```

3) Run the command below to publish package config file `config/ongkir.php`
```shell
php artisan vendor:publish
```

4) You can fill `api key` for laravel ongkir in `config/ongkir.php`
```php
<?php

return [
    'api' => 'http://api.rajaongkir.com/starter',
    'apiKey' => '12kasjdaksdqpwepqwoepqwoe',
    'originCityId' => 151, // Jakarta Barat Based on RajaOngkir API
    'couriers' => [
        'jne'  => 'JNE',
        'tiki' => 'TIKI'
    ]
];
```
## Usage

1) Add the following code in your class file:
```php
use Bronanza\LaravelOngkir\Ongkir;
```

2) 