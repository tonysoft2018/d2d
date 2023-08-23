<!-- Modal -->
<div class="modal fade" id="modal-mapa-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Contactos </h5>
      </div>
      <div class="modal-body">

        <div class="row">         
          <div class="col-sm-3"></div>
          <div class="col-sm-3"></div>
          <div class="col-sm-3"></div>
          <div class="col-sm-3">
            <button  type="button" 
                  data-dismiss="modal"
                  class="btn btn-secondary btn-block" 
                  id="evento-regresar-mapa-sugerencias"
                  >
              Regresar
              </button>
          </div>
        </div><br>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Direccion</label>
              <textarea disabled class="form-control" id="update-direccion-mostrar-door2door" name="update-direccion-mostrar-door2door" placeholder="Descripción" rows="2"></textarea>
            </div>
          </div>
        </div>      
        <input type="hidden" id="show-latitud-door2door"      value="0">
        <input type="hidden" id="show-logitud-door2door"      value="0">
        <div id="map" class="map-responsive"  style="border-radius: 15px;" ></div>
        
          
      </div> <br>
    </div>
  </div>
</div>
