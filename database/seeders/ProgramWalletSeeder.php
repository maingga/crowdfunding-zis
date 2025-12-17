<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgramWallet;

class ProgramWalletSeeder extends Seeder
{
    public function run()
    {
        ProgramWallet::create([
            'program_id' => 1,
            'saldo' => 500_000,
        ]);

        ProgramWallet::create([
            'program_id' => 2,
            'saldo' => 300_000,
        ]);
    }
}
