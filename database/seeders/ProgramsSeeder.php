<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramsSeeder extends Seeder
{
    public function run()
    {
        Program::create([
            'nama_program' => 'Pembangunan Masjid',
            'kategori' => 'sedekah',
            'deskripsi' => 'Dana untuk pembangunan Masjid An-Nur Polinema',
            'target_dana' => 100_000_000,
            'dana_terkumpul' => 0,
            'status' => 'aktif',
            'created_by' => 1, // user_id admin
            'zakat_type_id' => null,
        ]);

        Program::create([
            'nama_program' => 'Santunan Anak Yatim',
            'kategori' => 'zakat',
            'deskripsi' => 'Santunan untuk anak yatim dhuafa',
            'target_dana' => 50_000_000,
            'dana_terkumpul' => 0,
            'status' => 'aktif',
            'created_by' => 2, // user_id takmir
            'zakat_type_id' => 1, // Maal
        ]);
    }
}
