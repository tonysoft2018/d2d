<!-- Modal -->
<div class="modal fade" id="modal-show-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sugerencia de acuerdo a tu ubicación </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <form >            
                  <div class="row">
                    <div class="col-sm-12">
                      <input type="hidden" id="show-id-door2door"           value="0">
                      <input type="hidden" id="show-latitud-door2door"      value="0">
                      <input type="hidden" id="show-logitud-door2door"      value="0">
                      <input type="hidden" id="show-tipoDeVisita-door2door" value="">
                      <div id="map" class="map-responsive"  style="border-radius: 15px;" ></div>
                    </div>
                  </div>
                  <div class="row"  style="margin:5px;">
                    <div class="col-sm-12"> 
                      <button type="button" 
                             
                              class="btn btn-secondary btn-block evento-regresar-mapa-sugerencias" 
                              data-dismiss="modal">
                              Regresar
                      </button>
                    </div>            
                  </div>
                  
                </form>
            </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

