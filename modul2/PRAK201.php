<form action="" method="post">
    <label for="nama1">Nama 1:</label>
    <input type="text" name="nama1" id="nama1"><br>
    <label for="nama2">Nama 2:</label>
    <input type="text" name="nama2" id="nama2"><br>
    <label for="nama3">Nama 3:</label>
    <input type="text" name="nama3" id="nama3"><br>
    <button type="submit" name="urut">Urutkan</button>
</form>
<?php 


    if(isset($_POST['urut'])){
        $nama1 = $_POST['nama1'];
        $nama2 = $_POST['nama2'];
        $nama3 = $_POST['nama3'];
        $nama = array($nama1, $nama2, $nama3);
        for($i=0; $i < count($nama); $i++) {
            for($j=$i+1; $j < count($nama); $j++) {
                if($nama[$i] > $nama[$j]) {
                    $temp = $nama[$i];
                    $nama[$i] = $nama[$j];
                    $nama[$j] = $temp;
                }
            }
        }
        foreach($nama as $n) {
            echo "$n<br>";
        }
    }
?>