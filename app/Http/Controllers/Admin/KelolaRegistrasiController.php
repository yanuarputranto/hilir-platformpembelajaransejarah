<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KelolaRegistrasiController extends Controller
{
    // Middleware untuk autentikasi admin
    public function __construct()
    {
        
    }

    // Menampilkan halaman kelola registrasi
    public function index()
    {
        $guru = Guru::all();
        $siswa = Siswa::all();
        return view('admin.kelolaregistrasi', compact('guru', 'siswa'));
    }

    // Menyimpan guru baru
    public function storeGuru(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:gurus',
            'nama' => 'required',
            'email' => 'required|email|unique:gurus',
            'no_hp' => 'required',
            'password' => 'required|min:6',
        ]);

        Guru::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.kelolaregistrasi')
            ->with('success', 'Data guru berhasil ditambahkan');
    }

    // Memperbarui data guru
    public function updateGuru(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);
        
        $request->validate([
            'nip' => 'required|unique:gurus,nip,'.$id,
            'nama' => 'required',
            'email' => 'required|email|unique:gurus,email,'.$id,
            'no_hp' => 'required',
        ]);

        $data = [
            'nip' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ];

        // Update password hanya jika disediakan
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $guru->update($data);

        return redirect()->route('admin.kelolaregistrasi')
            ->with('success', 'Data guru berhasil diperbarui');
    }

    // Menghapus guru
    public function destroyGuru($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('admin.kelolaregistrasi')
            ->with('success', 'Data guru berhasil dihapus');
    }

    // Menyimpan siswa baru
    public function storeSiswa(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas',
            'nama' => 'required',
            'email' => 'required|email|unique:siswas',
            'kelas' => 'required',
            'no_hp' => 'required',
            'password' => 'required|min:6',
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'email' => $request->email,
            'kelas' => $request->kelas,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.kelolaregistrasi')
            ->with('success', 'Data siswa berhasil ditambahkan');
    }

    // Memperbarui data siswa
    public function updateSiswa(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        
        $request->validate([
            'nis' => 'required|unique:siswas,nis,'.$id,
            'nama' => 'required',
            'email' => 'required|email|unique:siswas,email,'.$id,
            'kelas' => 'required',
            'no_hp' => 'required',
        ]);

        $data = [
            'nis' => $request->nis,
            'nama' => $request->nama,
            'email' => $request->email,
            'kelas' => $request->kelas,
            'no_hp' => $request->no_hp,
        ];

        // Update password hanya jika disediakan
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $siswa->update($data);

        return redirect()->route('admin.kelolaregistrasi')
            ->with('success', 'Data siswa berhasil diperbarui');
    }

    // Menghapus siswa
    public function destroySiswa($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('admin.kelolaregistrasi')
            ->with('success', 'Data siswa berhasil dihapus');
    }
}