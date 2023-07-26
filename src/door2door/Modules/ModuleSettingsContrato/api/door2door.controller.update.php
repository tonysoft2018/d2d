<?php

/*<Include classes>*/
    include_once('../model/door2door.model.contrato.php');
    include_once('../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  door2door\Modules\ModulePugins\GeneradorTocken\GeneradorTocken                       as GeneradorTocken_selecrFull;
    use  door2door\Modules\ModuleSettingsContrato\Model\Contrato\Contrato              as Usuarios_create;

/*<Instaciacion de objetos>*/                
    $ObjectToken = new GeneradorTocken_selecrFull();
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
                    $Direccion = '';
                    foreach($_FILES as $file){
                        if($file["error"]==UPLOAD_ERR_OK){
                            move_uploaded_file($file["tmp_name"], "./Documentos/D2D_File_".date("Ymdhis")."__".$file["name"]);   
                            $Direccion = '/door2door/Modules/ModuleSettingsContrato/api/Documentos/D2D_File_'.date("Ymdhis")."__".$file["name"];
                           
                        }
                        if(isset($_POST['create-id-door2door'])){                
                            if($_POST['create-id-door2door'] == 0){
                                $JSON_RESULT =  $Object->create( $Direccion  );        
                            }else{    
                                $JSON_RESULT = $Object->update( 
                                                                $_POST['create-id-door2door'],    
                                                                $Direccion 
                                                            );            
                            }
                        }else{
                            $JSON_RESULT['message'] = 'no hay id'; 
                        }
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