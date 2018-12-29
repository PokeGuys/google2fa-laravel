<?php

namespace PragmaRX\Google2FALaravel;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class LumenServiceProvider extends IlluminateServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('pragmarx.google2fa', function ($app) {
            return $app->make(Google2FA::class);
        });

        $this->app->configure('google2fa');

        $path = realpath(__DIR__ . '/../../config.php');
        $this->mergeConfigFrom(__DIR__ . '/config/config.php', 'google2fa');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['pragmarx.google2fa'];
    }
}
