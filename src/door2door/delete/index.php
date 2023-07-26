<?php 
        /*<Include classes>*/
            include_once('../Modules/ModulePugins/door2door.Pugins.GeneratorTocken.php');
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

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> door2door </title>
        <?php include_once('../head.php'); ?>   
        <style>
            html,body { 
                height: 100%; 
            }

            .global-container{
                height:100%;
                display: flex;
                align-items: center;
                justify-content: center;
                
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
            .btn-primary {
                background: linear-gradient(to right, #5a569a, #b75192, #ee9424);
            }
           
        </style>
    </head>
    
    <body>  
    
        <div class="container" >
            <div class="global-container">
                <div class="card login-form">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <center>
                                    <img class="img-fluid" style="width:100px;height:100px;" src="/door2door/login/imagen/door2door.jpeg">
                                </center>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-center h3" >
                                Eliminar Cuenta
                            </div>
                        </div>
                       
                        <div class="card-text">                            
                            <form id="form-login-door2door">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12  h6" >
                                            <label>Usuario</label>
                                        </div>
                                    </div>
                                    <input type="text" value="" placeholder="Usuario" class="form-control " id="login-usuario-door2door"  name="login-usuario-door2door" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12  h6" >
                                            <label>contraseña</label>
                                        </div>
                                    </div>
                                    <input type="password"  placeholder="Contraseña" class="form-control " id="login-contrasena-door2door" name="login-contrasena-door2door">
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button id="button-inicialr-door2door" class="btn btn-primary btn-block">Eliminar cuenta</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      

        <!-- jQuery -->
        <script src="/door2door/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="/door2door/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="/door2door/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="/door2door/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline
        <script src="/door2door/plugins/sparklines/sparkline.js"></script> -->
        <!-- JQVMap -->
        <script src="/door2door/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="/door2door/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="/door2door/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="/door2door/plugins/moment/moment.min.js"></script>
        <script src="/door2door/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="/door2door/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="/door2door/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="/door2door/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/door2door/dist/js/adminlte.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="/door2door/dist/js/demo.js"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) 
        <script src="/door2door/dist/js/pages/dashboard.js"></script>-->

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    

        
    <!-- Modal -->
    <?php $URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";?>


    <div class="modal fade"  id="modal-eliminar-door2door" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Cerrar sesion </h5>
            </div>
            <div class="modal-body">
                <input type="hidden" >
                <div class="row">
                    <div class="col-sm-12">
                    <center>
                        <img class="img-fluid"  src="<?= $URL?>/door2door/Modules/ModulesImage/pregunta.png" style="width:150px;height:150px;"  >
                        <br> <br>
                        <h4>¿Desea continuar?</h4>
                    </center>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-4">
                        <button type="button" 
                                id="button-inicialr-eliminacion-door2door"
                                class="btn btn-primary btn-block"  
                                >Si</button>
                    </div>
                
                    <div class="col-4">              
                        <button type="button" 
                                class="btn btn-primary btn-block"  
                                data-dismiss="modal" >No</button>
                    </div>            
                </div>     
            
                
            </div>
            <br>
            </div>
        </div>
    </div>

    <div class="modal fade"  id="modal-message-warning-door2door" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <center>
                                <img class="img-fluid"  src="<?= $URL?>/door2door/Modules/ModulesImage/precaucion.png" style="width:150px;height:150px;"  ><br> 
                            <center>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <center>
                                <h4 id="message-warning-door2door"></h4>
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

    <div class="modal fade"     id="modal-message-succes-door2door" 
                                data-bs-backdrop="static" 
                                data-bs-keyboard="false" 
                                tabindex="-1" 
                                aria-labelledby="staticBackdropLabel" 
                                aria-hidden="true"
                            >
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
                            <center>
                                <img class="img-fluid"  src="<?= $URL?>/door2door/Modules/ModulesImage/exito.png" style="width:150px;height:150px;"  ><br> 
                            <center>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <center>
                                <h4 id="message-succes-door2door"></h4>
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

    <div style="display:none;">
        <input  type="hidden" value="<?= $URLtocken ?>" id="tocken-door2doors-01198756765345431234534">

        <script type="module">               
            
            $( document ).ready( () => 
            {  

                /*<button-inicialr-door2door>*/
                    $('#button-inicialr-door2door').on('click', () => { 
                        let EntradaUsuario = $('#login-usuario-door2door').val();
                        let EntradaContrasena = $('#login-contrasena-door2door').val();
                        if(EntradaContrasena != '' && EntradaUsuario != '' ){
                            $('#modal-eliminar-door2door').modal('show'); 
                        } 
                            else
                        {
                            $('#message-warning-door2door').html('');
                            $('#message-warning-door2door').html('FAVOR DE INTRODUCIR USUARIO Y CONTRASEÑA');
                            $('#modal-message-warning-door2door').modal('show');      
                        }  
                    });          
                /*</button-inicialr-door2door>*/

                /*<button-inicialr-eliminacion-door2door>*/
                    $('#button-inicialr-eliminacion-door2door').on('click', () => { 
                        let EntradaUsuario      = $('#login-usuario-door2door').val();
                        let EntradaContrasena   = $('#login-contrasena-door2door').val();
                    
                        EntradaUsuario      = EntradaUsuario.replace(/"/, '');
                        EntradaContrasena   = EntradaContrasena.replace(/"/, '');

                        $('#login-usuario-door2door').val(EntradaUsuario);
                        $('#login-contrasena-door2door').val(EntradaContrasena);

                        let informationForm = new FormData( document.getElementById("form-login-door2door") ); 
                        
                        let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();
                        informationForm.append("TockenOfdoor2doordoor2door",TockenOfdoor2doordoor2door);   
                                
                        if(EntradaContrasena != '' && EntradaUsuario != '' ){
                            $.ajax({
                                url: "/door2door/delete/controller/controller.delete.php",
                                type: 'post',
                                data: informationForm,        
                                dataType:"json",
                                contentType:false,
                                processData:false,
                                cache:false    
                            }).then((result) => 
                            {   
                                if (    
                                        result.message                          == 'Good' && 
                                        result.RESULTADO_VALIDADOR.userValitor  == 'correct_user_door2door'     
                                ){ 
                                    $('#modal-eliminar-door2door').modal('hide');                 
                                    $('#login-usuario-door2door').val('');
                                    $('#login-contrasena-door2door').val('');   
                                    
                                    $('#message-succes-door2door').html('');
                                    $('#message-succes-door2door').html('SU CUENTA FUE ELIMINADA PERMANENTEMENTE');
                                    $('#modal-message-succes-door2door').modal('show');    
                                    
                                }
                                    else
                                {
                                    $('#message-warning-door2door').html('');
                                    $('#message-warning-door2door').html('CONTRASEÑA O USUARIO INCORRECTO');
                                    $('#modal-message-warning-door2door').modal('show');      
                                }                            
                            }).catch((error) => 
                            {
                                $('#mensaje-advertencia').html('');
                                $('#mensaje-advertencia').html('INTENTELO MAS TARDE');
                                $('#modal-mensajes-advertencia-door2door').modal('show');
                            });
                        }else{                               
                            $('#message-warning-door2door').html('');
                            $('#message-warning-door2door').html('FAVOR DE INTRODUCIR USUARIO Y CONTRASEÑA');
                            $('#modal-message-warning-door2door').modal('show');      
                            
                        }                   
                    });   
                /*</button-inicialr-eliminacion-door2door>*/       
            });

            
        </script>
    </div>
    </body>
</html>