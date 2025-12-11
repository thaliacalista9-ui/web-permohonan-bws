<h2>Dashboard Admin Utama</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Nama</th>
        <th>Jenis Data</th>
        <th>Status</th>
        <th>Assign ke</th>
    </tr>

    <?php foreach ($permohonan as $p) : ?>
        <tr>
            <td><?= $p['nama'] ?></td>
            <td><?= $p['jenis_data'] ?></td>
            <td><?= $p['status'] ?></td>

            <td>
                <form method="post" action="/admin/assign/<?= $p['id'] ?>">
                    <select name="assigned_to">
                        <?php foreach ($admins as $a) : ?>
                            <option value="<?= $a['id'] ?>"><?= $a['bidang'] ?></option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit">Assign</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<br>
<a href="/admin/logout">Logout</a>
