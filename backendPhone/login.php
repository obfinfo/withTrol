<?php
$file = file_get_contents('../json/usuarios.json');
$filee2 =  json_decode($file, true);
$response="";
$Ncuenta = $_POST['Ncuenta'];

$confi =0;
foreach ($filee2 as $array) { 
    if ($array["Ncuenta"] === $Ncuenta) {
        $confi ++;
        echo '{"response":"success","dato":"", "Nombre":"'.$filee2[$Ncuenta]['Nombre'].'","Ncuenta":"'.$filee2[$Ncuenta]['Ncuenta'].'","Carrera":"'.$filee2[$Ncuenta]['Carrera'].'"}';
        
    }
}

if ($confi ===0) {
    $response = '{"response":"failed","Nombre":"","Ncuenta":"","Carrera":""}';  
    echo $response;
    die; 
    $confi ++;
   
}

