

<!-- Modal -->
<div class="modal fade" id="modal-notificaciones-main-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notificaciones </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden"  id="show-id-notificaciones-main-door2door">       
        <div class="row"> 
          <div class="col-sm-12">             
          </div>
        </div><br>        
            <style>
                #chat2 .form-control {
                  border-color: transparent;
                }

                #chat2 .form-control:focus {
                  border-color: transparent;
                  box-shadow: inset 0px 0px 0px 1px transparent;
                }

                .divider:after,
                .divider:before {
                  content: "";
                  flex: 1;
                  height: 1px;
                  background: #eee;
                }
            </style>
           
        <section style="background-color: #eee;">
          <div class="container py-5">
    
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-12 col-xl-12">
                  <div class="card" id="chat2"> 
                    <div class="card-header d-flex justify-content-between align-items-center p-3">
                    </div>                   
                    <div  class="card-body" 
                          data-mdb-perfect-scrollbar="true" 
                          style="position: relative; height: 400px;overflow: hidden;overflow: scroll; overflow-y: auto;"  
                          id="showchatnotificacionesmaindoor2door"
                        >
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">                      
                    </div>                  
                  </div>
                </div>
            </div>
          </div>
        </section>

        <div class="row">
          <div class="col-sm-12">
          </div>
        </div><br>
        <div class="row">
          <div class="col-sm-12">  
            <button type="button" class="btn btn-secondary btn-block" id="regresar-notificaciones-main-door2door" data-dismiss="modal" >Regresar</button>
          </div>
        </div><br>
      </div> 
    </div>
  </div>
</div>

