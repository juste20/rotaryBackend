@extends('layouts.admin')

@section('title', 'Paiements - Rotary Club')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Gestion des Paiements</h1>
        <a href="{{ route('admin.payments.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Nouveau Paiement
        </a>
    </div>

    <table class="min-w-full bg-white border border-gray-300 rounded shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">#</th>
                <th class="px-4 py-2 text-left">Utilisateur</th>
                <th class="px-4 py-2 text-left">Montant</th>
                <th class="px-4 py-2 text-left">Statut</th>
                <th class="px-4 py-2 text-left">Date</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $payment->id }}</td>
                <td class="px-4 py-2">{{ $payment->user->name ?? 'N/A' }}</td>
                <td class="px-4 py-2">{{ number_format($payment->amount, 0, ',', ' ') }} FCFA</td>
                <td class="px-4 py-2">
                    <span class="px-2 py-1 rounded text-white 
                        {{ $payment->status == 'validé' ? 'bg-green-600' : 'bg-yellow-500' }}">
                        {{ ucfirst($payment->status) }}
                    </span>
                </td>
                <td class="px-4 py-2">{{ $payment->created_at->format('d/m/Y') }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('admin.payments.edit', $payment->id) }}" class="text-blue-600 hover:underline">Modifier</a> |
                    <form action="{{ route('admin.payments.destroy', $payment->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline" onclick="return confirm('Supprimer ce paiement ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
