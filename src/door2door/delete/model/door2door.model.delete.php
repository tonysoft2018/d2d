<?php

    /*<Includes>*/
        include_once('../../Modules/ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    
    /*<use>*/
        use  door2door\Modules\ModulePugins\Conection\Conection as ConectionLogin;
    /*<use>*/

    class delete extends ConectionLogin{

        /*<Method construc>*/
            public function __construct(){
                // Cosntruct Father
                parent::__construct();
            }
        /*<Method construc>*/

        /*<RESULTADO_VALIDADOR>*/
            public function RESULTADO_VALIDADOR($user, $password){
 
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */

                /*<Query>*/
                    $QuerySelect = '  SELECT 
                                                idUsuario,          
                                                password,       
                                                usuario,    
                                                email   
                                        FROM usuarios usu   
                                            WHERE  
                                                    usu.bstate           = 1    AND  
                                                    (   
                                                        usu.tipoPerfil   = "SOCIO CLIENTE"  OR  
                                                        usu.tipoPerfil   = "SOCIO VISITADOR"  
                                                    )    AND                                     
                                                    usu.usuario         = "'.$user.'" 
                                                    LIMIT 1; ';  
                /*</Query>*/
                
                $JSON_RESULT['querySelect']     = $QuerySelect;

                $this::open();            
                    if ($resultQuery = mysqli_query($this->Connection, $QuerySelect)) {
                        if ($resultQuery->num_rows > 0) 
                        {                            
                            while ($r = $resultQuery->fetch_array(MYSQLI_ASSOC)) 
                            {
                                if( password_verify($password, $r['password'] ))
                                {             
                                    $JSON_RESULT['message'] = "Good";
                                    $JSON_RESULT["userValitor"]     = "correct_user_door2door";
                                    $JSON_RESULT["ID_USUARIO"]      = $r['idUsuario'];   
                                    $JSON_RESULT["CORREO"]          = $r['email'];    
                                    return $JSON_RESULT;                              
                                }else{
                                    $JSON_RESULT['message'] = "Good";
                                    $JSON_RESULT['userValitor'] = "Not exists";     
                                    return $JSON_RESULT;     
                                }
                            }
                           
                        }else{
                            $JSON_RESULT['message']     = "BAD";      
                            $JSON_RESULT['userValitor'] = "Not exists";     
                            return $JSON_RESULT;                     
                        }
                    }else{
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                            return $JSON_RESULT;
                        /*</Respuesta>*/
                    }
                $this::closet();

                return $JSON_RESULT;
            }
        /*</RESULTADO_VALIDADOR>*/

        /*<RESULTADO_ELIMINAR_USUARIO>*/
            public function RESULTADO_ELIMINAR_USUARIO($idUser){  

                /*<Variables> */
                    /*</datos>*/
                        $DATE                       = date('Y-m-d h:i:s');
                    /*<datos>*/
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error'] = '';
                    $JSON_RESULT['idUser'] = $idUser;
                /*</Variables> */

                /*<Query>*/
                    $queryDeleteUpdate = '  UPDATE  usuarios 
                                                SET     bstate              = 0, 
                                                        estatus             = "INACTIVO",                                                   
                                                        fechaModificacion   = "'.$DATE.'",
                                                        observacion      = " [ DELETE '.$DATE.' ], [ idUser '.$idUser.' DESDE LA PAGUINA DE ELIMINACION  ] "
                                                WHERE idUsuario = '.$idUser.';';
                /*</Query>*/

                $JSON_RESULT['queryDeleteUpdate']     = $queryDeleteUpdate;

                $this->open();
                    if (mysqli_query($this->Connection, $queryDeleteUpdate)) {
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
        /*</RESULTADO_ELIMINAR_USUARIO>*/

        /*<RESULTADO_ENVIAR_CORREO>*/
            public function RESULTADO_ENVIAR_CORREO($EMAIL)
            {

                /*<CONSULTAR INFORMACION>*/

                    /*<Query> */
                        $QuerySelect = 'SELECT *  
                                            FROM servidorCorreo 
                                                ORDER BY idSCorreo 
                                                    DESC LIMIT 1';
                    /*</Query> */

                    $JSON_RESULT['querySelect']     = $QuerySelect;

                    $this::open();            
                        if ($resultQuery = mysqli_query($this->Connection, $QuerySelect)) {
                            if ($resultQuery->num_rows > 0) 
                            {
                                while ($r = $resultQuery->fetch_array(MYSQLI_ASSOC)) 
                                {
                                    $SERVER     = $r['servidor'];
                                    $USUARIO    = $r['usuarios'];
                                    $PASSWORD   = $r['contrasena'];
                                    $PUERTO     = $r['puerto'];
                                }                            
                            }
                            else
                            {
                                $JSON_RESULT['message']         = "Bad sin email";       
                                return $JSON_RESULT;                     
                            }
                        }
                            else
                        {
                            /*<Respuesta>*/
                                $JSON_RESULT['message']         = "Bad";                            
                                $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                                return $JSON_RESULT;
                            /*</Respuesta>*/                            
                        }
                    $this::closet();

                /*</CONSULTAR INFORMACION>*/

                /*<ENVIAR INFORMACION>*/     

                    require      'PHPMailerAutoload.php';

                    $mail = new PHPMailer;      

                    $mail->isSMTP();  

                    /*<EMAIL>*/         

                        $mail->Host         = $SERVER;   
                        $mail->SMTPAuth     = true;                                
                        $mail->Username     = $USUARIO;        
                        $mail->Password     = $PASSWORD;                    
                        $mail->SMTPSecure   = 'tls';                               
                        $mail->Port         = $PUERTO;     

                    /*<EMAIL>*/                                

                    /*<CONTRUIR CORRO>*/

                        $mail->setFrom(     $EMAIL, 'door2door' );  
                        $mail->addAddress(  $EMAIL              );    
                        $mail->isHTML(      true                );         

                        $URL            = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 

                        $mail->Subject  = '';  
                        $mail->Body     = '¡ TU CUENTA FUE ELIMINADA PERMANENTE MENTE ! </b>';  

                    /*</CONTRUIR CORRO>*/                   

                    /*<ENVIAR INFORMACION>*/

                        if(!$mail->send()) 
                        {
                            $JSON_RESULT['email']    = 'Error de correo: ' . $mail->ErrorInfo;
                            $JSON_RESULT['message']  = 'bad';       
                        } 
                            else 
                        {
                            $JSON_RESULT['email']    = 'GoodEmail';     
                            $JSON_RESULT['message']  = 'Good';                       
                        }

                    /*<ENVIAR INFORMACION>*/

                /*</ENVIAR INFORMACION>*/
                return $JSON_RESULT;
            }
        /*</RESULTADO_ENVIAR_CORREO>*/

    }