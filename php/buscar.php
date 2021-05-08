<?php
    session_start();
    $Ncuenta =$_SESSION['logged_in_user_name'];
    $parametro = $_POST['parametro'];
    if ($parametro === '') {
        $parametro = "sin resultaados";
        echo 'busqueda vacia';
    }
    $file = file_get_contents("../json/usuarios/".$Ncuenta."/clasesrestantes.json");
    $b = json_decode($file, true);
    foreach ($b as $array) {
        if (strpos($array['codigo'], $parametro) !== false || strpos($array['nombre'], $parametro) !== false) {
            $datos ="'".$array["codigo"]."', '".$array["nombre"]."', '".$array["uv"]."'";
        echo '<tr onclick="confirmarresultado('.$datos.')">
            <td>'. $array["codigo"] .'</td>
            <td>'. $array["nombre"] .'</td>
            <td>'. $array["uv"] .'</td>
        </tr>';
        }else {
        }    
    }
?>