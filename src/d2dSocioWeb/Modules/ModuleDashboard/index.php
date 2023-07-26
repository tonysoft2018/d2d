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

<?php /* Inicio de la paguina*/?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> door2door | Dashboard </title>
        <link rel="icon" type="image/x-icon" href="/d2dSocioWeb/Modules/ModulesImage/door2door.png">
        <?php include_once('../../head.php'); ?>     
      <!-- Preloader -->
    
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        
        <div class="wrapper">
        

        <?php include_once('../../NavSuperior.php');?>
        <!-- Menu -->
        <?php include_once('../../Menu.php');?>
            
        <div id="body-main-div" class="body-main" >
            <div class="center">
                <img  class="img-fluid"  src="https://c.tenor.com/XK37GfbV0g8AAAAi/loading-cargando.gif"  />       
            </div>
        </div>
        <div id="id-main" class="opacidad"> 
            <!-- Interior-->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header titulo-morado titulo-morado">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Dashboard </h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/d2dSocioWeb/Modules/Welcome/">Inicio</a></li>
                                <i class="breadcrumb-item ">Dashboard </li>
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

                            <!-- Dashboard -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label><h5>Tipo Dashboard </h5></label>
                                        <div class="input-group mb-3">
                                            <select class="browser-default custom-select" id="crear-tipo-door2door">
                                                <option value=""> -- SELECCIONAR -- </option>
                                                <option value="CAMPANAS">CAMPAÑAS</option>
                                                <option value="VISITAS">VISITAS</option>
                                                <option value="COMISIONES">COMISIONES</option>
                                                                                 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id=""  style="width:150px;">Fecha Inicio</span>
                                            </div>
                                            <input type="date" style="background:#D1F0F5;" id="crear-fechainicio-2box" name="crear-fechainicio-2box" class="form-control campo-obligatorio"  placeholder="Nombre" aria-label="Nombre" >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id=""  style="width:150px;">Fecha Final</span>
                                            </div>
                                            <input type="date" style="background:#D1F0F5;" id="crear-fechafinal-2box" name="crear-fechainicio-2box" class="form-control campo-obligatorio"  placeholder="Nombre" aria-label="Nombre" >
                                        </div>
                                    </div>
                                </div><br>
                            <!--/ Dashboard -->
                            


                            <!-- dashboar-campanas -->
                                <div class="row" id="dashboar-campanas" style="display:none;" >
                                    <div class="col-sm-12">
                                        <h2>CAMPAÑAS</h2>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <canvas id="dashboar-campanas-canvas" width="800" height="450">
                                                </canvas>   
                                            </div>
                                            
                                        </div>
                                        
                                        
                                    </div>                              
                                </div>
                            <!--/ dashboar-campanas -->

                            <!-- dashboar-visitas -->
                                <div class="row" id="dashboar-visitas" style="display:none;" >
                                    <div class="col-sm-12">
                                        <h2>VISITAS</h2>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <canvas id="dashboar-visitas-canvas" width="800" height="450">
                                                </canvas>   
                                            </div>
                                            
                                        </div>
                                        
                                        
                                    </div>                              
                                </div>
                            <!--/ dashboar-visitas -->

                          

                             <!-- dashboar-comisiones -->
                                <div class="row" id="dashboar-comisiones" style="display:none;" >
                                    <div class="col-sm-12">
                                        <h2>COMISIONES</h2>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <canvas id="dashboar-comisiones-canvas" width="800" height="450">
                                                </canvas>   
                                            </div>
                                            
                                        </div>
                                        
                                        
                                    </div>                              
                                </div>
                            <!--/ dashboar-comisiones -->

                          

                           

                        </div>   
                                   
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
        </div>
            <!-- Modales -->
            
            
            <!-- Modales -->
                <?php include_once('../ModulePugins/Modals/warning.php')  ?> 
                <?php include_once('../ModulePugins/Modals/succes.php');  ?> 
                <?php include_once('../ModulePugins/Modals/error.php');   ?> 
            <!-- Modales -->

            <!-- -->
            <?php include_once('../../footer.php');?>       
        </div>
        <?php include_once('../../complement.php');?>
        <!-- -->


         <input  type="hidden" value="<?= $URLtocken ?>" id="tocken-door2doors-01198756765345431234534">

        <?php include_once('ScriptStaticEvents.php');?>
         
    </body>
</html>
