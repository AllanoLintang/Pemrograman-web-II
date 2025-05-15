<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <style>.nav-link{
        color: #f0f0f0 !important;
    }</style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg bg-dark">
    <div class="container d-flex justify-content-center">
        <div class="navbar-nav">
            <a href="<?= site_url('/') ?>" class="nav-link mx-2">Home</a>
            <a href="<?= site_url('/profil') ?>" class="nav-link mx-2">Profil</a>
        </div>
        </div>
    </nav>
</body>
</html>