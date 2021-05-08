<?php
session_start();
$Ncuenta =$_SESSION['logged_in_user_name'];
$data = file_get_contents("../json/usuarios/".$Ncuenta."/clases.json");

$products = json_decode($data, true);



foreach ($products as $product) {

        print_r($product['codigo']);

        print_r($product['nombre']);

        print_r($product['uv']);

    

}