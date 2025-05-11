<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
   <?php 
        require_once 'model.php';

        $model = new model($db);

        $id = $_GET['id'] ?? null;
        $member = $id ? $model->getMembersById($id) : [
            'nama_member' => '',
            'nomor_member' => '',
            'alamat' => '',
            'tgl_mendaftar' => '',
            'tgl_terakhir_bayar' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama_member'];
            $nomor = $_POST['nomor_member'];
            $alamat = $_POST['alamat'];
            $tgl_daftar = $_POST['tgl_mendaftar'];
            $tgl_terakhir_bayar = $_POST['tgl_terakhir_bayar'];

            if ($id) {
                $model->updateMember($id, $nama, $nomor, $alamat, $tgl_daftar, $tgl_terakhir_bayar);
            } else {
                $model->insertMember($nama, $nomor, $alamat, $tgl_daftar, $tgl_terakhir_bayar);
            }

            header("Location: member.php");
            exit();
        }
   ?> 

   <div class="m-3">
   <h1><?= $id ? 'Edit' : 'Tambah' ?> Member</h1>
    </div>
   <form method="post" class="m-3">
        <label for="nama_member" class="form-label">Nama:</label>
        <input type="text" name="nama_member" id="nama_member" class="form-control" value="<?= htmlspecialchars($member['nama_member']) ?>" required><br>

        <label for="nomor_member" class="form-label">Nomor:</label>
        <input type="text" name="nomor_member" id="nomor_member" class="form-control" value="<?= htmlspecialchars($member['nomor_member']) ?>" required><br>

        <label for="alamat" class="form-label">Alamat:</label>
        <textarea name="alamat" id="alamat" class="form-control" required><?= htmlspecialchars($member['alamat']) ?></textarea><br>

        <label for="tgl_daftar" class="form-label">Tanggal Daftar:</label>
        <input type="date" name="tgl_mendaftar" id="tgl_mendaftar" class="form-control" value="<?= htmlspecialchars($member['tgl_mendaftar']) ?>" required><br>

        <label for="tgl_terakhir_bayar" class="form-label">Tanggal Terakhir Bayar:</label>
        <input type="date" name="tgl_terakhir_bayar" id="tgl_terakhir_bayar" class="form-control" value="<?= htmlspecialchars($member['tgl_terakhir_bayar']) ?>" required><br>

        <button type="submit" class="btn btn-success"><?= $id ? 'Update' : 'Simpan' ?></button>
        <a href="member.php" class="btn btn-secondary">Kembali</a>
   </form>

</body>
</html>