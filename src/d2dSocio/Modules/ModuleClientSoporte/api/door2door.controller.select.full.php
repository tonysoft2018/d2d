<?php

/*<Include classes>*/
    include_once('../model/door2door.model.Sugenrencias.php');
    include_once('../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  d2dSocio\Modules\ModulePugins\GeneradorTocken\GeneradorTocken                       as GeneradorTocken_selecrFull;
    use  d2dSocio\Modules\ModuleClientSugerenicas\Model\Sugerencias\Sugerencias              as Sugerencias;
/*<Import>*/ 
/*<Instaciacion de objetos>*/                
    $ObjectToken = new GeneradorTocken_selecrFull();
/*</Instaciacion de objetos>*/

/*<Variables generales>*/
    $URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
    $URLtocken = $URL.'-'.$ObjectToken->generatorTocken('tocken-door2doors-01198756765345431234534ASDFSDFSDF-');
/*<Variables generales>*/

/*<Validacion de tocken>*/
    if(true){      
        /*<Controlador>*/   
            try{
                /*<Instaciacion de objetos>*/                
                    $ObjectRoles = new Sugerencias();
                /*</Instaciacion de objetos>*/      
                /*</Proceso>*/  
                    $JSON_RESULT = $ObjectRoles->selectFull();
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