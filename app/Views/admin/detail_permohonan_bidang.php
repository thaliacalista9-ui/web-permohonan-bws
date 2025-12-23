<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Permohonan Data - SISDA Admin</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
:root {
    --primary-dark: #003366;
    --primary-blue: #0056b3;
    --bg-body: #f8fafc;
    --text-dark: #1e293b;
    --text-muted: #64748b;
}

body {
    font-family: 'Inter', sans-serif;
    background-color: var(--bg-body);
    color: var(--text-dark);
    margin: 0;
    padding: 40px 20px;
}

.container { max-width: 1000px; margin: auto; }

/* Header */
.page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
.page-header h2 { margin: 0; font-weight: 700; font-size: 1.5rem; display: flex; align-items: center; gap: 12px; color: var(--primary-dark); }
.btn-back { text-decoration: none; color: var(--text-muted); font-size: 0.9rem; font-weight: 500; }
.btn-back:hover { color: var(--primary-blue); }

/* Grid Layout */
.grid-layout { display: grid; grid-template-columns: 1.5fr 1fr; gap: 25px; }
.card { background: #fff; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border:1px solid #e2e8f0; padding:25px; margin-bottom:25px; }
.card-title { font-size:1.1rem; font-weight:600; margin-bottom:20px; padding-bottom:12px; border-bottom:1px solid #f1f5f9; color:var(--primary-dark); display:flex; align-items:center; gap:10px; }

/* Table Info */
.info-table { width: 100%; border-collapse: collapse; }
.info-table td { padding: 12px 0; vertical-align: top; border-bottom:1px solid #f8fafc; }
.info-table td:first-child { width: 35%; color: var(--text-muted); font-size:0.9rem; font-weight:500; }
.info-table td:last-child { font-weight:500; color: var(--text-dark); }

/* Status Badge */
.status { padding:5px 12px; border-radius:6px; font-size:0.75rem; font-weight:700; text-transform:uppercase; letter-spacing:0.5px; }
.pending { background:#fef3c7;color:#92400e; }
.process { background:#e0f2fe;color:#075985; }
.available { background:#dcfce7;color:#166534; }
.not { background:#fee2e2;color:#991b1b; }
.done { background:#ede9fe;color:#5b21b6; }

/* Form */
label { display:block; font-weight:600; font-size:0.85rem; margin-bottom:8px; color: var(--text-dark); }
select, textarea, input[type=file] {
    width:100%; padding:10px 12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit; font-size:0.95rem;
    margin-bottom:20px; box-sizing:border-box;
}
select:focus, textarea:focus { outline:none; border-color: var(--primary-blue); box-shadow:0 0 0 3px rgba(0,86,179,0.1);}
textarea { min-height:100px; resize:vertical; }
.btn-submit { background: var(--primary-dark); color:#fff; width:100%; padding:14px; border:none; border-radius:8px; font-weight:600; cursor:pointer; display:flex; justify-content:center; align-items:center; gap:10px;}
.btn-submit:hover { background:#002244; }

@media(max-width:768px){ .grid-layout { grid-template-columns:1fr; } }
</style>
</head>
<body>

<div class="container">
    <div class="page-header">
        <h2><i class="fas fa-file-medical"></i> Detail Permohonan Data</h2>
        <a href="javascript:history.back()" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>

    <div class="grid-layout">
        <!-- INFO PEMOHON -->
        <div class="content-info">
            <div class="card">
                <div class="card-title"><i class="fas fa-user-circle"></i> Informasi Pemohon</div>
                <table class="info-table">
                    <tr><td>Nama Pemohon</td><td><?= esc($permohonan['nama']) ?></td></tr>
                    <tr><td>Pekerjaan</td><td><?= esc($permohonan['pekerjaan']) ?></td></tr>
                    <tr><td>Tujuan</td><td><?= esc($permohonan['tujuan']) ?></td></tr>
                </table>

                <div class="card-title" style="margin-top:20px;"><i class="fas fa-database"></i> Spesifikasi Data</div>
                <table class="info-table">
                    <tr><td>Jenis Data</td><td><?= esc($permohonan['jenis_data']) ?></td></tr>
                    <tr><td>Lokasi Data</td><td><?= esc($permohonan['lokasi_data']) ?></td></tr>
                    <tr><td>Periode</td><td><?= esc($permohonan['periode_data']) ?></td></tr>
                    <tr><td>Status Saat Ini</td>
                        <td>
                            <?php
                                $map = [
                                    'Menunggu Pengecekan Data' => 'pending',
                                    'Sedang Diproses' => 'process',
                                    'Data Tersedia' => 'available',
                                    'Data Tidak Tersedia' => 'not',
                                    'Selesai' => 'done',
                                ];
                                $cls = $map[$permohonan['status']] ?? 'process';
                            ?>
                            <span class="status <?= $cls ?>"><?= esc($permohonan['status']) ?></span>
                        </td>
                    </tr>
                    <?php if($permohonan['file_data']): ?>
                        <tr><td>File Terlampir</td>
                            <td>
                                <a href="<?= base_url('admin/bidang/download/'.$permohonan['id']) ?>" target="_blank">
                                    <i class="fas fa-download"></i> <?= esc($permohonan['file_data']) ?>
                                </a>
                            </td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>

        <!-- ACTION FORM ADMIN -->
        <div class="content-action">
            <div class="card">
                <div class="card-title"><i class="fas fa-cog"></i> Proses Data</div>
                <form action="<?= base_url('admin/bidang/permohonan/proses/'.$permohonan['id']) ?>"
                      method="post"
                      enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <label for="status">Update Status</label>
                    <select name="status" id="status" required>
                        <option value="Menunggu Pengecekan Data" <?= $permohonan['status']=='Menunggu Pengecekan Data'?'selected':'' ?>>Menunggu Pengecekan</option>
                        <option value="Sedang Diproses" <?= $permohonan['status']=='Sedang Diproses'?'selected':'' ?>>Sedang Diproses</option>
                        <option value="Data Tersedia" <?= $permohonan['status']=='Data Tersedia'?'selected':'' ?>>Data Tersedia</option>
                        <option value="Data Tidak Tersedia" <?= $permohonan['status']=='Data Tidak Tersedia'?'selected':'' ?>>Data Tidak Tersedia</option>
                        <option value="Selesai" <?= $permohonan['status']=='Selesai'?'selected':'' ?>>Selesai</option>
                    </select>

                    <label for="catatan">Catatan Admin</label>
                    <textarea name="catatan_admin" id="catatan" placeholder="Tambahkan catatan untuk pemohon..."><?= esc($permohonan['catatan_admin']) ?></textarea>

                    <label for="file">Lampirkan File Hasil Data</label>
                    <input type="file" name="file_data" id="file" accept=".pdf,.xls,.xlsx">
                    <p style="font-size:11px;color:var(--text-muted);margin-top:-15px;margin-bottom:20px;">
                        *Format didukung: PDF, Excel (Max: 5MB)
                    </p>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
