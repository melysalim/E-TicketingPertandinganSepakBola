<?php
namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    // Nama tabel yang digunakan di database
    protected $table = 'jadwal';

    // Kolom-kolom yang diizinkan untuk dimasukkan atau diperbarui
    protected $allowedFields = ['tim_a', 'tim_b', 'logo_tim_a', 'logo_tim_b', 'tanggal', 'waktu', 'lokasi', 'harga_tiket'];

    // Kolom yang digunakan sebagai primary key
    protected $primaryKey = 'id';

    // Mengatur validasi untuk kolom
    protected $validationRules = [
        'tim_a' => 'required|max_length[100]',
        'tim_b' => 'required|max_length[100]',
        'logo_tim_a' => 'max_length[255]', // Menjadikan logo opsional jika tidak ada file baru
        'logo_tim_b' => 'max_length[255]', // Menjadikan logo opsional jika tidak ada file baru
        'tanggal' => 'required|valid_date[Y-m-d]',
        'waktu' => 'required|regex_match[/^([01]?[0-9]|2[0-3]):([0-5][0-9])$/]',  // Validasi waktu (HH:MM)
        'lokasi' => 'required|max_length[255]',
        'harga_tiket' => 'required|integer',
    ];

    // Pesan kesalahan jika validasi gagal
    protected $validationMessages = [
        'tim_a' => [
            'required' => 'Tim A harus diisi.',
            'max_length' => 'Tim A maksimal 100 karakter.',
        ],
        'tim_b' => [
            'required' => 'Tim B harus diisi.',
            'max_length' => 'Tim B maksimal 100 karakter.',
        ],
        'logo_tim_a' => [
            'max_length' => 'Logo Tim A maksimal 255 karakter.',
        ],
        'logo_tim_b' => [
            'max_length' => 'Logo Tim B maksimal 255 karakter.',
        ],
        'tanggal' => [
            'required' => 'Tanggal pertandingan harus diisi.',
            'valid_date' => 'Format tanggal tidak valid. Harus dalam format YYYY-MM-DD.',
        ],
        'waktu' => [
            'required' => 'Waktu pertandingan harus diisi.',
            'valid_time' => 'Format waktu tidak valid. Harus dalam format HH:MM.',
        ],
        'lokasi' => [
            'required' => 'Lokasi pertandingan harus diisi.',
            'max_length' => 'Lokasi maksimal 255 karakter.',
        ],
        'harga_tiket' => [
            'required' => 'Harga tiket harus diisi.',
            'integer' => 'Harga tiket harus berupa angka.',
        ],
    ];

    // Untuk mengambil data jadwal berdasarkan ID
    public function getJadwal($id = null)
    {
        if ($id === null) {
            return $this->findAll();  // Jika tidak ada ID, ambil semua data jadwal
        }

        return $this->find($id);  // Jika ada ID, ambil data berdasarkan ID
    }
}
