<!-- Modal -->
<div class="modal fade" id="modal-create-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Crear nuevo usuario</h5>
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
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Apellidos</label>
                    </div>
                  </div>
                  <input type="text"  id="create-apellidos-door2door" style="background:#D1F0F5;"  name="create-apellidos-door2door" placeholder="Apellidos" class="form-control" style="background:#D1F0F5;"   >
                </div>
              </div><br>          
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Usuario</label>
                    </div>
                  </div>
                    <input type="text"  id="create-usuario-door2door" name="create-usuario-door2door" placeholder="Usuario" class="form-control" style="background:#D1F0F5;"   >
                </div>
              </div><br>  
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Contraseña</label>
                    </div>
                  </div>
                  <input type="password"  id="create-contrasena-door2door" name="create-contrasena-door2door" placeholder="Contraseña" class="form-control" style="background:#D1F0F5;"   >
                </div>
              </div><br>  
              <div class="row">
                <div class="col-sm-12">                 
                  <div class="row">
                      <div class="col-sm-12  h6" >
                          <label>Repetir contraseña</label>
                      </div>
                  </div>
                  <input type="password"  id="create-repetir-contrasena-door2door" name="create-repetir-contrasena-door2door" placeholder="Repetir contraseña" style="background:#D1F0F5;"  class="form-control" style="background:#D1F0F5;"   >
                </div>
              </div><br>
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Correo electrónico</label>
                    </div>
                  </div>
                  <input type="text"  id="create-email-door2door" name="create-email-door2door" placeholder="Correo electrónico" style="background:#D1F0F5;"  class="form-control" style="background:#D1F0F5;"   >
                </div>
              </div><br> 
              <div class="row"> 
                <div class="col-sm-12"> 
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Rol</label>
                    </div>
                  </div>
                  <select class="custom-select" id="create-rol-door2door" name="create-rol-door2door" style="background:#D1F0F5;" >
                    <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                    <option value="OPERADOR" selected>OPERADOR</option>
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
