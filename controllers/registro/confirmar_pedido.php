<?php 
require_once("../../bd/conexion.php");

$id_registro = $_POST["id_registro"];
$monto_factura = $_POST["monto_factura"];
$fecha = date('Y/m/d');   

// numero de factura
$consu=("SELECT *FROM factura ORDER BY num DESC LIMIT 1");
$resu=mysqli_query(conexion::con(), $consu);
$num=$resu->num_rows;
  
    $numero=$num+00000000001;
    $num_codigo = sprintf('%011d', $numero);

// fin de numero de factura  

$sql = ("INSERT INTO factura(id_registro,num,estatus,fecha_factura,monto_factura) VALUES ('$id_registro','$num_codigo','1','$fecha','$monto_factura')");

  if (mysqli_query(conexion::con(), $sql)) {
                        
    $sql2 = ("UPDATE pedidos SET status='1',numero='$num_codigo' WHERE id_registro ='$id_registro' AND status='0'");
                         
    if (mysqli_query(conexion::con(), $sql2)) {
        header("location:../../views/admin/carrito.php?msj=pedidoo");
    }else{  
        header('location:../../views/admin/carrito.php?msj=error_pedidoo');
  }
}   
?>