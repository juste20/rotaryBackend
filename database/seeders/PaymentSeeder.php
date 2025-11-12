<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\User;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            Payment::create([
                'user_id' => $user->id,
                'amount' => rand(10000, 50000),
                'status' => collect(['pending', 'completed', 'failed'])->random(),
                'payment_method' => collect(['card', 'mobile_money', 'bank_transfer'])->random(),
                'transaction_id' => strtoupper(uniqid('TRX_')),
                'description' => 'Cotisation Rotary annuelle',
            ]);
        }
    }
}
