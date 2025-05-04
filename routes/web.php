<?php

use Illuminate\Support\Facades\Route;
use App\Models\Guru;
use App\Models\Siswa;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\Admin\KelolaRegistrasiController;
use App\Http\Controllers\Admin\AdminKelolaLoginController;
use App\Http\Controllers\Admin\AdminKelolaSistemController;

Route::get('/', function () {
    return view('welcome');
})->name('beranda');

Route::get('/tentang-aplikasi', function () {
    return view('tentangaplikasi');
})->name('tentang.aplikasi');

Route::get('/buat-ujian', function () {
    return view('buatujian');
})->name('buat.ujian');

Route::get('/buat-materi', function () {
    return view('buatmateri');
})->name('buat.materi');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::get('/penilaian', function () {
    return view('penilaian');
})->name('penilaian');


// Login Routes
Route::get('/daftar', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('daftar');
Route::post('/daftar', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('daftar.submit');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Grouping route untuk guru
Route::prefix('guru')->middleware(['auth:guru'])->group(function () {
    Route::get('/dashboard', function () {
        return view('guru.dashboard');
    })->name('guru.dashboard');

    Route::get('/buatmateri', function () {
        return view('guru.buatmateri');
    })->name('guru.buatmateri');
    
    Route::get('/buatmateri', [App\Http\Controllers\Guru\MateriController::class, 'create'])
    ->name('guru.buatmateri');

Route::post('/buatmateri', [App\Http\Controllers\Guru\MateriController::class, 'store'])
    ->name('guru.simpanmateri');
    

    Route::get('/buatujian', function () {
        return view('guru.buatujian');
    })->name('guru.buatujian');

    Route::get('/buatujian', [App\Http\Controllers\Guru\UjianController::class, 'create'])
    ->name('guru.buatujian');

Route::post('/buatujian', [App\Http\Controllers\Guru\UjianController::class, 'store'])
    ->name('guru.simpanujian');

    Route::get('/daftarujian', [App\Http\Controllers\Guru\UjianController::class, 'index'])
    ->name('guru.daftarujian');

    Route::get('/ujian/{id}/edit', [App\Http\Controllers\Guru\UjianController::class, 'edit'])
        ->name('guru.editujian');
        
    Route::put('/ujian/{id}', [App\Http\Controllers\Guru\UjianController::class, 'update'])
        ->name('guru.updateujian');
        
    Route::delete('/ujian/{id}', [App\Http\Controllers\Guru\UjianController::class, 'destroy'])
        ->name('guru.hapusujian');

    Route::get('/penilaian', function () {
        return view('guru.penilaian');
    })->name('guru.penilaian');

    Route::post('/chatbot/handle', [ChatbotController::class, 'handle'])
        ->name('chatbot.handle');
    
    Route::get('/chatbot', [ChatbotController::class, 'index'])
        ->name('guru.chatbot');

    
});

// Grouping route untuk siswa
Route::prefix('siswa')->middleware(['auth:siswa'])->group(function () {
    Route::get('/dashboard', function () {
        return view('siswa.dashboard');
    })->name('siswa.dashboard');

    Route::get('/materi', [\App\Http\Controllers\Siswa\MateriController::class, 'index'])->name('siswa.materi');
    
    Route::get('/materi/{id}', [App\Http\Controllers\Siswa\MateriController::class, 'show'])->name('siswa.materidetail');


    Route::get('/ujian', function () {
        return view('siswa.ujian');
    })->name('siswa.ujian');

    Route::get('/ujian', [App\Http\Controllers\Siswa\UjianController::class, 'index'])->name('siswa.ujian');

   // Route untuk menampilkan detail ujian
Route::get('/ujian/{id}', [App\Http\Controllers\Siswa\UjianController::class, 'show'])->name('siswa.ujiandetail');

// Route untuk submit jawaban ujian
Route::post('/ujian/{id}/submit', [App\Http\Controllers\Siswa\UjianController::class, 'submit'])->name('siswa.submitujian');

Route::get('/nilai/{id}', [App\Http\Controllers\Siswa\UjianController::class, 'showResult'])->name('siswa.hasilujian');
   
Route::get('/nilai', [App\Http\Controllers\Siswa\UjianController::class, 'nilai'])->name('siswa.nilai')->middleware('auth:siswa');

Route::post('/chatbot/handle', [ChatbotController::class, 'handle'])
->name('chatbot.handle');

Route::get('/chatbot', [ChatbotController::class, 'index'])
->name('siswa.chatbot');
});

// Route untuk halaman login
Route::get('/admin/login', function () {
    if (session('admin_logged_in')) {
        return redirect()->route('admin.dashboard');
    }
    return view('admin.login');
})->name('admin.login');

// Route untuk proses login
Route::post('/admin/login', function (Illuminate\Http\Request $request) {
    $validCredentials = [
        'email' => 'admin@sejarah.com',
        'password' => 'admin123'
    ];

    if ($request->email === $validCredentials['email'] && 
        $request->password === $validCredentials['password']) {
        session(['admin_logged_in' => true]);
        return redirect()->route('admin.dashboard');
    }

    return back()->with('error', 'Email atau password salah!');
})->name('admin.login.submit');

// Route untuk logout
Route::post('/admin/logout', function () {
    session()->forget('admin_logged_in');
    return redirect()->route('admin.login')->with('success', 'Anda telah berhasil logout');
})->name('admin.logout');

// Semua route admin yang diproteksi
Route::middleware('web')->group(function () {
    // Fungsi untuk mengecek login
    $checkAdmin = function() {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu');
        }
    };

    // Dashboard
    Route::get('/admin/dashboard', function () use ($checkAdmin) {
        if ($redirect = $checkAdmin()) return $redirect;
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Kelola Registrasi
    Route::prefix('/admin/kelolaregistrasi')->group(function () use ($checkAdmin) {
        Route::get('/', function () use ($checkAdmin) {
            if ($redirect = $checkAdmin()) return $redirect;
            return app(App\Http\Controllers\Admin\KelolaRegistrasiController::class)->index();
        })->name('admin.kelolaregistrasi');
        
        // Untuk siswa
        Route::put('/siswa/{id}', function ($id) use ($checkAdmin) {
            if ($redirect = $checkAdmin()) return $redirect;
            return app(App\Http\Controllers\Admin\KelolaRegistrasiController::class)->updateSiswa($id);
        })->name('admin.siswa.update');
        
        Route::delete('/siswa/{id}', function ($id) use ($checkAdmin) {
            if ($redirect = $checkAdmin()) return $redirect;
            return app(App\Http\Controllers\Admin\KelolaRegistrasiController::class)->destroySiswa($id);
        })->name('admin.siswa.destroy');

        // Untuk guru
        Route::put('/guru/{id}', function ($id) use ($checkAdmin) {
            if ($redirect = $checkAdmin()) return $redirect;
            return app(App\Http\Controllers\Admin\KelolaRegistrasiController::class)->updateGuru($id);
        })->name('admin.guru.update');
        
        Route::delete('/guru/{id}', function ($id) use ($checkAdmin) {
            if ($redirect = $checkAdmin()) return $redirect;
            return app(App\Http\Controllers\Admin\KelolaRegistrasiController::class)->destroyGuru($id);
        })->name('admin.guru.destroy');
    });

    // Kelola Sistem
    Route::get('/admin/kelolasistem', function () use ($checkAdmin) {
        if ($redirect = $checkAdmin()) return $redirect;
        return app(App\Http\Controllers\Admin\AdminKelolaSistemController::class)->index();
    })->name('admin.kelolasistem');

    // Kelola Login
    Route::get('/admin/kelolalogin', function () use ($checkAdmin) {
        if ($redirect = $checkAdmin()) return $redirect;
        return app(App\Http\Controllers\Admin\AdminKelolaLoginController::class)->index();
    })->name('admin.kelolalogin');
    
    Route::post('/admin/reset-password/{type}/{id}', function ($type, $id) use ($checkAdmin) {
        if ($redirect = $checkAdmin()) return $redirect;
        return app(App\Http\Controllers\Admin\AdminKelolaLoginController::class)->resetPassword($type, $id);
    })->name('admin.resetpassword');
    
    Route::post('/admin/toggle-status/{type}/{id}', function ($type, $id) use ($checkAdmin) {
        if ($redirect = $checkAdmin()) return $redirect;
        return app(App\Http\Controllers\Admin\AdminKelolaLoginController::class)->toggleStatus($type, $id);
    })->name('admin.togglestatus');
});

