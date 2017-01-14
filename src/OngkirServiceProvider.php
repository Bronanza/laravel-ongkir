<?php namespace Bronanza\LaravelOngkir;

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
            __DIR__.'/../config/ongkir.php' =>  config_path('ongkir.php'),
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
            __DIR__.'/../config/ongkir.php', 'ongkir'
        );
    }
}