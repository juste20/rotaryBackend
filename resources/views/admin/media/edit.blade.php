@extends('layouts.admin')

@section('title', 'Modifier média - Rotary Club')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Modifier média</h1>

    <form action="{{ route('admin.media.update', $media->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Fichier image</label>
            <input type="file" name="file" class="w-full border rounded px-3 py-2">
            <img src="{{ asset('storage/'.$media->path) }}" class="mt-2 w-32">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Mettre à jour</button>
    </form>
</div>
@endsection
