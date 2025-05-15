<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 2px}
    </style>
</head>
<body>
<form action="" method="POST">
    Panjang : <input type="number" name="row"><br>
    Lebar : <input type="number" name="col"><br>
    Nilai : <input type="text" name="nilai"><br>
    <input type="submit" name="submit" value="Cetak"><br>
</form>
<?php
    if(isset($_POST['submit'])){
        $row = $_POST['row'];
        $col = $_POST['col'];
        $nilaiArray = explode(" ", $_POST['nilai']);

        echo "<table>";
        if(count($nilaiArray) != $row * $col){
            echo "Panjang nilai tidak sesuai dengan ukuran matriks";
        } else {
            for($i = 0; $i < $row; $i++){
                echo "<tr>";
                for($j = 0; $j < $col; $j++){
                    $index = $i * $col + $j;
                    echo "<td>" . htmlspecialchars($nilaiArray[$index]) . "</td>";
                }
                echo "</tr>";
            }
        }
        echo "</table>";

    }
?>
</body>
</html>