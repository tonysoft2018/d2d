<?php
session_start();

if(!isset($_SESSION['session-door2door'])){
    session_destroy();
    header('Location: /d2dSocio/closeSession/controller/closeSession.php');
}