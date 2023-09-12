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
              if ($msj == 'yes') {?>
                <center>
                  <font color="green" size="4"><b>Registro Exitoso</b></font>
                </center>
              <?php } ?>
              <font color="#000000" size="15">Regístrate</font>
                <br>
                <form action="aplicacion/controllers/registro/registro_cliente.php" method="POST">
                    <p><font color="#000000" size="3">Cedula</font></p>
                    <input type="text" name="cedula" placeholder="Cedula de Identidad" id="cedula" onBlur="comprobarCedula()" class="form-control" required=""><br>
                    <font size="3"><span id="estadocedula"></span></font>

                    <p><font color="#000000" size="3">Nombres</font></p>
                    <input type="text" name="nombre" placeholder="Nombres" class="form-control" required="">

                    <p><font color="#000000" size="3">Apellido</font></p>
                    <input type="text" name="apellido" placeholder="Apellidos" class="form-control" required="">

                    <p><font color="#000000" size="3">Correo electronico</font></p>
                    <input type="email" name="usuario" id="usuario" onBlur="comprobarUsuario()" placeholder="Correo Electronico" class="form-control" required=""><br>
                    <font size="3"><span id="estadousuario"></span></font>

                    <p><font color="#000000" size="3">Telefono</font></p>
                    <input type="text" name="telefono" placeholder="Telefono" class="form-control" required="">

                    <p><font color="#000000" size="3">Dirección</font></p>
                    <input type="text" name="direccion" placeholder="direccion" class="form-control" required="">

                    <p><font color="#000000" size="3">Password</font></p>
                    <input type="password" name="password" placeholder="*********" class="form-control" required="">
                    <br><br>

                    <input type="submit" class="button" value="Regístrar">
                </form>
                <br><br><br><br><br>
          </center>
    </div>
    </center>
</div>
<br><br><br>
<?php require_once("footer.php"); ?>