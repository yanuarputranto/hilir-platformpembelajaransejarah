<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
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

    // Menampilkan semua guru
    public function index()
    {
        $guru = Guru::all();
        return view('admin.guru.index', compact('guru'));
    }

    // Menampilkan form untuk membuat guru baru
    public function create()
    {
        return view('admin.guru.create');
    }

    // Menyimpan guru baru ke database
    public function store(Request $request)
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

        return redirect()->route('admin.guru.index')
            ->with('success', 'Guru berhasil ditambahkan');
    }

    // Menampilkan detail guru
    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return view('admin.guru.show', compact('guru'));
    }

    // Menampilkan form untuk mengedit guru
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('admin.guru.edit', compact('guru'));
    }

    // Memperbarui data guru di database
    public function update(Request $request, $id)
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

        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil diperbarui');
    }

    // Menghapus guru dari database
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('admin.guru.index')
            ->with('success', 'Guru berhasil dihapus');
    }
}