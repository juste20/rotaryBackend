<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Event;
use App\Models\Post;
use App\Models\Payment;
use App\Models\Action;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistiques pour les cartes du dashboard
        $stats = [
            'users' => User::count(),
            'payments' => Payment::sum('amount'),
            'events' => Event::count(),
            'actions' => Action::count(),
        ];

        // Dernières activités (ici, on prend les 5 dernières actions comme exemple)
        $activities = Action::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'activities'));
    }
}
