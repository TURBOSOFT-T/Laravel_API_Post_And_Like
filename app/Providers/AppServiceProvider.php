<?php


namespace App\Providers;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    protected $namespace = 'App\\Http\\Controllers';
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
        

       // View::composer(['index', 'create', 'edit'], function ($view) {
       //     $view->with('categories', Category::all());
       // });
    }
}
