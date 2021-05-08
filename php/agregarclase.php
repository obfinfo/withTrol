<?php
session_start();
$Ncuenta =$_SESSION['logged_in_user_name'];
$cod=$_POST['cod'];
$name=$_POST['name'];
$uv=$_POST['uv'];
$r1=$_POST['r1'];
$r2=$_POST['r2'];
$r3=$_POST['r3'];

$file = file_get_contents("../json/clases.json");
$b = json_decode($file, true);
$index= count($b)+1;
$contador=0;


foreach ($b as $product) {
    if ($product['codigo'] === $cod) {
        $contador +=1;
    } 
}

if ($contador == 0) {
    $in= array(
        "codigo"=>$cod,
        "nombre"=>$name,
        "uv"=>$uv,
        "requisitos"=>array(
            "0"=>$r1,
            "1"=>$r2,
            "2"=>$r3));

    $b[$index] =$in;
    $fh = fopen("../json/clases.json", 'w') or die("Error al abrir fichero de salida");
    fwrite($fh, json_encode($b,JSON_UNESCAPED_UNICODE));
    fclose($fh);

    $cr = file_get_contents("../json/clasesrestantes.json");
    $fcr = json_decode($cr, true);
    $inr= count($fcr)+1;
    echo'index:'.$inr;
$acr= array(
    "codigo"=>$cod,
    "nombre"=>$name,
    "uv"=>$uv,
    "requisitos"=>array(
        "0"=>$r1,
        "1"=>$r2,
        "2"=>$r3));

$fcr[$inr] =$acr;

    $focr = fopen("../json/clasesrestantes.json", 'w') or die("Error al abrir fichero de salida");
    fwrite($focr, json_encode($fcr,JSON_UNESCAPED_UNICODE));
    fclose($focr);



}


echo  '
<center>
<div class="center">
    <img src="../check.png" width="50%" alt="">
    <h3 style="color: chartreuse;">Clase Registrada!</h3>
</div>
</center>
';
