<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $materis = Materi::where('tanggal_publikasi', '<=', now())
            ->orderBy('tanggal_publikasi', 'desc')
            ->paginate(9);
            
        return view('siswa.materi', compact('materis'));
    }

    public function show($id)
{
    $materi = Materi::findOrFail($id);  // Mengambil materi berdasarkan ID
    
    return view('siswa.materidetail', compact('materi'));  // Pastikan 'materi' dikirim ke view
}


}