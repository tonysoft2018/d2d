<?php
/*<Include classes>*/
    include_once('../model/door2door.model.chat.php');
    include_once('../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  door2door\Modules\ModulePugins\GeneradorTocken\GeneradorTocken              as GeneradorTocken_create;
    use  door2door\Modules\ModuleMessageChat\Model\chat\chat                            as Services_create;
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
                    $Object = new Services_create();
                    $Direccion = '';
                /*</Instaciacion de objetos>*/ 
                  
                /*</Proceso>*/  

                    /*<VARIABLES>*/
                        $JSON_CONTACTOS             = [];
                        $JSON_CONTACTOS             = $_POST['Arreglo'];
                        $NOMBRE_GRUPO               = $_POST['Nombre'];
                        $ID_GRUPO                   = 0;

                        $RESPUESTA_CREAR_GRUPO      = [];
                        $RESPUESTA_INSERTAR_UNO     = [];
                        $RESPUESTA_INSERTAR_TODOS   = [];
                        $JSON_RESULT                = [];
                    /*</VARIABLES>*/

                   

                    

                    /*<RESPUESTA_CREAR_GRUPO>*/ 
                        $RESPUESTA_CREAR_GRUPO = $Object->RESPUESTA_CREAR_GRUPO($NOMBRE_GRUPO);

                        if($RESPUESTA_CREAR_GRUPO['message']       != 'Good'){
                            $JSON_RESULT['message']                = 'RESPUESTA_CREAR_GRUPO';
                            $JSON_RESULT['RESPUESTA_CREAR_GRUPO']  = [];
                            $JSON_RESULT['RESPUESTA_CREAR_GRUPO']  = $RESPUESTA_CREAR_GRUPO;
                            echo json_encode($JSON_RESULT);
                            return false;
                        }else{        
                            $ID_GRUPO                              = $RESPUESTA_CREAR_GRUPO['ID_GRUPO'];
                            $JSON_RESULT['RESPUESTA_CREAR_GRUPO']  = [];
                            $JSON_RESULT['RESPUESTA_CREAR_GRUPO']  = $RESPUESTA_CREAR_GRUPO;
                        }
                    /*</RESPUESTA_CREAR_GRUPO>*/ 


                    
                    $JSON_RESULT['JSON_CONTACTOS']      = $JSON_CONTACTOS;                   
                    $JSON_RESULT['message']             = 'Good';                   
                    /*<Recorremos el Arreglo de JSON>*/
                        for($i = 0; $i < count($JSON_CONTACTOS); $i++){

                            /*<Declaramos>*/                            
                                $POR_SELECCIONADO           = 0;
                                $POR_ID_USUARIO             = 0;
                            /*</Declaramos>*/

                            /*<Recorremos el JSON>*/ 
                                foreach ( $JSON_CONTACTOS[$i] as $clave => $valor ) {   
                                    /*<Tomamos la Informacion del JSON>*/      
                                        if(     $clave == 'SELECCIONADO'             || 
                                                $clave == 'idUsuario'             
                                        ){
                                                if($valor != '' || $valor != null){
                                                    if($clave == 'SELECCIONADO'          )     {$POR_SELECCIONADO            = $valor;      }
                                                    if($clave == 'idUsuario'             )     {$POR_ID_USUARIO              = $valor;      }   
                                                
                                                }  
                                        }      
                                    /*</Tomamos la Informacion del JSON>*/                              
                                }
                            /*</Recorremos el JSON>*/ 
                            
                            if($POR_SELECCIONADO != 0){
                                /*<RESPUESTA_INSERTAR_UNO>*/ 
                                    /*<RESPUESTA_INSERTAR_UNO>*/ 
                                        $RESPUESTA_INSERTAR_UNO = $Object->RESPUESTA_INSERTAR_UNO(
                                            $POR_SELECCIONADO,
                                            $POR_ID_USUARIO,
                                            $ID_GRUPO
                                        );
                                    /*</RESPUESTA_INSERTAR_UNO>*/ 

                                    if($RESPUESTA_INSERTAR_UNO['message'] != 'Good')
                                    {
                                        $JSON_RESULT['message']                   = 'RESPUESTA_INSERTAR_UNO';
                                        array_push($RESPUESTA_INSERTAR_TODOS,       $RESPUESTA_INSERTAR_UNO);
                                        $JSON_RESULT['RESPUESTA_INSERTAR_TODOS']  = [];
                                        $JSON_RESULT['RESPUESTA_INSERTAR_TODOS']  = $RESPUESTA_INSERTAR_TODOS;
                                        echo json_encode($JSON_RESULT);
                                        return false;
                                    }else{        
                                        array_push($RESPUESTA_INSERTAR_TODOS, $RESPUESTA_INSERTAR_UNO);
                                        $JSON_RESULT['RESPUESTA_INSERTAR_TODOS']  = [];
                                        $JSON_RESULT['RESPUESTA_INSERTAR_TODOS']  = $RESPUESTA_INSERTAR_TODOS;
                                    }
                                /*</RESPUESTA_INSERTAR_UNO>*/ 
                            }
                            
                        }
                    /*</Recorremos el Arreglo de JSON>*/

                    /*<RESPUESTA_INSERTAR_UNO>*/ 
                        session_start();
                        $POR_ID_USUARIO  = $_SESSION["idUser-door2door"];
                        /*<RESPUESTA_INSERTAR_UNO>*/ 
                            $RESPUESTA_INSERTAR_UNO = $Object->RESPUESTA_INSERTAR_UNO(
                                1,
                                $POR_ID_USUARIO,
                                $ID_GRUPO
                            );
                        /*<RESPUESTA_INSERTAR_UNO>*/ 
                        if($RESPUESTA_INSERTAR_UNO['message'] != 'Good')
                        {
                            $JSON_RESULT['message']                   = 'RESPUESTA_INSERTAR_UNO';
                            array_push($RESPUESTA_INSERTAR_TODOS,       $RESPUESTA_INSERTAR_UNO);
                            $JSON_RESULT['RESPUESTA_INSERTAR_TODOS']  = [];
                            $JSON_RESULT['RESPUESTA_INSERTAR_TODOS']  = $RESPUESTA_INSERTAR_TODOS;
                            echo json_encode($JSON_RESULT);
                            return false;
                        }else{        
                            array_push($RESPUESTA_INSERTAR_TODOS, $RESPUESTA_INSERTAR_UNO);
                            $JSON_RESULT['RESPUESTA_INSERTAR_TODOS']  = [];
                            $JSON_RESULT['RESPUESTA_INSERTAR_TODOS']  = $RESPUESTA_INSERTAR_TODOS;
                    }
                /*</RESPUESTA_INSERTAR_UNO>*/ 


                    $JSON_RESULT['RESPUESTA_INSERTAR_TODOS']  = [];
                    $JSON_RESULT['RESPUESTA_INSERTAR_TODOS']  = $RESPUESTA_INSERTAR_TODOS;

                    $JSON_RESULT['message']     = 'Good';                    
                
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