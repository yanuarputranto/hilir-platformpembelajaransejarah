<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilUjian extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'ujian_id',
        'nilai',
        'jawaban',
        'status',
        'feedback'
    ];

    protected $casts = [
        'jawaban' => 'array'
    ];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }

    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }
}