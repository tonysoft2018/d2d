<?php

namespace    door2door\Modules\ModuleCommission\Model\Commission;
    /*<Includes>*/
        include_once('../../ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    /*<use>*/
        use  door2door\Modules\ModulePugins\Conection\Conection as ConectionCommission;
    /*<use>*/

    class Commission extends ConectionCommission{

        /*<Method construc>*/
            public function __construct(){
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
                    $querySelect = '    SELECT *
                                                
                                           FROM corte_enca ce 
                                                WHERE  ce.bstate  = 1 ; ';
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

        /*<Method selectFullSearch>*/
            public function selectFullSearch(
                                                $fechaInicio, 
                                                $fechaFinal, 
                                                $folio, 
                                                $estatus
                                            ){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';

                    $QueryExtra  = '';
                   
                /*</Variables> */

                /*<Validamos Que tipo de usuario es>*/

                if($folio  != '') {
                    $QueryExtra .= ' AND ce.folio = '.$folio.' ';
                }
                if($estatus  != '') {
                    $QueryExtra .= ' AND ce.estatus = "'.$estatus.'" ';
                }
               
            /*</Validamos Que tipo de usuario es>*/

                /*<Query> */
                    $querySelect = '    SELECT *                                                
                                           FROM corte_enca ce 
                                                WHERE   ce.bstate  = 1   
                                                        '. $QueryExtra.'  AND
                                                        ce.fecha  >= "'.$fechaInicio.' 00:00:00" AND ce.fecha  <= "'.$fechaFinal.' 00:00:00" 
                                                        ;
                                                ; ';
                    $JSON_RESULT['querySelect']     = $querySelect;
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
        /*<Method selectFullSearch>*/



        

        /*<Method selectFullVisitsItems>*/
            public function selectFullVisitsItems($idCorte){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                /*<Query> */
                    $querySelect = ' SELECT (
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
                                            ) AS Comicion,
                                            (
                                                SELECT co.cantidad  FROM coneptoComicion co  WHERE co.idCComicion  =  (
                                                                                                                            SELECT vs.idCComicion 
                                                                                                                                FROM visitas vs 
                                                                                                                                WHERE
                                                                                                                                vs.idVisita = cd.idVista
                                                                                                                        )
                                            ) AS cantidad
                                                FROM corte_deta cd 
                                                WHERE 
                                                        cd.bstate  = 1 AND 
                                                        cd.idCorte = '.$idCorte.'
                                                        ; ';
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
        /*<Method selectFullVisitsItems>*/



        /*<Method selectFullVisitsItemsAceptar>*/
            public function selectFullVisitsItemsAceptar($idCorte){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                /*<Query> */
                    $querySelect = ' SELECT 0 AS Seleccion,
                                            (
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
                                            ) AS Comicion,
                                            (
                                                SELECT co.cantidad  FROM coneptoComicion co  WHERE co.idCComicion  =  (
                                                                                                                            SELECT vs.idCComicion 
                                                                                                                                FROM visitas vs 
                                                                                                                                WHERE
                                                                                                                                vs.idVisita = cd.idVista
                                                                                                                        )
                                            ) AS cantidad,
                                            cd.idCorteD,
                                            cd.idVista
                                                FROM corte_deta cd 
                                                WHERE 
                                                        cd.bstate  = 1 AND 
                                                        cd.idCorte = '.$idCorte.'
                                                        ; ';
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
        /*<Method selectFullVisitsItemsAceptar>*/

        /*<Method selectFullVisitsItemsOrdenPago>*/
            public function selectFullVisitsItemsOrdenPago($idCorte){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                /*<Query> */
                    $querySelect = ' SELECT 
                                            (
                                                    SELECT usu.nombres FROM usuarios usu WHERE usu.idUsuario = (
                                                                                                                    SELECT vs.idUsuarioSV 
                                                                                                                        FROM visitas vs 
                                                                                                                        WHERE
                                                                                                                        vs.idVisita = cd.idVista
                                                                                                                )
                                            )AS socio,
                                            (
                                                SELECT co.comision  FROM coneptoComicion co  WHERE co.idCComicion  =    (
                                                                                                                            SELECT vs.idCComicion 
                                                                                                                                FROM visitas vs 
                                                                                                                                WHERE
                                                                                                                                vs.idVisita = cd.idVista
                                                                                                                        )
                                            ) AS Comicion,
                                            (
                                                    SELECT usu.numeroCuenta FROM usuarios usu WHERE usu.idUsuario = (
                                                                                                                    SELECT vs.idUsuarioSV 
                                                                                                                        FROM visitas vs 
                                                                                                                        WHERE
                                                                                                                        vs.idVisita = cd.idVista
                                                                                                                )
                                            )AS numeroCuenta
                                                FROM corte_deta cd 
                                                WHERE 
                                                        cd.bstate  = 1 AND 
                                                        cd.idCorte = '.$idCorte.'
                                                        ; ';
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
        /*<Method selectFullVisitsItemsOrdenPago>*/
        
    
        /*<Method Cancelado>*/
            public function cancelado($id){       
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
                    $queryDeleteUpdate = '  UPDATE  corte_enca 
                                            SET     estatus             = "CANCELADO",
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion      = " [ DELETE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                            WHERE idCorte = '.$id.';';
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
        /*</Method Cancelado>*/


        /*<RESPUESTA_FOLIO>*/
            public function RESPUESTA_FOLIO(){

                $Folio = 0;        
                $Query = 'SELECT COUNT(idCorte) AS Folio FROM corte_enca;';            
        
                $this->open();       
                    if ($result = mysqli_query($this->Connection, $Query)) {
                        while($r = $result->fetch_array(MYSQLI_ASSOC)){
                            $Folio = $r['Folio'];
                        }
                    } else { $this->closet(); return 0; }                   
                $this->closet();      

                $FolioNuevo = 0;  

                do{
                    $Folio      = $Folio +1;  
                    $FolioNuevo = $this->ValidarFolio($Folio);            
                } while ($FolioNuevo == 0); 

                return $Folio;     
            } 
        
            public function ValidarFolio($Folio){
                $Query = 'SELECT COUNT(idCorte) AS Coteo FROM corte_enca WHERE folio = '.$Folio;
                $this->open();    
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
        /*<RESPUESTA_FOLIO>*/

        /*<RESPUESTA_INSERTA_ENCAVEZADO_CORTES>*/
            public function RESPUESTA_INSERTA_ENCAVEZADO_CORTES($folio){
                /*</datos>*/
                    session_start();
                    $DATE                       = date('Y-m-d h:i:s');
                    $idUser                     = $_SESSION["idUser-door2door"];
                /*<datos>*/
                $JSON_RESULT                    = [];
                $JSON_RESULT['information']     = [];
                $JSON_RESULT['message']         = '';
                $JSON_RESULT['error'] = '';
                  /*<Query>*/
                        $queryInsert = 'INSERT INTO corte_enca ( 
                                                folio,
                                                fecha, 
                                                noVisitas,  
                                                noProcesados, 
                                                noAceptados,    
                                                noPagados,                                                 
                                                
                                                fechaRevicion,     
                                                fechaPago,    
                                                totalComiciones,                                          
                                                estatus,
                                                idCreador,

                                                fechaCreacion, 
                                                fechaModificacion,
                                                observacion,
                                                bstate
                                                ) VALUES( 
                                                    "'.$folio.'",
                                                    "'.$DATE.'", 
                                                    0, 
                                                    0, 
                                                    0,  
                                                    0, 
                                                    "0000-00-00 00:00:00", 
                                                    "0000-00-00 00:00:00", 
                                                    0, 
                                                    "PENDIENTE",
                                                    "'.$idUser.'",

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

            }
        /*</RESPUESTA_INSERTA_ENCAVEZADO_CORTES>*/

        /*<RESPUESTA_CONSEGIR_ID_CORTES>*/
            public function RESPUESTA_CONSEGIR_ID_CORTES($FOLIO){
                $JSON_RESPUESTA = [];
                $Query = 'SELECT idCorte FROM corte_enca WHERE folio = '.$FOLIO;   

                $JSON_RESPUESTA['Query'] = $Query;
                $this->open();        
                    if ($result = mysqli_query($this->Connection, $Query)) {

                        $JSON_RESPUESTA['message'] = 'Good';

                        while($r = $result->fetch_array(MYSQLI_ASSOC)){
                            $JSON_RESPUESTA['ID_CORTES'] = $r['idCorte'];
                        }

                    } else { 
                        $JSON_RESPUESTA['message'] = 'Bad';
                    }                   
                $this->closet();   
                
                return $JSON_RESPUESTA;     
            }
        /*</RESPUESTA_CONSEGIR_ID_CORTES>*/

        /*<RESPUESTA_INSERTAR_DETALLE_CORTES_UNO>*/
            public function RESPUESTA_INSERTAR_DETALLE_CORTES_UNO(
                                                                    $idCorte,
                                                                    $idVista,
                                                                    $idComision,
                                                                    $idContacto
                                                                ){
                /*</datos>*/
                    session_start();
                    $DATE                       = date('Y-m-d h:i:s');
                    $idUser                     = $_SESSION["idUser-door2door"];
                /*<datos>*/
                $JSON_RESULT                    = [];
                $JSON_RESULT['information']     = [];
                $JSON_RESULT['message']         = '';
                $JSON_RESULT['error'] = '';
                  /*<Query>*/
                        $queryInsert = 'INSERT INTO corte_deta ( 
                                                idCorte,
                                                idVista, 
                                                idComision,  
                                                idContacto,    
                                                estatus,                                            

                                                fechaCreacion, 
                                                fechaModificacion,
                                                observacion,
                                                bstate
                                                ) VALUES( 
                                                    "'.$idCorte.'",
                                                    "'.$idVista.'", 
                                                    "'.$idComision.'", 
                                                    "'.$idContacto.'", 
                                                    "PROCESADO",
                                                 
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

                    /*</Query>*/
                        $QueryUpdate =    ' UPDATE  visitas
                                                SET     estatus             = "PROCESADO",  
                                                        fechaModificacion   = "'.$DATE.'",
                                                        observacion         = " [ UPFATE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                                    WHERE idVisita       = '.$idVista.';';
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
                    return $JSON_RESULT;         
            }
        /*</RESPUESTA_INSERTAR_DETALLE_CORTES_UNO>*/

        /*<RESPUESTA_ELIMINACION_CORTE>*/
            public function RESPUESTA_ELIMINACION_CORTE($ID_CORTE){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                /*<Query> */
                    $queryDelete= 'DELETE FROM corte_enca WHERE idCorte = '.$ID_CORTE.'; ';
                /*</Query> */
                
                $this->open();            
                    if ($resultQuery = mysqli_query($this->Connection, $queryDelete)) {
                        $JSON_RESULT['message'] = "Good";   
                        $JSON_RESULT['queryDelete']     = $queryDelete;
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";
                            $JSON_RESULT['queryDelete']     = $queryDelete;
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this->closet();
                return $JSON_RESULT;
            }
        /*<RESPUESTA_ELIMINACION_CORTE>*/
        
        

        /*<RESPUESTA_UPDATE_DETALLE_CORTES_UNO>*/
            public function RESPUESTA_UPDATE_DETALLE_CORTES_UNO($idCorte, $idVisita){

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

                /*<VALIDAR DETALLES>*/
                    /*<Query>*/
                        $QueryUpdate =    ' UPDATE  corte_deta
                            SET     estatus             = "ACEPTADOS",                                      
                                    fechaModificacion   = "'.$Date.'",
                                    observacion         = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                WHERE idCorte       = '.$idCorte.';';        
                        /*</Query>*/
                    
                    $this->open();            
                        if ($resultQuery = mysqli_query($this->Connection, $QueryUpdate)) {
                            $JSON_RESULT['message']         = "Good";
                            $JSON_RESULT['QueryUpdate']     = $QueryUpdate;                
                        } else {
                            /*<Respuesta>*/
                                $JSON_RESULT['message']         = "Bad";
                                $JSON_RESULT['QueryUpdate']     = $QueryUpdate;
                                $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                            /*</Respuesta>*/
                        }        
                    $this->closet();
                /*<VALIDAR DETALLES>*/

                /*</Query>*/
                    $QueryUpdateV =    ' UPDATE  visitas
                                            SET     estatus             = "ACEPTADOS",  
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion         = " [ UPFATE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                                WHERE idVisita       = '.$idVisita.';';
                /*</Query>*/
                
                $this->open();
                    if (mysqli_query($this->Connection, $QueryUpdateV)) {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']             = "Good";  
                            $JSON_RESULT['QueryUpdateV']   = $QueryUpdateV;
                        /*</Respuesta>*/
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']             = "Bad";
                            $JSON_RESULT['QueryUpdateV']   = $QueryUpdateV;
                            $JSON_RESULT['Error']               = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this->closet(); 

                return $JSON_RESULT;         

            }
        /*</RESPUESTA_UPDATE_DETALLE_CORTES_UNO>*/


        /*<RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTES>*/
            public function RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTES(
                                                                        $ID_CORTE,
                                                                        $NO_VISITAS,
                                                                        $NO_PROCESADOS,
                                                                        $TOTAL_COMICIONES
                                                                ){
                /*<VALIDAR DETALLES>*/
                    /*<Query>*/
                        $querySelect = '    SELECT COUNT(idCorteD) FROM corte_deta  WHERE  idCorte  = '.$ID_CORTE.' ; ';
                        $COUNT = 0;
                    /*</Query>*/
                    
                    $this->open();            
                        if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                            $JSON_RESULT['message']         = "Good";
                            $JSON_RESULT['COUNT']           = $COUNT;
                            if ($resultQuery->num_rows > 0) {
                                $COUNT = 1;
                            }else{
                                $COUNT = 0;
                            }                           
                        } else {
                            /*<Respuesta>*/
                                $JSON_RESULT['message']         = "Bad";
                                $JSON_RESULT['querySelect']     = $querySelect;
                                $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                            /*</Respuesta>*/
                        }        
                    $this->closet();
                /*<VALIDAR DETALLES>*/

                if($COUNT > 0){
                
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
                        $QueryUpdate =    ' UPDATE  corte_enca
                                                SET     estatus             = "ABIERTO",   
                                                        noVisitas           = '.$NO_VISITAS.',  
                                                        noProcesados        = '.$NO_PROCESADOS.', 
                                                        totalComiciones     = '.$TOTAL_COMICIONES.',                                    
                                                        fechaModificacion   = "'.$Date.'",
                                                        observacion         = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                                    WHERE idCorte       = '.$ID_CORTE.';';
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
                    
                }
                return $JSON_RESULT;         

            }
        /*</RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTES>*/

        /*<RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTE_PROCESADO>*/
            public function RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTE_PROCESADO( $ID_CORTE ){
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
                    $QueryUpdate =    ' UPDATE  corte_enca
                                            SET     estatus             = "PROCESADO",                                                                                   
                                                    fechaModificacion   = "'.$Date.'",
                                                    observacion         = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                                WHERE idCorte       = '.$ID_CORTE.';';
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
                return $JSON_RESULT;         

            }
        /*</RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTE_PROCESADO>*/
        
        /*<AceptarOrdenPago>*/
            public function AceptarOrdenPago( $ID_CORTE ){
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
                    $QueryUpdate =    ' UPDATE  corte_enca
                                            SET     estatus             = "ORDEN DE PAGO",                                                                                   
                                                    fechaModificacion   = "'.$Date.'",
                                                    observacion         = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                                WHERE idCorte       = '.$ID_CORTE.';';
                /*</Query>*/
                
                $this->open();
                    if (mysqli_query($this->Connection, $QueryUpdate)) {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']             = "Good";  
                            $JSON_RESULT['QueryUpdate']   = $QueryUpdate;
                        /*</Respuesta>*/
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']             = "Bad";
                            $JSON_RESULT['QueryUpdate']   = $QueryUpdate;
                            $JSON_RESULT['Error']               = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this->closet(); 
                /*</Query>*/
                    $QueryUpdate =    ' UPDATE  corte_deta
                                            SET     estatus             = "ORDEN DE PAGO",                                                                                   
                                                    fechaModificacion   = "'.$Date.'",
                                                    observacion         = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                                WHERE idCorte       = '.$ID_CORTE.';';
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
                return $JSON_RESULT;         

            }
        /*</AceptarOrdenPago>*/


        
        
        /*<Method Visits>*/

            /*<Method selectFullVisits>*/
                public function selectFullVisits(){
                    /*<Variables> */
                        $JSON_RESULT                    = [];
                        $JSON_RESULT['information']     = [];
                        $JSON_RESULT['message']         = '';
                        $JSON_RESULT['error']           = '';
                        $JSON_RESULT['querySelect']     = '';
                    /*</Variables> */
                    /*<Query> */
                        $querySelect = "SELECT      0 AS Seleccion,
                                                    vs.idVisita,

                                                    vs.idUsuarioSV,
                                                    vs.idUsuarioSC,
                                                    vs.idContacto,
                                                    vs.idCampana,
                                                    vs.idCComicion,
                                                    vs.IdTVehiculo,
                                                    vs.idCCobro,
                                                    vs.idZona,
                                                    vs.idRuta,

                                                    vs.folio,
                                                    vs.fecha,
                                                    
                                                    (
                                                            SELECT usu.nombres FROM usuarios usu WHERE usu.idUsuario = vs.idUsuarioSV
                                                    )AS Visitador,
                                                    (
                                                            SELECT con.nombre FROM contacto con WHERE con.idContacto = vs.idContacto
                                                    )AS Contacto,
                                                    (
                                                            SELECT con.telefono FROM contacto con WHERE con.idContacto = vs.idContacto
                                                    )AS telefono,
                                                    (
                                                            SELECT cc.comision FROM coneptoComicion cc WHERE cc.idCComicion  = vs.idCComicion
                                                    )AS Comision,
                                                    (
                                                            SELECT cc.cantidad FROM coneptoComicion cc WHERE cc.idCComicion  = vs.idCComicion
                                                    )AS cantidad
                                                FROM visitas vs 
                                                    WHERE  
                                                            vs.bstate = 1               AND
                                                            vs.estatus = 'VISITADO'     OR
                                                            vs.estatus = 'RECOLECTADO';      " ;
                                                            
                        $JSON_RESULT['querySelect']     = $querySelect;
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
            /*</Method selectFullVisits>*/
            
            /*<Method selectFullVisitsProcesoado>*/
                public function selectFullVisitsProcesoado($idCosto){
                    /*<Variables> */
                        $JSON_RESULT                    = [];
                        $JSON_RESULT['information']     = [];
                        $JSON_RESULT['message']         = '';
                        $JSON_RESULT['error']           = '';
                    /*</Variables> */
                    /*<Query> */
                        $querySelect = '    SELECT * FROM zona  WHERE  bstate  = 1 ; ';
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
            /*</Method selectFullVisitsProcesoado>*/
            
        /*</Method Visits>*/
           
    }

    