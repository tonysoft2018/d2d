<?php

//namespace  d2dVisitador\Messages\Model\Notificaciones;
    /*<Includes>*/
        include_once('../../Modules/ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/

    /*<use>*/
        use  door2door\Modules\ModulePugins\Conection\Conection as ConectionNotificaciones;
    /*<use>*/

    class Notificaciones extends ConectionNotificaciones{

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
                    $idUser                         = $_SESSION["idUser-door2door"];
                /*</Variables> */
                /*<Query> */
                    $querySelect = ' SELECT     qn.*,
                                                usu1.nombres,
                                                usu1.apellidos
                                            FROM queuseNotificaciones qn,  usuarios usu1 
                                            WHERE 
                                                     qn.idUsuarioReceptor     = '.$idUser.'      AND 
                                                     qn.idUsuarioEmisor       = usu1.idUsuario   AND
                                                     qn.bstate                = 1                AND
                                                     qn.visto                 = 1 
                                            ORDER BY qn.idQNotificacion DESC ';
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

        /*<Method Visitado>*/
            public function VistoNotificaciones(){
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
                    $queryUpdate = '  UPDATE  queuseNotificaciones 
                                                SET     visto               = 0,
                                                        fechaModificacion   = "'.$DATE.'",
                                                        observacion         = " [ UPDATE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                                WHERE 
                                                        idUsuarioReceptor = '.$idUser.';';
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

    