@extends('layouts.admin')

@section('title', 'Présences — ' . $event->title)

@section('content')
<div class="container mx-auto px-6 py-6">
    <h1 class="text-2xl font-bold mb-6">
        Présences pour : <span class="text-blue-700">{{ $event->title }}</span>
    </h1>

    <div class="bg-white shadow rounded p-6">
        @if($attendances->isEmpty())
            <p class="text-gray-600">Aucune présence enregistrée pour cet événement.</p>
        @else
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-3 py-2">Membre</th>
                        <th class="border px-3 py-2">Statut</th>
                        <th class="border px-3 py-2">Heure d'arrivée</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendances as $attendance)
                        <tr>
                            <td class="border px-3 py-2">{{ $attendance->user->name }}</td>
                            <td class="border px-3 py-2 capitalize">{{ $attendance->status }}</td>
                            <td class="border px-3 py-2">
                                {{ $attendance->created_at->format('d/m/Y H:i') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <a href="{{ route('admin.events.index') }}" class="text-gray-600 mt-4 inline-block">← Retour</a>
</div>
@endsection
