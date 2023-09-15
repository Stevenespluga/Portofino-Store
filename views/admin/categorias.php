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
                &nbsp;&nbsp;&nbsp;&nbsp;<a href="categoria.php" class="button"><font color="#000000" size="3">Registrar Categorías</font></a>

                &nbsp;&nbsp;&nbsp;&nbsp;<a href="categorias.php" class="button"><font color="#000000" size="3">Consultar Categorías</font></a>
              </p>
              <br>


              <font color="#000000" size="6">Consultar Categorías</font>     

              <table width="100%">
                <tr bgcolor="#515d6a">
                  <th width="70%" align="left"><font color="FFFFFF">Categorías</font></th>
                  <th width="30%" align="left"><font color="FFFFFF">Acciones</font></th>
                </tr>
              <?php 
                $sql = ("SELECT * FROM categoria ORDER BY id_categoria DESC");
                $result=mysqli_query(conexion::con(), $sql);
                  foreach ($result as $categoria) {
              ?>

                <tr>
                  <td><?php echo $categoria['categoria']; ?></td>
                  <td>
                    <a href="editar_categoria.php?id_categoria=<?php echo $categoria['id_categoria']; ?>" type="button" class="button">Editar</a>
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