<!-- Modal -->
<div class="modal fade" id="modal-ordenpago-crear-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-gl">
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
                  <div class="col-sm-4">
                        <button 
                            type="button" 
                            class="btn btn-primary btn-block" 
                            id="button-pdf-informacion"
                                >
                               PDF
                        </button>
                  </div>
                  <div class="col-sm-4">
                        <button type="button" 
                              class="btn btn-primary btn-block" 
                              id="button-pdf-informacion"
                                >
                               EXCEL
                        </button>
                  </div>
                  <div class="col-sm-4">                    
                      <button  type="button" 
                          data-dismiss="modal"
                          class="btn btn-secondary btn-block" 
                          >
                      Regresar
                      </button>
                  </div>                  
              </div><br>
              <input type="hidden" id="ordenpago-id-door2door" name="ordenpago-id-door2door" value="0">
            
              <div class="table-responsive">
                  <table class="table  hover stripe row-borde" id="table-ordenpago-mostrar-door2door">
                      <thead class="thead-morado">
                          <tr>                                           
                              <th>Socio visitante</th>                                         
                              <th>CLABE</th>
                              <th>comisiún</th>                             
                          </tr>
                      </thead>
                      <tbody id="table-ordenpago-mostrar-door2door-informacion">
                      </tbody> 

                                               
                  </table>
              </div>
            </div>     
            </div>
        </div>
        
      </div><br>
    </div>
  </div>
</div>

