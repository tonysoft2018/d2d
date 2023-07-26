<?php
/*<Include classes>*/
    include_once('../model/door2door.model.usuarioas.php');
    include_once('../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  door2door\Modules\ModulePugins\GeneradorTocken\GeneradorTocken   as GeneradorTocken_create;
    use  door2door\Modules\ModuleUsersUsers\model\Usuarios\Usuarios       as Usuarios_create;
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
                        
       

        /*<Variables>*/     
            $JSON_ROLES             = [];
            $ID_USER                = 0;

            $JSON_RESULT_END            = [];
            $JSON_RESULT_DELETE         = [];
            $JSON_RESULT_CREATE_ONE     = [];
            $JSON_RESULT_CREATE_FULL    = [];

            $JSON_ROLES     = $_POST['Arrays'];
            $ID_USER        = $_POST['idUser'];


            $JSON_RESULT_END['JSON_ROLES'] =  $JSON_ROLES;
        /*<Variables>*/     

        /*<Controlador>*/      
            try{
                /*<Instaciacion de objetos>*/                
                    $Object = new Usuarios_create();
                /*</Instaciacion de objetos>*/ 
                  
                /*</Proceso>*/ 
                    
                    /*<JSON_RESULT_DELETE>*/    
                        /*<JSON_RESULT_DELETE>*/ 
                        $JSON_RESULT_DELETE = $Object->deleteRoles( $ID_USER );
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
                        for($i = 0; $i < count($JSON_ROLES); $i++){

                            /*<Declaramos las Variables que vamos a usar >*/
                                $ROL_NAME            = "";
                                $ROL_EXISTS          = 0; 
                                $ROL_ID              = 0; 
                            /*</Declaramos las Variables que vamos a usar >*/

                            /*<Recorremos el JSON>*/ 
                                foreach ( $JSON_ROLES[$i] as $clave => $valor ) {   
                                    /*<Tomamos la Informacion del JSON>*/      
                                        if(    $clave == 'Existe'          || 
                                               $clave == 'idRol'             
                                        ){
                                                if($valor != '' || $valor != null){
                                                    if($clave == 'Existe'       )     {$ROL_EXISTS  = $valor;      }   
                                                    if($clave == 'idRol'        )     {$ROL_ID      = $valor;      }   
                                                    
                                                }  
                                        }                    
                                }   
                            /*<Recorremos el JSON>*/ 
                            if($ROL_EXISTS != 0){
                                /*<JSON_RESULT_CREATE_ONE>*/    
                                    /*<JSON_RESULT_CREATE_ONE>*/ 
                                        $JSON_RESULT_CREATE_ONE = $Object->createNewRoles( $ID_USER, $ROL_ID  );
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
                        }  
                    /*<JSON_ROLES>*/  
                    
                    $JSON_RESULT_END['JSON_RESULT_CREATE_FULL']  = [];        
                    $JSON_RESULT_END['JSON_RESULT_CREATE_FULL']  = $JSON_RESULT_CREATE_FULL;  
                    $JSON_RESULT_END['message']                  = 'Good';  

                    echo json_encode($JSON_RESULT_END);
                   
                /*</Proceso>*/ 

              

            } catch(Exepction $e){
                $JSON_RESULT_END            = [];
                $JSON_RESULT_END['message'] = 'Sorry errt server'; 
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