<?php
/*<Include classes>*/
    include_once('../model/door2door.model.tocken.php');
 
/*</Import>*/

/*<Instaciacion de objetos>*/                
/*</Instaciacion de objetos>*/

/*<Variables generales>*/
    $URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
   // $URLtocken = $URL.'-'.$ObjectToken->generatorTocken('tocken-door2doors-01198756765345431234534ASDFSDFSDF-');
/*<Variables generales>*/

/*<Validacion de tocken>*/
    if(true){      

        
        /*<Controlador>*/      
            try{
                /*<Instaciacion de objetos>*/                
                    $Object = new newmember();
                /*</Instaciacion de objetos>*/ 
                  
                /*</Proceso>*/                   
                    /*<VARIABLES>*/
                        $JSON_RESULT                    = [];
                        $REUSLTADO_VALIDAR_TOCKEN       = [];
                        $REUSLTADO_CAMBIAR_CONTRASENA   = [];
                        $REUSLTADO_CAMBIAR_ESTATUS      = [];
                       

                        $ID_USUARIOS                    = $_POST['tocken-idUsuario'];
                        $ID_TRECUPERACION               = 0;
                        $TOKEN                          = $_POST['tocken-idTRecuperacion'];
                        $CONTASENA                      = $_POST['tocken-contrasena-door2door'];
                    /*</VARIABLES>*/

                    /*<REUSLTADO_VALIDAR_TOCKEN>*/
                        /*<REUSLTADO_VALIDAR_TOCKEN>*/
                            $REUSLTADO_VALIDAR_TOCKEN = $Object->REUSLTADO_VALIDAR_TOCKEN( $TOKEN );
                        /*</REUSLTADO_VALIDAR_TOCKEN>*/
                        if($REUSLTADO_VALIDAR_TOCKEN['message'] != 'Good'){
                            $JSON_RESULT['message']                         = 'REUSLTADO_VALIDAR_TOCKEN';
                            $JSON_RESULT['REUSLTADO_VALIDAR_TOCKEN']        = $REUSLTADO_VALIDAR_TOCKEN;
                            echo json_encode($JSON_RESULT);                
                            return false;
                        }else{                            
                            $JSON_RESULT['REUSLTADO_VALIDAR_TOCKEN']        = $REUSLTADO_VALIDAR_TOCKEN;
                            $ID_USUARIOS                                    = $REUSLTADO_VALIDAR_TOCKEN['ID_USUARIOS'];
                            $ID_TRECUPERACION                               = $REUSLTADO_VALIDAR_TOCKEN['ID_TRECUPERACION'];
                        }
                    /*</REUSLTADO_VALIDAR_TOCKEN>*/

                    /*<REUSLTADO_CAMBIAR_CONTRASENA>*/
                        /*<REUSLTADO_CAMBIAR_CONTRASENA>*/
                            $REUSLTADO_CAMBIAR_CONTRASENA = $Object->REUSLTADO_CAMBIAR_CONTRASENA( 
                                $ID_USUARIOS,
                                $CONTASENA 
                            );
                        /*</REUSLTADO_CAMBIAR_CONTRASENA>*/
                        if($REUSLTADO_CAMBIAR_CONTRASENA['message'] != 'Good'){
                            $JSON_RESULT['message']                         = 'REUSLTADO_CAMBIAR_CONTRASENA';
                            $JSON_RESULT['REUSLTADO_CAMBIAR_CONTRASENA']    = $REUSLTADO_CAMBIAR_CONTRASENA;
                            echo json_encode($JSON_RESULT);                
                            return false;
                        }else{                            
                            $JSON_RESULT['REUSLTADO_CAMBIAR_CONTRASENA']    = $REUSLTADO_CAMBIAR_CONTRASENA;
                        }
                    /*</REUSLTADO_CAMBIAR_CONTRASENA>*/

                    /*<REUSLTADO_CAMBIAR_ESTATUS>*/
                        /*<REUSLTADO_CAMBIAR_ESTATUS>*/
                            $REUSLTADO_CAMBIAR_ESTATUS = $Object->REUSLTADO_CAMBIAR_ESTATUS( $ID_TRECUPERACION );
                        /*</REUSLTADO_CAMBIAR_ESTATUS>*/
                        if($REUSLTADO_CAMBIAR_ESTATUS['message'] != 'Good'){
                            $JSON_RESULT['message']                         = 'REUSLTADO_CAMBIAR_ESTATUS';
                            $JSON_RESULT['REUSLTADO_CAMBIAR_ESTATUS']       = $REUSLTADO_CAMBIAR_ESTATUS;
                            echo json_encode($JSON_RESULT);                
                            return false;
                        }else{                            
                            $JSON_RESULT['REUSLTADO_CAMBIAR_ESTATUS']       = $REUSLTADO_CAMBIAR_ESTATUS;
                            $JSON_RESULT['message']                         = 'Good';
                        }
                    /*</REUSLTADO_CAMBIAR_ESTATUS>*/
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
