<?php 
require_once("../../bd/conexion.php");

$id_pedidos = $_POST["id_pedidos"];
$precio = $_POST["precio"];
$desc = $_POST["desc"];
$cant = $_POST["cant"];

$total = $cant * $precio; 
$porcentaje = (($total * $desc)/100);
$total_pagar = $total - $porcentaje;

$sql = ("UPDATE pedidos SET cant='$cant',total='$total_pagar' WHERE id_pedidos = '$id_pedidos'");

        if (mysqli_query(conexion::con(), $sql)) {
            header("Location:../../views/publico/pedidos_en_curso.php?id_producto=2&msj=update_carrito");
        }else{
            header('location:../../views/publico/pedidos_en_curso.php?id_producto=2&msj=error_update');
        }

?>