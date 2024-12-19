<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #1a1a1a;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .eticket-container {
            max-width: 600px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #FFD700;
            font-size: 2.5rem;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .eticket {
            background: linear-gradient(135deg, #222222 0%, #333333 100%);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
            border: 1px solid #4CAF50;
        }

        .eticket::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 10px;
            background: linear-gradient(45deg, #4CAF50, #FFD700, #4CAF50);
        }

        .eticket p {
            margin: 20px 0;
            font-size: 1.1rem;
            color: #ffffff;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #4CAF50;
            padding-bottom: 15px;
        }

        .eticket strong {
            min-width: 150px;
            color: #FFD700;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        .btn-green {
            background: linear-gradient(45deg, #4CAF50, #45a049);
            color: white;
            border: 2px solid #FFD700;
            padding: 15px 30px;
            border-radius: 50px;
            font-size: 1.1rem;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .btn-green:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
            background: linear-gradient(45deg, #45a049, #4CAF50);
        }

        /* Efek stripe animasi */
        .eticket::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
                    transparent,
                    rgba(255, 215, 0, 0.1),
                    transparent);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            to {
                left: 100%;
            }
        }

        /* Animasi kedatangan */
        @keyframes slideIn {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .eticket {
            animation: slideIn 0.5s ease-out;
        }

        /* Responsive design */
        @media (max-width: 480px) {
            .eticket p {
                flex-direction: column;
                align-items: flex-start;
            }

            .eticket strong {
                margin-bottom: 5px;
            }

            h1 {
                font-size: 2rem;
            }
        }

        /* Tambahan badge dekoratif */
        .corner-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #FFD700;
            color: #000;
            padding: 5px 15px;
            border-radius: 15px;
            font-size: 0.8rem;
            transform: rotate(5deg);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Tempat QR Code dalam card */
        .qr-container {
            text-align: center;
            margin-top: 20px;
        }

        canvas {
            margin-top: 20px;
            max-width: 200px;
            /* Atur ukuran QR Code */
            max-height: 200px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script>
</head>

<body>
    <div class="eticket-container">
        <h1>E-Tiket Anda</h1>
        <div class="eticket">
            <div class="corner-badge">VALID</div>
            <p>
                <strong>Pertandingan:</strong>
                <?= $pemesanan['tim_a'] ?> vs <?= $pemesanan['tim_b'] ?>
            </p>
            <p>
                <strong>Tanggal:</strong>
                <?= date('d M Y', strtotime($pemesanan['tanggal'])) ?>
            </p>
            <p>
                <strong>Jam:</strong>
                <?= $pemesanan['waktu'] ?> WIB
            </p>
            <p>
                <strong>Lokasi:</strong>
                <?= $pemesanan['lokasi'] ?>
            </p>
            <p>
                <strong>Jumlah Tiket:</strong>
                <?= $pemesanan['jumlah_tiket'] ?>
            </p>

            <!-- Menambahkan Nomor Kursi -->
            <p>
                <strong>Nomor Kursi:</strong>
                <?= $pemesanan['nomor_kursi'] ?>
            </p>

            <!-- Tempat QR Code di dalam card -->
            <div class="qr-container">
                <h2>QR Code Tiket</h2>
                <canvas id="qrcode"></canvas> <!-- QR code ditempatkan di dalam card -->
            </div>

            <button onclick="window.print()" class="btn-green">Cetak Tiket</button>
        </div>
    </div>

    <script>
        // Membuat QR Code berdasarkan data tiket
        var qrData = `Pertandingan: ${'<?= $pemesanan['tim_a'] ?> vs <?= $pemesanan['tim_b'] ?>'}\n` +
            `Tanggal: ${'<?= date('d M Y', strtotime($pemesanan['tanggal'])) ?>'}\n` +
            `Jam: ${'<?= $pemesanan['waktu'] ?>'}\n` +
            `Lokasi: ${'<?= $pemesanan['lokasi'] ?>'}\n` +
            `Jumlah Tiket: ${'<?= $pemesanan['jumlah_tiket'] ?>'}\n` +
            `Nomor Kursi: ${'<?= $pemesanan['nomor_kursi'] ?>'}`;  // Tambahkan Nomor Kursi ke dalam data QR Code

        // Menampilkan QR code di dalam elemen canvas dengan id 'qrcode'
        QRCode.toCanvas(document.getElementById('qrcode'), qrData, function (error) {
            if (error) console.error(error);
            console.log('QR Code telah di-generate!');
        });
    </script>
</body>

</html>