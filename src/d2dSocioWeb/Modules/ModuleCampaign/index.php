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
    <!-- -->
        <head>
            <title> door2door | Campañas </title>
            <link rel="icon" type="image/x-icon" href="/d2dSocioWeb/Modules/ModulesImage/door2door.png">

            <?php include_once('../../head.php'); ?>     
        </head>
    <!-- -->
    <body class="sidebar-mini layout-fixed">
        
        <div id="body-main-div" class="body-main" >
            <div class="center">
                <img  class="img-fluid"  src="https://c.tenor.com/XK37GfbV0g8AAAAi/loading-cargando.gif"  />       
            </div>
        </div>
        <div id="id-main" class="opacidad"> 
            <div class="wrapper">

                <?php include_once('../../NavSuperior.php');?>
                <!-- Menu -->
                <?php include_once('../../Menu.php');?>

                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->                
                    <div class="content-header titulo-morado">
                        <div class="container-fluid">
                            <div class="container">
                                <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0">Campañas</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/d2dSocioWeb/Modules/Welcome/">Inicio</a></li>
                                    <i class="breadcrumb-item ">Campañas</li>
                                    </ol>
                                </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div>
                        </div><!-- /.container-fluid -->
                    </div>
                    <section class="content">
                        <div class="container-fluid">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <button type="button" 
                                                class="btn btn-primary btn-block" 
                                                id="button-create-door2door"
                                                data-toggle="modal" 
                                                data-target="#modal-create-door2door" >
                                        Crear
                                        </button>
                                    </div>
                                    <div class="col-sm-8"></div>
                                    <div class="col-sm-2">
                                        <a  type="button" 
                                            href="/d2dSocioWeb/Modules/Welcome/"
                                            class="btn btn-secondary btn-block" 
                                            >
                                        Regresar
                                        </a>
                                    </div>
                                </div>
                            </div><br>
                            <div class="container">
                                <div class="table-responsive">
                                    <table class="table  hover stripe row-borde" id="table-main-door2door" >
                                        <thead class="thead-morado" >
                                            <tr>
                                                <th>Folio</th>
                                                <th>Fecha</th>    
                                                <th>Nombre</th>     
                                                <th>Socio</th>   
                                                <th>Tipo</th>                                            
                                                <th>Estatus</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody id="table-main-door2door-informacion">
                                        </tbody> 

                                                                
                                    </table>
                                </div>
                            </div>                    
                        </div><!-- /.container-fluid -->
                    </section>
                    
                </div>
                    
            
                
                <!-- Modales -->
                    <?php include_once('ModalUpdate.php');                ?> 
                    <?php include_once('ModalCreate.php');                ?> 
                    <?php include_once('ModalContactos.php');             ?> 
                    <?php include_once('ModalPausar.php');                ?> 
                    <?php include_once('ModalReanudar.php');              ?> 
                    <?php include_once('ModalCerrar.php');                ?> 
                    <?php include_once('ModalCancelacion.php');           ?> 
                    
                    <?php include_once('ModalPlantillaContactos.php');    ?> 
                    <?php include_once('ModalCargarContactos.php');       ?> 
                    <?php include_once('ModalGrabarCampana.php');         ?>

                    <?php include_once('ModalAbrirCampana.php');          ?> 
                    <?php include_once('ModalDeleteContacto.php');        ?>
                    <?php include_once('ModalDetalleVisitas.php');        ?> 
    
                
                <!-- Modales -->
                
                <!-- Modales -->
                    <?php include_once('../ModulePugins/Modals/warning.php')  ?> 
                    <?php include_once('../ModulePugins/Modals/succes.php');  ?> 
                    <?php include_once('../ModulePugins/Modals/error.php');   ?> 
                <!-- Modales -->


                <!-- Script -->
                    <?php include_once('ScriptStaticEvents.php');             ?> 
                    <?php include_once('ScriptDinamic.php');                  ?> 
                <!-- Script -->

                <!-- footer -->
                    <?php include_once('../../footer.php');?>     
                <!-- footer -->  
                
            </div>
        </div>
        <!-- complement -->
            <?php include_once('../../complement.php');?>
        <!-- complement -->
        <input  type="hidden" value="<?= $URLtocken ?>" id="tocken-door2doors-01198756765345431234534">
        
    
        
    </body>
    <!-- -->
</html>
