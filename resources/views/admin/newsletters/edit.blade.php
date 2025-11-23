@extends('layouts.admin')

@section('title', 'Modifier newsletter - Rotary Club')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Modifier newsletter</h1>

    <form action="{{ route('admin.newsletters.send') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Objet</label>
            <input type="text" name="subject" class="w-full border rounded px-3 py-2" value="{{ old('subject', $newsletter->subject ?? '') }}">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Message</label>
            <textarea name="message" class="w-full border rounded px-3 py-2">{{ old('message', $newsletter->message ?? '') }}</textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Mettre à jour</button>
    </form>
</div>
@endsection
