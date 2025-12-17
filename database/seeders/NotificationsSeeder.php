<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;

class NotificationsSeeder extends Seeder
{
    public function run()
    {
        Notification::create([
            'user_id' => 1,
            'pesan' => 'Donasi masuk sebesar Rp500.000 dari Donatur 1',
            'tipe' => 'donasi',
            'is_read' => false,
        ]);

        Notification::create([
            'user_id' => 2,
            'pesan' => 'Penyaluran santunan anak yatim berhasil dilakukan',
            'tipe' => 'penyaluran',
            'is_read' => false,
        ]);
    }
}
