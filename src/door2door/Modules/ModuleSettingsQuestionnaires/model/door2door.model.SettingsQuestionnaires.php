<?php

namespace    door2door\Modules\ModuleSettingsQuestionnaires\Model\Questionnaires;
    /*<Includes>*/
        include_once('../../ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    /*<use>*/
        use  door2door\Modules\ModulePugins\Conection\Conection as ConectionQuestionnaires;
    /*<use>*/

    class Questionnaires extends ConectionQuestionnaires{

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
                    $querySelect = '    SELECT * FROM ajusteCuestionario  WHERE  bstate  = 1 ORDER BY idACuestionarios DESC LIMIT 1 ; ';
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
    
    
        
        /*<Method Create>*/
            public function create( 
                                    $idCuestionariosVisitante,
                                    $idCuestionariosCliente
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
                if(true){
                    /*<Query>*/
                        $queryInsert = 'INSERT INTO ajusteCuestionario ( 
                                                idCuestionariosVisitante, 
                                                idCuestionariosCliente, 
                                                fechaCreacion,
                                                fechaModificacion,
                                                observacion,
                                                bstate
                                                ) VALUES( 
                                                    "'.$idCuestionariosVisitante.'", 
                                                    "'.$idCuestionariosCliente.'",                                           

                                                    "'.$DATE.'",
                                                    "'.$DATE.'",
                                                    " [ INSERT '.$DATE.' ], [ idUser '.$idUser.' ] ",
                                                    1
                                                );';
                    /*</Query>*/
                    $JSON_RESULT['queryInsert'] = $queryInsert;
                    $this->open();        
                        if ( mysqli_query( $this->Connection, $queryInsert)) {
                            $JSON_RESULT['message']     = "Good";                           
                        } else {
                            $JSON_RESULT['message']     = "Bad";                            
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
            public function update(
                                        $id, 
                                        $idCuestionariosVisitante,
                                        $idCuestionariosCliente
                                    ){
                $JSON_RESULT = [];

                 /*<Variables> */
                            /*</datos>*/
                            session_start();
                            $Date                       = date('Y-m-d h:i:s');
                            $idUser                     = $_SESSION["idUser-cagg"];
                        /*<datos>*/
                        $JSON_RESULT['message']         = '';
                        $JSON_RESULT['error'] = '';
                    /*</Variables> */
                    /*</Query>*/
                    $QueryUpdate =    'UPDATE  ajusteCuestionario
                                            SET     idCuestionariosVisitante            = "'.$idCuestionariosVisitante.'",
                                                    idCuestionariosCliente              = "'.$idCuestionariosCliente.'",                                                   
                                                    fechaModificacion      = "'.$Date.'",
                                                    observacion            = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                        WHERE idACuestionarios        = '.$id.';';
                        
                    /*</Query>*/
                    $JSON_RESULT['QueryDeleteUpdate']   = $QueryUpdate;
                $this->open();
                    if (mysqli_query($this->Connection, $QueryUpdate)) {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']          = "Good";   
                            $JSON_RESULT['idACuestionarios'] = $id; 
                            
                        /*</Respuesta>*/
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']             = "Bad";                            
                            $JSON_RESULT['Error']               = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this->closet(); 
                 /*<Query> */
                 $querySelect = '    SELECT * FROM ajusteCuestionario  WHERE  bstate  = 1 ORDER BY idACuestionarios DESC LIMIT 1 ; ';
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
        /*</Method Update>*/  

    
           
    }

    