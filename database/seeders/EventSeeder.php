<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            ['Rotary Conférence annuelle', 'Réunion des membres Rotary pour plan stratégique.'],
            ['Journée Santé Communautaire', 'Sensibilisation à la santé publique locale.'],
            ['Soirée Gala de Bienfaisance', 'Levée de fonds pour projets communautaires.'],
        ];

        foreach ($events as [$title, $description]) {
            Event::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'location' => collect(['Cotonou', 'Porto-Novo', 'Parakou'])->random(),
                'start_date' => now()->addDays(rand(1, 30)),
                'end_date' => now()->addDays(rand(31, 60)),
                'description' => $description,
                'status' => collect(['upcoming', 'ongoing', 'completed'])->random(),
            ]);
        }
    }
}
