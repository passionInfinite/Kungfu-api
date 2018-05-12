<?php

namespace KungFu\Http\Middleware;

use Closure;

class RequestsToAJAX
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
        $request->headers->set('Accept', 'application/json', true);
        return $next($request);
    }
}
