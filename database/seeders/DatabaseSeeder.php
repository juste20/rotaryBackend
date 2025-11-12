<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            PostSeeder::class,
            ActionSeeder::class,
            InvoiceSeeder::class,
            PaymentSeeder::class,
            EventSeeder::class,
            AttendanceSeeder::class,
            MediaSeeder::class,
        ]);
    }
}
