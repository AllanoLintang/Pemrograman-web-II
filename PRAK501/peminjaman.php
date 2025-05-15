<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
<?php
require_once "Model.php";
$model = new Model($db);
$data = $model->getPeminjaman();
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $model->deletePeminjaman($id);
    header("Location: peminjaman.php");
    exit();
}


?>

<div class="m-3">
<h2>Data Peminjaman</h2>
<a href="FormPeminjaman.php" class="btn btn-success">+ Tambah Peminjaman</a>
<a href="index.html" class="btn btn-primary">Kembali</a>

</div>

<table class="table table-striped">
    <tr>
        <th>No</th>
        <th>Nama Member</th>
        <th>Judul Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Aksi</th>
    </tr>
    <?php $no = 1; foreach ($data as $row): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($row['nama_member']) ?></td>
        <td><?= htmlspecialchars($row['judul_buku']) ?></td>
        <td><?= htmlspecialchars($row['tgl_pinjam']) ?></td>
        <td><?= htmlspecialchars($row['tgl_kembali']) ?></td>
        <td><a href="?delete=<?= $row['id_peminjaman']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Delete</a></td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>