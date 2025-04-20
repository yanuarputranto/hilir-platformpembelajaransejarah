<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:guru,siswa',
            'nip' => 'required_if:role,guru|nullable|unique:gurus,nip',
            'nis' => 'required_if:role,siswa|nullable|unique:siswas,nis',
            'alamat' => 'required_if:role,guru|nullable',
            'no_telp' => 'required_if:role,guru|nullable'
        ]);

        // Create user
        $user = User::create([
            'name' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        // Create record in respective table
        if ($validatedData['role'] == 'guru') {
            Guru::create([
                'user_id' => $user->id,
                'nip' => $validatedData['nip'],
                'nama_lengkap' => $validatedData['nama_lengkap'],
                'alamat' => $validatedData['alamat'],
                'no_telp' => $validatedData['no_telp']
            ]);
        } else {
            Siswa::create([
                'user_id' => $user->id,
                'nis' => $validatedData['nip'],
                'nama_lengkap' => $validatedData['nama_lengkap'],
                'kelas' => $validatedData['kelas'],
                'alamat' => $validatedData['alamat'],
                'no_telp' => $validatedData['no_telp']
            ]);
        }

        auth()->login($user);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil!');
    }
    
    
}