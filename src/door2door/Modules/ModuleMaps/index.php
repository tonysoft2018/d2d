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
            <title> door2door | Mapa </title>
            <?= include_once('../../head.php'); ?>     
        </head>
    <!-- -->
    <body class="hold-transition sidebar-mini layout-fixed">
        
        <div class="wrapper">
            <?= include_once('../../preloader.php');?>

            <?= include_once('../../NavSuperior.php');?>
            <!-- Menu -->
            <?= include_once('../../Menu.php');?>
            
            <!-- Interior-->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header titulo-morado titulo-morado titulo-morado">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Mapa </h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/door2door/Modules/Welcome/">Inicio /</a></li>
                                <i class="breadcrumb-item ">Mapa </li>
                                </ol>
                            </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div>
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
                <style>
                    hr {border-top: 1px solid #000; width:50%;}

                    a {color: #000;}

                    a:link{text-decoration:none;}

                    .box1{background: rgb(76, 175, 80, 0.6);}
                    .box2{background: rgb(192, 192, 200, 0.6);}
                    .box3{background: rgb(255, 0, 0, 0.6);;}



                    #author a{
                    color: #fff;
                    text-decoration: none;
                        
                    }
                </style>

                <!-- Main content -->
                <section class="content">
                    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <!------ Include the above in your HEAD tag ---------->

                    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

                    <div class="container-fluid">
                    <h1 class="text-center">Mapa</h1>
                    <hr>
                    <div class="row">

                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21265.941286572448!2d-103.35347754116373!3d20.676795448761414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b1faa928f63f%3A0x25dcb2cdab10691a!2sCatedral%20de%20Guadalajara!5e0!3m2!1ses!2smx!4v1677476123618!5m2!1ses!2smx" width="100%" height="720" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    

                    
                </section>
                <!-- /.content -->
            </div>

            <!-- Modales -->
                <?= include_once('ModalUpdate.php');?> 
                <?= include_once('ModalCreate.php');?> 
                <?= include_once('ModalDelete.php');?> 
                <?= include_once('ModalShow.php');?> 
                <?= include_once('ModalNewPassword.php');?> 
                <?= include_once('ModalAssignmentRoles.php');?> 
                <?= include_once('ModalShowSessions.php');?> 
                <?= include_once('ModalShowTracking.php');?> 
            <!-- Modales -->
            
            <!-- Modales -->
                <?= include_once('../ModulePugins/Modals/warning.php');?> 
                <?= include_once('../ModulePugins/Modals/succes.php');?> 
                <?= include_once('../ModulePugins/Modals/error.php');?> 
            <!-- Modales -->


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
