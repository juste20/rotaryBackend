<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Media;
use Illuminate\Support\Str;

class MediaSeeder extends Seeder
{
    public function run(): void
    {
        $samples = [
            ['image', 'photo_event1.jpg'],
            ['video', 'rotary_event.mp4'],
            ['document', 'rapport_activite.pdf'],
        ];

        foreach ($samples as [$type, $file]) {
            Media::create([
                'type' => $type,
                'title' => ucfirst($type) . ' - ' . Str::random(5),
                'path' => "uploads/media/{$file}",
                'description' => "Fichier média de démonstration pour test.",
                'uploaded_by' => rand(1, 5),
            ]);
        }
    }
}
