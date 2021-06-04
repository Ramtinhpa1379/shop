<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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


        /*view()->share('categories',Category::query()->where("category_id",null)->get());
        view()->share('brands',Brand::all());
*/
        \view()->composer(['client.products.show','client.home','client.layout.master','client.categories.index'],function ($view){
            $view->with([
                'categories'=>Category::query()->where("category_id",null)->get(),
                'brands'=>Brand::all()
            ]);
        });


    }
}
