<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Guru;
use Spatie\Activitylog\Models\Activity;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // Redirect jika sudah login
        if (Auth::guard('siswa')->check()) {
            return redirect()->route('siswa.dashboard');
        }

        if (Auth::guard('guru')->check()) {
            return redirect()->route('guru.dashboard');
        }

        return view('login.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:guru,siswa',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'role.required' => 'Role wajib dipilih',
        ]);

        $guard = $request->role;
        $remember = $request->has('remember');

        if (Auth::guard($guard)->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)) {
            $user = Auth::guard($guard)->user();

            // Update last login
            $user->last_login_at = now();
            $user->save();

            // Catat aktivitas login
            activity()
                ->causedBy($user)
                ->withProperties([
                    'ip' => $request->ip(),
                    'user_agent' => $request->userAgent()
                ])
                ->log('Login ke sistem');

            // Regenerate session untuk keamanan
            $request->session()->regenerate();

            // Redirect ke dashboard sesuai role
            $dashboardRoute = $guard . '.dashboard';
            
            // Cek jika route tersedia
            if (\Route::has($dashboardRoute)) {
                return redirect()->intended(route($dashboardRoute));
            }

            return redirect()->route('home')->with('warning', 'Dashboard tidak ditemukan, dialihkan ke halaman utama');
        }

        // Catat percobaan login gagal
        Activity::create([
            'description' => 'Percobaan login gagal',
            'properties' => [
                'email' => $request->email,
                'role' => $guard,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]
        ]);

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email', 'role'));
    }

    public function logout(Request $request)
    {
        $guard = Auth::getDefaultDriver();
        $user = Auth::guard($guard)->user();

        // Catat aktivitas logout
        if ($user) {
            activity()
                ->causedBy($user)
                ->log('Logout dari sistem');
        }

        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Anda telah logout');
    }
}