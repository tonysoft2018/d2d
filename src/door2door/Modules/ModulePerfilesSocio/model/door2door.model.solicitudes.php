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
                /*<Query> */
                    $querySelect = '   SELECT 
                                                usu.usuario,
                                                usu.imagen,
                                                usu.nombres,
                                                usu.apellidos,
                                                usu.idUsuario,
                                                usu.tipoPerfil,
                                                sol.folio,
                                                sol.fecha,
                                                sol.estatus
                                            FROM   usuarios usu,  solicitud sol
                                            WHERE 
                                                usu.idUsuario   =  sol.idUsuario 	AND 
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
            public function selectFullFile($folio){
               
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
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
        /*<Method selectFullFile>*/

      
        
        
    }

    