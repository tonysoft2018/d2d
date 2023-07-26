
<!-- Menu -->
<?php session_start();?>
<?php
/*<Include classes>*/
    include_once('Modules/ModulePugins/door2door.Pugins.Modules.php');
/*</Include classes>*/

/*<Import>*/   
  use  door2door\Modules\ModulePugins\Modules\Modules as Modules_Menu;
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
  <a href="/door2door/Modules/Welcome/">
    <center>
      <img src="/door2door/Modules/ModulesImage/D2DLOGO.png" style="width:190px;height:60px;border-radius:10px"  class="" style="opacity: .8">
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
                         
                            <img id="imagen-perfil" src="<?= $_SESSION["imagen-door2door"] ?>"  style="width:33px;height:33px;"  class="img-circle elevation-2" >
                       
                          <p style="font-size:19;color:#fff;">
                            <?php if($_SESSION["name-door2door"] == ''){
                                    echo "   ".$_SESSION["user-door2door"];
                                  }else{
                                    echo "   ".$_SESSION["name-door2door"];
                                  }?>
                          </p>
                        </a>
                                  
                    
                  </div>
                <ul class="nav nav-treeview">  
                  <li class="nav-item">
                    <center>
                      <div class="">      
                          <a href="/door2door/Modules/ModulePerfil/" class="btn text-center"  style="width:210px;color:#fff;">
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

              <!--  Menu APP  -->
              <?php if($_SESSION['typeUser-door2door'] == 'ADMINISTRATIVO'){?>              
                    <?php if($_SESSION['rolUser-door2door'] == 'ADMINISTRADOR'){?>  
                      <!-- Catalagos -->
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                            <img  title="Editar registro"   
                                  src="/door2door/Modules/ModulesImage/catalagos.png" 
                                  style="width:30px;height:30px" >
                            <p style="font-size:19;color:#fff;color:#fff;">
                              Catalagos
                            </p>
                            <i class="right fas fa-angle-left"></i> 
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleCatalogsConceptsPayment/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Conceptos cobro</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleCatalogsConceptsCommission/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Conceptos de comisión</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleCatalogsVehicles/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Tipo de vehículo</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleCatalogsMunicipioD/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Municipio / Delegaciones</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleCatalogsEstados/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Estados</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleCatalogsPaises/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Paises</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleCatalogsQuestionnaires/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Cuestionarios</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <!-- Solicitudes -->
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                            <img  title="Editar registro"   src="/door2door/Modules/ModulesImage/reporte.png" style="width:30px;height:30px">
                            <p style="font-size:19;color:#fff;">
                              Solicitudes
                            </p>
                            <i class="right fas fa-angle-left"></i> 
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleRequest/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Solicitudes</p>
                            </a>
                          </li>
                        </ul>
                      </li> 
                      <!-- Campañas -->
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                            <img  title="Editar registro"   src="/door2door/Modules/ModulesImage/capañas.png" style="width:30px;height:30px">
                            <p style="font-size:19;color:#fff;">
                              Campañas
                            </p>
                            <i class="right fas fa-angle-left"></i> 
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleCampaign/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Campañas</p>
                            </a>
                          </li>                      
                        </ul>
                      </li>
                      <!-- Socio -->
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                            <img  title="Editar registro"   src="/door2door/Modules/ModulesImage/perfiles.png" style="width:30px;height:30px">
                            <p style="font-size:19;color:#fff;">
                              Socio
                            </p>
                            <i class="right fas fa-angle-left"></i> 
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModulePerfilesSocio/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Socios</p>
                            </a>
                          </li>
                        
                          </li>
                        </ul>
                      </li>
                      <!-- Comisiones -->
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                            <img  title="Editar registro"   src="/door2door/Modules/ModulesImage/comiciones.png" style="width:30px;height:30px">
                            <p style="font-size:19;color:#fff;">
                              Comisiones
                            </p>
                            <i class="right fas fa-angle-left"></i> 
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleCommission/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Comisiones</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <!-- Seguridad -->
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                            <img  title="Editar registro"   src="/door2door/Modules/ModulesImage/usuarios.png" style="width:30px;height:30px">
                            <p style="font-size:19;color:#fff;">
                              Seguridad
                            </p>
                            <i class="right fas fa-angle-left"></i> 
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleUsersUsers/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Usuarios</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <!-- Mensajes -->
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                            <img  title="Editar registro"   src="/door2door/Modules/ModulesImage/sms.png" style="width:30px;height:30px">
                            <p style="font-size:19;color:#fff;">
                            Mensajes
                            </p>
                            <i class="right fas fa-angle-left"></i> 
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleMessageChat/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Chat</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <!-- Notificaciones -->
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                            <img  title="Editar registro"   src="/door2door/Modules/ModulesImage/notificaciones.png" style="width:30px;height:30px">
                            <p style="font-size:19;color:#fff;">
                            Notificaciones
                            </p>
                            <i class="right fas fa-angle-left"></i> 
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleNotifications/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Notificaciones</p>
                            </a>
                          </li>
                        
                        </ul>
                      </li>      
                      <!-- Reportes -->
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                            <img  title="Editar registro"   src="/door2door/Modules/ModulesImage/reportes.png" style="width:30px;height:30px">
                            <p style="font-size:19;color:#fff;">
                              Reportes
                            </p>
                            <i class="right fas fa-angle-left"></i> 
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleReportCampaign/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Reportes campañas</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleReportvisitas/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Reportes visitas</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleReportCommission/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Reportes comisiones</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <!-- Dashboard -->
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                            <img  title="Editar registro"   src="/door2door/Modules/ModulesImage/dashboard.png" style="width:30px;height:30px">
                            <p style="font-size:19;color:#fff;">
                            Dashboard
                            </p>
                            <i class="right fas fa-angle-left"></i> 
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleDashboard/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Indicadores</p>
                            </a>
                          </li>
                          <!--
                            <li class="nav-item">
                              <a href="/door2door/Modules/ModuleMaps/" class="nav-link">
                                <p style="font-size:16;color:#fff;">Mapa</p>
                              </a>
                            </li>
                          -->
                        </ul>
                      </li>                 
                      <!-- Ajustes -->
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                            <img  title="Editar registro"   src="/door2door/Modules/ModulesImage/ajustes.png" style="width:30px;height:30px">
                            <p style="font-size:19;color:#fff;">
                              Ajustes
                            </p>
                            <i class="right fas fa-angle-left"></i> 
                        </a>
                        <ul class="nav nav-treeview">            
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleSettingsCompanies/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Empresa</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleSettingsServeEmail/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Servidor correos</p>
                            </a>
                          </li>
                        
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleSettingsQuestionnaires/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Cuestionarios</p>
                            </a>
                          </li>
                          <!--
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleSettingsServeSMS/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Gateway SMS</p>
                            </a>
                          </li>
                          -->
                          <li class="nav-item">
                            <a href="/door2door/Modules/ModuleSettingsContrato/" class="nav-link">
                              <p style="font-size:16;color:#fff;">Contrato</p>
                            </a>
                          </li>
                          
                        
                        
                        
                        </ul>
                      </li>
                    <?php }?>     
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



