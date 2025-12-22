<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Bidang | Sistem Permohonan Data</title>

    <style>
        :root {
            --brand-primary: #173f5f;
            --brand-accent: #FFD43B;
            --bg-light: #f5f8ff;
            --text-main: #222;
            --text-muted: #666;
            --text-inverse: #ffffff;
            --radius-md: 10px;
            --shadow-md: 0 4px 15px rgba(0, 0, 0, .1);
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: var(--bg-light);
            color: var(--text-main);
            margin: 0;
        }

        h2 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            color: var(--brand-primary);
        }

        .container-admin {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px 60px;
        }

        /* HEADER */
        .header-dashboard {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #e0e7ff;
            padding-bottom: 20px;
        }

        .header-dashboard p {
            color: var(--text-muted);
        }

        .logout-link {
            padding: 10px 20px;
            background: var(--brand-primary);
            color: white;
            border-radius: var(--radius-md);
            text-decoration: none;
            font-weight: 600;
        }

        .logout-link:hover {
            background: var(--brand-accent);
            color: var(--brand-primary);
        }

        /* TABLE */
        .data-table-card {
            background: white;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-md);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 16px 20px;
            border-bottom: 1px solid #eee;
        }

        th {
            background: var(--brand-primary);
            color: white;
            text-transform: uppercase;
            font-size: 13px;
        }

        tr:nth-child(even) {
            background: #f9fbfc;
        }

        tr:hover {
            background: #eef2f7;
        }

        /* STATUS */
        .status-pill {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            display: inline-block;
        }

        .status-menunggu { background: #fff3cd; color: #856404; }
        .status-diproses { background: #dbeafe; color: #1e40af; }
        .status-selesai  { background: #dcfce7; color: #166534; }
        .status-ditolak  { background: #fee2e2; color: #991b1b; }

        .empty-data {
            text-align: center;
            padding: 30px;
            color: var(--text-muted);
            font-style: italic;
        }

        a.detail-link {
            font-weight: 700;
            color: var(--brand-primary);
            text-decoration: none;
        }

        a.detail-link:hover {
            color: var(--brand-accent);
        }
    </style>
</head>

<body>

<div class="container-admin">

    <!-- HEADER -->
    <div class="header-dashboard">
        <div>
            <h2>Dashboard Admin Bidang</h2>
            <p>Mengelola permohonan data bidang:
                <b><?= esc(session()->get('bidang')) ?></b>
            </p>
        </div>
        <a href="<?= base_url('admin/logout') ?>" class="logout-link">
            Keluar
        </a>
    </div>

    <!-- TABLE -->
    <div class="data-table-card">
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Pemohon</th>
                    <th>Jenis Data</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

            <?php if (empty($permohonan)) : ?>
                <tr>
                    <td colspan="5" class="empty-data">
                        Belum ada permohonan data masuk.
                    </td>
                </tr>
            <?php endif; ?>

            <?php foreach ($permohonan as $p): ?>
                <?php
                    $status_class = strtolower(str_replace([' ', '_'], '-', $p['status']));
                ?>
                <tr>
                    <td><b><?= esc($p['kode']) ?></b></td>
                    <td><?= esc($p['nama']) ?></td>
                    <td><?= esc($p['jenis_data']) ?></td>
                    <td>
                        <span class="status-pill status-<?= esc($status_class) ?>">
                            <?= esc($p['status']) ?>
                        </span>
                    </td>
                    <td>
                        <a class="detail-link"
                           href="<?= base_url('admin/bidang/permohonan/' . $p['id']) ?>">
                           Detail Permohonan
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>

</div>

</body>
</html>
