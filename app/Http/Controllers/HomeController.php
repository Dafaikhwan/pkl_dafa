<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- TAMBAH INI

class HomeController extends Controller
{
    /**
     * Buat middleware auth agar hanya user login yang bisa akses
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Tampilkan dashboard berdasarkan role user
     */
    public function index()
    {
        $user = Auth::user(); // Ambil user yang sedang login

        if ($user->isAdmin == 1) {
            return redirect('admin'); // Kalau admin, redirect ke /admin
        } else {
            return view('home'); // Kalau member biasa, tampilkan view home
        }
    }
}
