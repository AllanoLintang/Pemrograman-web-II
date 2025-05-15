<?php
$errornama = $errornim = $errorgender = "";
$nama = $nim = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nama"])) {
    $errornama = "nama tidak boleh kosong";
  } else {
    $nama = $_POST["nama"];
  }
  
  if (empty($_POST["nim"])) {
    $errornim = "nim tidak boleh kosong";
  } else {
    $nim = $_POST["nim"];
  }
    

  if (empty($_POST["gender"])) {
    $errorgender = "jenis kelamin tidak boleh kosong";
  } else {
    $gender = $_POST["gender"];
  }
}

?>

<form action="" method="POST">
    Nama: <input type="text" name="nama"><span style="color:red">* <?php echo $errornama ?></span><br>
    NIM: <input type="text" name="nim"><span style="color:red">* <?php echo $errornim ?></span><br>
    Jenis Kelamin<span style="color:red">* <?php echo $errorgender ?></span> <br>
    <input type="radio" name="gender" value="Laki-laki"> Laki-laki <br>
    <input type="radio" name="gender" value="Perempuan"> Perempuan <br>
    <button type="submit" nama="submit">Submit</button>
</form>
<?php 
    echo "<h2>Output:</h2>";
    echo $nama. "<br>";
    echo $nim. "<br>";
    echo $gender. "<br>";
?>