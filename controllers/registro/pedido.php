<?php 
require_once("../../bd/conexion.php");


$id_registro = $_POST["id_registro"];
$id_producto = $_POST["id_producto"];
$precio = $_POST["precio"];
$cantidad = $_POST["cantidad"];
$fecha = date('Y/m/d');   
$total = $cantidad * $precio; 
 
        $sql = ("INSERT INTO pedidos(id_registro,id_producto,cant,precio_unidad,total,fecha_pedido,status,numero) VALUES ('$id_registro','$id_producto','$cantidad','$precio','$total','$fecha','0','0')");
        
        if (mysqli_query(conexion::con(), $sql)) {
                header("location:../../views/admin/home.php?msj=añadido");
                }else{
                header('location:../../views/admin/home.php?msj=error');
        }

?>