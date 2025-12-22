<?= $this->include('layout/header') ?>
<?= $this->include('layout/navbar') ?>

<main class="content-offset">
    <div class="container container-compact">

        <div class="tracking-container">

            <h1 class="title-head">Lacak Permohonan Data</h1>
            <p class="desc">
                Masukkan Nomor Tracking / ID Permohonan untuk mengetahui status permohonan data Anda.
            </p>

            <!-- FORM TRACKING -->
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

            <!-- JIKA TIDAK DITEMUKAN -->
            <?php if (!empty($not_found)): ?>
                <div class="alert alert-danger mt-4">
                    ❌ Nomor tracking tidak ditemukan.  
                    Pastikan kode yang Anda masukkan sudah benar.
                </div>
            <?php endif; ?>

            <!-- HASIL TRACKING -->
            <?php if (!empty($hasil)): ?>
                <div class="result-box mt-4">

                    <h4 class="result-title">Detail Permohonan</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th width="35%">Nomor Tracking</th>
                                    <td><?= esc($hasil['kode_tracking']) ?></td>
                                </tr>
                                <tr>
                                    <th>Nama Pemohon</th>
                                    <td><?= esc($hasil['nama_pemohon']) ?></td>
                                </tr>
                                <tr>
                                    <th>Instansi</th>
                                    <td><?= esc($hasil['instansi']) ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis Data</th>
                                    <td><?= esc($hasil['jenis_data']) ?></td>
                                </tr>
                                <tr>
                                    <th>Keperluan</th>
                                    <td><?= esc($hasil['keperluan']) ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Permohonan</th>
                                    <td><?= date('d M Y', strtotime($hasil['tanggal_permohonan'])) ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <?php if ($hasil['status'] == 'diproses'): ?>
                                            <span class="badge bg-warning text-dark">
                                                Sedang Diproses
                                            </span>
                                        <?php elseif ($hasil['status'] == 'disetujui'): ?>
                                            <span class="badge bg-success">
                                                Disetujui
                                            </span>
                                        <?php elseif ($hasil['status'] == 'ditolak'): ?>
                                            <span class="badge bg-danger">
                                                Ditolak
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <?php if (!empty($hasil['catatan_admin'])): ?>
                                <tr>
                                    <th>Catatan Admin</th>
                                    <td><?= esc($hasil['catatan_admin']) ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if ($hasil['status'] == 'disetujui' && !empty($hasil['file_data'])): ?>
                                <tr>
                                    <th>File Data</th>
                                    <td>
                                        <a 
                                            href="/uploads/data/<?= esc($hasil['file_data']) ?>" 
                                            class="btn btn-success btn-sm"
                                            target="_blank"
                                        >
                                            ⬇️ Unduh Data
                                        </a>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <?php if ($hasil['status'] == 'disetujui'): ?>
                        <div class="text-center mt-4">
                            <p class="text-muted">
                                Silakan isi survei kepuasan setelah menerima layanan kami.
                            </p>
                            <a 
                                href="/kepuasan/isi/<?= esc($hasil['kode_tracking']) ?>" 
                                class="btn btn-main"
                            >
                                Isi Survei Kepuasan
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

        </div>

    </div>
</main>

<?= $this->include('layout/footer') ?>
