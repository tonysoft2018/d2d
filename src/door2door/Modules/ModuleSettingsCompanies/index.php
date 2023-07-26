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
?>

<?= include_once('../../Session.php');?>
<!-- -->
<!DOCTYPE html>
<?php if(isset($_SESSION['rolUser-door2door']) && $_SESSION['rolUser-door2door'] == 'ADMINISTRADOR' ){?>

    <html lang="en">
        <!-- -->
            <head>
                <title> D2D | Empresa</title>
                <?= include_once('../../head.php'); ?>     
            </head>
        <!-- -->
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
                        <div class="content-header titulo-morado titulo-morado titulo-morado titulo-morado">
                            <div class="container-fluid">
                                <div class="container">
                                    <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1 class="m-0">Empresa</h1>
                                    </div><!-- /.col -->
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="/door2door/Modules/Welcome/">Inicio</a></li>
                                        <i class="breadcrumb-item ">Empresa</li>
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
                                            <button type="button" class="btn btn-primary"   id="button-create-door2door" style="width:200px;">Guardar</button>    
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
                                    </div><br>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <form id="form-create-door2door" enctype="multipart/form-data">         
                                                <input type="hidden" id="create-id-door2door" name="create-id-door2door"  value="0">   
                                                        
                                                <div class="row">
                                                    <div  class="col-sm-12">
                                                        
                                                        <div class="row">
                                                            <div class="col-sm-12  h6" >
                                                                <label>Razon social</label>
                                                            </div>
                                                        </div>
                                                        <input type="text" style="background:#D1F0F5;" class="form-control" id="create-razonsocial-door2door" name="create-razonsocial-door2door" placeholder="Nombre" aria-label="Nombre" >
                                                    </div>
                                                </div><br>

                                                <div class="row">     
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="col-sm-12  h6" >
                                                                <label>RFC</label>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control"  id="create-rfc-door2door" name="create-rfc-door2door"  maxlength="13"  placeholder="RFC" aria-label="Nombre" >
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="col-sm-12  h6" >
                                                                <label>Imagen</label>
                                                            </div>
                                                        </div>
                                                        <input type="file" class="form-control" name="create-imagen-door2door"  maxlength="13" id="create-imagen-door2door" placeholder="RFC" aria-label="Nombre" > 
                                                    </div>
                                                </div><br>
                                                
                                                <div class="row">
                                                    <div class="col-sm-8">  
                                                        <div class="row">
                                                            <div class="col-sm-12  h6" >
                                                                <label>Domicilio</label>
                                                            </div>
                                                        </div>            
                                                        <textarea class="form-control" id="create-domicilio-door2door" name="create-domicilio-door2door" placeholder="Domicilio" rows="4"></textarea>
                                                    </div>
                                                    <div class="col-sm-4">  
                                                        <div id="imagen-epmresa">
                                                        </div>
                                                    </div>
                                                </div><br>

                                                <div class="row">
                                                    <div class="col-sm-4"> 
                                                        <div class="row">
                                                            <div class="col-sm-12  h6" >
                                                                <label>No Exterior</label>
                                                            </div>
                                                        </div>       
                                                        <input type="text" class="form-control"  maxlength="12" id="create-noexterior-door2door" name="create-noexterior-door2door" placeholder="No Exterior" aria-label="Nombre" >       
                                                    </div> 
                                                    <div class="col-sm-4">
                                                    <!-- NoInterior-->       
                                                        <div class="row">
                                                            <div class="col-sm-12  h6" >
                                                                <label>No Interior</label>
                                                            </div>
                                                        </div>   
                                                        <input type="text" class="form-control"  maxlength="12" id="create-nointerior-door2door" name="create-nointerior-door2door" placeholder="No Interior" aria-label="Nombre" >                                                                         
                                                    </div> 
                                                    <div class="col-sm-4">
                                                        <div class="row">
                                                            <div class="col-sm-12  h6" >
                                                                <label>Código postal</label>
                                                            </div>
                                                        </div> 
                                                        <input type="text" class="form-control"  maxlength="10" id="create-codigopostal-door2door" name="create-codigopostal-door2door" placeholder="Código postal" aria-label="Nombre" >
                                                    </div>
                                                </div> <br>

                                                <div  class="row">
                                                    
                                                    <div class="col-sm-4">  
                                                        <div class="row">
                                                            <div class="col-sm-12  h6" >
                                                                <label>Municipio</label>
                                                            </div>
                                                        </div>   
                                                        <input type="text" class="form-control" id="create-ciudad-door2door" name="create-ciudad-door2door" placeholder="Ciudad" aria-label="Nombre" >
                                                    </div> 
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="col-sm-12  h6" >
                                                                <label>Estado</label>
                                                            </div>
                                                        </div>  
                                                        <input type="text" class="form-control" id="create-estado-door2door" name="create-estado-door2door" placeholder="Estado" aria-label="Nombre" >
                                                    </div>
                                                    <div class="col-sm-6">
                                                    <!-- Pais -->        
                                                        <div class="row">
                                                            <div class="col-sm-12  h6" >
                                                                <label>Pais</label>
                                                            </div>
                                                        </div>           
                                                        <input type="text" class="form-control" id="create-pais-door2door" name="create-pais-door2door" placeholder="País" aria-label="Nombre" >
                                                    </div> 
                                                </div> <br>

                                                <div  class="row">
                                                    <div class="col-sm-4">
                                                        <div class="row">
                                                            <div class="col-sm-12  h6" >
                                                                <label>Colonia</label>
                                                            </div>
                                                        </div>             
                                                        <input type="text" class="form-control" id="create-colonia-door2door" name="create-colonia-door2door" placeholder="Colonia" aria-label="Nombre" >
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="row">
                                                            <div class="col-sm-12  h6" >
                                                                <label>telefono</label>
                                                            </div>
                                                        </div> 
                                                        <input type="text"  class="form-control" maxlength="12"    id="create-telefono-door2door" name="create-telefono-door2door" placeholder="Teléfono" aria-label="Nombre" >
                                                    </div> 
                                                    <div class="col-sm-4">
                                                        <div class="row">
                                                            <div class="col-sm-12  h6" >
                                                                <label>Celular</label>
                                                            </div>
                                                        </div> 
                                                        <input type="text" class="form-control" style="background:#D1F0F5;" maxlength="12" id="create-celular-door2door" name="create-celular-door2door" placeholder="Celular" aria-label="Nombre" >
                                                    </div>                                                    
                                                </div>  <br>

                                                <div  class="row">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-12  h6" >
                                                                <label>Celular</label>
                                                            </div>
                                                        </div>               
                                                        <input type="email" class="form-control"  id="create-email-door2door" name="create-email-door2door" placeholder="Email" aria-label="Nombre" >
                                                    </div> 
                                                </div> <br>                                             
                                                
                                                
                                            </form>         
                                                
                                        </div>
                                    </div>
                                </div>                    
                            </div><!-- /.container-fluid -->
                        </section>
                        <!-- /.content -->
                    </div>
                </div>
            
                <!-- Script -->

                    <?= include_once('../ModulePugins/Modals/warning.php');?> 
                    <?= include_once('../ModulePugins/Modals/succes.php');?> 
                    <?= include_once('../ModulePugins/Modals/error.php');?> 

                    <?= include_once('ScriptStaticEvents.php');?>                 
                    
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
