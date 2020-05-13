<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;

class RoleMiddleware
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
        if (!$request->user()->hasRole($role)) {

            return redirect(RouteServiceProvider::HOME);

        }

        if ($permission !== null && !$request->user()->can($permission)) {

            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);

    }
}
