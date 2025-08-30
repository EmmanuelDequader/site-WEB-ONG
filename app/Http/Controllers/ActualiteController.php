<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    /**
     * Affiche la page des actualités avec les 3 dernières actualités
     */
    public function index()
    {
        $actualites = Content::where('type', 'actualite')
                            ->orderBy('created_at', 'desc')
                            ->take(3)
                            ->get();
        
        $projets = Content::where('type', 'projet')
                         ->orderBy('created_at', 'desc')
                         ->take(3)
                         ->get();

        return view('actualites.index', compact('actualites', 'projets'));
    }

    /**
     * Affiche une actualité spécifique
     */
    public function show($id)
    {
        $actualite = Content::with('media')->findOrFail($id);
        $recentActualites = Content::where('type', 'actualite')
                                  ->where('id', '!=', $id)
                                  ->orderBy('created_at', 'desc')
                                  ->take(3)
                                  ->get();

        return view('actualites.show', compact('actualite', 'recentActualites'));
    }
}