<!-- Modal -->
<div    class="modal fade" 
        id="modal-datos-tarjetacirculacion-door2door" 
        data-backdrop="static"
        data-keyboard="false" 
        tabindex="-1" 
        aria-labelledby="exampleModalLabel" 
        aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tarjeta de circulacion </h5>
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
                    <button type="button" id="button-atras-datos-tarjetacirculacion"   class="btn btn-primary btn-block" >Atras</button>                                     
                  </div>
                  <div class="col-sm-2">      
                    <button type="button" id="button-siguiente-datos-tarjetacirculacion"   class="btn btn-primary btn-block"   >Siguiente </button>                                     
                  </div>
                </div><br>
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
            </form>
          </div>
        </div>     
        <!--  Tarjeta de circulación  -->  
        <div class="row">
          <div class="col-sm-12">
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
          
        </div><hr>
      </div><br>
    </div>
  </div>
</div>

