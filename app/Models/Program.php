<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $primaryKey = 'program_id';
    protected $fillable = [
        'nama_program','kategori','deskripsi','target_dana','dana_terkumpul',
        'status','created_by','zakat_type_id'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'user_id');
    }

    public function zakatType()
    {
        return $this->belongsTo(ZakatType::class, 'zakat_type_id', 'zakat_type_id');
    }

    public function donations()
    {
        return $this->hasMany(Donation::class, 'program_id', 'program_id');
    }

    public function penyaluran()
    {
        return $this->hasMany(Penyaluran::class, 'program_id', 'program_id');
    }

    public function wallet()
    {
        return $this->hasOne(ProgramWallet::class, 'program_id', 'program_id');
    }
}
