<?php
$query = $_POST['date'];
session_start();
$Ncuenta =$_SESSION['logged_in_user_name'];
    $data = file_get_contents("../json/usuarios/".$Ncuenta."/clasespasadas.json");
$a = json_decode($data, true);
$products = array_reverse($a);
$contador = 0;
if ($query === "") {
    foreach ($products as $product) {
                echo '<tr><th scope="row"><img width="30px" src="media/library-outline.svg" alt=""></th> <td>'; 
                print_r($product['cod']);
                echo '</td>
                <td>';
                print_r($product['nota']);
                echo '</td>
                <td>'; 
                print_r($product['periodo']);
                echo '</td>
            </tr>';
            $contador += 1;
    }
}else {
    foreach ($products as $product) {
        if ($product['periodo'] == $query) {
            echo '<tr><th scope="row"><img width="30px" src="media/library-outline.svg" alt=""></th> <td>'; 
            print_r($product['cod']);
            echo '</td>
            <td>';
            print_r($product['nota']);
            echo '</td>
            <td>'; 
            print_r($product['periodo']);
            echo '</td>
        </tr>';
        $contador += 1;
        }}}
if ($contador == 0) {
    echo 'Sin Resultados';
}
?>