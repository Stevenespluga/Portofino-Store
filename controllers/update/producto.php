<?php
require_once("../../bd/conexion.php");


$id_producto = $_POST["id_producto"];
$producto = $_POST["producto"];
$descu = $_POST['descu'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$detalle = $_POST['detalle'];

$sql = ("UPDATE producto SET producto='$producto',descu='$descu',cantidad='$cantidad',precio='$precio',cat='$categoria',detalles='$detalle' WHERE id_producto='$id_producto'");
        if (mysqli_query(conexion::con(), $sql)) {
               header("location:../../views/admin/consultar_producto.php?id_producto=2&msj=update");          
             }else{
               header('location:../../views/admin/consultar_producto.php?id_producto=2&msj=error_update');
             }

?>

