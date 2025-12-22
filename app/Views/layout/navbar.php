<nav class="navbar navbar-expand-lg navbar-dark navbar-professional">
    <div class="container container-compact">

        <!-- BRAND -->
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="/img/logo.png" alt="Logo BWS" class="navbar-logo">
            <div class="navbar-brand-text ms-2">
                <div class="navbar-brand-title">SISTEM PERMOHONAN DATA</div>
                <div class="navbar-brand-sub">BWS Sumatera V</div>
            </div>
        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center gap-lg-2 mt-3 mt-lg-0">

                <li class="nav-item">
                    <a class="nav-link <?= uri_string() == '' ? 'active' : '' ?>" href="/">BERANDA</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= uri_string() == 'permohonan' ? 'active' : '' ?>" href="/permohonan">
                        PERMOHONAN
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= uri_string() == 'tracking' ? 'active' : '' ?>" href="/tracking">
                        LACAK PERMOHONAN
                    </a>
                </li>

                <li class="nav-item">
    <a class="nav-link <?= uri_string() == 'grafik' ? 'active' : '' ?>" href="<?= base_url('grafik') ?>">
        GRAFIK
    </a>
</li>

                <li class="nav-item">
                    <a class="nav-link <?= uri_string() == 'faq' ? 'active' : '' ?>" href="/faq">
                        FAQ
                    </a>
                </li>

                <!-- LOGIN ADMIN -->
                <li class="nav-item ms-lg-3">
                    <a class="nav-link nav-btn-admin-professional" href="/admin/login">
                        <i class="bi bi-person-lock me-2"></i> LOGIN ADMIN
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>
