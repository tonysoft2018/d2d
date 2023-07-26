<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars icon-menu"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown" >
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge" id="totalmensajes">0</span>
            <input type="hidden" id="totalmensajes-input">
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;" >
                <div id="mensajesiniciales">
                   
                </div>
                <a href="/d2dSocioWeb/Modules/ModuleMessageChat/" class="dropdown-item dropdown-footer">Ver todos los mensajes</a>
            </div>
        </li>
        <li class="nav-item dropdown" >
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell" ></i>
                <span class="badge badge-warning navbar-badge" id="totalNotificaciones">0</span>
                
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"style="color: black;" >
                <span class="dropdown-item dropdown-header" id="totalNotificacionessubmenu" >0 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item" style="color: black;" id="totalNotificacionessubmenuTercero">
                    
                    
                </a>
                
                <a href="#" class="dropdown-item dropdown-footer" style="color: black;">Ver todas las notificaciones</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <!-- Navbar Search -->
      
    </ul>
</nav>

<?php include_once("messages/ModalMensajesMain.php"); ?>
<?php include_once("messages/ModalNotificaciones.php"); ?>
<?php include_once('messages/ScriptStaticEvents.php'); ?>
<?php include_once('messages/ScriptDinamic.php'); ?>
