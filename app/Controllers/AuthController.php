<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function index()
    {
        if (session()->has('access_token')) {
            // Jika masih ada session access_token, redirect ke dashboard
            $this->setFlashAlert('error', 'Upsss', 'Anda tidak bisa mengakses halaman login jika sudah melakukan login!');
            return redirect()->to('/dashboard');
        }

        // Jika tidak ada session access_token, tampilkan halaman login
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
        $statusCode = $response->getStatusCode();

        if ($statusCode === 200) {
            $data = json_decode($response->getBody(), true);

            // Simpan token akses dalam sesi
            $session = session();
            $session->set('access_token', $data['access_token']);
            $session->set('id', $data['user_id']);

            $this->setFlashAlert('success', 'Login Berhasil', 'Selamat datang!');
            return redirect()->to('/dashboard');
        } elseif ($statusCode === 401) {
            // Penanganan jika autentikasi gagal
            $this->setFlashAlert('error', 'Login gagal', 'Nama pengguna atau kata sandi salah.');
            return redirect()->to('/');
        } else {
            // Penanganan untuk kode status lainnya
            $this->setFlashAlert('error', 'Login gagal', 'Ada masalah ketika memproses login');
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
