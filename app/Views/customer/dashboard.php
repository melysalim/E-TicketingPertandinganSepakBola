<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Ticket Penjualan Stadion Maguwoharjo - Customer Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <style>
/* Global Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

:root {
    --primary-color: #333;
    --accent-color: #4CAF50;
    --text-color: #ffffff;
    --background-color: #f4f4f4;
    --dark-bg: #1a1a1a;
    --card-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    --cta-hover: #45a049;
    --border-radius: 10px;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: var(--background-color);
    color: var(--text-color);
    line-height: 1.6;
}

/* Header */
header {
    position: fixed;
    top: 0;
    width: 100%;
    background-color: var(--primary-color);
    color: var(--text-color);
    padding: 1rem 2rem;
    z-index: 1000;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.header-content {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

header h1 {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--accent-color);
}

nav a {
    color: var(--text-color);
    text-decoration: none;
    margin-left: 1rem;
    font-weight: 500;
    transition: background-color 0.3s ease;
    padding: 0.5rem 1rem;
    border-radius: 5px;
}

nav a:hover {
    background-color: var(--accent-color);
    color: var(--text-color);
}

/* Hero Section */
.hero {
    height: 100vh;
    background: linear-gradient(
            rgba(0, 0, 0, 0.7),
            rgba(0, 0, 0, 0.7)
        ),
        url('/homeadiks.png');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: white;
    padding: 60px 20px;
}

.hero h1 {
    font-size: 4rem;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    animation: fadeInUp 1s ease-out;
}

.hero p {
    font-size: 1.8rem;
    margin-bottom: 30px;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    animation: fadeInUp 1s ease-out 0.3s;
    animation-fill-mode: both;
}

.cta-button {
    display: inline-block;
    background-color: #ff9800; /* Warna solid */
    color: white;
    padding: 15px 40px;
    font-size: 1.3rem;
    text-decoration: none;
    border-radius: 50px;
    transition: all 0.3s ease;
    animation: fadeInUp 1s ease-out 0.6s;
    animation-fill-mode: both;
}

.cta-button:hover {
    background-color: #ff5722; /* Warna solid pada hover */
    transform: translateY(-3px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}


/* Section Titles */
section h2 {
    text-align: center;
    font-size: 2.5rem;
    color: var(--accent-color);
    margin: 2rem 0;
    border-bottom: 2px solid var(--accent-color);
    padding-bottom: 0.5rem;
}

/* Match Cards */
.match-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin: 2rem 0;
}

.match-card {
    background-color: var(--dark-bg);
    color: var(--text-color);
    border-radius: var(--border-radius);
    box-shadow: var(--card-shadow);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.match-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
}

.team-logos {
    background: var(--accent-color);
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
}

.team-logo {
    width: 80px;
    height: 80px;
    object-fit: contain;
    background: var(--text-color);
    border-radius: 50%;
}

.match-info {
    padding: 1rem;
}

.match-info p {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
}

.match-info i {
    color: var(--accent-color);
}

/* Form Container */
.form-container {
    background: var(--dark-bg);
    color: var(--text-color);
    border-radius: var(--border-radius);
    padding: 2rem;
    box-shadow: var(--card-shadow);
    max-width: 600px;
    margin: 0 auto;
    margin-top: 2rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
}

.form-control {
    width: 100%;
    padding: 0.8rem;
    margin-bottom: 1rem;
    border: 1px solid var(--accent-color);
    border-radius: var(--border-radius);
    background: var(--background-color);
    color: var(--dark-bg);
}

.form-control:focus {
    border-color: var(--accent-color);
    outline: none;
}

/* Buttons */
.btn-upload, .btn-green {
    background: linear-gradient(to right, #4CAF50, #45a049);
    color: white;
    font-size: 1rem;
    padding: 0.8rem 2rem;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

.btn-upload:hover, .btn-green:hover {
    background: linear-gradient(to right, #45a049, #4CAF50);
    transform: translateY(-3px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}

.btn-upload:active, .btn-green:active {
    transform: translateY(0);
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
}
.btn-outline {
    border: 2px solid #4CAF50;
    background: transparent;
    color: #4CAF50;
    font-size: 1rem;
    padding: 0.6rem 1.5rem;
    border-radius: 25px;
    cursor: pointer;
    text-align: center;
    transition: all 0.3s ease;
}

.btn-outline:hover {
    background: #4CAF50;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.btn-outline:active {
    transform: translateY(0);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}


/* Footer */
footer {
    background: var(--dark-bg);
    color: var(--text-color);
    text-align: center;
    padding: 2rem 0;
    border-top: 2px solid var(--accent-color);
}

footer h3,
footer p {
    margin: 0.5rem 0;
}

.footer-social a {
    margin: 0 0.5rem;
    color: var(--accent-color);
    font-size: 1.5rem;
    transition: color 0.3s ease;
}

.footer-social a:hover {
    color: var(--text-color);
}
.cta-button {
    display: inline-block;
    background: linear-gradient(to right, #ff9800, #f44336);
    color: white;
    font-size: 1.2rem;
    padding: 0.8rem 2rem;
    border: none;
    border-radius: 30px;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

.cta-button:hover {
    background: linear-gradient(to right, #f44336, #ff9800);
    transform: translateY(-3px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}

.cta-button:active {
    transform: translateY(0);
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
}
.match-card .btn-green {
    display: inline-block;
    background: linear-gradient(to right, #4caf50, #2e7d32);
    color: white;
    font-size: 1rem;
    padding: 0.6rem 1.5rem;
    border-radius: 25px;
    text-decoration: none;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    margin-top: 1rem;
}

.match-card .btn-green:hover {
    background: linear-gradient(to right, #2e7d32, #4caf50);
    transform: translateY(-3px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}

.match-card .btn-green:active {
    transform: translateY(0);
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
}
.hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0) 70%);
    animation: pulse 5s infinite;
    z-index: 1;
}

@keyframes pulse {
    0% {
        transform: scale(1);
        opacity: 0.5;
    }
    50% {
        transform: scale(1.5);
        opacity: 0.2;
    }
    100% {
        transform: scale(1);
        opacity: 0.5;
    }
}

.hero-content {
    z-index: 2;
}
.hero-slider {
    margin-top: 20px;
    font-size: 1.5rem;
    color: #fff;
    font-weight: bold;
    overflow: hidden;
    height: 2.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.slide {
    animation: slide-in 10s infinite;
    white-space: nowrap;
}

@keyframes slide-in {
    0% {
        transform: translateX(100%);
    }
    25% {
        transform: translateX(0);
    }
    75% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-100%);
    }
}
.match-card:hover {
    transform: scale(1.05);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
}

.match-card:hover::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    z-index: 0;
}
.btn-upload:hover::before, 
.btn-green:hover::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 200%;
    height: 100%;
    background: rgba(255, 255, 255, 0.2);
    transform: rotate(45deg);
    animation: shine 0.5s ease-in-out;
}

@keyframes shine {
    from {
        left: -200%;
    }
    to {
        left: 200%;
    }
}
#floating-help {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: var(--accent-color);
    color: white;
    padding: 10px 15px;
    border-radius: 50px;
    font-size: 1rem;
    font-weight: bold;
    box-shadow: var(--card-shadow);
    transition: all 0.3s ease;
}

#floating-help a {
    color: white;
    text-decoration: none;
}

#floating-help:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
}
html {
    scroll-behavior: smooth;
}
section {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeIn 1s ease-in forwards;
    animation-delay: 0.3s;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.footer-social a {
    margin: 0 0.5rem;
    color: var(--accent-color);
    font-size: 1.5rem;
    transition: transform 0.3s ease, color 0.3s ease;
}

.footer-social a:hover {
    color: var(--text-color);
    transform: scale(1.2) rotate(15deg);
}



</style>
</head>

<body>
   <header>
    <div class="header-content">
        <h1><i class="fas fa-ticket-alt"></i> E-Ticket Stadion Maguwoharjo</h1>
        <nav>
             <a href="#upcoming-matches"><i class="fas fa-calendar"></i> Jadwal</a>
                <a href="javascript:void(0);" onclick="showBookingForm()" class="btn-outline">
                    <i class="fas fa-shopping-cart"></i> Pesan Tiket
                </a>
                <a href="javascript:void(0);" onclick="showPaymentForm()" class="btn-outline">
                    <i class="fas fa-credit-card"></i> Pembayaran
                </a>
            <a href="/logout" class="btn-outline"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </div>
</header>


    <section class="hero">
        <div class="hero-content">
            <h1>Stadion Maguwoharjo</h1>
           
            <div class="hero-slider">
                <div class="slide">Tonton pertandingan super elang jawa!</div>
                <div class="slide">Promo tiket VIP hanya hari ini!</div>
                <div class="slide">Pesan sekarang dan dapatkan tempat terbaik!</div>
            </div>
            <a href="#booking" class="cta-button"><i class="fas fa-ticket-alt"></i> Pesan Tiket Sekarang</a>
        </div>
    </section>


    <!-- Main Container -->
    <div class="container">
        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('msg')): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Jadwal Pertandingan -->
    <div class="container">
        <!-- Jadwal Pertandingan -->
        <section id="upcoming-matches">
            <h2>Jadwal Pertandingan</h2>
            <div class="match-list">
        <?php foreach ($jadwal as $match): ?>
                <div class="match-card">
                    <div class="team-logos">
                        <img src="<?= base_url('uploads/logos/' . $match['logo_tim_a']) ?>" alt="<?= $match['tim_a'] ?>"
                            class="team-logo">
                        <span class="vs">VS</span>
                        <img src="<?= base_url('uploads/logos/' . $match['logo_tim_b']) ?>" alt="<?= $match['tim_b'] ?>"
                            class="team-logo">
                    </div>
                    <div class="match-card-content">
                        <h3><?= $match['tim_a'] ?> vs <?= $match['tim_b'] ?></h3>
                        <div class="match-info">
                            <p><i class="far fa-calendar-alt"></i> <?= date('d M Y', strtotime($match['tanggal'])) ?></p>
                            <p><i class="far fa-clock"></i> <?= date('H:i', strtotime($match['waktu'])) ?> WIB</p>
                            <p><i class="fas fa-map-marker-alt"></i> <?= $match['lokasi'] ?></p>
                            <p><i class="fas fa-tag"></i> IDR <?= number_format($match['harga_tiket'], 0, ',', '.') ?></p>
                        </div>
                    <button class="btn-green" onclick="showBookingForm('<?= $match['id'] ?>')">
                            <i class="fas fa-ticket-alt"></i> Pesan Tiket
                        </button>


                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Form Pemesanan Tiket -->
    <section id="booking-form" style="display: none;">
        <div class="form-container">
            <h2>Pesan Tiket</h2>
            <form action="/customer/book-ticket" method="post">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="match"><i class="fas fa-futbol"></i> Pilih Pertandingan:</label>
                    <select id="match" name="id_jadwal" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Pertandingan --</option>
                        <?php foreach ($jadwal as $match): ?>
                        <option value="<?= $match['id'] ?>"><?= $match['tim_a'] ?> vs <?= $match['tim_b'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ticket-type"><i class="fas fa-ticket-alt"></i> Tipe Tiket:</label>
                    <select id="ticket-type" name="tipe_tiket" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Tipe Tiket --</option>
                        <option value="vip">VIP (IDR 200,000)</option>
                        <option value="regular">Regular (IDR 150,000)</option>
                        <option value="economy">Economy (IDR 100,000)</option>
                    </select>
                </div>
                <div class="form-group">
    <label for="seat-number"><i class="fas fa-chair"></i> Pilih Kursi:</label>
    <select id="seat-number" name="nomor_kursi" class="form-control" required>
        <option value="" disabled selected>-- Pilih Kursi --</option>
        <option value="A1">A1</option>
        <option value="A2">A2</option>
        <option value="A3">A3</option>
        <option value="B1">B1</option>
        <option value="B2">B2</option>
        <option value="B3">B3</option>

    </select>
</div>

                <div class="form-group">
                    <label for="quantity"><i class="fas fa-users"></i> Jumlah Tiket:</label>
                    <input type="number" id="quantity" name="jumlah_tiket" class="form-control" value="1" readonly>
                </div>
                <div class="form-group">
                    <label for="total-harga"><i class="fas fa-money-bill-wave"></i> Total Harga:</label>
                    <input type="text" id="total-harga" class="form-control" readonly>
                </div>
                  <button type="submit" class="btn-upload">
        <i class="fas fa-shopping-cart"></i> Pesan Tiket
    </button>
      </form>
        </div>
    </section>

    <!-- Form Upload Pembayaran -->
    <section id="payment-form" style="display: none;">
        <div class="form-container">
            <h2>Upload Bukti Pembayaran</h2>
            <form action="/customer/processPayment" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="id_pemesanan"><i class="fas fa-receipt"></i> Pilih Pemesanan:</label>
                    <select id="id_pemesanan" name="id_pemesanan" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Pemesanan --</option>
                        <?php foreach ($pemesanan as $pesanan): ?>
                        <option value="<?= $pesanan['id_pemesanan'] ?>">
                            <?= $pesanan['id_pemesanan'] ?> - <?= $pesanan['tim_a'] ?> vs <?= $pesanan['tim_b'] ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bukti_pembayaran"><i class="fas fa-upload"></i> Unggah Bukti Pembayaran:</label>
                    <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="form-control" accept="image/*,application/pdf" required>
                </div>
                <button type="submit" class="btn-upload"><i class="fas fa-upload"></i> Upload Bukti Pembayaran</button>
            </form>
        </div>
    </section>
 <div id="floating-help">
        <a href="https://wa.me/6281234567890" target="_blank"><i class="fas fa-headset"></i> Bantuan</a>
    </div>
    <!-- JavaScript -->
    <script>
        function showBookingForm(matchId = null) {
            // Sembunyikan form pembayaran
            document.getElementById('payment-form').style.display = 'none';

            // Tampilkan form pemesanan tiket
            const bookingForm = document.getElementById('booking-form');
            bookingForm.style.display = 'block';

            // Prefill data pertandingan jika matchId disediakan
            if (matchId) {
                document.getElementById('match').value = matchId;
            }
        }

        function showPaymentForm() {
            // Sembunyikan form pemesanan
            document.getElementById('booking-form').style.display = 'none';

            // Tampilkan form pembayaran
            document.getElementById('payment-form').style.display = 'block';
        }

        const ticketPrices = {
            vip: 200000,
            regular: 150000,
            economy: 100000
        };

        document.getElementById('ticket-type').addEventListener('change', calculateTotal);

        function calculateTotal() {
            const ticketType = document.getElementById('ticket-type').value;
            const quantity = document.getElementById('quantity').value;

            if (ticketType && quantity) {
                const totalPrice = ticketPrices[ticketType] * quantity;
                document.getElementById('total-harga').value = `IDR ${totalPrice.toLocaleString('id-ID')}`;
            } else {
                document.getElementById('total-harga').value = '';
            }
        }
         document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
                <Script>
                    document.getElementById('seat-number').addEventListener('change', function() {
    var seat = this.value;
    var ticketType = document.getElementById('ticket-type').value;
    var totalPrice = 0;

    // Sesuaikan harga berdasarkan tipe tiket dan kursi
    if (ticketType === 'vip') {
        totalPrice = 200000; // Harga VIP
    } else if (ticketType === 'regular') {
        totalPrice = 150000; // Harga Regular
    } else if (ticketType === 'economy') {
        totalPrice = 100000; // Harga Economy
    }

    // Tampilkan total harga pada input
    document.getElementById('total-harga').value = 'IDR ' + totalPrice.toLocaleString();
});

                </Script>
                    
                 <footer>
    <div class="footer-content">
        <div class="footer-info">
            <h3><i class="fas fa-ticket-alt"></i> E-Ticket Maguwoharjo</h3>
            <p>Sistem pemesanan tiket online resmi Stadion Maguwoharjo</p>
        </div>
        <div class="footer-contact">
            <h4>Hubungi Kami</h4>
            <p><i class="fas fa-phone"></i> +62 274 123456</p>
            <p><i class="fas fa-envelope"></i> info@maguwoharjo.com</p>
        </div>
        <div class="footer-social">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
    <div class="footer-copyright">
        <p>&copy; 2024 E-Ticket Maguwoharjo. Semua Hak Dilindungi.</p>
    </div>
</footer>
</body>

</html>