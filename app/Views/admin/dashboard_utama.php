<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Utama | DataHub Pro</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
/* --------------------------
   I. VARIASI WARNA & FONT
   -------------------------- */
:root {
    --color-primary: #1F2A40; 
    --color-secondary: #526c88ff; 
    --color-background: #f8f9fa; 
    --color-card: #ffffff;
    --color-text-dark: #344767; 
    --color-text-light: #8392ab; 
    --color-success: #2dce89; 
    --color-warning: #fb6340; 
    --color-danger: #f5365c; 
    --font-family: 'Poppins', sans-serif;
}

/* --------------------------
   II. GLOBAL & LAYOUT
   -------------------------- */
body {
    background: var(--color-background);
    font-family: var(--font-family);
    margin: 0;
    color: var(--color-text-dark);
    line-height: 1.6;
}

/* Header */
.main-header {
    background: var(--color-card);
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.05); 
    padding: 18px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: sticky; 
    top: 0;
    z-index: 1000;
}

.logo {
    font-size: 26px;
    font-weight: 700;
    color: var(--color-primary);
}

.logout-btn {
    color: var(--color-danger);
    font-weight: 500;
    text-decoration: none;
    padding: 8px 15px;
    border-radius: 8px;
    transition: all 0.2s;
    font-size: 15px;
}

.logout-btn:hover {
    background: rgba(245, 54, 92, 0.1);
    color: var(--color-danger);
}

/* Konten Utama */
.container {
    padding: 40px; 
    max-width: 1600px;
    margin: 0 auto;
}

.page-title {
    font-size: 32px;
    font-weight: 600;
    color: var(--color-text-dark);
    margin-bottom: 2px;
}

.subtitle {
    color: var(--color-text-light);
    margin-bottom: 35px;
    font-size: 16px;
    font-weight: 400;
}

/* Card */
.card {
    background: var(--color-card);
    border-radius: 15px; 
    padding: 0; 
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05), 0 20px 25px rgba(0, 0, 0, 0.05); 
    overflow: hidden; 
}

/* --------------------------
   III. TABEL DATA
   -------------------------- */
table {
    width: 100%;
    border-collapse: collapse; 
}

thead th {
    background: var(--color-primary); 
    color: #fff;
    padding: 16px 20px;
    text-align: left;
    font-weight: 600;
    font-size: 15px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

tbody tr {
    transition: background-color 0.15s;
}

tbody tr:hover {
    background-color: #f0f2f5; 
}

tbody tr:last-child td {
    border-bottom: none;
}

td {
    padding: 18px 20px;
    border-bottom: 1px solid #e9ecef; 
    vertical-align: middle;
    font-size: 14px;
    color: var(--color-text-dark);
}

/* --------------------------
   IV. STATUS BADGE
   -------------------------- */
.status {
    font-weight: 600;
    padding: 6px 12px;
    border-radius: 50px; 
    font-size: 12px;
    text-align: center;
    display: inline-block;
    min-width: 90px;
}

/* Warna Status */
.status-Menunggu {
    background-color: rgba(251, 99, 64, 0.15);
    color: var(--color-warning); 
}

.status-Diproses {
    background-color: rgba(0, 123, 255, 0.15);
    color: var(--color-secondary); 
}

.status-Selesai {
    background-color: rgba(45, 206, 137, 0.15);
    color: var(--color-success); 
}

.status-Ditolak {
    background-color: rgba(245, 54, 92, 0.15);
    color: var(--color-danger); 
}

/* --------------------------
   V. FORM DAN AKSI
   -------------------------- */
.action-group {
    display: flex;
    flex-direction: column; 
    gap: 12px;
}

.btn {
    padding: 10px 18px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.2s;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-decoration: none;
    min-width: 120px;
}

/* Tombol Khusus */
.detail {
    background: #424971ff; 
    color: white;
}
.detail:hover {
    background: #6a76b9ff;
}

.approve {
    background: var(--color-success);
    color: white;
}
.approve:hover {
    background: #23a073;
}

.reject {
    background: var(--color-danger);
    color: white;
}
.reject:hover {
    background: #d42a51;
}

.assign {
    background: var(--color-secondary);
    color: white;
}
.assign:hover {
    background: #3b526cff;
}


/* Form Styling - Area Penolakan & Assign */
.form-action {
    display: flex;
    flex-direction: column;
    gap: 5px;
    margin-top: 5px;
}

textarea,
select {
    width: 100%;
    padding: 10px 12px;
    margin-top: 0;
    margin-bottom: 5px;
    border: 1px solid #ced4da;
    border-radius: 8px;
    box-sizing: border-box; 
    font-family: var(--font-family);
    font-size: 14px;
    transition: border-color 0.2s, box-shadow 0.2s;
    background: #fcfcfc;
}

textarea:focus,
select:focus {
    border-color: var(--color-secondary);
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    outline: none;
    background: var(--color-card);
}

small {
    display: block;
    margin-top: 5px;
    color: var(--color-text-light);
    line-height: 1.4;
    font-size: 13px;
    font-style: italic;
    border-left: 3px solid var(--color-danger);
    padding-left: 8px;
}
.status-Diserahkan {
    background-color: rgba(82, 108, 136, 0.15);
    color: var(--color-secondary);
}

</style>
</head>

<body>
<header class="main-header">
    <div class="logo">
        <i class="fas fa-database" style="color: var(--color-secondary);"></i> DataHub Admin Pro
    </div>
    <a class="logout-btn" href="/admin/logout">
        <i class="fas fa-sign-out-alt"></i> Keluar
    </a>
</header>

<div class="container">
    <h1 class="page-title">Manajemen Permohonan Data</h1>
    <div class="subtitle">Verifikasi dan Alokasi Permintaan Data Secara Real-Time</div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Nama Pemohon</th>
                    <th>Jenis Data</th>
                    <th>Status</th>
                    <th>Aksi & Alokasi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($permohonan as $p): ?>
                <tr>
                    <td>
                        <strong><?= esc($p['nama']) ?></strong>
                        <div style="font-size: 12px; color: var(--color-text-light);">ID #<?= $p['id'] ?></div>
                    </td>
                    <td><?= esc($p['jenis_data']) ?></td>
                    <td>
                        <span class="status status-<?= str_replace(' ', '', esc($p['status'])) ?>">
                            <?= esc($p['status']) ?>
                        </span>
                    </td>
                    <td>
                        <div class="action-group">
                            <a class="btn detail" href="/admin/permohonan/<?= $p['id'] ?>">
                                <i class="fas fa-info-circle"></i> Lihat Detail
                            </a>

                            <?php if($p['status']=='Menunggu'): ?>
                            
                            <form method="post" action="/admin/approve/<?= $p['id'] ?>">
                                <button class="btn approve">
                                    <i class="fas fa-check"></i> Setuju & Lanjutkan
                                </button>
                            </form>

                            <form method="post" action="/admin/reject/<?= $p['id'] ?>" class="form-action">
                                <textarea name="alasan_penolakan" required placeholder="Tulis alasan penolakan di sini..." rows="2"></textarea>
                                <button class="btn reject">
                                    <i class="fas fa-times"></i> Tolak Permohonan
                                </button>
                            </form>

                            <?php elseif($p['status']=='Diproses'): ?>

                            <form method="post" action="/admin/assign/<?= $p['id'] ?>" class="form-action">
                                <select name="assigned_to" required>
                                    <option value="">-- Pilih Bidang Penanggung Jawab --</option>
                                    <?php foreach($admins as $a): ?>
                                    <option value="<?= $a['id'] ?>"><?= esc($a['bidang']) ?></option>
                                    <?php endforeach ?>
                                </select>
                                <button class="btn assign">
                                    <i class="fas fa-users-cog"></i> Alokasikan Tugas
                                </button>
                            </form>
                            <div style="font-size: 12px; color: var(--color-text-light);">*Wajib dialokasikan ke Bidang.</div>

                            <?php elseif($p['status']=='Ditolak'): ?>
                            <small>
                                <b>Alasan Penolakan:</b><br>
                                <?= esc($p['alasan_penolakan']) ?>
                            </small>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>