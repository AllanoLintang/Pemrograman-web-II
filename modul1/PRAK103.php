<?php 
    $celcius = 37.841;
     
    echo "Fahrenheit(F) = ". number_format($celcius * 9/5 + 32, 4) ."<br>";
    echo "Reamur(R) = ". number_format($celcius * 4/5, 4)."<br>";
    echo "Kelvin(K) = ". number_format($celcius + 273.15, 4) ."<br>"; 
?>