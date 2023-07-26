<?php

namespace  d2dSocio\Modules\ModuleClientComiciones\Model\Comisiones ;
    /*<Includes>*/
        include_once('../../ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    /*<use>*/
        use  d2dSocio\Modules\ModulePugins\Conection\Conection as ConectionComisiones;
    /*<use>*/

    class Comisiones extends ConectionComisiones{

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
                    session_start();
                    $idUser                     = $_SESSION["idUser-door2door"];

                    $querySelect = 'SELECT 
                                    (
                                        IFNULL( 
                                                    (
                                                        SELECT 
                                                            COUNT(cam.idCampana) 
                                                        FROM campana cam 
                                                            WHERE 
                                                                cam.idUsuario = '.$idUser.' 			AND
                                                                cam.estatus   = "ABIERTA"
                                                    ), 0 
                                        ) 
                                    )AS campanaAbiertas,
                                    (
                                        IFNULL( 
                                                    (
                                                        SELECT 
                                                            COUNT(cam.idCampana) 
                                                        FROM campana cam 
                                                            WHERE 
                                                                cam.idUsuario = '.$idUser.' 			AND
                                                                cam.estatus   = "CERRADA"
                                                    ), 0 
                                        ) 
                                    )AS campanaCerradas,
                                    (
                                        IFNULL( 
                                                    (
                                                        SELECT 
                                                            COUNT(cam.idCampana) 
                                                        FROM campana cam 
                                                            WHERE 
                                                                cam.idUsuario = '.$idUser.' 			AND
                                                                cam.estatus   = "PAUSADA"
                                                    ), 0 
                                        ) 
                                    )AS campanaPausadas,
                                    (
                                        IFNULL( 
                                                    (
                                                        SELECT 
                                                            COUNT(con.idUsuario) 
                                                        FROM contacto con 
                                                            WHERE 
                                                                con.idUsuario   = '.$idUser.' 			AND
                                                                con.estatus     = "PENDIENTE"
                                                    ), 0 
                                        ) 
                                    )AS visitasProgramadas,
                                    (
                                        IFNULL( 
                                                    (
                                                        SELECT 
                                                            COUNT(vis.idVisita) 
                                                        FROM visitas vis 
                                                            WHERE 
                                                                vis.idUsuarioSC = '.$idUser.' 			AND
                                                                vis.estatus     = "SELECCIONADO"
                                                    ), 0 
                                        ) 
                                    )AS visitasSeleccionadas,
                                    (
                                        IFNULL( 
                                                    (
                                                        SELECT 
                                                            COUNT(vis.idVisita) 
                                                        FROM visitas vis 
                                                            WHERE 
                                                                vis.idUsuarioSC = '.$idUser.' 			AND
                                                                vis.estatus     = "VISITADO"
                                                    ), 0 
                                        ) 
                                    )AS visitasCompletadas;';
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
    
           
    }

    