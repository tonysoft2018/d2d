<?php



//namespace  d2dSocio\Newpassword\Email\Model\Newpassword;
    /*<Includes>*/
        include_once('../../../Modules/ModulePugins/door2door.Cofiguration.Conection.php');
        
    /*<Includes>*/
    
    /*<use>*/
        use  door2door\Modules\ModulePugins\Conection\Conection as ConectionNewpassword;
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
 
        /*<RESPUESTA_CREAR_TOCKEN>*/
            public function RESPUESTA_CREAR_TOCKEN(
                    $ID_USUARIO,
                    $EMAIL
                ){
                /*<Variables> */
                    /*</datos>*/
                        $DATE                       = date('Y-m-d h:i:s');                
                        $DATE_TOCKEN                = date('Ymdhis');   
                        $TOCKEN                     = $EMAIL.$DATE_TOCKEN.$ID_USUARIO.'DOOR2DOOR';         
                        $TOCKEN                     = password_hash($TOCKEN, PASSWORD_DEFAULT);   
                        $TOCKEN                     = base64_encode($TOCKEN);
                    /*<datos>*/
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                    $JSON_RESULT['TOCKEN']          = $TOCKEN;
                    
                /*</Variables> */

              
                    /*<Query>*/
                        $queryInsert = 'INSERT INTO tockenRecuperacion ( 
                                                idUsuario, 
                                                fechaPeticion,  
                                                email,
                                                tocken,
                                                status,
                                                fechaCreacion, 
                                                fechaModificacion,
                                                observacion,
                                                bstate
                                                ) VALUES( 
                                                    "'.$ID_USUARIO.'", 
                                                    "'.$DATE.'",
                                                    "'.$EMAIL.'",    
                                                    "'.$TOCKEN.'",                                        
                                                    "PENDIENTE",
                                                    "'.$DATE.'",
                                                    "'.$DATE.'",
                                                    " [ INSERT '.$DATE.' ], [ idUser '.$ID_USUARIO.' ] ",
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
        /*</RESPUESTA_CREAR_TOCKEN>*/

        /*<RESPUESTA_ENVIAR_CORREO>*/
            public function RESPUESTA_ENVIAR_CORREO( $TOCKEN,  $EMAIL  ){

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
                        $mail->Body    = '¡Use este enlace en las próximas 24 horas para recuperar la contraseña!  </b>'.
                                        $URL.'/d2dSocio/newpassword/tocken/index.php?tocken='.$TOCKEN;  
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