<form method="POST" action="">
    Jumlah Bintang: <input type="number" name="jumlah" id="jumlah" value=""><br>
    <button type="submit" name="submit">Submit</button>
</form>
<?php 
    $jumlah = 0;
    if(isset($_POST['submit']) || isset($_POST['tambah']) || isset($_POST['kurang'])){
        $jumlah = isset($_POST['jumlah']) ? (int)$_POST['jumlah'] : 0;
        if (isset($_POST['tambah'])) {
            $jumlah++;
        } elseif (isset($_POST['kurang']) && $jumlah > 0) {
            $jumlah--;
        }

        echo "Jumlah Bintang : $jumlah<br>";
        for($j = 0; $j < $jumlah; $j++){
            echo "<img src='star.png' style='height: 50px; width: 50px'>";
        }
        
    }
    if(isset($_POST['submit']) || isset($_POST['tambah']) || isset($_POST['kurang'])) {
        echo '<form method="post">
            <input type="hidden" name="jumlah" value="'.$jumlah.'">
            <button type="submit" name="tambah">Tambah</button>
            <button type="submit" name="kurang">Kurang</button>
        </form>';
    }
?>