<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Action;

class ActionController extends Controller
{
    public function index()
    {
        $actions = Action::latest()->paginate(10);
        return view('public.action', compact('actions'));
    }

    public function show($slug)
    {
        $action = Action::where('slug', $slug)->firstOrFail();
        return view('public.action-show', compact('action'));
    }
}
