<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Liste des factures
     */
    public function index()
    {
        $invoices = Invoice::latest()->paginate(10);
        return view('admin.invoices.index', compact('invoices'));
    }

    /**
     * Affiche le formulaire de création de facture
     */
    public function create()
    {
        $users = User::all(); // pour sélectionner l'utilisateur
        return view('admin.invoices.create', compact('users'));
    }

    /**
     * Stocke une nouvelle facture
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric',
            'status' => 'required|string',
            'due_date' => 'required|date',
        ]);

        Invoice::create($request->all());

        return redirect()->route('admin.invoices.index')->with('success', 'Facture créée avec succès');
    }

    /**
     * Affiche le formulaire d'édition pour une facture
     */
    public function edit(Invoice $invoice)
    {
        $users = User::all();
        return view('admin.invoices.edit', compact('invoice', 'users'));
    }

    /**
     * Met à jour une facture existante
     */
    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric',
            'status' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $invoice->update($request->all());

        return redirect()->route('admin.invoices.index')->with('success', 'Facture mise à jour');
    }

    /**
     * Affiche le détail d'une facture
     */
    public function show(Invoice $invoice)
    {
        return view('admin.invoices.show', compact('invoice'));
    }

    /**
     * Supprime une facture
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return back()->with('success', 'Facture supprimée');
    }
}
