<?php

namespace App\Controllers;

use App\Controllers\BaseController;

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
        // Periksa apakah sesi memiliki token akses
        if (session()->has('access_token')) {
            // Ambil token akses dari sesi
            $accessToken = session('access_token');

            // Buat HTTP client
            $client = \Config\Services::curlrequest();

            // Lakukan permintaan HTTP GET ke endpoint user
            $response = $client->request('GET', 'http://127.0.0.1:8000/user', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json'
                ]
            ]);

            // Periksa apakah permintaan berhasil
            if ($response->getStatusCode() === 200) {
                // Ambil data pengguna dari respons JSON
                $userData = json_decode($response->getBody(), true);

                // Lakukan permintaan HTTP GET ke endpoint roles
                $rolesResponse = $client->request('GET', 'http://127.0.0.1:8000/role', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $accessToken,
                        'Accept' => 'application/json'
                    ]
                ]);

                // Periksa apakah permintaan peran berhasil
                if ($rolesResponse->getStatusCode() === 200) {
                    // Ambil data peran dari respons JSON
                    $rolesData = json_decode($rolesResponse->getBody(), true);
                    // dd($rolesData);
                    // Kirim data pengguna dan data peran ke tampilan
                    return view('user/index', ['userData' => $userData, 'rolesData' => $rolesData]);
                } else {
                    // Tanggapi jika permintaan peran tidak berhasil
                    return $this->failServerError('Failed to fetch roles data');
                }
            } else {
                // Tanggapi jika permintaan tidak berhasil
                return $this->failServerError('Failed to fetch user data');
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
            $userData = [
                'nama' => $this->request->getPost('nama'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'role_id' => $this->request->getPost('role_id'),
            ];
            // dd($userData);
            // Buat HTTP client
            $client = \Config\Services::curlrequest();


            // Lakukan permintaan HTTP POST ke endpoint user/store
            $response = $client->request('POST', 'http://127.0.0.1:8000/user/store', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'json' => $userData, // Mengirim data dalam format JSON
            ]);

            // Periksa apakah permintaan berhasil
            if ($response->getStatusCode() === 200) {
                // Set pesan sukses
                $this->setFlashAlert('success', 'Success', 'User created successfully');
                return redirect()->to('/user');
            } else {
                // Tanggapi jika permintaan tidak berhasil
                $this->setFlashAlert('error', 'Error', 'Failed to create user');
                return redirect()->to('/user');
            }

            // Redirect kembali ke halaman create
            return redirect()->to('/user/create');
        } else {
            // Tanggapi jika tidak ada token akses dalam sesi
            return view('errors/html/error_401');
        }
    }

    public function edit($id)
    {
        // Periksa apakah sesi memiliki token akses
        if (session()->has('access_token')) {
            // Ambil token akses dari sesi
            $accessToken = session('access_token');

            // Buat HTTP client
            $client = \Config\Services::curlrequest();


            // Lakukan permintaan HTTP GET ke endpoint user dengan id tertentu
            $responseUser = $client->request('GET', 'http://127.0.0.1:8000/user/' . $id, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json'
                ]
            ]);
            $responseRole = $client->request('GET', 'http://127.0.0.1:8000/role', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json'
                ]
            ]);

            // Periksa apakah permintaan berhasil
            if ($responseUser->getStatusCode() === 200 && $responseRole->getStatusCode() === 200) {
                // Ambil data pengguna dari respons JSON
                $userData = json_decode($responseUser->getBody(), true);
                $rolesData = json_decode($responseRole->getBody(), true);
                // dd($rolesData);
                // Tampilkan form edit user beserta data pengguna yang akan diedit
                return view('user/edit', ['userData' => $userData, 'rolesData' => $rolesData]);
            } else {
                // Tanggapi jika permintaan tidak berhasil
                return $this->failServerError('Failed to fetch user data for editing');
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
            $userData = [
                'nama' => $this->request->getPost('nama'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'role_id' => $this->request->getPost('role_id'),
            ];

            // Buat HTTP client
            $client = \Config\Services::curlrequest();
            // dd($userData);
            // Lakukan permintaan HTTP PUT ke endpoint user/update/(id)
            $response = $client->request('PUT', 'http://127.0.0.1:8000/user/update/' . $id, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'json' => $userData, // Mengirim data dalam format JSON
            ]);

            // Periksa apakah permintaan berhasil
            if ($response->getStatusCode() === 200) {
                // Set pesan sukses
                $this->setFlashAlert('success', 'Success', 'User updated successfully');
                return redirect()->to('/user');
            } else {
                // Tanggapi jika permintaan tidak berhasil
                $this->setFlashAlert('error', 'Error', 'Failed to update user');
                return redirect()->to('/user');
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

            // Lakukan permintaan HTTP DELETE ke endpoint user/delete/(id)
            $response = $client->request('DELETE', 'http://127.0.0.1:8000/user/delete/' . $id, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json',
                ],
            ]);

            // Periksa apakah permintaan berhasil
            if ($response->getStatusCode() === 200) {
                // Set pesan sukses
                $this->setFlashAlert('success', 'Success', 'User deleted successfully');
                return redirect()->to('/user');
            } else {
                // Tanggapi jika permintaan tidak berhasil
                $this->setFlashAlert('error', 'Error', 'Failed to delete user');
                return redirect()->to('/user');
            }
        } else {
            // Tanggapi jika tidak ada token akses dalam sesi
            return view('errors/html/error_401');
        }
    }
}
