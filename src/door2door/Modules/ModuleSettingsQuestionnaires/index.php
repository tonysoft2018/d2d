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
                <title> door2door | Cuestionario </title>
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
                                        <h1 class="m-0">Cuestionario </h1>
                                    </div><!-- /.col -->
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="/door2door/Modules/Welcome/">Inicio</a></li>
                                        <i class="breadcrumb-item ">Cuestionario </li>
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
                                                    id="button-crear-door2door" >
                                            Guardar
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
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <form id="form-create-door2door" >    
                                                <!-- -->      
                                                <input type="hidden" value="0" id="create-id-door2door" name="create-id-door2door">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="row"> 
                                                            <div class="col-sm-12"> <label>Cuestionario  visitantes<label></div>
                                                        </div>
                                                        <div class="row"> 
                                                            <div class="col-sm-12"> 
                                                                <select class="custom-select" id="create-sv-door2door" name="create-sv-door2door" style="background:#D1F0F5;" >
                                                                
                                                                </select>
                                                            </div>
                                                        </div>                  
                                                    </div>
                                                </div><br> 
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="row"> 
                                                            <div class="col-sm-12"> <label>Cuestionario  clientes<label></div>
                                                        </div>
                                                        <div class="row"> 
                                                            <div class="col-sm-12"> 
                                                                <select class="custom-select" id="create-sc-door2door" name="create-sc-door2door" style="background:#D1F0F5;" >
                                                                
                                                                </select>
                                                            </div>
                                                        </div>                  
                                                    </div>
                                                </div><br> 
                                                
                                                                                
                                            </form>

                                        </div>                               
                                    </div>
                                </div>                    
                            </div><!-- /.container-fluid -->         
                        </section>
                        <!-- /.content -->
                    </div>
                </div>

                <!-- Modales -->
                <!-- Modales -->
                
                <!-- Modales -->
                    <?= include_once('../ModulePugins/Modals/warning.php');?> 
                    <?= include_once('../ModulePugins/Modals/succes.php');?> 
                    <?= include_once('../ModulePugins/Modals/error.php');?> 
                <!-- Modales -->


                <!-- Script -->
                    <?= include_once('ScriptStaticEvents.php');?> 
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


