<?php

/*<Include classes>*/
    include_once('../model/door2door.model.contactos.php');
    include_once('../../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  door2door\Modules\ModulePugins\GeneradorTocken\GeneradorTocken as GeneradorTocken_create;
    use  door2door\Modules\ModulePerfilesSocio\ModuleCampaign\Model\Contactos\Contactos     as Contactos_create;
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
        /*<Controlador>*/
            try{
                /*<Instaciacion de objetos>*/                
                    $Object= new Contactos_create();
                /*</Instaciacion de objetos>*/     

                /*</Proceso>*/  

                  $JSON_RESULT = $Object->create(    
                                                                        $_POST['create-contactos-nombre-door2door'],
                                                                        $_POST['create-contactos-calle-door2door'],
                                                                        $_POST['create-contactos-telefono-door2door'],
                                                                        $_POST['create-contactos-noexterior-door2door'],
                                                                        $_POST['create-contactos-nointerior-door2door'],
                                                                        $_POST['create-contactos-codigopostal-door2door'],
                                                                        $_POST['create-contactos-colonia-door2door'],
                                                                        $_POST['create-contactos-pais-door2door'],
                                                                        $_POST['create-contactos-estado-door2door'],
                                                                        $_POST['create-contactos-municipio-door2door'],
                                                                        $_POST['create-contactos-deuda-door2door'],
                                                                        $_POST['idCampana']
                                                                    );
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