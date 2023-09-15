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
        font-size: 12px;
    }
</style>

<style>
   input {
     width: 300px;
     padding: 10px;
   }
   .redondeado {
     border-radius: 10px;
   }
   .confondo {
     background-color: #def;
   }
   .sinborde {
     border: 0;
   }
   .sinbordefondo {
     background-color: #eee;
     border: 0;
   }
   .outlinenone {
     outline: none;
     background-color: #dfe;
     border: 0;
   }
   .redondeadonorelieve {
     border-radius: 5px;
     border: 1px solid #39c;
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
              if ($msj == 'invalide') {?>
                <center>
                  <font color="red" size="4"><b>Datos Incorrectos</b></font>
                </center>
              <?php } ?>

              <font color="#000000" size="20">Login de Usuario</font>
                <br>
                <form action="aplicacion/controllers/autenticar.php" method="POST">
                    <p><font color="#000000" size="3">Correo electronico</font></p>
                    <input type="email" name="usuario" placeholder="Correo Electronico" class="form-control" required="">
                    <p><font color="#000000" size="3">Password</font></p>
                    <input type="password" name="pass" placeholder="*********" class="form-control" required="">
                    <br><br>
                    <input type="submit" class="button" value="Acceder">
                </form>
          </center>
    </div>
    </center>
</div>
<br><br><br>
<?php require_once("footer.php"); ?>