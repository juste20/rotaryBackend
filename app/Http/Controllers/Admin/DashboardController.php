<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Event;
use App\Models\Post;
use App\Models\Payment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $eventsCount = Event::count();
        $postsCount = Post::count();
        $totalPayments = Payment::sum('amount');

        return view('admin.dashboard', compact('usersCount', 'eventsCount', 'postsCount', 'totalPayments'));
    }
}
