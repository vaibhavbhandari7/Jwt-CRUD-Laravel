<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($user = Auth::user()){
            if (Auth::user()->userType != 1) 
                return redirect('/admin')->with('error','Not a Valid User');
        }else{
            return redirect('/admin')->with('error','Login FIrst');
        }

        return $next($request);
    }
}
