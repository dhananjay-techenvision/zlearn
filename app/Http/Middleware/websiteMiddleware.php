<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class websiteMiddleware
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
        // return $next($request);
        if (Auth::user() &&  Auth::user()->user_type == 2) {
            return $next($request);
        }
        return redirect('/');
    }
}
