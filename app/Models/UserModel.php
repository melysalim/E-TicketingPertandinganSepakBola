<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Nama tabel
    protected $primaryKey = 'id'; // Kolom primary key
    protected $allowedFields = ['username', 'email', 'password', 'role', 'no_telp']; // Tambahkan 'no_telp'

    // Tambahkan fungsi untuk mengambil user berdasarkan username jika diperlukan
    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
    // Ambil semua customer
    public function getCustomers()
    {
        return $this->where('role', 'customer')->findAll();
    }
}
