<?php 
error_reporting(0);
include('../../bd/conexion.php');
//print_r($_POST);

$id_producto = $_POST['id_producto'];

$nombreDelArchivo = basename( $_FILES["fileToUpload"]["name"]);
$extension = pathinfo($nombreDelArchivo, PATHINFO_EXTENSION);

$consulta = ("SELECT *FROM producto");
$result=mysqli_query(conexion::con(), $consulta);
$conteo=$result->num_rows;


if ($conteo=='0') {
 $num=1;
}elseif ($conteo>'0') {
  foreach ($result as $key) {
    $num=$key['id_producto']+1;
  }
}

$nuevonombrebd=$num .'.' .$extension;
$nuevonombre=$num;


 // si existe algun registro con este ID
      if ($conteo >'0') {
        foreach ($result as $f) {
        $er = $f['img'];
        unlink("../guardar/blog/$er");  // elimina mi foto de la carpeta donde esta alojada
        
        $sql = ("UPDATE producto SET img='$nuevonombrebd' WHERE id_producto='$id_producto'");
        //die($sql);
        if (mysqli_query(conexion::con(), $sql)) {
                header("Location:../../views/admin/editar_producto.php?msj=update_foto&id_producto=$id_producto"); 
            }else {
                header('location:../../views/admin/editar_producto.php?msj=error&id_producto=$id_producto');
          }
       }
}



$target_path = "producto/";
$parts = explode(".",$_FILES['fileToUpload']['name']);
//construimos el nuevo nombre con lo que viene por post nuevonombre
// con el final del explode que sería la extensión de la imagen
$target_path = $target_path . $nuevonombre .".". end($parts);

if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) 
    { 
    header("Location:../../views/admin/editar_producto.php?msj=update_foto&id_producto=$id_producto");
    }else{
    header("Location:../../views/admin/editar_producto.php?msj=error&id_producto=$id_producto");
    }

?>