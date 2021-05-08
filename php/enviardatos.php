<?php
//"codigo": codigovar,"nombre": nombrevar,"uv": uvvar,"nota": notavar,"periodo": periodovar
session_start();
$Ncuenta =$_SESSION['logged_in_user_name'];
    $codigovar = $_POST['codigo'];
    $nombrevar = $_POST['nombre'];
    $uvvar = $_POST['uv'];
    $notavar = $_POST['nota'];
    $periodovar = $_POST['periodo'];
    $file = file_get_contents('../json/usuarios/'.$Ncuenta.'/clasespasadas.json');
    $filee2 =  json_decode($file, true);
    $index = count($filee2) +1;
    $in= array(
        "cod"=>$codigovar,
        "nombre"=>$nombrevar,
        "nota"=>$notavar,
        "periodo"=>$periodovar,
        "uv"=>$uvvar
    );
    for ($i=0; $i < count($filee2) ; $i++) { 
        if ($filee2[$i]['cod'] == $codigovar) {
            $index=$i;
        }
    }
    $filee2[$index] = $in;
    $fh2 = fopen("../json/usuarios/".$Ncuenta."/clasespasadas.json", 'w') or die("Error al abrir fichero de salida");
    fwrite($fh2, json_encode($filee2,JSON_UNESCAPED_UNICODE));
    fclose($fh2);
    $datos = file_get_contents('../json/usuarios/'.$Ncuenta.'/datos.json');
    $datos3 =  json_decode($datos, true);
    foreach ($datos3 as $datsoarray) {
        if ($datos3['ultimoperiodo'] == $periodovar) {
        }else {
            $datos3['ultimoperiodo'] = $periodovar;
            $fhdatos = fopen("../json/usuarios/".$Ncuenta."/datos.json", 'w') or die("Error al abrir fichero de salida");
            fwrite($fhdatos, json_encode($datos3, JSON_UNESCAPED_UNICODE));
            fclose($fhdatos);
        }
    }
    if ($notavar >= 65) {
        $file3 = file_get_contents('../json/usuarios/'.$Ncuenta.'/clasesrestantes.json');
        $filee4 =  json_decode($file3, true);
        $arreglo = array();
        $i =0;
        foreach ($filee4 as $array) {
            if ($array["requisitos"]["0"] === $codigovar) {
                $array["requisitos"]["0"] = "";
            }
            if ($array["requisitos"]["1"] === $codigovar) {
                $array["requisitos"]["1"] = "";
            }
            if ($array["requisitos"]["2"] === $codigovar) {
                $array["requisitos"]["2"] = "";
            }
            $arreglo[$i] = $array;
            if ($array['codigo'] === $codigovar) {
                unset($arreglo[$i]);
            }
            $i += 1;
        }
        $fh = fopen("../json/usuarios/".$Ncuenta."/clasesrestantes.json", 'w') or die("Error al abrir fichero de salida");
        fwrite($fh, json_encode($arreglo, JSON_UNESCAPED_UNICODE));
        fclose($fh);
    }
   
?>