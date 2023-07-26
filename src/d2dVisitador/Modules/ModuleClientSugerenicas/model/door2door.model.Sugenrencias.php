<?php

namespace  d2dVisitador\Modules\ModuleClientSugerenicas\Model\Sugerencias ;
    /*<Includes>*/
        include_once('../../ModulePugins/door2door.Cofiguration.Conection.php');
        include_once('../../ModulePugins/door2door.Function.php');
    /*<Includes>*/
    /*<use>*/
        use d2dVisitador\Modules\ModulePugins\Conection\Conection as ConectionSugerencias;
        use d2dVisitador\Modules\ModulePugins\Functions\Functions as FunctionsSugerencias;
    /*<use>*/

    class Sugerencias extends ConectionSugerencias{

        /*<Method construc>*/
            public function __construct(){
                // Cosntruct Father
                parent::__construct();
            }
        /*<Method construc>*/
    
        /*<Method SelectFull>*/
            public function selectFull($latUser, $lgnUser){
                /*<Variables> */
                    session_start();
                    $DATE                       = date('Y-m-d h:i:s');
                    $idUser                     = $_SESSION["idUser-door2door"];
                    $JSON_RESULT                        = [];
                    $JSON_RESULT['information']         = [];
                    $JSON_RESULT['information_visita']  = [];
                    $JSON_RESULT['message']             = '';
                    $JSON_RESULT['error']               = '';
                    $Object = new FunctionsSugerencias(); 
                /*</Variables> */

                /*<Query> */
                    $querySelect = ' SELECT 
                                                con.idContacto,
                                                con.latitud,
                                                con.longitud,

                                                con.calle,
                                                con.noInterior,
                                                con.noExterior,

                                                (
                                                    SELECT cam.tipoCampana 
                                                            FROM campana cam 
                                                            WHERE cam.idCampana = con.idCampana
                                                )AS tipoVisita
                                                
                                            FROM contacto con, campana cam 
                                                WHERE 
                                                        cam.idCampana   = con.idCampana AND
                                                        cam.estatus     = "ABIERTA"     AND
                                                        con.latitud     != 0            AND
                                                        con.longitud    != 0            AND
                                                        con.estatus     = "PENDIENTE"   AND 
                                                        (
                                                            IFNULL(
                                                                    (
                                                                        SELECT vis.idContacto  FROM visitas  vis
                                                                        WHERE  
                                                                                vis.idContacto  = con.idContacto    AND
                                                                                vis.estatus     != "CANCELADA"      AND
                                                                                vis.estatus     != "ACEPTADOS"      AND  
                                                                                vis.estatus     != "RECHAZADA"      AND  
                                                                                vis.estatus     != "PAGADA"       
                                                                                LIMIT 1
                                                                    ),0 ) 
                                                        ) = 0                          AND
                                                        con.bstate      = 1;';
                /*</Query> */
                $JSON_RESULT['querySelect']     = $querySelect;
                
                $this->open();            
                    if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                        if ($resultQuery->num_rows > 0) {
                            /*<Captura>*/
                                while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {

                                    $Rol['distancia'] = $Object->distanciaEntreDosPuntos($latUser, $lgnUser, $Rol['latitud'], $Rol['longitud']);
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

                $querySelectVisita = 'SELECT * FROM visitas 
                                                            WHERE   estatus     = "SELECCIONADO" AND
                                                                    idUsuarioSV = '.$idUser.'
                                                                    LIMIT 1';
                
                $JSON_RESULT['querySelectVisita']     = $querySelectVisita;
                
                $this->open();            
                    if ($resultQuery = mysqli_query($this->Connection, $querySelectVisita)) {
                        if ($resultQuery->num_rows > 0) {
                            /*<Captura>*/
                                while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                    array_push($JSON_RESULT['information_visita'], $Rol);
                                }
                            /*</Captura>*/
                        }else{
                            $JSON_RESULT['information_visita']     = [];
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
    
        /*<Method Delete>*/
            public function delete($id){       
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
                    $queryDeleteUpdate = '  UPDATE  tipoVehiculo 
                                            SET     bstate              = 0,
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion      = " [ DELETE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                            WHERE idTVehiculo = '.$id.';';
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
        /*</Method Delete>*/
        
        /*<Method Create>*/
            public function create( 
                                    $nombre,
                                    $descripcion
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
                if($nombre != ''){
                    /*<Query>*/
                        $queryInsert = 'INSERT INTO tipoVehiculo ( 
                                                nombre, 
                                                descripcion,  
                                                fechaCreacion, 
                                                fechaModificacion,
                                                observacion,
                                                bstate
                                                ) VALUES( 
                                                    "'.$nombre.'", 
                                                    "'.$descripcion.'",                                           

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

        /*<Method Update>*/
            public function Selected($idContacto ){
                $JSON_RESULT = [];

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
                        $QueryUpdate =    ' UPDATE  contacto
                                                SET     estatus              = "SELECCIONADO",                                              
                                                        fechaModificacion   = "'.$Date.'",
                                                        observacion         = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                                    WHERE idContacto       = '.$idContacto.';';
                    /*</Query>*/
                    $JSON_RESULT['QueryDeleteUpdate']   = $QueryUpdate;
                    $this->open();
                        if (mysqli_query($this->Connection, $QueryUpdate)) {
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
                return $JSON_RESULT;
            }
        /*</Method Update>*/ 

        /*<RESPUESTA_GENERAR_FOLIO>*/
            /*<RESPUESTA_GENERAR_FOLIO>*/
                public function RESPUESTA_GENERAR_FOLIO(){
                    $Folio = 0;
            
                    // Capturas el folio
                    $Query = 'SELECT COUNT(idVisita) AS Folio FROM visitas;';
                
            
                    $this->open();       
                        /*Consultar informacion*/
                        if ($result = mysqli_query($this->Connection, $Query)) {
                            while($r = $result->fetch_array(MYSQLI_ASSOC)){
                                $Folio = $r['Folio'];
                            }
                        } else { $this->closet(); return 0; }                   
                    $this->closet();      
                    $FolioNuevo = 0;  
                    do{
                        $Folio = $Folio +1;  
                        $FolioNuevo = $this->ValidarFolio($Folio);            
                    } while ($FolioNuevo == 0); 
                    return $Folio;     
                } 
            /*</RESPUESTA_GENERAR_FOLIO>*/

            /*<ValidarFolio>*/
                public function ValidarFolio($Folio){
                    $Query = 'SELECT COUNT(idVisita) AS Coteo FROM visitas WHERE folio = '.$Folio;
                    $this->open();       
                        /*Consultar informacion*/
                        if ($result = mysqli_query($this->Connection, $Query)) {
                            while($r = $result->fetch_array(MYSQLI_ASSOC)){
                                $RespuestaCoteo = $r['Coteo'];
                            }
                            if($RespuestaCoteo == 0){
                                $this->closet(); 
                                return $Folio;
                            }else{
                                $this->closet(); 
                                return 0;
                            }
                        }  else { $this->closet(); return 0; }  
                    $this->closet();   
                    return 0;
                }
            /*</ValidarFolio>*/
        /*</RESPUESTA_GENERAR_FOLIO>*/

        /*<RESPUESTA_CREAR_VISITA>*/
                public function RESPUESTA_CREAR_VISITA($idContacto,$Folio){
                    /*<VARIABLES>*/

                        session_start();
                        $DATE                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];


                        $JSON_RESULT                = [];
                        $JSON_RESULT_USUARIO        = [];
                        $JSON_RESULT_CONTACTOS      = [];
                        $JSON_RESULT_VISITAS        = [];
                        $JSON_RESULT_COMICION       = [];

                        /*<USUARIOS>*/
                            $USUARIOS_ID_TIPO_VEHICULO  = 0;
                        /*</USUARIOS>*/                 

                        /*<CONTACTO>*/
                            $CONTACTO_ID_CONTACTO           = $idContacto;
                            $CONTACTO_ID_CAMPANA            = '';
                            $CONTACTO_ID_USUARIO_CLIENTE    = '';
                            $CONTACTO_CAMPANA_TIPO          = '';

                            $FOLIO                          = $Folio;
                        /*</CONTACTO>*/

                        /*<COMICION>*/
                            $COMICION_ID_COMICION           = 0;
                        /*</COMICION>*/
                      
                    /*</VARIABLES>*/

                    /*<CONSULTAR USUARIO>*/
                        /*<Query> */
                            $queryUsuario = 'SELECT idTVehiculo FROM usuarios WHERE idUsuario = '.$idUser;
                        /*</Query> */

                        $JSON_RESULT_USUARIO['queryUsuario']     = $queryUsuario;                       
                        
                        $this->open();            
                            if ($resultQuery = mysqli_query($this->Connection, $queryUsuario)) {
                                if ($resultQuery->num_rows > 0) {
                                    /*<Captura>*/
                                        while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                            $USUARIOS_ID_TIPO_VEHICULO = $Rol['idTVehiculo'];       
                                        }
                                    /*</Captura>*/
                                }else{
                                    $JSON_RESULT['message']             = 'bad';
                                    $JSON_RESULT['JSON_RESULT_USUARIO'] = $JSON_RESULT_USUARIO;
                                    return $JSON_RESULT;
                                }                                
                            } else {
                                /*<Respuesta>*/
                                    $JSON_RESULT_USUARIO['message']         = "Bad";                            
                                    $JSON_RESULT_USUARIO['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                                    $JSON_RESULT['message']                 = 'bad';
                                    $JSON_RESULT['JSON_RESULT_USUARIO']     = $JSON_RESULT_USUARIO;
                                    return $JSON_RESULT;
                                /*</Respuesta>*/
                            }        
                        $this->closet();

                        $JSON_RESULT['JSON_RESULT_USUARIO'] = $JSON_RESULT_USUARIO;
                    /*</CONSULTAR USUARIO>*/

                    /*<CONSULTAR CONTACTO>*/
                       /*<Query> */
                       $queryContacto = 'SELECT 
                                                con.idCampana,
                                                cam.idUsuario,
                                                cam.tipoCampana


                                                FROM contacto con, campana cam
                                            WHERE  
                                                    con.idCampana  = cam.idCampana   AND 
                                                    con.idContacto = '.$idContacto;
                       /*</Query> */

                       $JSON_RESULT_CONTACTOS['queryContacto']     = $queryContacto;                       
                       
                       $this->open();            
                           if ($resultQuery = mysqli_query($this->Connection, $queryContacto)) {
                               if ($resultQuery->num_rows > 0) {
                                   /*<Captura>*/
                                       while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                          
                                           $CONTACTO_ID_CAMPANA         = $Rol['idCampana'];       
                                           $CONTACTO_ID_USUARIO_CLIENTE = $Rol['idUsuario'];  
                                           $CONTACTO_CAMPANA_TIPO       = $Rol['tipoCampana'];
                                       }
                                   /*</Captura>*/
                               }else{
                                   $JSON_RESULT['message']             = 'bad';
                                   $JSON_RESULT['JSON_RESULT_CONTACTOS'] = $JSON_RESULT_CONTACTOS;
                                   return $JSON_RESULT;
                               }                                
                           } else {
                               /*<Respuesta>*/
                                   $JSON_RESULT_CONTACTOS['message']       = "Bad";                            
                                   $JSON_RESULT_CONTACTOS['Error']         = "Error: <br>" . mysqli_error($this->Connection);
                                   $JSON_RESULT['message']                 = 'bad';
                                   $JSON_RESULT['JSON_RESULT_USUARIO']     = $JSON_RESULT_CONTACTOS;
                                   return $JSON_RESULT;
                               /*</Respuesta>*/
                           }        
                       $this->closet();
                       
                       $JSON_RESULT['JSON_RESULT_USUARIO'] = $JSON_RESULT_USUARIO;
                    /*</CONSULTAR CONTACTO>*/

                    /*<CONSULTAR CONTACTO>*/
                       /*<Query> */
                            $queryComicion = 'SELECT idCComicion FROM coneptoComicion 
                                                WHERE tipo = "'.$CONTACTO_CAMPANA_TIPO.'" LIMIT 1';
                       /*</Query> */

                       $JSON_RESULT_COMICION['queryComicion']     = $queryComicion;                       
                       
                       $this->open();            
                           if ($resultQuery = mysqli_query($this->Connection, $queryComicion)) {
                               if ($resultQuery->num_rows > 0) {
                                   /*<Captura>*/
                                       while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {                                          
                                           $COMICION_ID_COMICION         = $Rol['idCComicion'];     
                                       }
                                   /*</Captura>*/
                               }else{
                                   $JSON_RESULT['message']              = 'bad';
                                   $JSON_RESULT['JSON_RESULT_COMICION'] = $JSON_RESULT_COMICION;
                                   return $JSON_RESULT;
                               }                                
                           } else {
                               /*<Respuesta>*/
                                   $JSON_RESULT_COMICION['message']       = "Bad";                            
                                   $JSON_RESULT_COMICION['Error']         = "Error: <br>" . mysqli_error($this->Connection);
                                   $JSON_RESULT['message']                 = 'bad';
                                   $JSON_RESULT['JSON_RESULT_USUARIO']     = $JSON_RESULT_COMICION;
                                   return $JSON_RESULT;
                               /*</Respuesta>*/
                           }        
                       $this->closet();
                       
                       $JSON_RESULT['JSON_RESULT_USUARIO'] = $JSON_RESULT_USUARIO;
                    /*</CONSULTAR CONTACTO>*/


                    /*<INSERTAR VISITA>*/
                        $queryInsert = 'INSERT INTO visitas ( 
                                                idUsuarioSV,
                                                idUsuarioSC, 
                                                idContacto,  
                                                idCampana,  
                                                folio,                                                  
                                                fecha,   
                                                idCComicion,                                                   
                                                idTVehiculo,
                                                estatus,

                                                fechaCreacion, 
                                                fechaModificacion,
                                                observacion,
                                                bstate
                                                ) VALUES( 
                                                    "'.$idUser.'",
                                                    "'.$CONTACTO_ID_USUARIO_CLIENTE.'", 
                                                    "'.$CONTACTO_ID_CONTACTO.'", 
                                                    "'.$CONTACTO_ID_CAMPANA.'", 
                                                    "'.$FOLIO.'", 
                                                    "'.$DATE.'", 
                                                    "'.$COMICION_ID_COMICION.'",
                                                    "'.$USUARIOS_ID_TIPO_VEHICULO.'",  
                                                    "SELECCIONADO",

                                                    "'.$DATE.'",
                                                    "'.$DATE.'",
                                                    " [ INSERT '.$DATE.' ], [ idUser '.$idUser.' ] ",
                                                    1
                                                );';
                        /*</Query>*/

                        $JSON_RESULT_VISITAS['queryInsert'] = $queryInsert;

                        $this->open();        
                            if ( mysqli_query( $this->Connection, $queryInsert)) {
                                $JSON_RESULT_VISITAS['message']         = "Good";  
                            } else {
                                $JSON_RESULT_VISITAS['message']         = "Bad";
                                $JSON_RESULT_VISITAS['error']           = "Error: <br>" . mysqli_error($this->Connection);
                                $JSON_RESULT['message']                 = 'bad';
                                $JSON_RESULT['JSON_RESULT_USUARIO']     = $JSON_RESULT_VISITAS;
                                return $JSON_RESULT;
                            }        
                        $this->closet();
                        $JSON_RESULT['JSON_RESULT_VISITAS']     = $JSON_RESULT_VISITAS;
                        $JSON_RESULT['message']         = 'Good';
                        return $JSON_RESULT;

                    /*</INSERTAR VISITA>*/
                }
        /*</RESPUESTA_CREAR_VISITA>*/

        
    }

    