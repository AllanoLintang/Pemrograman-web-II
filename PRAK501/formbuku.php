<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <?php 
        require_once 'model.php';

        $model = new model($db);

        $id = $_GET['id'] ?? null;
        $buku = $id ? $model->getBooksById($id) : [
            'judul_buku' => '',
            'penulis' => '',
            'penerbit' => '',
            'tahun_terbit' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $judul = $_POST['judul_buku'];
            $penulis = $_POST['penulis'];
            $penerbit = $_POST['penerbit'];
            $tahun_terbit = $_POST['tahun_terbit'];

            if ($id) {
                $model->updateBook($id, $judul, $penulis, $penerbit, $tahun_terbit);
            } else {
                $model->insertBook($judul, $penulis, $penerbit, $tahun_terbit);
            }

            header("Location: buku.php");
            exit();
        }
    ?>
    <h1><?= $id ? 'Edit' : 'Tambah' ?> Buku</h1>
    <form method="post" class="m-3">
        <label for="judul_buku" class="form-label">Judul:</label>
        <input type="text" name="judul_buku" id="judul_buku" class="form-control" value="<?= htmlspecialchars($buku['judul_buku']) ?>" required><br>

        <label for="penulis" class="form-label">Penulis:</label>
        <input type="text" name="penulis" id="penulis" class="form-control" value="<?= htmlspecialchars($buku['penulis']) ?>" required><br>

        <label for="penerbit" class="form-label">Penerbit:</label>
        <input type="text" name="penerbit" id="penerbit" class="form-control" value="<?= htmlspecialchars($buku['penerbit']) ?>" required><br>

        <label for="tahun_terbit" class="form-label">Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control" value="<?= htmlspecialchars($buku['tahun_terbit']) ?>" required><br>

        <button type="submit" class="btn btn-success"><?= $id ? 'Update' : 'Simpan' ?></button>
        <a href="buku.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>