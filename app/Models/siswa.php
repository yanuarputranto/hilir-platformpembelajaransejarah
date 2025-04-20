<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'siswa';

    protected $fillable = [
        'nis',
        'nama',
        'email',
        'no_hp',
        'kelas',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    
}

