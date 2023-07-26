<?php

    /*<Includes>*/
        include_once('../../ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    /*<use>*/
        use  door2door\Modules\ModulePugins\Conection\Conection as ConectionConsult;
    /*<use>*/



class Consultas extends ConectionConsult{

    public function __construct(){
        // Cosntruct Father
        parent::__construct();
    }
   
    public function Consultar( 
                                $tipo, 
                                $fechainicio, 
                                $fechafinal 
                            ){
        if( $tipo != ''){
            switch($tipo){
                case 'CAMPANAS':    { return $this->CAMPANAS(   $fechainicio, $fechafinal   );       break; }
                case 'VISITAS':     { return $this->VISITAS(    $fechainicio, $fechafinal   );       break; }
                case 'COMISIONES':  { return $this->COMISIONES( $fechainicio, $fechafinal   );       break; }                
            }
        }else{

        }       
    }

    private function CAMPANAS($fechainicio, $fechafinal ){
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
                                FROM campana cam 
                                    WHERE 
                                        cam.fecha  BETWEEN  "'.$fechainicio.' 00:00:00" AND "'.$fechafinal.' 00:00:00" AND 
                                        cam.bstate = 1; ';
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

    private function VISITAS($fechainicio, $fechafinal){

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
                                                con.bstate = 1  ';
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

    private function COMISIONES($fechainicio, $fechafinal){
       
        /*<Variables> */
            $JSON_RESULT                    = [];
            $JSON_RESULT['information']     = [];
            $JSON_RESULT['message']         = '';
            $JSON_RESULT['error']           = '';
        /*</Variables> */
        /*<Query> */
            $querySelect = 'SELECT *           
                                    FROM corte_enca ce 
                                        WHERE 
                                        ce.fecha  BETWEEN  "'.$fechainicio.' 00:00:00" AND "'.$fechafinal.' 00:00:00" AND 
                                        ce.bstate = 1; ';
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

}
    