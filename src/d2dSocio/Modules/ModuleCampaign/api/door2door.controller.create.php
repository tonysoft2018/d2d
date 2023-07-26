<?php

/*<Include classes>*/
    include_once('../model/door2door.model.campanas.php');
    include_once('../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  d2dSocio\Modules\ModulePugins\GeneradorTocken\GeneradorTocken as GeneradorTocken_delete;
    use  d2dSocio\Modules\ModuleCampaign\Model\Campanas\Campanas       as Usuarios_create;
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
                    $Object= new Usuarios_create();
                /*</Instaciacion de objetos>*/     

                /*</Proceso>*/  

                    $FOLIO                              = 0;
                    $RESPUETA_GENERAR_FOLIO_SOLICITUD   = [];
                    $RESPUETA_INSERTAR_CAMPANA          = []; 

                    /*<RESPUETA_GENERAR_FOLIO_SOLICITUD>*/
                        /*<RESPUETA_GENERAR_FOLIO_SOLICITUD>*/
                            $RESPUETA_GENERAR_FOLIO_SOLICITUD = $Object->RESPUETA_GENERAR_FOLIO_SOLICITUD();
                        /*</RESPUETA_INSERTAR_USUARIO>*/
                        if($RESPUETA_GENERAR_FOLIO_SOLICITUD <= 0){
                            $JSON_RESULT['message']                          = 'RESPUETA_GENERAR_FOLIO_SOLICITUD';
                            $JSON_RESULT['RESPUETA_GENERAR_FOLIO_SOLICITUD'] = $RESPUETA_GENERAR_FOLIO_SOLICITUD;
                            echo json_encode($JSON_RESULT);                
                            return false; 
                        }else{
                            $FOLIO                                           = $RESPUETA_GENERAR_FOLIO_SOLICITUD;
                            $JSON_RESULT['FOLIO']                            = $RESPUETA_GENERAR_FOLIO_SOLICITUD;
                        }
                    /*</RESPUETA_GENERAR_FOLIO_SOLICITUD>*/   

                    /*<RESPUETA_INSERTAR_USUARIO>*/
                        /*<RESPUETA_INSERTAR_USUARIO>*/
                            $RESPUETA_INSERTAR_CAMPANA = $Object->RESPUETA_INSERTAR_CAMPANA(    $FOLIO, 
                                                                                                $_POST['create-nombre-door2door'],
                                                                                                $_POST['create-descripcion-door2door'],
                                                                                                $_POST['create-tipocampana-door2door'],
                                                                                                $_POST['create-descripcionrecoleccion-door2door']
                                                                                            );
                        /*</RESPUETA_INSERTAR_USUARIO>*/
                        if($RESPUETA_INSERTAR_CAMPANA['message'] != 'Good'){
                            $JSON_RESULT['message']                   = 'RESPUETA_INSERTAR_CAMPANA';
                            $JSON_RESULT['RESPUETA_INSERTAR_CAMPANA'] = $RESPUETA_INSERTAR_CAMPANA;
                            echo json_encode($JSON_RESULT);                
                            return false; 
                        }else{
                            $JSON_RESULT['RESPUETA_INSERTAR_CAMPANA'] = $RESPUETA_INSERTAR_CAMPANA;
                        }
                    /*</RESPUETA_INSERTAR_USUARIO>*/   

                /*<Respuesta>*/  
                    $JSON_RESULT['message'] = 'Good';
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