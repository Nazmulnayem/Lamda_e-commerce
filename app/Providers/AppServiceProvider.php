<?php

namespace App\Providers;
use View;
use Illuminate\Support\ServiceProvider;
use App\Category;
use App\SubCategory;

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
        View::share('name','lamda tech');

        View::composer('FrontEnd.includes.menu',function($view){
            $view->with('categories',Category::where('publication_status',1)->get());
        });
        View::composer('FrontEnd.Category.category-product',function($view){
            $view->with('subcategories',SubCategory::where('publication_status',1)->get());
        });
    }
}
