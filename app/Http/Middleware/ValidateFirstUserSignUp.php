<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;//namespace    

class ValidateFirstUserSignUp
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
        $usersCount = User::count();//eloquent
        if($usersCount > 0 && !Auth::check()) {
            return redirect('/');//nos permite crear el primer usuario  
        }
        return $next($request);//redireccionamiento
    }
}
