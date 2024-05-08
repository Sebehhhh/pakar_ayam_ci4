<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class GejalaController extends BaseController
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

            // Lakukan permintaan HTTP GET ke endpoint gejala
            $response = $client->request('GET', 'http://127.0.0.1:8000/gejala', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json'
                ]
            ]);

            if ($response->getStatusCode() === 200) {
                // Ambil data gejala dari respons JSON
                $gejalaData = json_decode($response->getBody(), true);

                // Kirim data gejala ke tampilan
                return view('gejala/index', ['gejalaData' => $gejalaData]);
            } else {
                // Tanggapi jika permintaan tidak berhasil
                return $this->failServerError('Failed to fetch gejala data');
            }
        } else {
            // Tanggapi jika tidak ada token akses dalam sesi
            return view('errors/html/error_401');
        }
    }

    public function store()
    {
        try {
            // Periksa apakah sesi memiliki token akses
            if (session()->has('access_token')) {
                // Ambil token akses dari sesi
                $accessToken = session('access_token');

                // Ambil data yang dikirimkan dari form
                $gejalaData = [
                    'id' => $this->request->getPost('id'),
                    'nama' => $this->request->getPost('nama'),
                ];

                // Buat HTTP client
                $client = \Config\Services::curlrequest();

                // Lakukan permintaan HTTP POST ke endpoint gejala/store
                $response = $client->request('POST', 'http://127.0.0.1:8000/gejala/store', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $accessToken,
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                    ],
                    'json' => $gejalaData, // Mengirim data dalam format JSON
                ]);

                // Periksa apakah permintaan berhasil
                if ($response->getStatusCode() === 200) {
                    // Set pesan sukses
                    $this->setFlashAlert('success', 'Success', 'Gejala created successfully');
                    return redirect()->to('/gejala');
                } else {
                    // Tanggapi jika permintaan tidak berhasil
                    $this->setFlashAlert('error', 'Error', 'Failed to create gejala');
                    return redirect()->to('/gejala');
                }
            } else {
                // Tanggapi jika tidak ada token akses dalam sesi
                return view('errors/html/error_401');
            }
        } catch (\Exception $e) {
            // Tanggapi jika terjadi kesalahan
            $this->setFlashAlert('error', 'Error', 'Data yang anda kirimkan tidak sah!!');
            return redirect()->to('/gejala');
        }
    }

    public function update($id)
    {
        try {
            if (session()->has('access_token')) {
                // Ambil token akses dari sesi
                $accessToken = session('access_token');

                // Ambil data yang dikirimkan dari form
                $gejalaData = [
                    'id' => $id,
                    'nama' => $this->request->getPost('nama'),
                ];

                // Buat HTTP client
                $client = \Config\Services::curlrequest();

                $response = $client->request('PUT', 'http://127.0.0.1:8000/gejala/update/' . $id, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $accessToken,
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                    ],
                    'json' => $gejalaData,
                ]);

                if ($response->getStatusCode() === 200) {
                    // Set pesan sukses
                    $this->setFlashAlert('success', 'Success', 'Gejala updated successfully');
                    return redirect()->to('/gejala');
                } else {
                    // Tanggapi jika permintaan tidak berhasil
                    $this->setFlashAlert('error', 'Error', 'Failed to update gejala');
                    return redirect()->to('/gejala');
                }
            } else {
                return view('errors/html/error_401');
            }
        } catch (\Exception $e) {
            // Tanggapi jika terjadi kesalahan
            $this->setFlashAlert('error', 'Error', 'Data yang anda masukkan tidak sah!');
            return redirect()->to('/gejala');
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

            // Lakukan permintaan HTTP DELETE ke endpoint gejala/delete/(id)
            $response = $client->request('DELETE', 'http://127.0.0.1:8000/gejala/delete/' . $id, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json',
                ],
            ]);

            // Periksa apakah permintaan berhasil
            if ($response->getStatusCode() === 200) {
                // Set pesan sukses
                $this->setFlashAlert('success', 'Success', 'Gejala deleted successfully');
                return redirect()->to('/gejala');
            } else {
                // Tanggapi jika permintaan tidak berhasil
                $this->setFlashAlert('error', 'Error', 'Failed to delete gejala');
                return redirect()->to('/gejala');
            }
        } else {
            // Tanggapi jika tidak ada token akses dalam sesi
            return view('errors/html/error_401');
        }
    }
}
