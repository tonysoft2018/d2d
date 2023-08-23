<?php

namespace   d2dSocioWeb\Modules\ModuleCatalogsEstados\Model\Estados;
    /*<Includes>*/
        include_once('../../ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    /*<use>*/
        use  d2dSocioWeb\Modules\ModulePugins\Conection\Conection as ConectionEstados;
    /*<use>*/

    class Estados extends ConectionEstados {

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
                    session_start();
                     $idUser                     = $_SESSION["idUser-door2door"];
                /*</Variables> */
                /*<Query> */
                    $querySelect = '    SELECT  
                                                con.idContacto,
                                                con.idUsuario,
                                                con.idCampana,
                                                con.nombre,
                                                con.calle,
                                                con.telefono,
                                                con.email,
                                                con.noInterior,
                                                con.noExterior,
                                                con.codigoPostal,
                                                con.colonia,
                                                con.entreCalle,
                                                con.latitud,
                                                con.longitud,
                                                con.estatus,
                                                (
                                                    IFNULL(
                                                                (
                                                                    SELECT pas.nombre 
                                                                        FROM paises pas
                                                                        WHERE  pas.idPais  = con.idPais  limit 1
                                                                ),"No esta asignado"
                                                    )
                                                )AS Pais,
                                                (
                                                    IFNULL(
                                                                (
                                                                    SELECT es.nombre 
                                                                        FROM Estados es
                                                                        WHERE  es.idEstado  = con.idEstado  limit 1
                                                                ),"No esta asignado"
                                                    )
                                                )AS Estado,
                                                (
                                                    IFNULL(
                                                                (
                                                                    SELECT mu.nombre 
                                                                        FROM Municipios mu
                                                                    WHERE  mu.idMunicipio   = con.idMunicipio   limit 1
                                                                ), "No esta asignado"
                                                    )
                                                )AS Municipio



                                                FROM contacto con, campana cam 
                                                    WHERE  
                                                        con.idCampana = cam.idCampana AND   
                                                        cam.idUsuario   = '.$idUser.' AND 
                                                        cam.estatus = "ABIERTA"       AND
                                                        con. bstate      = 1 ; ';
                /*</Query> */
                
                $JSON_RESULT['querySelect']     = $querySelect;
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
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this->closet();
                return $JSON_RESULT;
            }
        /*<Method SelectFull>*/

        /*<Method selectVisit>*/
            public function selectVisit($idContacto){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    session_start();
                    $idUser                     = $_SESSION["idUser-door2door"];
                /*</Variables> */

                /*<Query> */
                    $querySelect = 'SELECT * FROM visitas 
                                        WHERE idContacto  = '.$idContacto.' ';
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
        /*</Method selectVisit>*/
           
    }

    