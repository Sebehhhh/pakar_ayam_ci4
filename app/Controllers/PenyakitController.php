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
        try {
            // Periksa apakah sesi memiliki token akses
            if (session()->has('access_token')) {
                // Ambil token akses dari sesi
                $accessToken = session('access_token');

                // Ambil data yang dikirimkan dari form
                $nama = $this->request->getPost('nama');
                $detail = $this->request->getPost('detail');
                $saran = $this->request->getPost('saran');
                $gambar = $this->request->getFile('gambar'); // Ambil file gambar dari form

                // Periksa apakah file gambar dikirimkan
                if ($gambar->isValid()) {
                    // Validasi jenis file gambar (hanya webp yang diizinkan)
                    if ($gambar->getClientMimeType() === 'image/webp') {
                        // Simpan file gambar ke direktori publik
                        $gambar->move(ROOTPATH . 'public/uploads/penyakit');

                        // Buat nama file untuk disimpan ke API
                        $namaGambar = $gambar->getName();
                    } else {
                        // Jika jenis file gambar tidak valid
                        $this->setFlashAlert('error', 'Error', 'Gambar Tidak Valid, hanya .WEBP Yang Diizinkan!');
                        return redirect()->to('/penyakit');
                    }
                } else {
                    // Jika gambar tidak dikirimkan, gunakan nilai kosong
                    $namaGambar = '';
                }

                // Data yang akan dikirim ke API
                $penyakitData = [
                    'nama' => $nama,
                    'detail' => $detail,
                    'saran' => $saran,
                    'gambar' => $namaGambar, // Kirim nama file gambar ke API
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
        } catch (\Exception $e) {
            // Tanggapi jika terjadi kesalahan
            $this->setFlashAlert('error', 'Error', 'Data yang anda masukkan tidak sah!');
            return redirect()->to('/penyakit');
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
                $nama = $this->request->getPost('nama');
                $detail = $this->request->getPost('detail');
                $saran = $this->request->getPost('saran');
                $gambar = $this->request->getFile('gambar'); // Ambil file gambar dari form

                // Buat HTTP client
                $client = \Config\Services::curlrequest();

                // Lakukan pemanggilan API untuk mendapatkan data penyakit berdasarkan ID
                $response = $client->request('GET', 'http://127.0.0.1:8000/penyakit/' . $id, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $accessToken,
                        'Accept' => 'application/json',
                    ],
                ]);

                // Periksa apakah permintaan berhasil
                if ($response->getStatusCode() === 200) {
                    $penyakit = json_decode($response->getBody(), true);

                    // Ambil nama gambar lama
                    $namaGambarLama = $penyakit['gambar'];

                    // Periksa apakah file gambar baru dikirimkan
                    if ($gambar->isValid()) {
                        // Validasi jenis file gambar (hanya webp yang diizinkan)
                        if ($gambar->getClientMimeType() === 'image/webp') {
                            // Hapus gambar lama jika ada
                            if (!empty($namaGambarLama)) {
                                unlink(ROOTPATH . 'public/uploads/penyakit/' . $namaGambarLama);
                            }

                            // Simpan file gambar baru ke direktori publik
                            $gambar->move(ROOTPATH . 'public/uploads/penyakit');

                            // Simpan nama file gambar baru
                            $namaGambarBaru = $gambar->getName();
                        } else {
                            // Jika jenis file gambar tidak valid
                            $this->setFlashAlert('error', 'Error', 'Gambar Tidak Valid, hanya .WEBP Yang Diizinkan!');
                            return redirect()->to('/penyakit');
                        }
                    } else {
                        // Jika gambar tidak dikirimkan, gunakan nama gambar lama
                        $namaGambarBaru = $namaGambarLama;
                    }

                    // Data yang akan dikirim ke API
                    $penyakitData = [
                        'nama' => $nama,
                        'detail' => $detail,
                        'saran' => $saran,
                        'gambar' => $namaGambarBaru, // Kirim nama file gambar baru ke API
                    ];

                    // Lakukan permintaan HTTP PUT ke endpoint penyakit/update/{id}
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
                    // Tanggapi jika tidak dapat mengambil data penyakit
                    $this->setFlashAlert('error', 'Error', 'Failed to retrieve penyakit data');
                    return redirect()->to('/penyakit');
                }
            } else {
                // Tanggapi jika tidak ada token akses dalam sesi
                return view('errors/html/error_401');
            }
        } catch (\Exception $e) {
            // Tanggapi jika terjadi kesalahan
            $this->setFlashAlert('error', 'Error', 'Data yang anda masukkan tidak sah!');
            return redirect()->to('/penyakit');
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

                // Hapus gambar jika respons sukses
                $responseBody = json_decode($response->getBody());
                if (isset($responseBody->gambar)) {
                    $gambarPath = ROOTPATH . 'public/uploads/penyakit/' . $responseBody->gambar;
                    if (file_exists($gambarPath)) {
                        unlink($gambarPath); // Hapus gambar dari server
                    }
                }
                // dd($gambarPath);
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
