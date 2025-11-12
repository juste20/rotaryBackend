@extends('layouts.admin')

@section('title', 'Factures - Rotary Club')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Factures</h1>
        <a href="{{ route('admin.invoices.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Nouvelle Facture</a>
    </div>

    <table class="min-w-full bg-white border border-gray-300 rounded shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Numéro</th>
                <th class="px-4 py-2">Utilisateur</th>
                <th class="px-4 py-2">Montant</th>
                <th class="px-4 py-2">Statut</th>
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $invoice->id }}</td>
                <td class="px-4 py-2">{{ $invoice->number }}</td>
                <td class="px-4 py-2">{{ $invoice->user->name ?? 'N/A' }}</td>
                <td class="px-4 py-2">{{ number_format($invoice->amount, 0, ',', ' ') }} FCFA</td>
                <td class="px-4 py-2">{{ ucfirst($invoice->status) }}</td>
                <td class="px-4 py-2">{{ $invoice->created_at->format('d/m/Y') }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('admin.invoices.show', $invoice->id) }}" class="text-indigo-600 hover:underline">Voir</a> |
                    <a href="{{ route('admin.invoices.edit', $invoice->id) }}" class="text-blue-600 hover:underline">Modifier</a> |
                    <form action="{{ route('admin.invoices.destroy', $invoice->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline" onclick="return confirm('Supprimer cette facture ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
