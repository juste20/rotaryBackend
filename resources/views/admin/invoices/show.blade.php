@extends('layouts.admin')

@section('title', 'Détail facture - Rotary Club')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Détail de la facture #{{ $invoice->id }}</h1>

    <div class="bg-white shadow rounded p-6">
        <p><strong>Utilisateur :</strong> {{ $invoice->user->name ?? 'N/A' }}</p>
        <p><strong>Email :</strong> {{ $invoice->user->email ?? 'N/A' }}</p>
        <p><strong>Montant :</strong> {{ number_format($invoice->amount, 2) }} €</p>
        <p><strong>Status :</strong> {{ ucfirst($invoice->status) }}</p>
        <p><strong>Date de création :</strong> {{ \Carbon\Carbon::parse($invoice->created_at)->format('d/m/Y H:i') }}</p>
        <p><strong>Date d'échéance :</strong> {{ \Carbon\Carbon::parse($invoice->due_date)->format('d/m/Y') }}</p>
    </div>

    <div class="mt-6 flex space-x-4">
        <a href="{{ route('admin.invoices.edit', $invoice->id ?? '') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Modifier</a>
        <form action="{{ route('admin.invoices.destroy', $invoice->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700" onclick="return confirm('Supprimer cette facture ?')">Supprimer</button>
        </form>
        <a href="{{ route('admin.invoices.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Retour à la liste</a>
    </div>
</div>
@endsection
