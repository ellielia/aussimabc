<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class JournalistMiddleware
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
        if (Auth::check() && Auth::user()->journalist == true || Auth::user()->administrator == true) {
            return $next($request);
        } else {
            abort(403);
        }
    }
}
