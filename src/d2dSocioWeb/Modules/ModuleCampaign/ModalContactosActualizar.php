<!-- Modal -->
<div class="modal fade" id="modal-contactos-actualizar-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Contactos </h5>
      </div>
      <div class="modal-body">

        <div class="row">         
          <div class="col-sm-3">
              <button type="button" 
                      class="btn btn-primary btn-block" 
                      id="button-actualizar-contactos-door2door" >
                actualizar
              </button>
              <button  type="button" 
                  style="display:none"
                  class="btn btn-secondary btn-block" 
                  id="detalle-contactos-mostrar-door2door"
                  >
                Detalles
              </button>
          </div>
          <div class="col-sm-3">
          
          </div>
          <div class="col-sm-3"></div>
          <div class="col-sm-3">
            <button  type="button" 
                  data-dismiss="modal"
                  class="btn btn-secondary btn-block" 
                  id="regresar-contactos-actualizar-door2door"
                  >
              Regresar
              </button>
          </div>
        </div><br>

        <form id="form-actualizar-contactos-door2door">
          <input type="hidden" id="actualizar-contactos-id-door2door"  name="actualizar-contactos-id-door2door">
          <!-- [ Nombre ]  -->
          <div class="row" style="margin:4px;">
            <div class="col-sm-12">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Nombre</label>
                </div>
              </div>
              <input type="text" style="background:#D1F0F5;"  id="actualizar-contactos-nombre-door2door"  name="actualizar-contactos-nombre-door2door" placeholder="Nombre" class="form-control"    >
            </div>            
          </div>         
          <!-- [ Calle ] [ Colonia ]  -->
          <div class="row" style="margin:4px;">
            <div class="col-sm-6">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Calle</label>
                </div>
              </div>
              <input type="text" style="background:#D1F0F5;"  id="actualizar-contactos-calle-door2door"   name="actualizar-contactos-calle-door2door" placeholder="Calle" class="form-control"   >
            </div>          
            <div class="col-sm-6">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Colonia</label>
                </div>
              </div>
              <input type="text" style="background:#D1F0F5;"  id="actualizar-contactos-colonia-door2door"  name="actualizar-contactos-colonia-door2door" placeholder="Colonia" class="form-control"  >
            </div>           
          </div>
        
          <!-- [ No Exterior ] [ No Interior ] [ Codigo postal ] -->
          <div class="row" style="margin:4px;">
            <div class="col-sm-2">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>No Exterior</label>
                </div>
              </div>
              <input type="text" style="background:#D1F0F5;" id="actualizar-contactos-noexterior-door2door"   name="actualizar-contactos-noexterior-door2door" placeholder="No Exterior" class="form-control"    >
            </div>
            <div class="col-sm-2">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>No Interior</label>
                </div>
              </div>
              <input type="text"  id="actualizar-contactos-nointerior-door2door"   name="actualizar-contactos-nointerior-door2door" placeholder="No Interior" class="form-control"  >
            </div>
            <div class="col-sm-3">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Código postal</label>
                </div>
              </div>
              <input type="text" style="background:#D1F0F5;" id="actualizar-contactos-codigopostal-door2door"  name="actualizar-contactos-codigopostal-door2door" placeholder="Código postal" class="form-control" >
            </div>
            <div class="col-sm-5">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Entre que calles</label>
                </div>
              </div>
              <input type="text"  id="actualizar-contactos-entreCalle-door2door"   placeholder="Entre que calles" name="actualizar-contactos-entreCalle-door2door"  class="form-control" >
            </div>           
          </div>

          <!-- [ Pais ] [ Estado ] [ Municipio ]-->
          <div class="row" style="margin:4px;"> 
            <div class="col-sm-4"> 
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Pais</label>
                </div>
              </div>
              <select class="custom-select" id="actualizar-contactos-pais-door2door" name="actualizar-contactos-pais-door2door" style="background:#D1F0F5;" >
              </select>
            </div>
            <div class="col-sm-4"> 
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Estado</label>
                </div>
              </div>
              <select class="custom-select" id="actualizar-contactos-estado-door2door" name="actualizar-contactos-estado-door2door" style="background:#D1F0F5;" >
              </select>
            </div>
            <div class="col-sm-4"> 
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Municipio</label>
                </div>
              </div>
              <select class="custom-select" id="actualizar-contactos-municipio-door2door" name="actualizar-contactos-municipio-door2door" style="background:#D1F0F5;" >
              </select>
            </div>
          </div>          

          <!-- [ Instrucciones ]-->
          <div class="row" style="margin:4px;">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Instrucciones</label>
                <textarea class="form-control" id="actualizar-contactos-instrucciones-door2door" name="actualizar-contactos-instrucciones-door2door" placeholder="Descripción" rows="4"></textarea>
              </div>
            </div>
          </div>
          <!-- [ Telefono ]-->
          <div class="row" style="margin:4px;">           
            <div class="col-sm-12">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Teléfono</label>
                </div>
              </div>
              <input type="text" style="background:#D1F0F5;"  id="actualizar-contactos-telefono-door2door"  name="actualizar-contactos-telefono-door2door" placeholder="Telefono" class="form-control"   >
            </div>
          </div>

          <!-- [ Email ] -->
          <div class="row" style="margin:4px;">
            <div class="col-sm-12">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Email</label>
                </div>
              </div>
              <input type="text"  id="actualizar-contactos-email-door2door"   name="actualizar-contactos-email-door2door" placeholder="Email" class="form-control"   >
            </div>
          </div>     

        </form>
          
      </div> <br>
    </div>
  </div>
</div>
