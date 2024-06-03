<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        //

        View::composer('*', function($view) {

            //for all products
            $products = Products::orderBy('created_at', 'desc')->paginate(10);
            $view->with('products', $products);

            // category links used in the home page header
            $categoryLinks = Category::all();
            $view->with('categoryLinks', $categoryLinks);
        
        });
    }
}
