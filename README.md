# laravel-ongkir

## Installation

1) To install laravel-ongkir, add the following code to composer.json. Then run `composer update`:
```
"bronanza/laravel-ongkir": "dev-master"
```

2) Open your `config/app.php` and add the following code to provider:
```
Bronanza\LaravelOngkir\OngkirServiceProvider::class,
```

3) Run the command below to publish package config file `config/ongkir.php`
```
php artisan vendor:publish
```

4) You can fill `api key` for raja ongkir in `config/ongkir.php`
```
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
