
<!-- Modal -->
<?php $URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";?>


<div class="modal fade" id="modal-close-session-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cerrar sesión </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" value="" id="id-eliminar-door2door">
        <div class="row">
            <div class="col-sm-12">
              <center>
                  <img class="img-fluid"  src="<?= $URL?>/d2dSocioWeb/Modules/ModulesImage/pregunta.png" style="width:150px;height:150px;"  >
                  <br> <br>
                  <h4>¿Desea continuar?</h4>
              </center>
            </div>
        </div>
        <div class="row">
            <div class="col-2"> </div>
            <div class="col-4">
              <a  href="<?= $URL ?>/d2dSocioWeb/closeSession/controller/closeSession.php" 
                  class="btn btn-primary btn-block" style="margin:4px;" >Si</a>
            </div>
           
            <div class="col-4">              
                <button type="button" 
                        class="btn btn-primary btn-block"  
                        data-dismiss="modal" >No</button>
            </div>
            
        </div>     
      </div>
      <br>
    </div>
  </div>
</div>

