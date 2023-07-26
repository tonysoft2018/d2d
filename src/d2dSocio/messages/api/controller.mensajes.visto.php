<?php

/*<Include classes>*/
    include_once('../model/door2door.model.mensajes.php');
    include_once('../../Modules/ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  d2dSocio\Modules\ModulePugins\GeneradorTocken\GeneradorTocken as GeneradorTocken;
    use  d2dSocio\Messages\Model\Messages\Messages      as Messages;
/*<Import>*/ 
/*<Instaciacion de objetos>*/                
    $ObjectToken = new GeneradorTocken();
/*</Instaciacion de objetos>*/

/*<Variables generales>*/
    $URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
    $URLtocken = $URL.'-'.$ObjectToken->generatorTocken('tocken-door2doors-01198756765345431234534ASDFSDFSDF-');
/*<Variables generales>*/

/*<Validacion de tocken>
if(isset($_POST['TockenOfdoor2doordoor2door']) && (
    $_POST['TockenOfdoor2doordoor2door'] == $URLtocken  ||
    $ObjectToken->validadorTocken($URLtocken) 
)){    */  
if(true){      
        /*<Controlador>*/   
            try{
                /*<Instaciacion de objetos>*/                
                    $Object = new Messages();
                /*</Instaciacion de objetos>*/      
                /*</Proceso>*/  
                    $JSON_RESULT = $Object->Visto($_POST['idUsuario']);
                /*</Proceso>*/  
                /*<Respuesta>*/  
                    echo json_encode($JSON_RESULT);
                /*</Respuesta>*/ 

            } catch(Exepction $e){
                $JSON_RESULT            = [];
                $JSON_RESULT['message'] = 'Sorry errt server'; 
            }

        /*</Controlador>*/    

    }else{
    /*<Token invalido>*/
        $JSON_RESULT            = [];
        $JSON_RESULT['message'] = 'Sorry invalid Tocken'; 
        echo json_encode($JSON_RESULT);
    /*</Token invalido>*/
    }
/*<Validacion de tocken>*/
?>