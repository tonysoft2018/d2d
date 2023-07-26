<?php

namespace    door2door\Modules\ModuleNotifications\Model\notificaciones;
    /*<Includes>*/
        include_once('../../ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    /*<use>*/
        use  door2door\Modules\ModulePugins\Conection\Conection as ConectionZona;
    /*<use>*/

    class notificaciones extends ConectionZona{

        /*<Method construc>*/
            public function __construct(){
                // Cosntruct Father
                parent::__construct();
            }
        /*<Method construc>*/
    
        /*<Method SelectFull>*/
            public function selectFull( $filtros, $estatus){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';

                    $Where = '';
                    $Solicitud = '';
                /*</Variables> */

               

                /*<Validamos Que tipo de usuario es>*/
                    switch($filtros){
                        case 'usuarios':            {   $Where .= ' AND usu.tipoUsuario = "ADMINISTRATIVO" ';   break;}
                        case 'socios-visitanmtes':  {   $Where .= ' AND usu.tipoPerfil  = "SOCIO VISITADOR" ';  break;}
                        case 'socios-clientes':     {   $Where .= ' AND usu.tipoPerfil  = "SOCIO CLIENTE"   ';  break;}
                    }
                /*</Validamos Que tipo de usuario es>*/

               
                session_start();
                $Date                       = date('Y-m-d h:i:s');
                $idUser                     = $_SESSION["idUser-door2door"];

             
                /*<Query> */
                    $querySelect = '    SELECT 
                                             usu.idUsuario,
                                             usu.nombres,
                                             usu.apellidos,
                                             usu.tipoPerfil,
                                             usu.tipoUsuario,
                                             IFNULL(
                                                        (
                                                            SELECT noti.fecha 
                                                                FROM queuseNotificaciones noti 
                                                            WHERE 
                                                                    noti.idUsuarioEmisor = usu.idUsuario 
                                                            ORDER BY fecha 
                                                            DESC LIMIT 1
                                                        ),
                                                    "No tiene mensajes"
                                             )AS FechaUltimoMensaje
                                             
                                        FROM usuarios usu   
                                        WHERE   usu.bstate  = 1 
                                            AND usu.idUsuario != '.$idUser .'  '. $Where;
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
                            $JSON_RESULT['querySelect']     = $querySelect;
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

        /*<Method selectFullUsuarios>*/
            public function selectFullUsuarios(){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';

                

           

            
                /*<Query> */
                    $querySelect = '    SELECT 
                                            usu.idUsuario,
                                            usu.nombres,
                                            usu.apellidos
                                            
                                        FROM   usuarios usu    
                                        WHERE  usu.bstate  = 1  '. $Where;
                /*</Query> */
                $JSON_RESULT['querySelect']     = $querySelect;
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
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this->closet();
                return $JSON_RESULT;
            }
        /*<Method selectFullUsuarios>*/

        /*<Method selectFullMensajes>*/
            public function selectFullMensajes( $idUsuario ){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';

                    $Where = '';
                    $Solicitud = '';
                    session_start();
                    $Date                       = date('Y-m-d h:i:s');
                    $idUser                     = $_SESSION["idUser-door2door"];
                /*</Variables> */            
                /*<Query> */
                    $querySelect = 'SELECT 
                                            noti.fecha,
                                            noti.idUsuario,
                                            noti.mensaje,
                                            (
                                                SELECT usu.nombres FROM usuarios usu WHERE usu.idUsuario = noti.idUsuario 
                                            )AS Usuario,
                                           
                                            (
                                                SELECT usu.imagen FROM usuarios usu WHERE usu.idUsuario = noti.idUsuario 
                                            )AS UsuarioImagen


                                        FROM queuseNotificaciones noti
                                            WHERE noti.idUsuario = '.$idUsuario.'  AND  noti.bstate = 1                                  
                                     ';
                                        /*</Query> */
                $JSON_RESULT['querySelect']     = $querySelect;
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
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this->closet();
                return $JSON_RESULT;
            }
        /*<Method selectFullMensajes>*/
    
  
    
        /*<Method createMensaje>*/
            public function createMensaje( 
                                    $idUsuario,
                                    $mensaje
                                ){
                /*<Variables> */
                    /*</datos>*/
                        session_start();
                        $DATE                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];                       
                    /*<datos>*/
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                 
                if($mensaje != ''){
                    /*<Query>*/
                        $queryInsert = 'INSERT INTO queuseNotificaciones ( 
                                                idUsuarioEmisor, 
                                                idUsuarioReceptor,  
                                                fecha,
                                                mensaje,

                                                fechaCreacion, 
                                                fechaModificacion,
                                                observacion,
                                                bstate
                                                ) VALUES( 
                                                    '.$idUser.', 
                                                    '.$idUsuario.',  
                                                    "'.$DATE.'",
                                                    "'.$mensaje.'",                                         

                                                    "'.$DATE.'",
                                                    "'.$DATE.'",
                                                    " [ INSERT '.$DATE.' ], [ idUser '.$idUser.' ] ",
                                                    1
                                                );';
                    /*</Query>*/
                    $JSON_RESULT['queryInsert'] = $queryInsert;
                    $this->open();        
                        if ( mysqli_query( $this->Connection, $queryInsert)) {
                            $JSON_RESULT['message']     = "Good";                           
                        } else {
                            $JSON_RESULT['message']     = "Bad";                            
                            $JSON_RESULT['error']       = "Error: <br>" . mysqli_error($this->Connection);
                        }        
                    $this->closet();
                    return $JSON_RESULT;               
                }else{
                    $JSON_RESULT['message']  = 'fail variable';            
                }
                return $JSON_RESULT;
            }
        /*</Method createMensaje>*/

      
        
           
    }

    