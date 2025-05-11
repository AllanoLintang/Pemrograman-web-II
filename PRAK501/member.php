<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
<?php 
    require_once 'model.php';
    $model = new model($db);

    if(isset($_GET['delete'])){
        $model->deleteMember($_GET['delete']);
        header("Location: member.php");
        exit();
    }

    $data = $model->getMembers();
?>

<div class="m-3">
<h1>Data Member</h1>
<a href="formmember.php" class="btn btn-success">Tambah Member</a>
<a href="index.html" class="btn btn-primary">Kembali</a>

</div>
<table class="table table-striped">
<tr><th>ID</th><th>Nama</th><th>Nomor</th><th>Alamat</th><th>Tanggal Daftar</th><th>Tanggal Terakhir Bayar</th><th>Aksi</th></tr>
<?php while($row = $data->fetch(PDO::FETCH_ASSOC)){ ?>
<tr>
    <td><?= $row['id_member']; ?></td>
    <td><?= $row['nama_member']; ?></td>
    <td><?= $row['nomor_member']; ?></td>
    <td><?= $row['alamat']; ?></td>
    <td><?= $row['tgl_mendaftar']; ?></td>
    <td><?= $row['tgl_terakhir_bayar']; ?></td>
    <td><a href="formmember.php?id=<?= $row['id_member']; ?>" class="btn btn-primary">Edit</a> | 
    <a href="?delete=<?= $row['id_member']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Delete</a></td>
</tr>
<?php }; ?>    
</table>

</body>
</html>