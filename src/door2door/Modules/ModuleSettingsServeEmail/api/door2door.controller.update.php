<?php

/*<Include classes>*/
    include_once('../model/door2door.model.ServeEmail.php');
    include_once('../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  door2door\Modules\ModulePugins\GeneradorTocken\GeneradorTocken                       as GeneradorTocken_create;
    use  door2door\Modules\ModuleSettingsServeEmail\Model\ServeEmail\ServeEmail               as Usuarios_create;

/*<Instaciacion de objetos>*/                
    $ObjectToken = new GeneradorTocken_create();
/*</Instaciacion de objetos>*/

/*<Variables generales>*/
    $URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
    $URLtocken = $URL.'-'.$ObjectToken->generatorTocken('tocken-door2doors-01198756765345431234534ASDFSDFSDF-');
/*<Variables generales>*/

/*<Validacion  de tocken>*/
    if(isset($_POST['TockenOfdoor2doordoor2door']) &&     (
                                                                $_POST['TockenOfdoor2doordoor2door'] == $URLtocken  ||
                                                                $ObjectToken->validadorTocken($URLtocken) 
                                                    )
    ){
        /*<Controlador>*/ 
            try{     
                /*<Instaciacion de objetos>*/                
                    $Object = new Usuarios_create();
                /*</Instaciacion de objetos>*/ 
            
                /*<Proceso>*/  
                    $JSON_RESULT = []; 
                    if(isset($_POST['create-id-door2door'])){                
                        if($_POST['create-id-door2door'] == 0){
                            $JSON_RESULT =  $Object->create(
                                        $_POST['create-usuario-door2door'],
                                        $_POST['create-contrasena-door2door'],
                                        $_POST['create-servidorssalida-door2door'],
                                        $_POST['create-puerto-door2door'],
                                        $_POST['create-asunto-door2door'],
                                        $_POST['create-cuerpo-door2door']
                                    ); 
    
                        }else{    
                            $JSON_RESULT = $Object->update(
                                        $_POST['create-id-door2door'],
                                        $_POST['create-usuario-door2door'],
                                        $_POST['create-contrasena-door2door'],
                                        $_POST['create-servidorssalida-door2door'],
                                        $_POST['create-puerto-door2door'],
                                        $_POST['create-asunto-door2door'],
                                        $_POST['create-cuerpo-door2door']
                                );    
    
                        }
                    }else{
                        $JSON_RESULT['message'] = 'no hay id'; 
                    }
                /*</Proceso>*/  
                
                /*<Respuesta>*/  
                    echo json_encode($JSON_RESULT);
                /*</Respuesta>*/  
            } catch(Exepction $e){
                $JSON_RESULT            = [];
                $JSON_RESULT['message'] = 'Sorry errt server'; 
            }
        /*<Controlador>*/
    }else{
        $JSON_RESULT            = [];
        $JSON_RESULT['message'] = 'Sorry invalid Tocken'; 
        echo json_encode($JSON_RESULT);
    }
/*</Validacion  de tocken>*/

?>