<form action="" method="post">
    <input type="text" name="nama"> <input type="submit" name="submit" value="Submit"> 
</form>
<?php 
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        echo "<h3>Input:</h3>$nama";
        $panjang = strlen($nama);
        $huruf = str_split($nama);
        echo "<h3>Output:</h3>";
        for($i=0; $i < $panjang; $i++){
            for($j = 0; $j < $panjang; $j++){
                if($j == 0){
                    echo strtoupper($huruf[$i]);
                }else{
                    echo strtolower($huruf[$i]);
                }
            }
        }
    }
?>