<!-- Modal -->
<div class="modal fade" id="modal-inactivo-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inactivo </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-inactivo-door2door">     
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
          <input  type="hidden" id="inactivo-id-door2door"  name="inactivo-id-door2door">         
        </form>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">              
              <button class="btn btn-primary" 
                      id="button-inactivo-door2door"  
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

