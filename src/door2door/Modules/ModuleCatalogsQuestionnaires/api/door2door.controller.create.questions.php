<?php
/*<Include classes>*/
    include_once('../model/door2door.model.cuestionarios.php');
    include_once('../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  door2door\Modules\ModulePugins\GeneradorTocken\GeneradorTocken                            as GeneradorTocken_create;
    use  door2door\Modules\ModuleCatalogsQuestionnaires\Model\Questionnaires\Questionnaires       as Services_create;
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

        $JSON_RESULT            = [];
        
        /*<Controlador>*/      
            try{
                /*<Instaciacion de objetos>*/                
                    $Object = new Services_create();
                    $Direccion = '';
                /*</Instaciacion de objetos>*/ 
                  
                /*</Proceso>*/  
                    $JSON_PREGUNTAS         = $_POST['Arrays'];                
                    $ID_CUETIONARIO         = $_POST['idCuesntionario'];


                    $JSON_RESULT_END            = [];
                    $JSON_RESULT_DELETE         = [];
                    $JSON_RESULT_CREATE_ONE     = [];
                    $JSON_RESULT_CREATE_FULL    = [];



                    /*<JSON_RESULT_DELETE>*/    
                        /*<JSON_RESULT_DELETE>*/ 
                        $JSON_RESULT_DELETE = $Object->DeleteQuestions( $ID_CUETIONARIO );
                        /*</JSON_RESULT_DELETE>*/ 
                        if($JSON_RESULT_DELETE['message'] == 'Good' ){
                            $JSON_RESULT_END['JSON_RESULT_DELETE']  = [];  
                            $JSON_RESULT_END['JSON_RESULT_DELETE']  = $JSON_RESULT_DELETE;
                        }else{
                            $JSON_RESULT_END['mensaje']               = 'JSON_RESULT_DELETE';
                            $JSON_RESULT_END['JSON_RESULT_DELETE']  = [];        
                            $JSON_RESULT_END['JSON_RESULT_DELETE']  = $JSON_RESULT_DELETE;                                    
                            echo json_encode($JSON_RESULT_END);
                            return false;
                        }
                    /*</JSON_RESULT_DELETE>*/ 

                /*<JSON_ROLES>*/
                    for($i = 0; $i < count($JSON_PREGUNTAS); $i++){

                        /*<Declaramos las Variables que vamos a usar >*/
                            $PREGUNTA               = "";
                            $TIPO_DE_PREGUNTA      = "";
                        /*</Declaramos las Variables que vamos a usar >*/

                        /*<Recorremos el JSON>*/ 
                            foreach ( $JSON_PREGUNTAS[$i] as $clave => $valor ) {   
                                /*<Tomamos la Informacion del JSON>*/      
                                    if(    $clave == 'pregunta' || $clave == 'tipoPregunta'   ){
                                            if($valor != '' || $valor != null){
                                                if($clave == 'pregunta'           )     {$PREGUNTA          = $valor;      }   
                                                if($clave == 'tipoPregunta'       )     {$TIPO_DE_PREGUNTA  = $valor;      }   
                                                
                                            }  
                                    }      
                                /*<Tomamos la Informacion del JSON>*/                    
                            }   
                        /*<Recorremos el JSON>*/ 

                        /*<JSON_RESULT_CREATE_ONE>*/    
                            /*<JSON_RESULT_CREATE_ONE>*/ 
                            $JSON_RESULT_CREATE_ONE = $Object->createQuestions( $ID_CUETIONARIO, $PREGUNTA, $TIPO_DE_PREGUNTA  );
                            /*</JSON_RESULT_CREATE_ONE>*/ 
                            if($JSON_RESULT_CREATE_ONE['message'] == 'Good' ){
                                array_push($JSON_RESULT_CREATE_FULL, $JSON_RESULT_CREATE_ONE);                                        
                            }else{
                                array_push($JSON_RESULT_CREATE_FULL, $JSON_RESULT_CREATE_ONE);
                                $JSON_RESULT_END['mensaje']                 = 'JSON_RESULT_CREATE_FULL';
                                $JSON_RESULT_END['JSON_RESULT_CREATE_FULL']  = [];        
                                $JSON_RESULT_END['JSON_RESULT_CREATE_FULL']  = $JSON_RESULT_CREATE_FULL;                                    
                                echo json_encode($JSON_RESULT_END);
                                return false;
                            }
                        /*</JSON_RESULT_DELETE>*/  
                    }  
                /*<JSON_ROLES>*/  
                
                $JSON_RESULT_END['JSON_RESULT_CREATE_FULL']  = [];        
                $JSON_RESULT_END['JSON_RESULT_CREATE_FULL']  = $JSON_RESULT_CREATE_FULL;  

                
                $JSON_RESULT_END['JSON_PREGUNTAS']           = $JSON_PREGUNTAS; 
                $JSON_RESULT_END['message']                  = 'Good';  


    
                /*</Proceso>*/ 

                /*<Respuesta>*/  
                    echo json_encode($JSON_RESULT_END);
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