<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div class="container mx-auto mx-5 px-5">
        <div class="container mx-auto p-5">
            <h1 class="text-center">Profil</h1>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?= base_url("images/". $foto) ?>" alt="" width="300">
                </div>
                <div class="col-md-8">
                    <b>Nama:</b> <p><?= $nama ?></p>
                    <b>Nim:</b> <p><?= $nim ?></p>
                    <b>Prodi:</b> <p><?= $prodi ?></p>
                    <b>Hobi:</b> <p><?= $hobi ?></p>
                    <b>Skill:</b> <p><?= $skill ?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>