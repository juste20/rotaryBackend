<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query()->with(['category', 'tags']);

        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->has('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('slug', $request->tag);
            });
        }

        $posts = $query->latest()->paginate(6);
        $categories = Category::all();
        $tags = Tag::all();

        return view('public.blog.index', compact('posts', 'categories', 'tags'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with(['category', 'tags', 'user'])->firstOrFail();
        return view('public.blog.show', compact('post'));
    }
}
