<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Liste les médias
     */
    public function index()
    {
        $media = Media::latest()->paginate(12);
        return view('admin.media.index', compact('media'));
    }

    /**
     * Affiche le formulaire de création d'un média
     */
    public function create()
    {
        return view('admin.media.create');
    }

    /**
     * Stocke un nouveau média
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:4096', // image/video/doc
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $file = $request->file('file');
        $extension = strtolower($file->getClientOriginalExtension());

        // Détecte le type
        $type = 'image';
        if (in_array($extension, ['mp4', 'mov', 'avi'])) {
            $type = 'video';
        } elseif (in_array($extension, ['pdf', 'docx', 'xlsx'])) {
            $type = 'document';
        }

        // Stockage du fichier
        $path = $file->store('uploads/media', 'public');

        // Enregistrement en base
        Media::create([
            'path' => $path,
            'type' => $type,
            'title' => $request->title ?? ucfirst($type) . ' upload',
            'description' => $request->description,
            'uploaded_by' => Auth::id() ?? null,
        ]);

        return redirect()->route('admin.media.index')->with('success', 'Média ajouté avec succès.');
    }

    /**
     * Affiche le formulaire d'édition d'un média
     */
    public function edit(Media $media)
    {
        return view('admin.media.edit', compact('media'));
    }

    /**
     * Met à jour un média existant
     */
    public function update(Request $request, Media $media)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $media->update($request->only('title', 'description'));

        return redirect()->route('admin.media.index')->with('success', 'Média mis à jour.');
    }

    /**
     * Affiche les détails d'un média
     */
    public function show(Media $media)
    {
        return view('admin.media.show', compact('media'));
    }

    /**
     * Supprime un média
     */
    public function destroy(Media $media)
    {
        if (Storage::disk('public')->exists($media->path)) {
            Storage::disk('public')->delete($media->path);
        }

        $media->delete();

        return back()->with('success', 'Média supprimé.');
    }
}
