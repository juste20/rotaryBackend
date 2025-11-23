<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Services\BrevoService;
use Illuminate\Http\Request;
use Exception;

class NewsletterController extends Controller
{
    protected $brevo;

    public function __construct(BrevoService $brevo)
    {
        $this->brevo = $brevo;
    }

    /**
     * Liste des abonnés
     */
    public function index()
    {
        $subscribers = Newsletter::latest()->paginate(10);
        return view('admin.newsletters.index', compact('subscribers'));
    }

    /**
     * Envoi d'une newsletter à tous les abonnés
     */
    public function send(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:5',
        ]);

        // Vérifier s’il y a des abonnés
        if (Newsletter::count() === 0) {
            return back()->with('error', "Aucun abonné n’est inscrit à la newsletter.");
        }

        try {
            // Envoi par batch pour éviter les timeouts
            Newsletter::chunk(50, function ($subscribers) use ($request) {
                foreach ($subscribers as $subscriber) {
                    $this->brevo->sendEmail(
                        $subscriber->email,
                        $request->subject,
                        $request->message
                    );
                }
            });

            return back()->with('success', 'Newsletter envoyée avec succès.');

        } catch (Exception $e) {
            return back()->with('error', "Erreur lors de l’envoi : " . $e->getMessage());
        }
    }
}
