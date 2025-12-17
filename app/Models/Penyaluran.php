<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyaluran extends Model
{
    use HasFactory;

    protected $table = 'penyaluran'; // ✅ WAJIB
    protected $primaryKey = 'penyaluran_id'; // ✅ sesuai migration

    protected $fillable = [
        'program_id',
        'mustahik_id',
        'nominal_disalurkan',
        'tanggal_penyaluran',
        'bukti_penyaluran'
    ];

    public function program()
    {
        return $this->belongsTo(
            Program::class,
            'program_id',
            'program_id'
        );
    }

    public function mustahik()
    {
        return $this->belongsTo(
            Mustahik::class,
            'mustahik_id',
            'mustahik_id'
        );
    }
}
