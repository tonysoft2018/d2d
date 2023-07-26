<?php

    /*<Includes>*/
        include_once('../../../Modules/ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    
    /*<use>*/
        use  d2dSocioWeb\Modules\ModulePugins\Conection\Conection as ConectionLogin;
    /*<use>*/

    class newmember extends ConectionLogin{
        /*<Method construc>*/
            public function __construct(){
                // Cosntruct Father
                parent::__construct();
            }
        /*<Method construc>*/
                       
        /*<REUSLTADO_VALIDAR_TOCKEN>*/
            public function REUSLTADO_VALIDAR_TOCKEN( $TOKEN ){
                /*<Variables> */
                    $JSON_RESULT                        = [];
                    $JSON_RESULT['ID_TRECUPERACION']    = [];
                    $JSON_RESULT['ID_USUARIOS']         = [];
                    $JSON_RESULT['message']             = '';
                    $JSON_RESULT['error']               = '';                  
                /*</Variables> */
                
                /*<Query> */
                        $querySelect = 'SELECT 
                                                tr.idTRecuperacion,
                                                usu.idUsuario  
                                            FROM 
                                                tockenRecuperacion tr, usuarios usu 
                                            WHERE
                                                    usu.idUsuario   = tr.idUsuario  AND
                                                    usu.bstate      = 1             AND
                                                    tr.status       = "PENDIENTE"   AND
                                                    tr.tocken       = "'.$TOKEN.'" ';
                /*</Query> */
                $JSON_RESULT['querySelect']     = $querySelect;
                $this->open();            
                    if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                        if ($resultQuery->num_rows > 0) {
                            /*<Captura>*/                               
                                while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                    $JSON_RESULT['message']             = "Good";   
                                    $JSON_RESULT['ID_TRECUPERACION']    = $Rol['idTRecuperacion'];
                                    $JSON_RESULT['ID_USUARIOS']         = $Rol['idUsuario'];
                                }
                            /*</Captura>*/
                        }else{
                            $JSON_RESULT['message']         = "Bad";
                        }
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";                            
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this->closet();

                return $JSON_RESULT;
            }
        /*</REUSLTADO_VALIDAR_TOCKEN>*/

        /*<REUSLTADO_CAMBIAR_CONTRASENA>*/
            public function REUSLTADO_CAMBIAR_CONTRASENA($ID_USUARIOS, $CONTASENA){
                /*<Variables> */
                    /*<datos>*/
                        session_start();
                        $DATA                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];
                    /*</datos>*/
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    $JSON_RESULT['CONTASENA']       = $CONTASENA;
                    $NEW_CONTASENA                  = password_hash($CONTASENA, PASSWORD_DEFAULT);
                /*</Variables> */


                /*</Query>*/
                    $QueryUpdate =    'UPDATE  usuarios
                                            SET     password               = "'.$NEW_CONTASENA.'",   
                                                    fechaModificacion      = "'.$DATA.'",
                                                    observacion            = " [ UPFATE '.$DATA.' ], [ idUser '.$ID_USUARIOS.' ] "
                                            WHERE idUsuario                = '.$ID_USUARIOS.';';
                /*</Query>*/
            
               
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
        /*</REUSLTADO_CAMBIAR_CONTRASENA>*/     

        /*<REUSLTADO_CAMBIAR_ESTATUS>*/
            public function REUSLTADO_CAMBIAR_ESTATUS( $ID_TRECUPERACION ){

                /*<Variables> */
                    /*<datos>*/
                        session_start();
                        $DATA                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];
                    /*</datos>*/
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    $NEW_CONTASENA                  = password_hash($CONTASENA, PASSWORD_DEFAULT);
                /*</Variables>*/


                /*</Query>*/
                    $QueryUpdate =    'UPDATE  tockenRecuperacion
                                            SET     status                 = "USADA",   
                                                    fechaModificacion      = "'.$DATA.'",
                                                    observacion            = " [ UPFATE '.$DATA.' ], [ idUser '.$ID_USUARIOS.' ] "
                                            WHERE idTRecuperacion                 = '.$ID_TRECUPERACION.';';
                /*</Query>*/
            
                $JSON_RESULT['QueryUpdate']   = $QueryUpdate;
                $this->open();
                    if (mysqli_query($this->Connection, $QueryUpdate)) {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']             = "Good";                               
                        /*</Respuesta>*/
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']             = "Bad";                            
                            $JSON_RESULT['Error']               = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this->closet(); 

                return $JSON_RESULT;
            }
        /*</REUSLTADO_CAMBIAR_ESTATUS>*/

        
       
    }