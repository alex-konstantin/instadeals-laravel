<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\InstadealData;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        parent::register();

        $this->app->singleton('instadealData', function()
        {
            return new InstadealData();
        });
    }
}
