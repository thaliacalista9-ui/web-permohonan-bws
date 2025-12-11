<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lacak Permohonan | BWS Sumatera V</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

<style>
    body { font-family: 'Poppins', sans-serif; background:#f4f6f9; }

    .navbar { background:#0A2A43; }
    .navbar .nav-link:hover { color:#f0c400 !important; }
    .navbar .nav-link.active { color:#f0c400 !important; font-weight:700; }

    .tracking-container {
        background:white;
        padding:40px 45px;
        border-radius:16px;
        box-shadow:0 8px 30px rgba(0,0,0,0.1);
        max-width:800px;
        margin:auto;
        margin-top:60px;
        margin-bottom:60px;
    }

    .title-head {
        font-size:42px;
        font-weight:800;
        text-align:center;
        margin-bottom:10px;
        color:#0A2A43;
    }

    .desc {
        text-align:center;
        font-size:18px;
        color:#666;
        margin-bottom:25px;
    }

    .form-control {
        padding:14px;
        border-radius:12px;
        font-size:17px;
    }

    .btn-track {
        background:#f0c400;
        font-weight:700;
        font-size:18px;
        padding:14px;
        border-radius:12px;
        width:100%;
        margin-top:18px;
        color:#000;
    }

    .result-box {
        margin-top:30px;
        border-radius:14px;
        padding:25px;
        background:#eaf0f6;
    }

    .status-label {
        font-size:20px;
        font-weight:700;
        color:#0A2A43;
    }
</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <img src="/img/logo.png" height="50" class="me-3">
        <a class="navbar-brand fw-bold">SISTEM PERMOHONAN DATA</a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-white" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/permohonan">Ajukan Permohonan</a></li>
                <li class="nav-item"><a class="nav-link active" href="/tracking">Lacak Permohonan</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/grafik">Grafik Kepuasan</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/faq">FAQ</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- TRACKING FORM -->
<div class="tracking-container">
    <h1 class="title-head">Lacak Permohonan Data</h1>
    <p class="desc">Masukkan Nomor Tracking / ID Permohonan untuk mengetahui status proses permintaan data Anda.</p>

    <form action="/tracking/cari" method="post">
        <input type="text" name="kode" class="form-control" placeholder="Contoh: BWS-2025-1234" required>
        <button type="submit" class="btn btn-track">Lacak Sekarang</button>
    </form>

    <?php if ($not_found): ?>
        <div class="alert alert-danger mt-4">Kode tracking tidak ditemukan.</div>
    <?php endif; ?>

    <?php if ($hasil): ?>
    <div class="result-box mt-4">
        <p class="status-label">Status Permohonan :</p>
        <table class="table table-bordered mt-2">
            <tr><th>Nomor Permohonan</th><td><?= $hasil['tracking'] ?></td></tr>
            <tr><th>Nama Pemohon</th><td><?= $hasil['nama'] ?></td></tr>
            <tr><th>Jenis Data</th><td><?= $hasil['jenis_data'] ?></td></tr>
            <tr><th>Status Proses</th><td><span class="badge bg-warning text-dark">Sedang Diproses</span></td></tr>
            <tr><th>Tanggal Update</th><td><?= $hasil['created_at'] ?? '-' ?></td></tr>
        </table>
    </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
