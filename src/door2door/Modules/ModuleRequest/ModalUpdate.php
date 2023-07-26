<!-- Modal -->
<div class="modal fade" id="modal-update-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- -->     
        <div class="row">
          <div class="col-sm-12">
            <form id="form-update-door2door">         
                <input type="hidden"   id="update-idUsuario-door2door"  name="update-idUsuario-door2door"  value="">
                <input type="hidden"   id="update-id-door2door"         name="update-id-door2door"  value="">      
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
                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal"  >Regresar</button>
                  </div>
                </div><br>  
                <div class="row">
                  <div class="col-sm-4">
                    <div class="input-group ">
                      <div class="input-group-prepend">
                        <span class="input-group-text"  style="width:150px;">Folio</span>
                      </div>
                      <input type="text"  id="update-folio-door2door" name="update-folio-door2door" disabled placeholder="Usuario" class="form-control" style="background:#D1F0F5;"   >
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="input-group ">
                      <div class="input-group-prepend">
                        <span class="input-group-text"  style="width:150px;">Usuario</span>
                      </div>
                      <input type="text"  id="update-usuario-door2door" name="update-usuario-door2door" disabled placeholder="Usuario" class="form-control" style="background:#D1F0F5;"   >
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="input-group ">
                      <div class="input-group-prepend">
                        <span class="input-group-text"  style="width:150px;">Contraseña</span>
                      </div>
                      <input type="password"  id="update-contrasna-door2door" name="update-contrasna-door2door" value="11111111111" disabled placeholder="Contraseña" class="form-control" style="background:#D1F0F5;"   >
                    </div>
                  </div>
                </div><br>           
                <div class="row">
                  <div class="col-sm-12">
                    <div class="input-group ">
                      <div class="input-group-prepend">
                        <span class="input-group-text"  style="width:150px;">Nombre</span>
                      </div>
                      <input type="text"  id="update-nombre-door2door" name="update-nombre-door2door" disabled placeholder="Nombre" class="form-control" style="background:#D1F0F5;"   >
                    </div>
                  </div>
                </div><br>                                     
                <div class="row">
                  <div class="col-sm-12">
                    <div class="input-group ">
                      <div class="input-group-prepend">
                        <span class="input-group-text"  style="width:150px;">Apellidos</span>
                      </div>
                      <input type="text"  id="update-apellido-door2door" name="update-apellido-door2door" disabled  placeholder="Apellidos" class="form-control" style="background:#D1F0F5;"   >
                    </div>
                  </div>
                </div><br>  
                <div class="row">
                  <div class="col-sm-6">
                    <div class="input-group ">
                      <div class="input-group-prepend">
                        <span class="input-group-text"  style="width:150px;">Tipo de socio</span>
                      </div>
                      <input type="text"  id="update-tiposocio-door2door" name="update-tiposocio-door2door" disabled placeholder="Tipo de socio" class="form-control" style="background:#D1F0F5;"   >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="input-group ">
                      <div class="input-group-prepend">
                        <span class="input-group-text"  style="width:150px;">Estatus</span>
                      </div>
                      <input type="text"  id="update-estatus-door2door" name="update-estatus-door2door" disabled placeholder="Estatus" class="form-control" style="background:#D1F0F5;"   >
                    </div>
                  </div>
                </div><br>              
            </form>
          </div>
        </div>

        <!--  INE  -->  
        <div class="row">
          <div class="col-sm-12">
            <center>
              <!-- -->  
              <div class="row">
                <div class="col-sm-6">
                  <h4>INE o Identificación</h4>
                </div>
              </div>
              <!-- -->  
              <div class="row">
                <div class="col-sm-6" style="width:200px;height:200px"> 
                    <input type="hidden" value="" id="INE-frente-imagen"> 
                    <div id="INE-frente" >
                    </div>
                </div>
                <div class="col-sm-6" style="width:200px;height:200px">
                    <input type="hidden" value="" id="INE-atras-imagen"> 
                    <div id="INE-atras" >
                    </div>
                </div>
              </div>
            </center>
          </div>
        </div><hr>

        <!--  Comprobante de domicilio  -->  
        <div class="row">
          <div class="col-sm-12">
            <center>
              <!-- -->  
              <div class="row">
                <div class="col-sm-6">
                  <h4>Comprobante de domicilio  </h4>
                </div>
              </div>
              <!-- -->  
              <div class="row">
                <div class="col-sm-6">
                  <input type="hidden" value="" id="Comprobante-domicilio-imagen"> 
                  <div id="Comprobante-domicilio" style="width:200px;height:200px">
                  </div>
                </div>
              </div>
            </center>
          </div>
        </div><hr>

        <!--  Tarjeta de circulación  -->  
        <div class="row">
          <div class="col-sm-6">
            <center>
              <!-- -->  
              <div class="row">
                <div class="col-sm-12">
                  <h4>Tarjeta de circulación</h4>
                </div>
              </div>
              <!-- -->  
              <div class="row">
                <div class="col-sm-12">
                  <input type="hidden" value="" id="Tarjeta-circulacion-imagen"> 
                  <div id="Tarjeta-circulacion" style="width:200px;height:200px">
                  </div>
                </div>
              </div>
            </center>
          </div>
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-12">
                <label for="exampleFormControlTextarea1">Tipo de vehículo</label>
                <input type="text"  id="update-Tipo-vehículo-door2door" 
                                    name="update-Tipo-vehículo-door2door" 
                                    disabled 
                                    placeholder="Tipo de vehículo" 
                                    class="form-control" 
                                    style="background:#D1F0F5;"   >
              </div>
            </div>            
          </div>

        </div><hr>

         <!--  Fotografia frente  -->  
         <div class="row">
          <div class="col-sm-12">
            <center>
              <!-- -->  
              <div class="row">
                <div class="col-sm-6">
                  <h4>Fotografia frente </h4>
                </div>
              </div>
              <!-- -->  
              <div class="row">
                <div class="col-sm-6">
                  <input type="hidden" value="" id="Fotografia-frente-imagen"> 
                  <div id="Fotografia-frente">
                  </div>
                </div>
              </div>
            </center>
          </div>
        </div><hr>

         <!--  Tarjeta bancaria -->  
         <div class="row">
          <div class="col-sm-6">
            <center>
              <!-- -->  
              <div class="row">
                <div class="col-sm-12">
                  <h4>Tarjeta bancaria</h4>
                </div>
              </div>
              <!-- -->  
              <div class="row">
                <div class="col-sm-12">     
                    <input type="hidden" value="" id="Tarjeta-bancaria-imagen">           
                    <div id="Tarjeta-bancaria">
                    </div>              
                </div>
              </div><br>
            </center>
          </div>
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-12">
                <label for="exampleFormControlTextarea1">Número de cuenta o CLABE interbancaria</label>
                <input type="text"  id="update-numeroCLABE-door2door" 
                                    name="update-numeroCLABE-door2door" 
                                    disabled 
                                    placeholder="Número de cuenta o CLABE interbancaria" 
                                    class="form-control" 
                                    style="background:#D1F0F5;"   >
              </div>
            </div><br>  
            
          </div>
        </div><hr>
        <div class="row">
          <div class="col-sm-12" id ="Respuestas-cuestinario-titulo">
            <h4>Respuesta al cuestionario</h4>
          </div>
        </div><br>

        <div class="row">
          <div class="col-sm-12" id ="Respuestas-cuestinario">
            
          </div>
        </div><br>

        <div class="row">
          <div class="col-sm-12" id="lista-de-comentarios-titulo">
            <h4>Comentarios</h4>
          </div>
        </div><br>

        <div class="row">
          <div class="col-sm-12" id="lista-de-comentarios">
            
          </div>
        </div><br>
       


        
      </div><br>
    </div>
  </div>
</div>

