<?php

namespace  door2door\Modules\ModulePerfilesSocio\ModuleCampaign\Model\Campanas;
    /*<Includes>*/
        include_once('../../../ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    /*<use>*/
        use  door2door\Modules\ModulePugins\Conection\Conection as ConectionCampanas;
    /*<use>*/

    class Campanas extends ConectionCampanas{

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
                    $querySelect = 'SELECT 
                                            cam.idCampana,
                                            cam.folio,
                                            cam.fecha,
                                            cam.nombre,
                                            cam.descripcion,
                                            cam.tipoCampana,
                                            cam.descripcionRecoleccion,
                                            cam.estatus,
                                            (
                                                SELECT usu.nombres FROM usuarios usu WHERE usu.idUsuario = cam.idUsuario
                                            )AS NombreSocio,
                                                (
                                                SELECT usu.nombres FROM usuarios usu WHERE usu.idUsuario = cam.idUsuario
                                            )AS ApellidoSocio
                                        FROM campana cam WHERE cam.bstate = 1 AND cam.idUsuario = '.$idUsuario.'; ';
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
        /*<Method SelectFull>*/
    

        /*<Method selectFullVisitas>*/
            public function selectFullVisitas($idCampana){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */

                /*<Query> */
                    $querySelect = 'SELECT 
                                                con.nombre,
                                                con.telefono,
                                                con.calle,
                                                con.email,
                                                con.noInterior,
                                                con.noExterior,
                                                con.codigoPostal,
                                                con.colonia,
                                                con.deuda,
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
                                                )AS fecha,
                                                (
                                                    IFNULL( 
                                                        (
                                                            SELECT (
                                                                SELECT usu.nombres FROM usuarios usu WHERE usu.idUsuario = vis.idUsuarioSV
                                                            ) FROM visitas vis
                                                                    WHERE vis.idContacto = con.idContacto 
                                                                        ORDER BY vis.idVisita DESC limit 1
                                                        ), "NO TIENE"
                                                    )
                                                )AS SocioVisitador
                                            FROM contacto con  
                                            WHERE 
                                                con.idCampana = '.$idCampana.' AND
                                                con.bstate = 1 ';
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
        /*<Method selectFullVisitas>*/


        
        /*<Method Create>*/
            public function RESPUETA_INSERTAR_CAMPANA( 
                                                        $folio,    
                                                        $nombre,
                                                        $descripcion,
                                                        $tipoCampana,
                                                        $descripcionRecoleccion
                                                        
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
                        $queryInsert = 'INSERT INTO campana ( 
                                                idUsuario,
                                                folio, 
                                                fecha,  
                                                nombre,  
                                                descripcion,                                                  
                                                tipoCampana,   
                                                descripcionRecoleccion,                                                   
                                                estatus,

                                                fechaCreacion, 
                                                fechaModificacion,
                                                observacion,
                                                bstate
                                                ) VALUES( 
                                                    "'.$idUser.'",
                                                    "'.$folio.'", 
                                                    "'.$DATE.'", 
                                                    "'.$nombre.'", 
                                                    "'.$descripcion.'", 
                                                    "'.$tipoCampana.'", 
                                                    "'.$descripcionRecoleccion.'", 
                                                    "BORRADOR",

                                                    "'.$DATE.'",
                                                    "'.$DATE.'",
                                                    " [ INSERT '.$DATE.' ], [ idUser '.$idUser.' ] ",
                                                    1
                                                );';
                    /*</Query>*/
                    $this->open();        
                        if ( mysqli_query( $this->Connection, $queryInsert)) {
                            $JSON_RESULT['message']     = "Good";
                            $JSON_RESULT['queryInsert'] = $queryInsert;
                            $this->tracking($idUser,'usuarios','door2door','INSERT','');
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
                    $queryDeleteUpdate = '  UPDATE  campana 
                                            SET     bstate              = 0,
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion      = " [ DELETE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                            WHERE idCampana = '.$id.';';
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

         /*<Method Update>*/
            public function Update(
                                        $id,
                                        $nombre,
                                        $descripcion,
                                        $tipoCampana,
                                        $descripcionRecoleccion

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
                    /*</Variables> */
                    /*</Query>*/
                        $QueryUpdate =    'UPDATE  campana
                                      SET    nombre                 = "'.$nombre.'",
                                             descripcion            = "'.$descripcion.'",   
                                             tipoCampana            = "'.$tipoCampana.'",
                                             descripcionRecoleccion = "'.$descripcionRecoleccion.'",    

                                             fechaModificacion      = "'.$Date.'",
                                             observacion            = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                        WHERE idCampana              = '.$id.';';
                    /*</Query>*/
                
                    if(true){
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

        

          /*<Method abrir>*/
            public function grabar( $id ){
                $JSON_RESULT = [];
                /*<Variables> */
                        /*</datos>*/
                        session_start();
                        $Date                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];
                    /*<datos>*/
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                /*</Query>*/
                    $QueryUpdate =    'UPDATE  campana
                                                    SET   
                                                            estatus = "ABIERTA",
                                                            fechaModificacion      = "'.$Date.'",
                                                            observacion            = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                                        WHERE idCampana              = '.$id.';';
                /*</Query>*/   
                $JSON_RESULT['QueryUpdate']         = $QueryUpdate;           
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
                return $JSON_RESULT;
            }
        /*</Method abrir>*/ 

        /*<Method abrir>*/
            public function abrir( $id ){
                $JSON_RESULT = [];
                /*<Variables> */
                        /*</datos>*/
                        session_start();
                        $Date                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];
                    /*<datos>*/
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                /*</Query>*/
                    $QueryUpdate =    'UPDATE  campana
                                                    SET   
                                                            estatus = "ABIERTA",
                                                            fechaModificacion      = "'.$Date.'",
                                                            observacion            = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                                        WHERE idCampana              = '.$id.';';
                /*</Query>*/   
                $JSON_RESULT['QueryUpdate']         = $QueryUpdate;           
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
                return $JSON_RESULT;
            }
        /*</Method abrir>*/ 

        /*<Method pausar>*/
            public function puasar( $id ){
                $JSON_RESULT = [];
                /*<Variables> */
                        /*</datos>*/
                        session_start();
                        $Date                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];
                    /*<datos>*/
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                /*</Query>*/
                    $QueryUpdate =    'UPDATE  campana
                                                    SET   
                                                            estatus = "PAUSADA",
                                                            fechaModificacion      = "'.$Date.'",
                                                            observacion            = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                                        WHERE idCampana              = '.$id.';';
                /*</Query>*/   
                $JSON_RESULT['QueryUpdate']         = $QueryUpdate;           
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
                return $JSON_RESULT;
            }
        /*</Method pausar>*/

        /*<Method reaunada>*/
            public function reanudar( $id ){
                $JSON_RESULT = [];
                /*<Variables> */
                        /*</datos>*/
                        session_start();
                        $Date                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];
                    /*<datos>*/
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                /*</Query>*/
                    $QueryUpdate =    'UPDATE  campana
                                                    SET   
                                                            estatus = "ABIERTA",
                                                            fechaModificacion      = "'.$Date.'",
                                                            observacion            = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                                        WHERE idCampana              = '.$id.';';
                /*</Query>*/   
                $JSON_RESULT['QueryUpdate']         = $QueryUpdate;           
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
                return $JSON_RESULT;
            }
        /*</Method reaunada>*/
        
        /*<RESPUETA_GENERAR_FOLIO_SOLICITUD>*/

            /*<RESPUETA_GENERAR_FOLIO_SOLICITUD>*/
                public function RESPUETA_GENERAR_FOLIO_SOLICITUD(){
                    $Folio = 0;
            
                    // Capturas el folio
                    $Query = 'SELECT COUNT(idCampana) AS Folio FROM campana;';
                
            
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
            /*</RESPUETA_GENERAR_FOLIO_SOLICITUD>*/

            /*<ValidarFolio>*/
                public function ValidarFolio($Folio){
                    $Query = 'SELECT COUNT(idCampana) AS Coteo FROM campana WHERE folio = '.$Folio;
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

        /*</RESPUETA_GENERAR_FOLIO_SOLICITUD>*/
    

       

        
        
        
    }

    