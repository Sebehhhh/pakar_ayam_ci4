<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'role'; // Ganti dengan nama tabel role pada database Anda
    protected $primaryKey = 'id'; // Ganti dengan nama primary key pada tabel role

    protected $allowedFields = ['role']; // Sesuaikan dengan struktur kolom pada tabel role
}
