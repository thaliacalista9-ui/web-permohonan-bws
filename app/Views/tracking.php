<?= $this->include('layout/header') ?>
<?= $this->include('layout/navbar') ?>

<main class="content-offset">

    <!-- =========================
         HEADER TRACKING
    ========================== -->
    <section class="tracking-header">
        <div class="container container-compact text-center">
            <h1 class="title-head text-white">
                Lacak Permohonan Data
            </h1>
            <p class="tracking-desc">
                Masukkan Nomor Tracking / ID Permohonan untuk mengetahui
                status permohonan data Anda.
            </p>
        </div>
    </section>

    <!-- =========================
         CONTENT
    ========================== -->
    <section class="tracking-section">
        <div class="container container-compact">

            <!-- FORM -->
            <div class="tracking-card tracking-form-card">
                <form action="/tracking/cari" method="post" class="tracking-form">
                    <?= csrf_field() ?>

                    <input
                        type="text"
                        name="kode"
                        class="form-control"
                        placeholder="Contoh: BWS-20250520-1234"
                        required
                    >

                    <button type="submit" class="btn btn-track">
                        Lacak Sekarang
                    </button>
                </form>
            </div>

            <!-- NOT FOUND -->
            <?php if (!empty($not_found)): ?>
                <div class="alert alert-danger mt-4 text-center">
                    ❌ Nomor tracking tidak ditemukan.
                    Pastikan kode yang Anda masukkan sudah benar.
                </div>
            <?php endif; ?>

            <!-- HASIL -->
            <?php if (!empty($hasil)): ?>
                <div class="tracking-card result-card mt-4">

                    <h4 class="result-title">
                        Detail Permohonan
                    </h4>

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered align-middle">
                            <tbody>
                                <tr>
                                    <th width="35%">Nomor Tracking</th>
                                    <td><?= esc($hasil['kode'] ?? '-') ?></td>
                                </tr>
                                <tr>
                                    <th>Nama Pemohon</th>
                                    <td><?= esc($hasil['nama'] ?? '-') ?></td>
                                </tr>
                                <tr>
                                    <th>Instansi</th>
                                    <td><?= esc($hasil['instansi'] ?? '-') ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis Data</th>
                                    <td><?= esc($hasil['jenis_data'] ?? '-') ?></td>
                                </tr>
                                <tr>
                                    <th>Keperluan</th>
                                    <td><?= esc($hasil['tujuan'] ?? '-') ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Permohonan</th>
                                    <td><?= isset($hasil['created_at']) ? date('d M Y', strtotime($hasil['created_at'])) : '-' ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <?php
                                            $status = $hasil['status'] ?? '-';
                                            if ($status === 'Diproses'): ?>
                                                <span class="badge bg-warning text-dark">Sedang Diproses</span>
                                            <?php elseif ($status === 'Selesai'): ?>
                                                <span class="badge bg-success">Selesai</span>
                                            <?php elseif ($status === 'Ditolak'): ?>
                                                <span class="badge bg-danger">Ditolak</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary"><?= esc($status) ?></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <?php if (!empty($hasil['catatan_admin'])): ?>
                                <tr>
                                    <th>Catatan Admin</th>
                                    <td><?= esc($hasil['catatan_admin'] ?? '-') ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if (($hasil['status'] ?? '') === 'Selesai' && !empty($hasil['file_data'])): ?>
                                <tr>
                                    <th>File Hasil</th>
                                    <td>
                                        <?php if (($hasil['file_diunduh'] ?? 0) == 0): ?>
                                            <a
                                                href="<?= base_url('download/' . ($hasil['kode'] ?? '')) ?>"
                                                class="btn btn-success btn-sm"
                                            >
                                                ⬇️ Download File
                                            </a>
                                        <?php else: ?>
                                            <span class="text-muted">File sudah diunduh</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <?php if (($hasil['file_diunduh'] ?? 0) == 1 && ($hasil['survey_diisi'] ?? 0) == 0): ?>
                        <div class="text-center mt-4">
                            <p class="text-muted">
                                Silakan isi survei kepuasan setelah menerima layanan kami.
                            </p>
                            <a
                                href="<?= base_url('kepuasan/isi/' . ($hasil['kode'] ?? '')) ?>"
                                class="btn btn-main"
                            >
                                Isi Survei Kepuasan
                            </a>
                        </div>
                    <?php elseif(($hasil['survey_diisi'] ?? 0) == 1): ?>
                        <div class="text-center mt-4">
                            <p class="text-success">
                                ✅ Terima kasih, Anda sudah mengisi survei kepuasan.
                            </p>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

        </div>
    </section>

</main>

<?= $this->include('layout/footer') ?>
