<?php
/*<Include classes>*/
    include_once('../model/door2door.model.empresa.php');
    include_once('../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  door2door\Modules\ModulePugins\GeneradorTocken\GeneradorTocken                                   as GeneradorTocken_create;
    use  door2door\Modules\ModuleSettingsCompanies\Model\SettingsCompanies\SettingsCompanies              as Services_create;
/*<Import>*/   

/*<Instaciacion de objetos>*/                
    $ObjectToken = new GeneradorTocken_create();
/*</Instaciacion de objetos>*/

/*<Variables generales>*/
$URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
$URLtocken = $URL.'-'.$ObjectToken->generatorTocken('tocken-door2doors-01198756765345431234534ASDFSDFSDF-');
/*<Variables generales>*/

/*<Validacion de tocken>*/
if(true){      

        $JSON_RESULT            = [];
        /*<Controlador>*/      
            try{
                /*<Instaciacion de objetos>*/                
                    $Object = new Services_create();
                /*</Instaciacion de objetos>*/ 
                $Direccion = '';
                foreach($_FILES as $file){
                    if($file["error"]==UPLOAD_ERR_OK){
                        move_uploaded_file($file["tmp_name"], "./Documentos/D2D_File_".date("Ymdhis")."__".$file["name"]);   
                        $Direccion = '/door2door/Modules/ModuleSettingsCompanies/api/Documentos/door2door_File_'.date("Ymdhis")."__".$file["name"];
                       
                    }
                    if(isset($_POST['create-id-door2door'])){                
                        if($_POST['create-id-door2door'] == 0){
                            $JSON_RESULT =  $Object->create(
                                        $_POST['create-razonsocial-door2door'],
                                        $_POST['create-rfc-door2door'],
                                        $_POST['create-domicilio-door2door'],
                                        $_POST['create-noexterior-door2door'],
                                        $_POST['create-nointerior-door2door'],
                                        $_POST['create-colonia-door2door'],
                                        $_POST['create-ciudad-door2door'],
                                        $_POST['create-estado-door2door'],
                                        $_POST['create-pais-door2door'],
                                        $_POST['create-codigopostal-door2door'],
                                        $_POST['create-telefono-door2door'],
                                        $_POST['create-celular-door2door'],
                                        $_POST['create-email-door2door'],
                                        $Direccion    
                                    ); 
    
                        }else{    
                            $JSON_RESULT = $Object->update(
                                        $_POST['create-id-door2door'],
                                        $_POST['create-razonsocial-door2door'],
                                        $_POST['create-rfc-door2door'],
                                        $_POST['create-domicilio-door2door'],
                                        $_POST['create-noexterior-door2door'],
                                        $_POST['create-nointerior-door2door'],
                                        $_POST['create-colonia-door2door'],
                                        $_POST['create-ciudad-door2door'],
                                        $_POST['create-estado-door2door'],
                                        $_POST['create-pais-door2door'],
                                        $_POST['create-codigopostal-door2door'],
                                        $_POST['create-telefono-door2door'],
                                        $_POST['create-celular-door2door'],
                                        $_POST['create-email-door2door'],
                                        $Direccion
                                );    
    
                        }
                    }else{
                        $JSON_RESULT['message'] = 'no hay id'; 
                    }
                }   
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