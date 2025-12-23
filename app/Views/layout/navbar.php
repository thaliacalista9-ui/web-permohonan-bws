<nav class="navbar navbar-expand-lg navbar-premium fixed-top">
    <div class="container container-compact">

        <!-- BRAND -->
        <a class="navbar-brand brand-text" href="/">
            LAYANAN DATA SDA
        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center gap-lg-4 mt-3 mt-lg-0">

                <li class="nav-item">
                    <a class="nav-link <?= uri_string() == '' ? 'active' : '' ?>" href="/">
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= uri_string() == 'permohonan' ? 'active' : '' ?>" href="/permohonan">
                        Permohonan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= uri_string() == 'tracking' ? 'active' : '' ?>" href="/tracking">
                        Tracking
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= uri_string() == 'grafik' ? 'active' : '' ?>" href="<?= base_url('grafik') ?>">
                        Grafik
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= uri_string() == 'faq' ? 'active' : '' ?>" href="/faq">
                        FAQ
                    </a>
                </li>

                <!-- ADMIN -->
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-admin" href="/admin/login">
                        Admin Panel
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>
