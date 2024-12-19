<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Ticket Penjualan Stadion Maguwoharjo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .highlight {
            color: yellow;
        }

        .footer {
            background-color: #282828;
            color: white;
            padding: 30px 0;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .footer-section {
            flex: 1;
            padding: 20px;
            min-width: 200px;
        }

        .footer-section h2 {
            color: white;
            margin-bottom: 15px;
        }

        .footer-section p,
        .footer-section ul {
            font-size: 14px;
            line-height: 24px;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: #ffcc00;
        }

        .social-icons a {
            color: white;
            margin: 0 10px;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #ffcc00;
        }

        .footer-bottom {
            background-color: #1c1c1c;
            padding: 15px 0;
            font-size: 12px;
            color: white;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            transition: background-color 0.3s ease;
        }

        header.scrolled {
            background-color: rgba(0, 0, 0, 0.95);
        }

        .logo {
            height: 50px;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.1);
        }

        .nav-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
        }

        nav {
            display: flex;
            gap: 30px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #4CAF50;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-outline {
            border: 2px solid white;
            color: white;
        }

        .btn-outline:hover {
            background-color: white;
            color: #333;
        }

        .btn-green {
            background-color: #4CAF50;
            color: white;
        }

        .btn-green:hover {
            background-color: #45a049;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .auth-buttons {
            display: flex;
            gap: 15px;
        }

        .hero {
            height: 100vh;
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('/bg.jpg');
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
            font-size: 4.5rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            animation: fadeInUp 1s ease-out;
        }

        .hero h2 {
            font-size: 2.8rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            animation: fadeInUp 1s ease-out 0.3s;
            animation-fill-mode: both;
        }

        .hero p {
            font-size: 1.8rem;
            margin-bottom: 40px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            animation: fadeInUp 1s ease-out 0.6s;
            animation-fill-mode: both;
        }

        .cta-button {
            padding: 15px 40px;
            font-size: 1.3rem;
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            border-radius: 50px;
            transition: all 0.3s ease;
            animation: fadeInUp 1s ease-out 0.9s;
            animation-fill-mode: both;
        }

        .cta-button:hover {
            background-color: #45a049;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .features {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            padding: 80px 20px;
            background-color: #f9f9f9;
        }

        .feature {
            flex-basis: calc(33.333% - 40px);
            text-align: center;
            padding: 40px 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin-bottom: 40px;
        }

        .feature:hover {
            transform: translateY(-10px);
        }

        .feature i {
            font-size: 3rem;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .feature h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #333;
        }

        .feature p {
            font-size: 1.1rem;
            color: #666;
        }

        .upcoming-matches {
            padding: 80px 20px;
            background-color: #fff;
        }

        .upcoming-matches h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 40px;
            color: #333;
        }

        .match-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .match-card {
            flex-basis: calc(33.333% - 30px);
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .match-card:hover {
            transform: translateY(-10px);
        }

        .team-logos {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 20px;
            background-color: #f0f0f0;
        }

        .team-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }

        .vs {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .match-card h3 {
            text-align: center;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            font-size: 1.3rem;
        }

        .match-info {
            padding: 20px;
        }

        .match-info p {
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .match-card .btn {
            display: block;
            text-align: center;
            margin: 20px;
        }

        .next-matches {
            text-align: center;
            margin-top: 40px;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 1.1rem;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                padding: 15px;
            }

            .nav-container {
                display: flex;
                justify-content: center;
                /* Menempatkan navbar di tengah */
                align-items: center;
                flex-grow: 1;
            }

            nav {
                display: flex;
                gap: 30px;
                text-align: center;
                /* Menyesuaikan agar teks pada navbar berada di tengah */
            }

            .auth-buttons {
                margin-top: 15px;
            }

            .hero h1 {
                font-size: 3rem;
            }

            .hero h2 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1.2rem;
            }

            .feature,
            .match-card {
                flex-basis: 100%;
            }
        }
    </style>
</head>


<body>
    <header>
        <img src="/logo.png" alt="Logo" class="logo">
        <div class="nav-container">
            <nav>
                <a href="#"><i class="fas fa-home"></i> Home</a>
                <a href="#"><i class="fas fa-info-circle"></i> About us</a>
                <a href="#"><i class="fas fa-ticket-alt"></i> Products</a>
                <a href="#"><i class="fas fa-envelope"></i> Contact us</a>
            </nav>
        </div>
        <div class="auth-buttons">
            <a href="/login" class="btn btn-outline"><i class="fas fa-sign-in-alt"></i> Login</a>
        </div>
    </header>

    <section class="hero">
        <h1>E-TICKET</h1>
        <h2 class="highlight">STADION MAGUWOHARJO</h2>
        <p>Dapatkan tiket dengan mudah dan cepat.</p>
        <a href="#upcoming-matches" class="cta-button"><i class="fas fa-ticket-alt"></i> Book Your Tickets Now</a>
    </section>

    <section id="upcoming-matches" class="upcoming-matches">
        <h2>Jadwal Pertandingan</h2>
        <div class="match-list">
            <?php foreach ($jadwal as $match): ?>
              <div class="match-card">
    <div class="team-logos">
        <!-- Pastikan path gambar benar, jika di folder public/uploads -->
        <img src="<?= base_url('uploads/logos/' . $match['logo_tim_a']) ?>" alt="<?= $match['tim_a'] ?>"
                        class="team-logo">
                    <span class="vs">VS</span>
                    <img src="<?= base_url('uploads/logos/' . $match['logo_tim_b']) ?>" alt="<?= $match['tim_b'] ?>"
                        class="team-logo">
                </div>
                <h3><?= $match['tim_a'] ?> vs <?= $match['tim_b'] ?></h3>
                <div class="match-info">
                    <p><i class="far fa-calendar-alt"></i> <strong>Date:</strong> <span><?= $match['tanggal'] ?></span></p>
                    <p><i class="far fa-clock"></i> <strong>Time:</strong> <span><?= $match['waktu'] ?></span></p>
                    <p><i class="fas fa-map-marker-alt"></i> <strong>Venue:</strong> <span><?= $match['lokasi'] ?></span></p>
                    <p><i class="fas fa-tag"></i> <strong>Price:</strong> <span>IDR
                            <?= number_format($match['harga_tiket'], 0, ',', '.') ?></span></p>
                </div>
                <a href="/login" class="btn btn-green">Get Tickets</a>
            </div>

            <?php endforeach; ?>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section about">
                <h2>Tentang Kami</h2>
                <p>Kami menyediakan layanan E-Tiket yang cepat, mudah, dan dapat diandalkan untuk kebutuhan perjalanan
                    Anda.</p>
            </div>
            <div class="footer-section links">
                <h2>Tautan Berguna</h2>
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Layanan</a></li>
                    <li><a href="#">Hubungi Kami</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                </ul>
            </div>
            <div class="footer-section social">
                <h2>Ikuti Kami</h2>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 E-Tiket. Semua Hak Dilindungi.</p>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', function () {
            const header = document.querySelector('header');
            header.classList.toggle('scrolled', window.scrollY > 0);
        });
    </script>
</body>

</html>