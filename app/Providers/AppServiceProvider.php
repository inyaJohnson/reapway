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
        View::composer(['admin.*', 'layouts.statistics.', 'search.*', 'deposit.*', 'withdrawal.*', 'package.*', 'users.*', 'help.*'], 'App\Http\View\Composers\AdminData');
        View::composer(['home'], 'App\Http\View\Composers\UserData');
        View::composer([ 'investment.*','users.*','home', 'transaction.*', 'admin.*'], 'App\Http\View\Composers\HashIds');
    }
}
