<?php
require_once("../../bd/conexion.php");
//print_r($_GET);
$id_usuario = $_GET["id_usuario"];

$sql = ("UPDATE usuario SET estatus='1' WHERE id_usuario='$id_usuario'");
    if (mysqli_query(conexion::con(), $sql)) {        
    	header("location:../../views/admin/usuarios.php?msj=bloqueado");
    }else{
        header('location:../../views/admin/usuarios.php?msj=error');
    }

?>