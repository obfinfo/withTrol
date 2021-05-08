<?php
session_start();
$Ncuenta =$_SESSION['logged_in_user_name'];
$data = file_get_contents("../json/usuarios/".$Ncuenta."/datos.json");
 $a = json_decode($data, true);
 $periodo =$a['ultimoperiodo'];
$sumaclasesmulti=0;
 $notaclasetemp=0;
 $sumauv=0;
 $file = file_get_contents("../json/usuarios/".$Ncuenta."/clasespasadas.json");
 $b = json_decode($file, true);
 foreach ($b as $product) {
   if ($product['periodo'] == $periodo) {
    $notaclasetemp = $product['nota'] * $product['uv'];
    $sumaclasesmulti += $notaclasetemp;
    $sumauv += $product['uv'];
   }
    }
    if ($sumauv == 0) {
      echo "<h1>0%</h1>";
    } else {
    $calcul = $sumaclasesmulti / $sumauv;
    $promedio = "<p>Promedio <br>".$periodo."</p><h1>". (int)$calcul."%</h1>";
    echo $promedio;
    }

?> 