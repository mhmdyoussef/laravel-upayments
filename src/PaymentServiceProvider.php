<?php

namespace Mydevpro\Upayments;

use Illuminate\Support\ServiceProvider;
use Mydevpro\Upayments\Facades\Upayments;

class PaymentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Publish configuration file
        $this->publishes([
            __DIR__ . '/../config/upayments.php' => config_path('upayments.php'),
        ], 'upayments-config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/upayments.php', 'upayments'
        );
        $this->app->bind(Upayments::class, function ($app) {
            return new \Mydevpro\Upayments\Upayments();
        });
    }
}
