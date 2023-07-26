<?php

namespace    door2door\Modules\ModuleSettingsServeEmail\Model\ServeEmail;
    /*<Includes>*/
        include_once('../../ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    /*<use>*/
        use  door2door\Modules\ModulePugins\Conection\Conection as ConectionServeEmail;
    /*<use>*/

    class ServeEmail extends ConectionServeEmail{

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
                    $querySelect = '    SELECT * FROM servidorCorreo  WHERE  bstate  = 1 ORDER BY idSCorreo LIMIT 1 ; ';
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
                                    $usuarios,
                                    $contrasena,
                                    $servidor,
                                    $puerto,
                                    $asunto,
                                    $cuerpo
                                ){
                    /*<Variables> */

               /*<Query>*/
                    $queryInsert = 'INSERT INTO servidorCorreo ( 
                                            usuarios, 
                                            contrasena, 
                                            servidor,
                                            puerto,
                                            asunto,
                                            cuerpo,
                                            fechaCreacion, 
                                            fechaModificacion,
                                            observacion,
                                            bstate
                                            ) VALUES( 
                                                "'.$usuarios.'", 
                                                "'.$contrasena.'",      
                                                "'.$servidor.'",      
                                                "'.$puerto.'",      
                                                "'.$asunto.'",      
                                                "'.$cuerpo.'",                                         

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
                    
                    /*<Query> */
                        $querySelect = '    SELECT * FROM servidorCorreo  WHERE  bstate  = 1 ORDER BY idSCorreo LIMIT 1 ; ';
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
        /*</Method Create>*/

        /*<Method Update>*/
            public function update(
                                        $id,
                                        $usuarios,
                                        $contrasena,
                                        $servidor,
                                        $puerto,
                                        $asunto,
                                        $cuerpo

                                    ){
                $JSON_RESULT = [];

               
                /*<Variables> */
                    /*</datos>*/
                        session_start();
                        $Date                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];
                    /*<datos>*/
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    $JSON_RESULT['tracking']        = [];
                    $JSON_RESULT_TRACKING           = [];
                /*</Variables> */
                /*</Query>*/
                $QueryUpdate =    ' UPDATE      servidorCorreo
                                        SET     usuarios              = "'.$usuarios.'",
                                                contrasena            = "'.$contrasena.'",   
                                                puerto                = "'.$puerto.'", 
                                                asunto                = "'.$asunto.'",                                               
                                                cuerpo                = "'.$cuerpo.'", 
                                                fechaModificacion   = "'.$Date.'",
                                                observacion         = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                            WHERE idSCorreo              = '.$id.';';
                /*</Query>*/
                
                $this->open();
                    if (mysqli_query($this->Connection, $QueryUpdate)) {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']             = "Good";  
                            $JSON_RESULT['QueryUpdate']         = $QueryUpdate;
                        /*</Respuesta>*/
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']             = "Bad";
                            $JSON_RESULT['QueryUpdate']         = $QueryUpdate;
                            $JSON_RESULT['Error']               = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this->closet(); 
                
                return $JSON_RESULT;
            }
        /*</Method Update>*/ 
    
           
    }

    