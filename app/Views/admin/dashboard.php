<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Sistem Tiket Pertandingan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #0a4d2e;
            --secondary-color: #1a8d44;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fa;
        }

        .sidebar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: #fff;
            min-height: 100vh;
        }

        .sidebar .nav-link {
            color: #fff;
            transition: background-color 0.3s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .main-content {
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
        }

        .btn-custom {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background-color: var(--secondary-color);
            color: white;
        }

        .navbar {
            background-color: var(--primary-color);
            color: white;
            padding: 10px;
        }

        .navbar .navbar-brand {
            color: white;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .navbar .navbar-brand:hover {
            color: var(--secondary-color);
        }

        .navbar .nav-item .nav-link {
            color: white;
        }

        .navbar .nav-item .nav-link:hover {
            color: #f8f9fa;
        }

        .dropdown-menu {
            right: 0;
            left: auto;
        }
   



    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fas fa-futbol me-2"></i>Admin Dashboard</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link">Hello, <?= session()->get('username') ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="position-sticky pt-3">
                    <h2 class="text-center mb-4"><i class="fas fa-futbol me-2"></i>E-Ticket</h2>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#dashboard">
                                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#kelola-user">
                                <i class="fas fa-users me-2"></i>Kelola User
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#jadwal">
                                <i class="fas fa-calendar-alt me-2"></i>Jadwal Pertandingan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#status-pemesanan">
                                <i class="fas fa-ticket-alt me-2"></i>Status Pemesanan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#konfirmasi-pesanan">
                                <i class="fas fa-check-circle me-2"></i>Konfirmasi Pesanan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#laporan-penjualan">
                                <i class="fas fa-chart-bar me-2"></i>Laporan Penjualan
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <h1 class="mt-4 mb-4">Dashboard Admin</h1>

            <!-- Kelola User -->
<div class="card" id="kelola-user">
    <div class="card-header">
        <h5><i class="fas fa-users me-2"></i>Kelola User</h5>
    </div>
    <div class="card-body">
        <!-- Pesan Flash -->
    <?php if (session()->get('msg_user')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->get('msg_user') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

            
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>No. Telepon</th>
                                <th>Role</th> <!-- Tambahkan kolom Role -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($customers) && is_array($customers)): ?>
                                <?php foreach ($customers as $customer): ?>
                                    <tr>
                                        <td><?= $customer['id'] ?></td>
                                        <td><?= $customer['username'] ?></td>
                                        <td><?= $customer['email'] ?></td>
                                        <td><?= $customer['no_telp'] ?></td>
                                        <td><?= ucfirst($customer['role']) ?></td> <!-- Tampilkan role -->
                                        <td>
                                            <a href="/admin/edit-user/<?= $customer['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                           <td>
    <a href="/admin/delete-user/<?= $customer['id'] ?>" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus pengguna ini?')">Hapus</a>
                                        </td>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data pengguna</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
   <div class="card" id="jadwal">
    <div class="card-header">
        <h5><i class="fas fa-calendar-alt me-2"></i>Jadwal Pertandingan</h5>
    </div>
    <div class="card-body">
        <!-- Pesan Flash -->
    <?php if (session()->get('msg_jadwal')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->get('msg_jadwal') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>


        <a href="/admin/add-jadwal" class="btn btn-sm btn-custom mb-3">Tambah Jadwal</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Tim A</th>
                    <th>Tim B</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Venue</th>
                    <th>Harga Tiket</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($jadwal) && is_array($jadwal)): ?>
                    <?php foreach ($jadwal as $match): ?>
                        <tr>
                            <td>
                                <img src="<?= base_url('uploads/logos/' . $match['logo_tim_a']) ?>" alt="<?= $match['tim_a'] ?>"
                                    width="30" height="30">
                                <span>VS</span>
                                <img src="<?= base_url('uploads/logos/' . $match['logo_tim_b']) ?>" alt="<?= $match['tim_b'] ?>"
                                    width="30" height="30">
                            </td>
                            <td><?= $match['tim_a'] ?></td>
                            <td><?= $match['tim_b'] ?></td>
                            <td><?= date('F d, Y', strtotime($match['tanggal'])) ?></td>
                            <td><?= date('H:i', strtotime($match['waktu'])) ?></td>
                            <td><?= $match['lokasi'] ?></td>
                            <td>IDR <?= number_format($match['harga_tiket'], 0, ',', '.') ?></td>
                            <td>
                              <a href="/admin/edit-jadwal/<?= $match['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="/admin/delete-jadwal/<?= $match['id'] ?>" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus jadwal ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada jadwal pertandingan</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>


<div class="card" id="status-pemesanan">
    <div class="card-header">
        <h5><i class="fas fa-ticket-alt me-2"></i>Status Pemesanan Terbaru</h5>
    </div>
    <div class="card-body">
        <?php if (!empty($pemesanan) && is_array($pemesanan)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pengguna</th>
                        <th>Pertandingan</th>
                        <th>Tipe Tiket</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pemesanan as $pesanan): ?>
                        <tr>
                            <td><?= $pesanan['id_pemesanan'] ?></td>
                            <td><?= $pesanan['username'] ?></td>
                            <td><?= $pesanan['tim_a'] ?> vs <?= $pesanan['tim_b'] ?></td>
                            <td><?= ucfirst($pesanan['tipe_tiket']) ?></td>
                            <td><?= $pesanan['jumlah_tiket'] ?></td>
                            <td>IDR <?= number_format($pesanan['total_harga'], 0, ',', '.') ?></td>
                            <td>
                                <?php if ($pesanan['status_pembayaran'] === 'pending'): ?>
                                    <span class="badge bg-warning">Pending</span>
                                <?php else: ?>
                                    <span class="badge bg-success">Selesai</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center">Tidak ada data pemesanan terbaru.</p>
        <?php endif; ?>
    </div>
</div>

<div class="card mt-4" id="konfirmasi-pemesanan">
    <div class="card-header">
        <h5><i class="fas fa-check-circle me-2"></i>Konfirmasi Pemesanan</h5>
    </div>
    <div class="card-body">
        <?php if (session()->get('msg_pesanan')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->get('msg_pesanan') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (!empty($pemesanan_pending) && is_array($pemesanan_pending)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pengguna</th>
                        <th>Pertandingan</th>
                        <th>Tipe Tiket</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pemesanan_pending as $pesanan): ?>
                        <tr>
                            <td><?= $pesanan['id_pemesanan'] ?></td>
                            <td><?= $pesanan['username'] ?></td>
                            <td><?= $pesanan['tim_a'] ?> vs <?= $pesanan['tim_b'] ?></td>
                            <td><?= ucfirst($pesanan['tipe_tiket']) ?></td>
                            <td><?= $pesanan['jumlah_tiket'] ?></td>
                            <td>IDR <?= number_format($pesanan['total_harga'], 0, ',', '.') ?></td>
                            <td>
                                <a href="/admin/konfirmasi-pesanan/<?= $pesanan['id_pemesanan'] ?>"
                                    class="btn btn-sm btn-success"
                                    onclick="return confirm('Apakah Anda yakin ingin mengonfirmasi pemesanan ini?');">
                                    Konfirmasi
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center">Tidak ada pemesanan dengan status pending.</p>
        <?php endif; ?>
    </div>
</div>
<!-- Perbandingan Tiket Pertandingan -->
<div class="card mt-4" id="perbandingan-tiket">
    <div class="card-header">
        <h5><i class="fas fa-chart-bar me-2"></i>Perbandingan Tiket Pertandingan</h5>
    </div>
    <div class="card-body">
        <canvas id="ticketComparisonChart" width="400" height="200"></canvas>
    </div>
</div>

       <!-- Laporan Penjualan -->
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5>Laporan Penjualan</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="salesChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>


    <!-- Script untuk Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
       // Konfigurasi awal Chart.js
const salesData = {
    labels: [], // Akan diisi secara dinamis
    datasets: [
        {
            label: 'Total Tiket Terjual',
            backgroundColor: 'rgba(0, 123, 255, 0.5)',
            borderColor: 'rgba(0, 123, 255, 1)',
            borderWidth: 2,
            data: [], // Akan diisi secara dinamis
        },
        {
            label: 'Total Penjualan (IDR)',
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 2,
            data: [], // Akan diisi secara dinamis
        }
    ]
};

const config = {
    type: 'bar', // Tipe grafik bar
    data: salesData,
    options: {
        scales: {
            y: {
                beginAtZero: true,
                title: { display: true, text: 'Jumlah' }
            },
            x: {
                title: { display: true, text: 'Bulan' }
            }
        },
        plugins: {
            legend: { display: true, position: 'top' }
        }
    }
};

// Render grafik di canvas
const salesChart = new Chart(document.getElementById('salesChart'), config);

// Ambil data dari server
fetch('/admin/getSalesData')
    .then(response => response.json())
    .then(data => {
        // Pastikan data yang diterima memiliki format yang benar
        console.log(data); // Debugging untuk memastikan data yang diterima

        // Format data untuk Chart.js
        const labels = data.map(item => `Bulan ${item.bulan}`);
        const totalTiket = data.map(item => item.total_tiket);
        const totalPenjualan = data.map(item => item.total_penjualan);

        // Perbarui data grafik
        salesChart.data.labels = labels;
        salesChart.data.datasets[0].data = totalTiket;
        salesChart.data.datasets[1].data = totalPenjualan;
        salesChart.update();
    })
    .catch(error => {
        console.error('Error fetching sales data:', error);
    });


            // Konfigurasi awal Chart.js
const ticketComparisonData = {
    labels: [], // Akan diisi secara dinamis
    datasets: [
        {
            label: 'Total Tiket Terjual',
            backgroundColor: 'rgba(0, 123, 255, 0.5)', // Warna untuk bar
            borderColor: 'rgba(0, 123, 255, 1)',
            borderWidth: 2,
            data: [], // Akan diisi secara dinamis
        }
    ]
};

const ticketComparisonConfig = {
    type: 'bar', // Tipe grafik bar
    data: ticketComparisonData,
    options: {
        scales: {
            y: {
                beginAtZero: true,
                title: { display: true, text: 'Jumlah Tiket' }
            },
            x: {
                title: { display: true, text: 'Pertandingan' }
            }
        },
        plugins: {
            legend: { display: false }  // Tidak perlu menampilkan legend
        }
    }
};

// Render grafik di canvas
const ticketComparisonChart = new Chart(document.getElementById('ticketComparisonChart'), ticketComparisonConfig);

// Ambil data dari server
fetch('/admin/getTicketSalesComparison')
    .then(response => response.json())
    .then(data => {
        // Format data untuk Chart.js
        const labels = data.map(item => `${item.tim_a} vs ${item.tim_b}`);
        const totalTiket = data.map(item => item.total_tiket);

        // Perbarui data grafik
        ticketComparisonChart.data.labels = labels;
        ticketComparisonChart.data.datasets[0].data = totalTiket;
        ticketComparisonChart.update();
    })
    .catch(error => {
        console.error('Error fetching ticket sales comparison data:', error);
    });

    </script>


            </main>
        </div>
    </div>
</body>

</html>