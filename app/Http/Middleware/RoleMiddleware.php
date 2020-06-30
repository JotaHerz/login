<?php

namespace App\Http\Middleware;

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
        if ($request->user()->Admin()) {
            return $next($request);
        }
        return redirect('/')->with( 'status','No tienes permisos para realizar esta acción!!');
    }
    }

