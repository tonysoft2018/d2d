<div class="modal fade" id="modal-visitas-detalles-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalles Visitas </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
              <form id="form-visitas-detalles-door2door">         
                <input type="hidden"   id="visitas-id-door2door" name="visitas-id-door2door"  value="">          
                 <!-- -->      
                <div class="row">
                  <div class="col-sm-12">                  
                    <div class="row">
                      <div class="col-sm-12  h6" >
                          <label>Nombre</label>
                      </div>
                    </div>
                    <input type="text"  id="visitas-nombre-door2door" style="background:#D1F0F5;"  name="visitas-nombre-door2door" placeholder="Nombre" class="form-control" style="background:#D1F0F5;"   >
                  </div>
                </div><br>  
                <!-- -->  
                
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Descripción</label>
                      <textarea class="form-control" id="visitas-descripcion-door2door" name="visitas-descripcion-door2door" placeholder="Descripción" rows="4"></textarea>
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
                    <select class="custom-select" id="visitas-tipo-door2door" name="visitas-tipo-door2door" style="background:#D1F0F5;" >
                      
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
                    <select class="custom-select" id="visitas-zona-door2door" name="visitas-zona-door2door" style="background:#D1F0F5;" >                    
                    </select>
                  </div>
                </div> <br>
                 
                <div class="row">
                  <div class="col-sm-6">                  
                    <div class="row">
                      <div class="col-sm-12  h6" >
                          <label>Cantida</label>
                      </div>
                    </div>
                    <input type="number"  id="visitas-cantidad-door2door" style="background:#D1F0F5;"  name="visitas-cantidad-door2door" placeholder="Cantida" class="form-control" style="background:#D1F0F5;"   >
                  </div>
                  <div class="col-sm-6">                  
                    <div class="row">
                      <div class="col-sm-12  h6" >
                          <label>Comisió</label>
                      </div>
                    </div>
                    <input type="number"  id="visitas-comision-door2door" style="background:#D1F0F5;"  name="visitas-comision-door2door" placeholder="Comisió" class="form-control" style="background:#D1F0F5;"   >
                  </div>
                </div><br>       

                <div class="row">
                  <div class="col-sm-5">   
                    <button type="button" class="btn btn-primary btn-block" id="button-visitas-door2door" >Actualizar</button>                     
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

