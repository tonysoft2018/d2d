<?php 
    /*<Include classes>*/
        include_once('../Modules/ModulePugins/door2door.Pugins.GeneratorTocken.php');
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
                background: #ffff;
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
    
    <body style="color:#fffff;">  
    
        <div class="container" style="color:#fffff;">
            <div class="global-container">
                <div class="card login-form" style="color:#000;" >
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <center>
                                    <img class="img-fluid" style="width:100px;height:100px;" src="/d2dVisitador/login/imagen/door2door.jpeg">
                                </center>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-center h3" >
                                Iniciar sesión
                            </div>
                        </div>
                       
                        <div class="card-text">                            
                            <form id="form-login-door2door">
                                <!-- to error: add class "has-danger" -->
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
                                        <button id="button-inicialr-sesion-door2door" class="btn btn-primary btn-block">Ingresar</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="/d2dVisitador/newpassword/email/"  id="button-olvido-contrasena-door2door" class="btn btn-primary btn-block">¿Se te olvidó tu contraseña?</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="/d2dSocio/newmember/"  id="button-olvido-contrasena-door2door" class="btn btn-primary btn-block">Registrarse</a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            
        <?php   include('../Modules/ModulePugins/Modals/warning.php');      ?> 
        <?php   include_once('../Modules/ModulePugins/Modals/succes.php');  ?> 
        <?php   include_once('../Modules/ModulePugins/Modals/error.php');   ?> 

        </div>

        <div style="display:none;">

            <!-- jQuery -->
            <script src="/d2dVisitador/plugins/jquery/jquery.min.js"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="/d2dVisitador/plugins/jquery-ui/jquery-ui.min.js"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
                $.widget.bridge('uibutton', $.ui.button)
            </script>
            <!-- Bootstrap 4 -->
            <script src="/d2dVisitador/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- ChartJS -->
            <script src="/d2dVisitador/plugins/chart.js/Chart.min.js"></script>
            <!-- Sparkline
            <script src="/d2dVisitador/plugins/sparklines/sparkline.js"></script> -->
            <!-- JQVMap -->
            <script src="/d2dVisitador/plugins/jqvmap/jquery.vmap.min.js"></script>
            <script src="/d2dVisitador/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
            <!-- jQuery Knob Chart -->
            <script src="/d2dVisitador/plugins/jquery-knob/jquery.knob.min.js"></script>
            <!-- daterangepicker -->
            <script src="/d2dVisitador/plugins/moment/moment.min.js"></script>
            <script src="/d2dVisitador/plugins/daterangepicker/daterangepicker.js"></script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script src="/d2dVisitador/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
            <!-- Summernote -->
            <script src="/d2dVisitador/plugins/summernote/summernote-bs4.min.js"></script>
            <!-- overlayScrollbars -->
            <script src="/d2dVisitador/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
            <!-- AdminLTE App -->
            <script src="/d2dVisitador/dist/js/adminlte.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="/d2dVisitador/dist/js/demo.js"></script>

            <!-- AdminLTE dashboard demo (This is only for demo purposes) 
            <script src="/d2dVisitador/dist/js/pages/dashboard.js"></script>-->

            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
            <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
        </div>

        

        <div style="display:none;">
            <input  type="hidden" value="<?= $URLtocken ?>" id="tocken-door2doors-01198756765345431234534">
            <script type="module">               
            
                import login from './js/Function.login.main.js';
                
                $( document ).ready( () => {  

                    if(Smarphone()){
                        const Validation = validationSession();
                        $('#button-inicialr-sesion-door2door').on('click', () => { const functionLogin = login();});      
                    }else{
                        window.location.href = "/d2dSocioWeb/login/"
                    }
                    
                      
                });

                const Smarphone = () => {
                    let navegador = navigator.userAgent;
                    if (    
                            navigator.userAgent.match(/Android/i)       || 
                            navigator.userAgent.match(/webOS/i)         || 
                            navigator.userAgent.match(/iPhone/i)        || 
                            navigator.userAgent.match(/iPad/i)          || 
                            navigator.userAgent.match(/iPod/i)          || 
                            navigator.userAgent.match(/BlackBerry/i)    || 
                            navigator.userAgent.match(/Windows Phone/i) 
                        ) {
                        console.log("Estás usando un dispositivo móvil!!");
                        return true;
                    } else {
                        console.log("No estás usando un móvil");
                        return false;
                    }
                }
                
                const validationSession = () =>{
                    let ArraysInformation = JSON.parse(localStorage.getItem('JSON_door2door_INFOMATION'));               
                    if(ArraysInformation !== null ){                            
                        if(ArraysInformation.userValitor == 'correct_user_door2door'){
                            window.location.href = "/d2dSocio/Modules/Welcome/"
                        }else{
                            localStorage.setItem('JSON_door2door_INFOMATION',{});
                        }
                    }
                }
                
            </script>
        </div>
    </body>
</html>