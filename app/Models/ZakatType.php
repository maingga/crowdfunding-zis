<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZakatType extends Model
{
    use HasFactory;

    protected $primaryKey = 'zakat_type_id';
    protected $fillable = ['nama_type'];

    public function programs()
    {
        return $this->hasMany(Program::class, 'zakat_type_id', 'zakat_type_id');
    }
}
