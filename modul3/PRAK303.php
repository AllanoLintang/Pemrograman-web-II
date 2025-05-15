<form method="POST" action=""">
    Batas Bawah: <input type="number" name="batas_bawah" id="batas_bawah"><br>
    Batas Atas: <input type="number" name="batas_atas" id="batas_atas"><br>
    <button type="submit" name="cetak">Cetak</button>
</form>
<?php 
    if(isset($_POST['cetak'])){
        $batas_bawah = $_POST['batas_bawah'];
        $batas_atas = $_POST['batas_atas'];
        $i = $batas_bawah;
        do{
            if(($i + 7) % 5){
                echo $i;
            }else{
                echo "<img src='star.png' style='height: 25px; width: 25px'>";
            }
            echo " ";
            $i++;
        }while($i <= $batas_atas);
    }
?>