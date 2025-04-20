<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    public function create()
    {
        return view('guru.buatmateri');
    }

    public function store(Request $request)
    {
        // Validasi form input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string',
            'tanggal_publikasi' => 'required|date',
            'gambar' => 'nullable|array|max:5', // Maksimal 5 gambar
            'gambar.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'file_pdf' => 'nullable|mimes:pdf|max:10240',
            'file_video' => 'nullable|mimetypes:video/mp4,video/quicktime|max:51200',
            'link_video' => 'nullable|url',
            'notifikasi_siswa' => 'nullable'
        ]);

        // Persiapkan data dasar
        $materiData = [
            'guru_id' => Auth::guard('guru')->id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'notifikasi_siswa' => $request->has('notifikasi_siswa'),
            'link_video' => $request->link_video,
        ];

        // Simpan file PDF jika ada
        if ($request->hasFile('file_pdf')) {
            $filePdf = $request->file('file_pdf');
            $pdfPath = $filePdf->store('materi/pdf', 'public');
            $materiData['file_pdf'] = $pdfPath;
            $materiData['nama_file_pdf'] = $filePdf->getClientOriginalName();
        }

        // Simpan file video jika ada
        if ($request->hasFile('file_video')) {
            $fileVideo = $request->file('file_video');
            $videoPath = $fileVideo->store('materi/video', 'public');
            $materiData['file_video'] = $videoPath;
            $materiData['nama_file_video'] = $fileVideo->getClientOriginalName();
        }

        // Simpan gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambarPaths = [];
            foreach ($request->file('gambar') as $file) {
                if ($file->isValid()) {
                    $path = $file->store('materi/gambar', 'public');
                    $gambarPaths[] = $path;
                } else {
                    return back()->withErrors(['gambar' => 'File gambar tidak valid']);
                }
            }
            $materiData['gambar'] = json_encode($gambarPaths); // simpan sebagai JSON
        }

        // Simpan ke database
        $materi = Materi::create($materiData);

        // Redirect ke dashboard guru
        return redirect()->route('guru.dashboard')
            ->with('success', 'Materi berhasil dibuat!');
    }
}
