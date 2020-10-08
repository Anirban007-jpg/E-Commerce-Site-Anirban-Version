<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Test
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            return $next($request);
//            if (Auth::user()->usertype=='Admin'){
//                return redirect()->route('hr.dashboard');
//            }elseif (Auth::user()->usertype=='User'){
//                return redirect()->route('accounts.dashboard');
//            }
        }
        else{
            return redirect('/login');
        }
    }
}
