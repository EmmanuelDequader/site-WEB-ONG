<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ContentMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ContentController extends Controller
{
    /**
     * Affiche la liste des contenus.
     */
    public function index()
    {
        $contents = Content::with('media')->get();
        return view('contents.index', compact('contents'));
    }

    /**
     * Affiche le formulaire pour créer un nouveau contenu.
     */
    public function create()
    {
        return view('contents.create');
    }

    /**
     * Enregistre un nouveau contenu.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'type' => 'required',
            'media' => 'array',
            'media.*' => 'mimes:jpg,jpeg,png,mp4|max:5120',
        ]);

        // Création du contenu
        $content = Content::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'type' => $request->input('type'),
            'admin_id' => auth()->id(),
        ]);

        // Enregistrement des médias
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $filePath = $file->store('public/content_media');
                $content->media()->create([
                    'file_path' => $filePath,
                    'type' => $file->getClientMimeType() === 'video/mp4' ? 'video' : 'image',
                ]);
            }
        }

        return redirect()->route('dashboard')->with('success', 'Actualité créée avec succès!');
    }

    /**
     * Affiche un contenu.
     */
    public function show(Content $content)
    {
        return view('contents.show', compact('content'));
    }

    /**
     * Affiche le formulaire pour modifier un contenu.
     */
    public function edit(Content $content)
    {
        return view('contents.edit', compact('content'));
    }

    /**
     * Met à jour un contenu.
     */
public function update(Request $request, Content $content)
{
     try {
    // Valider les données
    $request->validate([
        'title' => 'required',
        'body' => 'required',
        'type' => 'required',
    ]);

    // Mettre à jour l'actualité
    $content->title = $request->input('title');
    $content->body = $request->input('body');
    $content->type = $request->input('type');
    $content->save();

    // Supprimer les médias non cochés
    if ($request->has('existing_media')) {
        $existingMediaIds = $request->input('existing_media');
        $content->media()->whereNotIn('id', $existingMediaIds)->delete();
    } else {
        $content->media()->delete();
    }

    // Ajouter de nouveaux médias
    if ($request->hasFile('media')) {
        foreach ($request->file('media') as $file) {
            $filePath = $file->store('public/content_media');
            $content->media()->create([
                'file_path' => $filePath,
                'type' => $file->getClientMimeType() === 'video/mp4' ? 'video' : 'image',
            ]);
        }
    }

        return redirect()->route('dashboard')->with('success', 'Actualité mise à jour avec succès!');
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return response()->view('errors.500', [], 500);
    }
}
    /**
     * Supprime un contenu.
     */
    public function destroy(Content $content)
    {
        $content->delete();
        return redirect()->route('dashboard')->with('success', 'Actualité supprimée avec succès!');
    }
}