<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MyCustomProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            'App\Providers\DeliveryEstimatorInterface',
            'App\Providers\DeliveryEstimator'
        );
    }
}