<!-- Modal -->
<div class="modal fade" id="modal-show-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mostrar </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
                  <div class="col-sm-2"></div>
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
        <div class="row">
            <div class="col-sm-12">
            <input type="hidden" id="show-id-door2door" name="show-id-door2door" value="0">
              <div class="row">
                  <div class="col-sm-4">
                      <div class="row"> 
                          <div class="col-sm-12"> <label>Folio<label></div>
                      </div>
                      <input type="text"  disabled style="background:#D1F0F5;" id="show-folio-door2door" name="show-folio-door2door" class="form-control campo-obligatorio"  placeholder="Folio" aria-label="Nombre" >
                  </div>
                  <div class="col-sm-4">
                      <div class="row"> 
                          <div class="col-sm-12"> <label>Fecha<label></div>
                      </div>
                      <input type="date" disabled style="background:#D1F0F5;" id="show-fecha-door2door" name="show-fecha-door2door" class="form-control campo-obligatorio"  placeholder="Fecha" aria-label="Nombre" >
                  </div>
                  <div class="col-sm-4">
                      <div class="row"> 
                          <div class="col-sm-12"> <label>Estatus<label></div>
                      </div>
                      <input type="text" disabled style="background:#D1F0F5;" id="show-estatus-door2door" name="show-estatus-door2door" class="form-control campo-obligatorio"  placeholder="Fecha" aria-label="Nombre" >
                  </div>
              </div><br>
              <div class="table-responsive">
                  <table class="table  hover stripe row-borde" id="table-visits-show-door2door">
                      <thead class="thead-morado">
                          <tr>                                          
                                                                         
                              <th>Nombre</th>                                           
                              <th>Telefono</th>
                              <th>Fecha visita</th>
                              <th>Socio visitante</th>   
                              <th>Comisión</th>                       
                          </tr>
                      </thead>

                      <tbody id="table-visits-show-door2door-informacion">
                      </tbody> 

                  
                      </thead>                               
                  </table>
              </div>
            </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

