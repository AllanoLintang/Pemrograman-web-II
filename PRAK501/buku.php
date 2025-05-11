<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <?php 
        require_once 'model.php';
        $model = new model($db);

        if(isset($_GET['delete'])){
            $model->deleteBook($_GET['delete']);
            header("Location: buku.php");
            exit();
        }

        $data = $model->getBooks();
    ?>
    <div class="m-3">
    <h1>Data Buku</h1>
    <a href="formbuku.php" class="btn btn-success">Tambah Buku</a>
    <a href="index.html" class="btn btn-primary">Kembali</a>
    </div>
    <br>
    <br>
    <table class="table table-striped">
    <tr><th>ID</th><th>Judul</th><th>Penulis</th><th>Penerbit</th><th>Tahun Terbit</th><th>Aksi</th></tr>
    <?php while($row = $data->fetch(PDO::FETCH_ASSOC)){ ?>
    <tr>
        <td><?= $row['id_buku']; ?></td>
        <td><?= $row['judul_buku']; ?></td>
        <td><?= $row['penulis']; ?></td>
        <td><?= $row['penerbit']; ?></td>
        <td><?= $row['tahun_terbit']; ?></td>
        <td><a href="formbuku.php?id=<?= $row['id_buku']; ?>" class="btn btn-secondary">Edit</a> | 
        <a href="?delete=<?= $row['id_buku']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Delete</a></td>
    </tr>
    <?php }; ?>
    </table>
</body>
</html>