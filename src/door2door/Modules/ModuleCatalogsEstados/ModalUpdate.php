<!-- Modal -->
<div class="modal fade" id="modal-update-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
              <form id="form-update-door2door">         
                <input type="hidden"   id="update-id-door2door" name="update-id-door2door"  value="">          
                 <!-- -->      
                <div class="row">
                  <div class="col-sm-12">                  
                    <div class="row">
                      <div class="col-sm-12  h6" >
                          <label>Nombre</label>
                      </div>
                    </div>
                    <input type="text"  id="update-nombre-door2door" style="background:#D1F0F5;"  name="update-nombre-door2door" placeholder="Nombre" class="form-control" style="background:#D1F0F5;"   >
                  </div>
                </div><br>  
                <!-- -->                  
                <div class="row">
                  <div class="col-sm-12">
                    <div class="row"> 
                      <div class="col-sm-12"> <label>Pais<label></div>
                    </div>
                    <div class="row"> 
                      <div class="col-sm-12"> 
                        <input  type="hidden" id="update-idpais-door2door">
                        <select class="custom-select" id="update-pais-door2door" name="update-pais-door2door" style="background:#D1F0F5;" >
                        </select>
                      </div>
                    </div>                  
                  </div>
                </div><br>               
                  <div class="row">
                    <div class="col-sm-5">   
                      <button type="button" class="btn btn-primary btn-block" id="button-update-door2door" >Actualizar</button>                     
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5" >   
                      <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal" >Regresar</button>
                    </div>
                  </div>               
              </form>
            </div>
        </div>
        
      </div><br>
    </div>
  </div>
</div>

