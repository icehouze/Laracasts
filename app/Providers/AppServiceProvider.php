<?php

namespace App\Providers;

use App\Billing\Stripe;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // register a view composer with the view helper function
        // we can hook into when any view is loaded
        // listen for when layouts.sidebar is loaded and then register a callback function where we can bind anything to that view
        view()->composer('layouts.sidebar', function ($view) {
            $view->with('archives', \App\Post::archives());
        });
    }

    /**
     * Register any application services. 
       Use this method to register things into the service container

     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Stripe::class, function () {
            // config('name of the config file.name of the service.key of the credential')
            return new Stripe(config('services.stripe.secret'));
        });
    }
}
