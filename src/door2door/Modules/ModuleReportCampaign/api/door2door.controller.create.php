<?php
header("Content-Type: application/force-download");

/*Validacion*/
if(isset($_GET['token']) && $_GET['token'] == '423421342442134242134214412421342341234234')
{
    include_once("../model/Model.Reportes.php");
    $Object = new Reportes();

    if($_GET['file'] == 'pdf'){
        echo $Object->CreacionPDF(
            $_GET['FechaInicio'],
            $_GET['FechaFinal']
        );
    }else if($_GET['file'] == 'excel'){
        echo $Object->CreacionExcel(
            $_GET['FechaInicio'],
            $_GET['FechaFinal']
        );
    }
}else{
    echo "Tocker invalido - ";
}

?>