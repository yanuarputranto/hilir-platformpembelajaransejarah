<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;

class AdminKelolaSistemController extends Controller
{
    public function index()
    {
        // Ambil log aktivitas terbaru
        $logs = Activity::with('causer')
                      ->orderBy('created_at', 'desc')
                      ->paginate(15);

        return view('admin.kelolasistem', compact('logs'));
    }
}