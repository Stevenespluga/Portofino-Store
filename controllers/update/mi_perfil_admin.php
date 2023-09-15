<?php
	require_once("../../bd/conexion.php");

  $id_registro = $_POST["id_registro"];
  $nacionalidad = $_POST["nacionalidad"];
  $cedula = $_POST['cedula'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $fecha_nacimiento = $_POST['fecha_nacimiento'];
  $telefono = $_POST['telefono'];
  $sexo = $_POST['sexo'];
  $estado_civil = $_POST['estado_civil'];
  $direccion = $_POST['direccion'];


  $sql = ("UPDATE datos_personales SET nacionalidad='$nacionalidad',cedula='$cedula',nombre='$nombre',apellido='$apellido',fecha_nacimiento='$fecha_nacimiento',telefono='$telefono',sexo='$sexo',estado_civil='$estado_civil',direccion='$direccion' WHERE id_registro = '$id_registro'");
         if (mysqli_query(conexion::con(), $sql)) {
                header("Location:../../views/admin/perfil.php?msj=update_perfil");          
             }else{
                header('location:../../views/admin/perfil.php?msj=error_update');
             }

?>