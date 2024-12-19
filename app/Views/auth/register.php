<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Fan Registration</title>
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
            height: 100vh;
            overflow: hidden;
        }

        .card-container {
            max-width: 500px;
            margin: auto;
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .left-panel {
            background: #0a4d2e;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .left-panel h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .btn-custom {
            background-color: #0a4d2e;
            color: white;
            border-radius: 50px;
            padding: 8px 16px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #083d25;
            transform: translateY(-2px);
        }

        .form-control {
            border-radius: 50px;
            padding: 8px 12px;
            border: 1px solid #e0e0e0;
        }

        .form-control:focus {
            border-color: #0a4d2e;
            box-shadow: 0 0 0 0.2rem rgba(10, 77, 46, 0.25);
        }

        .football-icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .form-label {
            margin-bottom: 0.25rem;
        }

        .mb-3 {
            margin-bottom: 0.75rem !important;
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
                            <div class="left-panel">
                                <i class="fas fa-futbol football-icon"></i>
                                <h2>Join the Football Frenzy!</h2>
                                <p class="mb-0">Create your account and never miss a match!</p>
                            </div>
                            <div class="card-body p-3">
                                <!-- Flash message -->
                                <?php if (session()->getFlashdata('msg')): ?>
                                    <div class="alert alert-danger text-center">
                                        <?= session()->getFlashdata('msg') ?>
                                    </div>
                                <?php endif; ?>

                                <form action="/register" method="post">
                                    <?= csrf_field() ?>

                                    <div class="mb-2">
                                        <label for="username" class="form-label small">Username</label>
                                        <input type="text" id="username" name="username"
                                            class="form-control form-control-sm" required
                                            value="<?= set_value('username') ?>"
                                            placeholder="Choose a unique username" />
                                    </div>

                                    <div class="mb-2">
                                        <label for="email" class="form-label small">Email address</label>
                                        <input type="email" id="email" name="email" class="form-control form-control-sm"
                                            required value="<?= set_value('email') ?>" placeholder="Enter your email" />
                                    </div>

                                    <div class="mb-2">
                                        <label for="password" class="form-label small">Password</label>
                                        <input type="password" id="password" name="password"
                                            class="form-control form-control-sm" required
                                            placeholder="Create a strong password" />
                                    </div>

                                    <div class="mb-2">
                                        <label for="confirm_password" class="form-label small">Confirm Password</label>
                                        <input type="password" id="confirm_password" name="password_confirm"
                                            class="form-control form-control-sm" required
                                            placeholder="Confirm your password" />
                                    </div>

                                    <div class="mb-2">
                                        <label for="no_telp" class="form-label small">Phone Number</label>
                                        <input type="tel" id="no_telp" name="no_telp"
                                            class="form-control form-control-sm" required
                                            value="<?= set_value('no_telp') ?>" placeholder="Enter your phone number" />
                                    </div>

                                    <button type="submit" class="btn btn-custom w-100">Register</button>
                                </form>
                                <p class="text-center mt-2 small">Already a member? <a href="/login">Sign in</a></p>
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
