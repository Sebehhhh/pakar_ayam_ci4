<?php

namespace App\Controllers;

use App\Controllers\BaseController;

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
        // Periksa apakah sesi memiliki token akses
        if (session()->has('access_token')) {
            // Ambil token akses dari sesi
            $accessToken = session('access_token');

            // Buat HTTP client
            $client = \Config\Services::curlrequest();

            // Lakukan permintaan HTTP GET ke endpoint role
            $response = $client->request('GET', 'http://127.0.0.1:8000/role', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json'
                ]
            ]);

            // Periksa apakah permintaan berhasil
            if ($response->getStatusCode() === 200) {
                // Ambil data role dari respons JSON
                $rolesData = json_decode($response->getBody(), true);

                // Kirim data role ke tampilan
                return view('role/index', ['rolesData' => $rolesData]);
            } else {
                // Tanggapi jika permintaan tidak berhasil
                return $this->failServerError('Failed to fetch roles data');
            }
        } else {
            // Tanggapi jika tidak ada token akses dalam sesi
            return view('errors/html/error_401');
        }
    }

    public function store()
    {
        // Periksa apakah sesi memiliki token akses
        if (session()->has('access_token')) {
            // Ambil token akses dari sesi
            $accessToken = session('access_token');

            // Ambil data yang dikirimkan dari form
            $roleData = [
                'id' => $this->request->getPost('id'),
                'role' => $this->request->getPost('role'),
            ];

            // Buat HTTP client
            $client = \Config\Services::curlrequest();

            // Lakukan permintaan HTTP POST ke endpoint role/store
            $response = $client->request('POST', 'http://127.0.0.1:8000/role/store', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'json' => $roleData, // Mengirim data dalam format JSON
            ]);

            // Periksa apakah permintaan berhasil
            if ($response->getStatusCode() === 200) {
                // Set pesan sukses
                $this->setFlashAlert('success', 'Success', 'Role created successfully');
                return redirect()->to('/role');
            } else {
                // Tanggapi jika permintaan tidak berhasil
                $this->setFlashAlert('error', 'Error', 'Failed to create role');
                return redirect()->to('/role');
            }
        } else {
            // Tanggapi jika tidak ada token akses dalam sesi
            return view('errors/html/error_401');
        }
    }

    public function update($id)
    {
        // Periksa apakah sesi memiliki token akses
        if (session()->has('access_token')) {
            // Ambil token akses dari sesi
            $accessToken = session('access_token');

            // Ambil data yang dikirimkan dari form
            $roleData = [
                'id' => $id,
                'role' => $this->request->getPost('role'),
            ];

            // Buat HTTP client
            $client = \Config\Services::curlrequest();

            // Lakukan permintaan HTTP PUT ke endpoint role/update/(id)
            $response = $client->request('PUT', 'http://127.0.0.1:8000/role/update/' . $id, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'json' => $roleData, // Mengirim data dalam format JSON
            ]);

            // Periksa apakah permintaan berhasil
            if ($response->getStatusCode() === 200) {
                // Set pesan sukses
                $this->setFlashAlert('success', 'Success', 'Role updated successfully');
                return redirect()->to('/role');
            } else {
                // Tanggapi jika permintaan tidak berhasil
                $this->setFlashAlert('error', 'Error', 'Failed to update role');
                return redirect()->to('/role');
            }
        } else {
            // Tanggapi jika tidak ada token akses dalam sesi
            return view('errors/html/error_401');
        }
    }

    public function delete($id)
    {
        // Periksa apakah sesi memiliki token akses
        if (session()->has('access_token')) {
            // Ambil token akses dari sesi
            $accessToken = session('access_token');

            // Buat HTTP client
            $client = \Config\Services::curlrequest();

            // Lakukan permintaan HTTP DELETE ke endpoint role/delete/(id)
            $response = $client->request('DELETE', 'http://127.0.0.1:8000/role/delete/' . $id, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json',
                ],
            ]);

            // Periksa apakah permintaan berhasil
            if ($response->getStatusCode() === 200) {
                // Set pesan sukses
                $this->setFlashAlert('success', 'Success', 'Role deleted successfully');
                return redirect()->to('/role');
            } else {
                // Tanggapi jika permintaan tidak berhasil
                $this->setFlashAlert('error', 'Error', 'Failed to delete role');
                return redirect()->to('/role');
            }
        } else {
            // Tanggapi jika tidak ada token akses dalam sesi
            return view('errors/html/error_401');
        }
    }
}
