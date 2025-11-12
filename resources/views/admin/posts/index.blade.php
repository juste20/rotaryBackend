@extends('layouts.admin')

@section('title', 'Articles du Blog')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Articles du Blog</h1>
        <a href="{{ route('admin.posts.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Nouvel Article</a>
    </div>

    <table class="min-w-full bg-white border border-gray-300 rounded shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Titre</th>
                <th class="px-4 py-2">Catégorie</th>
                <th class="px-4 py-2">Auteur</th>
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $post->id }}</td>
                <td class="px-4 py-2">{{ $post->title }}</td>
                <td class="px-4 py-2">{{ $post->category->name ?? 'Non classé' }}</td>
                <td class="px-4 py-2">{{ $post->user->name ?? 'N/A' }}</td>
                <td class="px-4 py-2">{{ $post->created_at->format('d/m/Y') }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-blue-600 hover:underline">Modifier</a> |
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline" onclick="return confirm('Supprimer cet article ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
