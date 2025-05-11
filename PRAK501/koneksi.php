<?php 

    try{
        $db = new PDO('mysql:host=localhost;dbname=perpustakaan', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Koneksi gagal: " . $e->getMessage();
        die();
    }
?>