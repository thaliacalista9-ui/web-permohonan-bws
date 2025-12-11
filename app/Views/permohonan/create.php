<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Permohonan Data | BWS Sumatera V</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

<style>
    body { font-family: 'Poppins', sans-serif; background:#f4f6f9; }

    .navbar { background:#0A2A43; }
    .navbar .nav-link:hover { color:#f0c400 !important; }

    .form-section {
        background:white;
        padding:40px 50px;
        border-radius:16px;
        box-shadow:0 8px 30px rgba(0,0,0,.1);
        margin-top:50px;
        margin-bottom:60px;
    }

    .title-head {
        font-size:40px;
        font-weight:800;
        color:#0A2A43;
    }

    label { font-weight:600; margin-top:14px; }

    .form-control, .form-select {
        padding:12px 15px;
        border-radius:10px;
        font-size:16px;
    }

    .btn-submit {
        background:#f0c400;
        color:#000;
        font-weight:700;
        padding:14px 30px;
        border-radius:12px;
        font-size:18px;
        width:100%;
        margin-top:25px;
    }

    .section-desc {
        font-size:18px;
        color:#555;
        margin-bottom:25px;
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
                <li class="nav-item"><a class="nav-link text-white active" href="/permohonan">Ajukan Permohonan</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/tracking">Lacak Permohonan</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/grafik">Grafik Kepuasan</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/faq">FAQ</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- FORM SECTION -->
<div class="container">
    <div class="form-section">
        <h1 class="title-head">Ajukan Permohonan Data</h1>
        <p class="section-desc">Silahkan isi form berikut sesuai dengan identitas dan kebutuhan permohonan data Anda.</p>

        <form action="/permohonan/submit" method="post" enctype="multipart/form-data">

            <label>Nama Lengkap *</label>
            <input type="text" name="nama" class="form-control" required>

            <label>Nomor KTP *</label>
            <input type="text" name="ktp" class="form-control" required>

            <label>Email *</label>
            <input type="email" name="email" class="form-control" required>

            <label>Nomor WhatsApp *</label>
            <input type="text" name="whatsapp" class="form-control" required>

            <label>Pekerjaan *</label>
            <select name="pekerjaan" class="form-select" required>
                <option value="">-- Pilih Pekerjaan --</option>
                <option value="Mahasiswa">Mahasiswa</option>
                <option value="Swasta">Swasta</option>
                <option value="Instansi Pemerintah">Instansi Pemerintah</option>
            </select>

            <label>Alamat *</label>
            <textarea name="alamat" class="form-control" rows="3" required></textarea>

            <label>Jenis Data *</label>
            <select name="jenis_data" class="form-select" required>
                <option value="">-- Pilih Jenis Data --</option>
                <option value="Data Hidrologi">Data Hidrologi</option>
                <option value="Bangunan Sungai">Bangunan Sungai</option>
                <option value="Peta / SHP">Peta / SHP</option>
            </select>

            <label>Tujuan Permohonan Data</label>
            <textarea name="tujuan" class="form-control" rows="2"></textarea>

            <label>Catatan / Spesifikasi Data</label>
            <textarea name="catatan" class="form-control" rows="2"></textarea>

            <label>Upload Foto KTP *</label>
            <input type="file" name="file_ktp" class="form-control" accept=".jpg,.png" required>

            <label>Upload Surat Permohonan *</label>
            <input type="file" name="file_surat" class="form-control" accept=".pdf" required>

            <label>No Surat Resmi (Opsional)</label>
            <input type="text" name="no_surat" class="form-control" placeholder="Contoh: 9762/UN28.1.13/PD/2023">

            <button type="submit" class="btn btn-submit">KIRIM PERMOHONAN</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
