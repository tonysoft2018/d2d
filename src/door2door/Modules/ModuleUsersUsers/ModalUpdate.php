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
           
          </div>               
        </div><br>
        <div class="row">
            <div class="col-sm-12">
              <form id="form-update-door2door">         
                <input type="hidden"   id="update-id-door2door" name="update-id-door2door"  value="">          
                <div class="row">
                    <div class="col-sm-12">
                      <div class="input-group ">
                        <div class="input-group-prepend">
                          <span class="input-group-text"  style="width:150px;">Usuario</span>
                        </div>
                        <input type="text"  id="update-usuario-door2door" name="update-usuario-door2door" placeholder="Usuario" class="form-control" style="background:#D1F0F5;"   >
                      </div>
                    </div>
                  </div><br>  
                  <div class="row">
                    <div class="col-sm-12">                  
                      <div class="row">
                        <div class="col-sm-12  h6" >
                            <label>Apellidos</label>
                        </div>
                      </div>
                      <input type="text"  id="update-apellidos-door2door" style="background:#D1F0F5;"  name="update-apellidos-door2door" placeholder="Apellidos" class="form-control" style="background:#D1F0F5;"   >
                    </div>
                  </div><br>      
                  <div class="row">
                    <div class="col-sm-12">
                      <button type="button" id="update-cambiarcontrasena-door2door" class="btn btn-primary btn-lg btn-block">Cambiar contraseña</button>
                    </div>
                  </div><br>                    
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="input-group ">
                        <div class="input-group-prepend">
                          <span class="input-group-text"  style="width:150px;">Correo electrónico</span>
                        </div>
                        <input type="text"  id="update-email-door2door" name="update-email-door2door" placeholder="Correo electrónico" class="form-control" style="background:#D1F0F5;"   >
                      </div>
                    </div>
                  </div><br> 
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="input-group ">
                        <div class="input-group-prepend">
                          <span class="input-group-text"  style="width:150px;">Nombre</span>
                        </div>
                        <input type="text"  id="update-nombre-door2door" name="update-nombre-door2door" placeholder="Nombre" class="form-control" style="background:#D1F0F5;"   >
                      </div>
                    </div>
                  </div><br>  
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row"> 
                        <div class="col-sm-12"> <label>Tipo de usuario<label></div>
                      </div>
                      <div class="row"> 
                        <div class="col-sm-12"> 
                          <select class="custom-select" id="update-tipousuario-door2door" name="create-tipousuario-door2door" style="background:#D1F0F5;" >
                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                            <option value="USUARIO CON ROL" selected>USUARIO CON ROL</option>
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

