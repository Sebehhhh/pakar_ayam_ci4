<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {

        return view('dashboard'); // Ganti 'dashboard/index' dengan nama file view yang sesuai
    }
}
