<?php 
    $errors = session()->get('errors') ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid my-3">
    <h2>Edit Buku</h2>
    <form action="<?= base_url('buku/update/'.$buku['id'])?>" method="POST" class="form">
        <?= csrf_field() ?>
        <div class="container-fluid m-3">
        <label for="judul" class="form-label ">Judul Buku</label>
        <input type="text" class="form-control <?= isset($errors['judul']) ? 'is-invalid' : '' ?>" id="judul" name="judul" value="<?= $buku['judul'] ?>">
        <?php if(isset($errors['judul'])): ?>
        <div class="invalid-feedback">
            <?= $errors['judul'] ?>
        </div>
        <?php endif; ?>
        <label for="penulis" class="form-label">Penulis Buku</label>
        <input type="text" class="form-control <?= isset($errors['penulis']) ? 'is-invalid' : '' ?>" id="penulis" name="penulis" value="<?= $buku['penulis'] ?>">
        <?php if(isset($errors['penulis'])): ?>
        <div class="invalid-feedback">
            <?= $errors['penulis'] ?>
        </div>
        <?php endif; ?>

        <label for="penerbit" class="form-label ">Penerbit Buku</label>
        <input type="text" class="form-control <?= isset($errors['penerbit']) ? 'is-invalid' : '' ?>" id="penerbit" name="penerbit" value="<?= $buku['penerbit'] ?>">
        <?php if(isset($errors['penerbit'])): ?>
        <div class="invalid-feedback">
            <?= $errors['penerbit'] ?>
        </div>
        <?php endif; ?>

        <label for="tahun_terbit" class="form-label">Tahun Terbit Buku</label>
        <input type="number" class="form-control <?= isset($errors['tahun_terbit']) ? 'is-invalid' : '' ?>" id="tahun_terbit" name="tahun_terbit" value="<?= $buku['tahun_terbit'] ?>">
        <?php if(isset($errors['tahun_terbit'])): ?>
        <div class="invalid-feedback">
            <?= $errors['tahun_terbit'] ?>
        </div>
        <?php endif; ?>

        </div>  
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= site_url('/') ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>