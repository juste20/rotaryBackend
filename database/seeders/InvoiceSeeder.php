<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;
use App\Models\User;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            Invoice::create([
                'user_id' => $user->id,
                'invoice_number' => strtoupper(uniqid('INV_')),
                'amount' => rand(20000, 100000),
                'due_date' => now()->addDays(rand(10, 30)),
                'status' => collect(['paid', 'unpaid', 'overdue'])->random(),
                'description' => 'Facture pour événement Rotary',
            ]);
        }
    }
}
