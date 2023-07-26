<!-- Modal -->
<div class="modal fade" id="modal-update-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Detalles </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div  class="row" id="BOTONES-BORRADOR">                 
          <div class="col-sm-3">      
            <button type="button" class="btn btn-primary btn-block"   id="button-update-door2door" >Grabar</button>                                  
          </div>
          <div class="col-sm-3">  
            <button type="button" id="button-abrir"       class="btn btn-primary btn-block"  >Abrir</button>                                     
          </div>   
          <div class="col-sm-3">   
            <button type="button" id="button-contactos"    class="btn btn-primary btn-block"  >Contactos</button>                                     
          </div>       
          <div class="col-sm-3" >   
            <button type="button"    class="btn btn-secondary btn-block" data-dismiss="modal"  >Regresar</button>
          </div>
        </div><br> 

        <div  class="row" id="BOTONES-ABIERTO">      
          <div class="col-sm-3" >   
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal"  >Regresar</button>
          </div>           
          <div class="col-sm-3">      
            <button type="button" id="button-pdf"      class="btn btn-primary btn-block"    >PDF</button>                                     
          </div>
          <div class="col-sm-3">  
            <button type="button" id="button-excel"       class="btn btn-primary btn-block"  >EXCEL</button>                                     
          </div>    
        
        </div><br> 


        
        <div class="row">
          <div class="col-sm-12">
            <form id="form-update-door2door" >    
              <input type="hidden" id="update-id-door2door" name="update-id-door2door" > 
              <!-- -->      
              <div class="row">
                <div class="col-sm-6">                  
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Folio</label>
                    </div>
                  </div>
                  <input type="text" disabled id="update-folio-door2door" style="background:#D1F0F5;"  name="update-folio-door2door" placeholder="folio" class="form-control" style="background:#D1F0F5;"   >
                </div>
                <div class="col-sm-6">                  
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Fecha</label>
                    </div>
                  </div>
                  <input type="date" disabled id="update-fecha-door2door" style="background:#D1F0F5;"  name="update-fecha-door2door" placeholder="fehca" class="form-control" style="background:#D1F0F5;"   >
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
                  <input type="text"  id="update-nombre-door2door" style="background:#D1F0F5;"  name="update-nombre-door2door" placeholder="Nombre" class="form-control" style="background:#D1F0F5;"   >
                </div>
              </div><br>                
              <!-- -->   
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descripción</label>
                    <textarea class="form-control" id="update-descripcion-door2door" name="update-descripcion-door2door" placeholder="Descripción" rows="2"></textarea>
                  </div>
                </div>
                <div class="col-sm-6"> 
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Tipo de campaña</label>
                    </div>
                  </div>
                  <select class="custom-select" id="update-tipocampana-door2door" name="update-tipocampana-door2door" style="background:#D1F0F5;" >
                    <option value="VISITA">VISITA</option>
                    <option value="RECOLECCIÓN" selected>RECOLECCIÓN</option>
                    <option value="COBRANZA" selected>COBRANZA</option>
                  </select>
                </div>
              </div>     

             

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Instrucciones</label>
                    <textarea class="form-control" id="update-descripcionrecoleccion-door2door" name="update-descripcionrecoleccion-door2door" placeholder="Descripción" rows="2"></textarea>
                  </div>
                </div>
              </div>

              <div class="row" id="mostrar-informacion">
                <div class="col-sm-6">                  
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>estatus</label>
                    </div>
                  </div>
                  <input type="text" disabled id="update-estatus-door2door" style="background:#D1F0F5;"  name="update-estatus-door2door" placeholder="estatus" class="form-control" style="background:#D1F0F5;"   >
                </div>
                <div class="col-sm-6">                  
                  <div class="row">
                    <div class="col-sm-12  h6" >
                        <label>Socio</label>
                    </div>
                  </div>
                  <input type="text" disabled id="update-socio-door2door" style="background:#D1F0F5;"  name="update-socio-door2door" placeholder="socio" class="form-control" style="background:#D1F0F5;"   >
                </div>
              </div><br>          

              

              <div class="table-responsive" id="lista-visitas">
                  <table class="table  hover stripe row-borde" id="table-visitas-door2door" >
                      <thead class="thead-morado" >
                          <tr>
                              <th>Nombre</th>
                              <th>Telefono</th>    
                              <th>Fecha visita</th>     
                              <th>Estatus</th>   
                              <th>Accion</th>      
                              <th></th>
                          </tr>
                      </thead>

                      <tbody id="table-visitas-door2door-informacion">
                      </tbody> 

                                              
                  </table>
              </div>
               <!-- -->   
            </form>
          </div>
        </div> <hr>
          
      </div> <br>
    </div>
  </div>
</div>
