<?= $this->include('layout/header') ?>
<?= $this->include('layout/navbar') ?>

<main class="content-offset">

    <!-- =========================
         HERO PORTAL (DONGKER)
    ========================== -->
    <section class="home-hero">
        <div class="container container-compact">

            <span class="hero-badge">Layanan Informasi Publik</span>

            <h1 class="hero-title">
                Sistem Informasi<br>
                Sumber Daya Air
            </h1>

            <p class="hero-desc">
                Portal layanan resmi permohonan data Sumber Daya Air
                untuk mendukung transparansi, ketertiban, dan kemudahan
                akses informasi pada BWS Sumatera V.
            </p>

        </div>
    </section>

    <!-- =========================
         QUICK ACCESS (CARD)
    ========================== -->
    <section class="home-cards">
        <div class="container container-compact">
            <div class="row g-4">

                <!-- CARD 1 -->
                <div class="col-md-4">
                    <div class="portal-card">
                        <h5>Ajukan Permohonan Data</h5>
                        <p>
                            Ajukan permintaan data Sumber Daya Air
                            secara resmi melalui sistem digital.
                        </p>
                        <a href="/permohonan" class="card-link">
                            Ajukan Permohonan →
                        </a>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="col-md-4">
                    <div class="portal-card">
                        <h5>Lacak Status Permohonan</h5>
                        <p>
                            Pantau proses verifikasi dan status
                            permohonan data yang telah diajukan.
                        </p>
                        <a href="/tracking" class="card-link">
                            Lacak Permohonan →
                        </a>
                    </div>
                </div>

                <!-- CARD 3 -->
                <div class="col-md-4">
                    <div class="portal-card">
                        <h5>Informasi & Ketentuan</h5>
                        <p>
                            Informasi alur, ketentuan, dan kebijakan
                            layanan permohonan data SDA.
                        </p>
                        <a href="/faq" class="card-link">
                            Lihat Informasi →
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- =========================
         FLOW / ALUR
    ========================== -->
    <section class="home-flow">
        <div class="container container-compact">

            <h2 class="section-title">Alur Permohonan Data</h2>
            <p class="text-muted mb-4">
                Proses pengajuan data dilakukan melalui tiga tahap utama.
            </p>

            <div class="row g-4">

                <div class="col-md-4">
                    <div class="flow-card">
                        <span>01</span>
                        <h5>Pengajuan Permohonan</h5>
                        <p>
                            Pemohon mengisi formulir permintaan data
                            sesuai kebutuhan informasi.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="flow-card">
                        <span>02</span>
                        <h5>Verifikasi Admin</h5>
                        <p>
                            Permohonan diverifikasi dan ditinjau
                            oleh administrator sistem.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="flow-card">
                        <span>03</span>
                        <h5>Data Tersedia</h5>
                        <p>
                            Data dapat diunduh setelah permohonan
                            disetujui oleh admin.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>

</main>

<?= $this->include('layout/footer') ?>
<?= $this->include('layout/scripts') ?>
