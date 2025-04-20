<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriGambar extends Model
{
    use HasFactory;

    protected $fillable = [
        'materi_id',
        'path',
        'nama_asli'
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
}