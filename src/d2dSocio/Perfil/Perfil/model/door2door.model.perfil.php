<?php

namespace d2dSocio\Perfil\Perfil\Model\Perfil;
    /*<Includes>*/
        include_once('../../../Modules/ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/

    /*<use>*/
        use d2dSocio\Modules\ModulePugins\Conection\Conection as ConectionPerfil;
    /*<use>*/

    class Perfil  extends ConectionPerfil{

        /*<Method construc>*/
            public function __construct(){
                // Cosntruct Father
                parent::__construct();
            }
        /*<Method construc>*/
    
        /*<Method SelectFull>*/
            public function selectFull($idUsuario){
                /*<Variables> */
                    $JSON_RESULT                                = [];
                    $JSON_RESULT['information_USUARIO']         = [];
                    $JSON_RESULT['information_IMAGENES']        = [];
                    $JSON_RESULT['information_CUESNTIONARIOS']  = [];
                    $JSON_RESULT['information_CONTRATO']        = [];
                    $JSON_RESULT['message']                     = '';
                    $JSON_RESULT['error']                       = '';
                    
                /*</Variables> */

                /*<information_USUARIO> */
                    /*<Query> */
                        $querySelect = '    SELECT 
                                                        sol.comentario, 
                                                        sol.estatus,
                                                        usu.nombres, 
                                                        usu.apellidos, 
                                                        usu.nombres, 
                                                        usu.email, 
                                                        usu.tipoUsuario, 
                                                        usu.rol, 
                                                        usu.tipoPerfil,
                                                        usu.imagen,
                                                        usu.domicilio,
                                                        usu.celular,
                                                        usu.calle,
                                                        usu.colonia,
                                                        usu.rfc,
                                                        usu.noInterior,
                                                        usu.noExterior,
                                                        usu.idPaises,
                                                        usu.idEstados,
                                                        usu.idEstados,
                                                        usu.idMunicipio,
                                                        usu.ciudad,
                                                        usu.idCuestionario,
                                                        usu.idTVehiculo,
                                                        usu.codigoPostal,
                                                        usu.numeroCuenta

                                                        
                                                FROM usuarios usu, solicitud sol
                                                    WHERE 
                                                            usu.idUsuario   = sol.idUsuario     AND                              
                                                            usu.idUsuario   = '.$idUsuario.'     
                                                        
                                                            LIMIT 1; ';
                    /*</Query> */
                    
                    $this::open();            
                        if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                            if ($resultQuery->num_rows > 0) {
                                /*<Captura>*/
                                    while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                        array_push($JSON_RESULT['information_USUARIO'], $Rol);
                                    }
                                /*</Captura>*/
                            }else{
                                $JSON_RESULT['information_USUARIO']     = [];
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
                /*<information_USUARIO> */


                /*<information_IMAGENES> */
                    /*<Query> */
                        $querySelectImagenes = '  SELECT 
                                                            axs.archivo,
                                                            axs.tipoArchivo
                                                        FROM archivosxsolicitud axs
                                                                        WHERE 
                                                                            axs.idSolicitud = 
                                                                                                ( 
                                                                                                    SELECT sol.idSolicitud 
                                                                                                        FROM solicitud sol 
                                                                                                            WHERE 
                                                                                                            sol.idUsuario = '.$idUsuario.'
                                                                                                ) AND 
                                                                            axs.bstate = 1 ';
                        $JSON_RESULT['querySelectImagenes']     = $querySelectImagenes;
                    /*</Query> */
                    
                    $this::open();            
                        if ($resultQuery = mysqli_query($this->Connection, $querySelectImagenes)) {
                            if ($resultQuery->num_rows > 0) {
                                /*<Captura>*/
                                    while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                        array_push($JSON_RESULT['information_IMAGENES'], $Rol);
                                    }
                                /*</Captura>*/
                            }else{
                                $JSON_RESULT['information_IMAGENES']     = [];
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
                    $this::closet();
                /*<information_IMAGENES> */


                /*<information_CUESNTIONARIOS> */
                    /*<Query> */
                        $querySelectCuesntionario = 'SELECT 
                                                            cue.nombre,
                                                            cue.tipoCuestionario,
                                                            cue.idCuestionario
                                                            FROM 	cuestionarios  cue
                                                                    WHERE  cue.idCuestionario  = (
                                                                                                IFNULL(
                                                                                                            (
                                                                                                                SELECT aj.idCuestionariosCliente  FROM ajusteCuestionario aj
                                                                                                                ORDER BY  aj.idACuestionarios DESC LIMIT 1
                                                                                                            ),0                                                
                                                                                                        )
                                                                                                )';
                    /*</Query>*/
                    //$JSON_RESULT['querySelectCuesntionario']     = $querySelectCuesntionario;
                    
                    $this::open();            
                        if ($resultQuery = mysqli_query($this->Connection, $querySelectCuesntionario)) 
                        {
                            if ($resultQuery->num_rows > 0) 
                            {                             
                                    while ($R = $resultQuery->fetch_array(MYSQLI_ASSOC)) 
                                    {

                                        $R['PREGUNTAS']     = [];

                                        /*<CONSLTAR PREGUNTA>*/
                                            $queryPreguntas = ' SELECT 
                                                                        pxc.idPxC,
                                                                        pxc.idCuestionario,
                                                                        pxc.pregunta,
                                                                        pxc.tipoPregunta
                                                                    FROM    preguntasxcuesntionario pxc 
                                                                    WHERE   pxc.idCuestionario = '.$R['idCuestionario'].' ';

                                            //$JSON_RESULT['queryPreguntas']     = $queryPreguntas;  

                                            if($resultQueryPreguntas = mysqli_query($this->Connection, $queryPreguntas) ) 
                                            {
                                                if($resultQueryPreguntas->num_rows > 0) 
                                                {                             
                                                    while ($P = $resultQueryPreguntas->fetch_array(MYSQLI_ASSOC)) 
                                                    {
                                                        
                                                        /*<CONSLTAR RESPUESTA>*/
                                                            $queryRespuesta = ' SELECT * 
                                                                                    FROM usuario_respuesta ur 
                                                                                    WHERE   
                                                                                            ur.idPregunta = '.$P['idPxC'].' AND
                                                                                            ur.idUsuario  = '.$idUsuario.'
                                                                                    ';  

                                                            //$JSON_RESULT['queryRespuesta']     = $queryRespuesta;   

                                                            if($resultQueryRespuesta = mysqli_query($this->Connection, $queryRespuesta) )
                                                             {
                                                                if($resultQueryRespuesta->num_rows > 0) 
                                                                {                             
                                                                    while ($Res = $resultQueryRespuesta->fetch_array(MYSQLI_ASSOC))
                                                                    {
                                                                        $P['respuesta']             = $Res['respuesta'];
                                                                        $P['idUsuario_Respuesta']   = $Res['idUsuario_Respuesta'];
                                                                    }
                                                                }else{
                                                                    $P['respuesta']             = "";
                                                                    $P['idUsuario_Respuesta']   = 0;
                                                                }
                                                            }
                                                        /*</CONSLTAR RESPUESTA>*/

                                                        /*<INSERTAR RESPUESTA>*/
                                                            array_push( $R['PREGUNTAS'], $P );
                                                        /*</INSERTAR RESPUESTA>*/
                                                    }
                                                }else{
                                                    $R['PREGUNTAS'] = [];
                                                }
                                            } else {                           
                                                $R['PREGUNTAS']      =   "Bad". "Error: <br>" . mysqli_error($this->Connection).' ---> '.$queryPreguntas;                            
                                            }
                                        /*</CONSLTAR PREGUNTA>*/

                                        /*<INSERTAR INFORMACION PREGUNTA>*/
                                            array_push($JSON_RESULT['information_CUESNTIONARIOS'], $R);
                                        /*</INSERTAR INFORMACION PREGUNTA>*/
                                    }                               
                            }else{
                                $JSON_RESULT['information_CUESNTIONARIOS']     = [];
                            }
                            $JSON_RESULT['message']             = "Good";                             
                        } else {
                           
                                $JSON_RESULT['message']         = "Bad";                               
                                $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                            
                        }        
                    $this::closet();
                /*<information_CUESNTIONARIOS> */


                /*<information_CONTRATO>*/
                    /*<Query> */
                        $querySelectContrato = ' SELECT * FROM contrato   WHERE  tipoContrato = "SOCIO VISITADOR"  ';
                    /*</Query> */

                    $JSON_RESULT['querySelectContrato']     = $querySelectContrato;

                    $this::open();            
                        if ($resultQuery = mysqli_query($this->Connection, $querySelectContrato)) {
                            if ($resultQuery->num_rows > 0) {
                                /*<Captura>*/
                                    while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                        array_push($JSON_RESULT['information_CONTRATO'], $Rol);
                                    }
                                /*</Captura>*/
                            }else{
                                $JSON_RESULT['information_CONTRATO']     = [];
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
                    $this::closet();

                /*<information_CONTRATO>*/

                return $JSON_RESULT;
            }
        /*<Method SelectFull>*/   
        
        
        /*<Method Create>*/
            public function create(     $razonSocial,
                                        $rfc,
                                        $domicilio,
                                        $noExterior,
                                        $noInterior,
                                        $colonia,
                                        $ciudad,
                                        $estado,
                                        $pais,
                                        $codigoPostal,
                                        $telefono,
                                        $celular,
                                        $email,
                                        $imagen
                                        
                                ){
                /*<Variables> */
                    /*</datos>*/
                        session_start();
                        $DATE                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-cagg"];
                    /*<datos>*/
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error'] = '';
                /*</Variables> */

                /*<Query>*/
                    if($imagen != ''){
                        $queryInsert = 'INSERT INTO empresa ( 
                            razonSocial, 
                            rfc,  
                            domicilio,          
                            noExterior, 
                            noInterior,
                            colonia,
                            ciudad,
                            estado,
                            pais,
                            codigoPostal,
                            telefono,
                            celular,
                            email,
                            imagen,
                            terminosCondiciones,

                            fechaCreacion, 
                            fechaModificacion,
                            observacion,
                            bstate
                            ) VALUES( 
                                "'.$razonSocial.'", 
                                "'.$rfc.'",  
                                "'.$domicilio.'", 
                                "'.$noExterior.'", 
                                "'.$noInterior.'", 
                                "'.$colonia.'", 
                                "'.$ciudad.'", 
                                "'.$estado.'", 
                                "'.$pais.'", 
                                "'.$codigoPostal.'", 
                                "'.$telefono.'", 
                                "'.$celular.'", 
                                "'.$email.'", 
                                "'.$imagen.'", 
                                "", 
                                "'.$DATE.'",
                                "'.$DATE.'",
                                " [ INSERT '.$DATE.' ], [ idUser '.$idUser.' ] ",
                                1
                            );';
                    }else{
                        $queryInsert = 'INSERT INTO empresa ( 
                            razonSocial, 
                            rfc,  
                            domicilio,          
                            noExterior, 
                            noInterior,
                            colonia,
                            ciudad,
                            estado,
                            pais,
                            codigoPostal,
                            telefono,
                            celular,
                            email,
                            imagen,
                            terminosCondiciones,

                            fechaCreacion, 
                            fechaModificacion,
                            observacion,
                            bstate
                            ) VALUES( 
                                "'.$razonSocial.'", 
                                "'.$rfc.'", 
                                "'.$domicilio.'", 
                                "'.$noExterior.'", 
                                "'.$noInterior.'", 
                                "'.$colonia.'", 
                                "'.$ciudad.'", 
                                "'.$estado.'", 
                                "'.$pais.'", 
                                "'.$codigoPostal.'", 
                                "'.$telefono.'", 
                                "'.$celular.'", 
                                "'.$email.'", 
                                "", 
                                "", 
                                "'.$DATE.'",
                                "'.$DATE.'",
                                " [ INSERT '.$DATE.' ], [ idUser '.$idUser.' ] ",
                                1
                            );';
                    }                   
                /*</Query>*/
                $this::open();        
                    if ( mysqli_query( $this->Connection, $queryInsert)) {
                        $JSON_RESULT['message-1']     = "Good";  
                        $JSON_RESULT['queryInsert'] = $queryInsert;                         
                    } else {
                        $JSON_RESULT['message-1']     = "Bad";
                        $JSON_RESULT['queryInsert'] = $queryInsert;
                        $JSON_RESULT['error']       = "Error: <br>" . mysqli_error($this->Connection);
                    }        
                $this::closet();
                    /*<Query> */
                    $querySelect = '     SELECT * FROM   empresa 
                                            WHERE           bstate  = 1 ORDER BY 	idEmpresa	 DESC LIMIT 1;  ';
                /*</Query> */

                $this::open();            
                if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                    /*<Captura>*/
                        while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                            $JSON_RESULT['idEmpresa']  = $Rol['idEmpresa'];
                            return $JSON_RESULT;
                        }
                    /*</Captura>*/
                } else {
                    /*<Respuesta>*/
                        $JSON_RESULT['message']         = "Bad";
                        $JSON_RESULT['querySelect']     = $querySelect;
                        $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                    /*</Respuesta>*/
                }        
                $this::closet();
                return $JSON_RESULT; 
            }
        /*</Method Create>*/

        /*<Method Update>*/
            public function update(
                                        $id, 
                                        $razonSocial,
                                        $rfc,
                                        $domicilio,
                                        $noExterior,
                                        $noInterior,
                                        $colonia,
                                        $ciudad,
                                        $estado,
                                        $pais,
                                        $codigoPostal,
                                        $telefono,
                                        $celular,
                                        $email,
                                        $imagen
                                    ){
                $JSON_RESULT = [];

                 /*<Variables> */
                            /*</datos>*/
                            session_start();
                            $Date                       = date('Y-m-d h:i:s');
                            $idUser                     = $_SESSION["idUser-cagg"];
                        /*<datos>*/
                        $JSON_RESULT['message']         = '';
                        $JSON_RESULT['error'] = '';
                    /*</Variables> */
                    /*</Query>*/
                        if($imagen != ''){
                                $QueryUpdate =    'UPDATE  empresa
                                                        SET     razonSocial            = "'.$razonSocial.'",
                                                                rfc                    = "'.$rfc.'",
                                                                domicilio              = "'.$domicilio.'",   
                                                                noExterior             = "'.$noExterior.'",   
                                                                noInterior             = "'.$noInterior.'",                                                          
                                                                colonia                = "'.$colonia.'", 
                                                                ciudad                 = "'.$ciudad.'", 
                                                                estado                 = "'.$estado.'", 
                                                                pais                   = "'.$pais.'", 
                                                                codigoPostal           = "'.$codigoPostal.'", 
                                                                telefono               = "'.$telefono.'", 
                                                                celular                = "'.$celular.'", 
                                                                email                  = "'.$email.'", 
                                                                imagen                 = "'.$imagen.'", 
                                                                fechaModificacion      = "'.$Date.'",
                                                                observacion            = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                                    WHERE idEmpresa        = '.$id.';';
                        }else{
                            $QueryUpdate =    'UPDATE  empresa
                                                    SET     razonSocial            = "'.$razonSocial.'",
                                                            rfc                    = "'.$rfc.'",
                                                            domicilio              = "'.$domicilio.'",   
                                                            noExterior             = "'.$noExterior.'",   
                                                            noInterior             = "'.$noInterior.'",                                                          
                                                            colonia                = "'.$colonia.'", 
                                                            ciudad                 = "'.$ciudad.'", 
                                                            estado                 = "'.$estado.'", 
                                                            pais                   = "'.$pais.'", 
                                                            codigoPostal           = "'.$codigoPostal.'", 
                                                            telefono               = "'.$telefono.'", 
                                                            celular                = "'.$celular.'", 
                                                            email                  = "'.$email.'", 
                                                            fechaModificacion      = "'.$Date.'",
                                                            observacion            = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                                WHERE idEmpresa        = '.$id.';';
                        }
                        
                    /*</Query>*/
                $this->open();
                    if (mysqli_query($this->Connection, $QueryUpdate)) {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']          = "Good";   
                            $JSON_RESULT['idEmpresa']        = $id; 
                            $JSON_RESULT['QueryDeleteUpdate']   = $QueryUpdate;  
                        /*</Respuesta>*/
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']             = "Bad";
                            $JSON_RESULT['QueryDeleteUpdate']   = $QueryUpdate;
                            $JSON_RESULT['Error']               = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this->closet(); 
                return $JSON_RESULT;
            }
        /*</Method Update>*/  

        /*<Method RESPUESTA_NOMBRE>*/
            public function RESPUESTA_NOMBRE($idUsuario){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    $JSON_RESULT['usuario']         = '';
                    $DATE                           = date('Y-m-d h:i:s');
                /*</Variables> */
                /*<Query> */
                    $querySelect = '    SELECT usuario FROM usuarios WHERE idUsuario = '.$idUsuario;
                /*</Query> */
                
                $this::open();            
                    if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                        if ($resultQuery->num_rows > 0) {
                            /*<Captura>*/
                                while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                    $JSON_RESULT['usuario'] = $Rol['usuario'];
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
                return $JSON_RESULT;
            }
        /*</Method RESPUESTA_NOMBRE>*/
 

        /*<Method RESPUESTA_FACE_PRIMERA Foto de perfil>*/
            public function RESPUESTA_FACE_PRIMERA(
                                                        $idUsuario,
                                                        $Direccion
                                                    ){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    $DATE                           = date('Y-m-d h:i:s');
                /*</Variables> */
                
                /*<Query> */
                    $queryUpdate = 'UPDATE  usuarios 
                                        SET imagen              = "'.$Direccion.'",
                                            fechaModificacion   = "'.$DATE.'",
                                            observacion         = " [ UPDATE '.$DATE.' ], [ idUser '.$idUsuario.' ] "
                                    WHERE 
                                            idUsuario   = '.$idUsuario.'' ;

                    $JSON_RESULT['queryUpdate']           = $queryUpdate;

                /*</Query> */
                
                $this::open();            
                    if (mysqli_query($this->Connection, $queryUpdate)) {
                        $JSON_RESULT['message'] = "Good";   
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this::closet();

                return $JSON_RESULT;
            }
        /*</Method RESPUESTA_FACE_PRIMERA Foto de perfi>*/

        /*<Method RESPUESTA_FACE_SECUNDARIA>*/
            public function RESPUESTA_FACE_SECUNDARIA(
                                                        $ID_USUARIO,
                                                        $CALLE,   
                                                        $NO_INTERIOR,     
                                                        $NO_EXTERIOR,    
                                                        $CODIGO_POSTAL,    
                                                        $COLONIA,    
                                                        $ID_PAIS,    
                                                        $ID_ESTADO,    
                                                        $ID_MINICIPIO
                                                    ){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                   
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    $DATE                           = date('Y-m-d h:i:s');

                   
                /*</Variables> */
                /*<Query> */
                    $queryUpdate = 'UPDATE usuarios SET 
                                                          calle                 = "'.$CALLE.'",  
                                                          noInterior            = "'.$NO_INTERIOR.'",  
                                                          noExterior            = "'.$NO_EXTERIOR.'",  
                                                          codigoPostal          = "'.$CODIGO_POSTAL.'",  
                                                          colonia               = "'.$COLONIA.'",  
                                                          idPaises              = "'.$ID_PAIS.'",  
                                                          idEstados             = "'.$ID_ESTADO.'",  
                                                          idMunicipio           = "'.$ID_MINICIPIO.'",
                                                          fechaModificacion     = "'.$DATE.'",
                                                          observacion      = " [ UPDATE '.$DATE.' ], [ idUser '.$ID_USUARIO.' ] "

                                                    WHERE idUsuario = '.$ID_USUARIO;
                    $JSON_RESULT['queryUpdate']     = $queryUpdate;
                /*</Query> */
                
                $this::open();            
                    if ($resultQuery = mysqli_query($this->Connection, $queryUpdate)) {
                        $JSON_RESULT['message'] = "Good";   
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this::closet();
                return $JSON_RESULT;
            }
        /*</Method RESPUESTA_FACE_SECUNDARIA>*/

        /*<Method RESPUESTA_FACE_TERCEARIA>*/
            public function RESPUESTA_FACE_TERCEARIA($idUsuario){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    $DATE                           = date('Y-m-d h:i:s');
                /*</Variables> */
                /*<Query> */
                    $querySelect = '    SELECT usuario FROM usuarios WHERE idUsuario = '.$idUsuario;
                /*</Query> */
                
                $this::open();            
                    if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                        if ($resultQuery->num_rows > 0) {
                            /*<Captura>*/
                                while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                    $JSON_RESULT['usuario'] = $Rol['usuario'];
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
                return $JSON_RESULT;
            }
        /*</Method RESPUESTA_FACE_TERCEARIA>*/

        /*<Method RESPUESTA_FACE_CUARTA Comporbante de domicilio>*/
            public function RESPUESTA_FACE_CUARTA(
                                                        $idUsuario, 
                                                        $Direccion
                                                    ){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    $DATE                           = date('Y-m-d h:i:s');
                    
                    $JSON_RESULT['ELIMINAR_ARCHIVO']           = $this->ELIMINAR_ARCHIVO(
                                                                                            $idUsuario,
                                                                                            'COMPREBATE DE DOMICILIO'
                                                                                        );
                /*</Variables> */

                /*<Query> */
                    $DATE                       = date('Y-m-d h:i:s');
                    $queryinsert                = 'INSERT INTO archivosxsolicitud ( 
                                                                        idSolicitud, 
                                                                        archivo, 
                                                                        tipoArchivo,
                                                                        
                                                                        fechaCreacion,
                                                                        fechaModificacion,
                                                                        observacion,
                                                                        bstate
                                                                    ) VALUES( 
                                                                        (
                                                                            SELECT sol.idSolicitud 
                                                                                        FROM solicitud sol 
                                                                                            WHERE 
                                                                                            sol.idUsuario = '.$idUsuario.' LIMIT 1
                                                                         ),  
                                                                        "'.$Direccion.'",                                            
                                                                        "COMPREBATE DE DOMICILIO",   
                                                                    
                                                                        "'.$DATE.'",
                                                                        "'.$DATE.'",
                                                                        " [ INSERT '.$DATE.' ], [ idUser '.$idUsuario.' ] ",
                                                                        1
                                                                    );';  
                    $JSON_RESULT['queryinsert']     = $queryinsert;
                /*</Query> */
                
                $this::open();            
                    if (mysqli_query($this->Connection, $queryinsert)) {
                        $JSON_RESULT['message'] = "Good";   
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";                          
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this::closet();
                return $JSON_RESULT;
            }
        /*</Method RESPUESTA_FACE_CUARTA Comporbante de domicilio>*/

        /*<Method RESPUESTA_FACE_QUINTA INE FRENTE>*/
            public function RESPUESTA_FACE_QUINTA(
                                                    $idUsuario, 
                                                    $Direccion
                                                ){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    $DATE                           = date('Y-m-d h:i:s');
                    $JSON_RESULT['ELIMINAR_ARCHIVO']           = $this->ELIMINAR_ARCHIVO(
                                                                                            $idUsuario,
                                                                                            'INE FRENTE'
                                                                                        );
                /*</Variables> */
                /*<Query> */
                    $DATE                       = date('Y-m-d h:i:s');
                    $queryinsert                = 'INSERT INTO archivosxsolicitud ( 
                                                                    idSolicitud, 
                                                                    archivo, 
                                                                    tipoArchivo,
                                                                    
                                                                    fechaCreacion,
                                                                    fechaModificacion,
                                                                    observacion,
                                                                    bstate
                                                                ) VALUES( 
                                                                    (
                                                                        SELECT sol.idSolicitud 
                                                                                        FROM solicitud sol 
                                                                                            WHERE 
                                                                                            sol.idUsuario = '.$idUsuario.' LIMIT 1
                                                                    ),
                                                                    "'.$Direccion.'",                                            
                                                                    "INE FRENTE",   
                                                                
                                                                    "'.$DATE.'",
                                                                    "'.$DATE.'",
                                                                    " [ INSERT '.$DATE.' ], [ idUser '.$idUsuario.' ] ",
                                                                    1
                                                                );';  
                    $JSON_RESULT['queryinsert'] = $queryinsert;
                /*</Query> */
                
                $this::open();            
                    if (mysqli_query($this->Connection, $queryinsert)) {
                        $JSON_RESULT['message'] = "Good";   
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this::closet();
                return $JSON_RESULT;
            }
        /*</Method RESPUESTA_FACE_QUINTA INE FRENTE>*/

        /*<Method RESPUESTA_FACE_SEXTA INE ATRAS>*/
            public function RESPUESTA_FACE_SEXTA(
                                                    $idUsuario, 
                                                    $Direccion
                                                ){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    $DATE                           = date('Y-m-d h:i:s');
                    $JSON_RESULT['ELIMINAR_ARCHIVO']           = $this->ELIMINAR_ARCHIVO(
                                                                                            $idUsuario,
                                                                                            'INE ATRAS'
                                                                                        );
                /*</Variables> */
                /*<Query> */
                    $DATE                       =  date('Y-m-d h:i:s');
                    $queryinsert                = 'INSERT INTO archivosxsolicitud ( 
                                                                idSolicitud, 
                                                                archivo, 
                                                                tipoArchivo,
                                                                
                                                                fechaCreacion,
                                                                fechaModificacion,
                                                                observacion,
                                                                bstate
                                                            ) VALUES( 
                                                                (
                                                                    SELECT sol.idSolicitud 
                                                                                        FROM solicitud sol 
                                                                                            WHERE 
                                                                                            sol.idUsuario = '.$idUsuario.' LIMIT 1
                                                                ),
                                                                "'.$Direccion.'",                                            
                                                                "INE ATRAS",   
                                                            
                                                                "'.$DATE.'",
                                                                "'.$DATE.'",
                                                                " [ INSERT '.$DATE.' ], [ idUser '.$idUsuario.' ] ",
                                                                1
                                                            );'; 
                    $JSON_RESULT['queryinsert'] = $queryinsert;
                /*</Query> */
                
                $this::open();            
                    if ($resultQuery = mysqli_query($this->Connection, $queryinsert)) {
                        $JSON_RESULT['message'] = "Good"; 
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";
                            $JSON_RESULT['querySelect']     = $querySelect;
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this::closet();
                return $JSON_RESULT;
            }
        /*</Method RESPUESTA_FACE_SEXTA INE ATRAS>*/

        /*<Method RESPUESTA_FACE_SEPTIMA TARJETA DE CIRCULACION>*/
            public function RESPUESTA_FACE_SEPTIMA(
                                                        $idUsuario, 
                                                        $Direccion
                                                    ){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    $JSON_RESULT['ELIMINAR_ARCHIVO']           = $this->ELIMINAR_ARCHIVO(
                                                                                            $idUsuario,
                                                                                            'TARJETA DE CIRCULACION'
                                                                                        );
                /*</Variables> */
                /*<Query> */
                    $DATE                       = date('Y-m-d h:i:s');
                    $queryinsert                = 'INSERT INTO archivosxsolicitud ( 
                                                                idSolicitud, 
                                                                archivo, 
                                                                tipoArchivo,
                                                                
                                                                fechaCreacion,
                                                                fechaModificacion,
                                                                observacion,
                                                                bstate
                                                            ) VALUES( 
                                                                (
                                                                    SELECT sol.idSolicitud 
                                                                                        FROM solicitud sol 
                                                                                            WHERE 
                                                                                            sol.idUsuario = '.$idUsuario.' LIMIT 1
                                                                ),
                                                                "'.$Direccion.'",                                            
                                                                "TARJETA DE CIRCULACION",   
                                                            
                                                                "'.$DATE.'",
                                                                "'.$DATE.'",
                                                                " [ INSERT '.$DATE.' ], [ idUser '.$idUsuario.' ] ",
                                                                1
                                                            );'; 
                    $JSON_RESULT['queryinsert'] = $queryinsert;
                /*</Query> */
                
                $this::open();            
                    if ($resultQuery = mysqli_query($this->Connection, $queryinsert)) {
                        $JSON_RESULT['message'] = "Good";  
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this::closet();
                return $JSON_RESULT;
            }
        /*</Method RESPUESTA_FACE_SEPTIMA TARJETA DE CIRCULACION>*/

        /*<Method RESPUESTA_FACE_OCTABA TARJETA BANCARIA>*/
            public function RESPUESTA_FACE_OCTABA(
                                                    $idUsuario, 
                                                    $Direccion
                                                ){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $DATE                           = date('Y-m-d h:i:s');
                    $JSON_RESULT['error']           = '';
                    $JSON_RESULT['ELIMINAR_ARCHIVO']           = $this->ELIMINAR_ARCHIVO(
                                                                                            $idUsuario,
                                                                                            'TARJETA BANCARIA'
                                                                                        );
                /*</Variables> */
                /*<Query> */
                    $DATE                       = date('Y-m-d h:i:s');
                    $queryinsert                = 'INSERT INTO archivosxsolicitud ( 
                                                                idSolicitud, 
                                                                archivo, 
                                                                tipoArchivo,
                                                                
                                                                fechaCreacion,
                                                                fechaModificacion,
                                                                observacion,
                                                                bstate
                                                            ) VALUES( 
                                                                (
                                                                    SELECT sol.idSolicitud 
                                                                                        FROM solicitud sol 
                                                                                            WHERE 
                                                                                            sol.idUsuario = '.$idUsuario.' LIMIT 1
                                                                ),  
                                                                "'.$Direccion.'",                                            
                                                                "TARJETA BANCARIA",   
                                                            
                                                                "'.$DATE.'",
                                                                "'.$DATE.'",
                                                                " [ INSERT '.$DATE.' ], [ idUser '.$idUsuario.' ] ",
                                                                1
                                                            );'; 
                    $JSON_RESULT['queryinsert'] = $queryinsert;
                /*</Query> */
                
                $this::open();            
                    if ($resultQuery = mysqli_query($this->Connection, $queryinsert)) {
                        $JSON_RESULT['message'] = "Good";  
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";
                            $JSON_RESULT['querySelect']     = $querySelect;
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this::closet();
                return $JSON_RESULT;
            }
        /*</Method RESPUESTA_FACE_OCTAB TARJETA BANCARIAA>*/

        /*<Method RESPUESTA_FACE_CANCELAR>*/
            public function RESPUESTA_FACE_CANCELAR($idUsuario){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                /*<Query> */
                    $querySelect = '    SELECT usuario FROM usuarios WHERE idUsuario = '.$idUsuario;
                /*</Query> */
                
                $this::open();            
                    if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                        if ($resultQuery->num_rows > 0) {
                            /*<Captura>*/
                                while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                    $JSON_RESULT['usuario'] = $Rol['usuario'];
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
                return $JSON_RESULT;
            }
        /*</Method RESPUESTA_FACE_CANCELAR>*/
        
        /*<Method RESPUESTA_FACE_ELIMINAR>*/
            public function RESPUESTA_FACE_ELIMINAR(    
                                                        $idUsuario,
                                                        $estatus
                                                    ){
                /*<Variables> */ 
                    $JSON_RESULT           = [];                  
                    $JSON_RESULT           = $this->ELIMINAR_ARCHIVO(
                                                                        $idUsuario,
                                                                        $estatus
                                                                    );                   
                /*</Variables> */    

                return $JSON_RESULT;
            }
        /*</Method RESPUESTA_FACE_ELIMINAR>*/

        /*<Method ELIMINAR_ARCHIVO>*/
            private function ELIMINAR_ARCHIVO($idUsuario, $Estatus){

                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    $DATE                           = date('Y-m-d h:i:s');
                /*</Variables>*/

                /*<queryDelete>*/
                    $queryDelete = 'UPDATE  archivosxsolicitud axs
                                                                SET axs.bstate = 0,
                                                                    axs.fechaModificacion   = "'.$DATE.'",
                                                                    axs.observacion         = " [ DELETE '.$DATE.' ], [ idUser '.$idUsuario.' ] "
                                                            WHERE 
                                                                    axs.idSolicitud   = (
                                                                                            SELECT usu.idUsuario FROM  usuarios usu
                                                                                                                    WHERE 
                                                                                                                    usu.idUsuario = '.$idUsuario.'  
                                                                                                                        LIMIT 1
                                                                                        ) AND 
                                                                axs.tipoArchivo = "'.$Estatus.'" ; ';

                    $JSON_RESULT['queryDelete']         = $queryDelete;
                /*</queryDelete>*/               
                
                $this::open();            
                    if (mysqli_query($this->Connection, $queryDelete)) {
                        $JSON_RESULT['message'] = "Good";   
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";                           
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this::closet();

                return $JSON_RESULT;
            }
        /*</Method ELIMINAR_ARCHIVO>*/

        /*<Method RESPUESTA_ELIMINAR_PERFIL>*/
            public function RESPUESTA_ELIMINAR_PERFIL($idUsuario){

                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    $DATE                           = date('Y-m-d h:i:s');
                /*</Variables>*/

                /*<queryUpdate>*/
                    $queryUpdate = 'UPDATE  usuarios 
                                                    SET 
                                                        imagen              = "/door2door/Modules/ModulesImage/usuario.png",   
                                                        fechaModificacion   = "'.$DATE.'",
                                                        observacion         = " [ DELETE '.$DATE.' ], [ idUser '.$idUsuario.' ] "                                                               
                                                WHERE 
                                                        idUsuario = '.$idUsuario.'; ';

                    $JSON_RESULT['queryUpdate']         = $queryUpdate;
                /*</queryUpdate>*/               
                
                $this::open();            
                    if (mysqli_query( $this->Connection, $queryUpdate )) {
                        $JSON_RESULT['message'] = "Good";   
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";                           
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this::closet();

                return $JSON_RESULT;
            }
        /*</Method RESPUESTA_ELIMINAR_PERFIL>*/

        /*<Method RESPUESTA_FACE_NOVENA_ONO>*/
            public function RESPUESTA_FACE_NOVENA_ONO(
                                                        $ID_USUARIO ,  
                                                        $ARREGLO_PREGUNTA,
                                                        $ARREGLO_RESPUESTA
                                                    ){

            }
        /*</Method RESPUESTA_FACE_NOVENA_ONO>*/


        /*<Method RESPUESTA_FINALIZAR>*/
            public function Finalizar( $Preguntas ){
                
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                   
                    session_start();
                    $DATE                       = date('Y-m-d h:i:s');
                    $idUser                     = $_SESSION["idUser-door2door"];
                /*</Variables>*/

                /*<queryDelete>*/
                    $querySolicitud = 'UPDATE  solicitud 
                                                                SET estatus = "CONFIRMADA",
                                                                    fechaModificacion   = "'.$DATE.'",
                                                                    observacion         = " [ UPDATE '.$DATE.' ], [ idUser '.$idUsuario.' ] "
                                                            WHERE 
                                                                    idUsuario = '.$idUser;

                    $JSON_RESULT['querySolicitud']         = $querySolicitud;
                /*</queryDelete>*/               
                
                $this::open();            
                    if (mysqli_query($this->Connection, $querySolicitud)) {
                        $JSON_RESULT['message'] = "Good";   
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";                           
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this::closet();

                
                $JSON_PREGUNTAS                 = $Preguntas;
                $JSON_RESULT['JSON_PREGUNTAS']  = $JSON_PREGUNTAS;

                /*<VARIABLES>*/
                    $RESULTADO_ELIMINAR_RESPUESTAS      = [];
                    $RESULTADO_CREAR_RESPUESTAS_UNO     = [];
                    $RESULTADO_CREAR_RESPUESTAS_TODOS   = [];
                /*</VARIABLES>*/

                /*<RESULTADO_ELIMINAR_RESPUESTAS>*/    
                    /*<RESULTADO_ELIMINAR_RESPUESTAS>*/ 
                        $RESULTADO_ELIMINAR_RESPUESTAS = $this->RESULTADO_ELIMINAR_RESPUESTAS();
                    /*</RESULTADO_ELIMINAR_RESPUESTAS>*/ 
                    if($RESULTADO_ELIMINAR_RESPUESTAS['message'] == 'Good' ){
                        $JSON_RESULT['RESULTADO_ELIMINAR_RESPUESTAS']  = []; 
                        $JSON_RESULT['RESULTADO_ELIMINAR_RESPUESTAS']  = $RESULTADO_ELIMINAR_RESPUESTAS;                                                
                    }else{
                        array_push($RESULTADO_CREAR_RESPUESTAS_TODOS, $RESULTADO_CREAR_RESPUESTAS_UNO); 
                        $JSON_RESULT['message']                        = 'RESULTADO_ELIMINAR_RESPUESTAS';
                        $JSON_RESULT['RESULTADO_ELIMINAR_RESPUESTAS']  = [];        
                        $JSON_RESULT['RESULTADO_ELIMINAR_RESPUESTAS']  = $RESULTADO_ELIMINAR_RESPUESTAS;   
                        return $JSON_RESULT;
                    }
                /*</RESULTADO_CREAR_RESPUESTAS_UNO>*/  

                /*<JSON_ROLES>*/
                    for($i = 0; $i < count($JSON_PREGUNTAS); $i++){

                        /*<Declaramos las Variables que vamos a usar >*/
                            $ID_PREGUNTA    = "";
                            $RESPUESTA      = "";
                        /*</Declaramos las Variables que vamos a usar >*/

                        /*<Recorremos el JSON>*/ 
                            foreach ( $JSON_PREGUNTAS[$i] as $clave => $valor ) {   
                                /*<Tomamos la Informacion del JSON>*/      
                                    if(    $clave == 'idPxC' || $clave == 'respuesta'   ){
                                            if($valor != '' || $valor != null){
                                                if($clave == 'idPxC'           )     {$ID_PREGUNTA       = $valor;      }   
                                                if($clave == 'respuesta'       )     {$RESPUESTA         = $valor;      }   
                                                
                                            }  
                                    }      
                                /*<Tomamos la Informacion del JSON>*/                    
                            }   
                        /*<Recorremos el JSON>*/ 

                        /*<RESULTADO_CREAR_RESPUESTAS_UNO>*/    
                            /*<RESULTADO_CREAR_RESPUESTAS_UNO>*/ 
                                $RESULTADO_CREAR_RESPUESTAS_UNO = $this->RESULTADO_CREAR_RESPUESTAS_UNO( $ID_PREGUNTA, $RESPUESTA );
                            /*</RESULTADO_CREAR_RESPUESTAS_UNO>*/ 
                            if($RESULTADO_CREAR_RESPUESTAS_UNO['message'] == 'Good' ){
                                array_push($RESULTADO_CREAR_RESPUESTAS_TODOS, $RESULTADO_CREAR_RESPUESTAS_UNO);                                        
                            }else{
                                array_push($RESULTADO_CREAR_RESPUESTAS_TODOS, $RESULTADO_CREAR_RESPUESTAS_UNO); 
                                $JSON_RESULT['message']                           = 'RESULTADO_CREAR_RESPUESTAS_TODOS';
                                $JSON_RESULT['RESULTADO_CREAR_RESPUESTAS_TODOS']  = [];        
                                $JSON_RESULT['RESULTADO_CREAR_RESPUESTAS_TODOS']  = $RESULTADO_CREAR_RESPUESTAS_TODOS;   
                                return $JSON_RESULT;
                            }
                        /*</RESULTADO_CREAR_RESPUESTAS_UNO>*/  
                    }  
                /*<JSON_ROLES>*/  

                $JSON_RESULT['message']  = 'Good';
                return $JSON_RESULT;
            }
        /*</Method RESPUESTA_FINALIZAR>*/

        
        /*<RESULTADO_ELIMINAR_RESPUESTAS>*/
            public function RESULTADO_ELIMINAR_RESPUESTAS(){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    session_start();
                    $idUser                     = $_SESSION["idUser-door2door"];
                /*</Variables> */
                /*<Query> */
                    $queryDelete = 'DELETE FROM usuario_respuesta WHERE idUsuario = '.$idUser.'; ';
                /*</Query> */
                $JSON_RESULT['queryDelete']     = $queryDelete;
                $this->open();            
                    if ($resultQuery = mysqli_query($this->Connection, $queryDelete)) {                          
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
        /*</RESULTADO_ELIMINAR_RESPUESTAS>*/
        
        /*<RESULTADO_CREAR_RESPUESTAS_UNO>*/
            public function RESULTADO_CREAR_RESPUESTAS_UNO( $ID_PREGUNTA, $RESPUESTA){
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
                    $queryInsert = 'INSERT INTO usuario_respuesta ( 

                                            idUsuario,  
                                            idPregunta,   
                                            respuesta, 

                                            fechaCreacion,  
                                            fechaModificacion, 
                                            observacion, 
                                            bstate 
                                            )   VALUES  ( 

                                                "'.$idUser.'", 
                                                "'.$ID_PREGUNTA.'",  
                                                "'.$RESPUESTA.'",                                         

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
               
            }
        /*</RESULTADO_CREAR_RESPUESTAS_UNO>*/

         /*<Method RESPUESTA_CONTRATO>*/
            public function Contrato(){
                
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    session_start();
                    $DATE                       = date('Y-m-d h:i:s');
                    $idUser                     = $_SESSION["idUser-door2door"];
                /*</Variables>*/

                /*<querySolicitud>*/
                    $querySolicitud = 'UPDATE  solicitud 
                                                                SET estatus = "ACTIVO",
                                                                    fechaModificacion   = "'.$DATE.'",
                                                                    observacion         = " [ UPDATE '.$DATE.' ], [ idUser '.$idUsuario.' ] "
                                                            WHERE 
                                                                    idUsuario = '.$idUser;

                    $JSON_RESULT['querySolicitud']         = $querySolicitud;
                /*</querySolicitud>*/               
                
                $this::open();            
                    if (mysqli_query($this->Connection, $querySolicitud)) {
                        $JSON_RESULT['message'] = "Good";   
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";                           
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this::closet();
                return $JSON_RESULT;
            }
        /*</Method RESPUESTA_CONTRATO>*/



        
        /*<Method RESPUESTA_Vehiculo>*/
            public function Vehiculo(
                                            $Vehiculo
                                        ){
                
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    session_start();
                    $DATE                       = date('Y-m-d h:i:s');
                    $idUser                     = $_SESSION["idUser-door2door"];
                /*</Variables>*/

                /*<queryDelete>*/
                    $queryUsuarios = 'UPDATE  usuarios 
                                                                SET idTVehiculo         = '.$Vehiculo.',
                                                                    fechaModificacion   = "'.$DATE.'",
                                                                    observacion         = " [ UPDATE '.$DATE.' ], [ idUser '.$idUsuario.' ] "
                                                            WHERE 
                                                                    idUsuario = '.$idUser;

                    $JSON_RESULT['queryUsuarios']         = $queryUsuarios;
                /*</queryDelete>*/               
                
                $this::open();            
                    if (mysqli_query($this->Connection, $queryUsuarios)) {
                        $JSON_RESULT['message'] = "Good";   
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";                           
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this::closet();
                return $JSON_RESULT;
            }
        /*</Method RESPUESTA_Vehiculo>*/


        


        
       

        
    }

    