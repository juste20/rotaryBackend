<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Event;
use App\Models\Action;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(3)->get();
        $events = Event::latest()->take(3)->get();
        $actions = Action::latest()->take(3)->get();

        return view('public.home', compact('posts', 'events', 'actions'));
    }
}
