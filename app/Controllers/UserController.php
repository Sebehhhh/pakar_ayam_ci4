<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use GuzzleHttp\Client;

class UserController extends BaseController
{
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
        if (session()->has('access_token')) {
            $client = new Client();

            $response = $client->request('GET', 'http://127.0.0.1:8000/api/users');

            $users = json_decode($response->getBody(), true);

            return view('user/index', ['users' => $users]);
        } else {
            return view('errors/html/error_401'); // Redirect ke halaman login misalnya
        }
    }

    public function create()
    {
        if (session()->has('access_token')) {
            $client = new Client();
            // Mengambil data peran (role) dari API
            $responseRoles = $client->request('GET', 'http://127.0.0.1:8000/api/roles');
            $roles = json_decode($responseRoles->getBody(), true);

            return view('user/create', ['roles' => $roles]);
        } else {
            return view('errors/html/error_401'); // Redirect ke halaman login misalnya
        }
    }

    public function store()
    {
        if (session()->has('access_token')) {
            $client = new Client();

            // Ambil data yang dikirimkan melalui form
            $data = [
                'nama' => $this->request->getPost('nama'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'role_id' => $this->request->getPost('role_id'),
            ];

            // Kirim data menggunakan HTTP POST
            $response = $client->request('POST', 'http://127.0.0.1:8000/api/users', [
                'json' => $data,
            ]);
            $this->setFlashAlert('success', 'Berhasil', 'Data Berhasil Ditambahkan');
            // Tampilkan pesan atau alihkan ke halaman lain sesuai kebutuhan
            return redirect()->to('/user');
        } else {
            return view('errors/html/error_401'); // Redirect ke halaman login misalnya
        }
    }

    public function edit($id)
    {
        if (session()->has('access_token')) {
            $client = new Client();
            // Mendapatkan data pengguna yang akan diedit dari API
            $responseUser = $client->request('GET', 'http://127.0.0.1:8000/api/users/' . $id);
            $user = json_decode($responseUser->getBody(), true);

            // Mendapatkan data peran (role) dari API
            $responseRoles = $client->request('GET', 'http://127.0.0.1:8000/api/roles');
            $roles = json_decode($responseRoles->getBody(), true);

            return view('user/edit', ['user' => $user, 'roles' => $roles]);
        } else {
            return view('errors/html/error_401'); // Redirect ke halaman login misalnya
        }
    }

    public function update($id)
    {
        if (session()->has('access_token')) {
            $client = new Client();

            // Ambil data yang dikirimkan melalui form
            $data = [
                'nama' => $this->request->getPost('nama'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'role_id' => $this->request->getPost('role_id'),
            ];

            // Kirim data menggunakan HTTP PUT
            $response = $client->request('PUT', 'http://127.0.0.1:8000/api/users/' . $id, [
                'json' => $data,
            ]);
            $this->setFlashAlert('success', 'Berhasil', 'Data Berhasil Diubah');
            // Tampilkan pesan atau alihkan ke halaman lain sesuai kebutuhan
            return redirect()->to('/user');
        } else {
            return view('errors/html/error_401'); // Redirect ke halaman login misalnya
        }
    }

    public function delete($id)
    {
        if (session()->has('access_token')) {
            $client = new Client();

            // Kirim permintaan HTTP DELETE untuk menghapus data pengguna
            $response = $client->request('DELETE', 'http://127.0.0.1:8000/api/users/' . $id);

            // Periksa kode status respons
            $statusCode = $response->getStatusCode();

            // Jika pengguna berhasil dihapus, tampilkan pesan sukses
            if ($statusCode === 200) {
                $this->setFlashAlert('success', 'Berhasil', 'Data Berhasil Dihapus');
            } else {
                // Jika terjadi kesalahan saat menghapus, tampilkan pesan error
                $this->setFlashAlert('error', 'Gagal', 'Terjadi kesalahan saat menghapus data pengguna');
            }

            // Redirect ke halaman daftar pengguna
            return redirect()->to('/user');
        } else {
            // Jika tidak ada token akses, redirect ke halaman login
            return view('errors/html/error_401');
        }
    }
}
