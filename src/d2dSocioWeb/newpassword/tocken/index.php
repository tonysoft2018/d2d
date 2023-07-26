<?php 
/*<Include classes>*/
    include_once('../../Modules/ModulePugins/door2door.Pugins.GeneratorTocken.php');
    include_once('../../Modules/ModulePugins/door2door.Cofiguration.Conection.php');
/*</Include classes>*/

/*<Import>*/   
    use  d2dSocioWeb\Modules\ModulePugins\GeneradorTocken\GeneradorTocken as GeneradorTocken_index;
    use  d2dSocioWeb\Modules\ModulePugins\Conection\Conection             as Conection;
    
/*</Import>*/

/*<Instaciacion de objetos>*/                
    $ObjectToken = new GeneradorTocken_index();
/*</Instaciacion de objetos>*/

/*<Variables generales>*/
    $URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
    $URLtocken = $URL.'-'.$ObjectToken->generatorTocken('tocken-door2doors-01198756765345431234534ASDFSDFSDF-');
/*<Variables generales>*/


    

    /*<VERIFICAR TOCKEN>*/

        /*<VARIABLES>*/
            $DATE                       = date('Y-m-d');
            $FECHA_REPETICION           = '';
            $TOCKEN                     = $_GET['tocken'];
            $ID_USUARIO                 = 0;
            $ID_TRECUPERACION           = 0;

            $RESPUESTA                  = '';
            $SQL                        = '';

            $FINAL_FECHA_REPETICION = null;           
            $FINAL_TOCKEN           = null;                    
            $FINAL_ID_USUARIO       = null;                 
            $FINAL_ID_TRECUPERACION = null; 
        /*</VARIABLES>*/

        /*<Query> */
            $querySelect    = 'SELECT 
                                    tr.fechaPeticion,
                                    tr.tocken,
                                    tr.idUsuario,
                                    tr.idTRecuperacion 
                                FROM 
                                    tockenRecuperacion tr
                                    WHERE 
                                        tr.tocken           = "'.$TOCKEN.'" AND
                                        tr.status           = "PENDIENTE"   AND
                                        tr.bstate = 1
                                        LIMIT 1 ;';
        /*</Query> */

        $SQL    = $querySelect;
        $Object = new Conection();
        $Object->open();            
            if ($resultQuery = mysqli_query($Object->Connection, $querySelect)) {
                if ($resultQuery->num_rows > 0) {
                    /*<Captura>*/
                        while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                            $FECHA_REPETICION           = $Rol['fechaPeticion'];
                            $TOCKEN                     = $Rol['tocken'];
                            $ID_USUARIO                 = $Rol['idUsuario'];
                            $ID_TRECUPERACION           = $Rol['idTRecuperacion'];
                        }

                        $FECHA_AUX   = explode(" ", $FECHA_REPETICION);
                        $FECHA_UNO   = new DateTime($FECHA_AUX[0]);
                        $FECHA_DOS   = new DateTime($DATE);
                        $DIFERENCIA  = $FECHA_UNO->diff($FECHA_DOS);
                        if( $DIFERENCIA <= 1){
                            $RESPUESTA = "Good";   
                        }else{
                            $RESPUESTA = 'Bad [ '.$FECHA_UNO->format('d/m/Y').' ] [ '.$FECHA_DOS->format('d/m/Y').' ] ';
                        }
                        
                    /*</Captura>*/
                }else{
                    $RESPUESTA = 'Bad 2';
                }               
            } else {
                /*<Respuesta>*/
                    $RESPUESTA         = "Bad 1 ". $querySelect;                  
                /*</Respuesta>*/
            }        
        $Object->closet();
        

        /*<VALIDACION>*/
            if($RESPUESTA == 'Good')
            {
                $FINAL_FECHA_REPETICION = $FECHA_REPETICION;           
                $FINAL_TOCKEN           = $TOCKEN;                    
                $FINAL_ID_USUARIO       = $ID_USUARIO;                 
                $FINAL_ID_TRECUPERACION = $ID_TRECUPERACION;   

            }else{

            }
        /*</VALIDACION>*/

    /*</VERIFICAR TOCKEN>*/
?>

<!DOCTYPE html>


<html lang="en">
    <head>
        <title> door2door </title>
        <?= include_once('../../head.php'); ?>   
        <style>
            html,body { 
                height: 100%; 
            }

            .global-container{
                height:100%;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #ffff;
            }

            form{
                padding-top: 10px;
                font-size: 14px;
                margin-top: 30px;
            }

            .card-title{ font-weight:300; }

            .btn{
                font-size: 14px;
                margin-top:20px;
            }


            .login-form{ 
                width:330px;
                margin:20px;
            }

            .sign-up{
                text-align:center;
                padding:20px 0 0;
            }

            .alert{
                margin-bottom:-30px;
                font-size: 13px;
                margin-top:20px;
            }
        </style>
    </head>
    
    <body>  
        <div class="container">
            <div class="global-container">
                <div class="card login-form">
                    <div class="card-body">
                        <h3 class="card-title text-center text-center"></h3>
                        <div class="card-text">
                            <!--
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                            <form id="form-tocken-door2door">
                                <!-- to error: add class "has-danger" -->
                                <input type="hidden" id="tocken-idTRecuperacion"  name="tocken-idTRecuperacion"    value="<?= $TOCKEN ?>">
                                <center>
                                    <div class="form-group" class="text-center">
                                        <label for="exampleInputEmail1" >Nueva contraseña</label>
                                        <input type="password" class="form-control text-center" id="tocken-contrasena-door2door"  name="tocken-contrasena-door2door" placeholder="Nueva contraseña" >
                                    </div>
                                </center>

                                <center>
                                    <div class="form-group" class="text-center">
                                        <label for="exampleInputEmail1" class="text-center">Repetir nueva contraseña</label>
                                        <input type="password" class="form-control text-center" id="tocken-repetir-contrasena-door2door"  name="tocken-repetir-contrasena-door2door" placeholder="Repetir nueva contraseña" >
                                    </div>
                                </center>
                               
                            </form>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button id="button-cambiar-contrasena-door2door" class="btn btn-primary btn-block text-center">Cambiar contraseña</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="display:none">
            <!-- jQuery -->
            <script src="/d2dSocio/plugins/jquery/jquery.min.js"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="/d2dSocio/plugins/jquery-ui/jquery-ui.min.js"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
            $.widget.bridge('uibutton', $.ui.button)
            </script>
            <!-- Bootstrap 4 -->
            <script src="/d2dSocio/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- ChartJS -->
            <script src="/d2dSocio/plugins/chart.js/Chart.min.js"></script>
            <!-- Sparkline
            <script src="/d2dSocio/plugins/sparklines/sparkline.js"></script> -->
            <!-- JQVMap -->
            <script src="/d2dSocio/plugins/jqvmap/jquery.vmap.min.js"></script>
            <script src="/d2dSocio/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
            <!-- jQuery Knob Chart -->
            <script src="/d2dSocio/plugins/jquery-knob/jquery.knob.min.js"></script>
            <!-- daterangepicker -->
            <script src="/d2dSocio/plugins/moment/moment.min.js"></script>
            <script src="/d2dSocio/plugins/daterangepicker/daterangepicker.js"></script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script src="/d2dSocio/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
            <!-- Summernote -->
            <script src="/d2dSocio/plugins/summernote/summernote-bs4.min.js"></script>
            <!-- overlayScrollbars -->
            <script src="/d2dSocio/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
            <!-- AdminLTE App -->
            <script src="/d2dSocio/dist/js/adminlte.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="/d2dSocio/dist/js/demo.js"></script>

            <!-- AdminLTE dashboard demo (This is only for demo purposes) 
            <script src="/d2dSocio/dist/js/pages/dashboard.js"></script>-->

            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
            <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
        </div>
        <div style="display:none">
            <!-- jQuery -->
            <script src="/d2dSocio/plugins/jquery/jquery.min.js"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="/d2dSocio/plugins/jquery-ui/jquery-ui.min.js"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
            $.widget.bridge('uibutton', $.ui.button)
            </script>
            <!-- Bootstrap 4 -->
            <script src="/d2dSocio/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- ChartJS -->
            <script src="/d2dSocio/plugins/chart.js/Chart.min.js"></script>
            <!-- Sparkline
            <script src="/d2dSocio/plugins/sparklines/sparkline.js"></script> -->
            <!-- JQVMap -->
            <script src="/d2dSocio/plugins/jqvmap/jquery.vmap.min.js"></script>
            <script src="/d2dSocio/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
            <!-- jQuery Knob Chart -->
            <script src="/d2dSocio/plugins/jquery-knob/jquery.knob.min.js"></script>
            <!-- daterangepicker -->
            <script src="/d2dSocio/plugins/moment/moment.min.js"></script>
            <script src="/d2dSocio/plugins/daterangepicker/daterangepicker.js"></script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script src="/d2dSocio/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
            <!-- Summernote -->
            <script src="/d2dSocio/plugins/summernote/summernote-bs4.min.js"></script>
            <!-- overlayScrollbars -->
            <script src="/d2dSocio/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
            <!-- AdminLTE App -->
            <script src="/d2dSocio/dist/js/adminlte.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="/d2dSocio/dist/js/demo.js"></script>

            <!-- AdminLTE dashboard demo (This is only for demo purposes) 
            <script src="/d2dSocio/dist/js/pages/dashboard.js"></script>-->

            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
            <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
        </div>

        <div    class="modal fade" 
                class="modal-message-error-door2door" 
                data-bs-backdrop="static" 
                data-bs-keyboard="false" 
                tabindex="-1" 
                aria-labelledby="staticBackdropLabel" 
                aria-hidden="true"
            >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color:#000;">Mensaje</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <center>
                                    <img class="img-fluid"  src="<?= $URL?>/d2dSocio/Modules/ModulesImage/error.png" style="width:150px;height:150px;"  ><br> 
                                <center>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-12">
                                <center>
                                    <h4 id="message-error-door2door" style="color:#000;"></h4>
                                <center>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <center>
                            <button type="button" class="btn btn-secondary" style="width:200px" data-dismiss="modal">
                                Regresar
                            </button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        
        <div    class="modal fade"  
                id="modal-message-succes-door2door"  
                data-bs-backdrop="static"  
                data-bs-keyboard="false" 
                tabindex="-1"  
                aria-labelledby="staticBackdropLabel"  
                aria-hidden="true" 
                style="color:#fffff;">
            <div class="modal-dialog" 
            role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color:#000;">Mensaje</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <center>
                                    <img class="img-fluid"  src="<?= $URL?>/d2dSocio/Modules/ModulesImage/exito.png" style="width:150px;height:150px;"  ><br> 
                                <center>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-12">
                                <center>
                                    <h4 id="message-succes-door2door" style="color:#000;"></h4>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <center>
                            <button type="button" id="button-regresar-token"  class="btn btn-secondary" style="width:200px" data-dismiss="modal">
                                Regresar
                            </button>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        <div    class="modal fade"  
                id="modal-message-warning-door2door" 
                data-bs-backdrop="static" 
                data-bs-keyboard="false" 
                tabindex="-1" 
                aria-labelledby="staticBackdropLabel" 
                aria-hidden="true"
                style="color:#fff;"
            >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color:#000;">Mensaje</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <center>
                                    <img class="img-fluid"  src="<?= $URL?>/d2dSocio/Modules/ModulesImage/precaucion.png" style="width:150px;height:150px;"  ><br> 
                                <center>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <center>
                                    <h4 id="message-warning-door2door" style="color:#000;" ></h4>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <center>
                            <button type="button"  class="btn btn-secondary" style="width:200px" data-dismiss="modal">
                                Regresar
                            </button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
       

        <input  type="hidden" value="<?= $URLtocken ?>" id="tocken-door2doors-01198756765345431234534">
        
        <script type="module">               
            
            $( document ).ready( () => { 
                $('#button-cambiar-contrasena-door2door').on('click', () => { 
                    let idUsuario       = $('#tocken-idUsuario').val();
                    let idTRecuperacion = $('#tocken-idTRecuperacion').val();

                    let PASSWORD_UNO = $('#tocken-contrasena-door2door').val();
                    let PASSWORD_DOS = $('#tocken-repetir-contrasena-door2door').val();

                    let informationForm = new FormData(document.getElementById("form-tocken-door2door")); 
                    
                    let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();
                    informationForm.append("TockenOfdoor2doordoor2door", TockenOfdoor2doordoor2door);   
                    
                    if(PASSWORD_UNO != '' && PASSWORD_DOS != '')
                    {
                        if(PASSWORD_UNO == PASSWORD_DOS){
                            
                                $.ajax({
                                    url: "/d2dSocioWeb/newpassword/tocken/api/door2door.controller.newmember.php",
                                    type: 'post',
                                    data: informationForm,        
                                    dataType:"json",
                                    contentType:false,
                                    processData:false,
                                    cache:false    
                                }).then((result) => {   console.log(result)                       
                                    if (result.message == 'Good'){
                                        $('#message-succes-door2door').html("");
                                        $('#message-succes-door2door').html('CONTRASEÑA CAMBIADA');
                                        $('#modal-message-succes-door2door').modal('show');    

                                        $('#tocken-idUsuario').val('');
                                        $('#tocken-idTRecuperacion').val('');
                                        $('#tocken-contrasena-door2door').val('');
                                        $('#tocken-idTRecuperacion').val('');
                                        
                                    }else{
                                        $('#message-warning-door2door').html('');
                                        $('#message-warning-door2door').html('¡CORREO NO VALIDO O USUARIO NO EXISTENTE!');
                                        $('#modal-message-warning-door2door').modal('show');
                                    }                            
                                }).catch((error) => {
                                    console.log(error);
                                    $('#mensaje-advertencia').html('');
                                    $('#mensaje-advertencia').html('INTENTELO MAS TARDE');
                                    $('#modal-mensajes-advertencia-door2door').modal('show');
                                });
                         
                              
                        }else{
                            $('#message-warning-door2door').html('');
                            $('#message-warning-door2door').html('LAS CONTRASEÑAS NO COINCIDEN');
                            $('#modal-message-warning-door2door').modal('show'); 
                        } 
                    }
                        else
                    {
                        $('#message-warning-door2door').html('');
                        $('#message-warning-door2door').html('LAS CONTRASEÑAS NO COINCIDEN');
                        $('#modal-message-warning-door2door').modal('show'); 
                    }                      
                });       
                
                /*<REGRESAR>*/
                    $('#button-regresar-token').on('click', () => { window.location.href = "/d2dSocioWeb/login/"; });
                /*<REGRESAR>*/
            });

            
          
        </script>
    </body>
</html>