@extends('layouts.app')

@section('title', $action->title)

@section('content')
<div class="container my-5">
    <h1 class="text-3xl font-bold mb-4">{{ $action->title }}</h1>
    <p>{{ $action->description }}</p>
    <p><strong>Lieu :</strong> {{ $action->location }}</p>
    <p><strong>Date :</strong> {{ $action->start_date }} @if($action->end_date) - {{ $action->end_date }} @endif</p>
    <a href="{{ route('actions.index') }}" class="text-blue-600 hover:underline">← Retour aux actions</a>
</div>
@endsection
