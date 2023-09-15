<?php require_once("nabvar.php"); ?>
<?php require_once("../alertas/alert.php"); ?>


    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Reporte de Pedidos por Entregar</h2>
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
                  require_once("../../models/consultas/pedidos1.php"); 
                  if ($num > 0) {
                ?>
                <th class="colum1">N. de Pedido</th>
                <th colspan="4" align="center">Cliente</th>
                <th>Fecha</th>
                <th colspan="3">Acciones</th>
                <?php } ?>
              </tr>
              <?php 
                  require_once("../../models/consultas/pedidos1.php"); 
                  if ($num == 0) {
                    echo "<div class='alert alert-primary'><strong>Información!!!</strong> <p>No tienes ningun pedido por entregar</p></div>";
                  }
                  foreach ($result as $pedidos) {
              ?>
              <tr>
                <td><?php echo $pedidos['num']; ?></td>
                <td><?php echo $pedidos['nacionalidad']; ?></td>
                <td><?php echo $pedidos['cedula']; ?></td>
                <td><?php echo $pedidos['nombre']; ?></td>
                <td><?php echo $pedidos['apellido']; ?></td>
                <td><?php echo $pedidos['fecha_factura']; ?>
                <td>
                <form action="../../controllers/update/factura.php" method="POST">
                  <input type="hidden" name="num" value="<?php echo $pedidos['num']; ?>">
                  <button type="submit" class="btn btn-dark" title="Marcar como Entregado"><i class="ri-check-line"></i> Marcar como Entregado</button>
                </form>
                </td>
                <td>
                <form action="../DOMPDF/factura.php" method="POST">
                  <a href="" class="btn btn-danger" onclick="window.open('../factura_imprimir/factura.php?num=<?php echo $pedidos['num']; ?>', 'Factura', 'width=700, height=505, ');"><i class="ri-printer-line"></i> Imprimir</a>
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
