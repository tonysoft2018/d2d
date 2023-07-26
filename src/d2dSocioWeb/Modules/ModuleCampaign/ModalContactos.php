<!-- Modal -->
<div class="modal fade" id="modal-contactos-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Contactos </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-3">
              
          </div>
          <div class="col-sm-3">
              <button type="button" 
                      class="btn btn-primary btn-block" 
                      id="button-cargar-contactos-door2door">
              Cargar
              </button>
          </div>
          <div class="col-sm-3">
            <button type="button" 
                      class="btn btn-primary btn-block" 
                      id="button-plantilla-contactos-door2door">
              Plantilla
              </button>
          </div>
          <div class="col-sm-3">
              <button  type="button" 
                  data-dismiss="modal"
                  class="btn btn-secondary btn-block" 
                  >
              Regresar
              </button>
          </div>
        </div><br>
        <form id="form-contactos-door2door">
          <div class="row">
            <div class="col-sm-6">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Nombre</label>
                </div>
              </div>
              <input type="text"  id="create-contactos-nombre-door2door" style="background:#D1F0F5;"  name="create-contactos-nombre-door2door" placeholder="Nombre" class="form-control" style="background:#D1F0F5;"   >
            </div>
            <div class="col-sm-6">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Email</label>
                </div>
              </div>
              <input type="text"  id="create-contactos-email-door2door" style="background:#D1F0F5;"  name="create-contactos-email-door2door" placeholder="Email" class="form-control" style="background:#D1F0F5;"   >
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Calle</label>
                </div>
              </div>
              <input type="text"  id="create-contactos-calle-door2door" style="background:#D1F0F5;"  name="create-contactos-calle-door2door" placeholder="Calle" class="form-control" style="background:#D1F0F5;"   >
            </div>          
            <div class="col-sm-4">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Colonia</label>
                </div>
              </div>
              <input type="text"  id="create-contactos-colonia-door2door" style="background:#D1F0F5;"  name="create-contactos-colonia-door2door" placeholder="Colonia" class="form-control" style="background:#D1F0F5;"   >
            </div>
            <div class="col-sm-4">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Teléfono</label>
                </div>
              </div>
              <input type="text"  id="create-contactos-telefono-door2door" style="background:#D1F0F5;"  name="create-contactos-telefono-door2door" placeholder="Telefono" class="form-control"   >
            </div>
          </div>
        
          <div class="row">
            <div class="col-sm-4">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>No Exterior</label>
                </div>
              </div>
              <input type="text"  id="create-contactos-noexterior-door2door" style="background:#D1F0F5;"  name="create-contactos-noexterior-door2door" placeholder="No Exterior" class="form-control"    >
            </div>
            <div class="col-sm-4">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>No Interior</label>
                </div>
              </div>
              <input type="text"  id="create-contactos-nointerior-door2door" style="background:#D1F0F5;"  name="create-contactos-nointerior-door2door" placeholder="No Interior" class="form-control"  >
            </div>
            <div class="col-sm-4">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Código postal</label>
                </div>
              </div>
              <input type="text"  id="create-contactos-codigopostal-door2door" style="background:#D1F0F5;"  name="create-contactos-codigopostal-door2door" placeholder="Código postal" class="form-control" style="background:#D1F0F5;"   >
            </div>
          </div>
          <div class="row"> 
            <div class="col-sm-3"> 
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Pais</label>
                </div>
              </div>
              <select class="custom-select" id="create-contactos-pais-door2door" name="create-contactos-pais-door2door" style="background:#D1F0F5;" >
              </select>
            </div>
            <div class="col-sm-3"> 
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Estado</label>
                </div>
              </div>
              <select class="custom-select" id="create-contactos-estado-door2door" name="create-contactos-estado-door2door" style="background:#D1F0F5;" >
              </select>
            </div>
            <div class="col-sm-3"> 
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Municipio</label>
                </div>
              </div>
              <select class="custom-select" id="create-contactos-municipio-door2door" name="create-contactos-municipio-door2door" style="background:#D1F0F5;" >
              </select>
            </div>
            <div class="col-sm-3">                  
              <div class="row">
                <div class="col-sm-12  h6" >
                    <label>Entre que calles</label>
                </div>
              </div>
              <input type="text"  id="create-contactos-entreCalle-door2door"  style="background:#D1F0F5;" placeholder="Entre que calles" name="create-contactos-entreCalle-door2door"  class="form-control" style="background:#D1F0F5;"   >
            </div>
          </div> <br>
          <div class="row">
            <div class="col-sm-3">
              
              <button type="button" 
                      class="btn btn-primary btn-block" 
                      id="button-create-contactos-door2door" >
                Añadir
              </button>
            </div>
          </div>

        </form>
        <table class="table  hover stripe row-borde" id="table-contactos-door2door">
            <thead class="thead-morado">
                <tr>
                    <th>Nombre</th>
                    <th>Telefono</th>  
                    <th></th>
                </tr>
            </thead>

            <tbody id="table-contactos-door2door-informacion">
            </tbody> 

        
            </thead>                               
        </table>
       
          
      </div> <br>
    </div>
  </div>
</div>
