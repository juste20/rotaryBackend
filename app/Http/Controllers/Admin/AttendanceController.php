<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with(['event', 'user'])->paginate(10);
        return view('admin.attendance.index', compact('attendances'));
    }

    public function create()
    {
        $events = Event::all();
        $users = User::all();
        return view('admin.attendance.create', compact('events', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|string',
        ]);

        Attendance::create($request->all());
        return redirect()->route('admin.attendance.index')->with('success', 'Présence enregistrée');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return back()->with('success', 'Présence supprimée');
    }
}
