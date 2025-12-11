<h2>Dashboard Admin Bidang (<?= session()->get('bidang') ?>)</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Nama</th>
        <th>Jenis Data</th>
        <th>Status</th>
    </tr>

    <?php foreach ($permohonan as $p) : ?>
        <tr>
            <td><?= $p['nama'] ?></td>
            <td><?= $p['jenis_data'] ?></td>
            <td><?= $p['status'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<br>
<a href="/admin/logout">Logout</a>
