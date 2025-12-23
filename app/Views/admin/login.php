<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator | SDA Enterprise</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-dongker: #0f172a;
            --secondary-navy: #1e293b;
            --accent-pu: #e5ac01; 
            --accent-hover: #f59e0b;
            --text-main: #f8fafc;
            --glass-bg: rgba(255, 255, 255, 0.03);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--primary-dongker);
            /* Background dengan tekstur gradasi halus */
            background-image: 
                radial-gradient(at 0% 0%, rgba(37, 99, 235, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(229, 172, 1, 0.1) 0px, transparent 50%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
        }

        /* --- LOGIN CARD --- */
        .login-card {
            width: 100%;
            max-width: 420px;
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 45px;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .login-header img {
            height: 70px;
            margin-bottom: 20px;
            filter: drop-shadow(0 4px 10px rgba(0,0,0,0.3));
        }

        .login-header h2 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -0.02em;
            margin-bottom: 8px;
        }

        .login-header p {
            color: #94a3b8;
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* --- FORM STYLING --- */
        .form-label {
            color: #cbd5e1;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 8px;
        }

        .input-group-custom {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group-custom i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            transition: 0.3s;
        }

        .form-control {
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 12px 15px 12px 45px;
            color: white;
            font-weight: 500;
            transition: all 0.3s;
        }

        .form-control:focus {
            background: rgba(15, 23, 42, 0.8);
            border-color: var(--accent-pu);
            box-shadow: 0 0 0 4px rgba(229, 172, 1, 0.15);
            color: white;
        }

        .form-control:focus + i {
            color: var(--accent-pu);
        }

        /* --- BUTTON --- */
        .btn-login {
            background: var(--accent-pu);
            color: var(--primary-dongker);
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-weight: 800;
            font-size: 0.95rem;
            width: 100%;
            margin-top: 10px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 10px 15px -3px rgba(229, 172, 1, 0.3);
        }

        .btn-login:hover {
            background: var(--accent-hover);
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(229, 172, 1, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        /* --- UTILS --- */
        .back-link {
            display: block;
            text-align: center;
            margin-top: 30px;
            color: #64748b;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            transition: 0.3s;
        }

        .back-link:hover {
            color: #ffffff;
        }

        .alert-custom {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5;
            border-radius: 12px;
            font-size: 0.85rem;
            padding: 12px;
            margin-bottom: 20px;
        }

        /* Placeholder Color */
        ::placeholder { color: #475569 !important; font-weight: 400; }

    </style>
</head>
<body>

<div class="login-card">
    <div class="login-header">
        <img src="<?= base_url('img/logo.png') ?>" alt="Logo">
        <h2>PORTAL ADMIN</h2>
        <p>Sistem Informasi Pengelolaan Data</p>
    </div>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert-custom d-flex align-items-center">
            <i class="bi bi-exclamation-octagon-fill me-2"></i>
            <div><?= session()->getFlashdata('error') ?></div>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('admin/login/auth') ?>">
        <?= csrf_field() ?>
        
        <div class="mb-3">
            <label class="form-label">Username </label>
            <div class="input-group-custom">
                <input type="text" name="username" class="form-control" placeholder="Masukkan ID Anda" required autofocus>
                <i class="bi bi-person-fill"></i>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label">Password</label>
            <div class="input-group-custom">
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                <i class="bi bi-lock-fill"></i>
            </div>
        </div>

        <button type="submit" class="btn-login">
            MASUK KE DASHBOARD <i class="bi bi-arrow-right-short" style="font-size: 1.4rem;"></i>
        </button>
    </form>
    
    <a href="<?= base_url('/') ?>" class="back-link">
        <i class="bi bi-house-door me-1"></i> Kembali ke Beranda Publik
    </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>