<?php

/*<Include classes>*/
    include_once('../model/door2door.model.solicitudes.php');
    include_once('../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  door2door\Modules\ModulePugins\GeneradorTocken\GeneradorTocken                     as GeneradorTocken_delete;
    use  door2door\Modules\ModuleRequest\Model\Solicitudes\Solicitudes                      as Solicitudes_create;
/*</Import>*/

/*<Instaciacion de objetos>*/                
    $ObjectToken = new GeneradorTocken_delete();
/*</Instaciacion de objetos>*/

/*<Variables generales>*/
    $URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
    $URLtocken = $URL.'-'.$ObjectToken->generatorTocken('tocken-door2doors-01198756765345431234534ASDFSDFSDF-');
/*<Variables generales>*/

/*<Validacion de tocken>*/
    if(isset($_POST['TockenOfdoor2doordoor2door']) && (
                                                    $_POST['TockenOfdoor2doordoor2door'] == $URLtocken  ||
                                                    $ObjectToken->validadorTocken($URLtocken) 
                                                )){      
        /*<Controlador>*/
            try{
                /*<Instaciacion de objetos>*/                
                    $ObjectRoles = new Solicitudes_create();
                /*</Instaciacion de objetos>*/      
                /*</Proceso>*/  
                    $JSON_RESULT = $ObjectRoles->rechazar(
                        $_POST['rechazar-id-door2door'],
                        $_POST['rechazar-comentario-door2door']
                    );
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