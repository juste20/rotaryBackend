@extends('layouts.admin')

@section('title', 'Présences - Rotary Club')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Feuilles de présence</h1>
        <a href="{{ route('admin.attendances.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Nouvelle Présence
        </a>
    </div>

    <table class="min-w-full bg-white border border-gray-300 rounded shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Événement</th>
                <th class="px-4 py-2">Membre</th>
                <th class="px-4 py-2">Statut</th>
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $attendance->id }}</td>
                <td class="px-4 py-2">{{ $attendance->event->title ?? 'N/A' }}</td>
                <td class="px-4 py-2">{{ $attendance->user->name ?? 'N/A' }}</td>
                <td class="px-4 py-2">
                    <span class="px-2 py-1 rounded text-white {{ $attendance->status == 'present' ? 'bg-green-600' : 'bg-yellow-600' }}">
                        {{ ucfirst($attendance->status) }}
                    </span>
                </td>
                <td class="px-4 py-2">{{ $attendance->created_at->format('d/m/Y') }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('admin.attendances.edit', $attendance->id) }}" class="text-blue-600 hover:underline">Modifier</a> |
                    <form action="{{ route('admin.attendances.destroy', $attendance->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline" onclick="return confirm('Supprimer cette présence ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
