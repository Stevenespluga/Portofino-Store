<?php
require_once("../../bd/conexion.php");

$id_categoria = $_POST["id_categoria"];
$categoria = $_POST["categoria"];

$sql = ("UPDATE categoria SET categoria='$categoria' WHERE id_categoria='$id_categoria'");
         if (mysqli_query(conexion::con(), $sql)) {
             header("location:../../views/admin/categorias.php?msj=update");
         }else{
             header('location:../../views/admin/categorias.php?msj=error_update');
         }
?>