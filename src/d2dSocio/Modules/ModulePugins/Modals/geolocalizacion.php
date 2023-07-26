<div    class="modal fade"  
        id="modal-message-geolocalizacion-door2door" 
        data-backdrop="static"
        data-keyboard="false" 
        tabindex="-1"
        aria-labelledby="staticBackdropLabel" 
        aria-hidden="true"
        style="color:#fff;"
    >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color:#000;">Mensaje</h5>                
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <center>
                            <img class="img-fluid"  src="<?= $URL?>/d2dVisitador/Modules/ModulesImage/precaucion.png" style="width:150px;height:150px;"  ><br> 
                        <center>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-12">
                        <center>
                            <h4 id="message-geolocalizacion-door2door" style="color:#000;" ></h4>
                        </center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <a      type="button"    
                                id="button-recargar-door2door"
                                class="btn btn-secondary btn-block" >
                            Recargar
                        </a>
                    </div>
                    <script>
                        let refresh = document.getElementById('button-recargar-door2door');
                        refresh.addEventListener('click', _ => {
                                    location.reload();
                        })
                    </script>
                      
            </div>
            </div>
           <br>
        </div>
    </div>
</div>