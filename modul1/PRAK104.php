<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $samsung = array("Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung Galaxy A03", "Samsung Galaxy Xcover 5");

    ?>
    <table border="black solid">
        <tr>
            <td><b>Daftar Smartphone Samsung</b></td>
        </tr>
            <?php 
            foreach ($samsung as $key => $value){
                echo "<tr><td>". $value ."</td></tr>";
            }
            ?>
    </table>
</body>
</html>