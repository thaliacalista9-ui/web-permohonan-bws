<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Permohonan #<?= esc($permohonan['id']) ?> | DataHub Pro</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
:root {
    --color-primary: #1F2A40; 
    --color-secondary: #007bff; 
    --color-background: #f8f9fa;
    --color-card: #ffffff;
    --color-text-dark: #344767;
    --color-text-light: #8392ab;
    --color-success: #2dce89;
    --color-warning: #fb6340;
    --color-danger: #f5365c;
    --font-family: 'Poppins', sans-serif;
}
body {
    background: var(--color-background);
    font-family: var(--font-family);
    margin: 0;
    color: var(--color-text-dark);
    line-height: 1.6;
}
.container { padding: 40px; max-width: 1200px; margin: 0 auto; }
.header-detail { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
.page-title { font-size: 32px; font-weight: 600; color: var(--color-primary); margin: 0; }
.card { background: var(--color-card); border-radius: 15px; padding: 30px; margin-bottom: 25px; box-shadow: 0 4px 6px rgba(0,0,0,0.05), 0 20px 25px rgba(0,0,0,0.05); }
.card h3 { color: var(--color-primary); border-bottom: 2px solid #e9ecef; padding-bottom: 10px; margin-top: 0; margin-bottom: 20px; font-weight: 600; font-size: 20px; }
.detail-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px 40px; margin-bottom: 15px; }
.detail-item { font-size: 15px; }
.detail-item strong { display: block; color: var(--color-text-light); font-weight: 500; font-size: 13px; text-transform: uppercase; margin-bottom: 4px; }
.status { font-weight: 600; padding: 6px 12px; border-radius: 50px; font-size: 12px; display: inline-block; min-width: 90px; }
.status-Menunggu { background-color: rgba(251,99,64,0.15); color: var(--color-warning); }
.status-Diproses { background-color: rgba(0,123,255,0.15); color: var(--color-secondary); }
.status-Selesai { background-color: rgba(45,206,137,0.15); color: var(--color-success); }
.status-Ditolak { background-color: rgba(245,54,92,0.15); color: var(--color-danger); }
.btn { padding: 10px 18px; border: none; border-radius: 8px; cursor: pointer; font-size: 14px; font-weight: 500; transition: all 0.2s; display: inline-flex; align-items: center; gap: 8px; text-decoration: none; }
.btn-back { background: #e9ecef; color: var(--color-text-dark); }
.btn-back:hover { background: #ced4da; }
.btn-print { background: #6c757d; color: white; }
.btn-print:hover { background: #5a6268; }
.rejection-reason { margin-top: 20px; padding: 15px; background: #fff3f5; border-left: 5px solid var(--color-danger); border-radius: 8px; color: var(--color-text-dark); }
.rejection-reason strong { color: var(--color-danger); display: block; margin-bottom: 5px; font-size: 15px; }
.activity-log { list-style: none; padding-left: 0; border-left: 2px solid #e9ecef; margin-left: 10px; }
.activity-log li { position: relative; padding: 10px 0 10px 25px; font-size: 14px; }
.activity-log li::before { content: ''; position: absolute; top: 50%; left: -11px; transform: translateY(-50%); width: 20px; height: 20px; background: #fff; border: 3px solid var(--color-secondary); border-radius: 50%; z-index: 1; }
.activity-log li.log-active::before { background: var(--color-secondary); border-color: #f8f9fa; box-shadow: 0 0 0 4px var(--color-secondary); }
.log-date { display: block; color: var(--color-text-light); font-size: 12px; }

/* Modal Preview */
.modal { display: none; position: fixed; z-index: 1000; padding-top: 60px; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.7);}
.modal-content { margin: auto; display: block; max-width: 80%; max-height: 80%; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.5);}
.modal-close { position: absolute; top: 20px; right: 35px; color: #fff; font-size: 40px; font-weight: bold; cursor: pointer;}
</style>
</head>
<body>
<div class="container">

    <div class="header-detail">
        <h1 class="page-title">Detail Permohonan #<?= esc($permohonan['id']) ?></h1>
        <div style="display: flex; gap: 10px;">
            <a href="#" class="btn btn-print">
                <i class="fas fa-print"></i> Cetak Dokumen
            </a>
            <a href="/admin/dashboard" class="btn btn-back">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>

    <div class="card">
        <h3>Informasi Dasar Permohonan</h3>
        <div class="detail-grid">

            <div class="detail-item">
                <strong>Nama Pemohon</strong>
                <?= esc($permohonan['nama']) ?>
            </div>

            <div class="detail-item">
                <strong>Tanggal Permohonan</strong>
                <?= date('d M Y, H:i', strtotime($permohonan['tgl_permohonan'] ?? $permohonan['created_at'] ?? 'now')) ?> WIB
            </div>

            <div class="detail-item">
                <strong>Jenis Data Diminta</strong>
                <?= esc($permohonan['jenis_data']) ?>
            </div>

            <div class="detail-item">
                <strong>Status Saat Ini</strong>
                <span class="status status-<?= str_replace(' ', '', esc($permohonan['status'])) ?>">
                    <?= esc($permohonan['status']) ?>
                </span>
            </div>

            <div class="detail-item" style="grid-column: 1 / -1;">
                <strong>Deskripsi / Kebutuhan Data</strong>
                <p style="margin: 0; color: var(--color-text-dark);">
                    <?= esc($permohonan['deskripsi_permohonan'] ?? $permohonan['deskripsi'] ?? '-') ?>
                </p>
            </div>

            <div class="detail-item">
                <strong>Email Pemohon</strong>
                <?= esc($permohonan['email'] ?? '-') ?>
            </div>

            <div class="detail-item">
                <strong>No HP / WhatsApp</strong>
                <?= esc($permohonan['no_hp'] ?? $permohonan['telp'] ?? '-') ?>
            </div>

            <div class="detail-item">
                <strong>Instansi / Perusahaan</strong>
                <?= esc($permohonan['instansi'] ?? '-') ?>
            </div>

            <div class="detail-item">
                <strong>Alamat Pemohon</strong>
                <?= esc($permohonan['alamat'] ?? '-') ?>
            </div>

            <div class="detail-item">
                <strong>NIK / No. KTP</strong>
                <?= esc($permohonan['nik'] ?? $permohonan['ktp'] ?? '-') ?>
            </div>

            <div class="detail-item">
                <strong>File KTP</strong>
                <?php if (!empty($permohonan['file_ktp'])): ?>
                    <a href="javascript:void(0)" onclick="previewFile('/uploads/ktp/<?= esc($permohonan['file_ktp']) ?>')">
                        <i class="fas fa-eye"></i> Lihat KTP
                    </a>
                <?php else: ?>-
                <?php endif; ?>
            </div>

            <div class="detail-item">
                <strong>Lampiran Tambahan</strong>
                <?php if (!empty($permohonan['lampiran'])): ?>
                    <a href="javascript:void(0)" onclick="previewFile('/uploads/lampiran/<?= esc($permohonan['lampiran']) ?>')">
                        <i class="fas fa-eye"></i> Lihat Lampiran
                    </a>
                <?php else: ?>-
                <?php endif; ?>
            </div>

            <div class="detail-item">
                <strong>File Surat</strong>
                <?php if (!empty($permohonan['file_surat'])): ?>
                    <a href="javascript:void(0)" onclick="previewFile('/uploads/surat/<?= esc($permohonan['file_surat']) ?>', 'pdf')">
                        <i class="fas fa-eye"></i> Lihat Surat
                    </a>
                <?php else: ?>-
                <?php endif; ?>
            </div>

            <?php if (!empty($permohonan['bidang_admin'])): ?>
            <div class="detail-item">
                <strong>Dialokasikan Ke Bidang</strong>
                <?= esc($permohonan['bidang_admin']) ?>
            </div>
            <?php endif; ?>

        </div>

        <?php if ($permohonan['status'] === 'Ditolak'): ?>
        <div class="rejection-reason">
            <strong>Permohonan Ditolak</strong>
            <p><?= esc($permohonan['alasan_penolakan']) ?></p>
        </div>
        <?php endif; ?>
    </div>

    <div class="card">
        <h3>Riwayat Proses & Aktivitas</h3>
        <ul class="activity-log">

            <li class="log-active">
                Status Diperbarui: <?= esc($permohonan['status']) ?>
                <span class="log-date">
                    <?= date('d M Y, H:i', strtotime($permohonan['diputuskan_pada'] ?? $permohonan['created_at'])) ?>
                </span>
            </li>

            <?php if (!empty($permohonan['bidang_admin'])): ?>
            <li>
                Dialokasikan ke Bidang <?= esc($permohonan['bidang_admin']) ?>.
                <span class="log-date"><?= date('d M Y, H:i', strtotime($permohonan['updated_at'])) ?></span>
            </li>
            <?php endif; ?>

            <li>
                Verifikasi awal pemohon berhasil.
                <span class="log-date"><?= date('d M Y, H:i', strtotime($permohonan['created_at'])) ?></span>
            </li>

            <li>
                Permohonan dibuat oleh <?= esc($permohonan['nama']) ?>.
                <span class="log-date"><?= date('d M Y, H:i', strtotime($permohonan['created_at'])) ?></span>
            </li>

        </ul>
    </div>

</div>

<!-- Modal Preview -->
<div id="previewModal" class="modal">
    <span class="modal-close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="previewImg" style="display:none;">
    <iframe id="previewPDF" class="modal-content" style="display:none;" frameborder="0"></iframe>
</div>

<script>
function previewFile(src, type = 'img'){
    if(type === 'pdf'){
        document.getElementById('previewImg').style.display = 'none';
        var pdfFrame = document.getElementById('previewPDF');
        pdfFrame.src = src;
        pdfFrame.style.display = 'block';
    } else {
        document.getElementById('previewPDF').style.display = 'none';
        var img = document.getElementById('previewImg');
        img.src = src;
        img.style.display = 'block';
    }
    document.getElementById('previewModal').style.display = 'block';
}

function closeModal(){
    document.getElementById('previewModal').style.display = 'none';
    document.getElementById('previewImg').src = '';
    document.getElementById('previewPDF').src = '';
}

// klik di luar modal juga menutup
window.onclick = function(event) {
    var modal = document.getElementById('previewModal');
    if (event.target == modal) closeModal();
}
</script>

</body>
</html>
