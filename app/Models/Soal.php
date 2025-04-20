<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $fillable = [
        'pertanyaan', 
        'jenis', 
        'opsi', 
        'jawaban_benar',
        'kunci_essay'  // Tambahkan ini
    ];

    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }
}
