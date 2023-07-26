<?php
/*
*    Autor: Carlos Andres González Gómez  
*    Description; Class of connection MariaDb
**/


namespace  door2door\Modules\ModulePugins\Modules;

    include_once('door2door.Cofiguration.Conection.php');
    
    /*<Import>*/
        use  door2door\Modules\ModulePugins\Conection\Conection AS ConectionModules;
    /*<Import>*/

    class Modules  extends ConectionModules{

        /*<getModulesFather>*/
            public function getModulesFather(
                                                $typeUSer,
                                                $rolUser
                                            ){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    $querySelect                    = '';
                /*</Variables> */
                if($typeUSer == 'ADMINISTRATIVO'){
                    if($rolUser == 'ADMINISTADOR'){
                        /*<Query> */
                            $querySelect = 'SELECT * FROM   modulos                         
                                                WHERE   bstate  = 1  AND tipoModulo  = "PRIMER NIVEL"; ';
                        /*</Query> */
                    }else{

                    }
                }else if($typeUSer == 'SOCIO'){
                    /*<Query> */
                        $querySelect = '';
                    /*</Query> */
                }
                
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
                            $JSON_RESULT['message'] = "Good";   
                        /*</Respuesta>*/
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";
                            $JSON_RESULT['querySelect']     = $querySelect;
                            $JSON_RESULT['typeUSer']        = $typeUSer;
                            $JSON_RESULT['rolUser']         = $rolUser;
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this::closet();
                return $JSON_RESULT;
                
            }
        /*</getModulesFather>*/

        /*<getModulesChildren>*/
            public function getModulesChildren(
                                                $typeUser,
                                                $rolUser,
                                                $idModule
                                            ){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                if($typeUSer == 'ADMINISTRATIVO'){
                    if($rolUser == 'ADMINISTADOR'){
                        /*<Query> */
                            $querySelect = 'SELECT * FROM   modulos 
                                                    WHERE    
                                                            tipoModulo  = "SEGUNDO NIVEL"      AND                                                   
                                                            idModuloPadre    = '.$idModule.'         AND
                                                            bstate      = 1 ; ';
                        /*</Query> */
                    }else{
                        
                    }
                }else if($typeUSer == 'SOCIO'){
                    /*<Query> */
                        $querySelect = '';
                    /*</Query> */
                }
                
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
                            $JSON_RESULT['message'] = "Good";   
                        /*</Respuesta>*/
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";
                            $JSON_RESULT['querySelect']     = $querySelect;
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this::closet();
                return $JSON_RESULT;
                
            }
        /*</getModules>*/

        

    }
