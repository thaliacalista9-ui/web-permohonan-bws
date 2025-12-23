<?= $this->include('layout/header') ?>
<?= $this->include('layout/navbar') ?>

<main class="content-offset">
    <section class="grafik-section">
        <div class="container container-compact">
            <h2 class="text-center mb-4">Grafik Kepuasan Layanan</h2>

            <?php if (!empty($survei)): ?>
                <ul>
                    <?php foreach ($survei as $s): ?>
                        <li>
                            <?= esc($s['kode']) ?> - Rating: <?= esc($s['survey_rating']) ?> - Komentar: <?= esc($s['survey_komentar']) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p class="text-center text-muted">Belum ada data survei yang masuk.</p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?= $this->include('layout/footer') ?>
