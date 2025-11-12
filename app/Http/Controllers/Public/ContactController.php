<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BrevoService;

class ContactController extends Controller
{
    protected $brevo;

    public function __construct(BrevoService $brevo)
    {
        $this->brevo = $brevo;
    }

    public function index()
    {
        return view('public.contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        $this->brevo->sendMail(
            'contact@mimon-benin.com',
            'Nouveau message du site MIMON BENIN',
            "De: {$request->name} ({$request->email})\n\nMessage:\n{$request->message}"
        );

        return back()->with('success', 'Votre message a bien été envoyé.');
    }
}
