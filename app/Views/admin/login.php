<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator | Sistem Data BWS</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* Variabel CSS untuk Konsistensi Warna */
        :root {
            --color-primary-dark: #0A2A43; /* Biru Tua Utama */
            --color-primary-light: #173f5f; /* Biru Sedang */
            --color-accent-orange: #FFC107; /* Kuning/Oranye Aksen */
            --color-text: #344767;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            color: var(--color-text);
            /* Latar Belakang Biru Gelap dengan Hiasan */
            background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary-light) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            position: relative; /* Untuk penempatan hiasan */
            overflow: hidden;
        }

        /* Hiasan Latar Belakang Oranye (Kesan Profesional/Secure) */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 150px;
            height: 150px;
            background: rgba(255, 193, 7, 0.2); /* Oranye Transparan */
            border-radius: 0 0 150px 0;
            filter: blur(50px);
        }
        
        body::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1); /* Putih Transparan */
            border-radius: 200px 0 0 0;
            filter: blur(60px);
        }

        .login-card {
            width: 440px;
            padding: 40px;
            border-radius: 20px;
            background: #ffffff;
            box-shadow: 0 18px 50px rgba(0, 0, 0, 0.35); /* Bayangan lebih dramatis di atas background gelap */
            /* Mengganti border-top biru dengan border oranye */
            border-top: 5px solid var(--color-accent-orange); 
            animation: fadeIn 0.8s ease-out;
            z-index: 10; /* Pastikan di atas hiasan */
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-header img {
            height: 60px; /* Ukuran logo sedikit lebih besar */
            margin-bottom: 15px;
        }

        .login-header h5 {
            font-weight: 800;
            color: var(--color-primary-dark);
            margin-bottom: 4px;
        }

        .login-header p {
            font-size: 14px;
            color: #6c757d;
        }

        /* Input Styling Premium */
        .form-control {
            padding: 12px 15px;
            border-radius: 10px;
            border: 1px solid #ced4da;
            transition: all 0.3s;
        }

        .form-control:focus {
            /* Fokus Aksen Oranye */
            border-color: var(--color-accent-orange);
            box-shadow: 0 0 0 4px rgba(255, 193, 7, 0.2); 
        }

        .form-label {
            font-weight: 600;
            color: var(--color-text);
            font-size: 15px;
        }

        /* Tombol Login Oranye */
        .btn-login {
            background: var(--color-accent-orange);
            color: var(--color-primary-dark); /* Teks biru tua di atas oranye */
            font-weight: 700;
            padding: 13px;
            border-radius: 10px;
            transition: background 0.3s, transform 0.2s, box-shadow 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 10px rgba(255, 193, 7, 0.4); /* Bayangan oranye */
        }

        .btn-login:hover {
            background: #ffa000; /* Oranye lebih gelap saat hover */
            color: var(--color-primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 193, 7, 0.5); 
        }

        .back-link {
            /* ... (tetap sama) ... */
            display: block;
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: #ccc; /* Warna lebih terang karena di atas background gelap */
            text-decoration: none;
            transition: color 0.2s;
        }
        .back-link:hover {
            color: #ffffff; /* Putih saat hover */
        }

        /* Alert styling */
        .alert-danger {
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            border-left: 5px solid #dc3545;
        }

    </style>
</head>

<body>

<div class="login-card">

    <div class="login-header">
        <img src="/img/logo.png" alt="Logo PU">
        <h5>SISTEM ADMINISTRASI DATA</h5>
        <p>Silakan masuk untuk mengakses Dashboard Admin</p>
    </div>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i> 
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('admin/login/auth') ?>">

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan Username atau NIP" required autofocus>
        </div>

        <div class="mb-4">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan Kata Sandi" required>
        </div>

        <button type="submit" class="btn btn-login w-100">
            <i class="fas fa-sign-in-alt"></i> 
            MASUK
        </button>

    </form>
    
    <a href="<?= base_url('/') ?>" class="back-link">
        <i class="fas fa-arrow-left me-1"></i> Kembali ke Halaman Utama
    </a>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>