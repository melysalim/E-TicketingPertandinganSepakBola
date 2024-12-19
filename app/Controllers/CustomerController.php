<?php
namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\PemesananModel;

class CustomerController extends BaseController
{
    private $hargaTiket = [
        'vip' => 200000,
        'regular' => 150000,
        'economy' => 100000,
    ];

    public function index()
    {
        $jadwalModel = new JadwalModel();
        $pemesananModel = new PemesananModel();

        $id_user = session()->get('id');
        if (!$id_user) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Ambil data pemesanan dan jadwal
        $data['pemesanan'] = $pemesananModel
            ->select('pemesanan.*, jadwal.tim_a, jadwal.tim_b')
            ->join('jadwal', 'jadwal.id = pemesanan.id_jadwal')
            ->where('pemesanan.id_user', $id_user)
            ->where('pemesanan.status_pembayaran', 'pending')
            ->findAll();

        $data['jadwal'] = $jadwalModel->findAll();

        return view('customer/dashboard', $data);
    }

    public function bookTicket()
    {
        $session = session();
        $pemesananModel = new PemesananModel();
        $jadwalModel = new JadwalModel();

        $id_user = $session->get('id');
        if (!$id_user) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Cek jika sudah ada pesanan aktif
        $existingOrder = $pemesananModel
            ->where('id_user', $id_user)
            ->where('status_pembayaran', 'pending')
            ->first();

        if ($existingOrder) {
            return redirect()->back()->with('error', 'Anda masih memiliki pesanan yang belum selesai.');
        }

        // Validasi jumlah tiket
        if ($this->request->getPost('jumlah_tiket') != 1) {
            return redirect()->back()->with('error', 'Anda hanya dapat memesan 1 tiket per transaksi.');
        }

        // Ambil data dari form
        $id_jadwal = $this->request->getPost('id_jadwal');
        $tipe_tiket = $this->request->getPost('tipe_tiket');

        // Hitung total harga
        $total_harga = $this->calculateTotalHarga($id_jadwal, 1, $tipe_tiket);

        // Generate nomor kursi untuk pemesanan ini
        $nomorKursi = $this->generateSeatNumber($id_jadwal, 1);  // Anda dapat menyesuaikan dengan logika untuk nomor kursi

        $data = [
            'id_user' => $id_user,
            'id_jadwal' => $id_jadwal,
            'tipe_tiket' => $tipe_tiket,
            'jumlah_tiket' => 1,  // Tetapkan jumlah tiket menjadi 1
            'total_harga' => $total_harga,
            'status_pembayaran' => 'pending',
            'nomor_kursi' => implode(',', $nomorKursi),  // Simpan nomor kursi yang dihasilkan
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Simpan data ke tabel pemesanan
        if ($pemesananModel->save($data)) {
            return redirect()->to('/customer')->with('msg', 'Pesanan Anda berhasil dibuat.');
        } else {
            return redirect()->back()->with('error', 'Gagal membuat pesanan. Silakan coba lagi.');
        }
    }
    private function generateSeatNumber($id_jadwal, $jumlah_tiket)
    {
        // Misalnya, Anda ingin menetapkan kursi berdasarkan jadwal
        $availableSeats = $this->getAvailableSeats($id_jadwal); // Dapatkan kursi yang tersedia dari database atau logika tertentu

        // Pastikan ada kursi yang cukup untuk jumlah tiket
        if (count($availableSeats) < $jumlah_tiket) {
            throw new \Exception('Tidak ada cukup kursi tersedia.');
        }

        // Ambil nomor kursi yang tersedia
        return array_slice($availableSeats, 0, $jumlah_tiket);  // Ambil jumlah kursi yang sesuai
    }

    private function getAvailableSeats($id_jadwal)
    {
        // Logika untuk mendapatkan kursi yang tersedia, misalnya, berdasarkan jadwal
        // Misalnya, kursi yang tersedia adalah dari A1 sampai A10
        return ['A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'A9', 'A10'];
    }


    private function calculateTotalHarga($id_jadwal, $jumlah_tiket, $tipe_tiket)
    {
        $jadwalModel = new JadwalModel();
        $jadwal = $jadwalModel->find($id_jadwal);

        if (!$jadwal) {
            throw new \Exception('Jadwal tidak ditemukan.');
        }

        // Validasi tipe tiket
        if (!isset($this->hargaTiket[$tipe_tiket])) {
            throw new \Exception('Tipe tiket tidak valid.');
        }

        // Hitung total harga berdasarkan tipe tiket
        $hargaPerTiket = $this->hargaTiket[$tipe_tiket];
        return $hargaPerTiket * $jumlah_tiket;
    }

    public function uploadPayment()
    {
        $session = session();
        $pemesananModel = new PemesananModel();

        $id_user = $session->get('id');
        if (!$id_user) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $pemesanan = $pemesananModel->where('id_user', $id_user)
            ->where('status_pembayaran', 'pending')
            ->findAll();

        return view('customer/dashboard', ['pemesanan' => $pemesanan]);
    }

   public function processPayment()
{
    $session = session();
    $pemesananModel = new PemesananModel();

    $id_user = $session->get('id');
    if (!$id_user) {
        return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
    }

    $id_pemesanan = $this->request->getPost('id_pemesanan');
    $file = $this->request->getFile('bukti_pembayaran');

    if (!$file->isValid()) {
        return redirect()->back()->with('error', 'File tidak valid.');
    }

    if (!in_array($file->getExtension(), ['jpg', 'jpeg', 'png', 'pdf'])) {
        return redirect()->back()->with('error', 'File harus berupa JPG, PNG, atau PDF.');
    }

    $pemesanan = $pemesananModel
        ->where('id_user', $id_user)
        ->where('id_pemesanan', $id_pemesanan)
        ->first();

    if (!$pemesanan) {
        return redirect()->to('/customer')->with('error', 'Pemesanan tidak ditemukan.');
    }

    $filename = $file->getRandomName();
    $file->move('uploads/payments', $filename);

    // Langsung ubah status menjadi 'confirmed' setelah upload
    $pemesananModel->update($id_pemesanan, [
        'bukti_pembayaran' => $filename,
        'status_pembayaran' => 'confirmed', // Langsung confirmed
        'updated_at' => date('Y-m-d H:i:s'),
    ]);

    return redirect()->to('/customer/eticket/' . $id_pemesanan)->with('msg', 'Pembayaran berhasil, e-tiket Anda telah tersedia.');
}
    public function showETicket($id_pemesanan)
    {
        $session = session();
        $pemesananModel = new PemesananModel();

        $id_user = $session->get('id');
        if (!$id_user) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Ambil data pemesanan
        $pemesanan = $pemesananModel
            ->select('pemesanan.*, jadwal.tim_a, jadwal.tim_b, jadwal.tanggal, jadwal.waktu, jadwal.lokasi')
            ->join('jadwal', 'jadwal.id = pemesanan.id_jadwal')
            ->where('pemesanan.id_user', $id_user)
            ->where('pemesanan.id_pemesanan', $id_pemesanan)
            ->first();

        if (!$pemesanan) {
            return redirect()->to('/customer')->with('error', 'E-Tiket tidak ditemukan.');
        }

        return view('customer/eticket', ['pemesanan' => $pemesanan]);
    }
   
}