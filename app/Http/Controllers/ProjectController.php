<?php

// app/Http/Controllers/ProjectController.php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

public function index()
{
    $projects = Project::all();
    return view('projects.index', compact('projects'));
}

    public function create()
    {
        return view('projects.create');
    }

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    if (auth()->check()) {
        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'admin_id' => auth()->user()->id,
        ]);

        return redirect()->route('projects.index');
    } else {
        // Redirigez l'utilisateur vers la page de connexion ou affichez un message d'erreur
        return redirect()->route('login');
    }
}

        public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $project->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('projects.index');
    }
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }

    // Dans votre contrôleur

}