<?php

$Ncuenta = $_GET['ncuenta'];

$file = file_get_contents('../json/usuarios.json');
$filee2 =  json_decode($file, true);

$confi =0;
foreach ($filee2 as $array) { 
    if ($array["Ncuenta"] === $Ncuenta) {
        if ($array["Active"] === "true") {
            $confi ++;

            echo 'true';
        } else {
            echo'false';
        }

        
    }
}

if ($confi ===0) {
    echo "false";
    die; 
}

