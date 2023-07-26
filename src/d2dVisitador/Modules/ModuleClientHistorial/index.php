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
                <title> door2door | Historial </title>
                <?php include_once('../../head.php'); ?>     
            </head>
        <!-- -->
        <body class=" sidebar-mini layout-fixed">
            
            <div class="wrapper">           

                <?php include_once('../../NavSuperior.php');?>
                <!-- Menu -->
                <?php include_once('../../Menu.php');?>
                
                <!-- Interior-->
                <div id="body-main-div"  class="body-main">

                    <div class="center">
                        <img  class="img-fluid"  src="https://c.tenor.com/XK37GfbV0g8AAAAi/loading-cargando.gif"  />       
                    </div>

                </div>

                <div id="id-main" class="opacidad" > 
                    <div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        <div class="content-header titulo-morado">
                            <div class="container-fluid">
                                <div class="container">
                                    <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1 class="m-0"> Historial</h1>
                                    </div><!-- /.col -->
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="/d2dVisitador/Modules/Welcome/">Inicio</a></li>
                                        <i class="breadcrumb-item "> Historial </li>
                                        </ol>
                                    </div><!-- /.col -->
                                    </div><!-- /.row -->
                                </div>
                            </div><!-- /.container-fluid -->
                        </div>
                        <!-- /.content-header -->

                        <!-- Main content -->
                        <section class="content" style="color:#fffff;">
                            <div class="container-fluid">
                                <div class="container">
                                    <div class="row" style="margin-bottom:10px;" >
                                        <div class="col-sm-2">
                                        </div>
                                        <div class="col-sm-8"></div>
                                        <div class="col-sm-2">
                                            <a  type="button" 
                                                style="margin:5px;"
                                                href="/d2dVisitador/Modules/Welcome/"
                                                class="btn btn-secondary btn-block" 
                                                >
                                            Regresar
                                            </a>
                                        </div>
                                    </div>
                                </div>   
                                <div class="container">
                                    <div class="row" style="margin:5px;">
                                        <div class="col-sm-12">                  
                                            <div class="row">
                                                <div class="col-sm-12  h6"  style="text-align:center;" >
                                                    <label style="color:#000000;text-align:center;">Fecha</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px;" style="margin-bottom:15px;" >
                                        <div class="col-sm-12">
                                            <div class="input-group ">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"  style="width:80px;">Inicio</span>
                                                </div>
                                                <input type="date"  style="text-align:center;"  style="text-align:center"  id="create-fachaInicio-door2door" name="create-fachaInicio-door2door" placeholder="Calle" class="form-control"    >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px;" style="margin-bottom:15px;" >
                                        <div class="col-sm-12">
                                            <div class="input-group ">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"  style="width:80px;">Final</span>
                                                </div>
                                                <input type="date"  style="text-align:center;"  style="text-align:center"  id="create-fachaFinal-door2door" name="create-fachaFinal-door2door" placeholder="Calle" class="form-control"    >
                                            </div>
                                        </div>
                                    </div>
                                    
                                
                                    <div class="row" style="margin-bottom:10px;" >
                                        <div class="col-sm-12">   
                                            <button type="button" class="btn btn-primary btn-block"   id="button-buscar-door2door" >Buscar</button>
                                        </div>
                                    </div>            
                                <div class="row">  
                                        <div class="col-12" id="Information-main">  

                                        </div> 
                                    </div>
                                </div>                    
                            </div><!-- /.container-fluid -->         
                        </section>
                        <!-- /.content -->
                    </div>
                </div>

                <!-- Modales -->
                    <?php include_once('ModalUpdate.php');                              ?> 
                    <?php include_once('ModalCreate.php');                              ?> 
                    <?php include_once('ModalDelete.php');                              ?> 
                    <?php include_once('ModalShow.php');                                ?> 
                  
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
            </div>
            <!-- complement -->
                <?php include_once('../../complement.php');?>
            <!-- complement -->
            <input  type="hidden" value="<?php echo $URLtocken; ?>" id="tocken-door2doors-01198756765345431234534">
            
        
            
        </body>
        <!-- -->
    </html>


