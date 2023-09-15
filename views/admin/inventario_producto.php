<?php require_once("nabvar.php"); ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Inventario de Productos</h2>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row mt-5">
          <div class="col-lg-2 mt-5 mt-lg-0"></div>
          <div class="col-lg-8 mt-5 mt-lg-0">
            <?php require_once("../../views/alertas/alert.php"); ?>
            <p align="right"><a href="" class="btn btn-danger" onclick="window.open('../factura_imprimir/inventario_genaral.php', 'Inventario General', 'width=700, height=505, ');" title="Imprimir Inventario"><i class="ri-printer-line"></i> Imprimir</a></p>
            <table class="table table-condensed table-bordered table-striped" width="100%">
              <tr>
                <th></th>
                <th>Descripción</th>
                <th>Disponible</th>
                <th>Precio Unitario</th>
              </tr>
            <?php 
              require_once("../../bd/conexion.php");
              require_once("../../models/consultas/inventario.php"); 
              foreach ($result as $inventario) {
            ?>
              <tr>
                <td width="20%"><img src="../../controllers/registro/uploads/<?php echo $inventario['img']; ?>" width="100%" height="80px"></td>
                <td width="40%"><?php echo $inventario['producto']; ?></td>
                <td width="20%" align="center"><?php echo $disponible = ($inventario['cantidad'] -  $inventario['vendido']); ?></td>
                <td width="20%" align="center"><?php echo number_format($inventario['precio'],2); ?> $</td>
              </tr>
            <?php } ?>
            </table>
            
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
</main><!-- End #main -->
<br><br>
<?php require_once("footer.php"); ?>