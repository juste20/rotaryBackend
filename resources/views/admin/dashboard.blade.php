@extends('layouts.admin')

@section('title', 'Tableau de bord - Rotary Club')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Tableau de bord</h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-blue-600 text-white p-6 rounded-lg shadow">
            <h2 class="text-lg">Utilisateurs</h2>
            <p class="text-2xl font-bold mt-2">{{ $stats['users'] ?? 0 }}</p>
        </div>
        <div class="bg-green-600 text-white p-6 rounded-lg shadow">
            <h2 class="text-lg">Paiements</h2>
            <p class="text-2xl font-bold mt-2">{{ $stats['payments'] ?? 0 }}</p>
        </div>
        <div class="bg-yellow-500 text-white p-6 rounded-lg shadow">
            <h2 class="text-lg">Événements</h2>
            <p class="text-2xl font-bold mt-2">{{ $stats['events'] ?? 0 }}</p>
        </div>
        <div class="bg-red-600 text-white p-6 rounded-lg shadow">
            <h2 class="text-lg">Actions</h2>
            <p class="text-2xl font-bold mt-2">{{ $stats['actions'] ?? 0 }}</p>
        </div>
    </div>

    <div class="mt-10 bg-white shadow p-6 rounded">
        <h2 class="text-xl font-bold mb-4">Dernières activités</h2>
        <ul class="divide-y">
            @foreach($activities as $activity)
                <li class="py-3 flex justify-between">
                    <span>{{ $activity->description }}</span>
                    <span class="text-gray-500 text-sm">{{ $activity->created_at->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
