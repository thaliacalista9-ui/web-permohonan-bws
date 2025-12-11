<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f2f6;
        }

        .login-card {
            width: 420px;
            margin: 90px auto;
            padding: 35px;
            border-radius: 18px;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .login-card h4 {
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }

        .btn-login {
            background: #0A2A43;
            color: #ffffff;
            font-weight: 600;
            padding: 12px;
            border-radius: 10px;
        }

        .btn-login:hover {
            background: #083a61;
            color: #ffffff;
        }
    </style>
</head>

<body>

<div class="login-card">

    <h4>Login Admin</h4>

    <!-- ✅ NOTIFIKASI ERROR -->
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <!-- ✅ FORM ACTION SUDAH BENAR -->
    <form method="post" action="<?= base_url('admin/login/auth') ?>">

        <div class="mb-3">
            <label class="form-label fw-semibold">Username</label>
            <input type="text" name="username" class="form-control" required autofocus>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-login w-100">
            Login
        </button>

    </form>

</div>

</body>
</html>
