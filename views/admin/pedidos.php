<?php require_once("nabvar.php"); ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Reporte de Pedidos Realizados</h2>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row mt-5">
          <div class="col-lg-12 mt-5 mt-lg-0">
            <?php require_once("../../views/alertas/alert.php"); ?>
            <table class="table table-responsive" width="100%">
              <tr bgcolor="#515d6a">
                <th><font color="FFFFFF">Imagen</font></th>
                <th><font color="FFFFFF">Nombre</font></th>
                <th><font color="FFFFFF">Precio</font></th>
                <th><font color="FFFFFF">Disponibilidad</font></th>
                <th colspan="2"><font color="FFFFFF">Acciones</font></th>
              </tr>
            <?php 
              require_once("../../bd/conexion.php");
              require_once("../../models/consultas/pedidos_en_curso.php"); 
              foreach ($result as $producto) {
            ?>
              <tr>
                <td width="10%"><img src="../../controllers/registro/uploads/<?php echo $producto['img']; ?>" width="100%" height="80px"></td>
                <td width="60%"><?php echo $producto['producto']; ?></td>
                <td width="10%"><?php echo $producto['precio']; ?></td>
                <td width="10%"><?php echo $producto['cantidad']; ?></td>
                <td width="5%">
                  <a href="productos.php?id_producto=<?php echo $producto['id_producto']; ?>" type="button" class="btn btn-primary" title='Editar Producto'><i class="ri-edit-line"></i></a>
                </td>
                <td width="5%">
                  <a href="../../controllers/delete/producto.php?id_producto=<?php echo $producto['id_producto']; ?>" type="button" class="btn btn-danger" title="Eliminar Producto"><i class="ri-close-line"></i></a>
                </td>
              </tr>
            <?php } ?>
            </table>
            
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->
<?php require_once("footer.php"); ?>