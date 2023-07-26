<?php 
    /*<Include classes>*/
        include_once('../ModulePugins/door2door.Pugins.GeneratorTocken.php');
    /*</Include classes>*/

    /*<Import>*/   
        use  d2dSocioWeb\Modules\ModulePugins\GeneradorTocken\GeneradorTocken as GeneradorTocken_index;
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
    <head>
        <title> door2door | Campañas </title>
        <link rel="icon" type="image/x-icon" href="/d2dSocioWeb/Modules/ModulesImage/door2door.png">
        <?php include_once('../../head.php'); ?>     
    </head>
    <body class=" sidebar-mini layout-fixed" style="">
        <div id="body-main-div" class="body-main" >
            <div class="center">
                <img  class="img-fluid"  src="https://c.tenor.com/XK37GfbV0g8AAAAi/loading-cargando.gif"  />       
            </div>
        </div>
        <div id="id-main" class="opacidad"> 
            <div class="wrapper">
                    <style>
                        /* Start: Google Maps Responsive */
                        .map-responsive {
                            overflow:hidden;
                            padding-bottom:100%; /*Reduce este valor si el mapa fuera muy alto, por ejemplo 250px, puedes usar porcentajes, 50%*/
                            position:relative;
                            height:100%;
                        }
                        .map-responsive iframe{
                            left:0;
                            top:0;
                            height:100%;
                            width:100%;
                            position:absolute;
                        }
                        /* End: Google Maps Responsive */
                    </style>  

                <?php include_once('../../NavSuperior.php');?>
                <!-- Menu -->
                <?php include_once('../../Menu.php');?>
                
                <!-- Interior-->
                <div class="content-wrapper">
                    <div class="content-header titulo-morado titulo-morado" >
                        <div class="container-fluid">
                            <div class="container">
                                <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0">Inicio</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right" style="color#fff;">
                                        <li class="breadcrumb-item" ><a href="/d2dSocioWeb/Modules/Welcome/">Inicio /</a></li>                                
                                    </ol>
                                </div>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </div><br>
                    <!-- /.content-header -->

                    <!-- Main content -->
                    <section class="content">
                        <div id="map" class="map-responsive" style="margin:5px;" ></div>                           
                    </section>
                    <!-- /.content -->
                </div>
                <!-- footer -->
                    <?php include_once('../../footer.php');?>     
                <!-- footer -->  
            </div> 
        </div>
        <!-- complement -->
            <?php include_once('../../complement.php');?>
        <!-- complement -->
        <!-- Script -->
            <?php include_once('ScriptStaticEvents.php');?> 
            <?php include_once('ScriptDinamic.php');?> 
            <?php include_once('ModalContactoinicio.php');?> 
        <!-- Script -->
            <input  type="hidden" value="<?= $URLtocken ?>" id="tocken-door2doors-01198756765345431234534">
        
    
        
    </body>
    <!-- -->
</html>
