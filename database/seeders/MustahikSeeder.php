<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mustahik;

class MustahikSeeder extends Seeder
{
    public function run()
    {
        Mustahik::create([
            'nama' => 'Budi Santoso',
            'kategori_asnaf' => 'fakir',
            'alamat' => 'Jl. Mawar 10',
            'no_hp' => '081234567800',
        ]);

        Mustahik::create([
            'nama' => 'Siti Aminah',
            'kategori_asnaf' => 'miskin',
            'alamat' => 'Jl. Melati 5',
            'no_hp' => '081234567801',
        ]);
    }
}
