<?php
$Ncuenta ='20201001034';
$periodovar ="I 2020";
$datos = file_get_contents('../json/usuarios/'.$Ncuenta.'/datos.json');
    $datos3 =  json_decode($datos, true);
    $indess=0;
    foreach ($datos3 as $datsoarray) {
        if ($datos3['ultimoperiodo'] == $periodovar) {
            echo'Periodo no cambiado';
        }else {
            $datos3['ultimoperiodo'] = $periodovar;
            $fhdatos = fopen("../json/usuarios/".$Ncuenta."/datos.json", 'w') or die("Error al abrir fichero de salida");
            fwrite($fhdatos, json_encode($datos3, JSON_UNESCAPED_UNICODE));
            fclose($fhdatos);
            echo'Periodo cambiado';
        }
        $indess++;
    }