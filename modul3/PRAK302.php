<form method="POST" action="">
    Tinggi: <input type="number" name="tinggi" id="tinggi"><br>
    Alamat Gambar: <input type="text" name="gambar" id="gambar"><br>
    <button type="submit" name="cetak">Cetak</button>
</form>
<?php 
    if(isset($_POST['cetak'])){
        $tinggi = $_POST['tinggi'];
        $gambar = $_POST['gambar'];
        $i = $tinggi;
        $lebar = $tinggi * 50;

        echo "<div style='width: {$lebar}; margin-top: 20px;'>";
        echo '<div style="justify-content: left"><div style="font-size: 0; text-align: right;">';
        while($i >= 1){
            $j = $i;
            while($j >= 1){
                echo "<img src='$gambar' style='height: 50px; width: 50px'>";
                $j--;
            }
            echo "<br>";
            $i--;
        }
        echo '</div></div>';
    }
?>