<?php

/*<Include classes>*/
    include_once('../model/door2door.model.Seguimientos.php');
    include_once('../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  d2dSocio\Modules\ModulePugins\GeneradorTocken\GeneradorTocken                         as GeneradorTocken_create;
    use  d2dSocio\Modules\ModuleClientSeguimientos\Model\Seguimientos\Seguimientos               as Seguimientos;
/*</Import>*/

/*<Instaciacion de objetos>*/                
    $ObjectToken = new GeneradorTocken_create();
/*</Instaciacion de objetos>*/

/*<Variables generales>*/
    $URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
    $URLtocken = $URL.'-'.$ObjectToken->generatorTocken('tocken-door2doors-01198756765345431234534ASDFSDFSDF-');
/*<Variables generales>*/

/*<Validacion  de tocken>*/
    if(true
                                                    
    ){
        /*<Controlador>*/ 
            try{     
                /*<Instaciacion de objetos>*/                
                    $Object = new Seguimientos();
                /*</Instaciacion de objetos>*/ 
            
                /*<Proceso>*/  
                    $RESPUESTA_FINAL = []; 

                    $RESPUESTA_SELECCIONADO     = [];
                    $RESPUESTA_GENERAR_FOLIO    = [];
                    $RESPUESTA_CREAR_VISITA     = [];

                    $ID_CONTACTO    = $_POST['idContacto'];
                    $FOLIO          = 0;

                    /*<RESPUESTA_SELECCIONADO>*/
                        /*<RESPUESTA_SELECCIONADO>*/
                            $RESPUESTA_SELECCIONADO = $Object->Selected( $ID_CONTACTO ); 
                        /*</RESPUESTA_SELECCIONADO>*/
                        if($RESPUESTA_SELECCIONADO['message'] != 'Good'){
                            $RESPUESTA_FINAL['message']                = 'RESPUESTA_SELECCIONADO-';
                            $RESPUESTA_FINAL['RESPUESTA_SELECCIONADO'] = $RESPUESTA_SELECCIONADO;
                            echo json_encode($RESPUESTA_FINAL);                
                            return false; 
                        }else{
                            $RESPUESTA_FINAL['RESPUESTA_SELECCIONADO'] = $RESPUESTA_SELECCIONADO;                            
                        }
                    /*</RESPUESTA_SELECCIONADO>*/ 

                    /*<RESPUESTA_GENERAR_FOLIO>*/
                        /*<RESPUESTA_GENERAR_FOLIO>*/
                        $RESPUESTA_GENERAR_FOLIO = $Object->RESPUESTA_GENERAR_FOLIO( ); 
                        /*</RESPUESTA_SELECCIONADO>*/
                        if($RESPUESTA_GENERAR_FOLIO <= 0){
                            $RESPUESTA_FINAL['message']                = 'RESPUESTA_GENERAR_FOLIO';
                            $RESPUESTA_FINAL['RESPUESTA_GENERAR_FOLIO'] = $RESPUESTA_GENERAR_FOLIO;
                            echo json_encode($RESPUESTA_FINAL);                
                            return false; 
                        }else{
                            $RESPUESTA_FINAL['RESPUESTA_GENERAR_FOLIO'] = $RESPUESTA_GENERAR_FOLIO;   
                            $FOLIO                                      = $RESPUESTA_GENERAR_FOLIO;                        
                        }
                    /*</RESPUESTA_GENERAR_FOLIO>*/ 

                    /*<RESPUESTA_CREAR_VISITA>*/
                        /*<RESPUESTA_CREAR_VISITA>*/
                            $RESPUESTA_CREAR_VISITA = $Object->RESPUESTA_CREAR_VISITA( $ID_CONTACTO,  $FOLIO ); 
                        /*</RESPUESTA_CREAR_VISITA>*/
                        if($RESPUESTA_CREAR_VISITA['message'] != 'Good'){
                            $RESPUESTA_FINAL['message']                = 'RESPUESTA_CREAR_VISITA';
                            $RESPUESTA_FINAL['RESPUESTA_CREAR_VISITA'] = $RESPUESTA_CREAR_VISITA;
                            echo json_encode($RESPUESTA_FINAL);                
                            return false; 
                        }else{
                            $RESPUESTA_FINAL['message']                = 'Good';
                            $RESPUESTA_FINAL['RESPUESTA_CREAR_VISITA'] = $RESPUESTA_CREAR_VISITA;  
                            echo json_encode($RESPUESTA_FINAL);    
                            return true;                                    
                        }
                    /*</RESPUESTA_CREAR_VISITA>*/ 

                /*</Proceso>*/  
                
                /*<Respuesta>*/  
                    echo json_encode($RESPUESTA_FINAL);
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