<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use GuzzleHttp\Client;

class UserController extends BaseController
{
    public function index()
    {
        $client = new Client();

        $response = $client->request('GET', 'http://127.0.0.1:8000/api/users');

        $users = json_decode($response->getBody(), true);

        return view('user/index', ['users' => $users]);
    }
}
