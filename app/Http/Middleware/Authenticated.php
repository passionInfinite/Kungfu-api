<?php

namespace KungFu\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use KungFu\Response;

class Authenticated
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
        if (Auth::check()) {
            return $next($request);
        } else {
            return Response::errors(401, [
                'message' => 'You must be authorized to access this endpoint!'
            ]);
        }
    }
}
