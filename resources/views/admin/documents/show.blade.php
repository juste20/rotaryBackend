@extends('layouts.admin')

@section('title', 'Détail du document - Rotary Club')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Détail du document</h1>

    <div class="bg-white border border-gray-300 rounded shadow p-6">
        <p><strong>ID :</strong> {{ $document->id }}</p>
        <p><strong>Titre :</strong> {{ $document->title }}</p>
        <p><strong>Chemin :</strong> <a href="{{ asset('storage/' . $document->path) }}" target="_blank">{{ $document->path }}</a></p>
        <p><strong>Créé le :</strong> {{ $document->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Modifié le :</strong> {{ $document->updated_at->format('d/m/Y H:i') }}</p>
    </div>

    <div class="mt-6 flex space-x-4">
        <a href="{{ route('admin.documents.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Retour à la liste</a>

        <form action="{{ route('admin.documents.destroy', $document->id) }}" method="POST" onsubmit="return confirm('Supprimer ce document ?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Supprimer</button>
        </form>
    </div>
</div>
@endsection
