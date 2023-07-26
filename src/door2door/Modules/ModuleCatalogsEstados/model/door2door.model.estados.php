<?php

namespace   door2door\Modules\ModuleCatalogsEstados\Model\Estados;
    /*<Includes>*/
        include_once('../../ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    /*<use>*/
        use  door2door\Modules\ModulePugins\Conection\Conection as ConectionEstados;
    /*<use>*/

    class Estados extends ConectionEstados{

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
                    $querySelect = '    SELECT  
                                                est.nombre,
                                                est.idEstado,
                                                est.idPais,
                                                (
                                                    SELECT  pais.nombre    FROM paises pais WHERE  pais.idPais  = est.idPais
                                                )AS Pais
                                            FROM Estados est WHERE  est.bstate  = 1 ; ';
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
                    $queryDeleteUpdate = '  UPDATE  Estados 
                                            SET     bstate              = 0,
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion      = " [ DELETE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                            WHERE idEstado = '.$id.';';
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
                                    $idPais
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
                        $queryInsert = 'INSERT INTO Estados ( 
                                                nombre, 
                                                idPais,
                                                fechaCreacion, 
                                                fechaModificacion,
                                                observacion,
                                                bstate
                                                ) VALUES( 
                                                    "'.$nombre.'",                                           
                                                    '.$idPais.',
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
                                        $idPais

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
                        $QueryUpdate =    ' UPDATE  Estados
                                                SET     nombre              = "'.$nombre.'",
                                                        idPais              =  '.$idPais.',                                              
                                                        fechaModificacion   = "'.$Date.'",
                                                        observacion         = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                                    WHERE idEstado       = '.$id.';';
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

    