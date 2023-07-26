<!-- Modal -->
<div class="modal fade" id="modal-ordenpago-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Orden de pago </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
            <div class="container">
              <div class="row">
                  <div class="col-sm-2">
                      <button type="button" 
                              class="btn btn-primary btn-block" 
                              id="button-ordenpago-informacion"
                                >
                                Orden de pago
                      </button>
                  </div>
                  <div class="col-sm-2"></div>
                  <div class="col-sm-6"></div>
                  <div class="col-sm-2">
                      <button  type="button" 
                          data-dismiss="modal"
                          class="btn btn-secondary btn-block" 
                          >
                      Regresar
                      </button>
                  </div>
              </div>
              <input type="hidden" id="ordenpago-id-door2door" name="ordenpago-id-door2door" value="0">
              <div class="row">
                  <div class="col-sm-4">
                      <div class="row"> 
                          <div class="col-sm-12"> <label>Folio<label></div>
                      </div>
                      <input type="text" disabled style="background:#D1F0F5;" id="ordenpago-folio-door2door" name="ordenpago-folio-door2door" class="form-control campo-obligatorio"  placeholder="Folio" aria-label="Nombre" >
                  </div>
                  <div class="col-sm-4">
                      <div class="row"> 
                          <div class="col-sm-12"> <label>Fecha<label></div>
                      </div>
                      <input type="date" disabled style="background:#D1F0F5;" id="ordenpago-fecha-door2door" name="ordenpago-fecha-door2door" class="form-control campo-obligatorio"  placeholder="Fecha" aria-label="Nombre" >
                  </div>
                  <div class="col-sm-4">
                      <div class="row"> 
                          <div class="col-sm-12"> <label>Estatus<label></div>
                      </div>
                      <input type="text" disabled style="background:#D1F0F5;" id="ordenpago-estatus-door2door" name="ordenpago-estatus-door2door" class="form-control campo-obligatorio"  placeholder="Fecha" aria-label="Nombre" >
                  </div>
              </div><br>
              <div class="table-responsive">
                  <table class="table  hover stripe row-borde" id="table-visits-ordenpago-door2door">
                      <thead class="thead-morado">
                          <tr>                                          
                                                                         
                              <th>Nombre</th>                                           
                              <th>Telefono</th>
                              <th>Fecha visita</th>
                              <th>Socio visitante</th>   
                              <th>Comisión</th>                                
                          </tr>
                      </thead>

                      <tbody id="table-visits-ordenpago-door2door-informacion">
                      </tbody> 

                  
                      </thead>                               
                  </table>
              </div>
            </div>     
            </div>
        </div>
        
      </div><br>
    </div>
  </div>
</div>

