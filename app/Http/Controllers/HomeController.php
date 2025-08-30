<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Récupérer tous les projets depuis la base de données
        $projects = Project::orderBy('created_at', 'desc')->get();
        
        // Passer les projets à la vue
        return view('layout', compact('projects'));
    }
}