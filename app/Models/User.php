<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'user_id';
    protected $fillable = ['nama','email','password','role','no_hp','alamat'];
    protected $hidden = ['password'];

    // Relasi
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
