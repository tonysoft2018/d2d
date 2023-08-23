<?php 
/*<Include classes>*/
    include_once('../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  d2dVisitador\Modules\ModulePugins\GeneradorTocken\GeneradorTocken as GeneradorTocken_index;
/*</Import>*/

/*<Instaciacion de objetos>*/                
    $ObjectToken = new GeneradorTocken_index();
/*</Instaciacion de objetos>*/

/*<Variables generales>*/
    $URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
    $URLtocken = $URL.'-'.$ObjectToken->generatorTocken('tocken-door2doors-01198756765345431234534ASDFSDFSDF-');
/*<Variables generales>*/
?>

<?php include_once('../../Session.php');?>
<!-- -->
<!DOCTYPE html>



    <html lang="en">
        <!-- -->
            <head>
                <title> door2door | Seguimientos </title>
                <?php include_once('../../head.php'); ?>     
            </head>
        <!-- -->
        <body class=" sidebar-mini layout-fixed">            
                <?php include_once('../../NavSuperior.php');?>
                <!-- Menu -->
                <?php include_once('../../Menu.php');?>
                
                <!-- Interior-->
                    <style>
                        /* Start: Google Maps Responsive */
                        .map-responsive {
                            overflow:hidden;
                            padding-bottom:150%; /*Reduce este valor si el mapa fuera muy alto, por ejemplo 250px, puedes usar porcentajes, 50%*/
                            position:relative;
                            height:100%;
                        }
                        .map-responsive iframe{
                            left:0;
                            top:0;
                            height:150%;
                            width:100%;
                            position:absolute;
                        }
                        /* End: Google Maps Responsive */
                    </style>  
                    
                    <div id="body-main-div" style="display:none">
                        <div class="center">
                            <img  class="img-fluid"  src="https://c.tenor.com/XK37GfbV0g8AAAAi/loading-cargando.gif"  />       
                        </div>
                    </div>
                    <div id="id-main" > 
                        <div class="row" style="margin:5px;" style="margin:5px;">
                            <div class="col-12">
                                <button  style="margin:5px;"
                                            type="button" 
                                            id="button-Registrar" 
                                            class="btn btn-success btn-block btn-sm" >
                                    Indicaciones y registro
                                </button>
                            </div>
                        </div>
                        
                        <div class="">
                            <div class="row">  
                                <div class="col-12" id="" >     
                                    <input type="hidden" id="show-latitud-door2door"> 
                                    <input type="hidden" id="show-logitud-door2door"> 
                                    <input type="hidden" id="show-idContacto-door2door"> 
                                    <input type="hidden" id="show-idVisita-door2door"> 
                                    <div id="map" class="map-responsive" style="margin:5px;border-radius: 15px;" ></div>
                                </div> 
                            </div> <hr>
                           
                            <div class="row" style="margin:5px;">                          
                                <div class="col-6">
                                      <!--
                                    <a  type="button" 
                                        style="margin:5px;"
                                        href="/d2dVisitador/Modules/Welcome/"
                                        class="btn btn-secondary btn-block btn-sm" 
                                        >
                                    Regresar
                                    </a>
                                     <button  style="margin:5px;"
                                            type="button" 
                                            id="button-Cancelar" 
                                            class="btn btn-danger btn-block btn-sm" >
                                        Cancelar
                                    </button>
                                        -->
                                </div>
                                <div class="col-6">
                                   
                                </div>
                               
                            </div>
                        </div>    
                    </div>                 
                       
                    
                  
                

               

                          
                    <?php include_once('ModalRegistrar.php');                             ?> 
                    <?php include_once('ModalEliminar.php');                              ?>
                    <?php include_once('ModalArchivo.php');                               ?> 
                    <?php include_once('ModalCancelar.php');                              ?>  
                    <?php include_once('ModalVisitado.php');                              ?>  
                    <?php include_once('ModalCancelacionesSucces.php');                   ?>     
                    <?php include_once('ModalComentarios.php');                           ?>       
                    <?php include_once('ModalEvidenciaDetalle.php');                      ?>   
                    <?php include_once('ModalAgendar.php');                               ?>   
                     
                  
                <!-- Modales -->
                
                <!-- Modales -->
                    <?php include_once('../ModulePugins/Modals/geolocalizacion.php');   ?>
                    <?php include_once('../ModulePugins/Modals/warning.php');           ?> 
                    <?php include_once('../ModulePugins/Modals/succes.php');            ?> 
                    <?php include_once('../ModulePugins/Modals/error.php');             ?> 
                <!-- Modales -->


                <!-- Script -->
                    <?php include_once('ScriptStaticEvents.php');                       ?> 
                    <?php include_once('ScriptDinamic.php');                            ?> 
                <!-- Script -->

                <!-- footer -->
                    <?php include_once('../../footer.php');?>     
                <!-- footer -->  
         
            <!-- complement -->
                <?php include_once('../../complement.php');?>
            <!-- complement -->
            <input  type="hidden" value="<?php echo $URLtocken; ?>" id="tocken-door2doors-01198756765345431234534">
            
        
            
        </body>
        <!-- -->
    </html>



