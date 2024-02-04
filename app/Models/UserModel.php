<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user'; // Ganti dengan nama tabel user pada database Anda
    protected $primaryKey = 'id'; // Ganti dengan nama primary key pada tabel user

    protected $allowedFields = ['username', 'password', 'nama', 'level']; // Sesuaikan dengan struktur kolom pada tabel user
}
