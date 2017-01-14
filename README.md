# Laravel-Ongkir

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

2) Now you can use Laravel-Ongkir:
```php
<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Bronanza\LaravelOngkir\Ongkir;

class TestController extends Controller
{
    private $laravelOngkir;

    public function __construct(Ongkir $ongkir)
    {
        $this->laravelOngkir = $ongkir;
    }

    public function getAllAvailableProvinces()
    {
        return $this->laravelOngkir->getAllAvailableProvinces();
    }

    public function getAllAvailableCities()
    {
        return $this->laravelOngkir->getAllAvailableCities();
    }

    public function getAvailableCities()
    {
        return $this->laravelOngkir->getAvailableCities("5");
    }

    public function getCosts()
    {
        return $this->laravelOngkir->getCosts("501", "114", 1700, "jne");
    }
}
```
#### Explanation
1) `getAllAvailableProvinces()` &mdash; use this method to get all available provinces in Indonesia.
2) `getAllAvailableCities()` &mdash; use this method to get all available cities in Indonesia.3) 
3) `getAvailableCities()` &mdash; use this method to get available cities for the given province code. This method need 1 paramater:
- `string` province id - Province ID in Indonesia
4) getCosts()` &mdash; use this method to get shipment cost based on weight and location. This method need 4 parameter:
- `string` origin id - City origin
- `string` rajaongkir city id - City destination
- `int` weight - Shipment weight in gram
- `string` courier - The available courier code: `jne`, `pos`, `tiki`.
