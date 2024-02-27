<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use GuzzleHttp\Client;

class RoleController extends BaseController
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

            $response = $client->request('GET', 'http://127.0.0.1:8000/api/roles');

            $roles = json_decode($response->getBody(), true);

            return view('role/index', ['roles' => $roles]);
        } else {
            return view('errors/html/error_401'); // Redirect ke halaman login misalnya
        }
    }

    public function create()
    {
        if (session()->has('access_token')) {
            return view('role/create');
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
                'role' => $this->request->getPost('role'),
            ];

            // Kirim data menggunakan HTTP POST
            $response = $client->request('POST', 'http://127.0.0.1:8000/api/roles', [
                'json' => $data,
            ]);
            $this->setFlashAlert('success', 'Berhasil', 'Data Berhasil Ditambahkan');
            // Tampilkan pesan atau alihkan ke halaman lain sesuai kebutuhan
            return redirect()->to('/role');
        } else {
            return view('errors/html/error_401'); // Redirect ke halaman login misalnya
        }
    }

    public function edit($id)
    {
        if (session()->has('access_token')) {
            $client = new Client();
            // Mendapatkan data role yang akan diedit dari API
            $responseRole = $client->request('GET', 'http://127.0.0.1:8000/api/roles/' . $id);
            $role = json_decode($responseRole->getBody(), true);

            return view('role/edit', ['role' => $role]);
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
                'role' => $this->request->getPost('role'),
            ];

            // Kirim data menggunakan HTTP PUT
            $response = $client->request('PUT', 'http://127.0.0.1:8000/api/roles/' . $id, [
                'json' => $data,
            ]);
            $this->setFlashAlert('success', 'Berhasil', 'Data Berhasil Diubah');
            // Tampilkan pesan atau alihkan ke halaman lain sesuai kebutuhan
            return redirect()->to('/role');
        } else {
            return view('errors/html/error_401'); // Redirect ke halaman login misalnya
        }
    }

    public function delete($id)
    {
        if (session()->has('access_token')) {
            $client = new Client();

            // Kirim permintaan HTTP DELETE untuk menghapus data role
            $response = $client->request('DELETE', 'http://127.0.0.1:8000/api/roles/' . $id);

            // Periksa kode status respons
            $statusCode = $response->getStatusCode();

            // Jika role berhasil dihapus, tampilkan pesan sukses
            if ($statusCode === 200) {
                $this->setFlashAlert('success', 'Berhasil', 'Data Berhasil Dihapus');
            } else {
                // Jika terjadi kesalahan saat menghapus, tampilkan pesan error
                $this->setFlashAlert('error', 'Gagal', 'Terjadi kesalahan saat menghapus data role');
            }

            // Redirect ke halaman daftar role
            return redirect()->to('/role');
        } else {
            // Jika tidak ada token akses, redirect ke halaman login
            return view('errors/html/error_401');
        }
    }
}
