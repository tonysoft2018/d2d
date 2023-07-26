<?php 
/*<Include classes>*/
    include_once('../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  door2door\Modules\ModulePugins\GeneradorTocken\GeneradorTocken as GeneradorTocken_index;
/*</Import>*/

/*<Instaciacion de objetos>*/                
    $ObjectToken = new GeneradorTocken_index();
/*</Instaciacion de objetos>*/

/*<Variables generales>*/
    $URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
    $URLtocken = $URL.'-'.$ObjectToken->generatorTocken('tocken-door2doors-01198756765345431234534ASDFSDFSDF-');
/*<Variables generales>*/
?>

<?= include_once('../../Session.php');?>
<!-- -->
<!DOCTYPE html>
<?php if(isset($_SESSION['rolUser-door2door']) && $_SESSION['rolUser-door2door'] == 'ADMINISTRADOR' ){?>

    <html lang="en">
        <!-- -->
            <head>
                <title> door2door | Socios </title>
                <?= include_once('../../head.php'); ?>     
            </head>
        <!-- -->
        <body class="hold-transition sidebar-mini layout-fixed">
            
            <div class="wrapper">

                <?= include_once('../../NavSuperior.php');?>
                <!-- Menu -->
                <?= include_once('../../Menu.php');?>
                
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
                                        <h1 class="m-0">Socios </h1>
                                    </div><!-- /.col -->
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="/door2door/Modules/Welcome/">Inicio</a></li>
                                        <i class="breadcrumb-item ">Socios </li>
                                        </ol>
                                    </div><!-- /.col -->
                                    </div><!-- /.row -->
                                </div>
                            </div><!-- /.container-fluid -->
                        </div>
                        <!-- /.content-header -->

                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <button type="button" 
                                                    class="btn btn-primary btn-block" 
                                                >
                                            PDF
                                            </button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" 
                                                    class="btn btn-primary btn-block" 
                                                    >
                                            EXCEL
                                            </button>
                                        </div>
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-2">
                                            <a  type="button" 
                                                href="/door2door/Modules/Welcome/"
                                                class="btn btn-secondary btn-block" 
                                                >
                                            Regresar
                                            </a>
                                        </div>
                                    </div>
                                </div>   
                                <br>
                                <div class="container">
                                    <div class="table-responsive">
                                        <table class="table  hover stripe row-borde" id="table-main-door2door">
                                            <thead class="thead-morado">
                                                <tr>
                                                    <th>Nombre</th>                                                  
                                                    <th>Apellido</th>    
                                                    <th>Tipo</th>                                           
                                                    <th>Socio</th>    
                                                    <th></th>
                                                </tr>
                                            </thead>

                                            <tbody id="table-main-door2door-informacion">
                                            </tbody> 

                                    
                                            </thead>                               
                                        </table>
                                    </div>
                                </div>                    
                            </div><!-- /.container-fluid -->         
                        </section>
                        <!-- /.content -->
                    </div>
                </div>

                <!-- Modales -->
                    <?= include_once('ModalUpdate.php');?> 
                    <?= include_once('ModalImagen.php');?> 
                    <?= include_once('ModalShow.php');?> 
                    <?= include_once('ModalVisitas.php');?> 
                    <?= include_once('ModalDetalleVisita.php');?> 
                    <?= include_once('ModalComision.php');?> 
                <!-- Modales -->
                
                <!-- Modales -->
                    <?= include_once('../ModulePugins/Modals/warning.php');?> 
                    <?= include_once('../ModulePugins/Modals/succes.php');?> 
                    <?= include_once('../ModulePugins/Modals/error.php');?> 
                <!-- Modales -->

                
                <!-- Modales -->
                    <?= include_once('ModuleRequest/ModalUpdate.php');        ?>  
                    <?= include_once('ModuleRequest/ModalImagen.php');        ?> 
                    <?= include_once('ModuleRequest/ModalAceptar.php');       ?>
                    <?= include_once('ModuleRequest/ModalContrato.php');      ?>
                    <?= include_once('ModuleRequest/ModalDelete.php');        ?>
                    <?= include_once('ModuleRequest/ModalRechazar.php');      ?>
                    <?= include_once('ModuleRequest/ModalIncompleto.php');    ?>
                    <?= include_once('ModuleRequest/ModalActiva.php');        ?>
                    <?= include_once('ModuleRequest/ModalInactivo.php');      ?>
                    <?= include_once('ModuleRequest/ModalSolicitudesIndex.php');      ?>

                <!-- Modales -->            
                
                <!-- Modales -->
                
                
                    <?= include_once('ModuleCampaign/ModalCampanas.php');              ?> 
                    <?= include_once('ModuleCampaign/ModalUpdate.php');                ?> 
                    <?= include_once('ModuleCampaign/ModalDetalleVisitas.php');        ?> 

                    
    
                
                <!-- Modales -->           
               

                <!-- Script -->
                    <?= include_once('ScriptStaticEvents.php');?> 
                    <?= include_once('ScriptDinamic.php');?> 
                <!-- Script -->

                <!-- footer -->
                    <?= include_once('../../footer.php');?>     
                <!-- footer -->  
            </div>
            <!-- complement -->
                <?= include_once('../../complement.php');?>
            <!-- complement -->
            <input  type="hidden" value="<?= $URLtocken ?>" id="tocken-door2doors-01198756765345431234534">
            
        
            
        </body>
        <!-- -->
    </html>
<?php }else{   header('Location: /door2door/closeSession/controller/closeSession.php'); }?>