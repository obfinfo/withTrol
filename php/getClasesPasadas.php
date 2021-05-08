<?php
session_start();
$Ncuenta =$_SESSION['logged_in_user_name'];
$file = file_get_contents("../json/usuarios/".$Ncuenta."/clasespasadas.json");
$b = json_decode($file, true);
$clasespasadas= count($b);
$file = file_get_contents("../json/usuarios/".$Ncuenta."/clases.json");
$b = json_decode($file, true);
$clases= count($b);
  $faltan = $clasespasadas - $clasespasadas;
  $img = '<img class="progressimg" width="100%" src="https://quickchart.io/chart?c=%7B%0A%20%20%22type%22%3A%20%22doughnut%22%2C%0A%20%20%22data%22%3A%20%7B%0A%20%20%20%20%22datasets%22%3A%20%5B%7B%0A%20%20%20%20%20%20%22label%22%3A%20%22%22%2C%0A%20%20%20%20%20%20%22data%22%3A%20%5B'. $clasespasadas .'%2C%20'. $faltan .'%5D%2C%0A%20%20%20%20%20%20%22backgroundColor%22%3A%20%5B%0A%20%20%20%20%20%20%20%20%22%23fff%22%2C%0A%20%20%20%20%20%20%20%20%22rgba(0%2C%200%2C%200%2C%200.1)%22%0A%20%20%20%20%20%20%5D%2C%0A%20%20%20%20%20%20%22textcolor%22%3A%5B%22%23000555%22%2C%22%23555555%22%5D%2C%0A%20%20%20%20%20%20%22borderWidth%22%3A%200%2C%0A%20%20%20%20%7D%5D%20%0A%20%20%7D%2C%0A%20%20%22options%22%3A%20%7B%0A%20%20%20%20%22rotation%22%3A%20Math.PI%2C%0A%20%20%20%20%22circumference%22%3A%20Math.PI%2C%0A%20%20%20%20%22cutoutPercentage%22%3A%2075%2C%0A%20%20%20%20%22plugins%22%3A%20%7B%0A%20%20%20%20%20%20%22datalabels%22%3A%20%7B%20%22display%22%3A%20false%20%7D%2C%0A%20%20%20%20%20%20%22doughnutlabel%22%3A%20%7B%0A%20%20%20%20%20%20%20%20%22labels%22%3A%20%5B%0A%20%20%20%20%20%20%20%20%20%20%7B%0A%20%20%20%20%20%20%20%20%20%20%20%20%22text%22%3A%20%22%5Cn'. $clasespasadas .'/54%22%2C%0A%20%20%20%20%20%20%20%20%20%20%20%20%22color%22%3A%20%22%23fff%22%2C%0A%20%20%20%20%20%20%20%20%20%20%20%20%22font%22%3A%20%7B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%22size%22%3A%20%2280%22%0A%20%20%20%20%20%20%20%20%20%20%20%20%7D%2C%0A%20%20%20%20%20%20%20%20%20%20%0A%20%20%20%20%20%20%20%20%20%20%7D%2C%0A%20%20%20%20%20%20%20%20%5D%0A%20%20%20%20%20%20%7D%0A%20%20%20%20%7D%09%09%0A%20%20%7D%0A%7D" alt="">';
  echo $img;
?>