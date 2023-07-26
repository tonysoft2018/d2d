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
            public function selectFull($FechaInicial){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */

                /*<Query> */
                    session_start();
                    $idUser                     = $_SESSION["idUser-door2door"];
                    $FechaFinal = date("Y-m-d",strtotime($FechaInicial."+ 1 month"));

                    $querySelect = '  SELECT      
                                                    vs.idVisita,

                                                    vs.idUsuarioSV,
                                                    vs.idUsuarioSC,
                                                    vs.idContacto,
                                                    vs.idCampana,
                                                    vs.idCComicion,
                                                    vs.IdTVehiculo,
                                                    vs.idCCobro,
                                                    vs.estatus,
                                                    vs.idZona,
                                                    vs.idRuta,

                                                    vs.folio,
                                                    vs.fecha,
                                                    vs.comentarios,
                                                    
                                                    (
                                                            SELECT cam.tipoCampana FROM campana cam WHERE cam.idCampana = vs.idCampana
                                                    )AS tipoVisita ,
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
                                                            SELECT con.calle FROM contacto con WHERE con.idContacto = vs.idContacto
                                                    )AS calle,
                                                    (
                                                            SELECT con.noExterior FROM contacto con WHERE con.idContacto = vs.idContacto
                                                    )AS noExterior,
                                                    (
                                                            SELECT con.noInterior FROM contacto con WHERE con.idContacto = vs.idContacto
                                                    )AS noInterior,
                                                    (
                                                            SELECT cc.comision FROM coneptoComicion cc WHERE cc.idCComicion  = vs.idCComicion
                                                    )AS Comision,
                                                    (
                                                            SELECT cc.cantidad FROM coneptoComicion cc WHERE cc.idCComicion  = vs.idCComicion
                                                    )AS cantidad
                                                FROM visitas vs 
                                                    WHERE  
                                                            vs.bstate       = 1               AND
                                                            vs.fecha BETWEEN "'.$FechaInicial.' 00:00:00" AND "'.$FechaFinal.' 00:00:00" AND
                                                            vs.idUsuarioSV  = '.$idUser;
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
            public function Update(
                                        $id,
                                        $nombre,
                                        $descripcion

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
                        $QueryUpdate =    ' UPDATE  tipoVehiculo
                                                SET     nombre              = "'.$nombre.'",
                                                        descripcion         = "'.$descripcion.'",                                              
                                                        fechaModificacion   = "'.$Date.'",
                                                        observacion         = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                                    WHERE idTVehiculo       = '.$id.';';
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

    