@extends('layouts.admin')

@section('title', 'Newsletters - Rotary Club')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Campagnes Newsletter</h1>
        <a href="{{ route('admin.newsletters.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Nouvelle Newsletter</a>
    </div>

    <table class="min-w-full bg-white border border-gray-300 rounded shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Objet</th>
                <th class="px-4 py-2">Destinataires</th>
                <th class="px-4 py-2">Date d'envoi</th>
                <th class="px-4 py-2">Statut</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($newsletters as $newsletter)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $newsletter->id }}</td>
                <td class="px-4 py-2">{{ $newsletter->subject }}</td>
                <td class="px-4 py-2">{{ $newsletter->recipients }}</td>
                <td class="px-4 py-2">{{ $newsletter->sent_at ? $newsletter->sent_at->format('d/m/Y') : '-' }}</td>
                <td class="px-4 py-2">{{ ucfirst($newsletter->status) }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('admin.newsletters.show', $newsletter->id) }}" class="text-indigo-600 hover:underline">Voir</a> |
                    <a href="{{ route('admin.newsletters.edit', $newsletter->id) }}" class="text-blue-600 hover:underline">Modifier</a> |
                    <form action="{{ route('admin.newsletters.destroy', $newsletter->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline" onclick="return confirm('Supprimer cette newsletter ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
