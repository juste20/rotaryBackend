@extends('layouts.app')

@section('title', 'Contact - Rotary Club')

@section('content')
<div class="container my-5">
    <h1>Contactez-nous</h1>
    <form action="{{ route('contact.send') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label>Nom complet</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Message</label>
            <textarea name="message" class="form-control" rows="4" required></textarea>
        </div>
        <button class="btn btn-primary">Envoyer</button>
    </form>
</div>
@endsection
