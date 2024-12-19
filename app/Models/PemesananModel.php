<?php
namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $allowedFields = [
        'id_user',
        'id_jadwal',
        'tipe_tiket',
        'jumlah_tiket',
        'total_harga',
        'status_pembayaran',
        'bukti_pembayaran',
        'nomor_kursi',  
        'created_at',
        'updated_at'
    ];

    // Mendapatkan data penjualan berdasarkan bulan
    public function getSalesData()
    {
        return $this->select('MONTH(created_at) as bulan, COUNT(id_pemesanan) as total_tiket, SUM(total_harga) as total_penjualan')
            ->where('status_pembayaran', 'confirmed')
            ->groupBy('bulan')
            ->orderBy('bulan', 'ASC')
            ->findAll();
    }

    // Mendapatkan perbandingan penjualan tiket berdasarkan jadwal
    public function getTicketSalesComparison()
    {
        return $this->select('jadwal.tim_a, jadwal.tim_b, COUNT(pemesanan.id_pemesanan) as total_tiket')
            ->join('jadwal', 'jadwal.id = pemesanan.id_jadwal')
            ->where('pemesanan.status_pembayaran', 'confirmed')
            ->groupBy('pemesanan.id_jadwal')
            ->orderBy('total_tiket', 'DESC')
            ->findAll();
    }
}
