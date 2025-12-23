<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bidang Dashboard | Sistem Permohonan Data SDA</title>
    
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

            /* Status Colors (Match with Admin Main) */
            --s-waiting-bg: #fff7ed; --s-waiting-text: #9a3412;
            --s-process-bg: #eff6ff; --s-process-text: #1e40af;
            --s-success-bg: #f0fdf4; --s-success-text: #166534;
            --s-danger-bg: #fef2f2; --s-danger-text: #991b1b;

            --shadow-premium: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        * { 
            box-sizing: border-box; 
            -webkit-font-smoothing: antialiased;
            margin: 0; padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-body);
            color: var(--text-main);
            line-height: 1.5;
        }

        /* --- NAVIGATION --- */
        header {
            background: var(--primary-dongker);
            padding: 1rem 2.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .brand-bidang {
            font-size: 1.1rem;
            font-weight: 800;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 12px;
            letter-spacing: 0.02em;
        }

        .brand-bidang i { color: var(--accent-blue); }

        .logout-link {
            font-size: 0.85rem;
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 700;
            padding: 8px 18px;
            border-radius: 6px;
            border: 1px solid #334155;
            transition: 0.3s;
        }

        .logout-link:hover {
            background: #ef4444;
            color: white;
            border-color: #ef4444;
        }

        /* --- LAYOUT --- */
        .wrapper {
            padding: 3rem 2.5rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-intro {
            margin-bottom: 2.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 20px 30px;
            border-radius: 12px;
            border: 1px solid var(--border-bold);
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .bidang-info h2 {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--primary-dongker);
        }

        .bidang-info p {
            font-size: 0.95rem;
            color: var(--text-muted);
        }

        .bidang-badge {
            background: var(--accent-blue);
            color: white;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        /* --- TABLE STYLE --- */
        .card-table {
            background: var(--surface);
            border-radius: 16px;
            border: 1px solid var(--border-bold);
            box-shadow: var(--shadow-premium);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        thead {
            background: var(--primary-dongker);
        }

        th {
            padding: 18px 24px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #ffffff;
            font-weight: 700;
        }

        td {
            padding: 18px 24px;
            font-size: 0.9rem;
            border-bottom: 1px solid var(--border-light);
            vertical-align: middle;
            font-weight: 500;
        }

        tbody tr:nth-child(even) { background: #f8fafc; }
        tbody tr:hover { background: #f1f5f9; }

        /* --- STATUS PILLS --- */
        .status-pill {
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: 1px solid transparent;
        }

        .status-menunggu { background: var(--s-waiting-bg); color: var(--s-waiting-text); border-color: #fed7aa; }
        .status-diproses { background: var(--s-process-bg); color: var(--s-process-text); border-color: #bfdbfe; }
        .status-selesai { background: var(--s-success-bg); color: var(--s-success-text); border-color: #bbf7d0; }
        .status-ditolak { background: var(--s-danger-bg); color: var(--s-danger-text); border-color: #fecaca; }

        /* --- BUTTON --- */
        .btn-detail {
            background: #ffffff;
            border: 1px solid var(--border-bold);
            color: var(--primary-dongker);
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.2s;
        }

        .btn-detail:hover {
            background: var(--primary-dongker);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .empty-state {
            padding: 60px;
            text-align: center;
            color: var(--text-muted);
        }

        .empty-state i {
            font-size: 3rem;
            display: block;
            margin-bottom: 15px;
            color: var(--border-bold);
        }

    </style>
</head>

<body>

<header>
    <div class="brand-bidang">
        <i class="bi bi-cpu-fill"></i>
        BIDANG DASHBOARD CONTROL
    </div>
    <div style="display: flex; align-items: center; gap: 20px;">
        <div style="text-align: right; line-height: 1.2;">
            <p style="color: white; font-size: 0.8rem; font-weight: 700;">Admin Operasional</p>
            <span style="color: var(--accent-blue); font-size: 0.65rem; font-weight: 800;">SDA SYSTEM</span>
        </div>
        <a href="<?= base_url('admin/logout') ?>" class="logout-link">
            KELUAR <i class="bi bi-box-arrow-right"></i>
        </a>
    </div>
</header>

<div class="wrapper">

    <div class="section-intro">
        <div class="bidang-info">
            <p>Selamat Datang,</p>
            <h2>Panel Kelola Data Bidang</h2>
            <p style="margin-top: 4px;">Pantau dan proses permintaan data teknis yang masuk ke divisi Anda.</p>
        </div>
        <div class="bidang-badge">
            <i class="bi bi-shield-lock"></i> Bidang: <?= esc(session()->get('bidang')) ?>
        </div>
    </div>

    <div class="card-table">
        <table>
            <thead>
                <tr>
                    <th style="width: 120px;">Ref. Kode</th>
                    <th>Nama Lengkap Pemohon</th>
                    <th>Spesifikasi Jenis Data</th>
                    <th style="width: 180px;">Status Progres</th>
                    <th style="text-align: right; width: 220px;">Tindakan Utama</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($permohonan)) : ?>
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">
                                <i class="bi bi-inbox"></i>
                                <p>Belum ada permohonan data yang masuk untuk bidang Anda.</p>
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($permohonan as $p): ?>
                        <?php
                            $status_class = strtolower(str_replace([' ', '_'], '-', $p['status']));
                        ?>
                        <tr>
                            <td><b style="color: var(--primary-dongker); font-family: monospace; font-size: 1rem;">#<?= esc($p['kode']) ?></b></td>
                            <td>
                                <div style="font-weight: 700;"><?= esc($p['nama']) ?></div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">Timestamp: <?= date('d M Y') ?></div>
                            </td>
                            <td>
                                <span style="font-weight: 600; color: var(--accent-blue);">
                                    <i class="bi bi-file-earmark-text"></i> <?= esc($p['jenis_data']) ?>
                                </span>
                            </td>
                            <td>
                                <span class="status-pill status-<?= esc($status_class) ?>">
                                    <i class="bi bi-dot" style="font-size: 1.5rem;"></i>
                                    <?= strtoupper(esc($p['status'])) ?>
                                </span>
                            </td>
                            <td style="text-align: right;">
                                <a class="btn-detail" href="<?= base_url('admin/bidang/permohonan/' . $p['id']) ?>">
                                    PROSES DETAIL <i class="bi bi-arrow-right-short"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>