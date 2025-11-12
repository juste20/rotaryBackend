<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Rotary',
            'email' => 'admin@rotaryclub.org',
            'password' => Hash::make('password'),
            'phone' => '+22990000000',
            'role_id' => 1, // Administrateur
        ]);

        User::create([
            'name' => 'Président Club',
            'email' => 'president@rotaryclub.org',
            'password' => Hash::make('password'),
            'phone' => '+22991111111',
            'role_id' => 2, // Président
        ]);

        User::create([
            'name' => 'Trésorier Club',
            'email' => 'tresorier@rotaryclub.org',
            'password' => Hash::make('password'),
            'phone' => '+22992222222',
            'role_id' => 3, // Trésorier
        ]);

        User::create([
            'name' => 'Membre Exemple',
            'email' => 'membre@rotaryclub.org',
            'password' => Hash::make('password'),
            'phone' => '+22993333333',
            'role_id' => 4, // Membre simple
        ]);
    }
}
