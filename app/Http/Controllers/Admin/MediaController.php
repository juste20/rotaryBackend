<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::latest()->paginate(12);
        return view('admin.media.index', compact('media'));
    }

    public function store(Request $request)
    {
        $request->validate(['file' => 'required|image|max:2048']);

        $path = $request->file('file')->store('media');
        Media::create(['path' => $path]);

        return back()->with('success', 'Média ajouté');
    }

    public function destroy(Media $media)
    {
        $media->delete();
        return back()->with('success', 'Média supprimé');
    }
}
