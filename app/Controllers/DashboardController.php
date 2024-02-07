<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Memeriksa apakah session telah diset
        if (session()->has('access_token')) {
            // Jika session ditemukan, kirim ke tampilan dengan data session
            $data['access_token'] = session('access_token');
            return view('dashboard', $data); // Ganti 'dashboard' dengan nama file view yang sesuai
        } else {
            // Jika session tidak ditemukan, lakukan sesuai kebutuhan aplikasi Anda
            return view('errors/html/error_401'); // Redirect ke halaman login misalnya
        }
    }
}
