<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\User;

class PartnerController extends Controller
{
    public function index()
    {
        // Récupère tous les utilisateurs ayant le rôle avec ID = 3
        $partners = User::whereHas('roles', function ($query) {
            $query->where('roles.id', 3); // ID du rôle "partner"
        })->get();

        return view('public.partner', compact('partners'));
    }

    public function show($id)
    {
        // Récupère un utilisateur par ID
        $partner = User::findOrFail($id);

        return view('public.partner', compact('partner'));
    }
}
