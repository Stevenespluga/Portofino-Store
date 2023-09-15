<?php error_reporting(0); ?>
<?php include("../../models/autenticado.php"); ?>
<?php include("../../models/id/id_usuario.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TiendaOnline</title>
    <link rel="stylesheet" href="CSS/style.css">
    
</head>



<body background="IMG/tienda.jpg">


    <div class="img-fondo">

        <div class="velo-negro">

            <!-------------------------------------------------->
            <!--ESTE ES LA CABECERA DE NUESTRO DOCUMENTO INDEX-->
            <header class="header">
                <a href="home.php">

                    <img src="IMG/logo.png" alt="logo" class="logo-img">
                </a>


            </header>
            <!---FIN DEL HEADER-->
            <nav>
                <?php if ($kind=='2') {?>
                <a href="home.php"><font size="3">Inicio</font></a>
                <?php } ?>
                <?php if ($kind=='1') {?>
                <a href="categoria.php"><font size="3">CATEGORÍA</font></a>
                <a href="producto.php"><font size="3">PRODUCTO</font></a>
                <a href="pedidos_clientes.php"><font size="3">PEDIDOS</font></a>
                <a href="usuarios.php"><font size="3">USUARIOS</font></a>
                <?php } ?>
                <?php if ($kind=='2') {?>
                <a href="mis_pedidos.php"><font size="3">MIS PEDIDOS</font></a>
                <?php } ?>
                <a><font size="3">Hola: <font color="#000000"><?php echo $nombre_user ?>  <?php echo $apellido_user ?></font></font></a>

                <a href="../../controllers/cerrar/salir.php"><font color="red" size="3">Salir</font></a>
                <?php if ($kind=='2') {?>
                <a href="carrito.php">
                <svg xmlns="http://www.w3.org/2000/svg" id="iconoCarrito" width="40" height="40" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16" style="color: rgb(255, 255, 255)">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                </svg>

                <?php
                    $sql_carrito = ("SELECT * FROM pedidos WHERE id_registro='$id' AND status='0'");
                    $result_carrito=mysqli_query(conexion::con(), $sql_carrito);
                    $carrito_total=$result_carrito->num_rows;
                ?>
                <font size="2"><?php echo $carrito_total; ?></font>

                </a> 
                <?php } ?> 
                <a href="cambiar_password.php"><font size="3">Cambiar Passwrod</font></a>       
          </nav>