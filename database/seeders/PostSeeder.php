<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $author = User::first();

        $posts = [
            [
                'title' => 'Journée mondiale de la paix',
                'slug' => Str::slug('Journée mondiale de la paix'),
                'content' => 'Le Rotary Club s’est réuni pour promouvoir la paix et la cohésion sociale à travers une conférence inspirante.',
                'status' => 'published',
                'user_id' => $author->id,
            ],
            [
                'title' => 'Campagne de don de sang',
                'slug' => Str::slug('Campagne de don de sang'),
                'content' => 'Une campagne réussie de don de sang a permis de collecter plus de 200 poches en une journée.',
                'status' => 'published',
                'user_id' => $author->id,
            ],
            [
                'title' => 'Nettoyage des plages de Cotonou',
                'slug' => Str::slug('Nettoyage des plages de Cotonou'),
                'content' => 'Les membres du Rotary ont organisé une journée écologique de nettoyage des plages et sensibilisation à la pollution.',
                'status' => 'draft',
                'user_id' => $author->id,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
