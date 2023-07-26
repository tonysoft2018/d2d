
<!-- Menu -->
<?php session_start();?>
<?php
/*<Include classes>*/
    include_once('Modules/ModulePugins/door2door.Pugins.Modules.php');
/*</Include classes>*/

/*<Import>*/   
  use  d2dSocio\Modules\ModulePugins\Modules\Modules as Modules_Menu;
/*</Import>*/

/*<Instaciacion de objetos>*/                
    $URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
    $objectModulesmenu = new Modules_Menu();
/*</Instaciacion de objetos>*/


?>
<style>
    .sidebar-dark-primary {
      background: linear-gradient(#5a569a,  #b75192, #ee9424);
    }
    .btn-primary {
      background: linear-gradient(to bottom right, #5a569a,  #b75192, #ee9424);
    }
  
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4 " style="border-radius:20px;"
  <!-- Brand Logo -->
  <a href="/d2dSocio/Modules/Welcome/">
    <center>
      <img src="/d2dSocio/Modules/ModulesImage/D2DLOGO.png" style="width:190px;height:60px;border-radius:10px"  class="" style="opacity: .8">
      <span class="brand-text font-weight-light"></span>
    </center>  
  </a>
  <div class="sidebar">
    <nav class="mt-2">      
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">  
      

              <!-- Usuario -->
              <li class="nav-item">
                  <div class=" nav-link">
                     
                        <a href="" class="d-block" ><h4 style="color:#fff;" >
                          <img src="<?= $_SESSION["imagen-door2door"] ?>"  style="width:33px;height:33px;"  class="img-circle elevation-2" >
                          <p style="font-size:19;color:#fff;">
                            <?php if($_SESSION["name-door2door"] == ''){echo "   ".$_SESSION["user-door2door"];}else{echo "   ".$_SESSION["name-door2door"];}?>
                          </p>
                        </a>
                                  
                    
                  </div>
                <ul class="nav nav-treeview">  
                  <li class="nav-item">
                    <center>
                      <div class="">      
                          <a href="/d2dSocio/Modules/ModulePerfil/" class="btn text-center"  style="width:210px;color:#fff;">
                              Perfil
                          </a>     
                      </div>
                    </center>
                  </li>
                  <li class="nav-item">
                    <center>
                      <div class="">      
                          <button class="btn text-center" style="width:210px;color:#fff;" data-toggle="modal" data-target="#modal-close-session-door2door">
                              Cerrar sesión
                          </button>     
                      </div>
                    </center>
                  </li>
                </ul>    
              </li> 
              <!-- Menu APP -->
              <?php if($_SESSION['typeUser-door2door'] == 'SOCIO'){?>
              
                 
                  <?php       if($_SESSION['typePerfil-door2door'] == 'SOCIO VISITADOR'){?>
                    <?php
                    if(!isset($_SESSION['session-door2door'])){
                        session_destroy();
                        header('Location: /d2dSocio/closeSession/controller/closeSession.php');
                    } 
                    ?>
                  
                  <?php }else if($_SESSION['typePerfil-door2door'] == 'SOCIO CLIENTE'){?>
                      <!-- Visita socio cliente-->

                      <?php
                        session_start();                  
                        if($_SESSION["estatus-door2door"] == "ACTIVO"){ 
                      ?>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                                <img  title="Editar registro"   src="/d2dSocio/Modules/ModulesImage/sugerencias.png" style="width:30px;height:30px">
                                <p style="font-size:19;color:#fff;">
                                  Dashboard
                                </p>
                                <i class="right fas fa-angle-left"></i> 
                            </a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a href="/d2dSocio/Modules/ModuleDashboard/" class="nav-link">
                                  <p style="font-size:16;color:#fff;">Dashboard</p>
                                </a>
                              </li>                      
                            </ul>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                                <img  title="Editar registro"   src="/d2dSocio/Modules/ModulesImage/capañas.png" style="width:30px;height:30px">
                                <p style="font-size:19;color:#fff;">
                                  Campañas
                                </p>
                                <i class="right fas fa-angle-left"></i> 
                            </a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a href="/d2dSocio/Modules/ModuleCampaign/" class="nav-link">
                                  <p style="font-size:16;color:#fff;">Campañas</p>
                                </a>
                              </li>                      
                            </ul>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                                <img  title="Editar registro"   src="/d2dSocio/Modules/ModulesImage/Seguimientos.png" style="width:30px;height:30px">
                                <p style="font-size:19;color:#fff;">
                                Seguimientos
                                </p>
                                <i class="right fas fa-angle-left"></i> 
                            </a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a href="/d2dSocio/Modules/ModuleClientSeguimientos/" class="nav-link">
                                  <p style="font-size:16;color:#fff;">Seguimientos</p>
                                </a>
                              </li>                      
                            </ul>
                          </li>                      
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                                <img  title="Editar registro"   src="/d2dSocio/Modules/ModulesImage/sms.png" style="width:30px;height:30px">
                                <p style="font-size:19;color:#fff;">
                                  Chat
                                </p>
                                <i class="right fas fa-angle-left"></i> 
                            </a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a href="/d2dSocio/Modules/ModuleClientMessageChat/" class="nav-link">
                                  <p style="font-size:16;color:#fff;">Chat</p>
                                </a>
                              </li>                      
                            </ul>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                                <img  title="Editar registro"   src="/d2dSocio/Modules/ModulesImage/notificaciones.png" style="width:30px;height:30px">
                                <p style="font-size:19;color:#fff;">
                                Notificaciones
                                </p>
                                <i class="right fas fa-angle-left"></i> 
                            </a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a href="/d2dSocio/Modules/ModuleClientNotifications/" class="nav-link">
                                  <p style="font-size:16;color:#fff;">Notificaciones</p>
                                </a>
                              </li>                      
                            </ul>
                          </li>                      
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                                <img  title="Editar registro"   src="/d2dSocio/Modules/ModulesImage/soporte.png" style="width:30px;height:30px">
                                <p style="font-size:19;color:#fff;">
                                Soporte
                                </p>
                                <i class="right fas fa-angle-left"></i> 
                            </a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a href="/d2dSocio/Modules/ModuleClientSoporte/" class="nav-link">
                                  <p style="font-size:16;color:#fff;">Soporte</p>
                                </a>
                              </li>                      
                            </ul>
                          </li>
                      <?php }?>
                      
                  <?php }?>
              <?php }?>

              <!--  Menu APP  -->
             
              
          
        </ul> 
    </nav>
   <!-- Sidebar Menu --> 
   <!-- Sidebar Menu -->
    
  </div>  
</aside>


<?php include_once('Perfil/ModalPerfil.php'); ?>
<?php include_once('Perfil/ModalChangePassword.php'); ?>
<?php include_once('Perfil/ModalCloseSession.php'); ?>



