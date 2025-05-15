<form action="" method="POST">
    Nilai: <input type="number" name="angka" id=""><br>
    <button type="submit" name="submit">Konversi</button>
</form>

<?php
    $hasil = "";
    if(isset($_POST['submit'])){
        $angka = $_POST['angka'];
        if($angka < 0){
            $hasil = "dibawah nol";
        }
        elseif($angka == 0){
            $hasil = "nol";
        }
        elseif($angka > 0 && $angka < 10){
            $hasil = "satuan";
        }
        elseif($angka > 10 && $angka < 20){
            $hasil = "belasan";
        }
        elseif($angka == 10 || $angka >= 20 && $angka < 100){
            $hasil = "puluhan";
        }
        elseif($angka >= 100 && $angka < 1000){
            $hasil = "ratusan";
        }
        elseif($angka >= 1000){
            $hasil = "Anda Menginput Melebihi Limit Bilangan";
        }
    }
    echo "<h2>Hasil: $hasil</h2>";
?>