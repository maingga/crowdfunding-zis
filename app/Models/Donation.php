<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $primaryKey = 'donation_id';
    protected $fillable = [
        'user_id','program_id','nominal','metode_pembayaran','status','is_anonymous'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'program_id');
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'donation_id', 'donation_id');
    }
}
