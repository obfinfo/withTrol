<?php

$file = file_get_contents('../json/usuarios.json');
$filee2 =  json_decode($file, true);
$response="";

$nombre = $_POST['Nombre'];
$Ncuenta = $_POST['Ncuenta'];
$Carrera = $_POST['Carrera'];
$dato = $_POST['Dato'];



$confi =0;
foreach ($filee2 as $array) { 
    if ($array['Ncuenta'] == $Ncuenta) {
     $response = '{"response":"failed","dato":"Ya existe este usuario", "Nombre":"","Ncuenta":"","Carrera":""}';  
     echo $response;
     die; 
     $confi ++;
    }
}

if ($confi ===0) {
    $index = count($filee2) +1;
    
$in= array( 
    "Nombre"=>$nombre,
    "Ncuenta"=>$Ncuenta,
    "Carrera"=>$Carrera,
    "Active"=>"false"
);
$filee2[$Ncuenta] = $in;

    $fh = fopen("../json/usuarios.json", 'w') or die('{"response":"failed","dato":"Error del servidor", "Nombre":"","Ncuenta":"","Carrera":""}');
    fwrite($fh, json_encode($filee2, JSON_UNESCAPED_UNICODE));
    fclose($fh);

    echo '{"response":"success","dato":"", "Nombre":"'.$nombre.'","Ncuenta":"'.$Ncuenta.'","Carrera":"'.$Carrera.'"}';
}
