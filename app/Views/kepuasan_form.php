<?= $this->include('layout/header') ?>
<?= $this->include('layout/navbar') ?>

<style>
    /* Styling tambahan khusus halaman survei agar selaras dengan home */
    .survey-card {
        background: #fff;
        border-radius: 12px;
        border: none;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        padding: 40px;
        margin-top: -50px; /* Membuat card agak naik ke area hero */
        position: relative;
        z-index: 10;
    }
    
    .question-box {
        border-bottom: 1px solid #eee;
        padding: 20px 0;
    }
    
    .question-box:last-child {
        border-bottom: none;
    }

    .question-label {
        font-weight: 600;
        color: #333;
        display: block;
        margin-bottom: 15px;
    }

    /* Styling Rating Radio Button agar lebih modern */
    .rating-group {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .rating-item {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        padding: 8px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        transition: all 0.2s;
    }

    .rating-item:hover {
        background-color: #f0f7ff;
        border-color: #007bff;
    }

    .rating-item input[type="radio"] {
        cursor: pointer;
        width: 18px;
        height: 18px;
    }

    .form-control:focus {
        border-color: #0056b3;
        box-shadow: 0 0 0 0.2rem rgba(0, 86, 179, 0.1);
    }

    .btn-submit {
        background: #123355ff;
        color: white;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: bold;
        border: none;
        transition: background 0.3s;
    }

    .btn-submit:hover {
        background: #0f2945ff;
        color: white;
    }
</style>

<main class="content-offset">

    <section class="home-hero">
        <div class="container container-compact">
            <span class="hero-badge">Indeks Kepuasan Masyarakat</span>
            <h1 class="hero-title">
                Survei Kepuasan<br>
                Pelayanan Publik
            </h1>
            <p class="hero-desc">
                Masukan Anda sangat berharga bagi kami untuk terus meningkatkan 
                kualitas pelayanan di BWS Sumatera V.
            </p>
        </div>
    </section>

    <section class="pb-5">
        <div class="container container-compact">
            <div class="survey-card">
                <form action="<?= base_url('kepuasan/simpan') ?>" method="post">
                    <input type="hidden" name="kode" value="<?= esc($data['kode']) ?>">

                    <div class="mb-4">
                        <h4 class="fw-bold">Formulir Penilaian</h4>
                        <p class="text-muted">Silakan berikan penilaian Anda (Skala 1 - 5)</p>
                    </div>

                    <hr>

                    <?php
                    $pertanyaan = [
                        'q1' => 'Kesesuaian persyaratan pelayanan',
                        'q2' => 'Kemudahan prosedur pelayanan',
                        'q3' => 'Kecepatan waktu pelayanan',
                        'q4' => 'Kesesuaian produk pelayanan',
                        'q5' => 'Kompetensi petugas',
                        'q6' => 'Kesopanan dan keramahan petugas',
                        'q7' => 'Kualitas sarana dan prasarana',
                        'q9' => 'Penanganan pengaduan dan masukan'
                    ];
                    ?>

                    <?php foreach ($pertanyaan as $kode => $text): ?>
                    <div class="question-box">
                        <label class="question-label"><?= $text ?></label>
                        <div class="rating-group">
                            <?php for ($i=1; $i<=5; $i++): ?>
                                <label class="rating-item">
                                    <input type="radio" name="<?= $kode ?>" value="<?= $i ?>" required>
                                    <span><?= $i ?></span>
                                </label>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <div class="question-box">
                        <label class="question-label">Apakah terdapat pungutan liar?</label>
                        <div class="rating-group">
                            <label class="rating-item">
                                <input type="radio" name="q8" value="0" required>
                                <span>Tidak Pernah</span>
                            </label>
                            <label class="rating-item">
                                <input type="radio" name="q8" value="1">
                                <span>Pernah</span>
                            </label>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6 mb-3">
                            <label class="question-label">Kritik dan Saran</label>
                            <textarea name="kritik_saran" class="form-control" rows="4" placeholder="Tulis kritik atau saran Anda..."></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="question-label">Testimoni (Opsional)</label>
                            <textarea name="testimoni" class="form-control" rows="4" placeholder="Berikan testimoni positif Anda..."></textarea>
                        </div>
                    </div>

                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-submit btn-lg">
                            Kirim Survei Kepuasan <i class="fas fa-paper-plane ms-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</main>

<?= $this->include('layout/footer') ?>
<?= $this->include('layout/scripts') ?>