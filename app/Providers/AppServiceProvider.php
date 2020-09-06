<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;

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
        Builder::defaultStringLength(191); // Update defaultStringLength
        View::composer(['general-report.index', 'users.*', 'admin.*'], 'App\Http\View\Composers\Data');
        View::composer(['referral.*', 'admin.*', 'activation.*', 'users.*','home', 'transaction.*', 'report.*'], 'App\Http\View\Composers\HashIds');
        View::composer(['admin.*'], 'App\Http\View\Composers\Admin');
    }
}
