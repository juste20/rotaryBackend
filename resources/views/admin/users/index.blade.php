@extends('layouts.admin')

@section('title', 'Utilisateurs - Rotary Club')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Gestion des Utilisateurs</h1>
        <a href="{{ route('admin.users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Nouvel utilisateur
        </a>
    </div>

    <table class="min-w-full bg-white border border-gray-300 rounded shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">#</th>
                <th class="px-4 py-2 text-left">Nom</th>
                <th class="px-4 py-2 text-left">Email</th>
                <th class="px-4 py-2 text-left">Rôle</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $user->id }}</td>
                <td class="px-4 py-2">{{ $user->name }}</td>
                <td class="px-4 py-2">{{ $user->email }}</td>
                <td class="px-4 py-2">{{ $user->role->name ?? 'N/A' }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-600 hover:underline">Modifier</a> |
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
