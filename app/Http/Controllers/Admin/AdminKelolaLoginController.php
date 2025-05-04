<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AdminKelolaLoginController extends Controller
{
    public function index()
    {
        // Ambil data siswa dan guru
        $siswas = Siswa::select('id', 'nis', 'nama', 'email', 'status_akun', 'last_login_at')
                      ->orderBy('nama')
                      ->get()
                      ->map(function($item) {
                          $item->role = 'Siswa';
                          return $item;
                      });

        $gurus = Guru::select('id', 'nip', 'nama', 'email', 'status_akun', 'last_login_at')
                    ->orderBy('nama')
                    ->get()
                    ->map(function($item) {
                        $item->role = 'Guru';
                        return $item;
                    });

        // Gabungkan koleksi
        $users = $siswas->concat($gurus);


        return view('admin.kelolalogin', compact('users'));
    }

    public function resetPassword(Request $request, $type, $id)
    {
        $request->validate([
            'new_password' => 'required|min:8|confirmed'
        ]);

        try {
            if ($type === 'siswa') {
                $user = Siswa::findOrFail($id);
            } else {
                $user = Guru::findOrFail($id);
            }

            $user->password = bcrypt($request->new_password);
            $user->save();

            return back()->with('success', 'Password berhasil direset');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mereset password');
        }
    }

    public function toggleStatus($type, $id)
    {
        try {
            if ($type === 'siswa') {
                $user = Siswa::findOrFail($id);
            } else {
                $user = Guru::findOrFail($id);
            }

            $user->status_akun = $user->status_akun === 'aktif' ? 'diblokir' : 'aktif';
            $user->save();

            $action = $user->status_akun === 'aktif' ? 'diaktifkan' : 'diblokir';
            return back()->with('success', "Akun berhasil $action");
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengubah status akun');
        }
    }
}