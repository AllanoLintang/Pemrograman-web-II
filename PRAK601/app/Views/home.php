<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div class="container m-5 d-block justify-content-center text-center">
        <h1>Beranda</h1>
        <img src="<?= base_url("images/". $foto) ?>" alt="" width="200">
        <h2><?= $nama ?></h2>
        <h3><?= $nim ?></h3>
        <a href="<?= site_url('/profil') ?>" class="btn btn-dark">Profil Lengkap</a>
    </div>
</body>
</html>