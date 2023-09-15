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
              if ($msj == 'update') {?>
                <center>
                  <font color="green" size="4"><b>Password Actualizado</b></font>
                </center>
              <?php } ?>

              <?php 
              $msj=$_GET['msj'];
              if ($msj == 'error_pass') {?>
                <center>
                  <font color="red" size="4"><b>Password No Coinciden</b></font>
                </center>
              <?php } ?>


              <font color="#000000" size="15">Cambiar Password</font>
                <br><br><br><br>
                <form method="POST" action="../../controllers/update/cambio_password_admin.php" autocomplete="off">
                    <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                    <p><font size="3"><b>Nuevo Password</b></font></p>
                    <input type="password" name="nuevo_password" class="form-control" placeholder="**************" required="" /><br>
                    <p><font size="3"><b>Repita Password</b></font></p>
                    <input type="password" name="repita_password" class="form-control" placeholder="**************" required="" />
                    <br><br>

                    <input type="submit" class="button" value="Actualizar">
                </form>
                <br><br><br><br>
          </center>
    </div>
    </center>
</div>
<br><br><br>

<?php require_once("footer.php"); ?>