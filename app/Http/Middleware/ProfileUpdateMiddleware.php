<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ProfileUpdateMiddleware
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
        //return $next($request);

            if(Auth::check() && Auth::user()->profile_updated === false){
                return redirect('/profile')->with('error', 'Please Update Your Profile');
            }
           return $next($request);


        //return redirect()->back();
    }
}
