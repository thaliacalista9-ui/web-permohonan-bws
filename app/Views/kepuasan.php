<?= $this->include('layout/header') ?>
<?= $this->include('layout/navbar') ?>

<main class="content-offset">

    <section class="survey-section">
        <div class="container container-compact">

            <div class="tracking-card result-card mt-4">
                <h4 class="result-title text-center">
                    Survei Kepuasan Layanan
                </h4>

                <p class="text-center text-muted mb-4">
                    Silakan isi survei berikut untuk menilai layanan kami.
                </p>

                <!-- Tampilkan error validasi -->
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                        <?php foreach (session()->getFlashdata('errors') as $err): ?>
                            <li><?= esc($err) ?></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('kepuasan/simpan/' . esc($permohonan['kode'])) ?>" method="post">
                    <?= csrf_field() ?>

                    <!-- Rating -->
                    <div class="mb-3">
                        <label for="rating" class="form-label">Penilaian Layanan (1-5)</label>
                        <select name="rating" id="rating" class="form-control" required>
                            <option value="">Pilih rating</option>
                            <?php for ($i=1; $i<=5; $i++): ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <!-- Komentar -->
                    <div class="mb-3">
                        <label for="komentar" class="form-label">Komentar / Saran (Opsional)</label>
                        <textarea
                            name="komentar"
                            id="komentar"
                            class="form-control"
                            rows="4"
                            placeholder="Tuliskan komentar atau saran Anda..."
                        ><?= old('komentar') ?></textarea>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-main">
                            Kirim Survei
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </section>

</main>

<?= $this->include('layout/footer') ?>
