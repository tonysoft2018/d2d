<!-- Modal -->
<div class="modal fade" id="modal-delete-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-delete-door2door">
          <input type="hidden" value="" id="delete-idUsuario-door2door" name="delete-idUsuario-door2door">
          <input type="hidden" value="" id="delete-folio-door2door"     name="delete-folio-door2door">
     
          <div class="row">
              <div class="col-sm-4"></div>
              <div class="col-sm-4">              
                <img class="img-fluid"  src="<?= $URL?>/door2door/Modules/ModulesImage/pregunta.png" style="width:150px;height:150px;"  ><br> 

              </div>
              <div class="col-sm-4"></div>
          </div> <br>
          <div class="row">
            <div class="col-sm-12 text-center"><h5 class="">¿Desea continuar?</h5></div>
          </div><br>          
        </form>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">              
                <button class="btn btn-primary" 
                        id="button-delete-door2door"  
                        style="width:100px">Si</button>
            </div>
            <div class="col-sm-3">
                <button type="button" 
                        class="btn btn-primary"  
                        data-dismiss="modal" 
                        style="width:100px">No</button>                
            </div>
            <div class="col-sm-3"></div>
        </div>     
      </div>
      <br>
    </div>
  </div>
</div>

