<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Action;
use Illuminate\Support\Str;

class ActionSeeder extends Seeder
{
    public function run(): void
    {
        $actions = [
            [
                'title' => 'Don de matériel scolaire',
                'slug' => Str::slug('Don de matériel scolaire'),
                'description' => 'Distribution de kits scolaires à plus de 500 enfants défavorisés.',
                'location' => 'École Primaire Sainte-Marie, Cotonou',
                'status' => 'terminée',
                'start_date' => '2025-03-10',
                'end_date' => '2025-03-10',
            ],
            [
                'title' => 'Sensibilisation au paludisme',
                'slug' => Str::slug('Sensibilisation au paludisme'),
                'description' => 'Campagne de sensibilisation sur la prévention du paludisme dans les zones rurales.',
                'location' => 'Ouidah',
                'status' => 'en cours',
                'start_date' => '2025-05-15',
                'end_date' => '2025-05-20',
            ],
            [
                'title' => 'Plantation d’arbres',
                'slug' => Str::slug('Plantation d’arbres'),
                'description' => 'Action environnementale : plantation de 1000 arbres en collaboration avec les écoles locales.',
                'location' => 'Abomey-Calavi',
                'status' => 'prévue',
                'start_date' => '2025-11-01',
                'end_date' => '2025-11-02',
            ],
        ];

        foreach ($actions as $action) {
            Action::create($action);
        }
    }
}
