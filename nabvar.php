<?php require_once("aplicacion/bd/conexion.php"); ?>
<?php require_once("aplicacion/bd/DBController.php"); ?>

<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="style.scss">
    
</head>
<style type="text/css">
.username, .email {
  border-top:#F0F0F0 2px solid;
  background:#FAF8F8;
  padding:10px;
}
.demoInputBox {
  padding:7px;
  border:#F0F0F0 1px solid;
  border-radius:4px;
}
.estado-disponible-usuario {
  color:#2FC332;
}
.estado-no-disponible-usuario {
  color:#D60202;
}
.estado-disponible-email {
  color:#2FC332;
}
.estado-no-disponible-email {
  color:#D60202;
}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function comprobarUsuario() {
  $("#loaderIcon").show();
  jQuery.ajax({
  url: "ComprobarDisponibilidad.php",
  data:'usuario='+$("#usuario").val(),
  type: "POST",
  success:function(data){
    $("#estadousuario").html(data);
  },
  error:function (){}
  });
}
</script>

<script>
function comprobarCedula() {
  $("#loaderIcon").show();
  jQuery.ajax({
  url: "ComprobarDisponibilidad.php",
  data:'cedula='+$("#cedula").val(),
  type: "POST",
  success:function(data){
    $("#estadocedula").html(data);
  },
  error:function (){}
  });
}
</script>
<body>


    <div class="img-fondo">

        <div class="velo-negro">

            <!-------------------------------------------------->
            <!--ESTE ES LA CABECERA DE NUESTRO DOCUMENTO INDEX-->
            <header class="header">
                <a href="index.php">

                    <img src="IMG/logo.png" alt="logo" class="logo-img">
                </a>


            </header>
            <!---FIN DEL HEADER-->

            <nav>
                <a href="index.php"><font size="5">Productos</font></a>
                <a href="https://www.instagram.com/portofinomcbo/" target="nueva"><font size="5">Contactanos</font></a>
                <a href="registrarme.php"><font size="5">Crear Cuenta</font></a>
                <a href="login.php"><font size="5">Login</font></a>
          </nav>