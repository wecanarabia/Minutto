<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        if (Auth::guard('user')) {
            Config::set('app.timezone',Auth::guard('user')->user()->branch->company->timezone);
        }

        if (Auth::guard('company')) {
            Config::set('app.timezone',Auth::guard('company')->user()->branch->company->timezone);
        }
    }
}
