<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
            'description' => 'required|string',
        ]);

        Event::create($request->all());

        return redirect()->route('admin.events.index')->with('success', 'Événement créé');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
            'description' => 'required|string',
        ]);

        $event->update($request->all());
        return redirect()->route('admin.events.index')->with('success', 'Événement modifié');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return back()->with('success', 'Événement supprimé');
    }
}
