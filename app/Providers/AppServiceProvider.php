<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Users\Entities\User;
use App\Models\Users\Repositories\UserRepository;

use App\Models\Instadeals\Entities\Instadeal;
use App\Models\Instadeals\Repositories\InstadealRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, function ($app)
        {
            return new UserRepository(
                $app['em'],
                $app['em']->getClassMetaData(User::class)
            );
        });

        $this->app->bind(InstadealRepository::class, function ($app)
        {
            return new InstadealRepository(
                $app['em'],
                $app['em']->getClassMetaData(Instadeal::class)
            );
        });
    }
}
