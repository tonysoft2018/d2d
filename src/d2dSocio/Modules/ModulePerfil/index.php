<?php 
/*<Include classes>*/
    include_once('../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  d2dSocio\Modules\ModulePugins\GeneradorTocken\GeneradorTocken as GeneradorTocken_index;
/*</Import>*/

/*<Instaciacion de objetos>*/                
    $ObjectToken = new GeneradorTocken_index();
/*</Instaciacion de objetos>*/

/*<Variables generales>*/
    $URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
    $URLtocken = $URL.'-'.$ObjectToken->generatorTocken('tocken-door2doors-01198756765345431234534ASDFSDFSDF-');
?>

<?php include_once('../../Session.php');?>
<!-- -->
<!DOCTYPE html>


<html lang="en">
    <!-- -->
        <head>
            <title> D2D | Perfil</title>
            <?php include_once('../../head.php'); ?>     
        </head>
    <!-- -->
    <!-- -->
    <body class="hold-transition sidebar-mini layout-fixed">
        
        <div class="wrapper">
            

            <?php include_once('../../NavSuperior.php');?>
            <!-- Menu -->
            <?php include_once('../../Menu.php');?>
            
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
                                    <h1 class="m-0">Perfil</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/d2dSocioWeb/Modules/Welcome/">Inicio</a></li>
                                    <i class="breadcrumb-item ">Perfil</li>
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
                                                            <label>Nombres</label>
                                                        </div>
                                                    </div>
                                                    <input  type="text" 
                                                            style="background:#D1F0F5;" 
                                                            class="form-control" 
                                                            id="create-nombre-door2door" 
                                                            name="create-nombre-door2door" 
                                                            placeholder="Nombre"  >
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div  class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-12  h6" >
                                                            <label>Apellidos</label>
                                                        </div>
                                                    </div>
                                                    <input  type="text" 
                                                            style="background:#D1F0F5;" 
                                                            class="form-control" 
                                                            id="create-apellido-door2door" 
                                                            name="create-apellido-door2door" 
                                                            placeholder="Nombre" >
                                                </div>
                                            </div><br>

                                            
                                            <div class="row">
                                                <div  class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-12  h6" >
                                                            <label>Usuario</label>
                                                        </div>
                                                    </div>
                                                    <input  type="text" 
                                                            style="background:#D1F0F5;" 
                                                            class="form-control" 
                                                            disabled
                                                            id="create-usuario-door2door"
                                                            name="create-usuario-door2door"
                                                            placeholder="Usuarios" 
                                                            aria-label="Nombre" >
                                                </div>                                                   
                                            </div><br>
                                            <div class="row">
                                                <div class="col-sm-12">  
                                                    <center>
                                                        <div id="imagen-epmresa">
                                                        </div>
                                                    </center>
                                                </div>
                                            </div><br>
                                            

                                            <div class="row">
                                                <div class="col-sm-2" style="margin:4px;">
                                                    <button type="button" 
                                                            class="btn btn-primary btn-block"   
                                                            id="button-guardar-door2door" 
                                                            >Guardar</button>    
                                                </div>                                            
                                                <div class="col-sm-2" style="margin:4px;">
                                                    <button type="button" 
                                                            class="btn btn-info btn-block"   
                                                            id="button-contrasena-door2door" 
                                                                >Cambiar contraseña </button>    

                                                </div>
                                                <div class="col-sm-2" style="margin:4px;">
                                                    <button type="button" 
                                                            class="btn btn-info btn-block"   
                                                            id="button-imagen-door2door" 
                                                                >Cambiar de imagen </button>    

                                                </div>
                                                <div class="col-sm-8"></div>
                                            </div>
                                            
                                            

                                                                    
                                            
                                            
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
            <div class="modal fade"  id="modal-imagen-door2door" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Mensaje</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">                 
                                    <div class="row">
                                        <div class="col-sm-12  h6" >
                                            <label>Imagen</label>
                                        </div>
                                    </div>
                                    <form id="form-imagen-perfil-door2door" enctype="multipart/form-data">
                                    <input type="file"  id="file-imagen-door2door" name="update-users-new-contrasena-door2door" placeholder="Nueva contraseña" class="form-control" style="background:#D1F0F5;"   >
                                    </form><br>
                                </div>
                            </div><br>
                            
                            <div class="row">
                                
                                <div class="col-6">
                                    <button type="button" 
                                            class="btn btn-secondary  btn-block"  
                                            data-dismiss="modal" 
                                            >Cerrar</button>                
                                </div>
                                <div class="col-6">              
                                    <button class=" btn btn-primary btn-block" 
                                            id="button-imagen-guradar-door2door"  
                                            >Guardar</button>
                                </div>
                            </div>     
                        </div>
                        
                    </div>
                </div>
            </div>

            <?php include_once('ModalNewPassword.php');?> 
                <?php include_once('../ModulePugins/Modals/warning.php');?> 
                <?php include_once('../ModulePugins/Modals/succes.php');?> 
                <?php include_once('../ModulePugins/Modals/error.php');?> 
                        
                    
                

                <?php include_once('ScriptStaticEvents.php');?>  

                
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
