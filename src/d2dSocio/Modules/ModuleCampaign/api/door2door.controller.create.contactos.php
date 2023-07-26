<?php

/*<Include classes>*/
    include_once('../model/door2door.model.contactos.php');
    include_once('../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  d2dSocio\Modules\ModulePugins\GeneradorTocken\GeneradorTocken as GeneradorTocken_create;
    use  d2dSocio\Modules\ModuleCampaign\Model\Contactos\Contactos     as Contactos_create;
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
                 /*<GEOLOCALIZACION>*/

                            /*<VARIABLE>*/
                                $ARREGLO_LAT                    = 0;
                                $ARREGLO_LGN                    = 0;
                                $RESPUESTA_GEOLOCALIZACION_UNO  = [];

                                $NOMBRE_MUNICIPIO               = $Object->selectIdMunicipio( 
                                                                    $_POST['create-contactos-municipio-door2door']
                                                                );
                                $NOMBRE_ESTADO                  = $Object->selectIdEstado( 
                                                                    $_POST['create-contactos-estado-door2door']
                                                                );
                              
                                /*<VALIDACION DE FUNCION NOMBRE_MUNICIPIO>*/
                                    if($NOMBRE_MUNICIPIO['message'] != 'Good'){
                                        echo json_encode($NOMBRE_MUNICIPIO);
                                        return false;
                                    }else{
                                        $NOMBRE_MUNICIPIO = $NOMBRE_MUNICIPIO['nombre'];
                                        
                                    }
                                /*</VALIDACION DE FUNCION NOMBRE_MUNICIPIO>*/

                                /*<VALIDACION DE FUNCION NOMBRE_ESTADO>*/
                                    if($NOMBRE_ESTADO['message'] != 'Good'){
                                        echo json_encode($NOMBRE_ESTADO);
                                        return false;
                                    }else{
                                        $NOMBRE_ESTADO = $NOMBRE_ESTADO['nombre'];
                                    }
                                /*</VALIDACION DE FUNCION NOMBRE_ESTADO>*/

                            /*</VARIABLE>*/
                            $RESPUESTA_GEOLOCALIZACION_UNO = $Object->getGeocodeData(
                                $_POST['create-contactos-noexterior-door2door'],
                                $_POST['create-contactos-calle-door2door'],
                                $NOMBRE_MUNICIPIO,
                                $NOMBRE_ESTADO
                            );

                            $ARREGLO_LAT    = $RESPUESTA_GEOLOCALIZACION_UNO['lat'];
                            $ARREGLO_LGN    = $RESPUESTA_GEOLOCALIZACION_UNO['lng'];

                        /*</GEOLOCALIZACION>*/

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
                                                                        $_POST['idCampana'],
                                                                        $_POST['create-contactos-email-door2door'],
                                                                        $ARREGLO_LAT,
                                                                        $ARREGLO_LGN
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