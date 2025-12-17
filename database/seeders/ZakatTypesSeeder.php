<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ZakatType;

class ZakatTypesSeeder extends Seeder
{
    public function run()
    {
        $types = ['Maal','Fitrah','Profesi'];

        foreach($types as $type){
            ZakatType::create(['nama_type' => $type]);
        }
    }
}
