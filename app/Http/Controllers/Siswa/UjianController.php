<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Ujian;
use App\Models\HasilUjian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UjianController extends Controller
{
    public function index()
    {
        $ujians = Ujian::all();
        return view('siswa.ujian', compact('ujians'));
    }

    public function show($id)
{
    $ujian = Ujian::with('soal')->findOrFail($id);
    
    // Jika ujian memiliki pengacakan soal
    if ($ujian->acak_soal) {
        $ujian->soal = $ujian->soal->shuffle();
    }
    
    return view('siswa.ujiandetail', compact('ujian'));
}

public function submit(Request $request, $id)
{
    $ujian = Ujian::with('soal')->findOrFail($id);
    $siswaId = Auth::guard('siswa')->id();

    // Debug data input
    logger()->info('Jawaban Diterima:', $request->jawaban);

    $jawabanDetails = [];
    $score = 0;
    $totalPilihanGanda = 0;

    foreach ($ujian->soal as $soal) {
        $jawaban = $request->jawaban[$soal->id] ?? null;
        
        $jawabanDetails[$soal->id] = [
            'jawaban' => $jawaban,
            'jenis' => $soal->jenis,
            'correct' => false
        ];

        if ($soal->jenis === 'pilihan_ganda') {
            $totalPilihanGanda++;
            if ($jawaban == $soal->jawaban_benar) {
                $score++;
                $jawabanDetails[$soal->id]['correct'] = true;
            }
        }
    }

    // Hitung nilai
    $nilai = $totalPilihanGanda > 0 ? ($score / $totalPilihanGanda) * 100 : 0;

    // Debug sebelum simpan
    logger()->info('Data yang akan disimpan:', [
        'jawaban' => $jawabanDetails,
        'nilai' => $nilai
    ]);

    $hasilUjian = HasilUjian::create([
        'siswa_id' => $siswaId,
        'ujian_id' => $id,
        'nilai' => $nilai,
        'jawaban' => $jawabanDetails,
        'status' => 'completed'
    ]);

    return redirect()->route('siswa.hasilujian', $hasilUjian->id);
}

public function showResult($id)
{
    $hasil = HasilUjian::with(['ujian.soal', 'siswa'])
                ->where('siswa_id', Auth::id())
                ->findOrFail($id);

     // Debug data
    logger()->info('Hasil Ujian Data:', [
        'jawaban' => $hasil->jawaban,
        'soal' => $hasil->ujian->soal->pluck('id')
    ]);           
                
    return view('siswa.hasilujian', compact('hasil'));

}

public function nilai()
{
    // Pastikan menggunakan guard siswa
    if (!Auth::guard('siswa')->check()) {
        return redirect()->route('siswa.login');
    }

    $siswaId = Auth::guard('siswa')->id();
    $hasilUjians = HasilUjian::with(['ujian'])
                    ->where('siswa_id', $siswaId)
                    ->orderBy('created_at', 'desc')
                    ->get();

    return view('siswa.nilai', compact('hasilUjians'));
}
    
}

