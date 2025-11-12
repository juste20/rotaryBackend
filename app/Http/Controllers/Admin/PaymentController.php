<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Services\FeexPayService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $feexpay;

    public function __construct(FeexPayService $feexpay)
    {
        $this->feexpay = $feexpay;
    }

    public function index()
    {
        $payments = Payment::latest()->paginate(15);
        return view('admin.payments.index', compact('payments'));
    }

    public function process(Request $request)
    {
        $response = $this->feexpay->createPayment($request->amount, $request->user_id);

        return back()->with('success', 'Paiement traité : ' . $response['status']);
    }
}
