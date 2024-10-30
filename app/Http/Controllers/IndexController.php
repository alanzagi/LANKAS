<?php

namespace App\Http\Controllers;

use App\Models\Siswa; // Pastikan model Siswa sudah diimport
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import facade Auth jika belum
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    public function showDashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $siswa = Siswa::count(); // Mengambil semua data siswa

        return view('index', [
            'title' => 'Dashboard',
            'siswa' => $siswa, // Mengirim variabel siswa ke view
        ]);
    }
}
