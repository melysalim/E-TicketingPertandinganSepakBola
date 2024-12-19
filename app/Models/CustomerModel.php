<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customer'; // Nama tabel
    protected $primaryKey = 'ID_customer'; // Primary key tabel
    protected $allowedFields = ['Nama', 'Email', 'No_Telp', 'Alamat', 'created_at']; // Kolom yang dapat diisi

    // Menambahkan validasi untuk data customer
    protected $validationRules = [
        'Nama' => 'required|min_length[3]|max_length[100]',
        'Email' => 'required|valid_email|is_unique[customer.Email]',
        'No_Telp' => 'required|max_length[15]',
        'Alamat' => 'required|max_length[100]',
    ];

    protected $validationMessages = [
        'Nama' => [
            'required' => 'Nama harus diisi.',
            'min_length' => 'Nama harus minimal 3 karakter.',
            'max_length' => 'Nama harus maksimal 100 karakter.'
        ],
        'Email' => [
            'required' => 'Email harus diisi.',
            'valid_email' => 'Email tidak valid.',
            'is_unique' => 'Email sudah terdaftar.'
        ],
        'No_Telp' => [
            'required' => 'Nomor telepon harus diisi.',
            'max_length' => 'Nomor telepon maksimal 15 karakter.'
        ],
        'Alamat' => [
            'required' => 'Alamat harus diisi.',
            'max_length' => 'Alamat maksimal 100 karakter.'
        ],
    ];
}
