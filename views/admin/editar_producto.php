<?php require_once("nabvar.php"); ?>
<?php $id_producto=$_GET['id_producto']; ?>
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
        font-size: 12px;
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
      img.carta {
        width: 200px;
        height: 200px;
      }
  </style>


   <style type="text/css">      

    @charset "utf-8";
    .card{
      background: #FFFFFF;
      flex-direction:column;
      justify-content:space-between;
      width:700px;
      border: 0px solid lightgray;
      font-family: sans-serif;
    }
   </style>


<div class="contenedor">
    <center>
        <div class="card">
          <center><br><br><br><br>
              <?php 
              $msj=$_GET['msj'];
              if ($msj == 'exito') {?>
                <center>
                  <font color="green" size="4"><b>Registro Exitoso</b></font>
                </center>
              <?php } ?>

              <?php 
              $msj=$_GET['msj'];
              if ($msj == 'update_foto') {?>
                <center>
                  <font color="green" size="4"><b>Foto del Producto Actualizada</b></font>
                </center>
              <?php } ?>

              <?php 
              $msj=$_GET['msj'];
              if ($msj == 'update') {?>
                <center>
                  <font color="green" size="4"><b>Datos del Producto Actualizados</b></font>
                </center>
              <?php } ?>

              <p align="left">
                &nbsp;&nbsp;&nbsp;&nbsp;<a href="consultar_producto.php" class="button"><font color="#000000" size="3">Consultar Productos</font></a>
              </p>
              <br>

              <font color="#000000" size="15">Editar Foto del Producto</font>

              <?php 
                  $sql = ("SELECT * FROM producto WHERE id_producto='$id_producto'");
                  $result=mysqli_query(conexion::con(), $sql); 
                  foreach ($result as $producto) {
              ?>
                <br>
                <center>
                  <img class="carta" src="../../controllers/registro/producto/<?php echo $producto['img']; ?>" alt="<?php echo $row['producto']; ?>">
                </center>
                <br>

                <form action="../../controllers/registro/editar_foto_producto.php" method="post" role="form" class="form" enctype="multipart/form-data">
                  <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
                  <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" required="">
                  <br>
                  <input type="submit" class="button" value="Actualizar">
                </form>
              <?php } ?>
              <hr><br>







              <font color="#000000" size="15">Editar Producto</font>
                <br>

              <?php 
                  $sql = ("SELECT * FROM producto INNER JOIN categoria ON producto.categoria=categoria.id_categoria WHERE producto.id_producto='$id_producto'");
                  $result=mysqli_query(conexion::con(), $sql); 
                  foreach ($result as $producto) {
              ?>

                <form action="../../controllers/update/editar_producto.php" method="post" role="form" class="form" enctype="multipart/form-data">
                    <p><font color="#000000" size="3">Categoría</font></p>
                    <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
                    <select name="categoria" class="form-control" required="">
                      <option value="<?php echo $producto['id_categoria']; ?>"><?php echo $producto['categoria']; ?></option>
                      <?php
                         $sql = ("SELECT * FROM categoria ORDER BY id_categoria DESC");
                         $result=mysqli_query(conexion::con(), $sql);
                         foreach ($result as $cat) {
                      ?>
                      <option value="<?php echo $cat['id_categoria']; ?>"><?php echo $cat['categoria']; ?></option>
                      <?php } ?>
                    </select>

                    <p><font color="#000000" size="3">Nombre del Producto</font></p>
                    <input type="text" name="producto" value="<?php echo $producto['producto']; ?>" class="form-control" placeholder="Nombre del Producto" required="" />

                    <p><font color="#000000" size="3">Cantidad</font></p>
                    <input type="number" name="cantidad" value="<?php echo $producto['cantidad']; ?>" class="form-control" placeholder="Cant" required="" />

                    <p><font color="#000000" size="3">Precio</font></p>
                    <input type="text" name="precio" value="<?php echo $producto['precio']; ?>" class="form-control" placeholder="Precio" required="" />

                    <br><br>

                    <input type="submit" class="button" value="Guardar">
                </form>

              <?php } ?>
          </center><br><br><br><br>
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