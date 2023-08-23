<?php

namespace  door2door\Modules\ModuleRequest\Model\Solicitudes;
    /*<Includes>*/
        include_once('../../ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    /*<use>*/
        use  door2door\Modules\ModulePugins\Conection\Conection as ConectionSolicitudes;
    /*<use>*/

    class Solicitudes extends ConectionSolicitudes{

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

                /*<USUARIO>*/
                    /*<Query> */
                        $querySelect = '     SELECT 
                                                usu.idUsuario,
                                                usu.usuario,                                                
                                                usu.imagen,
                                                usu.nombres,
                                                usu.apellidos,
                                                usu.tipoPerfil,
                                                usu.email,

                                                usu.latitud ,
                                                usu.longitud ,
                                                usu.colonia,
                                                usu.calle,
                                                usu.noExterior,
                                                usu.noInterior,
                                                usu.codigoPostal,
                                                usu.ciudad,
                                                (
                                                    IFNULL( 
                                                            (
                                                                    SELECT mun.nombre 
                                                                        FROM Municipios mun 
                                                                        WHERE mun.idMunicipio  = usu.idMunicipio 
                                                            ),"NINGUNO" 
                                                        )
                                                )AS Municipio,
                                                (
                                                    IFNULL( 
                                                            (
                                                                    SELECT es.nombre 
                                                                        FROM Estados es 
                                                                        WHERE es.idEstado   = usu.idEstados  
                                                            ),"NINGUNO" 
                                                        )
                                                )AS Estado,                                                
                                                (
                                                    IFNULL( 
                                                            (
                                                                    SELECT pa.nombre 
                                                                        FROM paises pa 
                                                                        WHERE pa.idPais    = usu.idPaises   
                                                            ),"NINGUNO" 
                                                        )
                                                )AS Pais,

                                                usu.banco,
                                                usu.numeroCuenta,

                                                (
                                                    IFNULL( 
                                                            (   
                                                                SELECT tv.nombre 
                                                                FROM tipoVehiculo tv 
                                                                WHERE tv.idTVehiculo = usu.IdTVehiculo
                                                                ),"NINGUNO" 
                                                        )
                                                )AS TipoDeVehiculo,
                                               

                                                sol.idSolicitud,
                                                sol.folio,
                                                sol.fecha,
                                                sol.estatus
                                               
                                            FROM   usuarios usu,  solicitud sol
                                                WHERE 
                                                    usu.idUsuario   =  sol.idUsuario 	AND 
                                                    usu.tipoUsuario = "SOCIO" 		    AND
                                                    usu.bstate      = 1 
                                                GROUP BY sol.fecha     
                                                ORDER BY sol.fecha   DESC ; ';
                        $JSON_RESULT['querySelect'] = $querySelect;
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
                /*</USUARIO>*/


                
                return $JSON_RESULT;
            }
        /*<Method SelectFull>*/
    
        /*<Method Estatus>*/
            public function Estatus($estatus, $idUsuario, $folio,  $comentario){       
                /*<Variables> */
                    /*</datos>*/
                        session_start();
                        $DATE                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];
                    /*<datos>*/
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error'] = '';
                /*</Variables> */
                /*<Query>*/
                    $queryDeleteUpdate = '  UPDATE  usuarios 
                                            SET     estatus             = "'.$estatus.'",
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion      = " [ DELETE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                            WHERE idUsuario = '.$idUsuario.';';
                /*</Query>*/
                
                $this->open();
                    if (mysqli_query($this->Connection, $queryDeleteUpdate)) {
                        /*<Respuesta>*/                            
                            $JSON_RESULT['message-user']        = "Good";           
                            $JSON_RESULT['queryDeleteUpdate-user']   = $queryDeleteUpdate;                             
                        /*</Respuesta>*/
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message-user']         = "Bad";
                            $JSON_RESULT['DeleteUpdate-user']    = $queryDeleteUpdate;
                            $JSON_RESULT['Error-user']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this->closet(); 

                $queryDeleteUpdate = '  UPDATE  solicitud 
                                            SET     estatus             = "'.$estatus.'",
                                                    idRechazo           =  '.$idUser.',
                                                    comentario          = "'.$comentario.'",
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion      = " [ DELETE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                            WHERE folio = '.$folio.';';
                $this->open();
                if (mysqli_query($this->Connection, $queryDeleteUpdate)) {
                    /*<Respuesta>*/
                        
                        $JSON_RESULT['message'] = "Good";   
                        $JSON_RESULT['queryDeleteUpdate']   = $queryDeleteUpdate; 
                       
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

        /*<Method selectFullFile>*/
            public function selectFullFile( $folio, $idSolicitud, $idUsuario, $tipoSocio ){
               
                /*<Variables> */
                    $JSON_RESULT                                = [];
                    $JSON_RESULT['information']                 = [];
                    $JSON_RESULT['information_CUESNTIONARIOS']  = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                if($folio > 0){
                    /*<USUARIOS>*/
                        /*<Query> */
                            $querySelect = 'SELECT   
                                                axs.tipoArchivo,
                                                axs.archivo
                                            FROM 
                                                archivosxsolicitud axs, solicitud sol 
                                            WHERE 
                                                axs.idSolicitud = sol.idSolicitud	AND 
                                                sol.folio		= '.$folio.'        AND
                                                axs.bstate      = 1 ;';
                        /*</Query> */    
                        $JSON_RESULT['querySelect'] = $querySelect;  
                        $JSON_RESULT['idUsuario'] = $idUsuario;  
                        $this::open();            
                            if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                                $JSON_RESULT['message'] = "Good";  
                                
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
                                
                                /*</Respuesta>*/
                            } else {
                                /*<Respuesta>*/
                                    $JSON_RESULT['message']         = "Bad";
                                    $JSON_RESULT['querySelect']     = $querySelect;
                                    $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                                
                                /*</Respuesta>*/
                            }        
                        $this::closet();
                    /*</USUARIOS>*/

                    /*<CUESTIONARIO>*/
                        if($tipoSocio == 'SOCIO VISITADOR'){                        
                            /*<Query> */
                                $querySelectCuesntionario = 'SELECT 
                                                                    cue.nombre,
                                                                    cue.tipoCuestionario,
                                                                    cue.idCuestionario
                                                                    FROM 	cuestionarios  cue
                                                                            WHERE  cue.idCuestionario  = (
                                                                                                          IFNULL(
                                                                                                                    (
                                                                                                                        SELECT aj.idCuestionariosVisitante  
                                                                                                                            FROM ajusteCuestionario aj
                                                                                                                            ORDER BY  aj.idACuestionarios                                                                                                                             
                                                                                                                            DESC LIMIT 1
                                                                                                                    ),0                                                
                                                                                                                )
                                                                                                        )';
                            /*</Query>*/        
                        }else{
                            /*<Query> */
                                $querySelectCuesntionario = 'SELECT 
                                                                cue.nombre,
                                                                cue.tipoCuestionario,
                                                                cue.idCuestionario
                                                                FROM 	cuestionarios  cue
                                                                        WHERE  cue.idCuestionario  = (
                                                                                                    IFNULL(
                                                                                                                (
                                                                                                                    SELECT aj.idCuestionariosCliente  
                                                                                                                        FROM ajusteCuestionario aj
                                                                                                                        ORDER BY  aj.idACuestionarios                                                                                             
                                                                                                                        DESC LIMIT 1
                                                                                                                ),0                                                
                                                                                                            )
                                                                        )';
                             $JSON_RESULT['tipoSocio']     = $tipoSocio; 
                            /*</Query>*/  
                        }            
                        $JSON_RESULT['querySelectCuesntionario']     = $querySelectCuesntionario;  
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
                                                                                                ur.idUsuario  = '.$JSON_RESULT['idUsuario'].'
                                                                                        ';  

                                                                $JSON_RESULT['queryRespuesta']     = $queryRespuesta;   

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
                    /*</CUESTIONARIO>*/
                    return $JSON_RESULT;
                }else{
                    $JSON_RESULT['message']         = "no variables";
                    return $JSON_RESULT;
                }
                return $JSON_RESULT;
            }
        /*<Method selectFullFile>*/



        /*<Method Delete>*/
            public function delete($id, $comentario){       
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
                    $queryDeleteUpdate = ' UPDATE  solicitud 
                                                        SET     estatus             = "RECHAZADA",
                                                                comentario          = "'.$comentario.'",
                                                                fechaModificacion   = "'.$DATE.'",
                                                                observacion      = " [ UPDATE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                                        WHERE idSolicitud = '.$id.';';
                /*</Query>*/
                
                $this->open();
                    if (mysqli_query($this->Connection, $queryDeleteUpdate)) {
                        /*<Respuesta>*/                        
                            $JSON_RESULT['message'] = "Good";   
                            $JSON_RESULT['Comentario'] = $this->createComentaio(
                                $id,
                                $comentario
                            );                           
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

        /*<Method Rechazar>*/
            public function rechazar($id,$comentario){       
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
                    $queryDeleteUpdate = '  UPDATE  solicitud 
                                            SET     estatus             = "RECHAZADA",
                                                    comentario          = "'.$comentario.'",
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion      = " [ UPDATE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                            WHERE idSolicitud = '.$id.';';
                /*</Query>*/
                
                $this->open();
                    if (mysqli_query($this->Connection, $queryDeleteUpdate)) {
                        /*<Respuesta>*/                        
                            $JSON_RESULT['message'] = "Good";     
                            $JSON_RESULT['Comentario'] = $this->createComentaio(
                                $id,
                                $comentario
                            );                        
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
        /*</Method Rechazar>*/

        /*<Method Aceptar>*/
            public function aceptar($id,$comentario){       
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
                    $queryDeleteUpdate = '  UPDATE  solicitud 
                                            SET     estatus             = "ACEPTAR",
                                                    comentario          = "'.$comentario.'",
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion      = " [ UPDATE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                            WHERE idSolicitud = '.$id.';';
                /*</Query>*/
                
                $this->open();
                    if (mysqli_query($this->Connection, $queryDeleteUpdate)) {
                        /*<Respuesta>*/                        
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
        /*</Method Aceptar>*/

        /*<Method contrato>*/
            public function contrato($id){       
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
                    $queryDeleteUpdate = '  UPDATE  solicitud 
                                            SET     estatus             = "CONTRATO",
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion      = " [ UPDATE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                            WHERE idSolicitud = '.$id.';';
                /*</Query>*/
                
                $this->open();
                    if (mysqli_query($this->Connection, $queryDeleteUpdate)) {
                        /*<Respuesta>*/                        
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
        /*</Method contrato>*/

        /*<Method incompleta>*/
            public function incompleta($id, $comentario){       
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
                    $JSON_RESULT['Comentario']      =[];
                /*</Variables> */
                
                /*<Query>*/
                    $queryDeleteUpdate = '  UPDATE  solicitud 
                                            SET     estatus             = "INCOMPLETA",
                                                    comentario          = "'.$comentario.'",
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion      = " [ UPDATE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                            WHERE idSolicitud = '.$id.';';
                /*</Query>*/
                
                $this->open();
                    if (mysqli_query($this->Connection, $queryDeleteUpdate)) {
                        /*<Respuesta>*/                        
                            $JSON_RESULT['message'] = "Good";     
                            $JSON_RESULT['Comentario'] = $this->createComentaio(
                                                                                $id,
                                                                                $comentario
                            );                        
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
        /*</Method incompleta>*/

        /*<Method activar>*/
            public function  activar($id){       
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
                    $queryDeleteUpdate = '  UPDATE  solicitud 
                                            SET     estatus             = "ACTIVO",
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion      = " [ UPDATE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                            WHERE idSolicitud = '.$id.';';
                /*</Query>*/
                
                $this->open();
                    if (mysqli_query($this->Connection, $queryDeleteUpdate)) {
                        /*<Respuesta>*/                        
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
        /*</Method activar>*/

        /*<Method inactivo>*/
            public function  inactivo($id){       
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
                    $queryDeleteUpdate = '  UPDATE  solicitud 
                                            SET     estatus             = "INACTIVO",
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion      = " [ UPDATE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                            WHERE idSolicitud = '.$id.';';
                /*</Query>*/
                
                $this->open();
                    if (mysqli_query($this->Connection, $queryDeleteUpdate)) {
                        /*<Respuesta>*/                        
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
        /*</Method inactivo>*/


        /*<Method Create>*/
            public function createComentaio(   
                                    $idSolicitud,
                                    $comentario
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

                $queryInsert = 'INSERT INTO solicitudComentarios ( 
                                            idSolicitud, 
                                            comentario,
                                            fechaCreacion, 
                                            fechaModificacion,
                                            observacion,
                                            bstate
                                            ) VALUES( 
                                                "'.$idSolicitud.'",                                           
                                                "'.$comentario.'",
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
            }
        /*</Method Create>*/
           

      
        
        
    }

    