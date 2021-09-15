<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MustBeAdministrator
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
        // auth()->user()?->username !== 'JeffreyWay' // PHP 8
        if (auth()->guest()) {
            abort(403);
            // abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
