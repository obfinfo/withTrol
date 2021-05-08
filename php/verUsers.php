<?php
$data = file_get_contents("../json/usuarios.json");
$products = json_decode($data, true);
foreach ($products as $product) {
    if ($product['Active']!='true') {
        echo '
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col-12"><h4>'.$product['Nombre'].'</h4></div>
                </div>
                <div class="row">
                    <div class="col-6">'.$product['Ncuenta'].'</div>
                    <div class="col-6">'.$product['Carrera'].'</div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6"><a href="php/aprobarUser.php?Ncuenta='.$product['Ncuenta'].'&carrera='.$product['Carrera'].'"> <button class="btn btn-success">Aprobar</button></a></div>
                    <div class="col-6"> <a href="php/borrarUser.php?Ncuenta='.$product['Ncuenta'].'"> <button class="btn btn-danger">Borrar</button></a></div>
                </div>
            </div>
        </div>
    </div>';   
    }
      
}
?>