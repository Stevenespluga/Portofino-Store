<?php
include("../../bd/conexion.php");
//print_r($_POST);
// Variable Enviadas
$id_registro = $_POST["id_registro"];
$nuevo_password = hash('sha512', $_POST["nuevo_password"]);
$repita_password = hash('sha512', $_POST["repita_password"]);


if ($nuevo_password == $repita_password) {
$sql=("UPDATE usuario SET  password='$nuevo_password' WHERE id_registro='$id_registro'");
		if (mysqli_query(conexion::con(), $sql)) {
            header("Location:../../views/admin/cambiar_password.php?msj=update");
            }
        }else{
        	header("location:../../views/admin/cambiar_password.php?msj=error_pass");
}
?>