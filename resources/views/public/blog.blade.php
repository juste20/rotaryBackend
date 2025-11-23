@extends('layouts.app')

@section('title', 'Blog - Rotary Club Rive Droite')

@section('content')
<div class="container my-5">
    <h1>Actualités & Blog</h1>
    <div class="row mt-4">
        @foreach($posts as $post)
        <div class="col-md-4 mb-3">
            <div class="card">
                <img src="{{ asset($post->image ?? 'images/default.jpg') }}" class="card-img-top" alt="">
                <div class="card-body">
                    <h5>{{ $post->title }}</h5>
                    <p>{{ Str::limit($post->content, 120) }}</p>
                    <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-primary btn-sm">Lire</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
