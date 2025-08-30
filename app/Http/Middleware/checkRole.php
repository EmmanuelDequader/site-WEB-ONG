<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            Log::info('CheckRole: User not authenticated');
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        Log::info('CheckRole Debug:', [
            'user_id' => $user->id,
            'user_role' => $user->role,
            'required_roles' => $roles,
            'has_super_admin' => $user->role === 'super-admin',
            'has_admin' => $user->role === 'admin'
        ]);

        // Vérifie si l'utilisateur a un des rôles autorisés
        foreach ($roles as $role) {
            if ($user->role === $role) {
                Log::info('CheckRole: Access granted for role ' . $role);
                return $next($request);
            }
        }

        Log::info('CheckRole: Access denied - no matching roles');
        return redirect()->route('home')->with('error', 'Accès non autorisé');
    }
}