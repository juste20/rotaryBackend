@extends('layouts.admin')

@section('title', 'Modifier un événement')

@section('content')
<div class="container mx-auto px-6 py-6">
    <h1 class="text-2xl font-bold mb-6">Modifier l'événement</h1>

    <form action="{{ route('admin.events.update', $event) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Titre</label>
            <input type="text" name="title" value="{{ $event->title }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold">Date</label>
            <input type="date" name="date" value="{{ $event->date }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold">Lieu</label>
            <input type="text" name="location" value="{{ $event->location }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold">Description</label>
            <textarea name="description" rows="5" class="w-full border rounded px-3 py-2" required>{{ $event->description }}</textarea>
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Mettre à jour
        </button>

        <a href="{{ route('admin.events.index') }}" class="ml-4 text-gray-600">← Retour</a>
    </form>
</div>
@endsection
