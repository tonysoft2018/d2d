<?php
/*<Include classes>*/
    include_once('../model/door2door.model.email.php');
    include_once('../../../Modules/ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  d2dVisitador\Modules\ModulePugins\GeneradorTocken\GeneradorTocken  as GeneradorTocken;
    //use  d2dVisitador\Newpassword\Email\Model\Newpassword\Newpassword       as Newpassword;
/*</Import>*/

/*<Instaciacion de objetos>*/                
    $ObjectToken = new GeneradorTocken();
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
                    $Object = new Newpassword();
                /*</Instaciacion de objetos>*/ 
                  
                /*</Proceso>*/  

                    /*<VALOR>*/
                        $JSON_RESULT                = [];  
                        $RESPUESTA_VALIDAR_CORREO   = [];
                        $RESPUESTA_CREAR_TOCKEN     = [];
                        $RESPUESTA_ENVIAR_CORREO    = [];

                        $ID_USUARIO                 = 0;
                        $EMAIL                      = $_POST['email'];
                        $TOCKEN                     = '';
                    /*</VALOR>*/     

                    /*<RESPUESTA_VALIDAR_CORREO>*/
                        /*<RESPUESTA_VALIDAR_CORREO>*/
                            $RESPUESTA_VALIDAR_CORREO = $Object->RESPUESTA_VALIDAR_CORREO($EMAIL);
                        /*</RESPUESTA_VALIDAR_CORREO>*/
                        if($RESPUESTA_VALIDAR_CORREO['message'] != 'Good'){
                            $JSON_RESULT['message']                  = 'RESPUESTA_VALIDAR_CORREO';
                            $JSON_RESULT['RESPUESTA_VALIDAR_CORREO'] = $RESPUESTA_VALIDAR_CORREO;
                            echo json_encode($JSON_RESULT);                
                            return false;
                        }else{
                            $ID_USUARIO                              = $RESPUESTA_VALIDAR_CORREO['ID_USUARIO'];
                            $JSON_RESULT['RESPUESTA_VALIDAR_CORREO'] = $RESPUESTA_VALIDAR_CORREO;
                        }
                    /*</RESPUESTA_VALIDAR_CORREO>*/ 

                    /*<RESPUESTA_CREAR_TOCKEN>*/
                        /*<RESPUESTA_CREAR_TOCKEN>*/
                            $RESPUESTA_CREAR_TOCKEN = $Object->RESPUESTA_CREAR_TOCKEN( 
                                $ID_USUARIO,
                                $EMAIL,
                             );
                        /*</RESPUESTA_CREAR_TOCKEN>*/
                        if($RESPUESTA_CREAR_TOCKEN['message'] != 'Good'){
                            $JSON_RESULT['message']                  = 'RESPUESTA_CREAR_TOCKEN';
                            $JSON_RESULT['RESPUESTA_CREAR_TOCKEN']   = $RESPUESTA_CREAR_TOCKEN;
                            echo json_encode($JSON_RESULT);                
                            return false;
                        }else{
                            $TOCKEN                                = $RESPUESTA_CREAR_TOCKEN['TOCKEN'];
                            $JSON_RESULT['RESPUESTA_CREAR_TOCKEN'] = $RESPUESTA_CREAR_TOCKEN;
                        }
                    /*</RESPUESTA_CREAR_TOCKEN>*/

                    /*<RESPUESTA_ENVIAR_CORREO>*/
                        /*<RESPUESTA_ENVIAR_CORREO>*/
                            $RESPUESTA_ENVIAR_CORREO = $Object->RESPUESTA_ENVIAR_CORREO( 
                                $TOCKEN,
                                $EMAIL 
                            );
                        /*</RESPUESTA_ENVIAR_CORREO>*/
                        if($RESPUESTA_ENVIAR_CORREO['message'] != 'Good'){
                            $JSON_RESULT['message']                  = 'RESPUESTA_ENVIAR_CORREO';
                            $JSON_RESULT['RESPUESTA_ENVIAR_CORREO']  = $RESPUESTA_ENVIAR_CORREO;
                            echo json_encode($JSON_RESULT);                
                            return false;
                        }else{                            
                            $JSON_RESULT['RESPUESTA_ENVIAR_CORREO'] = $RESPUESTA_ENVIAR_CORREO;
                            $JSON_RESULT['message']                 = 'Good';
                        }
                    /*</RESPUESTA_ENVIAR_CORREO>*/
                 
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
