<?php
/*<import>*/
    include_once("../../login/model/door2door.model.login.php");
/*</import>*/
/*<use>*/
    use  d2dVisitador\Login\Model\Login\Login as Login_closeSession;
/*</use>*/
/*<Registro de salida>*/
    session_start();

    if(isset($_SESSION["idUser-door2door"])){
        $RESULT = [];
        $idIuser = $_SESSION["idUser-door2door"];
        $Object = new  Login_closeSession();
        $Object->closeSession($_SESSION["idUser-door2door"]) 
        ?>
        
        <html>
            <head>
              
            </head>
            <body>
                <!-- jQuery -->
                <script src="/d2dVisitador/plugins/jquery/jquery.min.js"></script>
                    <!-- jQuery UI 1.11.4 -->
                    <script src="/d2dVisitador/plugins/jquery-ui/jquery-ui.min.js"></script>
                    <script>
                    $(document).ready(() =>{ 
                        const functionRevers = revers();
                    });
                        const revers = () => {
                            localStorage.clear(); 
                            window.location.href = "/d2dVisitador/main/";
                        } 
                    </script>

            </body>
        </html>
            
        <?php
    }else{
        ?>
        
        <html>
            <head>
              
            </head>
            <body>
                <!-- jQuery -->
                <script src="/d2dVisitador/plugins/jquery/jquery.min.js"></script>
                    <!-- jQuery UI 1.11.4 -->
                    <script src="/d2dVisitador/plugins/jquery-ui/jquery-ui.min.js"></script>
                    <script>
                    $(document).ready(() =>{ 
                        const functionRevers = revers();
                    });
                        const revers = () => {
                            localStorage.clear(); 
                            window.location.href = "/d2dVisitador/login/";
                        } 
                    </script>

            </body>
        </html>
            
        <?php
    }
    session_destroy();
/*<Registro de salida>*/




