<?php require_once("nabvar.php"); ?>
<style type="text/css">
    .button {
        background-color: #035882; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
    }
</style>
<style type="text/css">
    img.carta {
      width: 300px;
      height: 370px;
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

 <!--ESTE ES EL INICIO DEL CONTENIDO PRINCIPAL-->
            <main class="contenedor">

                <form action="index1.php" method="POST">
                    <p><font size="5" color="#FFFFFF"><b>Categoría</b></font></p>
                    <select name="categoria" class="form-control" required="">
                      <option value="">Elija una Categoría</option>
                      <?php
                         $sql = ("SELECT * FROM categoria ORDER BY id_categoria DESC");
                         $result=mysqli_query(conexion::con(), $sql); 
                         foreach ($result as $cat) {
                      ?>
                      <option value="<?php echo $cat['id_categoria']; ?>"><?php echo $cat['categoria']; ?></option>
                      <?php } ?>
                    </select>

                    <button type="submit" class="button">Consultar</button>

                </form>

                <h1 class="nustros-productos">Nuestros Productos</h1>
                <div class="productos">
                <?php
                    $sql = ("SELECT * FROM producto INNER JOIN categoria ON producto.categoria = categoria.id_categoria ORDER BY id_producto DESC");
                    $result=mysqli_query(conexion::con(), $sql);
                    foreach ($result as $row) {
                ?>
                
                    <div class="producto">
                        <div class="producto-blanco">
                            <img class="carta" src="aplicacion/controllers/registro/producto/<?php echo $row['img']; ?>" alt="<?php echo $row['producto']; ?>">
                        </div>
                        <div class="producto-informacion">
                            <p class="producto-nombre"><?php echo $row['producto']; ?></p>

                            <center>
                                    <div class="col-lg-3">
                                      <a href="login.php?msj=info" class="button">Agregar al Carrito</a>
                                    </div>
                            </center>

                            <p class="producto-precio">$<?php echo number_format($row['precio'],2); ?></p>
                        </div>
                    </div>
                
                <?php } ?>
                </div>




            </main>
            <!--FIN DEL CONTENIDO PRINCIPAL-->



        </div>


    </div>

<?php require_once("footer.php"); ?>