<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('default.offer.home', 'App\Http\Controllers\OfferController@Home');
        View::composer('default.realization.home', 'App\Http\Controllers\RealizationController@Home');
    }
}
