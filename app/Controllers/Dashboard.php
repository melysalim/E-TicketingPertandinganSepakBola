<?php

namespace App\Controllers;

use App\Models\JadwalModel; // Import model JadwalModel
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        $jadwalModel = new JadwalModel();

        // Ambil data jadwal dari database
        $data['jadwal'] = $jadwalModel->findAll();  // Mengambil semua data jadwal

        // Kirim data jadwal ke view utama
        return view('dashboard/home', $data);
    }
}
