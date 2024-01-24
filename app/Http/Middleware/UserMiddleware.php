<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('role') || session('role') === 'user') {
            return redirect()->route('landing.index'); // Redirect to admin page or login
        }

        return $next($request);
    }
}