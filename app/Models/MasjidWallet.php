<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasjidWallet extends Model
{
    use HasFactory;

    protected $primaryKey = 'masjid_wallet_id';
    protected $fillable = ['saldo_total'];
}
