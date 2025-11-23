@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4 text-orange-500">{{ $post->title }}</h1>

    <p class="text-gray-500 mb-4">
        Par {{ $post->user->name ?? 'Anonyme' }} |
        Catégorie : {{ $post->category->name ?? 'N/A' }} |
        Publié le {{ $post->created_at->format('d/m/Y') }}
    </p>

    <div class="prose mb-6">
        {!! $post->content !!}
    </div>

    @if($post->tags && $post->tags->count())
        <div class="mb-6">
            <strong>Tags :</strong>
            @foreach($post->tags as $tag)
                <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded">{{ $tag->name }}</span>
            @endforeach
        </div>
    @endif

    <a href="{{ route('blog.index') }}" class="text-blue-600 hover:underline">← Retour au blog</a>
</div>
@endsection
