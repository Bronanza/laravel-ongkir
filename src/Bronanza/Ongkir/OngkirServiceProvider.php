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
        $this->publishes([
            __DIR__.'/../../config/raja-ongkir.php' =>  config_path('raja-ongkir.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/raja-ongkir.php', 'raja-ongkir'
        );
    }
}