<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'Administrateur', 'slug' => 'admin', 'description' => 'Accès complet à toutes les fonctionnalités'],
            ['name' => 'Président', 'slug' => 'president', 'description' => 'Gère les activités et les membres du club'],
            ['name' => 'Trésorier', 'slug' => 'tresorier', 'description' => 'Gère la trésorerie, les cotisations et paiements'],
            ['name' => 'Secrétaire', 'slug' => 'secretaire', 'description' => 'Gère les réunions et les comptes rendus'],
            ['name' => 'Membre', 'slug' => 'membre', 'description' => 'Participe aux activités et événements'],
            ['name' => 'Visiteur', 'slug' => 'visiteur', 'description' => 'Consultation publique du site'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
