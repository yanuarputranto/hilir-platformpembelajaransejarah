<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Ujian;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UjianController extends Controller
{
    public function create()
    {
        return view('guru.buatujian');
    }

    public function store(Request $request)
    {
        // Validasi awal struktur data
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string',
            'waktu_pengerjaan' => 'required|integer|min:1',
            'soal' => 'required|array|min:1',
            'soal.*.pertanyaan' => 'required|string',
            'soal.*.jenis' => 'required|in:pilihan_ganda,essay',
        ]);

        // Validasi khusus untuk setiap jenis soal
        foreach ($request->soal as $index => $soal) {
            if ($soal['jenis'] === 'pilihan_ganda') {
                $request->validate([
                    "soal.$index.opsi" => 'required|array|min:2',
                    "soal.$index.opsi.*" => 'required|string',
                    "soal.$index.jawaban_benar" => 'required|integer|min:0',
                ]);
            } else {
                $request->validate([
                    "soal.$index.kunci_essay" => 'required|string',
                ]);
            }
        }

        // Gunakan transaction untuk memastikan konsistensi data
        DB::beginTransaction();

        try {
            // Simpan ujian
            $ujian = Ujian::create([
                'guru_id' => Auth::guard('guru')->id(),
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'kategori' => $request->kategori,
                'waktu_pengerjaan' => $request->waktu_pengerjaan,
                'acak_soal' => $request->has('acak_soal'),
                'acak_jawaban' => $request->has('acak_jawaban')
            ]);

            // Simpan soal
            foreach ($request->soal as $soalData) {
                $soal = new Soal([
                    'pertanyaan' => $soalData['pertanyaan'],
                    'jenis' => $soalData['jenis'],
                ]);

                if ($soalData['jenis'] === 'pilihan_ganda') {
                    $soal->opsi = json_encode($soalData['opsi']);
                    $soal->jawaban_benar = $soalData['jawaban_benar'];
                } else {
                    $soal->kunci_essay = $soalData['kunci_essay'];
                }

                $ujian->soal()->save($soal);
            }

            DB::commit();

            return redirect()->route('guru.dashboard')
                ->with('success', 'Ujian berhasil dibuat!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function index()
{
    $guruId = Auth::guard('guru')->id();
    $ujians = Ujian::where('guru_id', $guruId)->withCount('soal')->get();

    return view('guru.daftarujian', compact('ujians'));
}

public function edit($id)
{
    $ujian = Ujian::with('soal')->where('guru_id', Auth::guard('guru')->id())->findOrFail($id);
    return view('guru.editujian', compact('ujian'));
}

public function update(Request $request, $id)
{
    // Validasi awal
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'kategori' => 'required|string',
        'waktu_pengerjaan' => 'required|integer|min:1',
        'soal' => 'required|array|min:1',
        'soal.*.pertanyaan' => 'required|string',
        'soal.*.jenis' => 'required|in:pilihan_ganda,essay',
    ]);

    // Validasi khusus untuk setiap jenis soal
    foreach ($request->soal as $index => $soal) {
        if ($soal['jenis'] === 'pilihan_ganda') {
            $request->validate([
                "soal.$index.opsi" => 'required|array|min:2',
                "soal.$index.opsi.*" => 'required|string',
                "soal.$index.jawaban_benar" => 'required|integer|min:0',
            ]);
        } else {
            $request->validate([
                "soal.$index.kunci_essay" => 'required|string',
            ]);
        }
    }

    DB::beginTransaction();

    try {
        // Update ujian
        $ujian = Ujian::where('guru_id', Auth::guard('guru')->id())->findOrFail($id);
        $ujian->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'waktu_pengerjaan' => $request->waktu_pengerjaan,
            'acak_soal' => $request->has('acak_soal'),
            'acak_jawaban' => $request->has('acak_jawaban')
        ]);

        // Hapus semua soal lama
        $ujian->soal()->delete();

        // Simpan soal baru
        foreach ($request->soal as $soalData) {
            $soal = new Soal([
                'pertanyaan' => $soalData['pertanyaan'],
                'jenis' => $soalData['jenis'],
            ]);

            if ($soalData['jenis'] === 'pilihan_ganda') {
                $soal->opsi = json_encode($soalData['opsi']);
                $soal->jawaban_benar = $soalData['jawaban_benar'];
            } else {
                $soal->kunci_essay = $soalData['kunci_essay'];
            }

            $ujian->soal()->save($soal);
        }

        DB::commit();

        return redirect()->route('guru.daftarujian')
            ->with('success', 'Ujian berhasil diperbarui!');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

public function destroy($id)
{
    $ujian = Ujian::where('guru_id', Auth::guard('guru')->id())->findOrFail($id);
    
    DB::beginTransaction();
    try {
        $ujian->soal()->delete();
        $ujian->delete();
        DB::commit();
        
        return redirect()->route('guru.daftarujian')
            ->with('success', 'Ujian berhasil dihapus!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

}