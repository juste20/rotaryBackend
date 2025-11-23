@extends('layouts.admin')

@section('title', 'Créer une action - Rotary Club')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Créer une action</h1>

    <form action="{{ route('admin.actions.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Titre</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Créer</button>
    </form>
</div>
@endsection
