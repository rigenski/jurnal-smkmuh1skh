<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if (in_array($request->user()->role, $roles)) {
            return $next($request);
        }

        if (auth()->user()->role == "admin") {
            return redirect('/admin');
        } else if (auth()->user()->role == "guru" || "karyawan") {
            return redirect('/');
        }

        return redirect('/');
    }
}
