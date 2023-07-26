<!-- Modal -->
<div class="modal fade" id="modal-create-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
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
              <!-- -->   
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
                        <label>Tipo de campaña</label>
                    </div>
                  </div>
                  <select class="custom-select" id="create-tipo-door2door" name="create-tipo-door2door" style="background:#D1F0F5;" >
                    <option value="RECUPERACION"selected>RECUPERACION</option>
                    <option value="VALIDACION" >VALIDACION</option>
                    <option value="COBRANZA" >COBRANZA</option>
                  </select>
                </div>
              </div><br> 

              <div class="row"> 
                <div class="col-sm-12"> 
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Zona</label>
                    </div>
                  </div>
                  <select class="custom-select" id="create-zona-door2door" name="create-zona-door2door" style="background:#D1F0F5;" >
                   
                  </select>
                </div>
              </div> <br> 

              <div class="row">
                <div class="col-sm-6">                  
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Cantidad</label>
                    </div>
                  </div>
                  <input type="number"  id="create-cantidad-door2door" style="background:#D1F0F5;"  name="create-cantidad-door2door" placeholder="Cantidad" class="form-control" style="background:#D1F0F5;"   >
                </div>
                <div class="col-sm-6">                  
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Comisió</label>
                    </div>
                  </div>
                  <input type="number"  id="create-comision-door2door" style="background:#D1F0F5;"  name="create-comision-door2door" placeholder="Comisió" class="form-control" style="background:#D1F0F5;"   >
                </div>
              </div><br>       

              <div class="row">
                <div class="col-sm-12">
                  
                </div>
              </div>
             
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
