<!-- Modal -->
<div class="modal fade" id="modal-contactos-visita-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Visita </h5>
      </div>
      <div class="modal-body">

        <div class="row">         
          <div class="col-sm-3">
            
          </div>
          <div class="col-sm-3">
          
          </div>
          <div class="col-sm-3"></div>
          <div class="col-sm-3">
            <button  type="button" 
                  data-dismiss="modal"
                  class="btn btn-secondary btn-block" 
                  id="regresar-contactos-visita-door2door"
                  >
              Regresar
              </button>
          </div>
        </div><br>

        <form id="form-visita-contactos-door2door">
          <input type="hidden" id="visita-contactos-identifiador-door2door" name="visita-contactos-identifiador-door2door">
          <!-- [ Nombre ]  -->
          <div class="row" style="margin:4px;">
            <div class="col-sm-12">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Nombre</label>
                </div>
              </div>
              <input type="text" disabled style="background:#D1F0F5;"  id="visita-contactos-nombre-door2door"  name="visita-contactos-nombre-door2door" placeholder="Nombre" class="form-control"    >
            </div>            
          </div>         
     
          <!-- [ Estatus ]-->
          <div class="row" style="margin:4px;">           
            <div class="col-sm-12">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Estatus</label>
                </div>
              </div>
              <input type="text" disabled style="background:#D1F0F5;"  id="visita-contactos-estatus-door2door"  name="visita-contactos-estatus-door2door" placeholder="Telefono" class="form-control"   >
            </div>
          </div>

          <!-- [ Fecha visita ] -->
          <div class="row" style="margin:4px;">
            <div class="col-sm-12">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Fecha visita</label>
                </div>
              </div>
              <input type="text" disabled id="visita-contactos-fechavisita-door2door"   name="visita-contactos-fechavisita-door2door" placeholder="Email" class="form-control"   >
            </div>
          </div>    
           <!-- [ Socio visitador ] -->
          <div class="row" style="margin:4px;">
            <div class="col-sm-12">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Socio visitador</label>
                </div>
              </div>
              <input type="text" disabled id="visita-contactos-sociovistador-door2door"   name="visita-contactos-sociovistador-door2door" placeholder="Email" class="form-control"   >
            </div>
          </div>    
        </form>

        <div id="visita-contacto-evidencias">
        </div>
        
      </div> <br>
    </div>
  </div>
</div>
