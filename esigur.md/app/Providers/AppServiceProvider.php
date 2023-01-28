<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;

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
      \View::composer(['*','*.create','*.edit','*.index','*.show'], function ($view) {
         $lang = \App::getLocale();
         $locales = \LaravelLocalization::getLocalesOrder();
         $about = \App\Models\About::first();
         $slider = \App\Models\Slider::first();
         $app_services_all = \App\Models\Service::all();

         $view->with([
           'lang' => $lang,
           'locales' => $locales,
           'about' => $about,
           'slider' => $slider,
           'app_services_all' => $app_services_all
         ]);
       });
    }
}
