<?php
include("../../bd/conexion.php");

$id_usuario = $_POST["id_usuario"];
$pass = hash('sha512', $_POST["pass"]);


$sql=("UPDATE usuario SET password ='$pass' WHERE id_usuario = '$id_usuario'");
//die($sql);
		if (mysqli_query(conexion::con(), $sql)) {
            header("Location:../../views/admin/usuarios.php?msj=update");
        }else{
        	header("location:../../views/admin/usuarios.php?msj=error_pass");
        }
?>
