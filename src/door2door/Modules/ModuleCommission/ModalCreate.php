<!-- Modal -->
<div class="modal fade" id="modal-create-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Crear</h5>
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
                              id="button-procesar-informacion"
                                >
                      Procesar
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
              <div>
              
              <div class="row">
                  <div class="col-sm-6">
                      <div class="row"> 
                          <div class="col-sm-12"> <label>Folio<label></div>
                      </div>
                      <input type="text" style="background:#D1F0F5;" id="crear-folio-inicio-door2door" name="crear-folio-door2door" class="form-control" disabled  placeholder="Folio" aria-label="Nombre" >
                  </div>
                  <div class="col-sm-6">
                      <div class="row"> 
                          <div class="col-sm-12"> <label>Fecha<label></div>
                      </div>
                      <input type="date" style="background:#D1F0F5;" id="crear-fecha-inicio-door2door" name="crear-fecha-door2door" class="form-control" disabled  placeholder="Fecha" aria-label="Nombre" >
                  </div>
              </div><br>
              <div class="row">
                  <div class="col-sm-2">
                      <button type="button" 
                              class="btn btn-primary btn-block" 
                              id="button-cargar-visistas">
                              
                      Cargar visistas
                      </button>
                  </div>
                  <div class="col-sm-2"></div>
                  <div class="col-sm-6"></div>
                  <div class="col-sm-2"></div>
              </div><br>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="crear-seleccionar-todos">
                <input type="hidden" value="0" id="crear-seleccionar-todos-input">
                <label class="form-check-label" for="exampleCheck1">Seleccionar todos</label>
              </div><br>

              <div class="table-responsive">
                  <table class="table  hover stripe row-borde" id="table-visits-door2door">
                      <thead class="thead-morado">
                          <tr>                                          
                              <th></th>                                                  
                              <th>Nombre</th>                                           
                              <th>Telefono</th>
                              <th>Fecha visita</th>
                              <th>Socio visitante</th>                              
                          </tr>
                      </thead>

                      <tbody id="table-visits-door2door-informacion">
                      </tbody> 

                  
                                                 
                  </table>
              </div>
            </div>     
          </div>             
        </div> <hr>          
      </div> <br>
    </div>
  </div>
</div>
