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

    @charset "utf-8";
    .card{
      background: #FFFFFF;
      flex-direction:column;
      justify-content:space-between;
      width:600px;
      height:400px;
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
              <p align="left">
                &nbsp;&nbsp;&nbsp;&nbsp;<a href="categorias.php" class="button"><font color="#000000" size="3">Consultar Categorías</font></a>
              </p>
              <br>


              <font color="#000000" size="15">Registrar Categoría</font>
                <br><br><br><br>
                <form action="../../controllers/registro/categoria.php" method="post" role="form" class="form" enctype="multipart/form-data">
                    <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                    <input type="text" name="categoria" class="form-control" placeholder="Nombre de la Categoría" required="" /><br><br>

                    <input type="submit" class="button" value="Guardar">
                </form>
          </center>
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