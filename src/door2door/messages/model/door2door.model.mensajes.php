<?php

namespace  door2door\Messages\Model\Messages;
    /*<Includes>*/
        include_once('../../Modules/ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/

    /*<use>*/
        use  door2door\Modules\ModulePugins\Conection\Conection as ConectionMessages;
    /*<use>*/

    class Messages extends ConectionMessages{

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
                    $JSON_RESULT['information_usuario'] = [];
                    session_start();
                    $idUser                     = $_SESSION["idUser-door2door"];
                /*</Variables> */

                /*<Query> */
                $querySelect = 'SELECT     
                                        (
                                            IFNULL(
                                                (
                                                    SELECT      
                                                        qm.mensaje
                                                    FROM queuseMensaje qm
                                                    WHERE 
                                                        qm.idUsuarioEmisor      = usu1.idUsuario AND
                                                        qm.idUsuarioReceptor    = '.$idUser.'    AND 
                                                        qm.visto                = 1
                                                    ORDER BY idQMensaje DESC 
                                                    LIMIT 1
                                                ), "#%NOTIENEMENSAJE%#"
                                            )
                                        )AS mensaje,
                                        (
                                            IFNULL(
                                                (
                                                    SELECT      
                                                        qm.fecha
                                                    FROM queuseMensaje qm
                                                    WHERE 
                                                        qm.idUsuarioEmisor      = usu1.idUsuario AND
                                                        qm.idUsuarioReceptor    = '.$idUser.'  AND 
                                                        qm.visto                = 1  
                                                    ORDER BY idQMensaje DESC
                                                    LIMIT 1
                                                ), "#%NOTIENEMENSAJE%#"
                                            )                                           
                                        )AS fecha,
                                        usu1.idUsuario,
                                        usu1.imagen,
                                        usu1.nombres,
                                        usu1.apellidos

                                    FROM usuarios usu1 
                                        WHERE 
                                            usu1.idUsuario      != '.$idUser.' ;';

               
                /*</Query> */

                $JSON_RESULT['querySelect']     = $querySelect;

                $this->open();            
                    if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                        if ($resultQuery->num_rows > 0) {
                            /*<Captura>*/
                                while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                    if($Rol['mensaje'] != "#%NOTIENEMENSAJE%#"){
                                        array_push($JSON_RESULT['information'], $Rol);
                                    }                                   
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

                /*<Query Usuario> */
                    $querySelectUsuario = 'SELECT   * FROM usuarios usu 
                                                WHERE 
                                                    usu.idUsuario            = '.$idUser.' AND 
                                                    usu.bstate               = 1';
                /*</Query Usuario> */
                
                $JSON_RESULT['querySelectUsuario']     = $querySelectUsuario;

                $this->open();            
                    if ($resultQuery = mysqli_query($this->Connection, $querySelectUsuario)) {
                        /*<Captura>*/
                            while ($Usu = $resultQuery->fetch_array(MYSQLI_ASSOC)) { 
                                $JSON_RESULT['message'] = "Good";   
                                array_push($JSON_RESULT['information_usuario'], $Usu);
                            }
                        /*</Captura>*/                       
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

        /*<Method Visitado>*/
            public function Visto($idUsuarioEmisor){   
                    /*<Variables> */
                        /*</datos>*/
                            session_start();
                            $DATE                       = date('Y-m-d h:i:s');
                            $idUser                     = $_SESSION["idUser-door2door"];
                        /*<datos>*/
                        $JSON_RESULT                    = [];
                      
                        $JSON_RESULT['message']         = '';
                        $JSON_RESULT['error']           = '';
                    /*</Variables> */
                    /*<Query>*/
                        $queryUpdate = '  UPDATE  queuseMensaje 
                                                    SET     visto               = 0,
                                                            fechaModificacion   = "'.$DATE.'",
                                                            observacion         = " [ DELETE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                                    WHERE 
                                                            idUsuarioReceptor = '.$idUser.'          AND
                                                            idUsuarioEmisor   = '.$idUsuarioEmisor.';';
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
                    return $JSON_RESULT;
            }
        /*</Method Visitado>*/
        
    }

    