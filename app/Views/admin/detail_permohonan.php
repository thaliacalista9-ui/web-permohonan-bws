<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Permohonan #<?= esc($permohonan['id']) ?> | SDA Enterprise</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --slate-900: #0f172a;
            --slate-800: #1e293b;
            --slate-500: #64748b;
            --slate-200: #e2e8f0;
            --slate-50: #f8fafc;
            --blue-600: #2563eb;
            --red-600: #dc2626;
            --red-50: #fef2f2;
            --white: #ffffff;
            --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
            color: var(--slate-800);
            line-height: 1.6;
            padding: 40px 20px;
        }

        .container { max-width: 1200px; margin: 0 auto; }

        /* --- HEADER --- */
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 30px;
        }

        .id-badge {
            background: var(--slate-900);
            color: var(--white);
            padding: 4px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 800;
            margin-bottom: 10px;
            display: inline-block;
        }

        .header-section h1 {
            font-size: 1.75rem;
            font-weight: 800;
            letter-spacing: -0.025em;
            color: var(--slate-900);
        }

        /* --- BUTTONS --- */
        .action-group { display: flex; gap: 12px; }
        
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 0.875rem;
            font-weight: 700;
            transition: all 0.2s;
            cursor: pointer;
            border: none;
            text-decoration: none;
        }

        .btn-white { background: var(--white); color: var(--slate-800); border: 1px solid var(--slate-200); }
        .btn-white:hover { background: var(--slate-50); border-color: var(--slate-500); }

        .btn-dark { background: var(--slate-900); color: var(--white); }
        .btn-dark:hover { opacity: 0.9; transform: translateY(-1px); }

        /* --- CARDS --- */
        .card {
            background: var(--white);
            border-radius: 20px;
            border: 1px solid var(--slate-200);
            box-shadow: var(--shadow);
            margin-bottom: 24px;
            overflow: hidden;
        }

        .card-header {
            padding: 24px 30px;
            border-bottom: 1px solid var(--slate-200);
            display: flex;
            align-items: center;
            gap: 12px;
            background: var(--slate-50);
        }

        .card-header i { color: var(--blue-600); font-size: 1.25rem; }
        .card-header h3 { font-size: 1rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; }

        /* --- INFO GRID --- */
        .info-grid { display: grid; grid-template-columns: repeat(3, 1fr); }
        .info-item { padding: 24px 30px; border-bottom: 1px solid var(--slate-50); border-right: 1px solid var(--slate-50); }
        .info-item.full { grid-column: span 3; border-right: none; }
        
        .label {
            display: block;
            font-size: 0.7rem;
            font-weight: 800;
            color: var(--slate-500);
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .value { font-size: 1rem; font-weight: 600; color: var(--slate-900); }

        /* --- STATUS PILLS --- */
        .status {
            padding: 6px 14px;
            border-radius: 99px;
            font-size: 0.75rem;
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .status-Menunggu { background: #fffbeb; color: #92400e; }
        .status-Diproses { background: #eff6ff; color: #1e40af; }
        .status-Selesai { background: #f0fdf4; color: #166534; }
        .status-Ditolak { background: #fef2f2; color: #991b1b; }

        /* --- ATTACHMENTS --- */
        .file-box {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px;
            background: var(--slate-50);
            border: 1px solid var(--slate-200);
            border-radius: 12px;
            color: var(--blue-600);
            text-decoration: none;
            font-weight: 700;
            font-size: 0.85rem;
            transition: 0.2s;
        }
        .file-box:hover { background: var(--blue-600); color: white; border-color: var(--blue-600); }

        /* --- REJECTION AREA --- */
        .rejection-wrapper {
            padding: 30px;
            background: #fffafa;
            border-top: 2px solid #fee2e2;
        }

        .rejection-header {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--red-600);
            margin-bottom: 15px;
        }

        .rejection-header h4 { font-weight: 800; font-size: 0.9rem; text-transform: uppercase; }

        .form-control {
            width: 100%;
            padding: 15px;
            border-radius: 12px;
            border: 1px solid #fca5a5;
            background: white;
            font-family: inherit;
            font-size: 0.9rem;
            color: var(--slate-900);
            margin-bottom: 15px;
            resize: vertical;
            transition: 0.2s;
        }

        .form-control:focus { outline: none; border-color: var(--red-600); box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.1); }

        .btn-confirm-reject {
            background: var(--red-600);
            color: white;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: 0.2s;
        }
        .btn-confirm-reject:hover { background: #b91c1c; box-shadow: 0 4px 12px rgba(220, 38, 38, 0.2); }

        /* --- TIMELINE --- */
        .timeline { padding: 30px; list-style: none; }
        .timeline-item {
            padding-left: 25px;
            border-left: 2px solid var(--slate-200);
            position: relative;
            padding-bottom: 25px;
        }
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -7px; top: 0;
            width: 12px; height: 12px;
            background: white;
            border: 2px solid var(--blue-600);
            border-radius: 50%;
        }
        .timeline-item.active::before { background: var(--blue-600); box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1); }
        .timeline-item:last-child { border-left: transparent; }
        .t-text { display: block; font-weight: 700; font-size: 0.9rem; }
        .t-time { font-size: 0.75rem; color: var(--slate-500); }

        /* --- MODAL --- */
        .modal { 
            display: none; position: fixed; z-index: 9999; 
            top: 0; left: 0; width: 100%; height: 100%; 
            background: rgba(15, 23, 42, 0.9); backdrop-filter: blur(8px); 
        }
        .modal-container { 
            position: relative; width: 90%; height: 85%; 
            margin: 2% auto; background: white; border-radius: 20px; overflow: hidden; 
        }
        .close-modal { 
            position: absolute; top: 20px; right: 30px; 
            font-size: 2rem; color: white; cursor: pointer; z-index: 10000;
        }

        @media (max-width: 992px) {
            .info-grid { grid-template-columns: 1fr 1fr; }
            .side-layout { grid-template-columns: 1fr !important; }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header-section">
        <div>
            <span class="id-badge">DOCUMENT ARCHIVE #<?= esc($permohonan['id']) ?></span>
            <h1>Detail Dokumentasi Permohonan</h1>
        </div>
        <div class="action-group">
            <a href="javascript:window.print()" class="btn btn-white">
                <i class="bi bi-printer"></i> Cetak Berkas
            </a>
            <a href="/admin/dashboard" class="btn btn-dark">
                <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <i class="bi bi-person-badge-fill"></i>
            <h3>Identitas Korespondensi</h3>
        </div>
        <div class="info-grid">
            <div class="info-item">
                <span class="label">Nama Lengkap</span>
                <span class="value"><?= esc($permohonan['nama']) ?></span>
            </div>
            <div class="info-item">
                <span class="label">Status Verifikasi</span>
                <span class="status status-<?= str_replace(' ', '', esc($permohonan['status'])) ?>">
                    <i class="bi bi-patch-check-fill"></i> <?= esc($permohonan['status']) ?>
                </span>
            </div>
            <div class="info-item">
                <span class="label">Tanggal Pengajuan</span>
                <span class="value"><?= date('d M Y - H:i', strtotime($permohonan['created_at'])) ?></span>
            </div>
            <div class="info-item">
                <span class="label">Email Resmi</span>
                <span class="value"><?= esc($permohonan['email'] ?? '-') ?></span>
            </div>
            <div class="info-item">
                <span class="label">Kontak WhatsApp</span>
                <span class="value"><?= esc($permohonan['whatsapp'] ?? '-') ?></span>
            </div>
            <div class="info-item">
                <span class="label">Institusi / Instansi</span>
                <span class="value"><?= esc($permohonan['instansi'] ?? '-') ?></span>
            </div>
            <div class="info-item full">
                <span class="label">Deskripsi Kebutuhan Data</span>
                <span class="value" style="font-weight: 500;"><?= esc($permohonan['deskripsi'] ?? '-') ?></span>
            </div>
        </div>
    </div>

    <div class="side-layout" style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px;">
        
        <div class="left-col">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-files"></i>
                    <h3>Lampiran & Validasi</h3>
                </div>
                <div class="info-grid" style="grid-template-columns: 1fr 1fr;">
                    <div class="info-item">
                        <span class="label">Nomor Identitas (NIK)</span>
                        <span class="value" style="font-family: 'Courier New', monospace; letter-spacing: 1px;">
                            <?= esc($permohonan['ktp'] ?? '-') ?>
                        </span>
                    </div>
                    <div class="info-item">
                        <span class="label">Alokasi Bidang</span>
                        <span class="value"><?= esc($permohonan['assigned_to'] ?? 'Belum Ditentukan') ?></span>
                    </div>
                    <div class="info-item">
                        <span class="label">Dokumen KTP</span>
                        <?php if (!empty($permohonan['file_ktp'])): ?>
                            <a href="javascript:void(0)" class="file-box" onclick="previewFile('/uploads/ktp/<?= esc($permohonan['file_ktp']) ?>')">
                                <i class="bi bi-image"></i> Pratinjau KTP
                            </a>
                        <?php else: ?>-<?php endif; ?>
                    </div>
                    <div class="info-item">
                        <span class="label">Surat Permohonan</span>
                        <?php if (!empty($permohonan['file_surat'])): ?>
                            <a href="javascript:void(0)" class="file-box" onclick="previewFile('/uploads/surat/<?= esc($permohonan['file_surat']) ?>', 'pdf')">
                                <i class="bi bi-file-earmark-pdf"></i> Lihat PDF
                            </a>
                        <?php else: ?>-<?php endif; ?>
                    </div>
                </div>

                <?php if ($permohonan['status'] === 'Ditolak'): ?>
                    <div class="rejection-wrapper">
                        <div class="rejection-header">
                            <i class="bi bi-exclamation-octagon-fill"></i>
                            <h4>Permohonan Telah Ditolak</h4>
                        </div>
                        <span class="label">Alasan Penolakan Resmi:</span>
                        <p style="font-weight: 600; color: #b91c1c; background: white; padding: 15px; border-radius: 10px; border: 1px solid #fecaca;">
                            <?= esc($permohonan['alasan_penolakan']) ?>
                        </p>
                    </div>
                <?php elseif ($permohonan['status'] !== 'Selesai'): ?>
                    <div class="rejection-wrapper">
                        <div class="rejection-header">
                            <i class="bi bi-shield-lock"></i>
                            <h4>Tindakan Penolakan</h4>
                        </div>
                        <form action="/admin/permohonan/tolak/<?= esc($permohonan['id']) ?>" method="post">
                            <?= csrf_field() ?>
                            <textarea name="alasan_penolakan" class="form-control" rows="3" required 
                                placeholder="Sebutkan alasan profesional penolakan (misal: Dokumen KTP tidak jelas, atau deskripsi data kurang spesifik)..."></textarea>
                            <button type="submit" class="btn-confirm-reject">
                                <i class="bi bi-x-lg"></i> Konfirmasi Penolakan Berkas
                            </button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="right-col">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-clock-history"></i>
                    <h3>Log Aktivitas</h3>
                </div>
                <ul class="timeline">
                    <li class="timeline-item active">
                        <span class="t-text">Status: <?= esc($permohonan['status']) ?></span>
                        <span class="t-time"><?= date('d M Y, H:i', strtotime($permohonan['updated_at'])) ?></span>
                    </li>
                    <?php if (!empty($permohonan['assigned_to'])): ?>
                    <li class="timeline-item">
                        <span class="t-text">Diteruskan ke Admin ID: <?= esc($permohonan['assigned_to']) ?></span>
                        <span class="t-time">Sistem Otomatis</span>
                    </li>
                    <?php endif; ?>
                    <li class="timeline-item">
                        <span class="t-text">Pendaftaran Berkas</span>
                        <span class="t-time"><?= date('d M Y, H:i', strtotime($permohonan['created_at'])) ?></span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>

<div id="previewModal" class="modal">
    <span class="close-modal" onclick="closeModal()">&times;</span>
    <div class="modal-container">
        <img id="previewImg" style="width:100%; height:100%; object-fit: contain; display:none;">
        <iframe id="previewPDF" style="width:100%; height:100%; display:none;" frameborder="0"></iframe>
    </div>
</div>

<script>
function previewFile(src, type = 'img'){
    const img = document.getElementById('previewImg');
    const pdf = document.getElementById('previewPDF');
    const modal = document.getElementById('previewModal');

    if(type === 'pdf'){
        img.style.display = 'none';
        pdf.src = src;
        pdf.style.display = 'block';
    } else {
        pdf.style.display = 'none';
        img.src = src;
        img.style.display = 'block';
    }
    modal.style.display = 'block';
}

function closeModal(){
    document.getElementById('previewModal').style.display = 'none';
    document.getElementById('previewImg').src = '';
    document.getElementById('previewPDF').src = '';
}

window.onclick = function(event) {
    if (event.target == document.getElementById('previewModal')) closeModal();
}
</script>

</body>
</html>