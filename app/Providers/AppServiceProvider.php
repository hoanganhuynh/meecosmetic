<?php

namespace App\Providers;

use App\brand;
use App\type_product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $brands = brand::all();
        $type_products = type_product::all();
        View::share('areas',$brands);
        View::share('categories',$type_products);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
