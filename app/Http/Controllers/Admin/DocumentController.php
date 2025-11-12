<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::latest()->paginate(10);
        return view('admin.documents.index', compact('documents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'file' => 'required|mimes:pdf,docx,txt|max:2048',
        ]);

        $path = $request->file('file')->store('documents');
        Document::create(['title' => $request->title, 'path' => $path]);

        return back()->with('success', 'Document ajouté');
    }

    public function destroy(Document $document)
    {
        Storage::delete($document->path);
        $document->delete();
        return back()->with('success', 'Document supprimé');
    }
}
