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

                    $ID_VISITA                      = 0;
                    $ID_CONTACTOS                   = 0;
                /*</Variables> */

                /*<CONTACTO>*/
                    /*<Query> */
                        $querySelectVisita1 = 'SELECT 
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
                                                    con.instrucciones,
                                                    con.comentarioAgenda, 
                                                    vis.comentarios_Visitador,
                                                    con.entreCalle, 
                                                    (
                                                        SELECT pai.nombre FROM  paises pai WHERE pai.idPais  = con.idPais 
                                                    )AS Pais,
                                                    (
                                                        SELECT es.nombre FROM  Estados es WHERE es.idEstado   = con.idEstado  
                                                    )AS Estado,
                                                    (
                                                        SELECT men.nombre FROM  Municipios men WHERE men.idMunicipio   = con.idMunicipio  
                                                    )AS Municipio,
                                                    (
                                                        SELECT cam.tipoCampana FROM  campana cam WHERE cam.idCampana   = con.idCampana  
                                                    )AS tipoCampana

                                                    FROM visitas vis, contacto con 
                                                    WHERE   vis.idContacto  = con.idContacto AND
                                                            vis.estatus     = "SELECCIONADO" AND
                                                            vis.idUsuarioSV = '.$idUser.'
                                                            ORDER BY vis.idVisita DESC
                                                            LIMIT 1
                                                             ';
                    /*</Query> */
                    $JSON_RESULT['querySelectVisita1']     = $querySelectVisita1;
                    
                    $this->open();            
                        if ($resultQuery = mysqli_query($this->Connection, $querySelectVisita1)) {
                            if ($resultQuery->num_rows > 0) {
                                /*<Captura>*/
                                    while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                        $ID_VISITA      = $Rol['idVisita'];
                                        $ID_CONTACTOS   = $Rol['idContacto'];
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
                                return $JSON_RESULT;
                            /*</Respuesta>*/
                        }        
                    $this->closet();
                /*<CONTACTO>*/

                /*<EVIDENCIAS>*/
                    /*<Query> */
                        $querySelectVisita = 'SELECT 
                                                    ev.idEvidecias,                                                      
                                                    ev.idVisita,
                                                    ev.archivo,
                                                    ev.tipoArchivo
                                                FROM evidecias ev 
                                                WHERE 
                                                        ev.bstate   = 1 AND
                                                        ev.idVisita = '.$ID_VISITA;
                    /*</Query> */
                    $JSON_RESULT['querySelectVisita']     = $querySelectVisita;
                    
                    $this->open();            
                        if ($resultQueryVis = mysqli_query($this->Connection, $querySelectVisita)) {
                            if ($resultQueryVis->num_rows > 0) {
                                /*<Captura>*/
                                    while ($Visita = $resultQueryVis->fetch_array(MYSQLI_ASSOC)) {
                                        array_push($JSON_RESULT['evidencias'], $Visita);
                                    }
                                /*</Captura>*/
                            }else{
                                $JSON_RESULT['evidencias']     = [];
                            }
                            /*<Respuesta>*/
                                $JSON_RESULT['message'] = "Good";   
                            /*</Respuesta>*/
                        } else {
                            /*<Respuesta>*/
                                $JSON_RESULT['message']         = "Bad";                                
                                $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                                return $JSON_RESULT;
                            /*</Respuesta>*/
                        }        
                    $this->closet();
                /*<EVIDENCIAS>*/

                /*<COMENTARIOS>*/
                    /*<Query> */
                        $querySelectComentario = 'SELECT 
                                                    vis.fecha,
                                                    vis.idVisita,
                                                    vis.comentarios_Visitador
                                                FROM visitas vis 
                                                WHERE 
                                                    vis.idContacto = '.$ID_CONTACTOS;
                    /*</Query> */

                    $JSON_RESULT['querySelectComentario']     = $querySelectComentario;
                    
                    $this->open();            
                        if ($resultQueryCom = mysqli_query($this->Connection, $querySelectComentario)) {
                            if ($resultQueryCom->num_rows > 0) {
                                /*<Captura>*/
                                    while ($Com = $resultQueryCom->fetch_array(MYSQLI_ASSOC)) {
                                        array_push($JSON_RESULT['comentarios'], $Com);
                                    }
                                /*</Captura>*/
                            }else{
                                $JSON_RESULT['comentarios']     = [];
                            }
                            /*<Respuesta>*/
                                $JSON_RESULT['message'] = "Good";   
                            /*</Respuesta>*/
                        } else {
                            /*<Respuesta>*/
                                $JSON_RESULT['message']         = "Bad";                                
                                $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                                return $JSON_RESULT;
                            /*</Respuesta>*/
                        }        
                    $this->closet();
                /*<COMENTARIOS>*/


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
            public function finalizar($idVisita, $comentarios, $idContacto ){       
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

                /*<VISITA>*/
                    /*<Query>*/
                        $queryUpdate = '  UPDATE  visitas 
                                                SET     estatus                     = "VISITADO",
                                                        comentarios_Visitador       = "'.$comentarios.'",
                                                        fechaModificacion           = "'.$DATE.'",
                                                        observacion                 = " [ UPDATE '.$DATE.' ], [ idUser '.$idUser.' ] "
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
                /*</VISITA>*/ 

                /*<CONTACTO>*/
                    /*<Query>*/
                        $queryUpdateCon = '  UPDATE  contacto 
                                                SET     estatus                     = "VISITADO",
                                                        fechaModificacion           = "'.$DATE.'",
                                                        observacion                 = " [ UPDATE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                                WHERE idContacto  = '.$idContacto.';';
                    /*</Query>*/
                    $JSON_RESULT['queryUpdateCon']     = $queryUpdateCon;
                    $this->open();
                        if (mysqli_query($this->Connection, $queryUpdateCon)) {
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
                /*</CONTACTO>*/ 
                return $JSON_RESULT;
            }
        /*</Method finalizar>*/


        /*<Method agendar>*/
            public function agendar($idVisita, $comentarios, $idContacto ){       
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

                /*<VISITA>*/
                    /*<Query>*/
                        $queryUpdate = '  UPDATE  visitas 
                                                SET     estatus                     = "VISITADO",
                                                        comentarios_Visitador       = "AGENDADO: '.$comentarios.'",
                                                        fechaModificacion           = "'.$DATE.'",
                                                        observacion                 = " [ UPDATE '.$DATE.' ], [ idUser '.$idUser.' ] "
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
                /*</VISITA>*/ 

                /*<CONTACTO>*/
                    /*<Query>*/
                        $queryUpdateCon = '  UPDATE  contacto 
                                                SET     estatus                     = "POR HACER", 
                                                        comentarioAgenda            = "AGENDADO: '.$comentarios.'",
                                                        fechaModificacion           = "'.$DATE.'",
                                                        observacion                 = " [ UPDATE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                                WHERE idContacto  = '.$idContacto.';';
                    /*</Query>*/
                    $JSON_RESULT['queryUpdateCon']     = $queryUpdateCon;
                    $this->open();
                        if (mysqli_query($this->Connection, $queryUpdateCon)) {
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
                /*</CONTACTO>*/ 
                return $JSON_RESULT;
            }
        /*</Method agendar>*/

        /*<Method delete>*/
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
        /*</Method delete>*/
        
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
                    $JSON_RESULT['delete']          = [];
                    $DELETE                         = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['direccion']       = $direccion;
                    $JSON_RESULT['evidencias']      = [];
                    $JSON_RESULT['error'] = '';
                /*</Variables> */
                /*<ARCHIVO>*/
                    $DELETE = $this->deleteArchivo( $idVisita, $tipoArchivo  ); 
                    $JSON_RESULT['delete'] = $DELETE;
                    if($DELETE['message']  == 'Good'){
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
                                                        "'.$direccion.'",    
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
                    }else{
                        $JSON_RESULT['message']     = "Bad";       
                    }  
                /*</ARCHIVO>*/    
                /*<EVIDENCIAS>*/
                    /*<Query> */
                        $querySelectVisita = 'SELECT 
                                                    ev.idEvidecias,                                                      
                                                    ev.idVisita,
                                                    ev.archivo,
                                                    ev.tipoArchivo
                                                FROM evidecias ev 
                                                WHERE 
                                                        ev.bstate   = 1 AND
                                                        ev.idVisita = '.$idVisita;
                    /*</Query> */
                    $JSON_RESULT['querySelectVisita']     = $querySelectVisita;
                    
                    $this->open();            
                        if ($resultQueryVis = mysqli_query($this->Connection, $querySelectVisita)) {
                            if ($resultQueryVis->num_rows > 0) {
                                /*<Captura>*/
                                    while ($Visita = $resultQueryVis->fetch_array(MYSQLI_ASSOC)) {
                                        array_push($JSON_RESULT['evidencias'], $Visita);
                                    }
                                /*</Captura>*/
                            }else{
                                $JSON_RESULT['evidencias']     = [];
                            }
                            /*<Respuesta>*/
                                $JSON_RESULT['message'] = "Good";   
                            /*</Respuesta>*/
                        } else {
                            /*<Respuesta>*/
                                $JSON_RESULT['message']         = "Bad";                                
                                $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                                return $JSON_RESULT;
                            /*</Respuesta>*/
                        }        
                    $this->closet();
                /*<EVIDENCIAS>*/

                return $JSON_RESULT;
            }
        /*</Method Create>*/
      
        /*<Method deleteArchivo>*/
            public function deleteArchivo( $idVisita, $tipoArchivo  ){
                    /*<Variables> */

                    /*</datos>*/
                    
                        
                    /*<datos>*/
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error'] = '';
                /*</Variables> */
              
                    /*<Query>*/
                        $queryDelete = 'UPDATE evidecias 
                                                            SET bstate = 0
                                                            WHERE 
                                                                        idVisita        = '.$idVisita.'         AND
                                                                        tipoArchivo     = "'.$tipoArchivo.'";';
                    /*</Query>*/
                    $JSON_RESULT['queryDelete'] = $queryDelete;
                    $this->open();        
                        if ( mysqli_query( $this->Connection, $queryDelete)) {
                            $JSON_RESULT['message']     = "Good";                           
                        } else {
                            $JSON_RESULT['message']     = "Bad";                            
                            $JSON_RESULT['error']       = "Error: <br>" . mysqli_error($this->Connection);
                        }        
                    $this->closet();
                
                return $JSON_RESULT;
            }
        /*</Method deleteArchivo>*/

      
    }

    