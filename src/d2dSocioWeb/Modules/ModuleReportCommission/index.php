
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
            <title> door2door | Reportes Comisiones </title>
            <?php include_once('../../head.php'); ?>     
        </head>
    <!-- -->
    <body class="hold-transition sidebar-mini layout-fixed">
        
        <div class="wrapper">
            

            <?php include_once('../../NavSuperior.php');?>
            <!-- Menu -->
            <?php include_once('../../Menu.php');?>
            
            <!-- Interior-->
            <div id="body-main-div" class="body-main" >
                <div class="center">
                    <img  class="img-fluid"  src="https://c.tenor.com/XK37GfbV0g8AAAAi/loading-cargando.gif"  />       
                </div>
            </div>
            <div id="id-main" class="opacidad"> 
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="content-header titulo-morado">
                        <div class="container-fluid">
                            <div class="container">
                                <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0">Reportes Comisiones </h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/d2dSocioWeb/Modules/Welcome/">Inicio</a></li>
                                    <i class="breadcrumb-item ">Reportes Comisiones </li>
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
                                            href="/d2dSocioWeb/Modules/Welcome/"
                                            class="btn btn-secondary btn-block" 
                                            >
                                        Regresar
                                        </a>
                                    </div>
                                </div>
                            </div>   
                            <br>
                            <div class="container">
                                <form id="form-ventas-2box">
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

                                

                                    <div class="row">
                    
                                        <div class="col-sm-3" title="PDF"><br>
                                        <!-- Activo -->                 
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="col-auto">
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input crear-file-crear" name="crear-file-crear" checked id="create-pdf-create-pdf" value="pdf" type="radio">
                                                            <label class="form-check-label"  for="autoSizingCheck">
                                                                <strong> PDF</strong>
                                                            </label>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>   
                                        </div>
                                        <div class="col-sm-3" title="EXCEL">  <br>         
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="col-auto">
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input crear-file-crear" name="crear-file-crear"  id="create-excel-create-excel" value="excel" type="radio" >
                                                            <label class="form-check-label" for="autoSizingCheck">
                                                                <strong> EXCEL  </strong>
                                                            </label>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>   
                                        </div>                    
                                    </div><br>
                                </form >
                                <div class="row">
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn-success" id="button-generar-2box" style="width:200px;">
                                            Generar
                                        </button>
                                    </div>
                                </div>
                            </div>                    
                        </div><!-- /.container-fluid -->
                        
                    </section>
                    <!-- /.content -->
                </div>
            </div>

            <!-- Modales -->
                <?php include_once('ModalUpdate.php');?> 
                
            <!-- Modales -->
            
            <!-- Modales -->
                <?php include_once('../ModulePugins/Modals/warning.php');?> 
                <?php include_once('../ModulePugins/Modals/succes.php');?> 
                <?php include_once('../ModulePugins/Modals/error.php');?> 
            <!-- Modales -->


            <!-- Script -->
            <script type="module">
                // Evento inicio de sistema 
                

            
            
            
                import Generar                      from './js/Dato.Crear.main.js';
            

        


                $(document).ready(() =>{                 
                        // Mostrar 

                        /*<CARGAR SHOW>*/
                            $('#id-main').addClass('opacidad');
                            $('#body-main-div').show();
                            $('#body-main-div').addClass('body-main');
                        /*</CARGAR SHOW>*/   
                        setTimeout(() => {
                            /*<CARGAR HIDE>*/
                                $('#id-main').removeClass('opacidad');
                                $('#body-main-div').removeClass('body-main');
                                $('#body-main-div').hide();
                            /*</CARGAR HIDE>*/
                        }, 1500);
                                    const FechaInicion = Fecha();

                        
                    
                        // Metodo de creacion
                        $('#button-generar-2box').on('click', () =>{ console.log("Hola"); const FunGenerar = Generar(); }); 

                        // Evento y accion de actualiza              
                       
                        
                    

                        // Creacion de evnetos de eliminacion edicio y mostrar                                   
                    });

                    const Fecha = () =>{
                        let fecha   = new Date(); //Fecha actual
                        let mes     = fecha.getMonth()+1; //obteniendo mes
                        let dia     = fecha.getDate(); //obteniendo dia
                        let ano     = fecha.getFullYear(); //obteniendo año
                        if(dia<10)
                            dia     ='0'+   dia; 
                        if( mes<10)
                            mes     ='0'+   mes; 
                        let FechaFinal      = ano+"-"+mes+"-"+dia;
                        let FechaInicial    = ano+"-"+mes+"-"+dia; 
                        $('#crear-fechainicio-2box').val(FechaInicial);
                        $('#crear-fechafinal-2box').val(FechaInicial);
                    }
            </script>
            <!-- Script -->

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

