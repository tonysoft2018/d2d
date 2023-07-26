<?php

namespace  door2door\Modules\ModuleUsersUsers\Model\Usuarios;
    /*<Includes>*/
        include_once('../../ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    /*<use>*/
        use  door2door\Modules\ModulePugins\Conection\Conection as ConectionUsuarios;
    /*<use>*/

    class Usuarios extends ConectionUsuarios{

        /*<Method construc>*/
            public function __construct(){
                // Cosntruct Father
                parent::__construct();
            }
        /*<Method construc>*/
    
        /*<Method SelectFull>*/
            public function selectFull(){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                /*<Query> */
                    $querySelect = '    SELECT * FROM   usuarios 
                                        WHERE  bstate  = 1 AND tipoUsuario = "ADMINISTRATIVO"; ';
                /*</Query> */
                
                $this->open();            
                    if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                        if ($resultQuery->num_rows > 0) {
                            /*<Captura>*/
                                while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                    array_push($JSON_RESULT['information'], $Rol);
                                }
                            /*</Captura>*/
                        }else{
                            $JSON_RESULT['information']     = [];
                        }
                        /*<Respuesta>*/
                            $JSON_RESULT['message'] = "Good";   
                        /*</Respuesta>*/
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";
                            $JSON_RESULT['querySelect']     = $querySelect;
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this->closet();
                return $JSON_RESULT;
            }
        /*<Method SelectFull>*/
    
        /*<Method Delete>*/
            public function delete($id){       
                /*<Variables> */
                    /*</datos>*/
                        session_start();
                        $DATE                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];
                    /*<datos>*/
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error'] = '';
                /*</Variables> */
                /*<Query>*/
                    $queryDeleteUpdate = '  UPDATE  usuarios 
                                            SET     bstate              = 0,
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion      = " [ DELETE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                            WHERE idUsuario = '.$id.';';
                /*</Query>*/
                
                $this->open();
                    if (mysqli_query($this->Connection, $queryDeleteUpdate)) {
                        /*<Respuesta>*/
                            $this->tracking($idUser,'usuarios','door2door','UPDATE bstate','');
                            $JSON_RESULT['message'] = "Good";   
                           
                        /*</Respuesta>*/
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";
                            $JSON_RESULT['queryDeleteUpdate']     = $queryDeleteUpdate;
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this->closet(); 
                return $JSON_RESULT;
            }
        /*</Method Delete>*/
        
        /*<Method Create>*/
            public function create( 
                                    $usuario,                                    
                                    $password,
                                    $email,
                                    $name,
                                    $apellido,
                                    $rol,
                                    $tipoUsuario
                                ){
                    /*<Variables> */

                    /*</datos>*/
                        session_start();
                        $DATE                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];
                        $newPassword = password_hash($password, PASSWORD_DEFAULT);
                    /*<datos>*/
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error'] = '';
                /*</Variables> */
                if($name != ''){
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
                                                    0,
                                                    "'.$usuario.'", 
                                                    "'.$name.'", 
                                                    "'.$apellido.'", 
                                                    "'.$newPassword.'", 
                                                    "'.$email.'", 
                                                    "'.$tipoUsuario.'", 
                                                    "'.$rol.'",
                                                    "",
                                                    "/door2door/Modules/ModulesImage/usuario.png",
                                                    0,
                                                    "NINGUNO",
                                                    "'.$DATE.'",
                                                    "'.$DATE.'",
                                                    " [ INSERT '.$DATE.' ], [ idUser '.$idUser.' ] ",
                                                    1
                                                );';
                    /*</Query>*/
                    $this->open();        
                        if ( mysqli_query( $this->Connection, $queryInsert)) {
                            $JSON_RESULT['message']     = "Good";
                            $this->tracking($idUser,'usuarios','door2door','INSERT','');
                        } else {
                            $JSON_RESULT['message']     = "Bad";
                            $JSON_RESULT['queryInsert'] = $queryInsert;
                            $JSON_RESULT['error']       = "Error: <br>" . mysqli_error($this->Connection);
                        }        
                    $this->closet();
                    return $JSON_RESULT;               
                }else{
                    $JSON_RESULT['message']  = 'fail variable';            
                }
                return $JSON_RESULT;
            }
        /*</Method Create>*/

        /*<Method Update>*/
            public function Update(
                                        $id,
                                        $name,
                                        $apellido,
                                        $email,
                                        $tipoUsuario

                                    ){
                $JSON_RESULT = [];

                if($name != '' && $id > 0){
                    /*<Variables> */
                            /*</datos>*/
                            session_start();
                            $Date                       = date('Y-m-d h:i:s');
                            $idUser                     = $_SESSION["idUser-door2door"];
                        /*<datos>*/
                        $JSON_RESULT['message']         = '';
                        $JSON_RESULT['error']           = '';
                        $JSON_RESULT['tracking']        = [];
                        $JSON_RESULT_TRACKING           = [];
                    /*</Variables> */
                    /*</Query>*/
                        $QueryUpdate =    'UPDATE  usuarios
                                      SET    nombre              = "'.$name.'",
                                             apellido            = "'.$apellido.'",   
                                             email               = "'.$email.'",
                                             tipoUsuario         = "'.$tipoUsuario.'",                                               
                                             fechaModificacion   = "'.$Date.'",
                                             observacion         = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                        WHERE idUsuario              = '.$id.';';
                    /*</Query>*/
                    $JSON_RESULT_TRACKING = $this->tracking($idUser,'usuarios','door2door','UPDATE','idUsuario');
                    if($JSON_RESULT_TRACKING['message'] == 'Good'){
                        $this->open();
                            if (mysqli_query($this->Connection, $QueryUpdate)) {
                                /*<Respuesta>*/
                                    $JSON_RESULT['message']             = "Good";   
                                    
                                /*</Respuesta>*/
                            } else {
                                /*<Respuesta>*/
                                    $JSON_RESULT['message']             = "Bad";
                                    $JSON_RESULT['QueryDeleteUpdate']   = $QueryUpdate;
                                    $JSON_RESULT['Error']               = "Error: <br>" . mysqli_error($this->Connection);
                                /*</Respuesta>*/
                            }        
                        $this->closet(); 
                    }else{
                        $JSON_RESULT['message']  = 'bad';
                        $JSON_RESULT['tracking'] = $JSON_RESULT_TRACKING; 
                    }
                }else{
                    $JSON_RESULT['message']  = 'fail variable';  
                    $JSON_RESULT['name']     = $name;
                    $JSON_RESULT['id']       = $id;
                }
                return $JSON_RESULT;
            }
        /*</Method Update>*/ 
        
        /*<Method updatePassword>*/
            public function updatePassword(
                                        $id,
                                        $password

                                    ){
                $JSON_RESULT = [];

                if($password != '' && $id > 0){
                    /*<Variables> */
                            /*</datos>*/
                            session_start();
                            $Date                       = date('Y-m-d h:i:s');
                            $idUser                     = $_SESSION["idUser-door2door"];
                        /*<datos>*/
                        $JSON_RESULT['message']         = '';
                        $JSON_RESULT['error']           = '';
                        $JSON_RESULT['tracking']        = [];
                        $JSON_RESULT_TRACKING           = [];
                    /*</Variables> */
                    $newPassword = password_hash($password, PASSWORD_DEFAULT);
                    /*</Query>*/
                        $QueryUpdate =    'UPDATE  usuarios
                                      SET    password            = "'.$newPassword.'",                                               
                                             fechaModificacion   = "'.$Date.'",
                                             observacion         = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                        WHERE idUsuario          = '.$id.';';
                    /*</Query>*/
                   // $JSON_RESULT_TRACKING = $this->tracking($idUser,'usuarios','door2door','UPDATE','idUsuario');
                    if(true){//$JSON_RESULT_TRACKING['message'] == 'Good'){
                        $this->open();
                            if (mysqli_query($this->Connection, $QueryUpdate)) {
                                /*<Respuesta>*/
                                    $JSON_RESULT['message']             = "Good";   
                                    
                                /*</Respuesta>*/
                            } else {
                                /*<Respuesta>*/
                                    $JSON_RESULT['message']             = "Bad";
                                    $JSON_RESULT['QueryDeleteUpdate']   = $QueryUpdate;
                                    $JSON_RESULT['Error']               = "Error: <br>" . mysqli_error($this->Connection);
                                /*</Respuesta>*/
                            }        
                        $this->closet(); 
                    }else{
                        $JSON_RESULT['message']  = 'bad';
                        $JSON_RESULT['tracking'] = $JSON_RESULT_TRACKING; 
                    }
                }else{
                    $JSON_RESULT['message']  = 'fail variable';  
                    $JSON_RESULT['name']     = $name;
                    $JSON_RESULT['id']       = $id;
                }
                return $JSON_RESULT;
            }
        /*</Method updatePassword>*/ 

        

        /*<Method SelectFull Sesiones>*/
            public function selectFullSessions($idUser){
               
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                if($idUser > 0){
                    /*<Query> */
                        $querySelect = '    SELECT 
                                                ses.ip,
                                                ses.fechaEntrada,
                                                ses.fechaSalida,
                                                (
                                                    SELECT 
                                                                us.nombre 
                                                    FROM usuarios us
                                                        WHERE 
                                                            us.idUsuario = ses.idUsuarios
                                                )as nombre
                                             FROM sesiones ses 
                                                WHERE 
                                                    ses.idUsuarios = '.$idUser.' AND 
                                                    ses.bstate = 1; ';
                    /*</Query> */
                    
                    $this::open();            
                        if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                            $JSON_RESULT['message'] = "Good";   
                            if ($resultQuery->num_rows > 0) {
                                /*<Captura>*/
                                    while ($Ses = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                        array_push($JSON_RESULT['information'], $Ses);
                                    }
                                    return $JSON_RESULT;
                                /*</Captura>*/
                            }else{
                                $JSON_RESULT['information']     = [];
                                return $JSON_RESULT;
                            }
                            /*<Respuesta>*/                               
                                return $JSON_RESULT;
                            /*</Respuesta>*/
                        } else {
                            /*<Respuesta>*/
                                $JSON_RESULT['message']         = "Bad";
                                $JSON_RESULT['querySelect']     = $querySelect;
                                $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                                return $JSON_RESULT;
                            /*</Respuesta>*/
                        }        
                    $this::closet();
                }else{
                    $JSON_RESULT['message']         = "no variables";
                    return $JSON_RESULT;
                }
                return $JSON_RESULT;
            }
        /*<Method SelectFull Sesiones>*/

        /*<Method SelectFull Tracking>*/
            public function selectFullTracking($idUser){
                
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                if($idUser > 0){
                    /*<Query> */
                        $querySelect = '    SELECT * FROM seguimientos WHERE idUsuario = '.$idUser.' AND bstate = 1; ';
                    /*</Query> */
                    
                    $this::open();            
                        if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                            if ($resultQuery->num_rows > 0) {
                                /*<Captura>*/
                                    while ($Ses = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                        array_push($JSON_RESULT['information'], $Ses);
                                    }
                                /*</Captura>*/
                            }else{
                                $JSON_RESULT['information']     = [];
                            }
                            /*<Respuesta>*/
                                $JSON_RESULT['message'] = "Good";   
                            /*</Respuesta>*/
                        } else {
                            /*<Respuesta>*/
                                $JSON_RESULT['message']         = "Bad";
                                $JSON_RESULT['querySelect']     = $querySelect;
                                $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                            /*</Respuesta>*/
                        }        
                    $this::closet();
                }else{
                    $JSON_RESULT['message']         = "no variables";
                }
                return $JSON_RESULT;
            }
        /*<Method SelectFull Tracking>*/
        
        /*<Roles>*/
            /*<Method SelectFull Roles>*/
                public function selectFullRoles($idUser){                        
                    /*<Variables> */
                        $JSON_RESULT                    = [];
                        $JSON_RESULT['information']     = [];
                        $JSON_RESULT['message']         = '';
                        $JSON_RESULT['error']           = '';
                    /*</Variables> */
                    if($idUser > 0){
                        /*<Query> */
                            $querySelect = 'SELECT  
                                                    rol.nombre as Rol,
                                                    rol.idRol,
                                                    IFNULL
                                                    (
                                                        (
                                                        SELECT uxr.idUxR 
                                                        FROM   usuarioxrol uxr
                                                            WHERE   
                                                                    uxr.idUsuario 	= '.$idUser.' 	AND 
                                                                    rol.idRol 		= uxr.idRol  	AND 
                                                                    uxr.bstate = 1
                                                        ), 0
                                                    )as Existe   
                                                    FROM 
                                                        roles  rol   
                                                    WHERE 
                                                        rol.bstate = 1;';
                        /*</Query> */
                        
                        $this::open();            
                            if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                                if ($resultQuery->num_rows > 0) {
                                    /*<Captura>*/
                                        while ($Ses = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                            array_push($JSON_RESULT['information'], $Ses);
                                        }
                                    /*</Captura>*/
                                }else{
                                    $JSON_RESULT['information']     = [];
                                }
                                /*<Respuesta>*/
                                    $JSON_RESULT['message'] = "Good";   
                                /*</Respuesta>*/
                            } else {
                                /*<Respuesta>*/
                                    $JSON_RESULT['message']         = "Bad";
                                    $JSON_RESULT['querySelect']     = $querySelect;
                                    $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                                /*</Respuesta>*/
                            }        
                        $this::closet();
                    }else{
                        $JSON_RESULT['message']         = "no variables";
                    }
                    return $JSON_RESULT;
                }
            /*<Method SelectFull Roles>*/

            /*<Method delete Roles>*/
                public function deleteRoles($idUser){
                    /*<Variables> */
                        /*</datos>*/
                            session_start();
                            $DATE                       = date('Y-m-d h:i:s');
                            $idUser                     = $_SESSION["idUser-door2door"];
                        /*<datos>*/
                        $JSON_RESULT                    = [];
                        $JSON_RESULT['information']     = [];
                        $JSON_RESULT['message']         = '';
                        $JSON_RESULT['error'] = '';
                    /*</Variables> */
                    /*<Query>*/
                        $queryDelete= '  DELETE FROM usuarioxrol
                                                WHERE idUsuario = '.$idUser.';';
                    /*</Query>*/
                    
                    $this->open();
                        if (mysqli_query($this->Connection, $queryDelete)) {
                            /*<Respuesta>*/
                                $JSON_RESULT['message'] = "Good";                          
                            /*</Respuesta>*/
                        } else {
                            /*<Respuesta>*/
                                $JSON_RESULT['message']         = "Bad";
                                $JSON_RESULT['queryDelete']     = $queryDelete;
                                $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                            /*</Respuesta>*/
                        }        
                    $this->closet(); 
                    return $JSON_RESULT;
                }
            /*</Method delete Roles>*/

            /*<Method createNewRoles Roles>*/
                public function createNewRoles($idUserR, $idRol ){
                    /*<Variables> */
                        /*</datos>*/
                            session_start();
                            $DATE                       = date('Y-m-d h:i:s');
                            $idUser                     = $_SESSION["idUser-door2door"];
                        /*<datos>*/
                        $JSON_RESULT                    = [];
                        $JSON_RESULT['information']     = [];
                        $JSON_RESULT['message']         = '';
                        $JSON_RESULT['error'] = '';
                    /*</Variables> */
                    /*<Query>*/
                        $queryCreate = 'INSERT INTO usuarioxrol ( 
                                                idUsuario, 
                                                idRol,  
                                            
                                                fechaCreacion, 
                                                fechaModificacion,
                                                observacion,
                                                bstate
                                                ) VALUES( 
                                                    "'.$idUserR.'", 
                                                    "'.$idRol.'",  
                                                                                                       
                                                    "'.$DATE.'",
                                                    "'.$DATE.'",
                                                    " [ INSERT '.$DATE.' ], [ idUser '.$idUser.' ] ",
                                                    1
                                                );';
                    /*</Query>*/
                    
                    $this->open();
                        if (mysqli_query($this->Connection, $queryCreate)) {
                            /*<Respuesta>*/
                                $JSON_RESULT['message'] = "Good";                          
                            /*</Respuesta>*/
                        } else {
                            /*<Respuesta>*/
                                $JSON_RESULT['message']         = "Bad";
                                $JSON_RESULT['queryCreate']     = $queryCreate;
                                $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                            /*</Respuesta>*/
                        }        
                    $this->closet(); 
                    return $JSON_RESULT;
                }
            /*</Method createNewRoles Roles>*/
        /*</Roles>*/


        
        
    }

    