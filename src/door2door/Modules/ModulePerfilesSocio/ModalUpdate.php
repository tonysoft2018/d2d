<!-- Modal -->
<div class="modal fade" id="modal-update-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Detalles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-2">   
              <button type="button" class="btn btn-primary btn-block"   id="button-update-door2door" >Guardar</button>
          </div>
          <div class="col-sm-2"> 
              <button type="button" class="btn btn-primary btn-block"   id="button-solicitud-mostrar-door2door" >solicitud</button>
          </div>
          <div class="col-sm-2"> 
              <button type="button" class="btn btn-primary btn-block"   id="button-campana-door2door" >Campaña</button>
          </div>
          <div class="col-sm-2"> 
              <button type="button" class="btn btn-primary btn-block"   id="button-visitas-door2door" >Visitas</button>
          </div>
          <div class="col-sm-2"> 
              <button type="button" class="btn btn-primary btn-block"   id="button-comisiones-door2door" >Comisiones</button>
          </div>
          <div class="col-sm-2">   
            <button type="button" class="btn btn-secondary btn-block" id="button-back-crate-door2door" data-dismiss="modal" >Regresar</button>
          </div>
        </div><br>
        <div class="row">
          <div class="col-sm-12">
            <form id="form-update-door2door" >    
              <!-- -->      
              <input type="hidden" value="0" id="update-id-door2door" name="update-id-door2door">
              <div class="row">

                <div class="col-sm-6">                  
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Usuario</label>
                    </div>
                  </div>
                  <input type="text" disabled  id="update-usuario-door2door"   name="update-usuario-door2door" style="background:#D1F0F5;" placeholder="Nombre" class="form-control" style="background:#D1F0F5;"   >
                </div>

                <div class="col-sm-6">                  
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Contraseña</label>
                    </div>
                  </div>
                  <input type="password" disabled id="update-contrasena-door2door"  name="update-contrasena-door2door"  style="background:#D1F0F5;" placeholder="Nombre" class="form-control" style="background:#D1F0F5;"   >
                </div>
                
              </div><br>                
              <!-- -->   
              <div class="row">                
                <div class="col-sm-12">                  
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Nombre</label>
                    </div>
                  </div>
                  <input type="text"  id="update-nombre-door2door"   name="update-nombre-door2door" style="background:#D1F0F5;" placeholder="Nombre" class="form-control" style="background:#D1F0F5;"   >
                </div>
              </div><br> 

              <div class="row">                
                <div class="col-sm-12">                  
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Apellido</label>
                    </div>
                  </div>
                  <input type="text"  id="update-apellido-door2door"  name="update-apellido-door2door" style="background:#D1F0F5;" placeholder="Nombre" class="form-control" style="background:#D1F0F5;"   >
                </div>
              </div><br> 

              <div class="row">                
                <div class="col-sm-6">                  
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Estatus</label>
                    </div>
                  </div>
                  <input type="text" disabled  id="update-estatus-door2door"  name="update-estatus-door2door" style="background:#D1F0F5;"  class="form-control" style="background:#D1F0F5;"   >
                </div>
                <div class="col-sm-6"> 
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Tipo de usuario</label>
                    </div>
                  </div>
                  <select class="custom-select" disabled id="update-tipo-door2door" name="update-tipo-door2door" style="background:#D1F0F5;" >
                    
                  </select>
                </div>
              </div><br> 
              <div class="row">                
                <div class="col-sm-12" id="update-imagen-door2door">                  
                  
                </div>
              </div><br> 

              <div class="row">
                  <div class="col-sm-2">   
                      <button type="button" class="btn btn-primary btn-block"   id="button-imegen-door2door" >Cargar</button>
                  </div>
                  <div class="col-sm-2">   
                      <button type="button" class="btn btn-primary btn-block"   id="button-eliminar-imagen-door2door" >Eliminar</button>
                  </div>
                  <div class="col-sm-8"></div>                    
              </div><br> 

            
              
             
              
               <!-- -->   
            </form>
          </div>
        </div> <hr>
          
      </div> <br>
    </div>
  </div>
</div>
