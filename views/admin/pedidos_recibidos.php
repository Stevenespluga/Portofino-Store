<?php require_once("nabvar.php"); ?>
<?php require_once("../alertas/alert.php"); ?>


    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Reporte de Pedidos Entregados</h2>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row mt-5">
          <div class="col-lg-12 mt-5 mt-lg-0">
            <table class="table table-responsive" width="100%">
              <tr>
                <?php 
                  require_once("../../models/consultas/pedidos_recibidos.php"); 
                  if ($num > 0) {
                ?>
                <th class="colum1" width="10%">N. Pedido</th>
                <th align="center" width="40%">Cliente</th>
                <th align="center" width="10%">Telefono</th>
                <th width="12%">Fecha del Pedido</th>
                <th width="13%">Fecha de Entrega</th>
                <th colspan="2" width="15%">Acciones</th>
                <?php } ?>
              </tr>
              <?php 
                  require_once("../../models/consultas/pedidos_recibidos.php"); 
                  if ($num == 0) {
                    echo "<div class='alert alert-primary'><strong>Información!!!</strong> <p>Aun no has entregado ningun pedido</p></div>";
                  }
                  foreach ($result as $pedidos) {
              ?>
              <tr>
                <td><?php echo $pedidos['num']; ?></td>
                <td><?php echo $pedidos['nacionalidad']; ?>: <?php echo $pedidos['cedula']; ?> <?php echo $pedidos['nombre']; ?> <?php echo $pedidos['apellido']; ?></td>
                <td><?php echo $pedidos['telefono']; ?></td>
                <td><?php echo $pedidos['fecha_factura']; ?>
                <td><?php echo $pedidos['fecha_entrega']; ?>
                <td>
                <form action="../DOMPDF/factura.php" method="POST">
                  <a href="" class="btn btn-danger" onclick="window.open('../factura_imprimir/factura_recibido.php?num=<?php echo $pedidos['num']; ?>', 'Factura', 'width=700, height=505, ');">Imprimir</a>
                </form>
                </td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>     
    </section><!-- End Contact Section -->




<!-- The Modal -->
<div class="modal" id="detalles">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Detalles de la Factura</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <input type="" name="" id="eaddress">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<?php require_once("footer.php"); ?>
