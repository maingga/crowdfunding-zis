<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramWallet extends Model
{
    use HasFactory;

    protected $table = 'program_wallet'; // ✅ WAJIB
    protected $primaryKey = 'wallet_id'; // ✅ pastikan sama dg migration

    protected $fillable = [
        'program_id',
        'saldo',
    ];

    public function program()
    {
        return $this->belongsTo(
            Program::class,
            'program_id',
            'program_id'
        );
    }
}
