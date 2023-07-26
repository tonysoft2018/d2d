<?php

namespace    d2dVisitador\Modules\ModuleMessageChat\Model\chat;
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

                /*<Validamos si el usuario esta activo o incativo>*/
                    switch($estatus){

                        case 'ACTIVO':  {       $Where .= ' AND usu.estatus     = "ACTIVO" ';   break;}
                        case 'INACTIVO':{       $Where .= ' AND usu.estatus     = "INACTIVO" '; break;}   

                        case 'PENDIENTE':  {    $Where .= ' AND sol.estatus     = "PENDIENTE" ';  $Solicitud = ' , solicitud sol ';  break;}
                        case 'CONFIRMADA': {    $Where .= ' AND sol.estatus     = "CONFIRMADA" '; $Solicitud = ' , solicitud sol ';  break;}
                        case 'CONTRATO':   {    $Where .= ' AND sol.estatus     = "CONTRATO" ';   $Solicitud = ' , solicitud sol ';  break;}
                        case 'INCOMPLETA': {    $Where .= ' AND sol.estatus     = "INCOMPLETA" '; $Solicitud = ' , solicitud sol ';  break;}
                        case 'RECHAZADA':  {    $Where .= ' AND sol.estatus     = "RECHAZADA" ';  $Solicitud = ' , solicitud sol ';  break;}   
                    }
                /*</Validamos si el usuario esta activo o incativo>*/

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
                                                                    SELECT sms.fecha FROM queuseMensaje sms WHERE sms.idUsuarioEmisor = usu.idUsuario ORDER BY fecha DESC LIMIT 1
                                                                ),
                                                            "No tiene mensajes"
                                                    )AS FechaUltimoMensaje,
                                                    "USUARIO"       as estatus  
                                                
                                                FROM usuarios usu   '.$Solicitud.'   
                                                WHERE  usu.bstate  = 1 AND usu.idUsuario != '.$idUser .'  '. $Where.'
                                        UNION 
                                            SELECT
                                                    gm.idGMensaje as idUsuario,
                                                    gm.nombre     as nombres,
                                                    ""            as apellidos,
                                                    ""            as tipoPerfil,
                                                    ""            as tipoUsuario,
                                                    IFNULL(
                                                                (
                                                                    SELECT sms.fecha 
                                                                            FROM queuseMensaje sms 
                                                                        WHERE 
                                                                                sms.idUsuarioReceptor = gm.idGMensaje 
                                                                            ORDER BY fecha DESC LIMIT 1
                                                                ),
                                                            "No tiene mensajes"
                                                    )AS FechaUltimoMensaje,
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
                                                    ) >= 1  ';
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
                                            usu.tipoPerfil,
                                            usu.tipoUsuario,
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
                                            ""            as tipoPerfil,
                                            ""            as tipoUsuario,
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
            public function selectFullMensajes( $idUsuario, $estatus ){

                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    $JSON_RESULT['estatus']         = $estatus;

                    $Where = '';
                    $Solicitud = '';
                    session_start();
                    $Date                       = date('Y-m-d h:i:s');
                    $idUser                     = $_SESSION["idUser-door2door"];
                /*</Variables> */

            
                /*<Query> */
                    if($estatus  == 'USUARIO')
                    {
                        $querySelect = 'SELECT 
                                            qmrEnviados.idQMensaje,
                                            qmrEnviados.idGMensaje,
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
                                            WHERE 
                                                qmrEnviados.idUsuarioEmisor     = '.$idUsuario.'    AND  
                                                qmrEnviados.idUsuarioReceptor   = '.$idUser.'       AND 
                                                qmrEnviados.bstate              = 1
                                    UNION 
                                        SELECT 
                                            qmResividos.idQMensaje,
                                            qmResividos.idGMensaje,
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
                                            WHERE 
                                                qmResividos.idUsuarioEmisor     = '.$idUser.'        AND  
                                                qmResividos.idUsuarioReceptor   = '.$idUsuario .'    AND 
                                                qmResividos.mensaje             != "%%%__USUARIO__%%%" AND
                                                qmResividos.bstate              = 1
                                    GROUP BY  idQMensaje ASC
                                    ORDER BY  idQMensaje ASC
                                     ';
                    }
                        else
                    {
                        $idGMensaje  = $idUsuario;
                        $querySelect = 'SELECT 
                                            qmrEnviados.idQMensaje,
                                            qmrEnviados.idGMensaje,
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
                                            WHERE 
                                                qmrEnviados.idGMensaje          = '.$idGMensaje.'    AND  
                                                qmrEnviados.idUsuarioEmisor     = '.$idUser.'        AND  
                                                qmrEnviados.bstate              = 1
                                    UNION 
                                        SELECT 
                                            qmResividos.idQMensaje,
                                            qmResividos.idGMensaje,
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
                                            WHERE 
                                                qmResividos.idGMensaje           = '.$idGMensaje .'   AND 
                                                qmResividos.idUsuarioReceptor    = '.$idGMensaje .'   AND 
                                                qmResividos.bstate               = 1                  AND
                                                qmResividos.mensaje              != "%%%__GRUPO__%%%"
                                    GROUP BY  idQMensaje ASC
                                    ORDER BY  idQMensaje ASC
                                     ';
                    }
                /*</Query> */
                
                $this->open();            
                    if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                        if ($resultQuery->num_rows > 0) 
                        {
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
    
    
        
        /*<Method createMensaje>*/
            public function createMensaje( 
                                    $idUsuario,
                                    $mensaje,
                                    $estatus
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
                    $JSON_RESULT['estatus']         = $estatus;
                /*</Variables> */
                if($mensaje != ''){
                    if($estatus == 'USUARIO')
                    {
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
                    }
                        else
                    {
                        /*<Query>*/
                            $queryInsert = 'INSERT INTO queuseMensaje ( 
                                                    idGMensaje,
                                                    idUsuarioEmisor, 
                                                    idUsuarioReceptor,  
                                                    fecha,
                                                    mensaje,

                                                    fechaCreacion, 
                                                    fechaModificacion,
                                                    observacion,
                                                    bstate
                                                    ) VALUES( 
                                                        '.$idUsuario.',  
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
                    }
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



        /*<Methodo RESPUESTA_CREAR_GRUPO>*/
            public function RESPUESTA_CREAR_GRUPO($NOMBRE_GRUPO){

                /*<INSERTAR>*/
                    /*<Variables> */
                        /*</datos>*/
                            session_start();
                            $DATE                       = date('Y-m-d h:i:s');
                            $idUser                     = $_SESSION["idUser-door2door"];
                        
                        /*<datos>*/
                        $JSON_RESULT                    = [];
                        $JSON_RESULT['ID_GRUPO']        = 0;
                        $JSON_RESULT['message']         = '';
                        $JSON_RESULT['error'] = '';
                    /*</Variables> */
            
                    /*<Query>*/
                        $queryInsert = 'INSERT INTO gruposMensajes ( 
                                                idCreador, 
                                                nombre,

                                                fechaCreacion, 
                                                fechaModificacion,
                                                observacion,
                                                bstate
                                                ) VALUES ( 
                                                     '.$idUser.', 
                                                    "'.$NOMBRE_GRUPO.'",                                        

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
                /*</INSERTAR>*/

                /*<CONSULTAR>*/
                    /*<CONSULTAR>*/
                        $querySelect = '    SELECT idGMensaje FROM gruposMensajes ORDER BY idGMensaje DESC LIMIT 1 ' ;
                    /*</CONSULTAR>*/
                    $JSON_RESULT['querySelect'] = $querySelect;

                    $this->open();            
                        if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                            if ($resultQuery->num_rows > 0) {
                                /*<Captura>*/
                                    while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                        $JSON_RESULT['ID_GRUPO'] = $Rol['idGMensaje'];
                                    }
                                /*</Captura>*/
                            }else{
                                $JSON_RESULT['information']     = [];                                
                            }
                            /*<Respuesta>*/
                                $JSON_RESULT['querySelect']     = $querySelect;
                                $JSON_RESULT['message']         = "Good";   
                            /*</Respuesta>*/
                        } else {
                            /*<Respuesta>*/
                                $JSON_RESULT['message']         = "Bad";
                                $JSON_RESULT['querySelect']     = $querySelect;
                                $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                            /*</Respuesta>*/
                        }        
                    $this->closet();

                   
                    
                
                /*</CONSULTAR>*/

                return $JSON_RESULT;
                
            }
        /*</Method RESPUESTA_CREAR_GRUPO>*/ 

        /*<Method  RESPUESTA_INSERTAR_UNO>*/
            public function RESPUESTA_INSERTAR_UNO(
                        $POR_SELECCIONADO,
                        $POR_ID_USUARIO,
                        $ID_GRUPO
                    ){
                    /*<INSERTAR>*/
                        /*<Variables> */
                            /*</datos>*/
                            session_start();
                            $DATE                       = date('Y-m-d h:i:s');
                            $idUser                     = $_SESSION["idUser-door2door"];
                        
                        /*<datos>*/
                        $JSON_RESULT                    = [];
                        $JSON_RESULT['ID_GRUPO']        = 0;
                        $JSON_RESULT['message']         = '';
                        $JSON_RESULT['error']           = '';
                    /*</Variables> */
            
                    /*<Query>*/
                        $queryInsert = 'INSERT INTO gruposMensajesUsuarios ( 
                                                idGMensaje, 
                                                idUsuario,

                                                fechaCreacion, 
                                                fechaModificacion,
                                                observacion,
                                                bstate
                                                ) VALUES ( 
                                                    '.$ID_GRUPO.', 
                                                    '.$POR_ID_USUARIO.',                                        

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
                /*</INSERTAR>*/
                return $JSON_RESULT;
            } 
        /*</Method RESPUESTA_INSERTAR_UNO>*/ 
    }

    