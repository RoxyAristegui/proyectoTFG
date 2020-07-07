
</div>
        <!-- /.container-fluid -->
</div>
  <!-- End of Main Content -->

<footer>
	Hoy es <?php echo date("d-M-Y", time()); ?>
</footer>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

   <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="desconectarModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title TeVas" id="desconectarModal">Te vas?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body SeleccionaDesconectarSi">Selecciona desconectar si quieres cerrar la sesión actual.</div>
        <div class="modal-footer">
          <button class="btn btn-outline-secondary Cancelar" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-outline-info Desconectar" href="../Functions/Desconectar.php">Desconectar</a>
        </div>
      </div>
    </div>
  </div>


<script type="text/javascript">
  function getUrlVars() {
      var vars = {};
      var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
          vars[key] = value;
      });
      return vars;
  }

</script>


    <script src="../Locale/template/vendor/jquery/jquery.min.js"></script>
  <script src="../Locale/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../Locale/template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../Locale/template/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../Locale/template/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../Locale/template/js/demo/chart-area-demo.js"></script>
  <script src="../Locale/template/js/demo/chart-pie-demo.js"></script>

     <!-- Page level plugins -->
  <script src="../Locale/template/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../Locale/template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../Locale/template/js/demo/datatables-demo.js"></script>

</body>
</html>

		
