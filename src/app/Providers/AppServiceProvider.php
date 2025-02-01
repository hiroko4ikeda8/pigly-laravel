<?php

namespace App\Providers;

use Laravel\Fortify\Fortify;
use App\Actions\Fortify\AuthenticateUser;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::loginView(function () {
            return view('auth.login'); // Fortify にログイン画面を設定
        });
    }
}
