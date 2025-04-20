<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'guru_id',
        'judul',
        'deskripsi',
        'kategori',
        'tanggal_publikasi',
        'notifikasi_siswa',
        'file_pdf',
        'file_video',
        'nama_file_pdf',
        'nama_file_video',
        'link_video',
        'gambar', 
    ];
    protected $casts = [
        'gambar' => 'array', // Menyimpan gambar sebagai array
    ];
    

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }


}