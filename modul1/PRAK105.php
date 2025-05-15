<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $samsung = array("pertama"=>"Samsung Galaxy S22", "kedua"=>"Samsung Galaxy S22+", "ketiga"=>"Samsung Galaxy A03", "keempat"=>"Samsung Galaxy Xcover 5");

    ?>
    <table border="black solid">
        <tr>
            <td style="background: red"><h2>Daftar Smartphone Samsung</h2></td>
        </tr>
            <?php 
                echo "<tr><td>". $samsung['pertama'] ."</td></tr>";
                echo "<tr><td>". $samsung['kedua'] ."</td></tr>";
                echo "<tr><td>". $samsung['ketiga'] ."</td></tr>";
                echo "<tr><td>". $samsung['keempat'] ."</td></tr>";
            ?>
    </table>
</body>
</html>