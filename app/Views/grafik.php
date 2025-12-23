<?= $this->include('layout/header') ?>
<?= $this->include('layout/navbar') ?>

<main class="content-offset">
    <section class="grafik-section">
        <div class="container container-compact">
            <h2 class="text-center mb-4">Grafik Kepuasan Layanan</h2>

            <?php if (!empty($grafik)): ?>
                <canvas id="grafikSurvey"></canvas>
            <?php else: ?>
                <p class="text-center text-muted">Belum ada data survei yang masuk.</p>
            <?php endif; ?>
        </div>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php if (!empty($grafik)): ?>
<script>
new Chart(document.getElementById('grafikSurvey'), {
    type: 'bar',
    data: {
        labels: [
            'Kejelasan Informasi',
            'Kecepatan Layanan',
            'Keramahan Petugas',
            'Ketepatan Waktu',
            'Kualitas Hasil',
            'Kemudahan Prosedur',
            'Respon Petugas',
            'Kenyamanan',
            'Kepuasan Umum'
        ],
        datasets: [{
            label: 'Nilai Rata-rata',
            data: [
                <?= (float) $grafik['q1'] ?>,
                <?= (float) $grafik['q2'] ?>,
                <?= (float) $grafik['q3'] ?>,
                <?= (float) $grafik['q4'] ?>,
                <?= (float) $grafik['q5'] ?>,
                <?= (float) $grafik['q6'] ?>,
                <?= (float) $grafik['q7'] ?>,
                <?= (float) $grafik['q8'] ?>,
                <?= (float) $grafik['q9'] ?>
            ],
            backgroundColor: '#3b82f6'
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                max: 5,
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});
</script>
<?php endif; ?>

<?= $this->include('layout/footer') ?>
