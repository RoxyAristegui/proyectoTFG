<?php 
class Modal{
  private $mensaje;

  function __construct($mensaje){
    $this->mensaje=$mensaje;
    $this->render();
  }

function render(){
  ?>
  <!-- Modal -->
  <div class="modal fade" id="modalConfirmacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body <?php echo $this->mensaje ?>">
      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
  </div>
    <script>
    $("#modalConfirmacion").modal('show');
  </script>

  <?php
  }
 
}