@extends('layouts.admin')

@section('title', 'Documents du Club')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Bibliothèque de Documents</h1>
        <a href="{{ route('admin.documents.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Ajouter Document</a>
    </div>

    <table class="min-w-full bg-white border border-gray-300 rounded shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Titre</th>
                <th class="px-4 py-2">Type</th>
                <th class="px-4 py-2">Fichier</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $document)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $document->id }}</td>
                <td class="px-4 py-2">{{ $document->title }}</td>
                <td class="px-4 py-2">{{ strtoupper($document->type) }}</td>
                <td class="px-4 py-2">
                    <a href="{{ asset('storage/' . $document->file_path) }}" class="text-indigo-600 hover:underline" target="_blank">Voir</a>
                </td>
                <td class="px-4 py-2">
                    <a href="{{ route('admin.documents.edit', $document->id) }}" class="text-blue-600 hover:underline">Modifier</a> |
                    <form action="{{ route('admin.documents.destroy', $document->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline" onclick="return confirm('Supprimer ce document ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
