<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Event;
use App\Models\Payment;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $users = User::count();
        $events = Event::count();
        $payments = Payment::sum('amount');

        return view('admin.reports.index', compact('users', 'events', 'payments'));
    }
}
