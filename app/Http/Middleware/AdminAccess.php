<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;

class AdminAccess extends Authenticate
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if(\Auth::check() && \Auth::user()->is_admin)
        {
            return $next($request);
        }

        if ($request->ajax())
        {
            return response('Unauthorized.', 401);
        }
        abort(403);
        return response('Unauthorized.', 403);
    }
}
