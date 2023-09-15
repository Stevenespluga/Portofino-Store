<?php require_once("nabvar.php"); ?>

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

    .button_imprimir {
        background-color: #5D6264; /* Green */
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
              if ($msj == 'exito') {?>
                <center>
                  <font color="green" size="4"><b>Registro Exitoso</b></font>
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
              if ($msj == 'entregado') {?>
                <center>
                  <font color="green" size="4"><b>El Pedido a Cambiado de Status a Procesado</b></font>
                </center>
              <?php } ?>
              <!-- Fin del Mensaje -->

              <p align="center">
                &nbsp;&nbsp;&nbsp;&nbsp;<a href="mis_pedidos.php" class="button"><font color="#000000" size="3">En cola</font></a>

                &nbsp;&nbsp;&nbsp;&nbsp;<a href="mis_pedidos_procesados.php" class="button"><font color="#000000" size="3">Procesados</font></a>
              </p>
              <br>

              <form method="POST" action="mis_pedidos_procesados_fecha.php">
                <input type="date" name="desde" required="">
                <input type="date" name="hasta" required="">
                <button type="submit" class="button">Consultar</button>
              </form>


              <font color="#000000" size="6">Pedidos Procesados</font><br><br>  

              <table width="100%">
                <tr bgcolor="#515d6a">
                    <th align="left"><font color="FFFFFF">Nº de Factura</font></th>
                    <th align="left"><font color="FFFFFF">Fecha de Factura</font></th>
                    <th align="left"><font color="FFFFFF">Fecha de Entrega</font></th>
                    <th align="left"><font color="FFFFFF">Monto</font></th>
                    <th align="left"><font color="FFFFFF">Acciones</font></th>
                </tr>
                <?php 
                  if ($kind=='1') {
                    $sql = ("SELECT * FROM factura WHERE estatus='2'");
                  }elseif ($kind=='2') {
                    $sql = ("SELECT * FROM factura WHERE estatus='2' AND id_registro='$id'");
                  }
                  $result=mysqli_query(conexion::con(), $sql); 
                  foreach ($result as $pedidos) {
                ?>

                <tr>
                  <td width="60%"><?php echo $pedidos['num']; ?></td>
                  <td width="60%"><?php echo $pedidos['fecha_factura']; ?></td>
                  <td width="60%"><?php echo $pedidos['fecha_entrega']; ?></td>
                  <td width="10%">$<?php echo number_format($pedidos['monto_factura'],2); ?></td>
                  <td>
                    <a href="#" class="button_imprimir" onclick="window.open('../factura_imprimir/factura_entregado.php?num=<?php echo $pedidos['num']; ?>&id_registro=<?php echo $pedidos['id_registro']; ?>', 'Factura', 'width=700, height=505, ');"><i class="ri-printer-line"></i> Imprimir</a>
                  </td>
                </tr>
              <?php } ?>
              </table> 
              <br><br><br><br>
    </div>
    </center>
</div>
<br><br><br>

<?php require_once("footer.php"); ?>