<?php
// app/Http/Middleware/CheckRole.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if ($request->user()->role !== $role && $request->user()->role !== 'super-admin') {
            abort(403);
        }

        return $next($request);
    }
}