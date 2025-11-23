@extends('layouts.admin')

@section('title', 'Modifier facture - Rotary Club')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Modifier facture</h1>

    <form action="{{ route('admin.invoices.update', $invoice->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Utilisateur</label>
            <select name="user_id" class="w-full border rounded px-3 py-2">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $invoice->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Montant</label>
            <input type="number" step="0.01" name="amount" value="{{ old('amount', $invoice->amount) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Statut</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="pending" {{ $invoice->status == 'pending' ? 'selected' : '' }}>En attente</option>
                <option value="paid" {{ $invoice->status == 'paid' ? 'selected' : '' }}>Payée</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Mettre à jour</button>
    </form>
</div>
@endsection
