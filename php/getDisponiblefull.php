<?php
session_start();
$Ncuenta =$_SESSION['logged_in_user_name'];

$data = file_get_contents("../json/usuarios/".$Ncuenta."/clasesrestantes.json");

    $products = json_decode($data, true);

    foreach ($products as $product) {

            if ($product['requisitos'][0] == "" && $product['requisitos'][1] == "" && $product['requisitos'][2] == "") {

                echo '<tr><th scope="row"><img width="30px" src="media/library-outline.svg" alt=""></th> <td>'; 

                print_r($product['codigo']);

                echo '</td>

                <td>';

                print_r($product['nombre']);

                echo '</td>

                <td>'; 

                print_r($product['uv']);

                echo '</td>

            </tr>';

            }

    }

?>