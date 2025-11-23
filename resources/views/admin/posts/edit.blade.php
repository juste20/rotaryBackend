@extends('layouts.admin')

@section('title', 'Modifier article - Rotary Club')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Modifier article</h1>

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Titre</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Contenu</label>
            <textarea name="content" class="w-full border rounded px-3 py-2">{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Image</label>
            <input type="file" name="image" class="w-full border rounded px-3 py-2">
            @if($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" class="mt-2 w-32">
            @endif
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Mettre à jour</button>
    </form>
</div>
@endsection
