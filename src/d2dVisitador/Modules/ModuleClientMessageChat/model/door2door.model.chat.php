<?php

namespace    d2dVisitador\Modules\ModuleClientMessageChat\Model\chat;
    /*<Includes>*/
        include_once('../../ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    /*<use>*/
        use  d2dVisitador\Modules\ModulePugins\Conection\Conection as ConectionZona;
    /*<use>*/

    class chat extends ConectionZona{

        /*<Method construc>*/
            public function __construct(){
                // Cosntruct Father
                parent::__construct();
            }
        /*<Method construc>*/
    
        /*<Method SelectFull>*/
            public function selectFull( ){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';

                    session_start();
                    $idUser                     = $_SESSION["idUser-door2door"];
                  
                /*</Variables> */

             
                /*<Query> */
                    $querySelect ='SELECT 
                                            usu.nombres,
                                            usu.apellidos,
                                            usu.idUsuario,
                                            (
                                                IFNULL(
                                                        (
                                                            SELECT qm.mensaje 
                                                            FROM queuseMensaje qm 
                                                                                    WHERE
                                                                                        qm.idUsuarioEmisor 		= usu.idUsuario AND
                                                                                        qm.idUsuarioReceptor 	= '.$idUser .' 	AND
                                                                                        qm.bstate 				= 1 
                                                                                        ORDER BY  qm.idQMensaje, qm.fecha DESC limit 1
                                                ), "%#NO_TIENE_MENSAJE#%")
                                                                                    
                                            )AS mensajes,
                                            (
                                                IFNULL(
                                                        (
                                                            SELECT qm.fecha 
                                                            FROM queuseMensaje qm 
                                                                                    WHERE
                                                                                        qm.idUsuarioEmisor 		= usu.idUsuario AND
                                                                                        qm.idUsuarioReceptor 	= '.$idUser .' 	AND
                                                                                        qm.bstate 				= 1 
                                                                                        ORDER BY  qm.idQMensaje, qm.fecha DESC limit 1
                                                ), "%#NO_TIENE_MENSAJE#%")
                                                                                    
                                            )AS fecha
                                                                                FROM usuarios usu 
                                                                                    WHERE
                                                                                        usu.idUsuario 	!= '.$idUser .'		 AND
                                                                                        usu.bstate 		=  1  ';
                
                    $JSON_RESULT['querySelect']     = $querySelect;
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

        /*<Method selectFullUsuarios>*/
            public function selectFullUsuarios(){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';

                    session_start();
                    $Date                       = date('Y-m-d h:i:s');
                    $idUser                     = $_SESSION["idUser-door2door"];

                    $Where = '';
                    $Solicitud = '';
                /*</Variables> */

            

            
                /*<Query> */
                    $querySelect = '    SELECT 
                                            usu.idUsuario,
                                            usu.nombres,
                                            usu.apellidos,
                                            "USUARIO"       as estatus                                                   
                                        FROM   usuarios usu    
                                            WHERE   
                                                ( 
                                                        usu.tipoPerfil  = "SOCIO VISITADOR"  OR 
                                                        usu.tipoUsuario = "ADMINISTRATIVO" 
                                                ) AND
                                                usu.bstate  = 1 
                                    UNION
                                        SELECT
                                            gm.idGMensaje as idUsuario,
                                            gm.nombre     as nombres,
                                            ""            as apellidos,
                                            "GRUPO"       as estatus                                                    
                                        FROM gruposMensajes gm 
                                            WHERE   
                                                    gm.idCreador = '.$idUser.' OR
                                                    
                                                    (
                                                        SELECT count(gmu.idUsuario) 
                                                            FROM gruposMensajesUsuarios gmu
                                                        WHERE   gmu.idGMensaje  = gm.idGMensaje AND
                                                                gmu.idUsuario   = '.$idUser.'   AND
                                                                gmu.bstate      = 1
                                                    ) >= 1

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
                            $JSON_RESULT['querySelect']     = $querySelect;
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

            

                
                
                /*</Validamos Que tipo de usuario es>*/

            
                /*<Query> */
                    $querySelect = 'SELECT 
                                            qmrEnviados.idQMensaje,
                                            qmrEnviados.fecha,
                                            qmrEnviados.idUsuarioEmisor,
                                            qmrEnviados.idUsuarioReceptor,
                                            qmrEnviados.mensaje,
                                            (
                                                SELECT usu.nombres FROM usuarios usu WHERE usu.idUsuario = qmrEnviados.idUsuarioEmisor 
                                            )AS UsuarioEmisor,
                                            (
                                                SELECT usu.nombres FROM usuarios usu WHERE usu.idUsuario = qmrEnviados.idUsuarioReceptor 
                                            )AS UsuarioReceptor,
                                            (
                                                SELECT usu.imagen FROM usuarios usu WHERE usu.idUsuario = qmrEnviados.idUsuarioEmisor 
                                            )AS UsuarioEmisorImagen


                                        FROM queuseMensaje qmrEnviados
                                            WHERE qmrEnviados.idUsuarioEmisor = '.$idUsuario.' AND  qmrEnviados.idUsuarioReceptor = '.$idUser.' AND qmrEnviados.bstate = 1
                                    UNION 
                                        SELECT 
                                            qmResividos.idQMensaje,
                                            qmResividos.fecha,
                                            qmResividos.idUsuarioEmisor,
                                            qmResividos.idUsuarioReceptor,
                                            qmResividos.mensaje,
                                            (
                                                SELECT usu.nombres FROM usuarios usu WHERE usu.idUsuario = qmResividos.idUsuarioEmisor 
                                            )AS UsuarioEmisor,
                                            (
                                                SELECT usu.nombres FROM usuarios usu WHERE usu.idUsuario = qmResividos.idUsuarioReceptor 
                                            )AS UsuarioReceptor,
                                            (
                                                SELECT usu.imagen FROM usuarios usu WHERE usu.idUsuario = qmResividos.idUsuarioEmisor 
                                            )AS UsuarioEmisorImagen
                                            
                                        FROM queuseMensaje qmResividos
                                            WHERE qmResividos.idUsuarioEmisor = '.$idUser.'    AND  qmResividos.idUsuarioReceptor = '.$idUsuario .' AND qmResividos.bstate = 1
                                    GROUP BY fecha, idQMensaje ASC
                                    ORDER BY fecha, idQMensaje ASC
                                     ';
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
        /*<Method selectFullMensajes>*/
    
      
        
        /*<Method Create>*/
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
                    $JSON_RESULT['error'] = '';
                /*</Variables> */
                if($mensaje != ''){
                    /*<Query>*/
                        $queryInsert = 'INSERT INTO queuseMensaje ( 
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
                    $this->open();        
                        if ( mysqli_query( $this->Connection, $queryInsert)) {
                            $JSON_RESULT['message']     = "Good";                           
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

        
           
    }

    