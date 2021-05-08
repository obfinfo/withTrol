<?php
$id=$_GET['name'];
$class=$_GET['index'];?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        a[href="https://www.000webhost.com/?utm_source=000webhostapp&utm_campaign=000_logo&utm_medium=website&utm_content=footer_img"] {
    display: none;
}
    </style>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<style>.card{
 margin: 10px;
 padding: 10px; 
}
a{
  text-decoration: none;
  color: black;
}input{
  width: 100%;
}
</style>
    <title>Hello, world!</title>
  </head>
  <body> 
      <div class="container-fluid LM">
        <div class="row">
          <div class="col-12" style="background-color:#3350c8;color:white; padding:50px;">
            <h4><?php echo $id; ?></h4>
            <br>
            <h6>Clases:</h6>
          </div>
        </div>
          <?php
      $data = file_get_contents("../json/carreras/".$id.".json");
    $products = json_decode($data, true);
    $cont=0;
            echo'<form action="guardar.php?carrera='.$id.'&id='.$class.'" method="post">
            <div class="container">
              <div class="card ">
                <div class="row">
                  <div class="col-12">
                  <label for="">Codigo</label>
                  <input type="text" name="cod" value="';
                  print_r($products[$class]['codigo']);echo '" id=""></div>
                  <div class="col-12">
                  <label for="">Nombre</label>
                  <input type="text" name="name" value="';
                  print_r($products[$class]['nombre']);
             echo'" id=""></div>
                  <div class="col-12">
                  <label for="">UV</label>
                  <input type="text" name="uv" value="';
                  print_r($products[$class]['uv']);
             echo '" id=""></div>
                  <div class="col-12">
                  <label for="">Requisito #1</label>
                  <input type="text" name="req1" value="';
                  print_r($products[$class]['requisitos'][0]);
             echo '" id=""></div>
                  <div class="col-12">
                  <label for="">Requisito #2</label><input type="text" name="req2" value="';

                  print_r($products[$class]['requisitos'][1]);
             echo '" id=""></div>
                  <div class="col-12">
                  <label for="">Requisito #3</label>
                  <input type="text" name="req3" value="';
                  print_r($products[$class]['requisitos'][2]);
             echo '" id=""></div>
                </div>
              </div>
    
              
            </div>
        ';   
        $cont++;    
        echo' <button  class="btn btn-success" type="submit">Guardar</button></form>';
?>
      </div><!--contenedor-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <script src="jquery-3.5.1.js"></script>

  </body>
</html>
