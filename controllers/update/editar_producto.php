<?php
require_once("../../bd/conexion.php");

$id_producto = $_POST["id_producto"];
$categoria = $_POST["categoria"];
$producto = $_POST["producto"];
$cantidad = $_POST["cantidad"];
$precio = $_POST["precio"];

$sql = ("UPDATE producto SET categoria='$categoria',producto='$producto',precio='$precio',cantidad='$cantidad' WHERE id_producto='$id_producto'");
         if (mysqli_query(conexion::con(), $sql)) {
             header("location:../../views/admin/editar_producto.php?msj=update&id_producto=$id_producto");
         }else{
             header('location:../../views/admin/editar_producto.php?msj=error_update&id_producto=$id_producto');
         }
?>