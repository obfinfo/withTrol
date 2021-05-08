<?php
$data = file_get_contents("../json/carreras.json");
$products = json_decode($data, true);
$cont=0;
foreach ($products as $product) {
  echo '<a href="php/editarCarrera.php?name='.$products[$cont].'">
    <div class="card  border-primary">
      <h4>'.$products[$cont].'</h4>
    </div>
  </a>';         
  $cont++;
}
?>