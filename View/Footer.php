
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

	<div id="modal" style="display:none">
	  		<div id="contenido-interno">
	  			<div id="aviso"><img src="../View/Icons/sign-error.png" name="aviso"/></div>
	  			<div id="mensajeError"></div>
				<a id="cerrar" href="#" onclick="cerrarModal();">
		       		<img style="cursor: pointer" alt="" src="../View/Icons/salir.png" width="25"/>
				</a>
			</div>
		</div>

   <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo $strings["estas seguro?"]?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><?php echo $strings['selecciona desconectar..']?></div>
        <div class="modal-footer">
          <button class="btn btn-outline-secondary" type="button" data-dismiss="modal"><?php echo $strings["Cancelar"]?></button>
          <a class="btn btn-outline-info" href="../Functions/Desconectar.php"><?php echo $strings["Desconectar"]?></a>
        </div>
      </div>
    </div>
  </div>

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

		
