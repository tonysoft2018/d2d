<!-- Modal -->
<div      class="modal fade" 
          id="modal-datos-bancarios-door2door" 
          data-backdrop="static"
          data-keyboard="false" 
          tabindex="-1" 
          aria-labelledby="exampleModalLabel" 
          aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tarjeta bancaria </h5>        
      </div>
      <div class="modal-body">
        <!-- -->     
        <div class="row">
          <div class="col-sm-12">
            <form id="form-update-door2door">  
                <div  class="row">            
                  <div class="col-sm-2"> </div>   
                  <div class="col-sm-2"> </div>             
                  <div class="col-sm-2" > </div>      
                  <div class="col-sm-2" > </div>     
                  <div class="col-sm-2">      
                    <button type="button" id="button-atras-datos-bancarios"   class="btn btn-primary btn-block"   >Atras </button>                                     
                  </div>
                  <div class="col-sm-2">      
                    <button type="button" id="button-siguiente-datos-bancarios"   class="btn btn-primary btn-block"  >Siguiente</button>                                     
                  </div>
                  
                </div><br> 

                <div class="row" style="margin:1px;text-align:left;">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Banco</label>
                      <input  type="text"  
                              id="update-banco-door2door" 
                              name="update-banco-door2door" 
                              disabled 
                              placeholder="Banco" 
                              class="form-control" 
                              style="background:#D1F0F5;"   >
                    </div>
                  </div>
                </div>
                <div class="row" style="margin:1px;text-align:left;">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Nombre de propietario</label>
                      <input  type="text"  
                              id="update-nombreDelPropietario-door2door" 
                              name="update-nombreDelPropietario-door2door" 
                              disabled 
                              placeholder="Nombre de propietario" 
                              class="form-control" 
                              style="background:#D1F0F5;"   >
                    </div>
                  </div>
                </div>
            
   

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
                
                          
            </form>
          </div>
        </div>
         <!--  Tarjeta bancaria -->  
         <div class="row">
          <div class="col-sm-12">
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
        </div><hr>
      </div><br>
    </div>
  </div>
</div>

