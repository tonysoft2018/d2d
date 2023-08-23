<!-- Modal -->
<div class="modal fade" id="modal-registrar-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar visita</h5>
        
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
              <!--######################   [ EVIDENCIA # 1]   ######################### -->
                <form id="evidencias-comentarios-parte-door2door" enctype="multipart/form-data">        
                  <div class="row">
                      <div class="col-12">
                          <div class="row" style="margin:1px;">
                              <div class="col-6">   
                                  <button type="button" class="btn btn-success  btn-block  btn-sm"   id="button-registrar-visita-door2door" >Guardar</button>    
                              </div>
                              <div class="col-6">   
                                  <button type="button" class="btn btn-danger  btn-block  btn-sm"  id="button-Cancelar-registro" >Cancelar</button>                                                  
                              </div>              
                          </div> 
                          <div class="row" style="margin:3px;">
                              <div class="col-sm-12">
                                  <button  id="boton-comparti-direccion"
                                          class="btn btn-primary btn-block  btn-sm" >
                                      Google maps 
                                  </button>
                              </div>
                          </div>
                          <div class="row" style="margin:3px;">
                              <div class="col-sm-12">
                                <button type="button" data-dismiss="modal"  class="btn btn-secondary btn-block btn-sm" >
                                  Regresar al mapa
                                </button>
                              </div>
                          </div>
                          <div class="row" style="margin:3px;">
                              <div class="col-sm-12">
                                <button type="button" id="boton-Agendar-door2door"  class="btn btn-secondary btn-block btn-sm" >
                                  Pendiente
                                </button>
                              </div>
                          </div>

                          <div class="row" style="margin:3px;text-align:left;" id="div-comentario-agenda-contacto">
                            <div class="col-12">
                              <div class="form-group">

                                <label for="exampleFormControlTextarea1">Comentario de Agenda</label> 
                                <input type="hidden" id="domicilio-contacto-hidden" >
                                <textarea     disabled style="text-align:left;" 
                                          class="form-control" id="comentario-agenda-contacto" rows="4"></textarea>
                               
                              </div>
                            </div>
                          </div>
                         
                          

                          <div class="row " style="margin:3px;text-align:left;">
                            <div class="col-sm-12">                  
                              <div class="row">
                                <div class="col-sm-12  h6" >
                                    <label>Nombre</label>
                                </div>
                              </div>
                              <input disabled type="text" style="text-align:left;"  id="nombre-contacto-registro"  class="form-control"  >
                            </div>
                          </div>                          

                          <div class="row" style="margin:3px;text-align:left;">
                            <div class="col-sm-12">
                              <div class="row">
                                  <div class="col-9">
                                    <label for="exampleFormControlTextarea1">Domicilio</label> 
                                  </div>
                                  <div class="col-3">
                                    <button type="button"  onclick="ButtonDomicilio();" class="btn btn-outline-info  btn-block btn-sm"  
                                          id="button-domicilio-copy-door2door">
                                    Copy
                                    </button>
                                  </div>
                                </div>
                              <div class="form-group">
                                <input type="hidden" id="domicilio-contacto-hidden" value="asdfsadf">
                                <textarea     disabled style="text-align:left;" class="form-control" id="domicilio-contacto" rows="4">
                               
                              </div>
                            </div>
                          </div>
                          
                          <div class="row" style="margin:3px;text-align:left;">
                            <div class="col-sm-12">
                              <div class="form-group">                              
                              
                                <textarea disabled  style="text-align:left;" class="form-control" id="instrucciones-contacto" rows="5"></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row" style="margin:3px;text-align:left;">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-9">
                                    <label for="exampleFormControlTextarea1">Instrucciones</label> 
                                  </div>
                                  <div class="col-3">
                                    <button type="button"  onclick="ButtonInstrucciones();" id="button-Instrucciones-copy-door2door" class="btn btn-outline-info  btn-block btn-sm"  
                                          id="button-Instrucciones-copy-door2door"><span id="copyAnswer"></span>
                                    Copiar
                                    </button>
                                  </div>
                                </div>
                                <textarea disabled  style="text-align:left;" class="form-control" id="instrucciones-contacto-1" rows="5"></textarea>
                              </div>
                            </div>
                          </div>

                          <div class="row " style="margin:3px;text-align:left;">
                            <div class="col-sm-12">                  
                              <div class="row">
                                <div class="col-9">
                                  <label for="exampleFormControlTextarea1">Entre calles</label> 
                                </div>
                                <div class="col-3">
                                  <button type="button"  onclick="ButtonEntreCalle();"class="btn btn-outline-info  btn-block btn-sm"  
                                        id="button-entreCalle-copy-door2door">
                                  Copy
                                  </button>
                                </div>
                              </div>
                              <textarea disabled  style="text-align:left;" class="form-control" id="entreCalle-contacto"  rows="2"></textarea>
                            </div>
                          </div>    

                          <div class="row" style="margin:3px;text-align:left;">
                            <div class="col-sm-12">                  
                              <div class="row">
                                <div class="col-sm-12  h6" >
                                    <label>Tipo</label>
                                </div>
                              </div>
                              <input disabled type="text" style="text-align:left;"  id="tipoCampana-contacto-registro"  class="form-control"  >
                            </div>
                          </div> 

                          <div class="row" style="margin:3px;text-align:left;">
                            <div class="col-sm-12">
                                <div class="row">
                                  <div class="col-9">
                                    <label for="exampleFormControlTextarea1">Teléfono</label> 
                                  </div>
                                  <div class="col-3">
                                    <button type="button"  onclick="ButtonTelefono();" class="btn btn-outline-info  btn-block btn-sm"  
                                          id="button-telefono-copy-door2door">
                                    Copiar
                                    </button>
                                  </div>
                                </div>
                              <div class="form-group">
                                <textarea disabled style="text-align:left;" class="form-control" id="telefono-contacto" rows="2"></textarea>
                              </div>
                            </div>
                          </div> 
                      </div>                  
                  </div><r>         
                  <div class="row"  style="text-align:left;">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1" >Comentarios</label>
                        <textarea class="form-control"  style="text-align:left;" id="create-comentarios-door2door" name="create-comentarios-door2door" placeholder="Comentarios" rows="4"></textarea>
                      </div>
                    </div>
                  </div>    
                </form> 
              <!--##################################################################### -->
              
              <!--######################   [ EVIDENCIA # 1]   ######################### -->
                <form id="evidencias-primera-parte-door2door" enctype="multipart/form-data"  style="margin:1px;text-align:center;margin-top:3px;">        
                  <div class="row cursor" style="margin:1px;text-align:center;" >
                    <div class="col-sm-12">                  
                      <div class="row">
                        <div class="col-sm-12  h6" >
                            <label>Evidencia # 1</label>
                        </div>
                      </div>
                    </div>
                  </div> 
                  <div class="row">
                      <div class="col-6">   
                          <button type="button" class="btn btn-primary  btn-block"  id="button-cargar-primera-parte-door2door" >Cargar</button>                                                  
                      </div><br>  
                      <div class="col-6">   
                          <button type="button" class="btn btn-primary  btn-block"  id="button-eliminar-primera-parte-door2door" >Eliminar</button>                                                  
                      </div><br>            
                  </div><br>         
                  <div class="row" onclick="mostrarEvidencia('primera-evidencia');">                
                      <div class="col-sm-12" id="update-imagen-perfil-door2door">      
                        <center>            
                          <div id="media-primera-parte-door2door">
                              <img src="/door2door/Modules/ModulesImage/imagen.jpg"  style="width:200px;height:200px;" class="">
                          </div>                                
                        </center>    
                      </div>
                  </div><br>       
                </form> 
              <!--##################################################################### -->

              <!--######################   [ EVIDENCIA # 2]   ######################### -->
               <form id="evidencias-segunda-parte-door2door" enctype="multipart/form-data"  style="margin:1px;text-align:center;margin-top:3px;" >        
                  <div class="row cursor" style="margin:1px;text-align:center;" >
                    <div class="col-sm-12">                  
                      <div class="row">
                        <div class="col-sm-12  h6" >
                            <label>Evidencia # 2</label>
                        </div>
                      </div>
                    </div>
                  </div> 
                  <div class="row">                         
                      <div class="col-6">   
                          <button type="button" class="btn btn-primary  btn-block"  id="button-cargar-segunda-parte-door2door" >Cargar</button>                                                  
                      </div><br>
                      <div class="col-6">   
                          <button type="button" class="btn btn-primary  btn-block"  id="button-eliminar-segunda-parte-door2door" >Eliminar</button>                                                  
                      </div><br>         
                  </div><br>         
                  <div class="row" onclick="mostrarEvidencia('segunda-evidencia');">                
                      <div class="col-sm-12" id="update-imagen-perfil-door2door">                  
                        <center>            
                          <div id="media-segunda-parte-door2door">
                              <img src="/door2door/Modules/ModulesImage/imagen.jpg"  style="width:200px;height:200px;" class="">
                          </div>                                
                        </center>    
                      </div>
                  </div><br>       
                </form> 
              <!--##################################################################### -->

              <!--######################   [ EVIDENCIA # 3]   ######################### -->
               <form id="evidencias-tercera-parte-door2door" enctype="multipart/form-data"  style="margin:1px;text-align:center;margin-top:3px;">  

                  <div class="row cursor" style="margin:1px;text-align:center;" >
                    <div class="col-sm-12">                  
                      <div class="row">
                        <div class="col-sm-12  h6" >
                            <label>Evidencia # 3</label>
                        </div>
                      </div>
                    </div>
                  </div>       
                  <div class="row">
                      <div class="col-6">   
                          <button type="button" class="btn btn-primary  btn-block"  id="button-cargar-tercera-parte-door2door" >Cargar</button>                                                  
                      </div><br>  
                      <div class="col-6">   
                          <button type="button" class="btn btn-primary  btn-block"  id="button-eliminar-tercera-parte-door2door" >Eliminar</button>                                                  
                      </div><br>          
                  </div><br>         
                  <div class="row" onclick="mostrarEvidencia('tercera-evidencia');">                
                      <div class="col-sm-12" id="update-imagen-perfil-door2door">                  
                        <center>            
                          <div id="media-tercera-parte-door2door">
                              <img src="/door2door/Modules/ModulesImage/imagen.jpg"  style="width:200px;height:200px;" class="">
                          </div>                                
                        </center>    
                      </div>
                  </div><br>       
                </form> 
              <!--##################################################################### -->

              <!--######################   [ EVIDENCIA # 4]   ######################### -->
                <form id="evidencias-cuarta-parte-door2door" enctype="multipart/form-data"  style="margin:1px;text-align:center;margin-top:3px;" >  
                  <div class="row " style="margin:1px;text-align:center;" >
                    <div class="col-sm-12">                  
                      <div class="row">
                        <div class="col-sm-6  h6" >
                            <label>Evidencia # 4</label>
                        </div>
                      </div>
                    </div>
                  </div>       
                  <div class="row">
                      <div class="col-6">   
                          <button type="button" class="btn btn-primary  btn-block"  id="button-cargar-cuarta-parte-door2door" >Cargar</button>                                                  
                      </div><br> 
                      <div class="col-6">   
                          <button type="button" class="btn btn-primary  btn-block"  id="button-eliminar-cuarta-parte-door2door" >Eliminar</button>                                                  
                      </div><br> 
                  </div><br>       
                  <div class="row " onclick="mostrarEvidencia('cuarta-evidencia');">                
                      <div class="col-sm-12" id="update-imagen-perfil-door2door">                  
                        <center>            
                          <div id="media-cuarta-parte-door2door">
                              <img src="/door2door/Modules/ModulesImage/imagen.jpg"  style="width:200px;height:200px;" class="">
                          </div>                                
                        </center>    
                      </div>
                  </div><br>       
                </form> 
              <!--##################################################################### -->

              <!--######################   [ EVIDENCIA # 5]   ######################### -->
                <form id="evidencias-quinta-parte-door2door" enctype="multipart/form-data"  style="margin:1px;text-align:center;margin-top:3px;" >  
                  <div class="row cursor" style="margin:1px;text-align:center;">
                    <div class="col-sm-12">                  
                      <div class="row">
                        <div class="col-sm-12  h6" >
                            <label>Evidencia # 5</label>
                        </div>
                      </div>
                    </div>
                  </div>       
                  <div class="row">
                      <div class="col-6">   
                          <button type="button" class="btn btn-primary  btn-block"  id="button-cargar-quinta-parte-door2door" >Cargar</button>                                                  
                      </div><br>  
                      <div class="col-6">   
                          <button type="button" class="btn btn-primary  btn-block"  id="button-eliminar-quinta-parte-door2door" >Eliminar</button>                                                  
                      </div><br>           
                  </div><br>        
                  <div class="row"  onclick="mostrarEvidencia('quinta-evidencia');">                
                      <div class="col-sm-12" id="update-imagen-perfil-door2door">                  
                        <center>            
                          <div id="media-quinta-parte-door2door">
                              <img src="/door2door/Modules/ModulesImage/imagen.jpg"  style="width:200px;height:200px;" class="">
                          </div>                                
                        </center>    
                      </div>
                  </div><br>       
                </form> 
              <!--####################################################################### -->

              
              <!--######################   [ EVIDENCIA # 6]   ######################### -->
              <form id="evidencias-sexta-parte-door2door" enctype="multipart/form-data"  
                    style="margin:1px;text-align:center;margin-top:3px;" 
                    >  
                  <div class="row cursor"  >
                    <div class="col-sm-12">                  
                      <div class="row">
                        <div class="col-sm-12  h6" >
                            <label>Evidencia # 6</label>
                        </div>
                      </div>
                    </div>
                  </div>       
                  <div class="row">
                      <div class="col-6">   
                          <button type="button" class="btn btn-primary  btn-block"  id="button-cargar-sexta-parte-door2door" >Cargar</button>                                                  
                      </div><br>  
                      <div class="col-6">   
                          <button type="button" class="btn btn-primary  btn-block"  id="button-eliminar-sexta-parte-door2door" >Eliminar</button>                                                  
                      </div><br>           
                  </div><br>        
                  <div class="row" onclick="mostrarEvidencia('sexta-evidencia');">                
                      <div class="col-sm-12" id="update-imagen-perfil-door2door">                  
                        <center>            
                          <div id="media-sexta-parte-door2door">
                              <img src="/door2door/Modules/ModulesImage/imagen.jpg"  style="width:200px;height:200px;" class="">
                          </div>                                
                        </center>    
                      </div>
                  </div><br>       
                </form> 
              <!--####################################################################### -->
            </div>
        </div>
      </div>      
    </div>
  </div>
</div>

