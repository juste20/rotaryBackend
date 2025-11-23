<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class DocumentController extends Controller
{
    /**
     * Liste des documents
     */
    public function index()
    {
        $documents = Document::latest()->paginate(10);
        return view('admin.documents.index', compact('documents'));
    }

    /**
     * Affiche le formulaire de création
     */
    public function create()
    {
        return view('admin.documents.create');
    }

    /**
     * Stocke un nouveau document
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file'  => 'required|mimes:pdf,doc,docx,txt|max:4096',
        ]);

        try {
            $filename = time() . '_' . preg_replace('/\s+/', '_', $request->file->getClientOriginalName());
            $path = $request->file('file')->storeAs('documents', $filename);
            
            Document::create([
                'title' => $request->title,
                'path'  => $path,
            ]);

            return redirect()->route('admin.documents.index')
                ->with('success', 'Document ajouté avec succès.');
        } catch (Exception $e) {
            return back()->with('error', 'Erreur lors de l\'upload : ' . $e->getMessage());
        }
    }

    /**
     * Affiche le détail d’un document
     */
    public function show(Document $document)
    {
        return view('admin.documents.show', compact('document'));
    }

    /**
     * Affiche le formulaire d’édition
     */
    public function edit(Document $document)
    {
        return view('admin.documents.edit', compact('document'));
    }

    /**
     * Met à jour un document existant
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file'  => 'nullable|mimes:pdf,doc,docx,txt|max:4096',
        ]);

        try {
            // Si un nouveau fichier est uploadé
            if ($request->hasFile('file')) {
                // Supprime l’ancien fichier
                if (Storage::exists($document->path)) {
                    Storage::delete($document->path);
                }
                $filename = time() . '_' . preg_replace('/\s+/', '_', $request->file->getClientOriginalName());
                $path = $request->file('file')->storeAs('documents', $filename);
                $document->path = $path;
            }

            $document->title = $request->title;
            $document->save();

            return redirect()->route('admin.documents.index')
                ->with('success', 'Document mis à jour avec succès.');
        } catch (Exception $e) {
            return back()->with('error', 'Erreur lors de la mise à jour : ' . $e->getMessage());
        }
    }

    /**
     * Supprime un document
     */
    public function destroy(Document $document)
    {
        try {
            if (Storage::exists($document->path)) {
                Storage::delete($document->path);
            }
            $document->delete();

            return back()->with('success', 'Document supprimé avec succès.');
        } catch (Exception $e) {
            return back()->with('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }
}
