<!-- Modal -->
<div class="modal fade" id="modal-create-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Crear </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <form id="form-create-door2door" >    
              <!-- -->      
              <div class="row">
                <div class="col-sm-12">                  
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Nombre</label>
                    </div>
                  </div>
                  <input type="text"  id="create-nombre-door2door" style="background:#D1F0F5;"  name="create-nombre-door2door" placeholder="Nombre" class="form-control" style="background:#D1F0F5;"   >
                </div>
              </div><br>   

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descripción</label>
                    <textarea class="form-control" id="create-descripcion-door2door" name="create-descripcion-door2door" placeholder="Descripción" rows="4"></textarea>
                  </div>
                </div>
              </div>    
                            
              <div class="row"> 
                <div class="col-sm-12"> 
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Tipo de cuestionario</label>
                    </div>
                  </div>
                  <select class="custom-select" id="create-tipoCuestionario-door2door" name="create-tipoCuestionario-door2door" style="background:#D1F0F5;" >
                    <option value="SOCIO VISITANTE">SOCIO VISITANTE</option>
                    <option value="SOCIO CLIENTE" >SOCIO CLIENTE</option>
                  </select>
                </div>
              </div> <br> 
             
              <div class="row">
                <div class="col-sm-5">   
                   <button type="button" class="btn btn-primary btn-block"   id="button-create-door2door" >Guardar</button>
                </div>
                <div class="col-sm-2"> </div>
                <div class="col-sm-5">   
                  <button type="button" class="btn btn-secondary btn-block" id="button-back-crate-door2door" data-dismiss="modal" >Regresar</button>
                </div>
              </div>
               <!-- -->   
            </form>
          </div>
        </div> <hr>
          
      </div> <br>
    </div>
  </div>
</div>
