<?php
#obenemos datos
$Ncuenta= $_GET['Ncuenta'];
$Carrera=$_GET['carrera'];
//obetenemos el archivo usuarios para modificarlo
$data = file_get_contents("../json/usuarios.json");
$products = json_decode($data, true);
//cambimos el archivo temporal
$products[$Ncuenta]['Active']='true';
//guardamos el archivo temporal como permantente
$fh = fopen("../json/usuarios.json", 'w') or die("Error al abrir fichero de salida");
fwrite($fh, json_encode($products, JSON_UNESCAPED_UNICODE));
fclose($fh);

//buscamos la carrera del user
$carrerfile = file_get_contents('../json/carreras/'.$Carrera.'.json');
$carrerafile2 =  json_decode($carrerfile, true);

$estructura = '../json/usuarios/'.$Ncuenta;

if(!mkdir($estructura, 0777, true)) {
    die('{"response":"failed","dato":"Error del servidor", "Nombre":"","Ncuenta":"","Carrera":""}');
}

$control = fopen('../json/usuarios/'.$Ncuenta.'/clases.json',"w+");
$control = fopen('../json/usuarios/'.$Ncuenta.'/clasesrestantes.json',"w+");
$control = fopen('../json/usuarios/'.$Ncuenta.'/clasespasadas.json',"w+");
$control = fopen('../json/usuarios/'.$Ncuenta.'/datos.json',"w+");

$fh1 = fopen("../json/usuarios/".$Ncuenta."/clasesrestantes.json", 'w') or die('{"response":"failed","dato":"Error del servidor", "Nombre":"","Ncuenta":"","Carrera":""}');
fwrite($fh1, json_encode($carrerafile2, JSON_UNESCAPED_UNICODE));
fclose($fh1);

$fh1 = fopen("../json/usuarios/".$Ncuenta."/clases.json", 'w') or die('{"response":"failed","dato":"Error del servidor", "Nombre":"","Ncuenta":"","Carrera":""}');
fwrite($fh1, json_encode($carrerafile2, JSON_UNESCAPED_UNICODE));
fclose($fh1);

$datos=array( 
    "ultimoperiodo"=>date("Y")
);

$fh1 = fopen("../json/usuarios/".$Ncuenta."/datos.json", 'w') or die('{"response":"failed","dato":"Error del servidor", "Nombre":"","Ncuenta":"","Carrera":""}');
fwrite($fh1, json_encode($datos, JSON_UNESCAPED_UNICODE));
fclose($fh1);

echo'Usuario Aprobado!';
sleep(3);

echo '<script>history.go(-1)</script>';
