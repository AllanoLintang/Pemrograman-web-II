<form action="" method="POST">
    Nilai: <input type="number" name="angka" id=""><br>
    Dari: <br>
    <input type="radio" name="dari" value="celcius">Celcius <br>
    <input type="radio" name="dari" value="fahrenheit">Fahrenheit <br>
    <input type="radio" name="dari" value="rheamur">Rheamur <br>
    <input type="radio" name="dari" value="kelvin">Kelvin <br>
    Ke: <br>
    <input type="radio" name="ke" value="celcius">Celcius <br>
    <input type="radio" name="ke" value="fahrenheit">Fahrenheit <br>
    <input type="radio" name="ke" value="rheamur">Rheamur <br>
    <input type="radio" name="ke" value="kelvin">Kelvin <br>
    <button type="submit" name="submit">Konversi</button>
</form>

<?php 
    $hasil = $satuan = "";

    if(isset($_POST['submit'])){
        $angka = $_POST['angka'];
        $dari = $_POST['dari'];
        $ke = $_POST['ke'];
        if($dari == "celcius"){
            if($ke == "fahrenheit"){
                $hasil = ($angka * 9/5) + 32;
                $satuan = "°F";
            }
            elseif($ke == "rheamur"){
                $hasil = $angka * 4/5;
                $satuan = "°R";
            }
            elseif($ke == "kelvin"){
                $hasil = $angka + 273.15;
                $satuan = "°K";
            }
        }
        elseif($dari == "fahrenheit"){
            if($ke == "celcius"){
                $hasil = ($angka - 32) * 5/9;
                $satuan = "°C";
            }
            elseif($ke == "rheamur"){
                $hasil = ($angka - 32) * 4/9;
                $satuan = "°R";
            }
            elseif($ke == "kelvin"){
                $hasil = ($angka - 32) * 5/9 + 273.15;
                $satuan = "°K";
            }
        }
        elseif($dari == "rheamur"){
            if($ke == "celcius"){
                $hasil = $angka * 5/4;
                $satuan = "°C";
            }
            elseif($ke == "fahrenheit"){
                $hasil = ($angka * 9/4) + 32;
                $satuan = "°F";
            }
            elseif($ke == "kelvin"){
                $hasil = ($angka * 5/4) + 273.15;
                $satuan = "°K";
            }
        }
        elseif($dari == "kelvin"){
            if($ke == "celcius"){
                $hasil = $angka - 273.15;
                $satuan = "°C";
            }
            elseif($ke == "fahrenheit"){
                $hasil = ($angka - 273.15) * 9/5 + 32;
                $satuan = "°F";
            }
            elseif($ke == "rheamur"){
                $hasil = ($angka - 273.15) * 4/5;
                $satuan = "°R";
            }
        }
    }
    echo "<h2>Hasil: $hasil $satuan</h2>";
?>