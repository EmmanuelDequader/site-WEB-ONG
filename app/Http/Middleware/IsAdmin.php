<?php

// app/Http/Middleware/IsAdmin.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
// app/Http/Middleware/IsAdmin.php

public function handle(Request $request, Closure $next)
{
    $allowedRoles = ['super-admin', 'admin'];

    if ($request->user() && in_array($request->user()->role, $allowedRoles)) {
        return $next($request);
    }

    return redirect()->route('home')->with('error', 'Vous n\'avez pas accès à cette page');
}
}