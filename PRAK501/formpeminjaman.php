<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <?php 
        require_once 'model.php';
        $model = new model($db);

        if (isset($_POST['submit'])) {
            $tanggal_pinjam = $_POST['tanggal_pinjam'];
            $tanggal_kembali = $_POST['tanggal_kembali'];
            $id_member = $_POST['id_member'];
            $id_buku = $_POST['id_buku'];
        
            $model->insertPeminjaman($tanggal_pinjam, $tanggal_kembali, $id_member, $id_buku);
        }
    ?>
    <h2 class="m-3">Form Tambah Peminjaman</h2>
<form method="POST" class="m-3">
    <label class="form-label">Nama Member:</label><br>
    <select name="id_member" class="form-control" required>
        <option value="">-- Pilih Member --</option>
        <?php
        foreach ($model->getMembers() as $member) {
            echo "<option value='{$member['id_member']}'>{$member['nama_member']}</option>";
        }
        ?>
    </select><br><br>
    
    <label class="form-label">Judul Buku:</label><br>
    <select name="id_buku" class="form-control" required>
        <option value="">-- Pilih Buku --</option>
        <?php
        foreach ($model->getBooks() as $buku) {
            echo "<option value='{$buku['id_buku']}'>{$buku['judul_buku']}</option>";
        }
        ?>
    </select><br><br>

    <label class="form-label">Tanggal Pinjam:</label><br>
    <input type="date" name="tanggal_pinjam" class="form-control" required><br><br>

    <label class="form-label">Tanggal Kembali:</label><br>
    <input type="date" name="tanggal_kembali" class="form-control" required><br><br>

    <input type="submit" name="submit" class="btn btn-success" value="Simpan">
    <a href="peminjaman.php" class="btn btn-secondary">Kembali</a>
</form>

</body>
</html>