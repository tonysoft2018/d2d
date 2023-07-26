<!-- Modal -->
<div class="modal fade" id="modal-rechazar-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rechazar </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-rechazar-door2door">     
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
          <input  type="hidden" id="rechazar-id-door2door"  name="rechazar-id-door2door"> 
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Comentario</label>
                <textarea class="form-control" id="rechazar-comentario-door2door" name="rechazar-comentario-door2door" placeholder="Comentario" rows="4"></textarea>
              </div>
            </div>
          </div><br>
        </form>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">              
                <button class="btn btn-primary" 
                        id="button-rechazar-door2door"  
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

