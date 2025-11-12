@extends('layouts.admin')

@section('title', 'Actions du Club')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Actions Réalisées</h1>
        <a href="{{ route('admin.actions.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Nouvelle Action</a>
    </div>

    <table class="min-w-full bg-white border border-gray-300 rounded shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Titre</th>
                <th class="px-4 py-2">Axe Stratégique</th>
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2">Partenaires</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($actions as $action)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $action->id }}</td>
                <td class="px-4 py-2">{{ $action->title }}</td>
                <td class="px-4 py-2">{{ $action->axis ?? 'N/A' }}</td>
                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($action->date)->format('d/m/Y') }}</td>
                <td class="px-4 py-2">{{ $action->partners ?? '-' }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('admin.actions.edit', $action->id) }}" class="text-blue-600 hover:underline">Modifier</a> |
                    <form action="{{ route('admin.actions.destroy', $action->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline" onclick="return confirm('Supprimer cette action ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
