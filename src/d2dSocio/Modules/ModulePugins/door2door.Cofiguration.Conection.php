<?php
                
                
/*
*    Autor: Carlos Andres González Gómez  
*    Description; Class of connection MariaDb
**/

namespace  d2dSocio\Modules\ModulePugins\Conection;

    class Conection {
      
        private $Server;
        private $User;
        private $Password;
        private $Database;

        
        public $Connection;

        public function __construct(){
            $this->Server = 'mysql';
            $this->User = 'root';
            $this->Password = 'Kb.204.h3';
            $this->Database = 'door2door';
        }

        public function open(){ 
            /*<En el servidors>*/
                $this->Connection = mysqli_connect(    
                    '74.208.28.66', 
                    'conexion', 
                    'Kb.204.h32023', 
                    'door2door' 
                                            );   
                $this->Connection->set_charset("utf8");
                   /* change character set to utf8 */
            
                 
            /*<En el servidors>*/        
        }

        /*<Abrir coneccion>* en  docker 
            public function open(){
            
                    $this->Connection  = mysqli_connect(    
                        
                        '74.208.28.66', 
                        'conexion', 
                        'Kb.204.h32023', 
                        'door2door' 
                        
                         'mysql', 
                        'root', 
                        'Kb.204.h3', 
                        'door2door' 
                        '74.208.28.66', 
                    );
                
            }
        </Abrir coneccion>*/
        
        public function closet(){
            mysqli_close($this->Connection);                
        }

        public function tracking(
                                    $idUsuario,
                                    $modelo,
                                    $baseDatos,
                                    $tipoOperacion,
                                    $idClave
                                ){
            /*<datos>*/
                $DATE                       = date('Y-m-d h:i:s');
                $JSON_RESULT                = [];
                $JSON_RESULT['message']     = '';
                $JSON_RESULT['error']       = '';
            /*</datos>*/
            if($modelo != '' &&  $baseDatos != '' && $tipoOperacion != '' ){
                if($tipoOperacion != 'UPDATE'){
                    
                    /*<Query>*/
                        $queryInsert = 'INSERT INTO seguimientos ( 
                                                fecha, 
                                                idUsuario,  
                                                modelo,                                                  
                                                baseDatos,   
                                                tipoOperacion,   

                                                fechaCreacion, 
                                                fechaModificacion,
                                                observacion,
                                                bstate
                                                ) VALUES( 
                                                    "'.$DATE.'", 
                                                    "'.$idUsuario.'", 
                                                    "'.$modelo.'", 
                                                    "'.$baseDatos.'", 
                                                    "'.$tipoOperacion.'", 
                                                    "'.$DATE.'",
                                                    "'.$DATE.'",
                                                    " [ INSERT '.$DATE.' ], [ idUser '.$idUsuario.' ] ",
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
                    $querySelect = ' SELECT * FROM '.$modelo.' ORDER BY '.$idClave.' DESC LIMIT 1';
                    $this->open(); 
                        if ( $resultQuery = mysqli_query( $this->Connection, $querySelect)) {
                            $registroAnterior = '';
                            while ($row = $resultQuery->fetch_array(MYSQLI_ASSOC)) {                               
                                foreach ( $row as $clave => $valor ) {   
                                    $registroAnterior .=  '[ '.$clave.'] => [ '.$valor .' ] '; 
                                }     
                            }
                            $queryInsert = 'INSERT INTO seguimientos ( 
                                                        fecha, 
                                                        idUsuario,  
                                                        modelo,                                                  
                                                        baseDatos,   
                                                        tipoOperacion,   
                                                        registroAnterior,

                                                        fechaCreacion, 
                                                        fechaModificacion,
                                                        observacion,
                                                        bstate
                                                        ) VALUES( 
                                                            "'.$DATE.'", 
                                                            "'.$idUsuario.'", 
                                                            "'.$modelo.'", 
                                                            "'.$baseDatos.'", 
                                                            "'.$tipoOperacion.'", 
                                                            "'.$registroAnterior .'",
                                                            "'.$DATE.'",
                                                            "'.$DATE.'",
                                                            " [ INSERT '.$DATE.' ], [ idUser '.$idUsuario.' ] ",
                                                            1
                                                        );';
                            if ( mysqli_query( $this->Connection, $queryInsert)) {
                                $JSON_RESULT['message']     = "Good";
                            } else {
                                $JSON_RESULT['message']     = "Bad";
                                $JSON_RESULT['queryInsert'] = $queryInsert;
                                $JSON_RESULT['error']       = "Error: <br>" . mysqli_error($this->Connection);
                            }       

                        }else {
                            $JSON_RESULT['message']     = "Bad";
                            $JSON_RESULT['querySelect'] = $querySelect;
                            $JSON_RESULT['error']       = "Error: <br>" . mysqli_error($this->Connection);
                        } 
                    $this->closet();   

                }            
            }else{
                $JSON_RESULT['message']  = 'fail variable tracking';            
            }
            return $JSON_RESULT;
        }

        
        public function getDatabase(){ return $this->Database; }
        public function setDatabase($Database){$this->Database = $Database; return $this; }

        public function getPassword(){ return $this->Password; }
        public function setPassword($Password){$this->Password = $Password;return $this;}

        public function getUser(){ return $this->User; }    
        public function setUser($User){ $this->User = $User;  return $this; }

        public function getServer(){ return $this->Server;  }
        public function setServer($Server){ $this->Server = $Server; return $this; }
    }



?>