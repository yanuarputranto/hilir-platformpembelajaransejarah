<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Siswa extends Authenticatable
{
    use HasFactory, Notifiable, LogsActivity;

    protected $guard = 'siswa';

    protected $fillable = [
        'nis',
        'nama',
        'email',
        'no_hp',
        'kelas',
        'password',
        'status_akun',
        'last_login_at'
    ];
    
    protected $attributes = [
        'status_akun' => 'aktif'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nis', 'nama', 'email', 'no_hp', 'kelas'])
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "Data siswa telah {$eventName}")
            ->useLogName('siswa');
    }
    
}

