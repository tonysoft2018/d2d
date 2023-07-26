<?php
session_start();

if(!isset($_SESSION['session-door2door']))
{
    session_destroy();
    header('Location: /d2dVisitador/closeSession/controller/closeSession.php');
}