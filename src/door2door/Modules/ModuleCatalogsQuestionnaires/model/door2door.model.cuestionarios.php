<?php

namespace  door2door\Modules\ModuleCatalogsQuestionnaires\Model\Questionnaires ;
    /*<Includes>*/
        include_once('../../ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    /*<use>*/
        use  door2door\Modules\ModulePugins\Conection\Conection as ConectionPaises;
    /*<use>*/

    class Questionnaires extends ConectionPaises{

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
                    $querySelect = '    SELECT * FROM cuestionarios  WHERE  bstate  = 1 ; ';
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
                    $queryDeleteUpdate = '  UPDATE  cuestionarios 
                                            SET     bstate              = 0,
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion      = " [ DELETE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                            WHERE idCuestionario = '.$id.';';
                /*</Query>*/
                
                $this->open();
                    if (mysqli_query($this->Connection, $queryDeleteUpdate)) {
                        /*<Respuesta>*/
                           
                            $JSON_RESULT['message'] = "Good";   
                           
                        /*</Respuesta>*/
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']             = "Bad";
                            $JSON_RESULT['queryDeleteUpdate']   = $queryDeleteUpdate;
                            $JSON_RESULT['Error']               = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this->closet(); 
                return $JSON_RESULT;
            }
        /*</Method Delete>*/
        
        /*<Method Create>*/
            public function create( 
                                    $nombre,
                                    $tipoCuestionario,
                                    $descripcion
                                ){
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
                if($nombre != ''){
                    /*<Query>*/
                        $queryInsert = 'INSERT INTO cuestionarios ( 

                                                nombre,  
                                                tipoCuestionario,   
                                                descripcion, 

                                                fechaCreacion,  
                                                fechaModificacion, 
                                                observacion, 
                                                bstate 
                                                )   VALUES  ( 

                                                    "'.$nombre.'", 
                                                    "'.$tipoCuestionario.'",  
                                                    "'.$descripcion.'",                                         

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
            public function Update(
                                        $id,
                                        $nombre,
                                        $tipoCuestionario

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
                        $QueryUpdate =    ' UPDATE  cuestionarios
                                                SET     nombre              = "'.$nombre.'",
                                                        tipoCuestionario         = "'.$tipoCuestionario.'",                                              
                                                        fechaModificacion   = "'.$Date.'",
                                                        observacion         = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                                    WHERE idCuestionario       = '.$id.';';
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
        
        /*<Questions>*/
            /*<Method selectFullQuestions>*/
                public function selectFullQuestions($idCuestionario  ){
                    /*<Variables> */
                        $JSON_RESULT                    = [];
                        $JSON_RESULT['information']     = [];
                        $JSON_RESULT['message']         = '';
                        $JSON_RESULT['error']           = '';
                    /*</Variables> */
                    /*<Query> */
                        $querySelect = '    SELECT 
                                                pregunta,
                                                tipoPregunta 
                                            FROM preguntasxcuesntionario  
                                                WHERE  
                                                    idCuestionario  = '.$idCuestionario.' AND 
                                                    bstate          = 1 ; ';
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
            /*<Method selectFullQuestions>*/

            /*<Method DeleteQuestions>*/
                public function DeleteQuestions($idCuestionario){
                    /*<Variables> */
                        $JSON_RESULT                    = [];
                        $JSON_RESULT['information']     = [];
                        $JSON_RESULT['message']         = '';
                        $JSON_RESULT['error']           = '';
                    /*</Variables> */
                    /*<Query> */
                        $queryDelete = 'DELETE FROM preguntasxcuesntionario WHERE idCuestionario = '.$idCuestionario.'; ';
                    /*</Query> */
                    
                    $this->open();            
                        if ($resultQuery = mysqli_query($this->Connection, $queryDelete)) {                          
                            /*<Respuesta>*/
                                $JSON_RESULT['message'] = "Good";   
                            /*</Respuesta>*/
                        } else {
                            /*<Respuesta>*/
                                $JSON_RESULT['message']         = "Bad";
                                $JSON_RESULT['querySelect']     = $queryDelete;
                                $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                            /*</Respuesta>*/
                        }        
                    $this->closet();
                    return $JSON_RESULT;
                }
            /*<Method DeleteQuestions>*/

            /*<Method CreateQuestions>*/
                public function createQuestions( 
                                                    $idCuestionario,
                                                    $pregunta,
                                                    $tipoPregunta 
                                                ){
                    /*<Variables> */

                        /*</datos>*/
                            session_start();
                            $DATE                       = date('Y-m-d h:i:s');
                            $idUser                     = $_SESSION["idUser-door2door"];                        
                        /*<datos>*/

                        $JSON_RESULT                    = [];
                        $JSON_RESULT['information']     = [];
                        $JSON_RESULT['message']         = '';
                        $JSON_RESULT['error']           = '';

                    /*</Variables> */

                    /*<Query>*/
                        $queryInsert = 'INSERT INTO preguntasxcuesntionario ( 

                                                    idCuestionario, 
                                                    pregunta, 
                                                    tipoPregunta, 

                                                    fechaCreacion, 
                                                    fechaModificacion,
                                                    observacion, 
                                                    bstate

                                                    ) VALUES( 

                                                        "'.$idCuestionario.'", 
                                                        "'.$pregunta.'",                                           
                                                        "'.$tipoPregunta.'",  

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
                }
            /*</Method CreateQuestions>*/
        /*</Questions>*/
    }

    