<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->name == 'admin') {
            return $next($request);
        }

        return redirect('/');
    }
}
