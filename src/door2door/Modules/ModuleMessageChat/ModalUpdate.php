<!-- Modal -->
<div class="modal  fade" id="modal-update-door2door"  data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chat </h5>
        
      </div>
      <div class="modal-body">
      <input type="hidden"  id="update-id-door2door">
      <input type="hidden" id="update-estatus-door2door">
       
        <div class="row"> 
          <div class="col-sm-12"> 
            
          </div>
        </div><br>         
        <!-- -->   
         
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
                      <input type="text" class="form-control" disabled id="update-nombre-door2door" style="background:#D1F0F5;">
                    </div>                   
                    <div class="card-body" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px;overflow: hidden;overflow: scroll; overflow-y: auto;"  id="update-chat-door2door">

                      

                    </div>
                    <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">                      
                        <textarea class="form-control form-control-lg" placeholder="Mensaje" id="update-mensaje-door2door" ></textarea>                 
                    </div>
                  
                  </div>

                </div>
            </div>
          </div>
        </section>

        <div class="row">
          <div class="col-sm-12">
            <button class="btn btn-primary btn-block" id="button-update-enviar-door2door" ><i class="fas fa-paper-plane"></i> Enviar</button>
          </div>
        </div><br>
        <div class="row">
          <div class="col-sm-12">  
            <button type="button" class="btn btn-secondary btn-block" id="button-back-crate-door2door" data-dismiss="modal" >Regresar</button>
          </div>
        </div><br>
        
          
      </div> 
    </div>
  </div>
</div>

