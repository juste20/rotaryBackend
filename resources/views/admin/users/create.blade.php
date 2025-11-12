@extends('layouts.admin')

@section('title', 'Ajouter un utilisateur - Rotary Club')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Ajouter un Utilisateur</h1>

    <form method="POST" action="{{ route('admin.users.store') }}" class="bg-white p-6 shadow rounded">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold mb-2">Nom</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-2">Email</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-2">Mot de passe</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-2">Rôle</label>
            <select name="role_id" class="w-full border rounded px-3 py-2">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Enregistrer</button>
    </form>
</div>
@endsection
