<a href="<?= site_url('admin/tambah') ?>">Tambah Jadwal</a>
<table border="1">
<tr><th>Judul</th><th>Tanggal</th><th>Jam</th><th>Studio</th></tr>
<?php foreach ($jadwal as $j): ?>
<tr>
    <td><?= $j->judul ?></td>
    <td><?= $j->tanggal_tayang ?></td>
    <td><?= $j->jam ?></td>
    <td><?= $j->studio ?></td>
</tr>
<?php endforeach; ?>
</table>
