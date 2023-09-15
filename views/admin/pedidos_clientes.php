<?php require_once("nabvar.php"); ?>
<?php if ($kind=='1') {?>
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
                &nbsp;&nbsp;&nbsp;&nbsp;<a href="pedidos_clientes.php" class="button"><font color="#000000" size="3">En cola</font></a>

                &nbsp;&nbsp;&nbsp;&nbsp;<a href="mis_pedidos_procesados.php" class="button"><font color="#000000" size="3">Procesados</font></a>
              </p>
              <br>


              <font color="#000000" size="6">Pedidos de los Clientes</font><br><br>  

              <table width="100%">
                <tr bgcolor="#515d6a">
                    <th align="left"><font color="FFFFFF">Nº de Factura</font></th>
                    <th align="left"><font color="FFFFFF">Fecha de Factura</font></th>
                    <th align="left"><font color="FFFFFF">Monto</font></th>
                    <th align="left" colspan="2"><font color="FFFFFF">Acciones</font></th>
                </tr>
                <?php 
                  $sql = ("SELECT * FROM factura WHERE estatus='1'");
                  $result=mysqli_query(conexion::con(), $sql); 
                  foreach ($result as $pedidos) {
                ?>

                <tr>
                  <td width="60%"><?php echo $pedidos['num']; ?></td>
                  <td width="60%"><?php echo $pedidos['fecha_factura']; ?></td>
                  <td width="10%">$<?php echo number_format($pedidos['monto_factura'],2); ?></td>
                  <td>
                    <form action="../../controllers/update/factura.php" method="POST">
                      <input type="hidden" name="num" value="<?php echo $pedidos['num']; ?>">
                      <button type="submit" class="button" title="Marcar como Entregado"><font size="1">Marcar como Entregado</font></button>
                    </form>
                  </td>
                  <td>
                    <a href="" class="button_imprimir" onclick="window.open('../factura_imprimir/factura.php?num=<?php echo $pedidos['num']; ?>&id_registro=<?php echo $pedidos['id_registro']; ?>', 'Factura', 'width=700, height=505, ');"><i class="ri-printer-line"></i> Imprimir</a>
                  </td>
                </tr>
              <?php } ?>
              </table> 
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