<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use App\Services\FeexPayService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $feexpay;

    public function __construct(FeexPayService $feexpay)
    {
        $this->feexpay = $feexpay;
    }

    /**
     * Liste des paiements
     */
    public function index()
    {
        $payments = Payment::latest()->paginate(15);
        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Affiche le formulaire de création de paiement
     */
    public function create()
    {
        $users = User::all();
        return view('admin.payments.create', compact('users'));
    }

    /**
     * Stocke un nouveau paiement
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
            'method' => 'required|string',
            'status' => 'required|string',
        ]);

        Payment::create($request->all());

        return redirect()->route('admin.payments.index')->with('success', 'Paiement créé avec succès');
    }

    /**
     * Affiche le formulaire d'édition pour un paiement
     */
    public function edit(Payment $payment)
    {
        $users = User::all(); // nécessaire pour le select utilisateur
        return view('admin.payments.edit', compact('payment', 'users'));
    }

    /**
     * Met à jour un paiement existant
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
            'method' => 'required|string',
            'status' => 'required|string',
        ]);

        $payment->update($request->all());

        return redirect()->route('admin.payments.index')->with('success', 'Paiement mis à jour');
    }

    /**
     * Affiche le détail d'un paiement
     */
    public function show(Payment $payment)
    {
        return view('admin.payments.show', compact('payment'));
    }

    /**
     * Supprime un paiement
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return back()->with('success', 'Paiement supprimé');
    }

    /**
     * Traite un paiement via FeexPay
     */
    public function process(Request $request)
    {
        $response = $this->feexpay->createPayment($request->amount, $request->user_id);

        return back()->with('success', 'Paiement traité : ' . $response['status']);
    }
}
