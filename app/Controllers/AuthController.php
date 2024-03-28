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
            session()->set('user_id', $data['user_id']);
            session()->set('role_id', $data['role_id']);

            $this->setFlashAlert('success', 'Success', 'Welcome to Sistem Pakar!');
            return redirect()->to('/dashboard');
        } catch (\Exception $e) {
            $this->setFlashAlert('error', 'Failed', 'Invalid Username or Password');
            return redirect()->back();
        }
    }


    public function logout()
    {

        $client = \Config\Services::curlrequest();
        // Ambil token akses dari sesi
        $access_token = session()->get('access_token');

        // Buat permintaan ke endpoint logout di API FastAPI
        try {
            $response = $client->request('POST', 'http://localhost:8000/auth/logout', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $access_token
                ]
            ]);

            if ($response->getStatusCode() === 200) {

                // Jika berhasil logout, set flash alert, hapus token dari sesi, dan arahkan ke halaman login
                session()->remove('access_token'); // Hapus token dari sesi
                $this->setFlashAlert('success', 'Berhasil', 'Anda sudah logout!');
                return redirect()->to('/login');
            }
        } catch (\Exception $e) {
            // Tangani kesalahan dengan menampilkan pesan kesalahan dan arahkan ke halaman login
            $this->setFlashAlert('error', 'Gagal', 'Terjadi kesalahan saat melakukan logout: ' . $e->getMessage());
            return redirect()->to('/login');
        }
    }
}
