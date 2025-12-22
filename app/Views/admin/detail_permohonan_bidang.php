<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Permohonan Data - Admin Hidrologi</title>
    <style>
        /* Reset dan Dasar */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fa;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        }

        /* Header */
        h2 {
            color: #004d99; /* Biru korporat */
            border-bottom: 3px solid #004d99;
            padding-bottom: 10px;
            margin-bottom: 25px;
            font-weight: 600;
            font-size: 1.8em;
        }

        h3 {
            color: #333;
            margin-top: 30px;
            border-bottom: 2px solid #eee;
            padding-bottom: 8px;
            font-weight: 500;
            font-size: 1.4em;
        }

        /* Detail Permohonan (Tabel) */
        .detail-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden; /* Penting untuk border radius pada table */
        }

        .detail-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .detail-table td {
            padding: 15px 20px;
            border: none; /* Hilangkan border internal */
            font-size: 0.95em;
        }

        .detail-table td:first-child {
            width: 35%; /* Kolom label lebih sempit */
            font-weight: 600;
            color: #555;
            background-color: #f0f3f6; /* Latar belakang label */
        }

        /* Status Khusus */
        .status-cell b {
            font-size: 1.1em;
            padding: 5px 10px;
            border-radius: 4px;
            display: inline-block;
            color: #ffffff;
            background-color: #007bff; /* Default: Biru */
        }

        /* Status spesifik untuk warna premium */
        .status-cell .status-pending { background-color: #ffc107; color: #333; }
        .status-cell .status-available { background-color: #28a745; }
        .status-cell .status-not-available { background-color: #dc3545; }
        .status-cell .status-clarification { background-color: #fd7e14; }
        .status-cell .status-processing { background-color: #17a2b8; }
        .status-cell .status-done { background-color: #6610f2; }


        /* Form Styling */
        .form-section {
            border: 1px solid #e0e0e0;
            padding: 25px;
            border-radius: 8px;
            background-color: #ffffff;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 0.95em;
        }

        select, textarea, input[type="file"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 1em;
            transition: border-color 0.3s;
        }

        select:focus, textarea:focus {
            border-color: #004d99;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 77, 153, 0.3);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* Button */
        button[type="submit"] {
            background-color: #004d99;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1em;
            font-weight: 600;
            transition: background-color 0.3s, transform 0.1s;
        }

        button[type="submit"]:hover {
            background-color: #003a73;
        }

        button[type="submit"]:active {
            transform: scale(0.99);
        }

        /* Styling input file agar lebih rapi */
        input[type="file"] {
            border: 1px solid #004d99;
            background-color: #e6f0ff;
            cursor: pointer;
            padding: 10px; /* Padding disesuaikan agar tidak terlalu besar */
        }

    </style>
</head>
<body>

<div class="container">

    <h2><span style="color:#004d99;">🔬</span> Detail Permohonan Data Hidrologi</h2>

    <table class="detail-table">
        <tr>
            <td>Nama Pemohon</td>
            <td><?= esc($permohonan['nama']) ?></td>
        </tr>
        <tr>
            <td>Pekerjaan / Kategori</td>
            <td><?= esc($permohonan['pekerjaan']) ?></td>
        </tr>
        <tr>
            <td>Jenis Data Diminta</td>
            <td><?= esc($permohonan['jenis_data']) ?></td>
        </tr>
        <tr>
            <td>Lokasi Data Spesifik</td>
            <td><?= esc($permohonan['lokasi_data']) ?></td>
        </tr>
        <tr>
            <td>Periode Data (Rentang Waktu)</td>
            <td><?= esc($permohonan['periode_data']) ?></td>
        </tr>
        <tr>
            <td>Tujuan Penggunaan Data</td>
            <td><?= esc($permohonan['tujuan']) ?></td>
        </tr>
        <tr class="status-row">
            <td>Status Saat Ini</td>
            <td class="status-cell">
                <?php
                    $status_class = '';
                    switch (esc($permohonan['status'])) {
                        case 'Menunggu Pengecekan Data':
                            $status_class = 'status-pending'; break;
                        case 'Data Tersedia':
                            $status_class = 'status-available'; break;
                        case 'Data Tidak Tersedia':
                            $status_class = 'status-not-available'; break;
                        case 'Perlu Klarifikasi':
                            $status_class = 'status-clarification'; break;
                        case 'Sedang Diproses':
                            $status_class = 'status-processing'; break;
                        case 'Selesai':
                            $status_class = 'status-done'; break;
                        default:
                            $status_class = ''; break;
                    }
                ?>
                <b class="<?= $status_class ?>"><?= esc($permohonan['status']) ?></b>
            </td>
        </tr>
    </table>

    <br>
    
    <h3><span style="color:#004d99;">⚙️</span> Proses & Pembaruan Data Teknis</h3>
    
    <div class="form-section">
        <form action="<?= base_url('admin/bidang/proses/' . $permohonan['id']) ?>" 
              method="post" 
              enctype="multipart/form-data">

            <label for="status-teknis">Pembaruan Status Teknis:</label>
            <select name="status" id="status-teknis" required>
                <optgroup label="Status Awal">
                    <option value="Menunggu Pengecekan Data" 
                            <?= (esc($permohonan['status']) == 'Menunggu Pengecekan Data') ? 'selected' : '' ?>>Menunggu Pengecekan Data</option>
                    <option value="Sedang Diproses"
                            <?= (esc($permohonan['status']) == 'Sedang Diproses') ? 'selected' : '' ?>>Sedang Diproses</option>
                </optgroup>
                <optgroup label="Status Ketersediaan Data">
                    <option value="Data Tersedia"
                            <?= (esc($permohonan['status']) == 'Data Tersedia') ? 'selected' : '' ?>>Data Tersedia</option>
                    <option value="Data Tidak Tersedia"
                            <?= (esc($permohonan['status']) == 'Data Tidak Tersedia') ? 'selected' : '' ?>>Data Tidak Tersedia</option>
                </optgroup>
                <optgroup label="Status Lanjutan">
                    <option value="Perlu Klarifikasi"
                            <?= (esc($permohonan['status']) == 'Perlu Klarifikasi') ? 'selected' : '' ?>>Perlu Klarifikasi (Hubungi Pemohon)</option>
                    <option value="Selesai"
                            <?= (esc($permohonan['status']) == 'Selesai') ? 'selected' : '' ?>>Selesai (Tutup Permohonan)</option>
                </optgroup>
            </select>

            <label for="catatan-admin">Catatan Teknis Admin:</label>
            <textarea name="catatan_admin" id="catatan-admin" rows="4"
                placeholder="Contoh: Data tahun 2019 tidak tersedia karena alat rusak, namun data 2020-2023 tersedia dan dilampirkan."></textarea>

            <label for="file-data">Upload Data (PDF / Excel Maksimal 10MB):</label>
            <input type="file" name="file_data" id="file-data" accept=".pdf, .xls, .xlsx">

            <button type="submit">Simpan & Proses Permohonan <span style="font-size: 1.2em;"></span></button>
        </form>
    </div>

</div>

</body>
</html>