<?php

namespace App\Http\Middleware;

use App\Role;
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
    public function handle($request, Closure $next, ...$roles)
    {
        if (count($roles) === 1) {
            $role = implode($roles);

            if ($role != "all") {
                if (!$request->user()->hasRole($role)) {

                    abort(401);

                }
                return $next($request);
            } else {
                $role = Role::all()->pluck('slug');
                $roles = (object) $role;

                if (!$request->user()->checkRole($roles)) {

                    abort(401);

                }
                return $next($request);
            };
        } else {
            $role = (object) $roles;
            if (!$request->user()->checkRole($role)) {

                abort(401);

            }
            return $next($request);
        }

    }
}
