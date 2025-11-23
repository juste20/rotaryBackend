@extends('layouts.admin')

@section('title', 'Ajouter une présence - Rotary Club')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Ajouter une présence</h1>

    <form action="{{ route('admin.attendances.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Événement</label>
            <select name="event_id" class="w-full border rounded px-3 py-2">
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Utilisateur</label>
            <select name="user_id" class="w-full border rounded px-3 py-2">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Ajouter</button>
    </form>
</div>
@endsection
