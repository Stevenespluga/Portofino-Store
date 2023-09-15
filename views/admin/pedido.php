<?php require_once("nabvar.php"); ?>
<?php require_once("../alertas/alert.php"); ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Agregar tu Pedido</h2>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->


    <?php 
      $id_producto = $_GET['id_producto'];
      require_once("../../models/consultas/id_producto.php");
      foreach ($result as $key) {
    ?>
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 entries">

              <center>
                <img src="../../controllers/registro/uploads/<?php echo $key['img']; ?>" width="100%" height="300px">
              </center>


          </div><!-- End blog entries list -->

          <div class="col-lg-6">
            <div class="sidebar">
              <h3 class="sidebar-title" align="justify"><?php echo $key['producto']; ?></h3>
               <p align="justify"><b>Detalles:</b> <?php echo $key['detalles']; ?></p>
               <p align="justify"><b>Disponibilidad:</b> <?php echo $key['cantidad']; ?></p>
               <p align="justify"><b>Descuento:</b> <?php echo $key['descu']; ?> %</p>
               <?php $precio = (($key['precio'])-($key['precio']*$key['descu'])/100); ?>
                 <form action="../../controllers/registro/pedido.php" method="POST">
                  <div class="row">
                    <div class="col-lg-5">
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
                      <input type="hidden" name="precio" value="<?php echo $precio; ?>">
                      <input type="text" class="form-control" name="" value="<?php echo $precio; ?> $" disabled="">
                    </div>
                    <div class="col-lg-3">
                      <input type="number" class="form-control" name="cantidad" required="">
                    </div>
                    <div class="col-lg-3">
                      <button type="submit" class="btn btn-danger" title="Añadir al Carrito"> Añadir</button>
                    </div>
                  </div>
                </form>
            </div>
          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->
    <?php } ?>
  </main><!-- End #main -->
  
  <center><h1><b>Productos Relacionados</b></h1></center>

  <?php require_once("productos.php"); ?>

  <!-- ======= Footer ======= -->
<?php require_once("footer.php"); ?>