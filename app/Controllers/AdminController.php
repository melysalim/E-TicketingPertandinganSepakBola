<?php

namespace App\Controllers;

use App\Models\UserModel; // Import model UserModel
use CodeIgniter\Controller;
use App\Models\JadwalModel;

class AdminController extends Controller
{
    // Method untuk dashboard admin
    public function index()
    {
        $userModel = new \App\Models\UserModel();
        $jadwalModel = new \App\Models\JadwalModel();
        $pemesananModel = new \App\Models\PemesananModel();

        // Ambil semua data pengguna
        $data['customers'] = $userModel->findAll();
        // Ambil jadwal terbaru
        $data['jadwal'] = $jadwalModel->orderBy('tanggal', 'DESC')->findAll();
        // Ambil data pemesanan terbaru
        $data['pemesanan'] = $pemesananModel
            ->select('pemesanan.*, users.username, jadwal.tim_a, jadwal.tim_b')
            ->join('users', 'users.id = pemesanan.id_user')
            ->join('jadwal', 'jadwal.id = pemesanan.id_jadwal')
            ->orderBy('pemesanan.created_at', 'DESC')
            ->findAll();

        // Ambil hanya data pemesanan yang pending untuk konfirmasi
        $data['pemesanan_pending'] = $pemesananModel
            ->select('pemesanan.*, users.username, jadwal.tim_a, jadwal.tim_b')
            ->join('users', 'users.id = pemesanan.id_user')
            ->join('jadwal', 'jadwal.id = pemesanan.id_jadwal')
            ->where('pemesanan.status_pembayaran', 'pending')
            ->orderBy('pemesanan.created_at', 'DESC')
            ->findAll();


        // Pesan flash untuk aksi jadwal atau user
        $data['msg_jadwal'] = session()->getFlashdata('msg_jadwal');
        $data['msg_user'] = session()->getFlashdata('msg_user');

        return view('admin/dashboard', $data);
    }

    public function editUser($id)
    {
        $userModel = new UserModel();

        // Cari data user berdasarkan ID
        $user = $userModel->find($id);

        // Jika user tidak ditemukan, kembalikan ke halaman admin dengan pesan error
        if (!$user) {
            return redirect()->to('/admin')->with('msg_user', 'Pengguna tidak ditemukan.');
        }

        // Tampilkan view edit_user dengan data user
        return view('admin/edit_user', ['user' => $user]);
    }

    public function updateUser($id)
    {
        $userModel = new UserModel();

        // Validasi data input
        $validationRules = [
            'username' => 'required|max_length[100]',
            'email' => 'required|valid_email',
            'no_telp' => 'required|numeric|min_length[10]|max_length[15]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data user
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'no_telp' => $this->request->getPost('no_telp'),
        ];

        $userModel->update($id, $data);

        // Pesan sukses
        session()->setFlashdata('msg_user', 'Pengguna berhasil diperbarui.');

        return redirect()->to('/admin');
    }


    public function deleteUser($id)
    {
        $userModel = new UserModel();

        // Hapus user berdasarkan ID
        if (!$userModel->delete($id)) {
            session()->setFlashdata('msg_user', 'Gagal menghapus pengguna.');
            return redirect()->to('/admin');
        }

        session()->setFlashdata('msg_user', 'Pengguna berhasil dihapus.');

        return redirect()->to('/admin');
    }

    // Method untuk menampilkan semua jadwal (dengan pagination)
    public function jadwal()
    {
        $jadwalModel = new JadwalModel();

        // Ambil data jadwal dengan pagination
        $data['jadwal'] = $jadwalModel->orderBy('tanggal', 'DESC')->paginate(10); // 10 data per halaman
        $data['pager'] = $jadwalModel->pager;

        return view('admin/jadwal', $data); // Kirim data ke tampilan
    }

    // Method untuk menampilkan form tambah jadwal
    public function addJadwal()
    {
        return view('admin/add_jadwal');
    }

    // Method untuk menyimpan jadwal baru
    public function saveJadwal()
    {
        $jadwalModel = new JadwalModel();

        // Aturan validasi
        $validationRules = [
            'tim_a' => 'required|max_length[100]',
            'tim_b' => 'required|max_length[100]',
            'tanggal' => 'required|valid_date[Y-m-d]',
            'waktu' => 'required|regex_match[/^([01]?[0-9]|2[0-3]):([0-5][0-9])$/]',
            'lokasi' => 'required|max_length[255]',
            'harga_tiket' => 'required|integer',
            'logo_tim_a' => 'permit_empty|is_image[logo_tim_a]|max_size[logo_tim_a,2048]',
            'logo_tim_b' => 'permit_empty|is_image[logo_tim_b]|max_size[logo_tim_b,2048]',
        ];

        // Validasi data
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $data = [
            'tim_a' => $this->request->getPost('tim_a'),
            'tim_b' => $this->request->getPost('tim_b'),
            'tanggal' => $this->request->getPost('tanggal'),
            'waktu' => $this->request->getPost('waktu'),
            'lokasi' => $this->request->getPost('lokasi'),
            'harga_tiket' => $this->request->getPost('harga_tiket'),
        ];

        // Upload logo tim A
        $logo_tim_a = $this->request->getFile('logo_tim_a');
        if ($logo_tim_a && $logo_tim_a->isValid() && !$logo_tim_a->hasMoved()) {
            $logo_tim_a->move('uploads/logos');
            $data['logo_tim_a'] = $logo_tim_a->getName();
        }

        // Upload logo tim B
        $logo_tim_b = $this->request->getFile('logo_tim_b');
        if ($logo_tim_b && $logo_tim_b->isValid() && !$logo_tim_b->hasMoved()) {
            $logo_tim_b->move('uploads/logos');
            $data['logo_tim_b'] = $logo_tim_b->getName();
        }

        // Simpan data ke database
        $jadwalModel->save($data);

        // Pesan sukses
        session()->setFlashdata('msg_jadwal', 'Jadwal pertandingan berhasil ditambahkan.');

        return redirect()->to('/admin');
    }

    // Method untuk menampilkan form edit jadwal
    public function editJadwal($id)
    {
        $jadwalModel = new JadwalModel();

        // Cari data jadwal berdasarkan ID
        $jadwal = $jadwalModel->find($id);

        if (!$jadwal) {
            return redirect()->to('/admin')->with('msg_jadwal', 'Jadwal tidak ditemukan.');
        }

        return view('admin/edit_jadwal', ['jadwal' => $jadwal]);
    }

    // Method untuk memperbarui jadwal
    public function updateJadwal($id)
    {
        $jadwalModel = new JadwalModel();

        // Cari data jadwal berdasarkan ID
        $jadwal = $jadwalModel->find($id);

        if (!$jadwal) {
            return redirect()->to('/admin')->with('msg_jadwal', 'Jadwal tidak ditemukan.');
        }

        // Aturan validasi
        $validationRules = [
            'tim_a' => 'required|max_length[100]',
            'tim_b' => 'required|max_length[100]',
            'tanggal' => 'required|valid_date[Y-m-d]',
            'waktu' => 'required|regex_match[/^([01]?[0-9]|2[0-3]):([0-5][0-9])$/]',
            'lokasi' => 'required|max_length[255]',
            'harga_tiket' => 'required|integer',
            'logo_tim_a' => 'permit_empty|is_image[logo_tim_a]|max_size[logo_tim_a,2048]',
            'logo_tim_b' => 'permit_empty|is_image[logo_tim_b]|max_size[logo_tim_b,2048]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $data = [
            'tim_a' => $this->request->getPost('tim_a'),
            'tim_b' => $this->request->getPost('tim_b'),
            'tanggal' => $this->request->getPost('tanggal'),
            'waktu' => $this->request->getPost('waktu'),
            'lokasi' => $this->request->getPost('lokasi'),
            'harga_tiket' => $this->request->getPost('harga_tiket'),
        ];

        // Upload logo tim A
        $logo_tim_a = $this->request->getFile('logo_tim_a');
        if ($logo_tim_a && $logo_tim_a->isValid() && !$logo_tim_a->hasMoved()) {
            $logo_tim_a->move('uploads/logos');
            $data['logo_tim_a'] = $logo_tim_a->getName();
        }

        // Upload logo tim B
        $logo_tim_b = $this->request->getFile('logo_tim_b');
        if ($logo_tim_b && $logo_tim_b->isValid() && !$logo_tim_b->hasMoved()) {
            $logo_tim_b->move('uploads/logos');
            $data['logo_tim_b'] = $logo_tim_b->getName();
        }

        // Debugging: Tampilkan data yang akan diupdate
        log_message('info', 'Data untuk update: ' . json_encode($data));

        // Update jadwal di database
        if ($jadwalModel->update($id, $data)) {
            // Debugging: Tampilkan query terakhir
            $db = \Config\Database::connect();
            log_message('info', 'Query terakhir: ' . $db->getLastQuery());

            // Pesan sukses
            session()->setFlashdata('msg_jadwal', 'Jadwal berhasil diperbarui.');
        } else {
            // Pesan gagal
            log_message('error', 'Gagal memperbarui jadwal untuk ID: ' . $id);
            session()->setFlashdata('msg_jadwal', 'Gagal memperbarui jadwal.');
        }

        // Redirect ke halaman admin
        return redirect()->to('/admin');
    }


    // Method untuk menghapus jadwal
    public function deleteJadwal($id)
    {
        $jadwalModel = new JadwalModel();

        // Hapus data berdasarkan ID
        $jadwalModel->delete($id);

        // Pesan sukses
        session()->setFlashdata('msg_jadwal', 'Jadwal berhasil dihapus.');

        return redirect()->to('/admin');
    }
    public function statusPemesanan()
    {
        $pemesananModel = new \App\Models\PemesananModel();

        // Ambil semua data pemesanan
        $data['pemesanan'] = $pemesananModel->select('pemesanan.*, users.username, jadwal.tim_a, jadwal.tim_b')
            ->join('users', 'users.id = pemesanan.id_user') // Gabungkan dengan tabel users
            ->join('jadwal', 'jadwal.id = pemesanan.id_jadwal') // Gabungkan dengan tabel jadwal
            ->findAll();

        // Debug data pemesanan
        log_message('debug', 'Data Pemesanan: ' . json_encode($data['pemesanan']));

        return view('admin/status_pemesanan', $data);
    }

    public function konfirmasiPesanan($id)
    {
        $pemesananModel = new \App\Models\PemesananModel();

        // Perbarui status pembayaran menjadi selesai
        $updated = $pemesananModel->update($id, [
            'status_pembayaran' => 'selesai',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if ($updated) {
            session()->setFlashdata('msg_pesanan', 'Pesanan berhasil dikonfirmasi.');
        } else {
            session()->setFlashdata('msg_pesanan', 'Gagal mengonfirmasi pesanan.');
        }

        return redirect()->to('/admin');
    }
    public function getSalesData()
    {
        $pemesananModel = new \App\Models\PemesananModel();

        // Ambil data penjualan per bulan
        $data = $pemesananModel
            ->select('MONTH(created_at) as bulan, SUM(jumlah_tiket) as total_tiket, SUM(total_harga) as total_penjualan')
            ->groupBy('MONTH(created_at)')
            ->findAll();

        return $this->response->setJSON($data); // Kirim data dalam format JSON
    }
    public function getTicketSalesComparison()
    {
        $pemesananModel = new \App\Models\PemesananModel();
        $salesData = $pemesananModel->getTicketSalesComparison();

        return $this->response->setJSON($salesData);
    }







}
