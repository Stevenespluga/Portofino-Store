<?php
require_once("../../bd/conexion.php");

$id_producto = $_GET["id_producto"];

$sql = ("DELETE FROM producto WHERE id_producto = '$id_producto'");
         if (mysqli_query(conexion::con(), $sql)) {
                header("Location:../../views/admin/consultar_producto.php?id_producto=2&msj=delete");          
             }else{
                header('location:../../views/admin/consultar_producto.php?id_producto=2&msj=error_delete');
             }

?>