<?php
/*<Include classes>*/
    include_once('../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  d2dSocioWeb\Modules\ModulePugins\GeneradorTocken\GeneradorTocken as GeneradorTocken_delete;
/*</Import>*/

/*<Instaciacion de objetos>*/                
    $ObjectToken = new GeneradorTocken_delete();
/*</Instaciacion de objetos>*/

/*<Variables generales>*/
    $URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
    $URLtocken = $URL.'-'.$ObjectToken->generatorTocken('tocken-door2doors-01198756765345431234534ASDFSDFSDF-');
/*<Variables generales>*/

/*Validacion*/
if(isset($_POST['TockenOfdoor2doordoor2door']) && $_POST['TockenOfdoor2doordoor2door'] == $URLtocken)
{
    include_once("../Modelo/door2door.model.consult.php");
    $Object = new Consultas();
    echo  json_encode( $Object->Consultar( 
                                $_POST['tipo'], 
                                $_POST['feachinicio'], 
                                $_POST['fechafinal']
                            ));    
    
}else{
    echo "Tocker invalido - ";
}

?>