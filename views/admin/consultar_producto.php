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
              <!-- Fin del Mensaje -->

              <p align="center">
                &nbsp;&nbsp;&nbsp;&nbsp;<a href="producto.php" class="button"><font color="#000000" size="3">Registrar Producto</font></a>

                &nbsp;&nbsp;&nbsp;&nbsp;<a href="consultar_producto.php" class="button"><font color="#000000" size="3">Consultar Producto</font></a>
              </p>
              <br>


              <font color="#000000" size="6">Consultar Producto</font>     

              <table width="100%">
                <tr bgcolor="#515d6a">
                    <th align="left"><font color="FFFFFF">Imagen</font></th>
                    <th align="left"><font color="FFFFFF">Nombre</font></th>
                    <th align="left"><font color="FFFFFF">Categoría</font></th>
                    <th align="left"><font color="FFFFFF">Precio</font></th>
                    <th colspan="2" align="left"><font color="FFFFFF">Acciones</font></th>
                </tr>
                <?php 
                  $sql = ("SELECT * FROM producto INNER JOIN categoria ON producto.categoria=categoria.id_categoria ORDER BY producto.id_producto DESC");
                  $result=mysqli_query(conexion::con(), $sql); 
                  foreach ($result as $producto) {
                ?>

                <tr>
                  <td><img class="carta" src="../../controllers/registro/producto/<?php echo $producto['img']; ?>" alt="<?php echo $row['producto']; ?>"></td>
                  <td width="60%"><?php echo $producto['producto']; ?></td>
                  <td width="60%"><?php echo $producto['categoria']; ?></td>
                  <td width="10%"><?php echo number_format($producto['precio'],2); ?></td>
                  <td>
                    <a href="editar_producto.php?id_producto=<?php echo $producto['id_producto']; ?>" type="button" class="button">Editar</a>
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