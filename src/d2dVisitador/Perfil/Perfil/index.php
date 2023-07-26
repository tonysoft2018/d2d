<?php 
/*<Include classes>*/
    include_once('../../Modules/ModulePugins/door2door.Pugins.GeneratorTocken.php');
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
?>

<?php include_once('../../Session.php');?>
<!-- -->
<!DOCTYPE html>


    <html lang="en"  >
        <!-- -->
            <head style="color:FFFFFF;">
                <title> D2D | Perfil</title>
                <?php include_once('../../head.php'); ?>     
            </head>
        <!-- -->
        <!-- -->
        <body class=" sidebar-mini layout-fixed" style="color:FFFFFF;">    
                
            <div class="wrapper" style="color:#fffff;">              

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
                    <div class="content-wrapper" style="color:FFFFFF;">
                        <!-- Content Header (Page header) -->
                        <div class="content-header titulo-morado titulo-morado titulo-morado titulo-morado titulo-morado titulo-morado titulo-morado">
                            <div class="container-fluid">
                                <div class="container">
                                    <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1 class="m-0">Perfil</h1>
                                    </div><!-- /.col -->
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="/d2dVisitador/Modules/Welcome/">Inicio</a></li>
                                        <i class="breadcrumb-item ">Perfil</li>
                                        </ol>
                                    </div><!-- /.col -->
                                    </div><!-- /.row -->
                                </div>
                            </div><!-- /.container-fluid -->
                        </div>
                        <!-- /.content-header -->

                        <!-- Main content -->
                            <section class="content" style="color:FFFFFF;">
                                <div class="container-fluid">                        
                                    <div class="container">   
                                                    
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <!--######################   [ foto de perfil ]   ######################### -->
                                                    <form id="form-face-primera-door2door" enctype="multipart/form-data">               
                                                        <input type="hidden" id="create-id-face-primera-door2door" name="create-id-door2door"  value="0">  

                                                        <div  style="text-align:center;">
                                                            <div class="row">                
                                                                <div class="col-sm-12" id="button-Cargar-imegen-perfil-door2door" >
                                                                    <div  id="update-imagen-perfil-door2door">                  
                                                                        <img src="/door2door/Modules/ModulesImage/usuario.png" style="width:200px;height:200px;" class="img-circle elevation-2">
                                                                    </div>
                                                                </div>    
                                                            </div><br> 


                                                            <div class="row">
                                                                <div class="col-6">   
                                                                    <button type="button" class="btn btn-success  btn-block"   id="button-Continuar-face-primera-door2door" >Continuar</button>    
                                                                </div>
                                                                <div class="col-6">   
                                                                <a type="button" 
                                                                    class="btn btn-danger btn-block"  
                                                                    href="/d2dVisitador/closeSession/controller/closeSession.php"
                                                                    
                                                                    >Cancelar</a>                                                             </div><br>                 
                                                            </div><br> 
                                                        
                                                        </div>
                                                    </form> 
                                                <!--####################################################################### -->

                                                <!--######################   [ Captura de informacion del domicilio]   #### -->
                                                    <form id="form-face-segunda-door2door" enctype="multipart/form-data" style="display:none" style="color:#000000">        

                                                        <div id="face-segunda" style="text-align:center;">
                                                            <div class="row" style="margin:5px;">
                                                                <div class="col-sm-12">                  
                                                                    <div class="row">
                                                                        <div class="col-sm-12  h6" >
                                                                            <label style="color:#000000;text-align:center;">Calle</label>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text"  style="text-align:center;"  style="text-align:center"  id="create-calle-door2door" name="create-calle-door2door" placeholder="Calle" class="form-control"    >
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin:5px;">
                                                                <div class="col-sm-12">                  
                                                                    <div class="row">
                                                                        <div class="col-sm-12  h6" >
                                                                            <label style="color:#000000;text-align:center;">No Interior</label>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text"  style="text-align:center;" id="create-nointerior-door2door"  name="create-nointerior-door2door" placeholder="No Interior" class="form-control"    >
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin:5px;">
                                                                <div class="col-sm-12">                  
                                                                    <div class="row">
                                                                        <div class="col-sm-12  h6" >
                                                                            <label style="color:#000000;text-align:center;">No exterior</label>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text"  style="text-align:center;" id="create-noexterior-door2door"  name="create-noexterior-door2door" placeholder="No exterior" class="form-control"    >
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin:5px;">
                                                                <div class="col-sm-12">                  
                                                                    <div class="row">
                                                                        <div class="col-sm-12  h6" >
                                                                            <label style="color:#000000;text-align:center;">Codigo postal</label>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text"  style="text-align:center;" id="create-codigopostal-door2door"  name="create-codigopostal-door2door" placeholder=Codigo postal" class="form-control"    >
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin:5px;">
                                                                <div class="col-sm-12">                  
                                                                    <div class="row">
                                                                        <div class="col-sm-12  h6" >
                                                                            <label style="color:#000000;">Colonia</label>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text"  style="text-align:center;" id="create-colonia-door2door"  name="create-colonia-door2door" placeholder="Colonia" class="form-control"    >
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin:5px;"> 
                                                                <div class="col-sm-12"> 
                                                                    <div class="row">
                                                                        <div class="col-sm-12  h6" >
                                                                            <label style="color:#000000;text-align:center;">  Pais</label>
                                                                        </div>
                                                                    </div>
                                                                    <select class="custom-select" style="border-radius:15px;" id="create-pais-door2door" name="create-pais-door2door"  >
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin:5px;"> 
                                                                <div class="col-sm-12"> 
                                                                    <div class="row">
                                                                        <div class="col-sm-12  h6" >
                                                                            <label style="color:#000000;text-align:center;" >Estado</label>
                                                                        </div>
                                                                    </div>
                                                                    <select class="custom-select" style="border-radius:15px;" id="create-estado-door2door" name="create-estado-door2door"  >
                                                                    </select>
                                                                </div>                                                
                                                            </div>
                                                            <div class="row" style="margin:5px;margin-bottom:15px;"> 
                                                                <div class="col-sm-12"> 
                                                                    <div class="row">
                                                                        <div class="col-sm-12  h6" >
                                                                            <label  style="color:#000000;text-align:center;" >Municipio</label>
                                                                        </div>
                                                                    </div>
                                                                    <select class="custom-select" style="border-radius:15px;" id="create-municipio-door2door" name="create-municipio-door2door"  >
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row"  style="margin:5px;">
                                                                <div class="col-4">   
                                                                    <button type="button" class="btn btn-secondary  btn-block"   id="button-regresar-face-segunda-door2door" >Regresar</button>    
                                                                </div>
                                                                <div class="col-4">   
                                                                    <button type="button" class="btn btn-success  btn-block"   id="button-Continuar-face-segunda-door2door" >Continuar</button>    
                                                                </div>
                                                                <div class="col-4">   
                                                                    <a type="button" 
                                                                    class="btn btn-danger btn-block"  
                                                                    href="/d2dVisitador/closeSession/controller/closeSession.php"
                                                                    
                                                                    >Cancelar</a>                                                             </div><br>                 
                                                            </div><br> 
                                                        
                                                        </div>
                                                    </form> 
                                                <!--####################################################################### -->

                                                <!--#####################   [ Captura de las cordenadas de localizacion]  # -->
                                                    <form id="form-face-tercera-door2door" enctype="multipart/form-data"   style="display:none"> 
                                                        <div id="face-tercera" style="text-align:center;">
                                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21265.941286572448!2d-103.35347754116373!3d20.676795448761414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b1faa928f63f%3A0x25dcb2cdab10691a!2sCatedral%20de%20Guadalajara!5e0!3m2!1ses!2smx!4v1677476123618!5m2!1ses!2smx" width="100%" height="720" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                                                        </div> <br>
                                                        <div class="row">
                                                            <div class="col-4">   
                                                                <button type="button" class="btn btn-secondary  btn-block"   id="button-regresar-face-tercera-door2door" >Regresar</button>    
                                                            </div>
                                                            <div class="col-4">   
                                                                <button type="button" class="btn btn-success  btn-block"   id="button-Continuar-face-tercera-door2door" >Continuar</button>    
                                                            </div>
                                                            <div class="col-4">   
                                                                <a type="button" 
                                                                    class="btn btn-danger btn-block"  
                                                                    href="/d2dVisitador/closeSession/controller/closeSession.php"
                                                                    
                                                                    >Cancelar</a>                                                         </div>              
                                                        </div><br> 
                                                    </form> 
                                                <!--####################################################################### -->

                                                <!--######################   [ foto de Comprobante ]   #################### -->
                                                    <form id="form-face-cuarta-door2door" enctype="multipart/form-data"  style="display:none;"> 
                                                        <div id="face-cuarta" style="text-align:center;">
                                                            <div class="row">                
                                                                <div class="col-sm-12" id="update-imagen-door2door">                  
                                                                <h1 style="color:000000;">Comprobante de domicilio</h1>
                                                                </div>
                                                            </div><br> 

                                                            <div class="row">                
                                                                <div  class="col-sm-12"   id="button-Cargar-imegen-comprobante-door2door" >
                                                                    <div id="update-comprobante-door2door">                  
                                                                        <img src="/door2door/Modules/ModulesImage/imagen.jpg" style="width:200px;height:200px;" class="">
                                                                    </div>
                                                                </div>    
                                                            </div><br>

                                                            
                                                        </div><br> 
                                                        <div class="row">
                                                            <div class="col-4">   
                                                                <button type="button" class="btn btn-secondary  btn-block"   id="button-regresar-face-cuarta-door2door" >Regresar</button>    
                                                            </div>
                                                            <div class="col-4">   
                                                                <button type="button" class="btn btn-success  btn-block"   id="button-Continuar-face-cuarta-door2door" >Continuar</button>    
                                                            </div>
                                                            <div class="col-4">   
                                                                <a type="button" 
                                                                    class="btn btn-danger btn-block"  
                                                                    href="/d2dVisitador/closeSession/controller/closeSession.php"
                                                                    
                                                                    >Cancelar</a>                                                         </div>              
                                                        </div><br> 
                                                    </form> 
                                                <!--####################################################################### -->

                                                <!--######################   [ foto de INE Frente ]   ##################### -->
                                                    <form id="form-face-quinta-door2door" enctype="multipart/form-data"style="display:none"> 
                                                        <div id="face-quinta" style="text-align:center;">
                                                            <div class="row">                
                                                                <div class="col-sm-12" id="">                  
                                                                <h1 style="color:000000;">Foto de  INE frente</h1>
                                                                </div>
                                                            </div><br> 
                                                            <div class="row"> 
                                                                <div class="col-sm-12"  id="button-Cargar-imegen-INEF-door2door" >               
                                                                    <div id="update-imagen-INEF-door2door">                  
                                                                        <img src="/door2door/Modules/ModulesImage/imagen.jpg" style="width:200px;height:200px;" class="">
                                                                    </div>
                                                                </div>    
                                                            </div><br> 

                                                        

                                                        
                                                        </div><br>
                                                        <div class="row">
                                                            <div class="col-4">   
                                                                <button type="button" class="btn btn-secondary  btn-block"   id="button-regresar-face-quinta-door2door" >Rergresar</button>    
                                                            </div>
                                                            <div class="col-4">   
                                                                <button type="button" class="btn btn-success  btn-block"   id="button-Continuar-face-quinta-door2door" >Continuar</button>    
                                                            </div>
                                                            <div class="col-4">   
                                                                <a type="button" 
                                                                    class="btn btn-danger btn-block"  
                                                                    href="/d2dVisitador/closeSession/controller/closeSession.php"
                                                                    
                                                                    >Cancelar</a>                                                         </div>              
                                                        </div><br> 
                                                    </form> 
                                                <!--####################################################################### -->

                                                <!--######################   [ foto de INE Atras ]   ###################### -->
                                                    <form id="form-face-sexta-door2door" enctype="multipart/form-data"style="display:none"> 
                                                        <div id="face-sexta" style="text-align:center;">
                                                            <div class="row">                
                                                                <div class="col-sm-12" id="">                  
                                                                <h1 style="color:000000;">Foto INE atras</h1>
                                                                </div>
                                                            </div><br> 
                                                            <div class="row">      
                                                                <div class="col-sm-12"   id="button-Cargar-imegen-INED-door2door" >              
                                                                    <div  id="update-imagen-INED-door2door">                  
                                                                        <img src="/door2door/Modules/ModulesImage/imagen.jpg" style="width:200px;height:200px;" class="">
                                                                    </div>
                                                                </div>
                                                            </div><br>
                                                        
                                                        </div><br>
                                                        <div class="row">
                                                            <div class="col-4">   
                                                                <button type="button" class="btn btn-secondary  btn-block"   id="button-regresar-face-sexta-door2door" >Rergresar</button>    
                                                            </div>
                                                            <div class="col-4">   
                                                                <button type="button" class="btn btn-primary  btn-block"   id="button-Continuar-face-sexta-door2door" >Continuar</button>    
                                                            </div>
                                                            <div class="col-4">   
                                                                <a type="button" 
                                                                    class="btn btn-danger btn-block"  
                                                                    href="/d2dVisitador/closeSession/controller/closeSession.php"
                                                                    
                                                                    >Cancelar</a>                                                         </div>              
                                                        </div><br> 
                                                    </form> 
                                                <!--####################################################################### -->

                                                <!--######################   [ foto de trajeta de cirulacion ]   #########  -->
                                                    <form id="form-face-septima-door2door" enctype="multipart/form-data"style="display:none"> 
                                                        <div id="face-septima" style="text-align:center;">
                                                            <div class="row">                
                                                                <div class="col-sm-12" id="">                  
                                                                <h1 style="color:000000;">Foto de tarjeta de circulacion</h1>
                                                                </div>
                                                            </div><br> 
                                                            <div class="row"> 
                                                                <div class="col-sm-12"> 
                                                                    <div class="row">
                                                                        <div class="col-sm-12  h6" >
                                                                            <label style="color:#000000;text-align:center;" >Tipo de Vehiculo</label>
                                                                        </div>
                                                                    </div>
                                                                    <select class="custom-select" id="create-tipoVehiculo-door2door" name="create-estado-door2door"  >
                                                                    </select>
                                                                </div>                                                
                                                            </div><br>
                                                            <div class="row">    
                                                                <div class="col-sm-12"   id="button-Cargar-imegen-TarejetCF-door2door" >              
                                                                    <div  id="update-imagen-TarejetCF-door2door">                  
                                                                        <img src="/door2door/Modules/ModulesImage/imagen.jpg" style="width:200px;height:200px;" class="">
                                                                    </div>
                                                                </div>  
                                                            </div><br> 

                                                        

                                                        
                                                        </div><br>
                                                        <div class="row">                                                        
                                                            <div class="col-4">   
                                                                <button type="button" class="btn btn-primary  btn-block"   id="button-regresar-face-septima-door2door" >Rergresar</button>    
                                                            </div>
                                                            <div class="col-4">   
                                                                <button type="button" class="btn btn-success  btn-block"   id="button-Continuar-face-septima-door2door" >Continuar</button>    
                                                            </div>
                                                            <div class="col-4">   
                                                                <a type="button" 
                                                                    class="btn btn-danger btn-block"  
                                                                    href="/d2dVisitador/closeSession/controller/closeSession.php"
                                                                    
                                                                    >Cancelar</a>                                                         </div>              
                                                        </div><br> 
                                                    </form> 
                                                <!--#####################################################################   -->

                                                <!--######################   [ foto de trajeta de Bancaria ]   #########     -->
                                                    <form id="form-face-octavo-door2door" enctype="multipart/form-data"style="display:none"> 
                                                        <div id="face-octavo" style="text-align:center;">
                                                            <div class="row">                
                                                                <div class="col-sm-12">                  
                                                                <h1 style="color:000000;" >Foto de tarjeta bancaria</h1>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin:5px;">
                                                                <div class="col-sm-12">                  
                                                                    <div class="row">
                                                                        <div class="col-sm-12  h6" >
                                                                            <label style="color:#000000;text-align:center;">Banco</label>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text"  style="text-align:center;"    id="create-banco-door2door" name="create-banco-door2door" placeholder="Banco" class="form-control"    >
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin:5px;">
                                                                <div class="col-sm-12">                  
                                                                    <div class="row">
                                                                        <div class="col-sm-12  h6" >
                                                                            <label style="color:#000000;text-align:center;">Nombre del propietario de la tarjeta</label>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text"  style="text-align:center;"  style="text-nombrep:center"  id="create-nombrep-door2door" name="create-calle-door2door" placeholder="Nombre del propietario de la tarjeta" class="form-control"    >
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin:5px;">
                                                                <div class="col-sm-12">                  
                                                                    <div class="row">
                                                                        <div class="col-sm-12  h6" >
                                                                            <label style="color:#000000;text-align:center;">Numero de cuenta / CLABE interbancaria</label>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text"  style="text-align:center;"  style="text-numeroCuenta:center"  id="create-numeroCuenta-door2door" name="create-calle-door2door" placeholder="Numero de cuenta / CLABE interbancaria" class="form-control"    >
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin:5px;">               
                                                                <div class="col-sm-12"  id="button-Cargar-imegen-bancaria-door2door" >    
                                                                    <div class="col-sm-12" id="update-imagen-bancaria-door2door">                  
                                                                        <img src="/door2door/Modules/ModulesImage/imagen.jpg" style="width:200px;height:200px;" class="">
                                                                    </div>
                                                                </div> 
                                                            </div><br>                                                        
                                                        </div><br>
                                                        <div class="row">                                                                                                            
                                                            <div class="col-4">   
                                                                <button type="button" class="btn btn-secondary  btn-block"   id="button-regresar-face-octavo-door2door" >Rergresar</button>    
                                                            </div>
                                                            <div class="col-4"> 
                                                                <button type="button" class="btn btn-secondary  btn-block"   id="button-Continuar-face-octavo-door2door" >Continuar</button>    
    
                                                            </div>
                                                            <div class="col-4">   
                                                                <a type="button" 
                                                                    class="btn btn-danger btn-block"  
                                                                    href="/d2dVisitador/closeSession/controller/closeSession.php"
                                                                    
                                                                    >Cancelar</a> 
                                                            </div>              
                                                        </div><br> 
                                                    </form> 
                                                <!--####################################################################     -->   

                                                <!--######################   [ Cuestionario ]   #########     -->
                                                    <form id="form-face-novena-door2door" enctype="multipart/form-data"style="display:none"> 
                                                        <div id="face-septima" style="text-align:center;">
                                                            <div class="row">                
                                                                <div class="col-sm-12">                  
                                                                <h1 style="color:000000;" >Cuestionario </h1>
                                                                </div>
                                                            </div><br> 
                                                            <div class="row">                
                                                                <div class="col-sm-12" id="Cuesntionario-mostrar">  
                                                                </div>
                                                            </div><br> 
                                                        
                                                        </div><br>
                                                        <div class="row">                                                                                                            
                                                            <div class="col-4">   
                                                                <button type="button" class="btn btn-secondary  btn-block"   id="button-regresar-face-novena-door2door" >Rergresar</button>    
                                                            </div>
                                                            <div class="col-4"> 
                                                                <button type="button" class="btn btn-secondary  btn-block"   id="button-finalizar-door2door" >Finalizar</button>    
    
                                                            </div>
                                                            <div class="col-4">   
                                                                <a type="button" 
                                                                    class="btn btn-danger btn-block"  
                                                                    href="/d2dVisitador/closeSession/controller/closeSession.php"
                                                                    
                                                                    >Cancelar</a> 
                                                            </div>              
                                                        </div><br> 
                                                    </form> 
                                                <!--####################################################################     -->   

                                                <!--####################################################################     -->   
                                                    <form id="form-eliminar-archivo-door2door" enctype="multipart/form-data"style="display:none"> 
                                                    </form>
                                                <!--####################################################################     -->   
                                                    
                                            </div>
                                        </div>
                                    </div>                    
                                </div><!-- /.container-fluid -->
                                <div style="color:FFFFFF;">  
                                    <?php include_once('ModalImagenPerfil.php');            ?> 

                                    <?php include_once('ModalMensajeConfirmada.php');       ?> 
                                    <?php include_once('ModalMensajeContrato.php');         ?> 
                                    <?php include_once('ModalMensajeIncompleta.php');       ?> 
                                    <?php include_once('ModalMensajePendiente.php');        ?> 
                                    <?php include_once('ModalMensajeRechazada.php');        ?> 
                                    
                                    <?php include_once('../../Modules/ModulePugins/Modals/geolocalizacion.php');    ?> 
                                    <?php include_once('../../Modules/ModulePugins/Modals/warning.php');    ?> 
                                    <?php include_once('../../Modules/ModulePugins/Modals/succes.php');     ?> 
                                    <?php include_once('../../Modules/ModulePugins/Modals/error.php');      ?> 
                                </div>
                            </section>                     
                        <!-- /.content -->
                    </div>  
                </div>          
                <!-- Script -->
                    <?php include_once('ScriptStaticEvents.php');?>                
                <!-- footer -->
                    <?php include_once('../../footer.php');?>     
                <!-- footer -->  
            </div>
            <!-- complement -->
                <?php include_once('../../complement.php');?>
            <!-- complement -->
            <input  type="hidden" value="<?= $URLtocken ?>" id="tocken-door2doors-01198756765345431234534">                       
        </body>
        <!-- -->
    </html>

