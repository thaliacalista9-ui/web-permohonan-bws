<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard | SDA Enterprise</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<style>
    :root {
        --primary-dongker: #0f172a;
        --accent-blue: #2563eb;
        --bg-body: #f1f5f9;
        --surface: #ffffff;
        --border-bold: #cbd5e1;
        --border-light: #e2e8f0;
        --text-main: #1e293b;
        --text-muted: #475569;
        --shadow-premium: 0 10px 25px -5px rgba(0,0,0,0.1),0 8px 10px -6px rgba(0,0,0,0.1);
        --s-waiting-bg: #fff7ed; --s-waiting-text: #9a3412;
        --s-process-bg: #eff6ff; --s-process-text: #1e40af;
        --s-success-bg: #f0fdf4; --s-success-text: #166534;
        --s-danger-bg: #fef2f2; --s-danger-text: #991b1b;
    }
    *{box-sizing:border-box;margin:0;padding:0;}
    body{font-family:'Inter',sans-serif;background:var(--bg-body);color:var(--text-main);}
    header{background:var(--primary-dongker);padding:1rem 2.5rem;display:flex;justify-content:space-between;align-items:center;position:sticky;top:0;z-index:1000;box-shadow:0 4px 12px rgba(0,0,0,0.1);}
    .brand-admin{font-size:1.1rem;font-weight:800;color:#fff;display:flex;align-items:center;gap:12px;}
    .brand-admin i{color:var(--accent-blue);font-size:1.2rem;}
    .logout-link{font-size:0.85rem;color:#cbd5e1;text-decoration:none;font-weight:700;padding:8px 18px;border-radius:6px;border:1px solid #334155;transition:all 0.3s;}
    .logout-link:hover{background:#ef4444;border-color:#ef4444;color:white;}
    .wrapper{padding:3rem 2.5rem;max-width:1500px;margin:0 auto;}
    .section-header{margin-bottom:2rem;border-left:5px solid var(--accent-blue);padding-left:20px;}
    .section-title{font-size:1.5rem;font-weight:800;color:var(--primary-dongker);text-transform:uppercase;}
    .section-desc{font-size:0.95rem;color:var(--text-muted);font-weight:500;}
    .card-container{background:var(--surface);border-radius:16px;border:1px solid var(--border-bold);box-shadow:var(--shadow-premium);margin-bottom:4rem;overflow:hidden;}
    table{width:100%;border-collapse:collapse;text-align:left;}
    thead{background:var(--primary-dongker);}
    th{padding:18px 24px;font-size:0.8rem;text-transform:uppercase;letter-spacing:0.1em;color:#fff;font-weight:700;border-right:1px solid rgba(255,255,255,0.1);}
    td{padding:20px 24px;font-size:0.95rem;border-bottom:1px solid var(--border-light);vertical-align:middle;font-weight:500;}
    tbody tr:nth-child(even){background:#f8fafc;}
    tbody tr:hover{background:#f1f5f9;}
    .badge{padding:6px 14px;border-radius:8px;font-size:0.8rem;font-weight:800;display:inline-flex;align-items:center;gap:8px;border:1px solid transparent;}
    .badge-waiting{background:var(--s-waiting-bg);color:var(--s-waiting-text);border-color:#fed7aa;}
    .badge-process{background:var(--s-process-bg);color:var(--s-process-text);border-color:#bfdbfe;}
    .badge-success{background:var(--s-success-bg);color:var(--s-success-text);border-color:#bbf7d0;}
    .badge-danger{background:var(--s-danger-bg);color:var(--s-danger-text);border-color:#fecaca;}
    .action-cell{display:flex;gap:10px;justify-content:flex-end;}
    .btn{padding:10px 18px;border-radius:8px;font-size:0.85rem;font-weight:700;cursor:pointer;transition:all 0.2s ease;display:inline-flex;align-items:center;gap:8px;text-decoration:none;border:1px solid transparent;}
    .btn-white{background:#fff;border-color:var(--border-bold);color:var(--primary-dongker);}
    .btn-primary{background:var(--accent-blue);color:#fff;box-shadow:0 4px 6px rgba(37,99,235,0.2);}
    .btn-dark{background:var(--primary-dongker);color:#fff;}
    .btn-danger-outline{background:#fef2f2;border-color:#fca5a5;color:#b91c1c;}
    .btn:hover{transform:translateY(-2px);filter:brightness(1.1);box-shadow:0 8px 15px rgba(0,0,0,0.1);}
    textarea, select{font-family:inherit;padding:12px;border-radius:8px;border:2px solid var(--border-light);font-size:0.9rem;font-weight:500;outline:none;transition:all 0.3s;}
    textarea:focus, select:focus{border-color:var(--accent-blue);background:#fff;}
    .user-meta b{display:block;color:var(--primary-dongker);font-size:1rem;margin-bottom:2px;}
    .user-meta span{font-size:0.8rem;color:var(--text-muted);font-weight:600;}
</style>
</head>
<body>

<header>
    <div class="brand-admin"><i class="bi bi-layers-half"></i> SDA ENTERPRISE CONTROL</div>
    <div style="display:flex;align-items:center;gap:25px;">
        <div style="text-align:right;">
            <p style="color:white;font-size:0.85rem;font-weight:700;margin:0;">Sistem Administrator</p>
            <p style="color:var(--accent-blue);font-size:0.7rem;font-weight:800;text-transform:uppercase;margin:0;">Verified Access</p>
        </div>
        <a href="/admin/logout" class="logout-link">LOGOUT <i class="bi bi-box-arrow-right"></i></a>
    </div>
</header>

<div class="wrapper">

    <!-- ANTRIAN BARU -->
    <div class="section-header">
        <h2 class="section-title">Antrian Permohonan Baru</h2>
        <p class="section-desc">Silakan periksa kelengkapan dokumen pemohon.</p>
    </div>
    <div class="card-container">
        <table>
            <thead>
                <tr>
                    <th style="width:250px;">Pemohon</th>
                    <th>Jenis Data</th>
                    <th>Status</th>
                    <th style="text-align:right;">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($permohonan as $p): ?>
                    <?php if(strtolower($p['status'])=='diproses' || strtolower($p['status'])=='menunggu'): ?>
                    <tr>
                        <td><div class="user-meta"><b><?= esc($p['nama']) ?></b><span>ID: #<?= $p['id'] ?></span></div></td>
                        <td><?= esc($p['jenis_data']) ?></td>
                        <td>
                            <?php if(strtolower($p['status'])=='menunggu'): ?>
                                <span class="badge badge-waiting"><i class="bi bi-hourglass-split"></i> Menunggu</span>
                            <?php else: ?>
                                <span class="badge badge-process"><i class="bi bi-arrow-repeat spin"></i> Diproses</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="action-cell">
                                <a href="/admin/permohonan/<?= $p['id'] ?>" class="btn btn-white"><i class="bi bi-eye"></i> Detail</a>
                                <?php if(strtolower($p['status'])=='menunggu'): ?>
                                    <form method="post" action="/admin/approve/<?= $p['id'] ?>" style="display:inline;">
                                        <button class="btn btn-primary"><i class="bi bi-check-lg"></i> Setujui</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- PROGRES & ALOKASI -->
    <div class="section-header">
        <h2 class="section-title">Pengerjaan & Alokasi</h2>
        <p class="section-desc">Pantau progres dan alokasikan tugas internal.</p>
    </div>
    <div class="card-container">
        <table>
            <thead>
                <tr>
                    <th>Pemohon</th>
                    <th>Jenis Data</th>
                    <th>Status</th>
                    <th>Alokasi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($permohonan as $p): ?>
                    <?php if(strtolower($p['status'])=='diproses'): ?>
                    <tr>
                        <td><?= esc($p['nama']) ?></td>
                        <td><?= esc($p['jenis_data']) ?></td>
                        <td><span class="badge badge-process">Diproses</span></td>
                        <td>
                            <form method="post" action="/admin/assign/<?= $p['id'] ?>" style="display:flex;gap:10px;">
                                <select name="assigned_to" required style="flex-grow:1;">
                                    <option value="">-- Pilih Bidang --</option>
                                    <?php foreach($admins as $a): ?>
                                        <option value="<?= $a['id'] ?>"><?= esc($a['bidang']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <button class="btn btn-dark">Alokasikan</button>
                            </form>
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- ARSIP RIWAYAT -->
    <div class="section-header">
        <h2 class="section-title">Arsip Riwayat</h2>
        <p class="section-desc">Transaksi yang telah selesai atau ditolak.</p>
    </div>
    <div class="card-container">
        <table>
            <thead>
                <tr>
                    <th>Pemohon</th>
                    <th>Jenis Data</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($permohonan as $p): ?>
                    <?php if(strtolower($p['status'])=='ditolak' || strtolower($p['status'])=='selesai'): ?>
                    <tr>
                        <td><?= esc($p['nama']) ?></td>
                        <td><?= esc($p['jenis_data']) ?></td>
                        <td><span class="badge <?= strtolower($p['status'])=='selesai' ? 'badge-success' : 'badge-danger' ?>"><?= strtoupper($p['status']) ?></span></td>
                        <td style="font-size:0.85rem;">
                            <?php if(strtolower($p['status'])=='ditolak'): ?>
                                <span style="color:#b91c1c;"><i class="bi bi-x-octagon-fill"></i> Alasan: <?= esc($p['alasan_penolakan']) ?></span>
                            <?php else: ?>
                                <span style="color:#166534;"><i class="bi bi-cloud-check-fill"></i> Data selesai dikirim</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
