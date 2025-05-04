<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Guru extends Authenticatable
{
    use HasFactory, Notifiable, LogsActivity;


    protected $guard = 'guru';

    protected $fillable = [
        'nip',
        'nama',
        'email',
        'no_hp',
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
            ->logOnly(['nip', 'nama', 'email', 'no_hp'])
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "Data guru telah {$eventName}")
            ->useLogName('guru');
    }

   
}