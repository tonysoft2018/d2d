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
            <title> door2door | Comisiones </title>
            <?= include_once('../../head.php'); ?>     
        </head>
    <!-- -->
    <body class="hold-transition sidebar-mini layout-fixed">
        
        <div class="wrapper">

            <?= include_once('../../NavSuperior.php');?>
            <!-- Menu -->
            <?= include_once('../../Menu.php');?>
            
            <!-- Interior-->
            <div id="body-main-div"  class="body-main">

                <div class="center">
                    <img  class="img-fluid"  src="https://c.tenor.com/XK37GfbV0g8AAAAi/loading-cargando.gif"  />       
                </div>
                
            </div>

            <div id="id-main" class="opacidad" >
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="content-header titulo-morado titulo-morado">
                        <div class="container-fluid">
                            <div class="container">
                                <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0">Comisiones </h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/door2door/Modules/Welcome/">Inicio</a></li>
                                    <i class="breadcrumb-item ">Comisiones </li>
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
                                                id="crear-corte-inicio"
                                                data-toggle="modal" 
                                                data-target="#modal-create-door2door" >
                                        Corte
                                        </button>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" 
                                                class="btn btn-info btn-block" 
                                                id="button-main-buscar-door2door"
                                            > 
                                        Buscar
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
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row"> 
                                            <div class="col-sm-12"> <label>Fecha inicio de corte<label></div>
                                        </div>
                                        <input type="date" style="background:#D1F0F5;" id="crear-fechainicio-door2door" name="crear-fechainicio-door2door" class="form-control campo-obligatorio"  placeholder="Nombre" aria-label="Nombre" >
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row"> 
                                            <div class="col-sm-12"> <label>Fecha final de corte<label></div>
                                        </div>
                                        <input type="date" style="background:#D1F0F5;" id="crear-fechafinal-door2door" name="crear-fechafinal-door2door" class="form-control campo-obligatorio"  placeholder="Nombre" aria-label="Nombre" >
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row"> 
                                            <div class="col-sm-12"> <label>Folio<label></div>
                                        </div>
                                        <input type="number" style="background:#D1F0F5;" id="crear-folio-door2door" name="crear-folio-door2door" class="form-control campo-obligatorio"  placeholder="Folio" aria-label="Nombre" >
                                    </div>                                
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row"> 
                                            <div class="col-sm-12"> <label>Estatus<label></div>
                                        </div>
                                        <div class="row" > 
                                            <div class="col-sm-12"> 
                                                <input type="hidden" id="main-nav-door2door" value="">
                                                <select class="custom-select" id="crear-estatus-door2door" name="crear-estatus-door2door" style="background:#D1F0F5;" >
                                                    <option value="">-- SELECCIONAR --</option>
                                                    <option value="ABIERTO">ABIERTO</option>
                                                    <option value="PROCESADO">PROCESADO</option>
                                                    <option value="CANCELADO">CANCELADO</option>
                                                    <option value="PAGADO">PAGADO</option>        
                                                </select>
                                            </div>
                                        </div>                  
                                    </div>
                                </div><br>  
                                <div class="table-responsive">
                                    <table class="table  hover stripe row-borde" id="table-main-door2door">
                                        <thead class="thead-morado">
                                            <tr  style="font-size:14;">                                          
                                                <th>Folio</th>                                                  
                                                <th>Fecha</th>                                           
                                                <th>Visita</th>
                                                <th>Procesados</th>
                                                <th>Aceptados</th>
                                                <th>Pagadas</th>
                                                <th>Comision</th>
                                                <th>revsión</th>
                                                <th>Pago</th>
                                                <th>Estatus</th>
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
                <?= include_once('ModalCancelado.php');?> 
                <?= include_once('ModalShow.php');?> 
                <?= include_once('ModalOrdenPago.php');?> 
                <?= include_once('ModalOrdenPagoCrear.php');?> 
             
             
            <!-- Modales -->

            <!-- Modales -->
                <?= include_once('../ModulePugins/Modals/warning.php');?> 
                <?= include_once('../ModulePugins/Modals/succes.php');?> 
                <?= include_once('../ModulePugins/Modals/error.php');?> 
            <!-- Modales -->   
            <?= include_once('ModalCreate.php');?> 

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
