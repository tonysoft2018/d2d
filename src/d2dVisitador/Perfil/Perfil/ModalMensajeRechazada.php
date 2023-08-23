<div    class="modal fade"  
        id="modal-message-rechazada-door2door" 
        data-keyboard="false" 
        data-backdrop="static"
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
                            <img class="img-fluid"  src="<?= $URL?>/assets/d2dlogo.png" style="width:150px;height:150px;"  ><br> 
                        <center>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-12">
                        <center>
                            <h4 id="message-rechazada-door2door" style="color:#000;"></h4>
                        </center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Comentario</label>
                            <textarea disabled class="form-control" id="show-comentario-rechazado-door2door" name="show-comentario-rechazado-door2door" placeholder="Descripción" rows="4"></textarea>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-12">
                        <a type="button" 
                                class="btn btn-primary btn-block"  
                                href="/d2dVisitador/closeSession/controller/closeSession.php"
                                
                                >Salir</a>  

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <center>
                    
                </center>
            </div>
        </div>
    </div>
</div>