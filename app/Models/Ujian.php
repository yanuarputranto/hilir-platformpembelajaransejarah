<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;

    protected $fillable = [
        'guru_id',
        'judul',
        'deskripsi',
        'kategori',
        'waktu_pengerjaan',
        'acak_soal',
        'acak_jawaban',
    ];

    public function soal()
    {
        return $this->hasMany(Soal::class);
    }

    public function hasEssay()
{
    return $this->soal()->where('jenis', 'essay')->exists();
}
}
