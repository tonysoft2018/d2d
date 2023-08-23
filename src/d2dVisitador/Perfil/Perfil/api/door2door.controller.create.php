<?php
/*<Include classes>*/
    include_once('../model/door2door.model.perfil.php');
    //include_once('../../../Modules/ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    //use  d2dVisitador\Modules\ModulePugins\GeneradorTocken\GeneradorTocken                                   as GeneradorTocken_create;
    //use  d2dVisitador\Perfil\Perfil\Model\Perfil\Perfil                                                     as Services_create;
/*<Import>*/   

/*<Instaciacion de objetos>*/                
   // $ObjectToken = new GeneradorTocken_create();
/*</Instaciacion de objetos>*/

/*<Variables generales>*/
$URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
//$URLtocken = $URL.'-'.$ObjectToken->generatorTocken('tocken-door2doors-01198756765345431234534ASDFSDFSDF-');
/*<Variables generales>*/

/*<Validacion de tocken>*/
if( /*isset($_POST['TockenOfdoor2doordoor2door']) && (
                                                        $_POST['TockenOfdoor2doordoor2door'] == $URLtocken  ||
                                                        $ObjectToken->validadorTocken($URLtocken) 
                                                    )*/true){          

        
        /*<Controlador>*/      
            try{
                /*<Instaciacion de objetos>*/                
                    $Object = new Perfil();

                    $ID_USUARIO                     = $_POST['idUsuario'];
                    $NOMBRE                         = '';
                    $FACE                           = $_POST['face-de-creacion'];
                    $DIRECCION                      = '';

                    $RESPUESTA_NOMBRE               = [];

                    $RESPUESTA_FACE_PRIMERA         = [];
                    $RESPUESTA_FACE_SECUNDARIA      = [];                   
                    $RESPUESTA_FACE_TERCEARIA       = [];
                    $RESPUESTA_FACE_CUARTA          = [];
                    $RESPUESTA_FACE_QUINTA          = [];
                    $RESPUESTA_FACE_SEXTA           = [];
                    $RESPUESTA_FACE_SEPTIMA         = [];
                    $RESPUESTA_FACE_OCTABA          = [];

                    $RESPUESTA_FACE_NOVENA_ONO      = [];
                    $RESPUESTA_FACE_NOVENA_TODOS    = [];

                    $RESPUESTA_FACE_CANCELAR        = [];
                    $RESPUESTA_FACE_ELIMINAR        = [];
                    $RESPUESTA_ELIMINAR_PERFIL      = [];

                    $JSON_RESULT                    = [];


                    $JSON_RESULT['ID_USUARIO']      = $ID_USUARIO;
                    $JSON_RESULT['FACE']            = $FACE;

                    

                /*</Instaciacion de objetos>*/ 

                /*<RESPUESTA_NOMBRE>*/
                    /*<RESPUESTA_NOMBRE>*/
                        $RESPUESTA_NOMBRE = $Object->RESPUESTA_NOMBRE(  $ID_USUARIO );
                    /*</RESPUETA_NOMBRE_REPETIDO>*/
                    if($RESPUESTA_NOMBRE['message'] != 'Good'){
                        $JSON_RESULT['message']                             = 'RESPUESTA_NOMBRE';
                        $JSON_RESULT['RESPUESTA_NOMBRE']                    = $RESPUESTA_NOMBRE;
                        echo json_encode($JSON_RESULT);                
                        return false;
                    }else{
                        $NOMBRE                                             = $RESPUESTA_NOMBRE['usuario'];
                        $JSON_RESULT['RESPUESTA_NOMBRE']                    = $RESPUESTA_NOMBRE;
                    }
                /*</RESPUETA_NOMBRE_REPETIDO>*/ 

           

                switch($FACE){
                    case 'FACE_PRIMERA':{

                        /*<FOTO DE PERFIL>*/
                            /*<DIRECCION>*/
                                foreach($_FILES as $file){
                                    if($file["error"]==UPLOAD_ERR_OK)
                                    {
                                        move_uploaded_file($file["tmp_name"], 'Documentos/'.$NOMBRE.$ID_USUARIO.date("Ymdhis").".".$file["name"]);   
                                        $DIRECCION = '/d2dVisitador/Perfil/Perfil/api/Documentos/'.$NOMBRE.$ID_USUARIO.date("Ymdhis").".".$file["name"];                       
                                    }
                                }
                            /*<DIRECCION>*/                        

                            /*<RESPUESTA_FACE_PRIMERA>*/
                                /*<RESPUESTA_FACE_PRIMERA>*/
                                    $RESPUESTA_FACE_PRIMERA = $Object->RESPUESTA_FACE_PRIMERA(  $ID_USUARIO , $DIRECCION);
                                /*</RESPUESTA_FACE_PRIMERA>*/
                                if($RESPUESTA_FACE_PRIMERA['message'] != 'Good'){
                                    $JSON_RESULT['message']                                 = 'RESPUESTA_FACE_PRIMERA';
                                    $JSON_RESULT['RESPUESTA_FACE_PRIMERA']                  = $RESPUESTA_FACE_PRIMERA;
                                    echo json_encode($JSON_RESULT);                
                                    return false;
                                }else{
                                    $JSON_RESULT['RESPUESTA_FACE_PRIMERA']                  = $RESPUESTA_FACE_PRIMERA;
                                }
                            /*</RESPUESTA_FACE_PRIMERA>*/ 
                        /*</FOTO DE PERFIL>*/     

                        break;
                    }
                    case 'FACE_SECUNDARIA':{

                        $CALLE          = $_POST['create-calle-door2door'];
                        $NO_INTERIOR    = $_POST['create-nointerior-door2door'];
                        $NO_EXTERIOR    = $_POST['create-noexterior-door2door'];
                        $CODIGO_POSTAL  = $_POST['create-codigopostal-door2door'];
                        $COLONIA        = $_POST['create-colonia-door2door'];
                        $ID_PAIS        = $_POST['create-pais-door2door'];
                        $ID_ESTADO      = $_POST['create-estado-door2door'];
                        $ID_MINICIPIO   = $_POST['create-municipio-door2door'];

                        /*<RESPUESTA_FACE_SECUNDARIA>*/
                            /*<RESPUESTA_FACE_SECUNDARIA>*/
                                $RESPUESTA_FACE_SECUNDARIA = $Object->RESPUESTA_FACE_SECUNDARIA(  
                                                                                                    $ID_USUARIO,
                                                                                                    $CALLE,   
                                                                                                    $NO_INTERIOR,     
                                                                                                    $NO_EXTERIOR,    
                                                                                                    $CODIGO_POSTAL,    
                                                                                                    $COLONIA,    
                                                                                                    $ID_PAIS,    
                                                                                                    $ID_ESTADO,    
                                                                                                    $ID_MINICIPIO
                                                                                                );
                            /*</RESPUESTA_FACE_SECUNDARIA>*/
                            if($RESPUESTA_FACE_SECUNDARIA['message'] != 'Good'){
                                $JSON_RESULT['message']                                 = 'RESPUESTA_FACE_SECUNDARIA';
                                $JSON_RESULT['RESPUESTA_FACE_SECUNDARIA']               = $RESPUESTA_FACE_SECUNDARIA;
                                echo json_encode($JSON_RESULT);                
                                return false;
                            }else{
                                $JSON_RESULT['RESPUESTA_FACE_SECUNDARIA']               = $RESPUESTA_FACE_SECUNDARIA;
                            }
                        /*</RESPUESTA_FACE_SECUNDARIA>*/ 

                        break;
                    }
                    case 'FACE_TERCEARIA':{


                        /*<RESPUESTA_FACE_TERCEARIA>*/
                            /*<RESPUESTA_FACE_TERCEARIA>*/
                                $RESPUESTA_FACE_TERCEARIA = $Object->RESPUESTA_FACE_TERCEARIA(  $ID_USUARIO );
                            /*</RESPUESTA_FACE_TERCEARIA>*/
                            if($RESPUESTA_FACE_TERCEARIA['message'] != 'Good'){
                                $JSON_RESULT['message']                                 = 'RESPUESTA_FACE_TERCEARIA';
                                $JSON_RESULT['RESPUESTA_FACE_TERCEARIA']                  = $RESPUESTA_FACE_TERCEARIA;
                                echo json_encode($JSON_RESULT);                
                                return false;
                            }else{
                                $JSON_RESULT['RESPUESTA_FACE_TERCEARIA']                  = $RESPUESTA_FACE_TERCEARIA;
                            }
                        /*</RESPUESTA_FACE_TERCEARIA>*/ 

                        break;
                    }
                    case 'FACE_CUARTA':{ 

                        /*<COMPROBANTE DE DOMICILIO>*/

                         
                            $DIRECCION = '-';
                            /*<DIRECCION>*/
                                foreach($_FILES as $file){
                                    if($file["error"]==UPLOAD_ERR_OK)
                                    {
                                        move_uploaded_file($file["tmp_name"], 'Documentos/'.$NOMBRE.$ID_USUARIO.date("Ymdhis").".".$file["name"]);   
                                        $DIRECCION = '/d2dVisitador/Perfil/Perfil/api/Documentos/'.$NOMBRE.$ID_USUARIO.date("Ymdhis").".".$file["name"];                          
                                    }else{
                                        $DIRECCION = 'nada';
                                    }
                                }
                            /*<DIRECCION>*/

                            /*<RESPUESTA_FACE_CUARTA>*/
                                /*<RESPUESTA_FACE_CUARTA>*/
                                    $RESPUESTA_FACE_CUARTA = $Object->RESPUESTA_FACE_CUARTA(  $ID_USUARIO, $DIRECCION );
                                /*</RESPUESTA_FACE_CUARTA>*/
                                if($RESPUESTA_FACE_CUARTA['message'] != 'Good'){
                                    $JSON_RESULT['message']                                 = 'RESPUESTA_FACE_CUARTA';
                                    $JSON_RESULT['RESPUESTA_FACE_CUARTA']                   = $RESPUESTA_FACE_CUARTA;
                                    echo json_encode($JSON_RESULT);                 
                                    return false;
                                }else{
                                    $JSON_RESULT['RESPUESTA_FACE_CUARTA']                  = $RESPUESTA_FACE_CUARTA;
                                }
                            /*</RESPUESTA_FACE_CUARTA>*/ 

                        /*</COMPROBANTE DE DOMICILIO>*/
                        break;
                    }
                    case 'FACE_QUINTA':{

                        /*<INE FRENTE>*/
                            /*<DIRECCION>*/
                                foreach($_FILES as $file){
                                    if($file["error"]==UPLOAD_ERR_OK)
                                    {
                                        move_uploaded_file($file["tmp_name"], 'Documentos/'.$NOMBRE.$ID_USUARIO.date("Ymdhis").".".$file["name"]);    
                                        $DIRECCION = '/d2dVisitador/Perfil/Perfil/api/Documentos/'.$NOMBRE.$ID_USUARIO.date("Ymdhis").".".$file["name"];                         
                                    }
                                }
                            /*<DIRECCION>*/

                            /*<RESPUESTA_FACE_QUINTA>*/
                                /*<RESPUESTA_FACE_QUINTA>*/
                                    $RESPUESTA_FACE_QUINTA = $Object->RESPUESTA_FACE_QUINTA(  $ID_USUARIO , $DIRECCION);
                                /*</RESPUESTA_FACE_QUINTA>*/
                                if($RESPUESTA_FACE_QUINTA['message'] != 'Good'){
                                    $JSON_RESULT['message']                                 = 'RESPUESTA_FACE_QUINTA';
                                    $JSON_RESULT['RESPUESTA_FACE_QUINTA']                   = $RESPUESTA_FACE_QUINTA;
                                    echo json_encode($JSON_RESULT);                 
                                    return false;
                                }else{
                                    $JSON_RESULT['RESPUESTA_FACE_QUINTA']                  = $RESPUESTA_FACE_QUINTA;
                                }
                            /*</RESPUESTA_FACE_QUINTA>*/ 
                        /*</INE FRENTE>*/
                        break;
                    }
                    case 'FACE_SEXTA':{

                        /*<INE ATRAS>*/
                            /*<DIRECCION>*/
                                foreach($_FILES as $file){
                                    if($file["error"]==UPLOAD_ERR_OK)
                                    {
                                        move_uploaded_file($file["tmp_name"], 'Documentos/'.$NOMBRE.$ID_USUARIO.date("Ymdhis").".".$file["name"]);   
                                        $DIRECCION = '/d2dVisitador/Perfil/Perfil/api/Documentos/'.$NOMBRE.$ID_USUARIO.date("Ymdhis").".".$file["name"];                         
                                    }
                                }
                            /*<DIRECCION>*/

                            /*<RESPUESTA_FACE_SEXTA>*/
                                /*<RESPUESTA_FACE_SEXTA>*/
                                    $RESPUESTA_FACE_SEXTA = $Object->RESPUESTA_FACE_SEXTA(  $ID_USUARIO , $DIRECCION );
                                /*</RESPUESTA_FACE_SEXTA>*/
                                if($RESPUESTA_FACE_SEXTA['message'] != 'Good'){
                                    $JSON_RESULT['message']                                = 'RESPUESTA_FACE_SEXTA';
                                    $JSON_RESULT['RESPUESTA_FACE_SEXTA']                   = $RESPUESTA_FACE_SEXTA;
                                    echo json_encode($JSON_RESULT);                 
                                    return false;
                                }else{
                                    $JSON_RESULT['RESPUESTA_FACE_SEXTA']                  = $RESPUESTA_FACE_SEXTA;
                                }
                            /*</RESPUESTA_FACE_SEXTA>*/ 

                        /*<INE ATRAS>*/
                        break;
                    }                    
                    case 'FACE_SEPTIMA':{

                        /*<INE FRENTE>*/
                            /*<DIRECCION>*/
                                foreach($_FILES as $file){
                                    if($file["error"]==UPLOAD_ERR_OK)
                                    {
                                        move_uploaded_file($file["tmp_name"], 'Documentos/'.$NOMBRE.$ID_USUARIO.date("Ymdhis").".".$file["name"]);    
                                        $DIRECCION = '/d2dVisitador/Perfil/Perfil/api/Documentos/'.$NOMBRE.$ID_USUARIO.date("Ymdhis").".".$file["name"];                          
                                    }
                                }
                            /*<DIRECCION>*/

                            /*<RESPUESTA_FACE_SEPTIMA>*/
                                /*<RESPUESTA_FACE_SEPTIMA>*/
                                    $RESPUESTA_FACE_SEPTIMA = $Object->RESPUESTA_FACE_SEPTIMA(  $ID_USUARIO , $DIRECCION);
                                /*</RESPUESTA_FACE_SEPTIMA>*/
                                if($RESPUESTA_FACE_SEPTIMA['message'] != 'Good'){
                                    $JSON_RESULT['message']                                = 'RESPUESTA_FACE_SEPTIMA';
                                    $JSON_RESULT['RESPUESTA_FACE_SEPTIMA']                 = $RESPUESTA_FACE_SEPTIMA;
                                    echo json_encode($JSON_RESULT);                 
                                    return false;
                                }else{
                                    $JSON_RESULT['RESPUESTA_FACE_SEPTIMA']                  = $RESPUESTA_FACE_SEPTIMA;
                                }
                            /*</RESPUESTA_FACE_SEPTIMA>*/ 
                        /*<INE FRENTE>*/
                        break;
                    }
                    case 'FACE_SEPTIMA_MEDIA':{

                        /*<INE FRENTE>*/
                            $TIPO_VEHICULO = $_POST['create-tipoVehiculo-door2door'];

                            /*<RESPUESTA_FACE_SEPTIMA_MEDIA>*/
                                /*<RESPUESTA_FACE_SEPTIMA_MEDIA>*/
                                    $RESPUESTA_FACE_SEPTIMA_MEDIA = $Object->RESPUESTA_FACE_SEPTIMA_MEDIA(  $ID_USUARIO ,  $TIPO_VEHICULO );
                                /*</RESPUESTA_FACE_SEPTIMA_MEDIA>*/
                                if($RESPUESTA_FACE_SEPTIMA['message'] != 'Good'){
                                    $JSON_RESULT['message']                                = 'RESPUESTA_FACE_SEPTIMA_MEDIA';
                                    $JSON_RESULT['RESPUESTA_FACE_SEPTIMA_MEDIA']           = $RESPUESTA_FACE_SEPTIMA_MEDIA;
                                    echo json_encode($JSON_RESULT);                 
                                    return false;
                                }else{
                                    $JSON_RESULT['RESPUESTA_FACE_SEPTIMA_MEDIA']           = $RESPUESTA_FACE_SEPTIMA_MEDIA;
                                }
                            /*</RESPUESTA_FACE_SEPTIMA_MEDIA>*/ 
                        /*<INE FRENTE>*/
                        break;
                    }
                    case 'FACE_OCTABA':{
                        /*<TARJETA BANCARIA>*/

                            /*<DIRECCION>*/
                                foreach($_FILES as $file){
                                    if($file["error"]==UPLOAD_ERR_OK)
                                    {
                                        move_uploaded_file($file["tmp_name"], 'Documentos/'.$NOMBRE.$ID_USUARIO.date("Ymdhis").".".$file["name"]);   
                                        $DIRECCION = '/d2dVisitador/Perfil/Perfil/api/Documentos/'.$NOMBRE.$ID_USUARIO.date("Ymdhis").".".$file["name"];                        
                                    }
                                }
                            /*<DIRECCION>*/

                            /*<RESPUESTA_FACE_OCTABA>*/
                                /*<RESPUESTA_FACE_OCTABA>*/
                                    $RESPUESTA_FACE_OCTABA = $Object->RESPUESTA_FACE_OCTABA(  $ID_USUARIO , $DIRECCION );
                                /*</RESPUESTA_FACE_OCTABA>*/
                                if($RESPUESTA_FACE_OCTABA['message'] != 'Good'){
                                    $JSON_RESULT['message']                                = 'RESPUESTA_FACE_OCTABA';
                                    $JSON_RESULT['RESPUESTA_FACE_OCTABA']                  = $RESPUESTA_FACE_OCTABA;
                                    echo json_encode($JSON_RESULT);                 
                                    return false;
                                }else{
                                    $JSON_RESULT['RESPUESTA_FACE_OCTABA']                  = $RESPUESTA_FACE_OCTABA;
                                }
                            /*</RESPUESTA_FACE_OCTABA>*/ 

                        /*<TARJETA BANCARIA>*/
                        break;
                    }
                    case 'FACE_OCTABA_MEDIA':{
                        /*<TARJETA BANCARIA>*/

                            $BANCO              = $_POST['create-banco-door2door'];
                            $NOMBRE_PROPIETARIO = $_POST['create-nombrep-door2door'];
                            $NUMERO_CUENTA      = $_POST['create-numeroCuenta-door2door'];

                            /*<RESPUESTA_FACE_OCTABA_MEDIA>*/
                                /*<RESPUESTA_FACE_OCTABA_MEDIA>*/
                                    $RESPUESTA_FACE_OCTABA_MEDIA = $Object->RESPUESTA_FACE_OCTABA_MEDIA(  $ID_USUARIO ,  );
                                /*</RESPUESTA_FACE_OCTABA_MEDIA>*/
                                if($RESPUESTA_FACE_OCTABA_MEDIA['message'] != 'Good'){
                                    $JSON_RESULT['message']                                = 'RESPUESTA_FACE_OCTABA_MEDIA';
                                    $JSON_RESULT['RESPUESTA_FACE_OCTABA_MEDIA']                  = $RESPUESTA_FACE_OCTABA_MEDIA;
                                    echo json_encode($JSON_RESULT);                 
                                    return false;
                                }else{
                                    $JSON_RESULT['RESPUESTA_FACE_OCTABA_MEDIA']                  = $RESPUESTA_FACE_OCTABA_MEDIA;
                                }
                            /*</RESPUESTA_FACE_OCTABA_MEDIA>*/ 

                        /*<DATOS BANCARIA>*/
                        break;
                    }
                    case 'FACE_NOVENA_MEDIA':{
                        /*<TARJETA BANCARIA>*/
                            $RESPUESTA_FACE_NOVENA_ONO      = [];
                            $RESPUESTA_FACE_NOVENA_TODOS    = [];

                            $JSON_ARRAIS                    = [];
                            $JSON_ARRAIS                    = $_POST['arrays'];

                            /*<RECORRER EL ARRAIS>*/
                                for($i = 0; $i < count($JSON_ARRAIS); $i++){

                                    $ARREGLO_ID_PREGUNTA    = '';
                                    $ARREGLO_PREGUNTA       = '';
                                    $ARREGLO_RESPUESTA      = '';

                                    foreach ( $JSON_ARRAIS[$i] as $clave => $valor ) {          
                                        if( 
                                                $clave == ''        || 
                                                $clave == 'idPregunta'     || 
                                                $clave == 'respuesta'      ||
                                                $clave == 'pregunta'       
                                            ){
                                            if(
                                                    $valor != '' || 
                                                    $valor != null
                                                    
                                            ){
                                                if($clave == 'respuesta'    ){   $ARREGLO_ID_PREGUNTA        = $valor;      }
                                                if($clave == 'pregunta'     ){   $ARREGLO_PREGUNTA           = $valor;      } 
                                                if($clave == 'idPregunta'   ){   $ARREGLO_RESPUESTA          = $valor;      } 
                                            }  
                                        }                        
                                    }    
                                    /*<RESPUESTA_FACE_NOVENA_ONO>*/

                                        /*<RESPUESTA_FACE_NOVENA_ONO>*/
                                            $RESPUESTA_FACE_NOVENA_ONO = $Object->RESPUESTA_FACE_NOVENA_ONO(  
                                                                                                                $ID_USUARIO ,  
                                                                                                                $ARREGLO_PREGUNTA,
                                                                                                                $ARREGLO_RESPUESTA
                                                                                                            );
                                        /*</RESPUESTA_FACE_NOVENA_ONO>*/

                                        if($RESPUESTA_FACE_NOVENA_ONO['message'] != 'Good'){
                                            $JSON_RESULT['message']                                     = 'RESPUESTA_FACE_NOVENA_ONO';
                                            array_push( $RESPUESTA_FACE_NOVENA_TODOS,                   $RESPUESTA_FACE_NOVENA_ONO);
                                            $JSON_RESULT['RESPUESTA_FACE_NOVENA_TODOS']                 = $RESPUESTA_FACE_NOVENA_TODOS;
                                            echo json_encode($JSON_RESULT);                 
                                            return false;
                                        }else{
                                            array_push( $RESPUESTA_FACE_NOVENA_TODOS,                   $RESPUESTA_FACE_NOVENA_ONO);
                                        }
                                    /*</RESPUESTA_FACE_OCTABA_MEDIA>*/ 
                                }
                            /*<RECORRER EL ARRAIS>*/

                            /*<SECCION PREGUNTAS>*/
                                $JSON_RESULT['RESPUESTA_FACE_NOVENA_TODOS']                  = $RESPUESTA_FACE_NOVENA_TODOS;
                            /*<SECCION PREGUNTAS>*/


                            


                            

                        /*<DATOS BANCARIA>*/
                        break;
                    }
                    case 'FACE_ELIMINAR': {
                        /*<ELIMINAR ARCHIVO>*/

                            $TIPO_ARCHIVO                   = $_POST['tipoArchivo'];
                            $JSON_RESULT['TIPO_ARCHIVO']    = $TIPO_ARCHIVO;

                            if($TIPO_ARCHIVO != 'FOTO PERFIL'){
                            
                                /*<RESPUESTA_FACE_ELIMINAR>*/
                                    /*<RESPUESTA_FACE_ELIMINAR>*/
                                        $RESPUESTA_FACE_ELIMINAR = $Object->RESPUESTA_FACE_ELIMINAR(  
                                                                                                        $ID_USUARIO,
                                                                                                        $TIPO_ARCHIVO
                                                                                                    );
                                    /*</RESPUESTA_FACE_ELIMINAR>*/
                                    if($RESPUESTA_FACE_ELIMINAR['message'] != 'Good'){
                                        $JSON_RESULT['message']                                = 'RESPUESTA_FACE_ELIMINAR-';
                                        $JSON_RESULT['RESPUESTA_FACE_ELIMINAR']                = $RESPUESTA_FACE_ELIMINAR;
                                        echo json_encode($JSON_RESULT);                 
                                        return false;
                                    }else{
                                        $JSON_RESULT['RESPUESTA_FACE_ELIMINAR']                  = $RESPUESTA_FACE_ELIMINAR;
                                    }
                                /*</RESPUESTA_FACE_ELIMINAR>*/ 
                            }else{
                                /*<RESPUESTA_ELIMINAR_PERFIL>*/
                                    /*<RESPUESTA_ELIMINAR_PERFIL>*/
                                        $RESPUESTA_ELIMINAR_PERFIL = $Object->RESPUESTA_ELIMINAR_PERFIL( $ID_USUARIO );
                                    /*</RESPUESTA_ELIMINAR_PERFIL>*/
                                    if($RESPUESTA_ELIMINAR_PERFIL['message'] != 'Good'){
                                        $JSON_RESULT['message']                                 = 'RESPUESTA_ELIMINAR_PERFIL';
                                        $JSON_RESULT['RESPUESTA_ELIMINAR_PERFIL']               = $RESPUESTA_ELIMINAR_PERFIL;
                                        echo json_encode($JSON_RESULT);                 
                                        return false;
                                    }else{
                                        $JSON_RESULT['RESPUESTA_ELIMINAR_PERFIL']               = $RESPUESTA_ELIMINAR_PERFIL;
                                    }
                                /*</RESPUESTA_ELIMINAR_PERFIL>*/
                            }
                            

                        /*</ELIMINAR ARCHIVO>*/

                    }
                   
                }
                $JSON_RESULT['DIRECCION']           = $DIRECCION;
                $JSON_RESULT['message']             = 'Good';
                 
                /*<Respuesta>*/  
                    echo json_encode($JSON_RESULT);
                /*</Respuesta>*/  

            } catch(Exepction $e){
                $JSON_RESULT            = [];
                $JSON_RESULT['message'] = 'Sorry errt server'; 
            }
            
        /*</Controlador>*/    
       
    }else{
        /*<Token invalido>*/
            $JSON_RESULT            = [];
            $JSON_RESULT['message'] = 'Sorry invalid Tocken'; 
            echo json_encode($JSON_RESULT);
        /*</Token invalido>*/
    }
/*<Validacion de tocken>*/

?>