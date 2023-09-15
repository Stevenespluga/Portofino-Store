<?php 
   include("../../bd/conexion.php");
   $usuario = $_SESSION["usuario"];
   $sql = ("SELECT * FROM datos_personales WHERE correo = '$usuario'");
   $res=mysqli_query(conexion::con(), $sql);
    foreach ($res as $key) {
        $id = $key['id_registro'];
        $nombre_user = $key['nombre'];
        $apellido_user = $key['apellido'];
    }

  $sql1 = ("SELECT * FROM usuario WHERE email = '$usuario'");
  $res1=mysqli_query(conexion::con(), $sql1);
  foreach ($res1 as $key1) {
        $kind=$key1['tipo'];
    }
?>