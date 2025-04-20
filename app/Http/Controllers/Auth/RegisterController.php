<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('login.daftar');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:gurus,email|unique:siswas,email',
            'no_hp' => 'required|string|max:20',
            'role' => 'required|in:guru,siswa',
            'kelas' => 'required_if:role,siswa|nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Validasi khusus NIP/NIS
        if ($request->role === 'guru') {
            $validator->addRules([
                'nip_nis' => 'required|string|max:50|unique:gurus,nip',
            ]);
        } else {
            $validator->addRules([
                'nip_nis' => 'required|string|max:50|unique:siswas,nis',
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->role === 'guru') {
            Guru::create([
                'nip' => $request->nip_nis,
                'nama' => $request->nama,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'password' => Hash::make($request->password),
            ]);
        } else {
            Siswa::create([
                'nis' => $request->nip_nis,
                'nama' => $request->nama,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'kelas' => $request->kelas,
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}