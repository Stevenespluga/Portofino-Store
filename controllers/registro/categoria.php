<?php 
require_once("../../bd/conexion.php");

$id_registro = $_POST["id_registro"];
$categoria = $_POST["categoria"];

$sql = ("INSERT INTO categoria(id_registro,categoria) VALUES ('$id_registro','$categoria')");
    if (mysqli_query(conexion::con(), $sql)) {
        header("Location:../../views/admin/categoria.php?id_producto=2&msj=exito");
    }else{
         header('location:../../views/admin/categoria.php?id_producto=2&msj=error');
    }

?>