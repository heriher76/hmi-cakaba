<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use DB;

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
        // Fetch the Site Settings object
        view()->composer('*', function(View $view) {
            $social = DB::table('social_media')->first();
            $categories = DB::table('news_categories')->get();

            $view->with('social', $social);
            $view->with('categories', $categories);
        });
    }
}
