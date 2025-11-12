<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\User;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = User::where('role_id', 3)->get();
        return view('public.partners.index', compact('partners'));
    }

    public function show($id)
    {
        $partner = User::findOrFail($id);
        return view('public.partners.show', compact('partner'));
    }
}
