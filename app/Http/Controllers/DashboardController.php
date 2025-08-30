<?php

namespace App\Http\Controllers;

use App\Models\Don;
use App\Models\Project;
use App\Models\Content;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Vérifier si l'utilisateur est admin ou super-admin
        $user = auth()->user();

        if (!$user->hasRole('admin') && !$user->hasRole('super-admin')) {
            return redirect()->route('home')->with('error', 'Accès réservé aux administrateurs');
        }

        // Récupérer les données pour le tableau de bord
        $data = [
            'totalDons' => Don::count(),
            'totalProjets' => Project::count(),
            'totalActualites' => Content::where('type', 'actualite')->count(),
            'totalUtilisateurs' => User::count(),
            'dons' => Don::with('user', 'project')->latest()->take(5)->get(),
            'projets' => Project::all(),
            'actualites' => Content::where('type', 'actualite')->latest()->take(5)->get(), 
            'utilisateurs' => User::latest()->take(10)->get(),
        ];

        return view('dashboard', $data);
    }

    public function toggleRole($userId)
    {
        $user = User::findOrFail($userId);
        
        // CORRIGÉ : 'super-admin' avec tiret
        if ($user->role === 'super-admin' || $user->id === auth()->id()) {
            return back()->with('error', 'Action non autorisée.');
        }
        
        $user->role = $user->role === 'admin' ? 'user' : 'admin';
        $user->save();
        
        return back()->with('success', 'Rôle utilisateur mis à jour.');
    }
    
    public function deleteUser($userId)
    {
        $user = User::findOrFail($userId);
        
        // CORRIGÉ : 'super-admin' avec tiret
        if ($user->role === 'super-admin' || $user->id === auth()->id()) {
            return back()->with('error', 'Action non autorisée.');
        }
        
        $user->delete();
        
        return back()->with('success', 'Utilisateur supprimé avec succès.');
    }
}