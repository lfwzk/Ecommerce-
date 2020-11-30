<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
          Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      
      View::composer('*',function($view){
       $sessionName = 'shopping_cart_id';
      $shopping_cart_id = \Session::get($sessionName);

      $shopping_cart = ShoppingCart::findOrCreateById($shopping_cart_id);
      \Session::put($sessionName, $shopping_cart->id); 

      $view-> with('productsCount', $shopping_cart->productsCount());
      });

      /*$sessionName = 'shopping_cart_id';//1

        $shopping_cart_id = $request->session()->get($sessionName);

        $shopping_cart  = ShoppingCart::findOrCreateById($shopping_cart_id);
        //session($sessionName);
      

        $request->session()->put($sessionName, $shopping_cart->id);*/
    }
}
