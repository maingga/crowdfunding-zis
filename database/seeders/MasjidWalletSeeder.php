<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasjidWallet;

class MasjidWalletSeeder extends Seeder
{
    public function run()
    {
        MasjidWallet::create([
            'saldo_total' => 800_000,
        ]);
    }
}
