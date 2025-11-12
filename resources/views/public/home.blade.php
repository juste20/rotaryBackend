@extends('layouts.app')

@section('title', 'Accueil - Rotary Club Rive Droite')

@section('content')
<div class="hero bg-primary text-white text-center py-5">
    <h1>Bienvenue au Rotary Club Rive Droite</h1>
    <p>Servir d’abord, Inspirer toujours.</p>
</div>

<section class="container my-5">
    <h2 class="mb-4">Nos prochaines activités</h2>
    <ul class="list-group">
        @foreach($events as $event)
            <li class="list-group-item d-flex justify-content-between">
                <span>{{ $event->title }}</span>
                <small>{{ $event->start_date->format('d/m/Y') }}</small>
            </li>
        @endforeach
    </ul>
</section>

<section class="container my-5">
    <h2 class="mb-4">Derniers articles</h2>
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <img src="{{ asset($post->image ?? 'images/default.jpg') }}" class="card-img-top" alt="">
                <div class="card-body">
                    <h5>{{ $post->title }}</h5>
                    <p>{{ Str::limit($post->content, 100) }}</p>
                    <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-outline-primary btn-sm">Lire plus</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
