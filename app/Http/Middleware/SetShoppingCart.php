<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Model\ShoppingCart; 

class SetShoppingCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      $sessionName = 'shopping_cart_id';
      $shopping_cart_id = \Session::get($sessionName);

      $shopping_cart = ShoppingCart::findOrCreateById($shopping_cart_id);

      \Session::put($sessionName, $shopping_cart->id); 

      $request->shopping_cart = $shopping_cart;

        return $next($request);
    }
}
