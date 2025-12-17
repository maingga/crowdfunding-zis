<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penyaluran;

class PenyaluranSeeder extends Seeder
{
    public function run()
    {
        Penyaluran::create([
            'program_id' => 2,
            'mustahik_id' => 1,
            'nominal_disalurkan' => 150_000,
            'tanggal_penyaluran' => now(),
            'bukti_penyaluran' => null,
        ]);

        Penyaluran::create([
            'program_id' => 2,
            'mustahik_id' => 2,
            'nominal_disalurkan' => 150_000,
            'tanggal_penyaluran' => now(),
            'bukti_penyaluran' => null,
        ]);
    }
}
