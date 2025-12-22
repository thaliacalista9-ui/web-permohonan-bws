<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Survey Kepuasan Layanan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: Arial; background:#f5f7fa; padding:30px }
        h2 { margin-bottom:5px }
        .card {
            background:white;
            padding:20px;
            border-radius:10px;
            margin-bottom:30px;
            box-shadow:0 2px 10px rgba(0,0,0,.05)
        }
    </style>
</head>
<body>

<h2>📊 Survey Kepuasan Layanan</h2>
<p>Total Responden: <b><?= $total ?></b></p>

<div class="card">
    <canvas id="grafikKepuasan"></canvas>
</div>

<script>
new Chart(document.getElementById('grafikKepuasan'), {
    type: 'bar',
    data: {
        labels: [
            'Persyaratan',
            'Prosedur',
            'Kecepatan',
            'Kesesuaian Produk',
            'Kompetensi Petugas',
            'Perilaku Petugas',
            'Sarana Prasarana',
            'Bebas Pungli',
            'Pengaduan'
        ],
        datasets: [{
            label: 'Nilai Rata-rata (1–5)',
            data: [
                <?= round($q1,2) ?>,
                <?= round($q2,2) ?>,
                <?= round($q3,2) ?>,
                <?= round($q4,2) ?>,
                <?= round($q5,2) ?>,
                <?= round($q6,2) ?>,
                <?= round($q7,2) ?>,
                <?= round($q8,2) ?>,
                <?= round($q9,2) ?>
            ],
            backgroundColor: '#4e73df'
        }]
    },
    options: {
        scales: {
            y: { min: 0, max: 5 }
        }
    }
});
</script>

</body>
</html>
