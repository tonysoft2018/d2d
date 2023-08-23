<!-- Modal -->
<div      class="modal fade" 
          id="modal-datos-domicilio-door2door" 
          data-backdrop="static"
          data-keyboard="false" 
          tabindex="-1" 
          aria-labelledby="exampleModalLabel" 
          aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Domicilio </h5>
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
                    <button type="button" id="button-atras-datos-domicilio"   class="btn btn-primary btn-block"   >Atras </button>                                     
                  </div>
                  <div class="col-sm-2">      
                    <button type="button" id="button-siguiente-datos-domicilio"   class="btn btn-primary btn-block"   >Siguiente</button>                                     
                  </div>
                  
                </div><br>  
                <input type="hidden"  id="update-latitud-door2door" >
                <input type="hidden"  id="update-longitud-door2door" >
                <!-- Calle -->
                <div class="row" style="margin:1px;text-align:left;">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Calle</label>
                      <input type="text"  id="update-calle-door2door" 
                                          name="update-calle-door2door" 
                                          disabled 
                                          placeholder="Calle" 
                                          class="form-control" 
                                          style="background:#D1F0F5;"   >

                    </div>
                  </div>
                </div>     
                <!-- Numero Exterior y Intteerior -->
                <div class="row" style="margin:1px;text-align:left;">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Número exterior</label>
                      <input type="text"  id="update-noExterior-door2door" 
                                          name="update-noExterior-door2door" 
                                          disabled 
                                          placeholder="Número exterior"                                           
                                          class="form-control" 
                                          style="background:#D1F0F5;"   >

                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Número interior</label>
                      <input type="text"  id="update-noInterior-door2door" 
                                          name="update-noInterior-door2door" 
                                          disabled 
                                          placeholder="Número interior" 
                                          class="form-control" 
                                          style="background:#D1F0F5;"   >

                    </div>
                  </div>
                </div>          

                <!-- codigoPostal -->
                <div class="row" style="margin:1px;text-align:left;">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Código postal</label>
                      <input type="text"  id="update-codigoPostal-door2door" 
                                          name="update-codigoPostal-door2door" 
                                          disabled 
                                          placeholder="Código postal"                                           
                                          class="form-control" 
                                          style="background:#D1F0F5;"   >

                    </div>
                  </div>
                  
                </div>     
                <!-- Colonia -->
                <div class="row" style="margin:1px;text-align:left;">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Colonia</label>
                      <input type="text"  id="update-colonia-door2door" 
                                          name="update-colonia-door2door" 
                                          disabled 
                                          placeholder="Colonia"                                           
                                          class="form-control" 
                                          style="background:#D1F0F5;"   >

                    </div>
                  </div>                  
                </div>       
                <!-- Municipio -->
                <div class="row" style="margin:1px;text-align:left;">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Municipio</label>
                      <input type="text"  id="update-Municipio-door2door" 
                                          name="update-Municipio-door2door" 
                                          disabled 
                                          placeholder="Municipio"                                           
                                          class="form-control" 
                                          style="background:#D1F0F5;"   >

                    </div>
                  </div>                  
                </div>    
                <!--Estado -->
                <div class="row" style="margin:1px;text-align:left;">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Estado</label>
                      <input type="text"  id="update-Estado-door2door" 
                                          name="update-Estado-door2door" 
                                          disabled 
                                          placeholder="Estado"                                           
                                          class="form-control" 
                                          style="background:#D1F0F5;"   >

                    </div>
                  </div>                  
                </div>     
                <!-- Pais -->
                <div class="row" style="margin:1px;text-align:left;">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Pais</label>
                      <input type="text"  id="update-Pais-door2door" 
                                          name="update-Pais-door2door" 
                                          disabled 
                                          placeholder="Pais"                                           
                                          class="form-control" 
                                          style="background:#D1F0F5;"   >

                    </div>
                  </div>                  
                </div>              
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div id="map-domicilio" class="map-responsive"  style="border-radius: 15px;" ></div>
          </div>
        </div>
        <!--  Comprobante de domicilio  -->  
        <div class="row">
          <div class="col-sm-12">
            <center>
              <!-- -->  
              <div class="row">
                <div class="col-sm-12">
                  <h4>Comprobante de domicilio  </h4>
                </div>
              </div>
              <!-- -->  
              <div class="row">
                <div class="col-sm-12">
                  <input type="hidden" value="" id="Comprobante-domicilio-imagen"> 
                  <div id="Comprobante-domicilio" style="width:200px;height:200px">
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

