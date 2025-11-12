@extends('layouts.admin')

@section('title', 'Événements - Rotary Club')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Gestion des Événements</h1>
        <a href="{{ route('admin.events.create') }}" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">+ Nouvel Événement</a>
    </div>

    <table class="min-w-full bg-white border border-gray-300 rounded shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Titre</th>
                <th class="px-4 py-2">Lieu</th>
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2">Statut</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $event->id }}</td>
                <td class="px-4 py-2">{{ $event->title }}</td>
                <td class="px-4 py-2">{{ $event->location }}</td>
                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</td>
                <td class="px-4 py-2">{{ ucfirst($event->status) }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('admin.events.edit', $event->id) }}" class="text-blue-600 hover:underline">Modifier</a> |
                    <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline" onclick="return confirm('Supprimer cet événement ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
