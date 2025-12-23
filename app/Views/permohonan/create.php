<?= $this->include('layout/header') ?>
<?= $this->include('layout/navbar') ?>

<main class="content-offset">

    <!-- =========================
         HEADER HALAMAN (DONGKER)
    ========================== -->
    <section class="form-header">
        <div class="container container-compact text-center">
            <h1 class="title-head text-white">
                Layanan Permohonan Data
            </h1>
            <p class="opacity-75">
                Transparan • Cepat • Akurat
            </p>

            <div class="step-indicator">
                <div class="step-dot active"></div>
                <div class="step-dot"></div>
                <div class="step-dot"></div>
            </div>
        </div>
    </section>

    <!-- =========================
         FORM CONTAINER
    ========================== -->
    <section class="py-5">
        <div class="container container-compact">
            <div class="row justify-content-center">
                <div class="col-lg-9">

                    <div class="form-card">
                        <div class="form-section-body">

                            <!-- =========================
                                 FORM ASLI KAMU (UTUH)
                            ========================== -->
                            <form action="/permohonan/submit" method="post" enctype="multipart/form-data">

                                <!-- IDENTITAS -->
                                <div class="mb-5">
                                    <h5 class="fw-bold mb-4 d-flex align-items-center">
                                        <span class="icon-badge me-2">
                                            <i class="bi bi-person-badge"></i>
                                        </span>
                                        Identitas Pemohon
                                    </h5>

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label>Nama Lengkap (Sesuai KTP) *</label>
                                            <input type="text" name="nama" class="form-control"
                                                placeholder="Contoh: Budi Santoso" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label>NIK / Nomor KTP *</label>
                                            <input type="text" name="ktp" class="form-control"
                                                placeholder="16 Digit NIK" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label><i class="bi bi-envelope"></i> Alamat Email Aktif *</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="email@domain.com" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label><i class="bi bi-whatsapp"></i> Nomor WhatsApp *</label>
                                            <input type="text" name="whatsapp" class="form-control"
                                                placeholder="0812xxxx" required>
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

                                <!-- DETAIL DATA -->
                                <div class="mb-5">
                                    <h5 class="fw-bold mb-4 d-flex align-items-center">
                                        <span class="icon-badge me-2">
                                            <i class="bi bi-database-fill-check"></i>
                                        </span>
                                        Detail Informasi yang Dibutuhkan
                                    </h5>

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label>Klasifikasi Jenis Data *</label>
                                            <select name="jenis_data" class="form-select" required>
                                                <option value="">-- Pilih Jenis --</option>
                                                <option value="Data Hidrologi">Data Hidrologi</option>
                                                <option value="Bangunan Sungai">Data Teknis Bangunan Sungai</option>
                                                <option value="Peta / SHP">Peta Spasial / SHP</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Lokasi / DAS *</label>
                                            <input type="text" name="lokasi_data" class="form-control"
                                                placeholder="Contoh: DAS Batang Hari" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Rentang Periode Data *</label>
                                            <input type="text" name="periode_data" class="form-control"
                                                placeholder="Contoh: 2020 s/d 2023" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label>No. Surat Resmi (Jika ada)</label>
                                            <input type="text" name="no_surat" class="form-control"
                                                placeholder="Nomor Surat Instansi">
                                        </div>

                                        <div class="col-12">
                                            <label>Tujuan Penggunaan Data *</label>
                                            <textarea name="tujuan" class="form-control" rows="3"
                                                placeholder="Jelaskan secara rinci tujuan penggunaan data ini..."
                                                required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-5 opacity-25">

                                <!-- UPLOAD -->
                                <div class="mb-4">
                                    <h5 class="fw-bold mb-4 d-flex align-items-center">
                                        <span class="icon-badge me-2">
                                            <i class="bi bi-file-earmark-arrow-up"></i>
                                        </span>
                                        Lampiran Dokumen (Scan Asli)
                                    </h5>

                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <label>Identitas (KTP/KTM) - JPG/PNG *</label>
                                            <div class="upload-card"
                                                onclick="document.getElementById('file_ktp').click()">
                                                <i class="bi bi-card-image fs-1 text-muted"></i>
                                                <p class="small mt-2">Klik untuk upload Foto KTP</p>
                                                <input type="file" id="file_ktp" name="file_ktp"
                                                    class="d-none" accept="image/*" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Surat Permohonan Resmi - PDF *</label>
                                            <div class="upload-card"
                                                onclick="document.getElementById('file_surat').click()">
                                                <i class="bi bi-file-earmark-pdf fs-1 text-muted"></i>
                                                <p class="small mt-2">Klik untuk upload PDF Surat</p>
                                                <input type="file" id="file_surat" name="file_surat"
                                                    class="d-none" accept=".pdf" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- SECURITY -->
                                <div class="security-box">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="checkTerms" required>
                                        <label class="form-check-label ms-2" for="checkTerms">
                                            Saya menyatakan bahwa data yang saya isikan adalah
                                            <b>Benar dan Asli</b>.
                                        </label>
                                    </div>
                                </div>

                                <!-- SUBMIT -->
                                <button type="submit" class="btn btn-submit">
                                    <i class="bi bi-send-check me-2"></i>
                                    Kirim Permohonan Secara Resmi
                                </button>

                                <p class="text-center mt-4 text-muted small">
                                    <i class="bi bi-shield-lock-fill"></i>
                                    Data Anda terjaga keamanannya sesuai UU KIP.
                                </p>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</main>

<?= $this->include('layout/footer') ?>
<?= $this->include('layout/scripts') ?>

<script>
document.querySelectorAll('input[type="file"]').forEach(input => {
    input.addEventListener('change', function () {
        let filename = this.files[0].name;
        this.parentElement.querySelector('p').innerText = "Terpilih: " + filename;
        this.parentElement.style.borderColor = "#173f5f";
        this.parentElement.style.background = "#e0f2fe";
    });
});
</script>
