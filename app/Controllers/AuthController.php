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
            // Jika validasi gagal, tampilkan Sweet Alert
            $this->setFlashAlert('error', 'Validasi gagal', 'Silakan isi semua kolom dengan benar.');
            return redirect()->to('/')->withInput()->with('validation', $this->validator);
        }

        // Kirim permintaan login ke API
        $client = \Config\Services::curlrequest();
        $response = $client->request('POST', 'http://127.0.0.1:8000/api/token', [
            'form_params' => [
                'username' => $username,
                'password' => $password
            ]
        ]);

        // Tangani respons dari API
        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody(), true);

            // Simpan token akses dalam sesi
            $session = session();

            // Tetapkan waktu kedaluwarsa sesi menjadi 30 menit dari sekarang
            $expireTime = time() + (30 * 60); // 30 menit * 60 detik
            $session->set('expire_time', $expireTime);
            $session->set('access_token', $data['access_token']);
            $session->set('id', $data['user_id']);

            $this->setFlashAlert('success', 'Login Berhasil', 'Selamat datang!');
            return redirect()->to('/dashboard');
        } else {
            // Tangani kasus jika login gagal
            $this->setFlashAlert('error', 'Login gagal', 'Username atau password salah.');
            return redirect()->to('/');
        }
    }


    private function setFlashAlert($type, $title, $message)
    {
        // Set Sweet Alert menggunakan session flashdata
        session()->setFlashdata('alert', [
            'type' => $type,
            'title' => $title,
            'message' => $message
        ]);
    }

    public function logout()
    {
        // Menghapus sesi access_token
        $session = session();
        $session->remove('access_token');

        // Menghapus sesi expire_time jika ada
        $session->remove('expire_time');

        $this->setFlashAlert('success', 'Logout Berhasil', 'Sesi anda telah berakhir');
        return redirect()->to('/')->with('success', 'Logout berhasil');
    }
}
