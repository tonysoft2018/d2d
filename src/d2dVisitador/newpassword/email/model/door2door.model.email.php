<?php



//namespace  d2dVisitador\Newpassword\Email\Model\Newpassword;
    /*<Includes>*/
        include_once('../../../Modules/ModulePugins/door2door.Cofiguration.Conection.php');
        
    /*<Includes>*/
    
    /*<use>*/
        use  d2dVisitador\Modules\ModulePugins\Conection\Conection as ConectionNewpassword;
    /*<use>*/

    class Newpassword extends ConectionNewpassword{
        
        /*<Method construc>*/
            public function __construct(){
                // Cosntruct Father
                parent::__construct();
            }
        /*<Method construc>*/

        /*<RESPUESTA_VALIDAR_CORREO>*/
            public function RESPUESTA_VALIDAR_CORREO($EMAIL){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    $JSON_RESULT['ID_USUARIO']      = 0;
                /*</Variables> */

                /*<Query> */
                    $QuerySelect = 'SELECT 
                                        idUsuario,
                                        email
                                    FROM usuarios
                                        WHERE                                                                   
                                                email   = "'.$EMAIL.'" AND
                                                bstate  = 1       
                                                LIMIT 1; ';
                /*</Query> */

                $JSON_RESULT['querySelect']     = $QuerySelect;

                $this::open();            
                    if ($resultQuery = mysqli_query($this->Connection, $QuerySelect)) {
                        if ($resultQuery->num_rows > 0) {
                            while ($r = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                if($r['email'] == $EMAIL ){
                                    $JSON_RESULT['ID_USUARIO'] = $r['idUsuario'];
                                }else{
                                    $JSON_RESULT['ID_USUARIO'] = 0;
                                }
                            }
                            $JSON_RESULT['message'] = "Good";                                 
                        }else{
                            $JSON_RESULT['message'] = "Bad sin email";                            
                        }
                    }else{
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";                            
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }
                $this::closet();
                
                return $JSON_RESULT;
            }
        /*</RESPUESTA_VALIDAR_CORREO>*/
      

 
        /*<RESPUESTA_CAMBIAR_CONTRASNA>*/
            public function RESPUESTA_CAMBIAR_CONTRASNA(
                    $ID_USUARIO,
                    $EMAIL
                ){
                /*<Variables> */
                    /*</datos>*/
                        $DATE                       = date('Y-m-d h:i:s');                
                        $DATE_TOCKEN                = date('Ymdhis');   
                    /*<datos>*/
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    
                /*</Variables> */

              
                    /*<GENERAR_CONTRASENA>*/
                        /*<VARIBLES>*/
                            $CONTRASENA             = '';
                            $CONTRASENA_ENCRIPTADA  = '';
                        /*<VARIBLES>*/
                        $CONTRASENA                          = date('Ymdhis').date('Ymdhis')."door2door".date('Ymdhis'); 
                        $CONTRASENA_ENCRIPTADA               = password_hash($CONTRASENA, PASSWORD_DEFAULT);
                        $JSON_RESULT['CONTRASENA']           = $CONTRASENA;
                    /*<GENERAR_CONTRASENA>*/
                    
                    /*<Query>*/
                        $queryUpdate = $QueryUpdate =    ' UPDATE  usuarios
                                                            SET     password                = "'.$CONTRASENA_ENCRIPTADA.'",                                                                                            
                                                                    fechaModificacion       = "'.$Date.'",
                                                                    observacion             = " [ UPFATE '.$Date.' ], [ idUser '.$ID_USUARIO.' ] "
                                                                WHERE idUsuario             = '.$ID_USUARIO.';';
                    /*</Query>*/


                    $JSON_RESULT['queryUpdate'] = $queryUpdate;

                    $this->open();        
                        if ( mysqli_query( $this->Connection, $queryUpdate)) {
                            $JSON_RESULT['message']     = "Good";                           
                        } else {
                            $JSON_RESULT['message']     = "Bad";                            
                            $JSON_RESULT['error']       = "Error: <br>" . mysqli_error($this->Connection);
                        }        
                    $this->closet();
                
                return $JSON_RESULT;
            }
        /*</RESPUESTA_CAMBIAR_CONTRASNA>*/

        /*<RESPUESTA_ENVIAR_CORREO>*/
            public function RESPUESTA_ENVIAR_CORREO(
                                $PASSWORD_USER,
                                $EMAIL 
                            ){

                /*<VARIABLES> */
                    $JSON_RESULT                        = [];
                    $JSON_RESULT['message']             = '';
                    $JSON_RESULT['error']               = '';
                    $JSON_RESULT['consultar_gueway']    = 0;

                    $JSON_RESULT['email']    = $EMAIL;

                    $SERVER     = '';
                    $USUARIO    = '';
                    $PASSWORD   = '';
                    $PUERTO     = '';
                /*</VARIABLES> */

                /*<CONSULTAR INFORMACION>*/
                    /*<Query> */
                        $QuerySelect = 'SELECT *  FROM servidorCorreo ORDER BY idSCorreo DESC LIMIT 1';
                    /*</Query> */

                    $JSON_RESULT['querySelect']     = $QuerySelect;

                    $this::open();            
                        if ($resultQuery = mysqli_query($this->Connection, $QuerySelect)) {
                            if ($resultQuery->num_rows > 0) {
                                while ($r = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                    $SERVER     = $r['servidor'];
                                    $USUARIO    = $r['usuarios'];
                                    $PASSWORD   = $r['contrasena'];
                                    $PUERTO     = $r['puerto'];
                                }                            
                            }else{
                                $JSON_RESULT['message'] = "Bad sin email";       
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
                /*</CONSULTAR INFORMACION>*/

                /*<ENVIAR INFORMACION>*/     
                    require      'PHPMailerAutoload.php';
                    $mail = new PHPMailer;      
                    $mail->isSMTP();  

                    /*<EMAIL>*/              
                        $mail->Host         = $SERVER; //'smtp.gmail.com';  
                        $mail->SMTPAuth     = true;                               
                        $mail->Username     = $USUARIO; //'carlos.andres.g.g.desarrollo@gmail.com';                
                        $mail->Password     = $PASSWORD; //'noepewmuutuikulw';                           
                        $mail->SMTPSecure   = 'tls';                           
                        $mail->Port         = $PUERTO; //587;   
                    /*<EMAIL>*/                                

                    /*<CONTRUIR CORRO>*/
                        $mail->setFrom($EMAIL, 'door2door');  
                        $mail->addAddress($EMAIL);    
                        $mail->isHTML(true);         

                        $URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 

                        $mail->Subject = 'Recuperacion de contraseña';  
                        $mail->Body    = '¡NUEVA CONTRASEÑA !  </b> '.$PASSWORD_USER;  
                    /*</CONTRUIR CORRO>*/                   

                    /*<ENVIAR INFORMACION>*/
                        if(!$mail->send()) {
                            $JSON_RESULT['email']    = 'Error de correo: ' . $mail->ErrorInfo;
                            $JSON_RESULT['message']  = 'bad';       
                        } else {
                            $JSON_RESULT['email']    = 'GoodEmail';     
                            $JSON_RESULT['message']  = 'Good';                       
                        }
                    /*<ENVIAR INFORMACION>*/
                /*</ENVIAR INFORMACION>*/

                return $JSON_RESULT;

            }
        /*</RESPUESTA_ENVIAR_CORREO>*/

        
       
    }