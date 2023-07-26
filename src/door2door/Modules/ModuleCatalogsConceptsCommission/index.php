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

<?php include_once('../../Session.php');?>

<?php if(isset($_SESSION['rolUser-door2door']) && $_SESSION['rolUser-door2door'] == 'ADMINISTRADOR' ){?>
    <!-- -->
    <!DOCTYPE html>
    <html lang="en">
        <!-- -->
            <head>
                <title> door2door | Conceptos de comisión </title>
                <?php include_once('../../head.php'); ?>     
            </head>
        <!-- -->
        <body class="hold-transition sidebar-mini layout-fixed">
            
                <div id="body-main-div"  class="body-main">

                    <div class="center">
                        <img  class="img-fluid"  src="https://c.tenor.com/XK37GfbV0g8AAAAi/loading-cargando.gif"  />       
                    </div>
                    
                </div>

                <div id="id-main" class="opacidad" > 
                    <div class="wrapper">

                        <?php include_once('../../NavSuperior.php');?>
                        <!-- Menu -->
                        <?php include_once('../../Menu.php');?>
                        
                        <!-- Interior-->
                        <div class="content-wrapper">
                            <!-- Content Header (Page header) -->
                            <div class="content-header titulo-morado titulo-morado">
                                <div class="container-fluid">
                                    <div class="container">
                                        <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <h1 class="m-0">Conceptos de comisión</h1>
                                        </div><!-- /.col -->
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="/door2door/Modules/Welcome/">Inicio</a></li>
                                            <i class="breadcrumb-item ">Conceptos de comisión</li>
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
                                                        data-toggle="modal" 
                                                        data-target="#modal-create-door2door" >
                                                Crear
                                                </button>
                                            </div>
                                            <div class="col-sm-8"></div>
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
                                                        <th>#</th>
                                                        <th>Nombre</th>                                                  
                                                        <th>Tipo</th>        
                                                        <th>Comisión</th>                                         
                                                        <th>Cantidad</th>
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

                        <!-- Modales -->
                            <?php include_once('ModalUpdate.php');  ?> 
                            <?php include_once('ModalCreate.php');  ?> 
                            <?php include_once('ModalDelete.php');  ?> 
                            <?php include_once('ModalShow.php');    ?> 
                        <!-- Modales -->
                        
                        <!-- Modales -->
                        <?php include_once('../ModulePugins/Modals/warning.php');?> 
                        <?php include_once('../ModulePugins/Modals/succes.php');?> 
                        <?php include_once('../ModulePugins/Modals/error.php');?> 
                        <!-- Modales -->


                        <!-- Script -->
                        <?php include_once('ScriptStaticEvents.php');?> 
                        <?php include_once('ScriptDinamic.php');?> 
                        <!-- Script -->

                        <!-- footer -->
                        <?php include_once('../../footer.php');?>     
                        <!-- footer -->  
                    </div>
                </div>
            <!-- complement -->
                <?= include_once('../../complement.php');?>
            <!-- complement -->
            <input  type="hidden" value="<?= $URLtocken ?>" id="tocken-door2doors-01198756765345431234534">
            
        
            
        </body>
        <!-- -->
    </html>
<?php }else{   header('Location: /door2door/closeSession/controller/closeSession.php'); }?>
