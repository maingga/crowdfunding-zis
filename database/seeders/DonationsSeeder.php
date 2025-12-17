<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Donation;

class DonationsSeeder extends Seeder
{
    public function run()
    {
        Donation::create([
            'user_id' => 3, // donatur1
            'program_id' => 1,
            'nominal' => 500_000,
            'metode_pembayaran' => 'midtrans',
            'status' => 'pending',
            'is_anonymous' => false,
        ]);

        Donation::create([
            'user_id' => null, // donasi anonim
            'program_id' => 2,
            'nominal' => 300_000,
            'metode_pembayaran' => 'transfer_manual',
            'status' => 'berhasil',
            'is_anonymous' => true,
        ]);
    }
}
