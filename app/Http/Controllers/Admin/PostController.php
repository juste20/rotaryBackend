<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Affiche la liste de tous les posts.
     */
    public function index()
    {
        // Récupère les posts les plus récents, paginés
        $posts = Post::latest()->paginate(10);

        // Renvoie la vue admin.posts.index avec les posts
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Affiche le formulaire pour créer un nouveau post.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Stocke un nouveau post en base de données.
     */
    public function store(Request $request)
    {
        // Validation des champs
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'content' => 'required|string',
            'status' => 'required|in:published,draft',
        ]);

        // Création du post
        Post::create($validated);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post créé avec succès.');
    }

    /**
     * Affiche un post spécifique.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Affiche le formulaire d'édition pour un post existant.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Met à jour un post existant en base de données.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $post->id,
            'content' => 'required|string',
            'status' => 'required|in:published,draft',
        ]);

        $post->update($validated);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post mis à jour avec succès.');
    }

    /**
     * Supprime un post de la base de données.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post supprimé avec succès.');
    }
}
