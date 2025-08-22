<?php
// app/Http/Controllers/ContentController.php

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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $contents = Content::with('media')->get();
    return view('contents.index', compact('contents'));
    }

    /**
     * Affiche le formulaire pour créer un nouveau contenu.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contents.create');
    }

    /**
     * Enregistre un nouveau contenu.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    // app/Http/Controllers/ContentController.php

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

    return redirect()->route('contents.index');
}

    /**
     * Affiche un contenu.
     *
     * @param Content $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        return view('contents.show', compact('content'));
    }

    /**
     * Affiche le formulaire pour modifier un contenu.
     *
     * @param Content $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        return view('contents.edit', compact('content'));
    }

    /**
     * Met à jour un contenu.
     *
     * @param Request $request
     * @param Content $content
     * @return \Illuminate\Http\Response
     */
public function update(Request $request, Content $content)
{
    // Validation des données
    $request->validate([
        'title' => 'required',
        'body' => 'required',
        'type' => 'required',
        'media' => 'array',
        'media.*' => 'mimes:jpg,jpeg,png,mp4|max:5120',
    ]);

    // Mise à jour du contenu
    $content->update($request->all());

    // Enregistrement des nouveaux médias
    if ($request->hasFile('media')) {
        foreach ($request->file('media') as $file) {
            $filePath = $file->store('public/content_media');
            $content->media()->create([
                'file_path' => $filePath,
                'type' => $file->getClientMimeType() === 'video/mp4' ? 'video' : 'image',
            ]);
        }
    }

    return redirect()->route('contents.index');
}
    /**
     * Supprime un contenu.
     *
     * @param Content $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        $content->delete();
        return redirect()->route('contents.index');
    }
}