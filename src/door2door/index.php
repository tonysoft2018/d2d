<?php
session_start();

if(!isset($_SESSION['session-door2door'])){
    session_destroy();
    header('Location: /door2door/closeSession/controller/closeSession.php');
}