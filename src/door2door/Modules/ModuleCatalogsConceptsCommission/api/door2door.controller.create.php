<?php
/*<Include classes>*/
    include_once('../model/door2door.model.ConceptsCommission.php');
    include_once('../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  door2door\Modules\ModulePugins\GeneradorTocken\GeneradorTocken                                       as GeneradorTocken_create;
    use  door2door\Modules\ModuleCatalogsConceptsCommission\Model\ConceptsCommission\ConceptsCommission       as Services_create;
/*</Import>*/

/*<Instaciacion de objetos>*/                
    $ObjectToken = new GeneradorTocken_create();
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

        $JSON_RESULT            = [];
        
        /*<Controlador>*/      
            try{
                /*<Instaciacion de objetos>*/                
                    $Object = new Services_create();
                    $Direccion = '';
                /*</Instaciacion de objetos>*/ 
                  
                /*</Proceso>*/  
                $JSON_RESULT =  $Object->create(    $_POST['create-nombre-door2door'],
                                                    $_POST['create-descripcion-door2door'],

                                                    $_POST['create-tipo-door2door'],
                                                    $_POST['create-zona-door2door'],
                                                    $_POST['create-cantidad-door2door'],
                                                    $_POST['create-comision-door2door']
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

?>