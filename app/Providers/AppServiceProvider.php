<?php

namespace App\Providers;

use App\Services\Contracts\UserInfoContract;
use App\Services\Translate;
use App\Services\UserInfoJson;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    // $this->app->bind(UserInfoContract::class, UserInfoJson::class);
    public $bindings = [
        UserInfoContract::class => UserInfoJson::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Translate::class, function() {
           return new Translate(config('app.locale'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
    }
}
