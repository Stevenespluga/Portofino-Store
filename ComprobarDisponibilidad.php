<?php
require_once("aplicacion/bd/DBController.php");
$db_handle = new DBController();


if(!empty($_POST["usuario"])) {
  $query = "SELECT * FROM datos_personales WHERE correo='" . $_POST["usuario"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='estado-no-disponible-usuario'> Correo no Disponible.</span>";
  }else{
      echo "<span class='estado-disponible-usuario'> Correo Disponible.</span>";
  }
}

if(!empty($_POST["cedula"])) {
  $query = "SELECT * FROM datos_personales WHERE cedula='" . $_POST["cedula"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='estado-no-disponible-usuario'> Cedula ya Registrada.</span>";
  }else{
      echo "<span class='estado-disponible-usuario'> Disponible.</span>";
  }
}

?>