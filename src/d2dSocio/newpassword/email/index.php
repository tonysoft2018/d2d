<?php 
/*<Include classes>*/
    include_once('../../Modules/ModulePugins/door2door.Pugins.GeneratorTocken.php');
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
/*<Variables generales>*/
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> door2door </title>
        <?php include_once('../../head.php'); ?>   
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
                        <h3 class="card-title text-center">Introduce tu correo electrónico</h3>
                        <div class="card-text">
                            <!--
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                            <form id="form-login-door2door">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Correo electrónico</label>
                                    <input type="text" placeholder="Correo electrónico" class="form-control form-control text-center" id="create-email-door2door"  name="create-email-door2door" aria-describedby="emailHelp">
                                </div>
                            </form>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button  id="button-enviar-email-door2door" class="btn btn-primary btn-block text-center">Enviar</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="/d2dSocio/login/"  id="button-inicialr-sesion-door2door" class="btn btn-success btn-block text-center">Iniciar sesión</a>
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
                                    <img class="img-fluid"  src="<?= $URL?>/d2dVisitador/Modules/ModulesImage/error.png" style="width:150px;height:150px;"  ><br> 
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
                        
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <center>
                                    <img class="img-fluid"  src="<?= $URL?>/d2dVisitador/Modules/ModulesImage/exito.png" style="width:150px;height:150px;"  ><br> 
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
                            <a type="button" id="button-regresar-token" class="btn btn-secondary" style="width:200px" data-dismiss="modal">
                                Regresar
                            </a>
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
                                    <img class="img-fluid"  src="<?= $URL?>/d2dVisitador/Modules/ModulesImage/precaucion.png" style="width:150px;height:150px;"  ><br> 
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
                            <button type="button" class="btn btn-secondary" style="width:200px" data-dismiss="modal">
                                Regresar
                            </button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
           

        <input  type="hidden" value="<?= $URLtocken ?>" id="tocken-door2doors-01198756765345431234534">
        
        <script type="module">  
            import functionEnviarEmail             from './js/function/Function.Create.main.js';    
            import emailAPI                        from './js/API/API.Email.main.js';
           $(document).ready(() =>{    
                /*<Evento creacion de un nuevo>*/
                    $('#button-enviar-email-door2door').on('click', () =>{ 
                        /*<Captura>*/
                            let email          =   $('#create-email-door2door').val();
                            console.log(email);
                        /*<Captura>*/
                        if( email != '' ){     
                            const ResultEmailAPI = emailAPI( email ).
                            then((result) => {    console.log(result)          
                                if(result.message == 'Good'){ 
                                    /*<Respuesta>*/
                                        if (result.RESPUESTA_ENVIAR_CORREO.email == "GoodEmail"){ 
                                            $('#message-succes-door2door').html("");
                                            $('#message-succes-door2door').html('SE ENVIO UN CORREO CON UN ENLACE PARA CAMBIAR DE CONTRASEÑA VALIDO POR TODO ESTE DIA.');
                                            $('#modal-message-succes-door2door').modal('show');  
                                            
                                            $('#tocken-contrasena-door2door').val('');
                                            $('#tocken-repetir-contrasena-door2door').val('');
                                        }else{
                                            $('#message-warning-door2door').html('');
                                            $('#message-warning-door2door').html('¡EMAIL NO VALIDO!');
                                            $('#modal-message-warning-door2door').modal('show');                                      
                                        }   
                                        
                                    /*</Respuesta>*/   
                                }else{
                                    /*<Error al cargar la nueva informacion>*/
                                        $('#message-warning-door2door').html('');
                                        $('#message-warning-door2door').html('¡CORREO INEXISTENTE!');
                                        $('#modal-message-warning-door2door').modal('show');
                                    /*<Error al cargar la nueva informacion>*/
                                }
                            });
                        }else{
                            /*<Error al cargar la nueva informacion>*/
                                console.log("hola");
                                $('#message-warning-door2door').html('');
                                $('#message-warning-door2door').html('¡INTRODUSCA SU CORREO ELECTRONICO!');
                                $('#modal-message-warning-door2door').modal('show');
                            /*<Error al cargar la nueva informacion>*/
                        }        
                    });
                /*</Evento creacion de un nuevo>*/  
                
                /*<REGRESAR>*/
                    $('#button-regresar-token').on('click', () => { window.location.href = "/d2dVisitador/login/"; });
                /*<REGRESAR>*/

           });
        
        </script>
    </body>
</html>