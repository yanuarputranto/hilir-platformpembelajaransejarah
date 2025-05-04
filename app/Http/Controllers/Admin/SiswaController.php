<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    // Middleware untuk autentikasi admin
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!session('admin_logged_in')) {
                return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu');
            }
            return $next($request);
        });
    }

    // Menampilkan semua siswa
    public function index()
    {
        $siswa = Siswa::all();
        return view('admin.siswa.index', compact('siswa'));
    }

    // Menampilkan form untuk membuat siswa baru
    public function create()
    {
        return view('admin.siswa.create');
    }

    // Menyimpan siswa baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas',
            'nama' => 'required',
            'email' => 'required|email|unique:siswas',
            'no_hp' => 'required',
            'kelas' => 'required',
            'password' => 'required|min:6',
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'kelas' => $request->kelas,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Siswa berhasil ditambahkan');
    }

    // Menampilkan detail siswa
    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.show', compact('siswa'));
    }

    // Menampilkan form untuk mengedit siswa
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    // Memperbarui data siswa di database
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        
        $request->validate([
            'nis' => 'required|unique:siswas,nis,'.$id,
            'nama' => 'required',
            'email' => 'required|email|unique:siswas,email,'.$id,
            'no_hp' => 'required',
            'kelas' => 'required',
        ]);

        $data = [
            'nis' => $request->nis,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'kelas' => $request->kelas,
        ];

        // Update password hanya jika disediakan
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $siswa->update($data);

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui');
    }

    // Menghapus siswa dari database
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Siswa berhasil dihapus');
    }
}