<?php
namespace  d2dSocio\NewMember\Model\NewMember;
    /*<Includes>*/
        include_once('../../Modules/ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    
    /*<use>*/
        use  d2dSocio\Modules\ModulePugins\Conection\Conection as ConectionNewMember;
    /*<use>*/

    class NewMember extends ConectionNewMember{

        /*<Method construc>*/
            public function __construct(){
                // Cosntruct Father
                parent::__construct();
            }
        /*<Method construc>*/

        /*<Method RESPUETA_NOMBRE_REPETIDO>*/
            public function RESPUETA_NOMBRE_REPETIDO( $usuario, $email ){
                $JSON_RESULT                    = [];
                $JSON_RESULT['information']     = [];
                $JSON_RESULT['message']         = '';
                $JSON_RESULT['error'] = '';
                
                $querySelect = 'SELECT * FROM usuarios' ;

                $this::open();            
                    if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                        if ($resultQuery->num_rows > 0) {
                            $JSON_RESULT['message'] = "Good"; 
                            /*<Captura>*/
                                while ($User = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                    if($usuario == $User['usuario']){                                       
                                        $JSON_RESULT['result']          = true;
                                        return $JSON_RESULT;    
                                    }else  if($email == $User['email']){
                                        $JSON_RESULT['result']          = true;
                                        return $JSON_RESULT;    
                                    }  
                                }                              
                            /*</Captura>*/
                            $JSON_RESULT['result']          = false;
                            return $JSON_RESULT;    
                        }else{
                            $JSON_RESULT['message']         = "Good";
                            $JSON_RESULT['result']          = false;
                            return $JSON_RESULT;       
                        }
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";
                            $JSON_RESULT['querySelect']     = $querySelect;
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                            $this::closet();
                            return $JSON_RESULT;
                        /*</Respuesta>*/
                    }        
                $this::closet();
                $JSON_RESULT['message']         = "Bad";
                return $JSON_RESULT;       
            }
        /*</Method RESPUETA_NOMBRE_REPETIDO>*/

        /*<Method RESPUETA_INSERTAR_USUARIO>*/
            public function RESPUETA_INSERTAR_USUARIO(
                                                        $folio,
                                                        $nombre,
                                                        $apellidos, 
                                                        $email,
                                                        $usuario,                                                         
                                                        $contrasena, 
                                                        $tipoUsuario 
                                                    ){

                /*<Variables> */                              
                    /*</datos>*/          
                        $JSON_RESULT    = [];          
                        $DATE                       = date('Y-m-d h:i:s');                 
                        $newPassword = password_hash($contrasena, PASSWORD_DEFAULT);
                    /*<datos>*/
                    $JSON_RESULT['contrasena'] =$contrasena;
                    /*<Query>*/
                    $queryInsert = 'INSERT INTO usuarios ( 
                        folioSolicitud,
                        usuario, 
                        nombres,  
                        apellidos,  
                        password,                                                  
                        email,   
                        tipoUsuario,   
                        rol,
                        tipoPerfil,
                        imagen,
                        idCuestionario,
                        estatus,
                        fechaCreacion, 
                        fechaModificacion,
                        observacion,
                        bstate
                        ) VALUES( 
                            "'.$folio.'",
                            "'.$usuario.'", 
                            "'.$nombre.'", 
                            "'.$apellidos.'", 
                            "'.$newPassword.'", 
                            "'.$email.'", 
                            "SOCIO", 
                            "SOCIO",
                            "SOCIO CLIENTE", 
                            "/d2dSocio/Modules/ModulesImage/usuario.png",
                            0,
                            "PENDIENTE",
                            "'.$DATE.'",
                            "'.$DATE.'",
                            " [ INSERT '.$DATE.' ], [ idUser '.$idUser.' ] ",
                            1
                        );';
                    /*</Query>*/
                /*</Variables> */           
            
                $this->open();        
                    if ( mysqli_query( $this->Connection, $queryInsert)) {
                        $JSON_RESULT['message']     = "Good";
                        $JSON_RESULT['queryInsert'] = $queryInsert;
                    } else {
                        $JSON_RESULT['message']     = "Bad";
                        $JSON_RESULT['queryInsert'] = $queryInsert;
                        $JSON_RESULT['error']       = "Error: <br>" . mysqli_error($this->Connection);
                    }       
                $this->closet();
                
                return $JSON_RESULT;             
            }
        /*</Method RESPUETA_INSERTAR_USUARIO>*/

        /*<RESPUETA_GENERAR_FOLIO_SOLICITUD>*/

            /*<RESPUETA_GENERAR_FOLIO_SOLICITUD>*/
                public function RESPUETA_GENERAR_FOLIO_SOLICITUD(){
                    $Folio = 0;
            
                    // Capturas el folio
                    $Query = 'SELECT COUNT(idSolicitud) AS Folio FROM solicitud;';
                
            
                    $this->open();       
                        /*Consultar informacion*/
                        if ($result = mysqli_query($this->Connection, $Query)) {
                            while($r = $result->fetch_array(MYSQLI_ASSOC)){
                                $Folio = $r['Folio'];
                            }
                        } else { $this->closet(); return 0; }                   
                    $this->closet();      
                    $FolioNuevo = 0;  
                    do{
                        $Folio = $Folio +1;  
                        $FolioNuevo = $this->ValidarFolio($Folio);            
                    } while ($FolioNuevo == 0); 
                    return $Folio;     
                } 
            /*</RESPUETA_GENERAR_FOLIO_SOLICITUD>*/

            /*<ValidarFolio>*/
                public function ValidarFolio($Folio){
                    $Query = 'SELECT COUNT(idSolicitud) AS Coteo FROM solicitud WHERE folio = '.$Folio;
                    $this->open();       
                    /*Consultar informacion*/
                    if ($result = mysqli_query($this->Connection, $Query)) {
                        while($r = $result->fetch_array(MYSQLI_ASSOC)){
                            $RespuestaCoteo = $r['Coteo'];
                        }
                        if($RespuestaCoteo == 0){
                            $this->closet(); 
                            return $Folio;
                        }else{
                            $this->closet(); 
                            return 0;
                        }
                    }  else { $this->closet(); return 0; }  
                    $this->closet();   
                    return 0;
                }
            /*</ValidarFolio>*/
        /*</RESPUETA_GENERAR_FOLIO_SOLICITUD>*/

        /*<RESPUETA_CONSEGIR_ID_USUARIO>*/
            public function RESPUETA_CONSEGIR_ID_USUARIO($folioSolicitud){
                // Capturas el folio
                $Query = 'SELECT idUsuario FROM usuarios WHERE folioSolicitud = '.$folioSolicitud;       
                $Id = 0;
                $this->open();       
                    /*Consultar informacion*/
                    if ($result = mysqli_query($this->Connection, $Query)) {
                        while($r = $result->fetch_array(MYSQLI_ASSOC)){
                            $Id = $r['idUsuario'];
                        }
                    } else { $this->closet(); return 0; }                   
                $this->closet();   
                return $Id;     
            }    
        /*<RESPUETA_CONSEGIR_ID_USUARIO>*/

        /*<RESPUETA_ELIMINAR_USUARIO_PEFIL>*/
            public function RESPUETA_ELIMINAR_USUARIO_PEFIL(  $ID_USUARIO,  $FOLIO ){
                $Query = 'DELETE FROM usuarios WHERE idUsuario = '.$ID_USUARIO.' AND folioSolicitud = '.$FOLIO.';';

                $this->open();
                    if (mysqli_query($this->Connection, $Query)) {
                        $Data['message'] = "Good";
                    } else {
                        $Data['message'] = "Bad";
                        $Data['Error'] = "Error: <br>" . mysqli_error($this->Connection);
                    }        
                $this->closet(); 
            }   
        /*<RESPUETA_ELIMINAR_USUARIO_PEFIL>*/

     
        
        /*<RESPUETA_CREAR_SOLICITUD>*/
            public function RESPUETA_CREAR_SOLICITUD(    
                                                    $ID_USUARIO,
                                                    $FOLIO
                                                       
                                                            ){
                /*<Variables> */                              
                    /*</datos>*/          
                        $JSON_RESULT    = [];          
                        $DATE                       = date('Y-m-d h:i:s');             
                    /*<datos>*/

                    /*<Query>*/
                        $queryInsert = 'INSERT INTO solicitud ( 
                            folio, 
                            fecha,  
                            idUsuario,                                                  
                            estatus,   
                            idAprobacion,
                            idRechazo,
                            comentario,                        

                            fechaCreacion, 
                            fechaModificacion,
                            observacion,
                            bstate
                            ) VALUES( 

                                "'.$FOLIO.'", 
                                "'.$DATE.'", 
                                "'.$ID_USUARIO.'", 
                                "PENDIENTE",
                                0,
                                0,
                                "SIN COMENTARIOS",  

                                "'.$DATE.'",
                                "'.$DATE.'",
                                " [ INSERT '.$DATE.' ], [ NUEVO SOLICITUD  ] ",
                                1
                            );';
                    /*</Query>*/
                /*</Variables> */           
                $JSON_RESULT['queryInsert'] = $queryInsert;

                $this->open();        
                    if ( mysqli_query( $this->Connection, $queryInsert)) {
                        $JSON_RESULT['message']     = "Good";
                    } else {
                        $JSON_RESULT['message']     = "Bad";                       
                        $JSON_RESULT['error']       = "Error: <br>" . mysqli_error($this->Connection);
                    }       
                $this->closet();          
                
                
                $querySelect = 'SELECT 
                                        usu.idUsuario, 
                                        usu.usuario, 
                                        usu.nombres, 
                                        usu.apellidos, 
                                        usu.email, 
                                        usu.tipoUsuario, 
                                        usu.imagen, 
                                        usu.rol, 
                                        usu.tipoPerfil
                                FROM usuarios usu 
                                    WHERE usu.idUsuario = '.$ID_USUARIO ;

                
                $JSON_RESULT['querySelect']     = $querySelect;  

                $this::open();            
                    if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                        if ($resultQuery->num_rows > 0) {                           
                            /*<Captura>*/
                                while ($User = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                    $JSON_RESULT['information'] = $User;  
                                    
                                    session_start();

                                    /*<Crear Sessiones>*/
                                        $_SESSION["idUser-door2door"]       = $User["idUsuario"];
                                        $_SESSION["user-door2door"]         = $User["usuario"];
                                        $_SESSION["name-door2door"]         = $User["nombres"];
                                        $_SESSION["lastname-door2door"]     = $User["apellidos"];
                                        $_SESSION["email-door2door"]        = $User["email"];
                                        $_SESSION["typeUser-door2door"]     = $User["tipoUsuario"];
                                        $_SESSION["imagen-door2door"]       = $User["imagen"];                                  
                                        $_SESSION["rolUser-door2door"]      = $User["rol"];
                                        $_SESSION["typePerfil-door2door"]   = $User["tipoPerfil"];
                                    /*<Crear Sessiones>*/

                                    /*<Crear session>*/
                                        $ip         =  isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']; 
                                        $session    = 'Ip:'.$ip.'&usuario:'.$User["usuario"].'&tipoUsuario:'.$User["tipoUsuario"];
                                        $DATE       = date('Y-m-d h:i:s');
                                        $QuerySession = 'INSERT INTO sesiones ( 
                                                                idUsuario, 
                                                                sesion,                     
                                                                ip, 
                                                                fechaEntrada,
                                                                fechaCreacion,
                                                                fechaModificacion,
                                                                observacion,
                                                                bstate
                                                                ) VALUES( 
                                                                    "'.$User["idUsuario"].'",
                                                                    "'.$session.'",
                                                                    "'.$ip.'",
                                                                    "'.$DATE.'",
                                                                    "'.$DATE.'",
                                                                    "'.$DATE.'",
                                                                    " [ INSERT '.$DATE.' ], [ login ] ",
                                                                    1
                                                                );';
                                        $JSON_RESULT['QuerySession']     = $QuerySession;                                            
                                        $this::open(); 
                                            if (mysqli_query($this->Connection, $QuerySession)) {
                                                $JSON_RESULT['message'] = "Good";                                                 
                                            }else{
                                                /*<Respuesta>*/
                                                    $JSON_RESULT['message']         = "Bad crear session";                                                    
                                                    $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                                                    $this::closet();
                                                    return $JSON_RESULT;
                                                /*</Respuesta>*/
                                            }        
                                        $this::closet();
                                        // Creacion de sessiones                                        
                                        $_SESSION["session-door2door"]   = $session;
                                    /*</Crear session>*/
                                }                              
                            /*</Captura>*/
                            $JSON_RESULT['result']          = false;
                            return $JSON_RESULT;    
                        }else{
                            $JSON_RESULT['message']         = "Good";
                            $JSON_RESULT['result']          = false;

                            return $JSON_RESULT;       
                        }
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad usuarios bsuqeuda ".$ID_USUARIO ;                           
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                            $this::closet();
                            return $JSON_RESULT;
                        /*</Respuesta>*/
                    }        
                $this::closet();           
                return $JSON_RESULT;       
               
            }    
        /*<RESPUETA_CREAR_SOLICITUD>*/
        
    }