<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionsSeeder extends Seeder
{
    public function run()
    {
        Transaction::create([
            'donation_id' => 1,
            'midtrans_order_id' => 'ORD-0001',
            'payment_type' => 'credit_card',
            'transaction_status' => 'pending',
            'transaction_time' => now(),
            'gross_amount' => 500_000,
        ]);

        Transaction::create([
            'donation_id' => 2,
            'midtrans_order_id' => null,
            'payment_type' => 'transfer_manual',
            'transaction_status' => 'success',
            'transaction_time' => now(),
            'gross_amount' => 300_000,
        ]);
    }
}
