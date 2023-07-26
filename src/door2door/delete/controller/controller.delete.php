<?php
/*<Include classes>*/
    include_once('../model/door2door.model.delete.php');
    include_once('../../Modules/ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  door2door\Modules\ModulePugins\GeneradorTocken\GeneradorTocken as GeneradorTocken_validation;
  
/*</Import>*/

/*<Instaciacion de objetos>*/                
    $ObjectToken = new GeneradorTocken_validation();
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
                    $Object = new delete();
                /*</Instaciacion de objetos>*/ 
                /*</Proceso>*/                         
                    /*<VARIABLES>*/
                    
                        $JSON_RESULT                = [];
                        $RESULTADO_VALIDADOR        = [];
                        $RESULTADO_ELIMINAR_USUARIO = [];
                        $RESULTADO_ENVIAR_CORREO    = [];


                        $ID_USUARIO                 = 0;
                        $CORREO                     = '';

                    /*</VARIABLES>*/

                    /*<RESULTADO_VALIDADOR>*/
                        /*<RESULTADO_VALIDADOR>*/
                            $RESULTADO_VALIDADOR =  $Object->RESULTADO_VALIDADOR(
                                                                                $_POST['login-usuario-door2door'],
                                                                                $_POST['login-contrasena-door2door']
                                                                            ); 
                        /*</RESULTADO_VALIDADOR>*/
                        if($RESULTADO_VALIDADOR['message'] == 'Good' && $RESULTADO_VALIDADOR['userValitor'] == 'correct_user_door2door'){
                            $JSON_RESULT['RESULTADO_VALIDADOR'] = [];
                            $JSON_RESULT['RESULTADO_VALIDADOR'] = $RESULTADO_VALIDADOR;
                            $ID_USUARIO                         = $RESULTADO_VALIDADOR['ID_USUARIO'];
                            $CORREO                             = $RESULTADO_VALIDADOR['CORREO'];
                        }else{                            
                            $JSON_RESULT['RESULTADO_VALIDADOR'] = [];
                            $JSON_RESULT['RESULTADO_VALIDADOR'] = $RESULTADO_VALIDADOR;
                            $JSON_RESULT['message']             = 'RESULTADO_VALIDADOR';
                            echo json_encode( $JSON_RESULT );
                            return false;
                        }
                    /*<RESULTADO_VALIDADOR>*/

                    /*<RESULTADO_ELIMINAR_USUARIO>*/
                        /*<RESULTADO_ELIMINAR_USUARIO>*/
                            $RESULTADO_ELIMINAR_USUARIO =  $Object->RESULTADO_ELIMINAR_USUARIO( $ID_USUARIO ); 
                        /*</RESULTADO_ELIMINAR_USUARIO>*/
                        if($RESULTADO_ELIMINAR_USUARIO['message'] == 'Good'){
                            $JSON_RESULT['message']                    = 'Good';
                            $JSON_RESULT['RESULTADO_ELIMINAR_USUARIO'] = [];
                            $JSON_RESULT['RESULTADO_ELIMINAR_USUARIO'] = $RESULTADO_ELIMINAR_USUARIO ;
                        }else{
                            $JSON_RESULT['message']                     = 'RESULTADO_ELIMINAR_USUARIO';
                            $JSON_RESULT['RESULTADO_ELIMINAR_USUARIO'] = [];
                            $JSON_RESULT['RESULTADO_ELIMINAR_USUARIO'] = $RESULTADO_ELIMINAR_USUARIO ;
                            echo json_encode($JSON_RESULT);
                            return false;
                        }
                    /*<RESULTADO_ELIMINAR_USUARIO>*/

                    /*<RESULTADO_ENVIAR_CORREO>*/                    
                        /*<RESULTADO_ENVIAR_CORREO>*/   
                            $RESULTADO_ENVIAR_CORREO =  $Object->RESULTADO_ENVIAR_CORREO( $CORREO ); 
                        /*</RESULTADO_ENVIAR_CORREO>*/
                        if($RESULTADO_ENVIAR_CORREO['message']      == 'Good'){
                            $JSON_RESULT['RESULTADO_ENVIAR_CORREO'] = [];
                            $JSON_RESULT['RESULTADO_ENVIAR_CORREO'] = $RESULTADO_ENVIAR_CORREO ;
                        }else{
                            $JSON_RESULT['RESULTADO_ENVIAR_CORREO'] = [];
                            $JSON_RESULT['RESULTADO_ENVIAR_CORREO'] = $RESULTADO_ENVIAR_CORREO ;
                        }
                    /*<RESULTADO_ENVIAR_CORREO>*/   

                /*</Proceso>*/ 

                /*<Respuesta>*/  
                    echo json_encode($JSON_RESULT);
                    return true;
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
