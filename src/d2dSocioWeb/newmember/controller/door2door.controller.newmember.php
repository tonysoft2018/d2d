<?php
/*<Include classes>*/
    include_once('../model/door2door.model.user.php');
    include_once('../../Modules/ModulePugins/door2door.Pugins.GeneratorTocken.php');
    include_once('../../Modules/ModulePugins/door2door.Pugins.EmailEerver.php');
/*</Include classes>*/

/*<Import>*/   
    use  d2dSocioWeb\Modules\ModulePugins\GeneradorTocken\GeneradorTocken as GeneradorTocken_validation;
    use  door2door\NewMember\Model\NewMember\NewMember as NewMember;
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
                    $Object = new NewMember();
                /*</Instaciacion de objetos>*/ 
                    
                /*<RESPUESTAS>*/

                    $RESPUETA_NOMBRE_REPETIDO       = [];                    
                    $RESPUETA_VERIFICAR_CORREO      = [];

                    $RESPUETA_GENERAR_FOLIO_SOLICITUD      = [];

                    $RESPUETA_INSERTAR_USUARIO      = [];
                    $RESPUETA_CONSEGIR_ID_USUARIO   = [];
                    $RESPUETA_CREAR_PERFIL          = [];
                    $RESPUETA_CREAR_SOLICITUD       = [];

                    $RESPUETA_ELIMINAR_USUARIO_PEFIL     = [];
                    $RESPUETA_ELLIMINAR_PEFIL       = [];

                    $FOLIO                          = 0;
                    $ID_USUARIO                     = 0;                   

                /*<RESPUESTAS>*/

                /*<Variables>*/

                    $NOMBRE         = $_POST['create-nombre-door2door'];
                    $APELLIDO       = $_POST['create-apellidos-door2door'];                 
                    $CORREO         = $_POST['create-correo-door2door'];
                    $USUARIO        = $_POST['create-usuario-door2door'];
                    $CONTRASENA     = $_POST['create-contrasena-door2door'];
                    $TIPO_SOCIO     = $_POST['create-tipousuario-door2door'];

                    $JSON_RESULT                        = [];
                    $JSON_RESULT                        = []; 
                 
                /*</Variables>*/
                            

                /*<RESPUETA_NOMBRE_REPETIDO>*/
                    /*<RESPUETA_NOMBRE_REPETIDO>*/
                        $RESPUETA_NOMBRE_REPETIDO = $Object->RESPUETA_NOMBRE_REPETIDO(  
                                                                                        $USUARIO,
                                                                                        $CORREO 
                                                                                     );
                    /*</RESPUETA_NOMBRE_REPETIDO>*/
                    if($RESPUETA_NOMBRE_REPETIDO['message'] != 'Good'){
                        $JSON_RESULT['message']                             = 'RESPUETA_NOMBRE_REPETIDO';
                        $JSON_RESULT['RESPUETA_NOMBRE_REPETIDO'] = $RESPUETA_NOMBRE_REPETIDO;
                        echo json_encode($JSON_RESULT);                
                        return false;
                    }else{
                        if($RESPUETA_NOMBRE_REPETIDO['result'] == true){
                            $JSON_RESULT['message']                             = 'USER IN USE';
                            $JSON_RESULT['RESPUETA_NOMBRE_REPETIDO'] = $RESPUETA_NOMBRE_REPETIDO;
                            echo json_encode($JSON_RESULT);                
                            return false;
                        }else{
                            $JSON_RESULT['RESPUETA_NOMBRE_REPETIDO'] = $RESPUETA_NOMBRE_REPETIDO;
                        }
                    }
                /*</RESPUETA_NOMBRE_REPETIDO>*/ 

                
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
                        $JSON_RESULT['FOLIO'] = $RESPUETA_GENERAR_FOLIO_SOLICITUD;
                    }
                /*</RESPUETA_GENERAR_FOLIO_SOLICITUD>*/   
                 
                /*<RESPUETA_VERIFICAR_CORREO>*/
                /*</RESPUETA_VERIFICAR_CORREO>*/

                /*<RESPUETA_INSERTAR_USUARIO>*/
                    /*<RESPUETA_INSERTAR_USUARIO>*/
                        $RESPUETA_INSERTAR_USUARIO = $Object->RESPUETA_INSERTAR_USUARIO(    
                                                                                            $FOLIO,
                                                                                            $NOMBRE,
                                                                                            $APELLIDO, 
                                                                                            $CORREO,  
                                                                                            $USUARIO,
                                                                                            $CONTRASENA,
                                                                                            $TIPO_SOCIO
                                                                                        );
                    /*</RESPUETA_INSERTAR_USUARIO>*/
                    if($RESPUETA_INSERTAR_USUARIO['message'] != 'Good'){
                        $JSON_RESULT['message']                   = 'RESPUETA_INSERTAR_USUARIO';
                        $JSON_RESULT['RESPUETA_INSERTAR_USUARIO'] = $RESPUETA_INSERTAR_USUARIO;
                        echo json_encode($JSON_RESULT);                
                        return false; 
                    }else{
                        $JSON_RESULT['RESPUETA_INSERTAR_USUARIO'] = $RESPUETA_INSERTAR_USUARIO;
                    }
                /*</RESPUETA_INSERTAR_USUARIO>*/   

                /*<RESPUETA_CONSEGIR_ID_USUARIO>*/
                    /*<RESPUETA_CONSEGIR_ID_USUARIO>*/
                        $RESPUETA_CONSEGIR_ID_USUARIO = $Object->RESPUETA_CONSEGIR_ID_USUARIO(  $FOLIO  );
                    /*</RESPUETA_CONSEGIR_ID_USUARIO>*/
                    if($RESPUETA_CONSEGIR_ID_USUARIO <= 0){

                        $JSON_RESULT['message']                      = 'RESPUETA_CONSEGIR_ID_USUARIO';
                        $JSON_RESULT['RESPUETA_CONSEGIR_ID_USUARIO'] = $RESPUETA_CONSEGIR_ID_USUARIO;

                        echo json_encode($JSON_RESULT);                
                        return false; 
                    }else{
                        $ID_USUARIO                                  = $RESPUETA_CONSEGIR_ID_USUARIO;
                        $JSON_RESULT['RESPUETA_CONSEGIR_ID_USUARIO'] = $RESPUETA_CONSEGIR_ID_USUARIO;
                    }
                /*</RESPUETA_CONSEGIR_ID_USUARIO>*/  

                
                

                /*<RESPUETA_CREAR_SOLICITUD>*/

                    /*<RESPUETA_CREAR_PERFIL>*/
                        $RESPUETA_CREAR_SOLICITUD = $Object->RESPUETA_CREAR_SOLICITUD(   
                                                                                        $ID_USUARIO,
                                                                                        $FOLIO,
                                                                                        $TIPO_SOCIO   
                                                                                    );
                    /*</RESPUETA_CREAR_SOLICITUD>*/
                    if($RESPUETA_CREAR_SOLICITUD['message'] != 'Good'){

                        $RESPUETA_ELIMINAR_USUARIO_PEFIL = $Object->RESPUETA_ELIMINAR_USUARIO_PEFIL(   
                                                                                                        $ID_USUARIO,
                                                                                                        $FOLIO,
                                                                                                    );
                        $JSON_RESULT['message']                             = 'RESPUETA_CREAR_PERFIL';   

                        $JSON_RESULT['RESPUETA_CREAR_SOLICITUD']               = [];           
                        $JSON_RESULT['RESPUETA_CREAR_SOLICITUD']               = $RESPUETA_CREAR_SOLICITUD;

                        $JSON_RESULT['RESPUETA_ELIMINAR_USUARIO_PEFIL']    = [];
                        $JSON_RESULT['RESPUETA_ELIMINAR_USUARIO_PEFIL']    = $RESPUETA_ELIMINAR_USUARIO_PEFIL;
                    
                        echo json_encode($JSON_RESULT);     

                        return false; 
                    }else{
                        $JSON_RESULT['RESPUETA_CREAR_SOLICITUD'] = $RESPUETA_CREAR_SOLICITUD;
                    }
                /*</RESPUETA_CREAR_SOLICITUD>*/  
               
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
