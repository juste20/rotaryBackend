<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Liste des événements
     */
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    /**
     * Formulaire de création
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Enregistrement d'un nouvel événement
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
            'description' => 'required|string',
        ]);

        Event::create($request->all());

        return redirect()->route('admin.events.index')
            ->with('success', 'Événement créé avec succès.');
    }

    /**
     * Formulaire d'édition
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Mise à jour d'un événement
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
            'description' => 'required|string',
        ]);

        $event->update($request->all());

        return redirect()->route('admin.events.index')
            ->with('success', 'Événement mis à jour avec succès.');
    }

    /**
     * Suppression d'un événement
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return back()->with('success', 'Événement supprimé.');
    }

    /**
     * Participants / présences d’un événement
     */
    public function attendances(Event $event)
    {
        // On récupère les présences avec l’utilisateur
        $attendances = $event->attendances()->with('user')->get();

        return view('admin.events.attendances', compact('event', 'attendances'));
    }
}
