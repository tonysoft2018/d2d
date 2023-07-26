<?php

namespace    door2door\Modules\ModulePerfilesSocio\Model\Socios;
    /*<Includes>*/
        include_once('../../ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    /*<use>*/
        use  door2door\Modules\ModulePugins\Conection\Conection as ConectionZona;
    /*<use>*/

    class Socios extends ConectionZona{

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
                    $querySelect = 'SELECT 
                                                usu.idUsuario,
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
                                        FROM   
                                                usuarios usu,  
                                                solicitud sol
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

        /*<Method selectFullVisitas>*/
            public function selectFullVisitas($idUsuario){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                /*<Query> */
                    $querySelect = 'SELECT 
                                        con.idCampana,
                                        con.idContacto,
                                        cam.idUsuario,
                                        con.nombre,
                                        con.telefono,
                                        (
                                            IFNULL( 
                                                (
                                                    SELECT vis.estatus FROM visitas vis
                                                            WHERE vis.idContacto = con.idContacto  
                                                                ORDER BY vis.idVisita DESC limit 1
                                                ), "PENDIENTE"
                                            )
                                        )AS estatus,
                                        (
                                            IFNULL( 
                                                (
                                                    SELECT vis.fecha FROM visitas vis
                                                            WHERE vis.idContacto = con.idContacto 
                                                                ORDER BY vis.idVisita DESC limit 1
                                                ), "00-00-0000 00:00:00"
                                            )
                                        )AS fecha
                                    FROM contacto con, campana cam 
                                    WHERE 
                                        con.idCampana   = cam.idCampana  AND
                                        cam.idUsuario   = '.$idUsuario.' AND
                                        con.bstate      = 1 ';

                $JSON_RESULT['querySelect']           = $querySelect;
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
        /*<Method selectFullVisitas>*/

        /*<Method selectFullComision>*/
            public function selectFullComision($idUsuario){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                /*<Query> */
                    $querySelect = 'SELECT (
                                                    SELECT usu.nombres FROM usuarios usu WHERE usu.idUsuario = (
                                                                                                                    SELECT vs.idUsuarioSV 
                                                                                                                        FROM visitas vs 
                                                                                                                        WHERE
                                                                                                                        vs.idVisita = cd.idVista
                                                                                                                )
                                            )AS Visitador,
                                            (
                                                    SELECT con.nombre FROM contacto con WHERE con.idContacto = cd.idContacto
                                            )AS Contacto,
                                            (
                                                    SELECT con.telefono FROM contacto con WHERE con.idContacto = cd.idContacto
                                            )AS telefono,
                                            (
                                                SELECT vs.fecha  FROM visitas vs  WHERE vs.idVisita = cd.idVista
                                            )AS fecha,
                                            (
                                                SELECT co.comision  FROM coneptoComicion co  WHERE co.idCComicion  =    (
                                                                                                                            SELECT vs.idCComicion 
                                                                                                                                FROM visitas vs 
                                                                                                                                WHERE
                                                                                                                                vs.idVisita = cd.idVista
                                                                                                                        )
                                            ) AS comision,
                                            (
                                                SELECT co.cantidad  FROM coneptoComicion co  WHERE co.idCComicion  =  (
                                                                                                                            SELECT vs.idCComicion 
                                                                                                                                FROM visitas vs 
                                                                                                                                WHERE
                                                                                                                                vs.idVisita = cd.idVista
                                                                                                                        )
                                            ) AS cantidad, 
                                            vis.idUsuarioSC,
                                            vis.estatus
                                                FROM corte_deta cd,  visitas vis
                                                WHERE 
                                                        vis.idVisita =  cd.idVista AND
                                                        cd.bstate  = 1 AND 
                                                        vis.idUsuarioSC = '.$idUsuario.';';
                /*</Query> */


                $JSON_RESULT['querySelect']           = $querySelect;
                
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
        /*<Method selectFullComision>*/
    
        /*<Method deleteImagen>*/
            public function deleteImagen($id){       
                /*<Variables> */
                    /*</datos>*/
                        session_start();
                        $DATE                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];
                    /*<datos>*/
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = "/door2door/Modules/ModulesImage/usuario.png";
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error'] = '';
                /*</Variables> */
                /*<Query>*/
                    $queryDeleteUpdate = '  UPDATE  usuarios 
                                            SET     imagen              = "/door2door/Modules/ModulesImage/usuario.png",
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion      = " [ DELETE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                            WHERE idUsuario = '.$id.';';
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
        /*</Method deleteImagen>*/

        /*<Method updateImagen>*/
            public function updateImagen($id, $direccion){       
                /*<Variables> */
                    /*</datos>*/
                        session_start();
                        $DATE                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];
                    /*<datos>*/
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = $direccion;
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error'] = '';
                    
                /*</Variables> */
                /*<Query>*/
                    $queryDeleteUpdate = '  UPDATE  usuarios 
                                            SET     imagen              = "'.$direccion.'",
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion      = " [ DELETE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                            WHERE idUsuario = '.$id.';';
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
        /*</Method updateImagen>*/     

        /*<Method Update>*/
            public function Update(
                                        $id,
                                        $nombre,
                                        $apellidos

                                    ){
                $JSON_RESULT = [];

                if($nombre != '' && $id > 0){
                    /*<Variables> */
                            /*</datos>*/
                            session_start();
                            $Date                       = date('Y-m-d h:i:s');
                            $idUser                     = $_SESSION["idUser-door2door"];
                        /*<datos>*/
                        $JSON_RESULT['message']         = '';
                        $JSON_RESULT['error']           = '';
                        $JSON_RESULT_TRACKING           = [];
                    /*</Variables> */
                    /*</Query>*/
                        $QueryUpdate =    ' UPDATE  usuarios
                                                SET     nombres              = "'.$nombre.'",
                                                        apellidos            = "'.$apellidos.'",                                              
                                                        fechaModificacion   = "'.$Date.'",
                                                        observacion         = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                                    WHERE idUsuario       = '.$id.';';
                    /*</Query>*/
                    
                    $this->open();
                        if (mysqli_query($this->Connection, $QueryUpdate)) {
                            /*<Respuesta>*/
                                $JSON_RESULT['message']             = "Good";  
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
                }else{
                    $JSON_RESULT['message']  = 'fail variable';  
                    $JSON_RESULT['name']     = $name;
                    $JSON_RESULT['id']       = $id;
                }
                return $JSON_RESULT;
            }
        /*</Method Update>*/ 
           
    }

    