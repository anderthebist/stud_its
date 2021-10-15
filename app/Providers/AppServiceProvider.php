<?php

namespace App\Providers;

use App\Models\Header;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::composer(["layout.header"], function($view){
            $view->with(["header" => Header:: where("route",request()->route()->uri)->first()]);
        });
    }
}
