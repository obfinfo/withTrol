<?php
$Ncuenta= $_GET['Ncuenta'];
$data = file_get_contents("../json/usuarios.json");
$products = json_decode($data, true);
unset($products[$Ncuenta]);

$fh = fopen("../json/usuarios.json", 'w') or die("Error al abrir fichero de salida");
fwrite($fh, json_encode($products, JSON_UNESCAPED_UNICODE));
fclose($fh);
echo'Usuario Eliminado!';
sleep(3);

echo '<script>history.go(-1)</script>';
