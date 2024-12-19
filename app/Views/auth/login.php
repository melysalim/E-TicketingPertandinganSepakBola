<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Team E-Ticket Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        body,
        html {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            background-color: #f4f7fa;
        }

        .bg-custom {
            background: linear-gradient(135deg, rgba(10, 77, 46, 0.8), rgba(26, 141, 68, 0.8)),
                url('https://asset-2.tstatic.net/kaltim/foto/bank/images/pss-sleman-background_17012020.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .card-container {
            position: relative;
            max-width: 1000px;
            margin: auto;
        }

        .card-container::before {
            content: '';
            position: absolute;
            top: -5px;
            right: -5px;
            bottom: -5px;
            left: -5px;
            background: linear-gradient(45deg, #0a4d2e, #1a8d44, #2ecc71, #0a4d2e);
            border-radius: 25px;
            filter: blur(20px);
            opacity: 0.7;
            z-index: -1;
            animation: glowing 3s ease-in-out infinite alternate;
        }

        @keyframes glowing {
            0% {
                opacity: 0.7;
            }

            100% {
                opacity: 1;
            }
        }

        .card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .left-panel {
            background: linear-gradient(135deg, #0a4d2e, #1a8d44);
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .left-panel::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 70%);
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.8);
                opacity: 0.5;
            }

            50% {
                transform: scale(1.2);
                opacity: 1;
            }

            100% {
                transform: scale(0.8);
                opacity: 0.5;
            }
        }

        .left-panel h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .left-panel p {
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .btn-custom {
            background-color: #0a4d2e;
            color: white;
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #083d25;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(10, 77, 46, 0.3);
        }

        .text-custom {
            color: #0a4d2e;
        }

        .logo-text {
            color: #0a4d2e;
            font-weight: 700;
        }

        .form-control {
            border-radius: 50px;
            padding: 12px 20px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #0a4d2e;
            box-shadow: 0 0 0 0.2rem rgba(10, 77, 46, 0.25);
        }

        .input-group-text {
            background-color: transparent;
            border: none;
            color: #0a4d2e;
        }

        .social-login {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .social-login a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #f0f0f0;
            color: #333;
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        .social-login a:hover {
            background-color: #0a4d2e;
            color: white;
            transform: translateY(-2px);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e0e0e0;
        }

        .divider span {
            padding: 0 10px;
            color: #777;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <section class="bg-custom d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card-container">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-lg-6 left-panel d-flex align-items-center">
                                    <div class="text-center">
                                        <h2>Welcome to Team E-Ticket</h2>
                                        <p>Your gateway to thrilling football matches. Login to access your account and
                                            secure your spot in the stadium!</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex align-items-center">
                                    <div class="card-body p-5">
                                        <div class="text-center mb-4">
                                            <h2 class="logo-text mb-0"><i class="fas fa-futbol me-2"></i>Team E-Ticket
                                            </h2>
                                            <p class="text-muted">Welcome back! Please login to your account.</p>
                                        </div>

                                        <!-- Tambahkan action dan method pada form -->
                                        <form action="/login" method="post">
                                            <?= csrf_field() ?>

                                            <!-- Notifikasi error (opsional) -->
                                            <?php if (session()->getFlashdata('msg')): ?>
                                                <div class="alert alert-danger">
                                                    <?= session()->getFlashdata('msg') ?>
                                                </div>
                                            <?php endif; ?>

                                            <!-- Input Username -->
                                            <div class="mb-4">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-user"></i></span>
                                                    <input type="text" name="username" class="form-control"
                                                        placeholder="Username" required>
                                                </div>
                                            </div>

                                            <!-- Input Password -->
                                            <div class="mb-4">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                    <input type="password" name="password" class="form-control"
                                                        placeholder="Password" required>
                                                </div>
                                            </div>

                                            <!-- Remember Me -->
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="remember">
                                                    <label class="form-check-label" for="remember">Remember me</label>
                                                </div>
                                                <a href="#" class="text-custom">Forgot password?</a>
                                            </div>

                                            <!-- Submit Button -->
                                            <button type="submit" class="btn btn-custom w-100">Login</button>
                                        </form>

                                        <!-- Divider dan Opsi Login Sosial -->
                                        <div class="divider">
                                            <span>or login with</span>
                                        </div>
                                        <div class="social-login">
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-google"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                        </div>

                                        <!-- Opsi Registrasi -->
                                        <p class="text-center mt-4">
                                            Don't have an account? <a href="/register" class="text-custom">Register
                                                here</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
