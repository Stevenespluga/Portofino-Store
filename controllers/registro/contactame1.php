<?php
require_once("../../bd/conexion.php");

$fecha = date('Y/m/d'); 
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$asunto = $_POST["asunto"];
$mensaje = $_POST["mensaje"];       
        
$sql = ("INSERT INTO contactame(nombre_completo,correo,asunto,mensaje,fecha_recibido) VALUES ('$nombre','$correo','$asunto','$mensaje','$fecha')");
         if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/publico/contact-us.php?msj=enviado");
         }else{
               header('location:../../views/publico/contact-us.php?msj=error_enviar');
         }

?>