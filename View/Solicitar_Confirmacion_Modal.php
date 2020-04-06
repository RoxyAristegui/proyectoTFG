

<!-- Modal que solicita confirmación y te envia a la url pedida 
deifnir $msjConfModal 
para lanzar el modal,
data-elem: elemento que solicita la confirmación
data-destino : url a la que se le pide confirmación
-->


<div class="modal fade" id="SolicitarConfModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <span id="msj" class="<?php echo $msjConfModal ?>"> </span> <span id="elem">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" class="Cancelar">Cancelar</button>
        <a id='confirmGo' href='' type="button" class="btn btn-primary">Confirmar</a>
      </div>
    </div>
  </div>
</div>
	
	<script>

		$('#SolicitarConfModal').on('show.bs.modal', function (event) {
	    var button = $(event.relatedTarget) // Button that triggered the modal
	    var elem = button.data('elem')
	    var url= button.data('destino')
		var modal = $(this)
  		modal.find("#elem").text(elem)
  		modal.find("#confirmGo").attr('href',url);
  	})
	</script>	