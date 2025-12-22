<?php

namespace App\Services;

use App\Models\Penyaluran;
use App\Models\ProgramWallet;
use App\Models\MasjidWallet;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Exception;

class PenyaluranService
{
    /**
     * Simpan penyaluran baru
     *
     * @param array $data
     * @return Penyaluran
     * @throws Exception
     */
    public static function store(array $data): Penyaluran
    {
        return DB::transaction(function () use ($data) {

            // 1. Ambil wallet program
            $programWallet = ProgramWallet::where('program_id', $data['program_id'])
                ->lockForUpdate()
                ->first();

            if (!$programWallet || $programWallet->saldo < $data['nominal_disalurkan']) {
                throw new Exception('Saldo program tidak mencukupi');
            }

            // 2. Ambil wallet masjid
            $masjidWallet = MasjidWallet::lockForUpdate()->first();

            if (!$masjidWallet || $masjidWallet->saldo_total < $data['nominal_disalurkan']) {
                throw new Exception('Saldo masjid tidak mencukupi');
            }

            // 3. Simpan penyaluran
            $penyaluran = Penyaluran::create($data);

            // 4. Kurangi saldo
            $programWallet->decrement('saldo', $data['nominal_disalurkan']);
            $masjidWallet->decrement('saldo_total', $data['nominal_disalurkan']);

            // 5. Notifikasi ke takmir
            Notification::create([
                'user_id' => $data['user_id'], // ambil dari controller
                'pesan' => 'Penyaluran dana sebesar Rp' . number_format($data['nominal_disalurkan']) . ' berhasil dilakukan',
                'tipe' => 'penyaluran',
                'is_read' => false
            ]);

            return $penyaluran;
        });
    }
}
