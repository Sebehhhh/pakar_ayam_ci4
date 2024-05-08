<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DiagnosisController extends BaseController
{
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

            // Periksa apakah permintaan berhasil
            if ($response->getStatusCode() === 200) {
                // Ambil data gejala dari respons JSON
                $gejalaData = json_decode($response->getBody(), true);

                // Kirim data gejala ke tampilan
                return view('diagnosis/index', ['gejalaData' => $gejalaData]);
            } else {
                // Tanggapi jika permintaan tidak berhasil
                return $this->failServerError('Failed to fetch gejala data');
            }
        } else {
            // Tanggapi jika tidak ada token akses dalam sesi
            return view('errors/html/error_401');
        }
    }

    public function proses()
    {
        // Periksa apakah sesi memiliki token akses
        if (session()->has('access_token')) {
            // Ambil token akses dari sesi
            $accessToken = session('access_token');

            // Ambil data dari form
            $kondisi = $this->request->getPost('kondisi');
            // dd($kondisi);
            // Filter kondisi yang memiliki bobot tidak sama dengan 0
            $kondisi = array_filter($kondisi, function ($item) {
                return $item['bobot'] != 0.0;
            });

            // Buat data yang akan dikirim ke API diagnosis
            $data = [
                'kondisi' => array_values($kondisi), // Menghilangkan kunci asosiatif
                'threshold' => 0.5
            ];

            // dd($data);
            // Buat HTTP client
            $client = \Config\Services::curlrequest();

            // Lakukan permintaan HTTP POST ke endpoint diagnosis/proses
            $response = $client->request('POST', 'http://127.0.0.1:8000/diagnosis', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'json' => $data, // Mengirim data dalam format JSON
            ]);

            // Periksa apakah permintaan berhasil
            if ($response->getStatusCode() === 200) {
                // Ambil hasil diagnosis dari respons JSON
                $result = json_decode($response->getBody(), true);

                // Redirect ke view hasil/index dengan membawa data hasil diagnosis
                return view('diagnosis/hasil', ['result' => $result]);
            } else {
                // Tanggapi jika permintaan tidak berhasil
                return $this->failServerError('Failed to process diagnosis');
            }
        } else {
            // Tanggapi jika tidak ada token akses dalam sesi
            return view('errors/html/error_401');
        }
    }
}
