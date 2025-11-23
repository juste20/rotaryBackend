@extends('layouts.admin')

@section('title', 'Modifier document - Rotary Club')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Modifier document</h1>

    <form action="{{ route('admin.documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Titre</label>
            <input type="text" name="title" value="{{ old('title', $document->title) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Fichier</label>
            <input type="file" name="file" class="w-full border rounded px-3 py-2">
            <a href="{{ asset('storage/'.$document->path) }}" class="text-blue-600 mt-2 block">Voir fichier actuel</a>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Mettre à jour</button>
    </form>
</div>
@endsection
