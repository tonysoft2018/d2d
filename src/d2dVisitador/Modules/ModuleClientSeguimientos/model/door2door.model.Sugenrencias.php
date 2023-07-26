<?php

namespace  d2dVisitador\Modules\ModuleClientSugerenicas\Model\Sugerencias ;
    /*<Includes>*/
        include_once('../../ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    /*<use>*/
        use  d2dVisitador\Modules\ModulePugins\Conection\Conection as ConectionSugerencias;
    /*<use>*/

    class Sugerencias extends ConectionSugerencias{

        /*<Method construc>*/
            public function __construct(){
                // Cosntruct Father
                parent::__construct();
            }
        /*<Method construc>*/
    
        /*<Method SelectFull>*/
            public function selectFull(){
                /*<Variables> */
                    session_start();
                    $idUser                         = $_SESSION["idUser-door2door"];
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['evidencias']      = [];
                    $JSON_RESULT['comentarios']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                
                /*<Query> */
                    $querySelectVisita = 'SELECT 
                                                con.idContacto, 
                                                vis.idVisita,
                                                con.latitud, 
                                                con.longitud, 
                                                con.nombre, 
                                                con.calle, 
                                                con.telefono, 
                                                con.noInterior, 
                                                con.noExterior, 
                                                con.codigoPostal, 
                                                con.colonia, 
                                                (
                                                    SELECT pai.nombre FROM  paises pai WHERE pai.idPais  = con.idPais 
                                                )AS Pais,
                                                (
                                                    SELECT es.nombre FROM  Estados es WHERE es.idEstado   = con.idEstado  
                                                )AS Estado,
                                                (
                                                    SELECT men.nombre FROM  Municipios men WHERE men.idMunicipio   = con.idMunicipio  
                                                )AS Municipio
                                                FROM visitas vis, contacto con 
                                                WHERE   vis.idContacto  = con.idContacto AND
                                                        vis.estatus     = "SELECCIONADO" AND
                                                        vis.idUsuarioSV = '.$idUser.'
                                                        LIMIT 1';
                /*</Query> */
                $JSON_RESULT['querySelect']     = $querySelectVisita;
                
                $this->open();            
                    if ($resultQuery = mysqli_query($this->Connection, $querySelectVisita)) {
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
        /*<Method SelectFull>*/
    
        /*<Method cancelacion>*/
            public function cancelacion($idVisita){       

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

                /*<Visita>*/
                    /*<Query>*/
                        $queryUpdate = '  UPDATE  visitas 
                                                SET     estatus             = "CANCELADA",
                                                        fechaModificacion   = "'.$DATE.'",
                                                        observacion      = " [ DELETE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                                WHERE idVisita = '.$idVisita.';';
                    /*</Query>*/
                    $JSON_RESULT['queryUpdate']     = $queryUpdate;
                    $this->open();
                        if (mysqli_query($this->Connection, $queryUpdate)) {
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
                /*</Visita>*/

                /*<Contacto>*/
                    /*</Query>*/
                        $QueryUpdate2 =    ' UPDATE  contacto
                                                SET     estatus              = "PENDIENTE",                                              
                                                        fechaModificacion    = "'.$Date.'",
                                                        observacion          = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                                    WHERE idContacto         = 
                                                                                (
                                                                                    SELECT vis.idContacto FROM
                                                                                        visitas  vis
                                                                                    WHERE  
                                                                                    vis.idVisita = '.$idVisita.'
                                                                                );';
                    /*</Query>*/
                    $JSON_RESULT['QueryUpdate2']   = $QueryUpdate2;
                    $this->open();
                        if (mysqli_query($this->Connection, $QueryUpdate2)) {
                            /*<Respuesta>*/
                                $JSON_RESULT['message']             = "Good";  
                            /*<Respuesta>*/
                        } else {
                            /*<Respuesta>*/
                                $JSON_RESULT['message']             = "Bad";                                
                                $JSON_RESULT['Error']               = "Error: <br>" . mysqli_error($this->Connection);
                            /*</Respuesta>*/
                        }        
                    $this->closet(); 
                /*</Contacto>*/
                
                return $JSON_RESULT;
            }
        /*</Method cancelacion>*/
        
        /*<Method finalizar>*/
            public function finalizar($idVisita, $comentarios){       
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
                    $queryDeleteUpdate = '  UPDATE  visitas 
                                            SET     estatus             = "VISITADO",
                                                    comentarios         = "'.$comentarios.'",
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion      = " [ DELETE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                            WHERE idVisita = '.$idVisita.';';
                /*</Query>*/
                $JSON_RESULT['queryDeleteUpdate']     = $queryDeleteUpdate;
                $this->open();
                    if (mysqli_query($this->Connection, $queryDeleteUpdate)) {
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
        /*</Method finalizar>*/

        /*<Method finalizar>*/
            public function delete(
                                    $archivo,
                                    $idVisitas
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
                /*<Query>*/
                    $queryDeleteUpdate = '  UPDATE  evidecias 
                                            SET     bstate              = 0,
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion      = " [ DELETE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                            WHERE idVisita = '.$idVisitas.' AND  tipoArchivo = "'.$archivo.'";';
                /*</Query>*/
                $JSON_RESULT['queryDeleteUpdate']     = $queryDeleteUpdate;
                $this->open();
                    if (mysqli_query($this->Connection, $queryDeleteUpdate)) {
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
        /*</Method finalizar>*/
        
        /*<Method LogsGeolocalizacion>*/
            public function LogsGeolocalizacion( 
                                    $idVisitas,
                                    $lat,
                                    $lng
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
              
                    /*<Query>*/
                        $queryInsert = 'INSERT INTO seguimientoxvisita ( 
                                                idVisita, 
                                                fecha,
                                                lat,  
                                                lng,
                                                fechaCreacion, 
                                                fechaModificacion,
                                                observacion,
                                                bstate
                                                ) VALUES( 
                                                    "'.$idVisitas.'", 
                                                    "'.$DATE.'",
                                                    "'.$lat.'",    
                                                    "'.$lng.'",                                        

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
        /*</Method LogsGeolocalizacion>*/

        /*<Method Create>*/
            public function create( 
                                    $idVisita,
                                    $direccion,
                                    $tipoArchivo
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
                    $JSON_RESULT['direccion']       = $direccion;
                    $JSON_RESULT['error'] = '';
                /*</Variables> */
              
                    /*<Query>*/
                        $queryInsert = 'INSERT INTO evidecias ( 
                                                idVisita, 
                                                archivo,
                                                tipoArchivo,  
                                                fechaCreacion, 
                                                fechaModificacion,
                                                observacion,
                                                bstate
                                                ) VALUES( 
                                                    "'.$idVisita.'", 
                                                    "'.$$direccion.'",    
                                                    "'.$tipoArchivo.'",                                        

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
        /*</Method Create>*/

      
    }

    