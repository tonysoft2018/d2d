<?php

/*<Include classes>*/
    include_once('../model/door2door.model.chat.php');
    include_once('../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  d2dVisitador\Modules\ModulePugins\GeneradorTocken\GeneradorTocken                  as GeneradorTocken_create;
    use  d2dVisitador\Modules\ModuleClientMessageChat\Model\chat\chat                                as Usuarios_create;
/*</Import>*/

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
                    $JSON_RESULT =  $Object->update(
                                                        $_POST['update-id-door2door'],
                                                        $_POST['update-nombre-door2door'],
                                                        $_POST['update-descripcion-door2door']
                                                    ); 
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