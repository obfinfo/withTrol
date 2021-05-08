<?php
$id=$_GET['name'];
$index=$_GET['index'];

$file = file_get_contents("../json/carreras/".$id.".json");
$b = json_decode($file, true);
$in= array(
    "codigo"=>"",
    "nombre"=>"Clase vacia",
    "uv"=>"",
    "requisitos"=>array(
        "0"=>"",
        "1"=>"",
        "2"=>""));

$b[$index] =$in;
$fh = fopen("../json/carreras/".$id.".json", 'w') or die("Error al abrir fichero de salida");
fwrite($fh, json_encode($b,JSON_UNESCAPED_UNICODE));
fclose($fh);
