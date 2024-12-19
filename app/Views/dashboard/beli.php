<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan E-Ticket</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f0f2f5;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #4a4a4a;
            font-size: 2.5em;
            margin-bottom: 30px;
        }

        .step {
            display: none;
            animation: fadeIn 0.5s;
        }

        .step.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        h2 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #34495e;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #bdc3c7;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input:focus,
        select:focus {
            border-color: #3498db;
            outline: none;
        }

        button {
            background-color: #45a049;
            /* Warna hijau #45a049 */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #3e8e41;
        }

        .success-message {
            color: #27ae60;
            text-align: center;
            font-weight: bold;
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .payment-methods {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .payment-method {
            width: 30%;
            margin-bottom: 15px;
            text-align: center;
        }

        .payment-method img {
            width: 60px;
            height: 60px;
            object-fit: contain;
            margin-bottom: 5px;
        }

        .payment-method input[type="radio"] {
            display: none;
        }

        .payment-method label {
            display: block;
            padding: 10px;
            border: 2px solid #bdc3c7;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .payment-method input[type="radio"]:checked+label {
            border-color: #3498db;
            background-color: #ebf5fb;
        }

        .e-ticket {
            background-color: white;
            width: 100%;
            max-width: 350px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 20px auto;
        }

        .ticket-header {
            background-color: #45a049;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .ticket-header h1 {
            margin: 0;
            font-size: 24px;
        }

        .ticket-body {
            padding: 20px;
        }

        .match-info {
            text-align: center;
            margin-bottom: 20px;
        }

        .match-info h2 {
            font-size: 18px;
            margin: 10px 0;
            border-bottom: none;
        }

        .ticket-details {
            border-top: 1px dashed #bdc3c7;
            padding-top: 20px;
        }

        .ticket-detail {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .qr-code {
            text-align: center;
            margin-top: 20px;
        }

        .qr-code img {
            width: 100px;
            height: 100px;
        }

        .progress-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .progress-step {
            flex: 1;
            text-align: center;
            position: relative;
        }

        .progress-step::after {
            content: '';
            position: absolute;
            top: 15px;
            left: 50%;
            width: 100%;
            height: 2px;
            background-color: #bdc3c7;
            z-index: -1;
        }

        .progress-step:last-child::after {
            display: none;
        }

        .progress-step-number {
            width: 30px;
            height: 30px;
            background-color: #bdc3c7;
            color: white;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 5px;
        }

        .progress-step.active .progress-step-number {
            background-color: #45a049;
            /* Warna hijau #45a049 */
        }

        .progress-step-label {
            font-size: 12px;
            color: #7f8c8d;
        }

        .progress-step.active .progress-step-label {
            color: #45a049;
            /* Warna hijau #45a049 */
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Pemesanan E-Ticket</h1>

        <div class="progress-bar">
            <div class="progress-step active">
                <div class="progress-step-number">1</div>
                <div class="progress-step-label">Data Tiket</div>
            </div>
            <div class="progress-step">
                <div class="progress-step-number">2</div>
                <div class="progress-step-label">Data Pribadi</div>
            </div>
            <div class="progress-step">
                <div class="progress-step-number">3</div>
                <div class="progress-step-label">Pilih Kategori</div>
            </div>
            <div class="progress-step">
                <div class="progress-step-number">4</div>
                <div class="progress-step-label">Konfirmasi</div>
            </div>
        </div>

        <div id="step1" class="step active">
            <h2>1. Data Tiket</h2>
            <label for="jumlah_tiket">Jumlah Pesanan Tiket:</label>
            <input type="number" id="jumlah_tiket" min="1" value="1" onchange="updateTotalPrice()" required>


            <label for="total_harga">Total Harga:</label>
            <input type="number" id="total_harga" value="0" readonly required>

            <label for="tanggal_nota">Tanggal Nota:</label>
            <input type="date" id="tanggal_nota" required>

            <label>Metode Pembayaran:</label>
            <div class="payment-methods">
                <div class="payment-method">
                    <input type="radio" id="bri" name="metode_pembayaran" value="bri" required>
                    <label for="bri">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/BANK_BRI_logo.svg/2560px-BANK_BRI_logo.svg.png"
                            alt="BRI">
                        BRI
                    </label>
                </div>
                <div class="payment-method">
                    <input type="radio" id="bca" name="metode_pembayaran" value="bca">
                    <label for="bca">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_Central_Asia.svg/2560px-Bank_Central_Asia.svg.png"
                            alt="BCA">
                        BCA
                    </label>
                </div>
                <div class="payment-method">
                    <input type="radio" id="mandiri" name="metode_pembayaran" value="mandiri">
                    <label for="mandiri">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Bank_Mandiri_logo_2016.svg/2560px-Bank_Mandiri_logo_2016.svg.png"
                            alt="Mandiri">
                        Mandiri
                    </label>
                </div>
                <div class="payment-method">
                    <input type="radio" id="bni" name="metode_pembayaran" value="bni">
                    <label for="bni">
                        <img src="https://upload.wikimedia.org/wikipedia/id/thumb/5/55/BNI_logo.svg/2560px-BNI_logo.svg.png"
                            alt="BNI">
                        BNI
                    </label>
                </div>
                <div class="payment-method">
                    <input type="radio" id="ovo" name="metode_pembayaran" value="ovo">
                    <label for="ovo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Logo_ovo_purple.svg/2560px-Logo_ovo_purple.svg.png"
                            alt="OVO">
                        OVO
                    </label>
                </div>
                <div class="payment-method">
                    <input type="radio" id="gopay" name="metode_pembayaran" value="gopay">
                    <label for="gopay">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/86/Gopay_logo.svg/2560px-Gopay_logo.svg.png"
                            alt="Gopay">
                        Gopay
                    </label>
                </div>
            </div>

            <button onclick="nextStep(2)">Next</button>
        </div>

        <div id="step2" class="step">
            <h2>2. Data Pribadi</h2>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" required>

            <label for="nik">NIK:</label>
            <input type="text" id="nik" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" required>

            <label for="klub">Klub:</label>
            <input type="text" id="klub" required>

            <label for="tanggal_waktu">Tanggal & Waktu:</label>
            <input type="datetime-local" id="tanggal_waktu" required>

            <button onclick="nextStep(3)">Next</button>
        </div>

        <div id="step3" class="step">
            <h2>3. Pilih Kategori</h2>
            <label for="tribun">Pilih Tribun:</label>
            <select id="tribun" required>
                <option value="">Pilih Tribun</option>
                <option value="utara">Tribun Utara</option>
                <option value="selatan">Tribun Selatan</option>
                <option value="timur">Tribun Timur</option>
                <option value="barat">Tribun Barat</option>
            </select>

            <button onclick="nextStep(4)">Next</button>
        </div>

        <div id="step4" class="step">
            <h2>4. Konfirmasi Pesanan</h2>
            <label for="tanggal_pesanan">Tanggal Pesanan:</label>
            <input type="date" id="tanggal_pesanan" required>

            <label for="email_konfirmasi">E-mail:</label>
            <input type="email" id="email_konfirmasi" required>

            <label for="kode_keamanan">Kode Keamanan:</label>
            <input type="text" id="kode_keamanan" required>

            <button onclick="konfirmasiPesanan()">Kirim</button>
        </div>

        <div id="success" class="step">
            <p class="success-message">Berhasil mengonfirmasi pesanan!</p>
            <p>E-ticket Anda akan segera dikirim ke alamat email yang telah didaftarkan.</p>
            <button onclick="lihatETicket()">Lihat E-Ticket</button>
        </div>

        <div id="e-ticket" class="step">
            <div class="e-ticket">
                <div class="ticket-header">
                    <h1>E-Ticket Stadion Maguwoharjo</h1>
                </div>
                <div class="ticket-body">
                    <div class="match-info">
                        <h2>PSS Sleman vs Persija Jakarta</h2>
                    </div>
                    <div class="ticket-details">
                        <div class="ticket-detail">
                            <span>Date:</span>
                            <span id="ticket-date"></span>
                        </div>
                        <div class="ticket-detail">
                            <span>Time:</span>
                            <span id="ticket-time"></span>
                        </div>
                        <div class="ticket-detail">
                            <span>Venue:</span>
                            <span>Stadion Maguwoharjo</span>
                        </div>
                        <div class="ticket-detail">
                            <span>Tribun:</span>
                            <span id="ticket-tribun"></span>
                        </div>
                        <div class="ticket-detail">
                            <span>Nama:</span>
                            <span id="ticket-nama"></span>
                        </div>
                        <div class="ticket-detail">
                            <span>Ticket No:</span>
                            <span id="ticket-number"></span>
                        </div>
                    </div>
                    <div class="qr-code">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=DummyTicketCode"
                            alt="QR Code">
                    </div>
                </div>
            </div>
            <button onclick="kembaliKeHalamanUtama()">Kembali ke Halaman Utama</button>
        </div>
    </div>

    <script>
        const ticketPrice = 100000; // Harga per tiket dalam rupiah

        function updateTotalPrice() {
            const jumlahTiket = document.getElementById('jumlah_tiket').value;
            const totalHarga = ticketPrice * jumlahTiket;
            document.getElementById('total_harga').value = totalHarga;
        }

        function nextStep(step) {
            document.querySelectorAll('.step').forEach(el => el.classList.remove('active'));
            document.getElementById('step' + step).classList.add('active');
            updateProgressBar(step);
        }

        function updateProgressBar(step) {
            document.querySelectorAll('.progress-step').forEach((el, index) => {
                if (index < step) {
                    el.classList.add('active');
                } else {
                    el.classList.remove('active');
                }
            });
        }

        function konfirmasiPesanan() {
            document.querySelectorAll('.step').forEach(el => el.classList.remove('active'));
            document.getElementById('success').classList.add('active');
            updateProgressBar(5);
        }

        function lihatETicket() {
            const nama = document.getElementById('nama').value;
            const tanggalWaktu = new Date(document.getElementById('tanggal_waktu').value);
            const tribun = document.getElementById('tribun').value;

            document.getElementById('ticket-date').textContent = tanggalWaktu.toLocaleDateString();
            document.getElementById('ticket-time').textContent = tanggalWaktu.toLocaleTimeString();
            document.getElementById('ticket-tribun').textContent = tribun.charAt(0).toUpperCase() + tribun.slice(1);
            document.getElementById('ticket-nama').textContent = nama;
            document.getElementById('ticket-number').textContent = 'PSS' + Math.floor(Math.random() * 1000000);

            document.querySelectorAll('.step').forEach(el => el.classList.remove('active'));
            document.getElementById('e-ticket').classList.add('active');
        }

        function kembaliKeHalamanUtama() {
            document.querySelectorAll('.step').forEach(el => el.classList.remove('active'));
            document.getElementById('step1').classList.add('active');
            updateProgressBar(1);
        }

        window.onload = updateTotalPrice;
    </script>
</body>

</html>