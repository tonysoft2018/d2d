
<!-- Menu -->
<?php session_start();?>
<?php
/*<Include classes>*/
    include_once('Modules/ModulePugins/door2door.Pugins.Modules.php');
/*</Include classes>*/

/*<Import>*/   
  use  d2dVisitador\Modules\ModulePugins\Modules\Modules as Modules_Menu;
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
<aside class="main-sidebar sidebar-dark-primary elevation-4 " style="border-radius:20px;">

  <a href="/d2dVisitador/Modules/ModuleClientSugerenicas/">
    <center>
      <img src="/d2dVisitador/Modules/ModulesImage/D2DLOGO.png" style="width:190px;height:60px;border-radius:10px"  class="" style="opacity: .8">
      <span class="brand-text font-weight-light"></span>
    </center>  
  </a>
  <div class="sidebar">
    <nav class="mt-2">      
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">       

              <!-- Usuario -->
              <li class="nav-item">
                  <div class=" nav-link">
                     
                        <a href="/d2dVisitador/Modules/ModulePerfil/" class="d-block" ><h4 style="color:#fff;" >
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
                          <a href="/d2dVisitador/Modules/ModulePerfil/" class="btn text-center"  style="width:210px;color:#fff;">
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
              <!-- Visita socio cliente-->
              <?php 
                  session_start();                  
                  if($_SESSION["estatus-door2door"] == "ACTIVO"){  
              ?>
                    <li class="nav-item">
                      <a  href="/d2dVisitador/Modules/ModuleClientSugerenicas/"  class="nav-link">
                          <img  title="Editar registro"  src="/d2dVisitador/Modules/ModulesImage/google-maps.png" style="width:30px;height:30px">
                          <p style="font-size:19;color:#fff;">
                            Posibles visitas
                          </p>
                          <i class="right fas fa-angle-left"></i> 
                      </a>                      
                    </li>              
                    <li class="nav-item">
                      <a href="/d2dVisitador/Modules/ModuleClientSeguimientos/"  class="nav-link">
                          <img  title="Editar registro"   src="/d2dVisitador/Modules/ModulesImage/mapa.png" style="width:30px;height:30px">
                          <p style="font-size:19;color:#fff;">
                            Vista 
                          </p>
                          <i class="right fas fa-angle-left"></i> 
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/d2dVisitador/Modules/ModuleClientComiciones/"  class="nav-link">
                          <img  title="Editar registro"    src="/d2dVisitador/Modules/ModulesImage/comiciones.png" style="width:30px;height:30px">
                          <p style="font-size:19;color:#fff;">
                          Comisiones
                          </p>
                          <i class="right fas fa-angle-left"></i> 
                      </a>
                     
                    </li>
                    <li class="nav-item">
                      <a href="/d2dVisitador/Modules/ModuleClientMessageChat/" class="nav-link">
                          <img  title="Editar registro"   src="/d2dVisitador/Modules/ModulesImage/sms.png" style="width:30px;height:30px">
                          <p style="font-size:19;color:#fff;">
                            Chat
                          </p>
                          <i class="right fas fa-angle-left"></i> 
                      </a>                      
                    </li>
                    <li class="nav-item">
                      <a href="/d2dVisitador/Modules/ModuleClientNotifications/" class="nav-link">
                          <img  title="Editar registro"   src="/d2dVisitador/Modules/ModulesImage/notificaciones.png" style="width:30px;height:30px">
                          <p style="font-size:19;color:#fff;">
                            Notificaciones
                          </p>
                          <i class="right fas fa-angle-left"></i> 
                      </a>                     
                    </li>
                    <li class="nav-item">
                      <a href="/d2dVisitador/Modules/ModuleClientHistorial/"  class="nav-link">
                          <img  title="Editar registro"   src="/d2dVisitador/Modules/ModulesImage/historial.png" style="width:30px;height:30px">
                          <p style="font-size:19;color:#fff;">
                            Historial
                          </p>
                          <i class="right fas fa-angle-left"></i> 
                      </a>                     
                    </li>
                    <li class="nav-item">
                      <a href="/d2dVisitador/Modules/ModuleClientSoporte/" class="nav-link">
                          <img  title="Editar registro"   src="/d2dVisitador/Modules/ModulesImage/soporte.png" style="width:30px;height:30px">
                          <p style="font-size:19;color:#fff;">
                            Soporte
                          </p>
                          <i class="right fas fa-angle-left"></i> 
                      </a>                   
                    </li>
              <?php }?>
        </ul> 
    </nav>
   <!-- Sidebar Menu --> 
   <!-- Sidebar Menu -->
    
  </div>  
</aside>


<?php include_once('Perfil/ModalPerfil.php'); ?>
<?php include_once('Perfil/ModalChangePassword.php'); ?>
<?php include_once('Perfil/ModalCloseSession.php'); ?>



