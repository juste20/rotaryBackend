@extends('layouts.admin')

@section('title', 'Galerie Média')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Médias du Club</h1>
        <a href="{{ route('admin.media.create') }}" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">+ Nouveau Média</a>
    </div>

    <div class="grid grid-cols-3 gap-4">
        @foreach($media as $item)
        <div class="bg-white border rounded shadow p-2">
            <img src="{{ asset('storage/' . $item->file_path) }}" class="rounded mb-2">
            <p class="text-sm text-gray-700">{{ $item->title }}</p>
            <div class="flex justify-between mt-2">
                <a href="{{ route('admin.media.edit', $item->id) }}" class="text-blue-600 text-sm hover:underline">Modifier</a>
                <form action="{{ route('admin.media.destroy', $item->id) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button class="text-red-600 text-sm hover:underline" onclick="return confirm('Supprimer ?')">Supprimer</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
