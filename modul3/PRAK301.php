<form method="POST" actoin="">
    Jumlah Peserta: <input type="number" name="jumlah" id="jumlah"><br>
    <button type="submit" name="cetak">Cetak</button>
</form>
<?php 
    if(isset($_POST['cetak'])){
        $jumlah = $_POST['jumlah'];
        $counter = 1;
        while($counter <= $jumlah){
            if(!($counter%2)){
                echo "<h2 style='color: green;'>Peserta ke-$counter</h2>";
            }else{
                echo "<h2 style='color: red;'>Peserta ke-$counter</h2>";
            }
            $counter++;
        }
    }
?>