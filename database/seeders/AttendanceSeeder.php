<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attendance;
use App\Models\Event;
use App\Models\User;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        $events = Event::all();
        $users = User::all();

        foreach ($events as $event) {
            foreach ($users->random(rand(2, 5)) as $user) {
                Attendance::create([
                    'user_id' => $user->id,
                    'event_id' => $event->id,
                    'status' => collect(['present', 'absent', 'excused'])->random(),
                    'check_in_time' => now()->subHours(rand(1, 24)),
                ]);
            }
        }
    }
}
