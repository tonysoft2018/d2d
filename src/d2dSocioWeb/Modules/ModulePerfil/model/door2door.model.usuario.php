<?php

namespace d2dSocioWeb\Modules\ModulePerfil\Model\usuario;
    /*<Includes>*/
        include_once('../../ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/

    /*<use>*/
        use d2dSocioWeb\Modules\ModulePugins\Conection\Conection as ConectionUsuario;
    /*<use>*/

    class usuario  extends ConectionUsuario{

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
                    $idUser                     = $_SESSION["idUser-door2door"];
                /*</Variables> */
                /*<Query> */
                    $querySelect = '    SELECT 
                                                apellidos,
                                                nombres,
                                                email,
                                                imagen,
                                                usuario, 
                                                idUsuario
                                            FROM   
                                                usuarios 
                                        WHERE           
                                                bstate      = 1 AND 
                                                idUsuario   = '.$idUser.' ; ';
                /*</Query> */
                $JSON_RESULT['querySelect']     = $querySelect;

                $this::open();            
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
                            $JSON_RESULT['message']         = "Good";   
                        /*</Respuesta>*/
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";                          
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this::closet();
                return $JSON_RESULT;
            }
        /*<Method SelectFull>*/

     
        /*<Method password>*/
            public function password($password){
                $JSON_RESULT = [];             
                /*<Variables> */
                        /*</datos>*/
                        session_start();
                        $Date                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];
                    /*<datos>*/
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                   
                    $newPassword = password_hash($password, PASSWORD_DEFAULT);
                /*</Variables> */
                /*</Query>*/
                    $QueryUpdate =    ' UPDATE  usuarios
                                            SET     password                = "'.$newPassword.'",                                                                                            
                                                    fechaModificacion       = "'.$Date.'",
                                                    observacion             = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                                WHERE idUsuario             = '.$idUser.';';
                /*</Query>*/
                $JSON_RESULT['QueryDeleteUpdate']   = $QueryUpdate;
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
        /*</Method password>*/ 

        /*<Method Update>*/
            public function Update($nombres, $apellidos ){
                $JSON_RESULT = [];             
                /*<Variables> */
                        /*</datos>*/
                        session_start();
                        $Date                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];
                    /*<datos>*/
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                /*</Query>*/
                    $QueryUpdate =    'UPDATE  usuarios
                                    SET     nombres                 = "'.$nombres.'",
                                            apellidos               = "'.$apellidos.'",   
                                           

                                            fechaModificacion      = "'.$Date.'",
                                            observacion            = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                    WHERE idUsuario              = '.$idUser.';';
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
        /*</Method Update>*/ 

        /*<Method Update>*/
            public function UpdateImagen($imagen ){
                $JSON_RESULT = [];             
                /*<Variables> */
                        /*</datos>*/
                        session_start();
                        $Date                           = date('Y-m-d h:i:s');
                        $idUser                         = $_SESSION["idUser-door2door"];
                        $_SESSION["imagen-door2door"]   =  $imagen;
                    /*<datos>*/
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['imagen']         = $imagen;
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                /*</Query>*/
                    $QueryUpdate =    'UPDATE  usuarios
                                    SET     imagen                 = "'.$imagen.'",                                      
                                            fechaModificacion      = "'.$Date.'",
                                            observacion            = " [ UPFATE '.$Date.' ], [ idUser '.$idUser.' ] "
                                    WHERE idUsuario              = '.$idUser.';';
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
        /*</Method UpdateImagen>*/ 

    
 
        
      

       
    }

    