<?php 
error_reporting(0);
include('../../bd/conexion.php');
//print_r($_POST);

$id_registro = $_POST['id_registro'];
$categoria = $_POST['categoria'];
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$fecha=date("Y-m-d");
$hora=date("h:i:s");

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


$sql = ("INSERT INTO producto(id_registro,categoria,producto,precio,cantidad,img,fecha_registro) VALUES ('$id_registro','$categoria','$producto','$precio','$cantidad','$nuevonombrebd','$fecha')");
//die($sql);
if (mysqli_query(conexion::con(), $sql)) {  
    header("Location:../../views/admin/producto.php?msj=exito");
}else{
    header("Location:../../views/admin/producto.php?msj=error");
}


$target_path = "producto/";
$parts = explode(".",$_FILES['fileToUpload']['name']);
//construimos el nuevo nombre con lo que viene por post nuevonombre
// con el final del explode que sería la extensión de la imagen
$target_path = $target_path . $nuevonombre .".". end($parts);

if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) 
    { 
    header("Location:../../views/admin/producto.php?msj=exito");
    }else{
    header("Location:../../views/admin/producto.php?msj=error");
    }

?>