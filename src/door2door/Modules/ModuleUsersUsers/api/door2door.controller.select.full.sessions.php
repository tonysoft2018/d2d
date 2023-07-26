<?php

/*<Include classes>*/
    include_once('../model/door2door.model.usuarioas.php');
    include_once('../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  door2door\Modules\ModulePugins\GeneradorTocken\GeneradorTocken as GeneradorTocken_selecrFullSession;
    use  door2door\Modules\ModuleUsersUsers\model\Usuarios\Usuarios      as Usuarios_selecrFullSessions;
/*<Import>*/ 
/*<Instaciacion de objetos>*/                
    $ObjectToken = new GeneradorTocken_selecrFullSession();
/*</Instaciacion de objetos>*/

/*<Variables generales>*/
    $URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
    $URLtocken = $URL.'-'.$ObjectToken->generatorTocken('tocken-door2doors-01198756765345431234534ASDFSDFSDF-');
    $JSON_RESULT = [];
/*<Variables generales>*/

/*<Validacion de tocken>*/
    if(isset($_POST['TockenOfdoor2doordoor2door']) && (
                                                $_POST['TockenOfdoor2doordoor2door'] == $URLtocken  ||
                                                $ObjectToken->validadorTocken($URLtocken) 
                                            )){      
        /*<Controlador>*/   
            try{
                /*<Instaciacion de objetos>*/                
                    $Object = new Usuarios_selecrFullSessions();
                /*</Instaciacion de objetos>*/      
                
                /*</Proceso>*/  
                    $JSON_RESULT = $Object->selectFullSessions($_POST['idUser']);
                /*</Proceso>*/  
                /*<Respuesta>*/  
                    echo json_encode($JSON_RESULT);
                /*</Respuesta>*/ 

            } catch(Exepction $e){
                $JSON_RESULT            = [];
                $JSON_RESULT['message'] = 'Sorry errt server'; 
                echo json_encode($JSON_RESULT);
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