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
        <?= include_once('../head.php'); ?>   
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
                        <h3 class="card-title text-center">Iniciar sesión</h3>
                        <div class="card-text">                           
                            <form id="form-create-member-door2door" enctype="multipart/form-data">
                             
                             
                                <div class="form-group">
                                    <center>
                                        <label for="exampleInputEmail1">Usuario</label>
                                        <input type="text" class="form-control text-center" placeholder="Usuario" id="create-usuario-door2door"  name="create-usuario-door2door" aria-describedby="emailHelp">
                                    </center>
                                </div>
                                <div class="form-group">
                                    <center>
                                        <label for="exampleInputEmail1">Contraseña</label>
                                        <input type="text" class="form-control  text-center" placeholder="Contraseña" id="create-contrasena-door2door"  name="create-contrasena-door2door" aria-describedby="emailHelp">
                                    </center>
                                </div>
                                <div class="form-group">
                                    <center>
                                        <label for="exampleInputEmail1">repetir contraseña</label>
                                        <input type="text" class="form-control  text-center" placeholder="repetir contraseña" id="create-repetircontrasena-door2door"  name="create-repetircontrasena-door2door" aria-describedby="emailHelp">
                                    </center>
                                    
                                </div>
                                <div class="form-group">
                                    <center>
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input type="text" class="form-control  text-center"  placeholder="Nombre" id="create-nombre-door2door"  name="create-nombre-door2door" aria-describedby="emailHelp">
                                    </center>
                                    
                                </div>
                                <div class="form-group">
                                    <center>
                                        <label for="exampleInputEmail1">Apellidos</label>
                                        <input type="text" class="form-control  text-center" placeholder="Apellidos" id="create-apellidos-door2door"  name="create-apellidos-door2door" aria-describedby="emailHelp">
                                    </center>
                                    
                                </div>
                                <div class="form-group">
                                    <center>
                                        <label for="exampleInputEmail1">Correo</label>
                                        <input type="text" class="form-control  text-center" placeholder="Correo" id="create-correo-door2door"  name="create-correo-door2door" aria-describedby="emailHelp">
                                    </center>
                                   
                                </div>
                                <div class="row">                                    
                                    <div class="col-sm-12">
                                        <center>
                                            <div class="row"> 
                                                <div class="col-sm-12"> <label>Tipo de socio<label></div>
                                            </div>
                                            <div class="row"> 
                                                <div class="col-sm-12"> 
                                                <select class="custom-select text-center" id="create-tipousuario-door2door" name="create-tipousuario-door2door" style="background:#D1F0F5;" >
                                                    <option class="text-center" value="SOCIO VISITADOR">VISITADOR</option>
                                                    <option class="text-center" value="SOCIO CLIENTE" selected>SOCIO</option>
                                                </select>
                                                </div>
                                            </div>   
                                        </center>            
                                    </div>
                                </div><br>  
                                                                                      
                            </form>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button id="button-crear-nuevosocio-door2door" class="btn btn-primary btn-block">Crear una cuenta</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="/door2door/login/"  id="button-inicialr-sesion-door2door" class="btn btn-success btn-block">Inicio de sesion</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="display:none">
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
        </div>
            <?= include_once('../Modules/ModulePugins/Modals/warning.php');?> 
            <?= include_once('../Modules/ModulePugins/Modals/succes.php');?> 
            <?= include_once('../Modules/ModulePugins/Modals/error.php');?> 
            <?= include_once('succes.php');?> 

        <input  type="hidden" value="<?= $URLtocken ?>" id="tocken-door2doors-01198756765345431234534">
        
        <script type="module">               
        
            import Create from './js/Function/Function.Create.main.js';
            
            $( document ).ready( () => {                 
                $('#button-crear-nuevosocio-door2door').on('click', () => { const functionCreate = Create();});  
                
                $('#message-regresar-door2door').on('click', () => {  window.location.href = "/door2door/login/" });  
                
            });

          
        </script>
    </body>
</html>