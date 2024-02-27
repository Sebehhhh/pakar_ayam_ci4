<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;

class AuthController extends Controller
{
    use ResponseTrait;

    private function setFlashAlert($type, $title, $message)
    {
        // Set Sweet Alert menggunakan session flashdata
        session()->setFlashdata('alert', [
            'type' => $type,
            'title' => $title,
            'message' => $message
        ]);
    }

    public function index()
    {
        // Tampilkan halaman login
        return view('login');
    }

    public function login()
    {
        $request = \Config\Services::request();
        $client = \Config\Services::curlrequest();

        $username = $request->getPost('username');
        $password = $request->getPost('password');

        try {
            $response = $client->request('POST', 'http://localhost:8000/auth/token', [
                'form_params' => [
                    'username' => $username,
                    'password' => $password
                ]
            ]);

            $data = json_decode($response->getBody(), true);


            // Token diterima, simpan token di sesi
            session()->set('access_token', $data['access_token']);

            $this->setFlashAlert('success', 'Success', 'Welcome to Sistem Pakar!');
            return redirect()->to('/dashboard');
        } catch (\Exception $e) {
            $this->setFlashAlert('error', 'Failed', 'Invalid Username or Password');
            return redirect()->back();
        }
    }


    public function logout()
    {
        // Periksa apakah token akses tersedia di sesi
        if (session()->has('access_token')) {
            // Ambil token akses dari sesi
            $access_token = session()->get('access_token');

            // Buat permintaan ke endpoint logout di API FastAPI
            $client = \Config\Services::curlrequest();
            $response = $client->request('POST', 'http://localhost:8000/auth/logout', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $access_token
                ]
            ]);

            // Periksa kode status respons untuk memastikan logout berhasil
            if ($response->getStatusCode() === 200) {
                // Jika berhasil, hapus token akses dari sesi
                session()->remove('access_token');
            }
        }

        $this->setFlashAlert('success', 'Berhasil', 'Anda sudah logout!');
        return redirect()->to('/login');
    }
}
