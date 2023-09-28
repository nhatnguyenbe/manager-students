<?php

namespace App\Providers;

use App\View\Components\Alert;
use App\View\Components\Alerts;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
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
        Blade::component("alerts", Alerts::class);
        Paginator::useBootstrap();
    }
}
