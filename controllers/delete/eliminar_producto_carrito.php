<?php 
    require_once("../../bd/conexion.php");
    
    $id_pedidos=$_GET["id_pedidos"];
    $sql = ("DELETE FROM pedidos WHERE id_pedidos='$id_pedidos'");
    if (mysqli_query(conexion::con(), $sql)) {
        header("Location:../../views/admin/carrito.php?msj=delete");
    }else{
        header('location:../../views/admin/carrito.php?msj=error_delete');
    }
?>
