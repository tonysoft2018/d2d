<?php

namespace  door2door\Modules\ModulePerfilesSocio\ModuleRequest\Model\Solicitudes;
    /*<Includes>*/
        include_once('../../../ModulePugins/door2door.Cofiguration.Conection.php');
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
            public function selectFull($idUsuario){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                /*<Query> */
                    $querySelect = '     SELECT 
                                            usu.usuario,
                                            usu.imagen,
                                            usu.nombres,
                                            usu.apellidos,
                                            usu.idUsuario,
                                            usu.tipoPerfil,
                                            usu.numeroCuenta,
                                            sol.idSolicitud,
                                            sol.folio,
                                            sol.fecha,
                                            sol.estatus,
                                            (
                                                IFNULL( 
                                                        (SELECT tv.nombre FROM tipoVehiculo tv WHERE tv.idTVehiculo = usu.IdTVehiculo),"NINGUNO" 
                                                    )
                                            )AS TipoDeVehiculo
                                        FROM   usuarios usu,  solicitud sol
                                            WHERE 
                                                usu.idUsuario   =  sol.idUsuario 	AND 
                                                usu.idUsuario   =  '.$idUsuario.' 	AND 
                                                usu.tipoUsuario = "SOCIO" 		    AND
                                                usu.bstate      = 1 ; ';
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
            public function selectFullFile($folio,$idSolicitud){
               
                /*<Variables> */
                    $JSON_RESULT                                = [];
                    $JSON_RESULT['information']                 = [];
                    $JSON_RESULT['informationComentarios']      = [];
                    $JSON_RESULT['informationCuesntionarios']      = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                if($folio > 0){
                    /*<Query> */
                        $querySelect = 'SELECT   
                                            axs.tipoArchivo,
                                            axs.archivo
                                        FROM 
                                            archivosxsolicitud axs, solicitud sol 
                                        WHERE 
                                            axs.idSolicitud = sol.idSolicitud	AND 
                                            sol.folio		= '.$folio.';';
                    /*</Query> */                    
                    $this::open();            
                        if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                            $JSON_RESULT['message'] = "Good";  
                            $JSON_RESULT['querySelect'] = $querySelect;  
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

                    /*<Query> */
                        $querysolicitudComentarios = 'SELECT  *  FROM  solicitudComentarios sol   WHERE   sol.idSolicitud = '.$idSolicitud.';';
                    /*</Query> */
                    $JSON_RESULT['querysolicitudComentarios']     = $querysolicitudComentarios;
                    $this::open();            
                        if ($resultQuery = mysqli_query($this->Connection, $querysolicitudComentarios)) {
                            $JSON_RESULT['message'] = "Good";  
                            if ($resultQuery->num_rows > 0) {
                                /*<Captura>*/
                                    while ($Ses = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                        array_push($JSON_RESULT['informationComentarios'], $Ses);
                                    }
                                  
                                /*</Captura>*/
                            }else{
                                $JSON_RESULT['informationComentarios']     = [];
                              
                            }
                            /*<Respuesta>*/                               
                                
                            /*</Respuesta>*/
                        } else {
                            /*<Respuesta>*/
                                $JSON_RESULT['message']         = "Bad";
                               
                                $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                              
                            /*</Respuesta>*/
                        }        
                    $this::closet();

                    /*<Query> */
                        $querysolicitudRespuesta = 'SELECT  
                                                                res.respuesta,  
                                                                (
                                                                    SELECT pxc.pregunta FROM  preguntasxcuesntionario pxc
                                                                                    WHERE 	pxc.idPxC = res.idPxC
                                                                )AS Pregunta
                                                            FROM  respuestasxcuesntionario res   
                                                        WHERE   res.idSolicitud  = '.$idSolicitud.';';
                    /*</Query> */
                    $JSON_RESULT['informationCuesntionarios']     = $querysolicitudComentarios;
                    $this::open();            
                        if ($resultQuery = mysqli_query($this->Connection, $querysolicitudRespuesta)) {
                            $JSON_RESULT['message'] = "Good";  
                            if ($resultQuery->num_rows > 0) {
                                /*<Captura>*/
                                    while ($Ses = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                        array_push($JSON_RESULT['informationCuesntionarios'], $Ses);
                                    }
                                    
                                /*</Captura>*/
                            }else{
                                $JSON_RESULT['informationCuesntionarios']     = [];
                                
                            }
                            /*<Respuesta>*/                               
                              
                            /*</Respuesta>*/
                        } else {
                            /*<Respuesta>*/
                                $JSON_RESULT['message']         = "Bad";
                               
                                $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                              
                            /*</Respuesta>*/
                        }        
                    $this::closet();
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

    