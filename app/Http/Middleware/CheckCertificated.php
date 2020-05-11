<?php

namespace App\Http\Middleware;

use Closure;

class CheckCertificated
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
        if (!is_null(\Auth::user()->certificated_at)) {
            return $next($request);
        } else {
            return \Redirect::route('cert.home');
        }
    }
}
