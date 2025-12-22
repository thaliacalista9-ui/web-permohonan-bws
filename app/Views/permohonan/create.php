<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan Informasi Publik | BWS Sumatera V</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-dark: #173f5f;
            --accent-gold: #FFD43B;
            --soft-bg: #f8fafc;
            --glass: rgba(255, 255, 255, 0.95);
        }

        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background: var(--soft-bg);
            color: #334155;
        }

        /* Navbar Premium */
        .navbar-premium {
            background: var(--primary-dark) !important;
            backdrop-filter: blur(10px);
            padding: 15px 0;
            border-bottom: 2px solid var(--accent-gold);
        }

        /* Form Container */
        .form-card {
            background: var(--glass);
            border: none;
            border-radius: 24px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.08);
            margin-top: -60px;
            overflow: hidden;
            position: relative;
        }

        .form-header {
            background: linear-gradient(135deg, var(--primary-dark), #20639b);
            padding: 50px 40px 100px;
            color: white;
            text-align: center;
        }

        .title-head {
            font-weight: 800;
            letter-spacing: -1px;
            font-size: 2.5rem;
        }

        /* Stepper UI */
        .step-indicator {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .step-dot {
            width: 12px;
            height: 12px;
            background: rgba(255,255,255,0.3);
            border-radius: 50%;
        }

        .step-dot.active {
            background: var(--accent-gold);
            box-shadow: 0 0 15px var(--accent-gold);
        }

        /* Input Styling */
        .form-section-body {
            padding: 40px 60px;
            background: white;
        }

        label { 
            font-weight: 600; 
            font-size: 0.9rem;
            margin-bottom: 8px;
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-control, .form-select {
            padding: 14px 18px;
            border-radius: 12px;
            border: 1.5px solid #e2e8f0;
            background: #f1f5f9;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: white;
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 4px rgba(23, 63, 95, 0.1);
        }

        /* Security Checkbox */
        .security-box {
            background: #fffbeb;
            border: 1px solid #fde68a;
            padding: 20px;
            border-radius: 15px;
            margin: 30px 0;
        }

        /* Button Premium */
        .btn-submit {
            background: var(--accent-gold);
            color: var(--primary-dark);
            font-weight: 800;
            padding: 18px;
            border-radius: 14px;
            border: none;
            width: 100%;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 212, 59, 0.4);
            background: #f0c400;
        }

        .icon-badge {
            width: 35px;
            height: 35px;
            background: #e0f2fe;
            color: #0369a1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }

        .upload-card {
            border: 2px dashed #cbd5e1;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: 0.3s;
        }

        .upload-card:hover {
            border-color: var(--primary-dark);
            background: #f8fafc;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-premium sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-bold" href="#">
            <img src="/img/logo.png" height="45" class="me-3">
            <span class="d-none d-md-block">SDA INFORMATION HUB</span>
        </a>
        <div class="ms-auto">
            <a href="/" class="btn btn-outline-light btn-sm rounded-pill px-4">Kembali ke Beranda</a>
        </div>
    </div>
</nav>

<header class="form-header">
    <div class="container">
        <h1 class="title-head">Layanan Permohonan Data</h1>
        <p class="opacity-75">Transparan • Cepat • Akurat</p>
        <div class="step-indicator">
            <div class="step-dot active"></div>
            <div class="step-dot"></div>
            <div class="step-dot"></div>
        </div>
    </div>
</header>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="form-card">
                <div class="form-section-body">
                    <form action="/permohonan/submit" method="post" enctype="multipart/form-data">
                        
                        <div class="mb-5">
                            <h5 class="fw-bold mb-4 d-flex align-items-center">
                                <span class="icon-badge me-2"><i class="bi bi-person-badge"></i></span>
                                Identitas Pemohon
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label>Nama Lengkap (Sesuai KTP) *</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Contoh: Budi Santoso" required>
                                </div>
                                <div class="col-md-6">
                                    <label>NIK / Nomor KTP *</label>
                                    <input type="text" name="ktp" class="form-control" placeholder="16 Digit NIK" required>
                                </div>
                                <div class="col-md-6">
                                    <label><i class="bi bi-envelope"></i> Alamat Email Aktif *</label>
                                    <input type="email" name="email" class="form-control" placeholder="email@domain.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label><i class="bi bi-whatsapp"></i> Nomor WhatsApp *</label>
                                    <input type="text" name="whatsapp" class="form-control" placeholder="0812xxxx" required>
                                </div>
                                <div class="col-12">
                                    <label>Pekerjaan / Kategori Pemohon *</label>
                                    <select name="pekerjaan" class="form-select" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="Mahasiswa">Mahasiswa / Peneliti</option>
                                        <option value="Swasta">Perusahaan Swasta</option>
                                        <option value="Instansi Pemerintah">Instansi Pemerintah</option>
                                        <option value="Masyarakat Umum">Masyarakat Umum</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr class="my-5 opacity-25">

                        <div class="mb-5">
                            <h5 class="fw-bold mb-4 d-flex align-items-center">
                                <span class="icon-badge me-2"><i class="bi bi-database-fill-check"></i></span>
                                Detail Informasi yang Dibutuhkan
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label>Klasifikasi Jenis Data *</label>
                                    <select name="jenis_data" class="form-select" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        <option value="Data Hidrologi">Data Hidrologi (Curah Hujan/Debit)</option>
                                        <option value="Bangunan Sungai">Data Teknis Bangunan Sungai</option>
                                        <option value="Peta / SHP">Peta Spasial / SHP</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Lokasi / DAS *</label>
                                    <input type="text" name="lokasi_data" class="form-control" placeholder="Contoh: DAS Batang Hari" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Rentang Periode Data *</label>
                                    <input type="text" name="periode_data" class="form-control" placeholder="Contoh: 2020 s/d 2023" required>
                                </div>
                                <div class="col-md-6">
                                    <label>No. Surat Resmi (Jika ada)</label>
                                    <input type="text" name="no_surat" class="form-control" placeholder="Nomor Surat Instansi">
                                </div>
                                <div class="col-12">
                                    <label>Tujuan Penggunaan Data *</label>
                                    <textarea name="tujuan" class="form-control" rows="3" placeholder="Jelaskan secara rinci tujuan penggunaan data ini..." required></textarea>
                                </div>
                            </div>
                        </div>

                        <hr class="my-5 opacity-25">

                        <div class="mb-4">
                            <h5 class="fw-bold mb-4 d-flex align-items-center">
                                <span class="icon-badge me-2"><i class="bi bi-file-earmark-arrow-up"></i></span>
                                Lampiran Dokumen (Scan Asli)
                            </h5>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label>Identitas (KTP/KTM) - JPG/PNG *</label>
                                    <div class="upload-card" onclick="document.getElementById('file_ktp').click()">
                                        <i class="bi bi-card-image fs-1 text-muted"></i>
                                        <p class="small mt-2">Klik untuk upload Foto KTP</p>
                                        <input type="file" id="file_ktp" name="file_ktp" class="d-none" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Surat Permohonan Resmi - PDF *</label>
                                    <div class="upload-card" onclick="document.getElementById('file_surat').click()">
                                        <i class="bi bi-file-earmark-pdf fs-1 text-muted"></i>
                                        <p class="small mt-2">Klik untuk upload PDF Surat</p>
                                        <input type="file" id="file_surat" name="file_surat" class="d-none" accept=".pdf" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="security-box">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkTerms" required>
                                <label class="form-check-label ms-2" for="checkTerms" style="margin-top:0">
                                    Saya menyatakan bahwa data yang saya isikan adalah <b>Benar dan Asli</b>. Saya bertanggung jawab penuh atas penggunaan data yang diberikan dan bersedia mematuhi peraturan perundang-undangan yang berlaku.
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-submit">
                            <i class="bi bi-send-check me-2"></i> Kirim Permohonan Secara Resmi
                        </button>

                        <p class="text-center mt-4 text-muted small">
                            <i class="bi bi-shield-lock-fill"></i> Data Anda dienkripsi dan terjaga keamanannya sesuai UU KIP.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center py-4 opacity-50 small">
    &copy; 2024 Balai Wilayah Sungai Sumatera V Padang. All Rights Reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Simple script to show filename after upload
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function() {
            let filename = this.files[0].name;
            this.parentElement.querySelector('p').innerText = "Terpilih: " + filename;
            this.parentElement.style.borderColor = "#173f5f";
            this.parentElement.style.background = "#e0f2fe";
        });
    });
</script>

</body>
</html>