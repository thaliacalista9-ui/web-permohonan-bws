<?= $this->include('layout/header') ?>
<?= $this->include('layout/navbar') ?>

<main class="content-offset"> 
    
    <section class="hero">
        <div class="hero-content container container-compact" data-aos="fade-down">
            <h1>Layanan Informasi<br>Sumber Daya Air</h1>
            <p class="hero-sub">Sistem layanan permohonan data berbasis website untuk mendukung transparansi, kecepatan, dan kemudahan bagi masyarakat.</p>

            <div class="hero-cta">
                <div class="dropdown">
                    <button class="btn btn-main dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ajukan Permohonan 
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/permohonan">Permohonan Data</a></li>
                        <li><a class="dropdown-item" href="/panduan">Panduan Permohonan</a></li>
                    </ul>
                </div>

                <a class="btn btn-ghost" href="/tracking"><i class="bi bi-search"></i> Lacak Permohonan</a>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container container-compact text-center mb-5">
            <h2 class="section-title">FITUR UTAMA SISTEM</h2>
            <p class="lead text-muted">Akses mudah dan terpercaya.</p>
        </div>

        <div class="row g-4 container container-compact">

            <div class="col-md-4" data-aos="fade-up">
                <div class="feature-box"> 
                    <i class="feature-icon bi bi-file-earmark-text"></i>
                    <h5>Ajukan Permohonan</h5>
                    <p>Permintaan data dapat dilakukan dengan mengisi formulir secara online.</p>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="feature-box">
                    <i class="feature-icon bi bi-search"></i>
                    <h5>Lacak Status</h5>
                    <p>Pemohon dapat memantau proses verifikasi dokumen dan progres permohonan.</p>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-box">
                    <i class="feature-icon bi bi-cloud-arrow-down"></i>
                    <h5>Unduh Data</h5>
                    <p>Setelah disetujui, data dapat langsung diunduh dalam bentuk digital.</p>
                </div>
            </div>

        </div>
    </section>

    <hr class="container-compact">

    <section class="py-5">
        <div class="container container-compact text-center mb-5">
            <h2 class="section-title">ALUR PERMOHONAN DATA</h2>
            <p class="lead text-muted">3 langkah mudah untuk mendapatkan data.</p>
        </div>

        <div class="row g-4 container container-compact">

            <div class="col-md-4" data-aos="zoom-in">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h5>Isi Formulir</h5>
                    <p>Lengkapi data diri dan data kebutuhan informasi SDA.</p>
                </div>
            </div>

            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="150">
                <div class="step-card">
                    <div class="step-number">2</div>
                    <h5>Proses Verifikasi</h5>
                    <p>Admin akan memeriksa dan memvalidasi permohonan.</p>
                </div>
            </div>

            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h5>Data Siap Diambil</h5>
                    <p>Pemohon dapat mengunduh data setelah permohonan disetujui.</p>
                </div>
            </div>

        </div>
    </section>
    
</main>

<?= $this->include('layout/footer') ?>
<?= $this->include('layout/scripts') ?>