<?php
require_once("../../bd/conexion.php");
   
$fecha = date('Y/m/d');   
$num = $_POST["num"];

$sql = ("UPDATE factura INNER JOIN pedidos ON factura.num= pedidos.numero SET factura.estatus='2',pedidos.status='2',factura.fecha_entrega='$fecha' WHERE factura.num = '$num' AND pedidos.numero = '$num'");
         if (mysqli_query(conexion::con(), $sql)) {
         	 header("Location:../../views/admin/pedidos_clientes.php?msj=entregado");          
             }else{
                header('location:../../views/admin/pedidos_clientes.php?msj=error_update');
             }
?>
