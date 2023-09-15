<?php require_once("nabvar.php"); ?>
<?php $id_usuario=$_GET['id_usuario']; ?>
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
              <br>


              <font color="#000000" size="7">Editar Password del Usuario</font>
                <br><br><br><br>
                <?php 
                  $sql = ("SELECT * FROM usuario WHERE id_usuario='$id_usuario'");
                  $result=mysqli_query(conexion::con(), $sql);
                    foreach ($result as $row) {
                ?>
                <form action="../../controllers/update/usuario_pass.php" method="POST">
                    <b>Usuario</b><br>
                    <input type="text" value="<?php echo $row['email']; ?>" disabled>
                    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>"><br>
                    <b>Nueva Contraseña</b><br>
                    <input type="text" name="pass" class="form-control" required="" /><br><br>

                    <input type="submit" class="button" value="Actualizar">
                </form>
                <?php } ?>
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