<?php

namespace Bronanza\Ongkir;

use Illuminate\Support\ServiceProvider;

class OngkirServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerOngkir();
    }

    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerOngkir()
    {

    }
}