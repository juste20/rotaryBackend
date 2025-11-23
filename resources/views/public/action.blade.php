@extends('layouts.app')

@section('title', 'Actions du Club')

@section('content')
<div class="container my-5">
    <h1>Nos Actions Réalisées</h1>
    <div class="row mt-4">
        @foreach($actions as $action)
        <div class="col-md-4 mb-3">
            <div class="card">
                <img src="{{ asset($action->cover ?? 'images/action.jpg') }}" class="card-img-top" alt="">
                <div class="card-body">
                    <h5>{{ $action->title }}</h5>
                    <p>{{ Str::limit($action->description, 100) }}</p>
                    <a href="{{ route('actions.show', $action->slug) }}" class="btn btn-outline-primary btn-sm">Voir plus</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
