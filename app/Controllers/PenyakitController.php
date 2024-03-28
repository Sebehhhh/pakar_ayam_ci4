<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PenyakitController extends BaseController
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

            // Lakukan permintaan HTTP GET ke endpoint penyakit
            $response = $client->request('GET', 'http://127.0.0.1:8000/penyakit', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json'
                ]
            ]);

            // Periksa apakah permintaan berhasil
            if ($response->getStatusCode() === 200) {
                // Ambil data penyakit dari respons JSON
                $penyakitData = json_decode($response->getBody(), true);

                // Kirim data penyakit ke tampilan
                return view('penyakit/index', ['penyakitData' => $penyakitData]);
            } else {
                // Tanggapi jika permintaan tidak berhasil
                return $this->failServerError('Failed to fetch penyakit data');
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
            $penyakitData = [
                'id' => $this->request->getPost('id'),
                'nama' => $this->request->getPost('nama'),
            ];

            // Buat HTTP client
            $client = \Config\Services::curlrequest();

            // Lakukan permintaan HTTP POST ke endpoint penyakit/store
            $response = $client->request('POST', 'http://127.0.0.1:8000/penyakit/store', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'json' => $penyakitData, // Mengirim data dalam format JSON
            ]);

            // Periksa apakah permintaan berhasil
            if ($response->getStatusCode() === 200) {
                // Set pesan sukses
                $this->setFlashAlert('success', 'Success', 'Penyakit created successfully');
                return redirect()->to('/penyakit');
            } else {
                // Tanggapi jika permintaan tidak berhasil
                $this->setFlashAlert('error', 'Error', 'Failed to create penyakit');
                return redirect()->to('/penyakit');
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
            $penyakitData = [
                'id' => $id,
                'nama' => $this->request->getPost('nama'),
            ];

            // Buat HTTP client
            $client = \Config\Services::curlrequest();

            // Lakukan permintaan HTTP PUT ke endpoint penyakit/update/(id)
            $response = $client->request('PUT', 'http://127.0.0.1:8000/penyakit/update/' . $id, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'json' => $penyakitData, // Mengirim data dalam format JSON
            ]);

            // Periksa apakah permintaan berhasil
            if ($response->getStatusCode() === 200) {
                // Set pesan sukses
                $this->setFlashAlert('success', 'Success', 'Penyakit updated successfully');
                return redirect()->to('/penyakit');
            } else {
                // Tanggapi jika permintaan tidak berhasil
                $this->setFlashAlert('error', 'Error', 'Failed to update penyakit');
                return redirect()->to('/penyakit');
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

            // Lakukan permintaan HTTP DELETE ke endpoint penyakit/delete/(id)
            $response = $client->request('DELETE', 'http://127.0.0.1:8000/penyakit/delete/' . $id, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json',
                ],
            ]);

            // Periksa apakah permintaan berhasil
            if ($response->getStatusCode() === 200) {
                // Set pesan sukses
                $this->setFlashAlert('success', 'Success', 'Penyakit deleted successfully');
                return redirect()->to('/penyakit');
            } else {
                // Tanggapi jika permintaan tidak berhasil
                $this->setFlashAlert('error', 'Error', 'Failed to delete penyakit');
                return redirect()->to('/penyakit');
            }
        } else {
            // Tanggapi jika tidak ada token akses dalam sesi
            return view('errors/html/error_401');
        }
    }
}
