<?php
    $conn = mysqli_connect("sql104.epizy.com", "epiz_32471853", "4oNL7Jh1A7lFCe");
        mysqli_select_db($conn,"epiz_32471853_RadioNoise");

    //$dsn = 'mysql:host=localhost;port=3306;dbname=radio_noise;';
    //$usuario = 'root';
    //$senha = ''; 

    $dsn = 'mysql:host=sql104.epizy.com;port=3306;dbname=epiz_32471853_RadioNoise;';
    $usuario = 'epiz_32471853';
    $senha = '4oNL7Jh1A7lFCe';
?>