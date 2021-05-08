<?php

$id=$_GET['carrera'];
$class=$_GET['id'];
$cod=$_POST['cod'];
$name=$_POST['name'];
$uv=$_POST['uv'];
$req1=$_POST['req1'];
$req2=$_POST['req2'];
$req3=$_POST['req3'];

$file = file_get_contents("../json/carreras/".$id.".json");
$b = json_decode($file, true);
$in= array(
    "codigo"=>$cod,
    "nombre"=>$name,
    "uv"=>$uv,
    "requisitos"=>array(
        "0"=>$req1,
        "1"=>$req2,
        "2"=>$req3));

$b[$class] =$in;
$fh = fopen("../json/carreras/".$id.".json", 'w') or die("Error al abrir fichero de salida");
fwrite($fh, json_encode($b,JSON_UNESCAPED_UNICODE));
fclose($fh);

header('Location: editarCarrera.php?name='.$id);