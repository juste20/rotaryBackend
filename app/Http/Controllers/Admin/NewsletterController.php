<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Services\BrevoService;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    protected $brevo;

    public function __construct(BrevoService $brevo)
    {
        $this->brevo = $brevo;
    }

    public function index()
    {
        $subscribers = Newsletter::latest()->paginate(10);
        return view('admin.newsletters.index', compact('subscribers'));
    }

    public function send(Request $request)
    {
        $request->validate(['subject' => 'required', 'message' => 'required']);
        $emails = Newsletter::pluck('email')->toArray();

        foreach ($emails as $email) {
            $this->brevo->sendEmail($email, $request->subject, $request->message);
        }

        return back()->with('success', 'Newsletter envoyée avec succès');
    }
}
