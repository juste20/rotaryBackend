<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Crée les rôles si inexistants
        $adminRole = Role::firstOrCreate(['slug' => 'admin', 'name' => 'Administrateur']);
        $presidentRole = Role::firstOrCreate(['slug' => 'president', 'name' => 'Président']);
        $tresorierRole = Role::firstOrCreate(['slug' => 'tresorier', 'name' => 'Trésorier']);
        $membreRole = Role::firstOrCreate(['slug' => 'membre', 'name' => 'Membre']);

        // Crée les utilisateurs
        $admin = User::firstOrCreate(
            ['email' => 'admin@rotaryclub.org'],
            [
                'name' => 'Admin Rotary',
                'password' => Hash::make('password'),
                'phone' => '+22990000000',
            ]
        );
        $admin->roles()->syncWithoutDetaching([$adminRole->id]);

        $president = User::firstOrCreate(
            ['email' => 'president@rotaryclub.org'],
            [
                'name' => 'Président Club',
                'password' => Hash::make('password'),
                'phone' => '+22991111111',
            ]
        );
        $president->roles()->syncWithoutDetaching([$presidentRole->id]);

        $tresorier = User::firstOrCreate(
            ['email' => 'tresorier@rotaryclub.org'],
            [
                'name' => 'Trésorier Club',
                'password' => Hash::make('password'),
                'phone' => '+22992222222',
            ]
        );
        $tresorier->roles()->syncWithoutDetaching([$tresorierRole->id]);

        $membre = User::firstOrCreate(
            ['email' => 'membre@rotaryclub.org'],
            [
                'name' => 'Membre Exemple',
                'password' => Hash::make('password'),
                'phone' => '+22993333333',
            ]
        );
        $membre->roles()->syncWithoutDetaching([$membreRole->id]);
    }
}
