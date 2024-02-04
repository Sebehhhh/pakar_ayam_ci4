<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        // Ambil data dari form login
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validasi data
        $validationRules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            // Jika validasi gagal, kembalikan ke halaman login
            return redirect()->to('/')->withInput()->with('validation', $this->validator);
        }

        // Cek keberadaan user dalam database
        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if (!$user || $password !== $user['password']) {
            return redirect()->to('/')->with('error', 'data tidak ditemukan');
        }

        // Jika user ditemukan, set session dan redirect ke halaman beranda
        session()->set('user_id', $user['id']);
        return redirect()->to('/dashboard')->with('success', 'login berhasil');
    }

    public function logout()
    {
        // Hapus session user_id
        session()->remove('user_id');

        // Redirect ke halaman login dengan pesan logout berhasil
        return redirect()->to('/login')->with('success', 'Logout berhasil');
    }
}
