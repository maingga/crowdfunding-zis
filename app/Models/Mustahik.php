<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mustahik extends Model
{
    use HasFactory;

    protected $table = 'mustahik'; // ✅ INI YANG KURANG
    protected $primaryKey = 'mustahik_id';

    protected $fillable = [
        'nama',
        'kategori_asnaf',
        'alamat',
        'no_hp'
    ];

    public function penyaluran()
    {
        return $this->hasMany(
            Penyaluran::class,
            'mustahik_id',
            'mustahik_id'
        );
    }
}
