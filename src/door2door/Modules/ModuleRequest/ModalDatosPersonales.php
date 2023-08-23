<!-- Modal -->
<div    class="modal fade" 
        id="modal-datos-personales-door2door" 
        data-backdrop="static"
        data-keyboard="false" 
        tabindex="-1" 
        aria-labelledby="exampleModalLabel" 
        aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos Personales </h5>
      </div>
      <div class="modal-body">
        <!-- -->     
        <div class="row">
          <div class="col-sm-12">
            <form id="form-update-door2door">         
                <input type="hidden"   id="update-idUsuario-door2door"  name="update-idUsuario-door2door"  value="">
                <input type="hidden"   id="update-id-door2door"         name="update-id-door2door"  value="">  
                <input type="hidden"   id="update-folio-door2door"         name="update-id-door2door"  value="">      
                <div  class="row">                 
                  <div class="col-sm-2">      
                    <button type="button" id="button-contrato"   class="btn btn-primary btn-block" style="display:none;"  >Contrato</button>                                     
                  </div>
                  <div class="col-sm-2">      
                    <button type="button" id="button-activa"   class="btn btn-primary btn-block" style="display:none;"    >Activa</button>                                     
                  </div>
                  <div class="col-sm-2">  
                    <button type="button" id="button-incompleto" class="btn btn-primary btn-block" style="display:none;" >Incompleto</button>                                     
                  </div>   
                  <div class="col-sm-2">   
                    <button type="button" id="button-rechazar"  class="btn btn-primary btn-block" style="display:none;" >Rechazada</button>                                     
                  </div>             
                  <div class="col-sm-2" >   
                    <button type="button" id="button-inactivo"   class="btn btn-primary btn-block" style="display:none;" >Inactivo</button>      
                  </div>      
                  <div class="col-sm-2" >   
                    <button type="button" id="button-siguiente-datos-personales"   class="btn btn-primary btn-block" >Siguiente</button>
                  </div>
                </div><br>  
                <div class="row">
                    <div class="col-sm-10" > </div>  
                    <div class="col-sm-2">
                    <button type="button"  class="btn btn-secondary btn-block evento-regresar-mapa-sugerencias"  data-dismiss="modal"  >Regresar</button>
                  </div>
                </div><br> 
                <!-- Usuario -->
                <div class="row" style="margin:1px;text-align:left;">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Usuario</label>
                      <input type="text"  id="update-usuario-door2door" 
                                          name="update-usuario-door2door" 
                                          disabled placeholder="Usuario" 
                                          class="form-control" 
                                          style="background:#D1F0F5;"   >

                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Contraseña</label>
                      <input type="password"  id="update-contrasna-door2door" 
                                          name="update-contrasna-door2door" 
                                          disabled 
                                          placeholder="Contraseña" 
                                          value="11111111111"
                                          class="form-control" 
                                          style="background:#D1F0F5;"   >

                    </div>
                  </div>
                </div>

                <!-- Nombre -->
                <div class="row" style="margin:1px;text-align:left;">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Nombre</label>
                      <input type="text"  id="update-nombre-door2door" 
                                          name="update-nombre-door2door" 
                                          disabled 
                                          placeholder="Contraseña" 
                                          value="11111111111"
                                          class="form-control" 
                                          style="background:#D1F0F5;"   >

                    </div>
                  </div>
                </div>   

                <!-- Conraseña -->
                <div class="row" style="margin:1px;text-align:left;">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Apellidos</label>
                      <input type="text"  id="update-apellido-door2door" 
                                          name="update-apellido-door2door" 
                                          disabled 
                                          placeholder="Apellidos"
                                          class="form-control" 
                                          style="background:#D1F0F5;"   >

                    </div>
                  </div>
                </div>    
                
                <!-- Correo -->
                <div class="row" style="margin:1px;text-align:left;">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Correo</label>
                      <input type="text"  id="update-correo-door2door" 
                                          name="update-correo-door2door" 
                                          disabled 
                                          placeholder="correo"
                                          class="form-control" 
                                          style="background:#D1F0F5;"   >

                    </div>
                  </div>
                </div>    
                
                
                 <!-- Conraseña -->
                 <div class="row" style="margin:1px;text-align:left;">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Tipo de socio</label>
                      <input type="text"  id="update-tiposocio-door2door" 
                                          name="update-tiposocio-door2door" 
                                          disabled 
                                          placeholder="Tipo de socio"
                                          class="form-control" 
                                          style="background:#D1F0F5;"   >

                    </div>
                  </div>
                </div>   
                 <!-- Estatus -->
                 <div class="row" style="margin:1px;text-align:left;">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Estatus</label>
                      <input type="text"  id="update-Estatus-door2door" 
                                          name="update-Estatus-door2door" 
                                          disabled 
                                          placeholder="Estatus"
                                          class="form-control" 
                                          style="background:#D1F0F5;"   >

                    </div>
                  </div>
                </div> 
                <!--  Fotografia frente  -->  
                <div class="row">
                  <div class="col-sm-12">
                    <center>
                      <!-- -->  
                      <div class="row">
                        <div class="col-sm-12">
                          <h4>Fotografia frente </h4>
                        </div>
                      </div><br>
                      <!-- -->  
                      <div class="row">
                        <div class="col-sm-12">
                          <input type="hidden" value="" id="Fotografia-frente-imagen"> 
                          <div id="Fotografia-frente">
                          </div>
                        </div>
                      </div>
                    </center>
                  </div>
                </div><hr>

                        
            </form>
          </div>
        </div>

       
      </div><br>
    </div>
  </div>
</div>

