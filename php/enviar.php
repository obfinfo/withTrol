<?php 
    $str_datos = file_get_contents("post.json");
    $array = json_decode($str_datos, true);
    $index = count($array) + 1;
    $name = $_COOKIE['user'];
    date_default_timezone_set("America/El_Salvador");
    $fecha = date("d")."/".date("m")."/".date("Y")."      ".date("h").":".date("i").":".date("s")." ".date("A");
    $titulo = $_POST['titulo'];
    $body = $_POST['des'];
    $love = $_POST['love'];

if(isset($_FILES['img'])){
    $patch='archivos';
    $max_ancho = 620;
    $max_alto = 1240;
    if($_FILES['img']['type']=='image/png' || $_FILES['img']['type']=='image/jpeg' || $_FILES['img']['type']=='image/gif'){
        $medidasimagen= getimagesize($_FILES['img']['tmp_name']);
        if($medidasimagen[0] < 720 && $_FILES['img']['size'] < 200000){
            $nombrearchivo=$_FILES['img']['name'];
            move_uploaded_file($_FILES['img']['tmp_name'], $patch.'/'.$nombrearchivo);   
        }
        else {
            $nombrearchivo=$_FILES['img']['name'];
            $rtOriginal=$_FILES['img']['tmp_name'];
            if($_FILES['img']['type']=='image/jpeg'){
                $original = imagecreatefromjpeg($rtOriginal);
            }
            else if($_FILES['img']['type']=='image/png'){
                $original = imagecreatefrompng($rtOriginal);
            }
            else if($_FILES['img']['type']=='image/gif'){
                $original = imagecreatefromgif($rtOriginal);
            }
            list($ancho,$alto)=getimagesize($rtOriginal);
            $x_ratio = $max_ancho / $ancho;
            $y_ratio = $max_alto / $alto;
            if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
                $ancho_final = $ancho;
                $alto_final = $alto;
            }
            elseif (($x_ratio * $alto) < $max_alto){
                $alto_final = ceil($x_ratio * $alto);
                $ancho_final = $max_ancho;
            }
            else{
                $ancho_final = ceil($y_ratio * $ancho);
                $alto_final = $max_alto;
            }
            $lienzo=imagecreatetruecolor($ancho_final,$alto_final); 
            imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
            imagedestroy($original);
            $cal=8;
            if($_FILES['img']['type']=='image/jpeg'){
                imagejpeg($lienzo,$patch."/".$nombrearchivo);
            }
            else if($_FILES['img']['type']=='image/png'){
                imagepng($lienzo,$patch."/".$nombrearchivo);
            }
            else if($_FILES['img']['type']=='image/gif'){
                imagegif($lienzo,$patch."/".$nombrearchivo);
            }
            $array[$index]['titulo'] = "$titulo";
            $array[$index]['body'] = "$body";
            $array[$index]['img'] = "$nombrearchivo";
            $array[$index]['fav'] = "$love";
            $array[$index]['por'] = "$name";
            $array[$index]['fecha'] = "$fecha";
        
            $fh = fopen("post.json", 'w') or die("Error al abrir fichero de salida");
            fwrite($fh, json_encode($array, JSON_UNESCAPED_UNICODE));
            fclose($fh);
            echo '<script>window.location = "correcto.html";</script>';
        }
	}
	else echo 'fichero no soportado';
} else { //si no se envio archivo
    $titulo = $_POST['titulo'];
    $body = $_POST['des'];
    $love = $_POST['love'];

    $array[$index]['titulo'] = "$titulo";
    $array[$index]['body'] = "$body";
    $array[$index]['img'] = "";
    $array[$index]['fav'] = "$love";
    $array[$index]['por'] = "$name";
    $array[$index]['fecha'] = "$fecha";

    $fh = fopen("post.json", 'w') or die("Error al abrir fichero de salida");
    fwrite($fh, json_encode($array, JSON_UNESCAPED_UNICODE));
    fclose($fh);
    echo '  <script>
    window.location = "correcto.html";
    </script>';
}
?> 