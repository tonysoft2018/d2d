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
<html lang="en">
    <!-- -->
        <head>
            <title> door2door | Rutas </title>
            <?= include_once('../../head.php'); ?>     
        </head>
    <!-- -->
    <body class="hold-transition sidebar-mini layout-fixed">
        
        <div class="wrapper">
            <?= include_once('../../preloader.php');?>

            <?= include_once('../../NavSuperior.php');?>
            <!-- Menu -->
            <?= include_once('../../Menu.php');?>
            
            <!-- Interior-->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header titulo-morado">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Rutas</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/door2door/Modules/Welcome/">Inicio</a></li>
                                <i class="breadcrumb-item ">Rutas</li>
                                </ol>
                            </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div>
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <center>
                        <img class="img-fluid" src="http://148.202.34.240:8008/app/seuomp/udg/construccion.jpg">
                    </center>
                    
                </section>
                <!-- /.content -->
            </div>

            <!-- Modales -->
                <?= include_once('ModalUpdate.php');?> 
                <?= include_once('ModalCreate.php');?> 
                <?= include_once('ModalDelete.php');?> 
                <?= include_once('ModalShow.php');?> 
                <?= include_once('ModalNewPassword.php');?> 
                <?= include_once('ModalAssignmentRoles.php');?> 
                <?= include_once('ModalShowSessions.php');?> 
                <?= include_once('ModalShowTracking.php');?> 
            <!-- Modales -->
            
            <!-- Modales -->
                <?= include_once('../ModulePugins/Modals/warning.php');?> 
                <?= include_once('../ModulePugins/Modals/succes.php');?> 
                <?= include_once('../ModulePugins/Modals/error.php');?> 
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
