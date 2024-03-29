<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BasisPengetahuanController extends BaseController
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
            $gejalaResponse = $client->request('GET', 'http://127.0.0.1:8000/gejala', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json'
                ]
            ]);

            // Periksa apakah permintaan gejala berhasil
            if ($gejalaResponse->getStatusCode() === 200) {
                // Ambil data gejala dari respons JSON
                $gejalaData = json_decode($gejalaResponse->getBody(), true);

                // Lakukan permintaan HTTP GET ke endpoint penyakit
                $penyakitResponse = $client->request('GET', 'http://127.0.0.1:8000/penyakit', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $accessToken,
                        'Accept' => 'application/json'
                    ]
                ]);

                // Periksa apakah permintaan penyakit berhasil
                if ($penyakitResponse->getStatusCode() === 200) {
                    // Ambil data penyakit dari respons JSON
                    $penyakitData = json_decode($penyakitResponse->getBody(), true);

                    // Lakukan permintaan HTTP GET ke endpoint basis_pengetahuan
                    $basisPengetahuanResponse = $client->request('GET', 'http://127.0.0.1:8000/basis_pengetahuan', [
                        'headers' => [
                            'Authorization' => 'Bearer ' . $accessToken,
                            'Accept' => 'application/json'
                        ]
                    ]);

                    // Periksa apakah permintaan basis pengetahuan berhasil
                    if ($basisPengetahuanResponse->getStatusCode() === 200) {
                        // Ambil data basis pengetahuan dari respons JSON
                        $basisPengetahuanData = json_decode($basisPengetahuanResponse->getBody(), true);

                        // Kirim data gejala, penyakit, dan basis pengetahuan ke tampilan
                        return view('basis_pengetahuan/index', ['gejalaData' => $gejalaData, 'penyakitData' => $penyakitData, 'basisPengetahuanData' => $basisPengetahuanData]);
                    } else {
                        // Tanggapi jika permintaan basis pengetahuan tidak berhasil
                        return $this->failServerError('Failed to fetch basis pengetahuan data');
                    }
                } else {
                    // Tanggapi jika permintaan penyakit tidak berhasil
                    return $this->failServerError('Failed to fetch penyakit data');
                }
            } else {
                // Tanggapi jika permintaan gejala tidak berhasil
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
                $basisPengetahuanData = [
                    'penyakit_id' => $this->request->getPost('penyakit_id'),
                    'gejala_id' => $this->request->getPost('gejala_id'),
                    'mb' => $this->request->getPost('mb'),
                    'md' => $this->request->getPost('md')
                ];

                // Buat HTTP client
                $client = \Config\Services::curlrequest();

                // Lakukan permintaan HTTP POST ke endpoint basis_pengetahuan/store
                $response = $client->request('POST', 'http://127.0.0.1:8000/basis_pengetahuan/store', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $accessToken,
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                    ],
                    'json' => $basisPengetahuanData, // Mengirim data dalam format JSON
                ]);

                // Periksa apakah permintaan berhasil
                if ($response->getStatusCode() === 200) {
                    // Set pesan sukses
                    $this->setFlashAlert('success', 'Success', 'Basis pengetahuan created successfully');
                    return redirect()->to('/basisPengetahuan');
                } else {
                    // Tanggapi jika permintaan tidak berhasil
                    $this->setFlashAlert('error', 'Error', 'Failed to create basis pengetahuan');
                    return redirect()->to('/basisPengetahuan');
                }
            } else {
                // Tanggapi jika tidak ada token akses dalam sesi
                return view('errors/html/error_401');
            }
        } catch (\Exception $e) {
            // Tangani kesalahan yang terjadi
            $this->setFlashAlert('error', 'Error', 'Data Basis Pengetahuan Sudah Tersedia!');
            return redirect()->to('/basisPengetahuan');
        }
    }


    public function update($id)
    {
        try {
            // Periksa apakah sesi memiliki token akses
            if (session()->has('access_token')) {
                // Ambil token akses dari sesi
                $accessToken = session('access_token');

                // Ambil data yang dikirimkan dari form
                $basisPengetahuanData = [
                    'penyakit_id' => $this->request->getPost('penyakit_id'),
                    'gejala_id' => $this->request->getPost('gejala_id'),
                    'mb' => $this->request->getPost('mb'),
                    'md' => $this->request->getPost('md')
                ];

                // Buat HTTP client
                $client = \Config\Services::curlrequest();

                // Lakukan permintaan HTTP PUT ke endpoint basis_pengetahuan/update/(id)
                $response = $client->request('PUT', 'http://127.0.0.1:8000/basis_pengetahuan/update/' . $id, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $accessToken,
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                    ],
                    'json' => $basisPengetahuanData, // Mengirim data dalam format JSON
                ]);

                // Periksa apakah permintaan berhasil
                if ($response->getStatusCode() === 200) {
                    // Set pesan sukses
                    $this->setFlashAlert('success', 'Success', 'Basis pengetahuan updated successfully');
                    return redirect()->to('/basisPengetahuan');
                } else {
                    // Tanggapi jika permintaan tidak berhasil
                    $this->setFlashAlert('error', 'Error', 'Failed to update basis pengetahuan');
                    return redirect()->to('/basisPengetahuan');
                }
            } else {
                // Tanggapi jika tidak ada token akses dalam sesi
                return view('errors/html/error_401');
            }
        } catch (\Exception $e) {
            // Tangani kesalahan yang terjadi
            $this->setFlashAlert('error', 'Error', 'Data Basis Pengetahuan Sudah Tersedia!!');
            return redirect()->to('/basisPengetahuan');
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

            // Lakukan permintaan HTTP DELETE ke endpoint basis_pengetahuan/delete/(id)
            $response = $client->request('DELETE', 'http://127.0.0.1:8000/basis_pengetahuan/delete/' . $id, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json',
                ],
            ]);

            // Periksa apakah permintaan berhasil
            if ($response->getStatusCode() === 200) {
                // Set pesan sukses
                $this->setFlashAlert('success', 'Success', 'Basis pengetahuan deleted successfully');
                return redirect()->to('/basisPengetahuan');
            } else {
                // Tanggapi jika permintaan tidak berhasil
                $this->setFlashAlert('error', 'Error', 'Failed to delete basis pengetahuan');
                return redirect()->to('/basisPengetahuan');
            }
        } else {
            // Tanggapi jika tidak ada token akses dalam sesi
            return view('errors/html/error_401');
        }
    }
}
