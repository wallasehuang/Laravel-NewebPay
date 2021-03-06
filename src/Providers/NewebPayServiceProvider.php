<?php

namespace Treerful\NewebPay\Providers;

use Illuminate\Support\ServiceProvider;
use Treerful\Pay2go\NewebPay;

class NewebPayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(NewebPay::class, function($app) {
            $config = $app['config']['newebpay'];

            return new NewebPay($config['MerchantID'], $config['HashKey'], $config['HashIV']);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/newebpay.php' => config_path('newebpay.php'),
        ]);
    }
}
