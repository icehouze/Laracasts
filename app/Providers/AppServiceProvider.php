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
            $archives = \App\Post::archives();
            // give me just the tags that have posts associated with them
            $tags = \App\Tag::has('posts')->pluck('name');

            $view->with(compact('archives', 'tags'));

            // refactored above
            // $view->with('archives', \App\Post::archives());
            // $view->with('tags', \App\Tag::has('posts')->pluck('name'));

            // give me all of the tags
            // $view->with('tags', \App\Tag::pluck('name'));
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
