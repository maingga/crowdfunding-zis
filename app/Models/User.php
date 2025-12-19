<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'user_id'; // jika database pakai user_id sebagai PK
    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'no_hp',
        'alamat'
    ];
    protected $hidden = ['password', 'remember_token'];

    // =====================
    // RELASI
    // =====================
    public function programs()
    {
        return $this->hasMany(Program::class, 'created_by', 'user_id');
    }

    public function donations()
    {
        return $this->hasMany(Donation::class, 'user_id', 'user_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id', 'user_id');
    }
}
