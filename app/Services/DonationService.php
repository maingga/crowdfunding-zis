<?php

namespace App\Services;

use App\Models\Donation;
use App\Models\Program;
use App\Models\ProgramWallet;
use App\Models\MasjidWallet;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class DonationService
{
    public static function handleSuccess(Donation $donation)
    {
        DB::transaction(function () use ($donation) {

            // 1. Update status donation
            $donation->update(['status' => 'berhasil']);

            // 2. Update dana terkumpul program
            $program = Program::find($donation->program_id);
            $program->increment('dana_terkumpul', $donation->nominal);

            // 3. Update program wallet
            $programWallet = ProgramWallet::firstOrCreate(
                ['program_id' => $program->program_id],
                ['saldo' => 0]
            );
            $programWallet->increment('saldo', $donation->nominal);

            // 4. Update masjid wallet
            $masjidWallet = MasjidWallet::first();
            $masjidWallet->increment('saldo_total', $donation->nominal);

            // 5. Notifikasi ke takmir/admin
            Notification::create([
                'user_id' => $program->created_by,
                'pesan' => 'Donasi masuk sebesar Rp'.number_format($donation->nominal),
                'tipe' => 'donasi',
                'is_read' => false
            ]);
        });
    }
}
