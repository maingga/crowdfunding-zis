<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasjidWallet extends Model
{
    use HasFactory;

    protected $table = 'masjid_wallet'; // ✅ WAJIB
    protected $primaryKey = 'masjid_wallet_id'; // ✅ pastikan sama migration

    protected $fillable = [
        'saldo_total',
    ];
}
