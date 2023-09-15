<?php require_once("nabvar.php"); ?>
<?php if ($kind=='2') {?>
<style type="text/css">
    .button {
        background-color: #1DABF0; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
    }

    .button_rojo {
        background-color: #ac0707; /* red */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
    }
</style>

<style>
  input {
     width: 300px;
     padding: 10px;
  }

  select {
     width: 300px;
     padding: 10px;
  }
</style>

<style type="text/css">
  table {
    table-layout: fixed;
    width: 90%;
    border-collapse: collapse;
    border: 3px solid #1DABF0;
    font-size: 20px;
  }

  thead th:nth-child(1) {
    width: 20%;
  }

  thead th:nth-child(2) {
    width: 20%;
  }

  thead th:nth-child(3) {
    width: 15%;
  }

  thead th:nth-child(4) {
    width: 35%;
  }

  th, td {
    padding: 20px;
  }
</style>


   <style type="text/css">      

    @charset "utf-8";
    .card{
      background: #FFFFFF;
      flex-direction:column;
      justify-content:space-between;
      width:1200px;
      border: 0px solid lightgray;
      font-family: sans-serif;
    }
   </style>

   <style type="text/css">
      img.carta {
        width: 100px;
        height: 100px;
      }
  </style>

<div class="contenedor">
    <center>
        <div class="card">
          <br><br><br><br>
              <!-- Mensaje -->
              <?php 
              $msj=$_GET['msj'];
              if ($msj == 'delete') {?>
                <center>
                  <font color="red" size="4"><b>Registro Eliminado</b></font>
                </center>
              <?php } ?>

              <?php 
              $msj=$_GET['msj'];
              if ($msj == 'update') {?>
                <center>
                  <font color="green" size="4"><b>Datos Actualizados Exitosamente</b></font>
                </center>
              <?php } ?>

              <?php 
              $msj=$_GET['msj'];
              if ($msj == 'pedidoo') {?>
                <center>
                  <font color="green" size="4"><b>Pedido Finalizado Exitosamente</b></font>
                </center>
              <?php } ?>
              <!-- Fin del Mensaje -->


              <font color="#000000" size="6">Mi Carrito</font> <br><br>  

              <table width="100%">
                <tr bgcolor="#515d6a">
                    <th align="left"><font color="FFFFFF">Imagen</font></th>
                    <th align="left"><font color="FFFFFF">Nombre</font></th>
                    <th align="left"><font color="FFFFFF">Categoría</font></th>
                    <th align="left"><font color="FFFFFF">Precio</font></th>
                    <th colspan="2" align="left"><font color="FFFFFF">Acciones</font></th>
                </tr>
                <?php 
                  $sql = ("SELECT * FROM pedidos INNER JOIN producto ON pedidos.id_producto=producto.id_producto INNER JOIN categoria ON categoria.id_categoria=producto.categoria WHERE pedidos.id_registro = '$id' AND pedidos.status = '0'");
                  $result=mysqli_query(conexion::con(), $sql); 
                  $n=$result->num_rows;
                  foreach ($result as $producto) {
                ?>

                <tr>
                  <td><img class="carta" src="../../controllers/registro/producto/<?php echo $producto['img']; ?>" alt="<?php echo $row['producto']; ?>"></td>
                  <td width="60%"><?php echo $producto['producto']; ?></td>
                  <td width="60%"><?php echo $producto['categoria']; ?></td>
                  <td width="10%"><?php echo number_format($producto['precio'],2); ?></td>
                  <td>
                    <a href="../../controllers/delete/eliminar_producto_carrito.php?id_pedidos=<?php echo $producto['id_pedidos']; ?>" class="button_rojo" onclick="return confirm('Estás seguro que deseas eliminar el registro?');">Eliminar</a>
                  </td>
                </tr>
              <?php } ?>
              <?php if ($n!='0') {?>
              <tr>
                <th align="right" colspan="3">Total</th>
                <td>
                  <?php 
                    $sql = ("SELECT SUM(total) AS total_pagar FROM pedidos  WHERE id_registro = '$id' AND status = '0'");
                    $result=mysqli_query(conexion::con(), $sql);
                    foreach ($result as $factura) {
                            $monto_factura=$factura['total_pagar'];
                  ?>
                    $<?php echo number_format($monto_factura,2); ?>
                  <?php } ?>
                </td>
              </tr>

              <tr>
                <td colspan="4">
                  <form method="POST" action="../../controllers/registro/confirmar_pedido.php">
                      <td colspan="2">
                        <input type="hidden" name="monto_factura" value="<?php echo $monto_factura; ?>">
                        <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                        <p align="right"><button type="submit" class="button">Finalizar Pedido</button></p>
                      </td>
                  </form>
                </td>
              </tr>
              <?php } ?>
              </table> 

              <?php if ($n=='0') {?>
                <p align="center"><font size="5">El Carrito se Encuentra Vacio</font></p>
              <?php } ?>


              
              <br><br><br><br>
    </div>
    </center>
</div>
<br><br><br>
<?php }else{ ?>
<font color="#FFFFFF">
  <center>
    No tienes Permisos Para este modulo
  </center>
</font>
<?php } ?>
<?php require_once("footer.php"); ?>