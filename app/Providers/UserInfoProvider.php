<?php

namespace App\Providers;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Services\Contracts\UserInfoContract;
use App\Services\UserInfoHtml;
use App\Services\UserInfoJson;
use Illuminate\Support\ServiceProvider;

class UserInfoProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(HomeController::class)
            ->needs(UserInfoContract::class)
            ->give(function() {
                return $this->app->make(UserInfoHtml::class);
            });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
