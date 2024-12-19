<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin'; // Nama tabel
    protected $primaryKey = 'ID_admin'; // Primary key tabel
    protected $allowedFields = ['username', 'password', 'email', 'created_at']; // Kolom yang dapat diisi

    // Menambahkan validasi untuk data admin
    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[20]|is_unique[admin.username]',
        'password' => 'required|min_length[8]',
        'email' => 'required|valid_email|is_unique[admin.email]',
    ];

    protected $validationMessages = [
        'username' => [
            'required' => 'Username harus diisi.',
            'min_length' => 'Username harus minimal 3 karakter.',
            'max_length' => 'Username harus maksimal 20 karakter.',
            'is_unique' => 'Username sudah terdaftar.'
        ],
        'password' => [
            'required' => 'Password harus diisi.',
            'min_length' => 'Password harus minimal 8 karakter.'
        ],
        'email' => [
            'required' => 'Email harus diisi.',
            'valid_email' => 'Email tidak valid.',
            'is_unique' => 'Email sudah terdaftar.'
        ],
    ];
}
