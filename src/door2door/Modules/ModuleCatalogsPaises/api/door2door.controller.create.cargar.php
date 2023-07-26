<?php
/*<Include classes>*/
    include_once('../model/door2door.model.paises.php');
    include_once('../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  door2door\Modules\ModulePugins\GeneradorTocken\GeneradorTocken                                     as GeneradorTocken_create;
    use  door2door\Modules\ModuleCatalogsPaises\Model\Paises\Paises                                                as Services_create;
/*</Import>*/

/*<Instaciacion de objetos>*/                
    $ObjectToken = new GeneradorTocken_create();
/*</Instaciacion de objetos>*/

/*<Variables generales>*/
    $URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
    $URLtocken = $URL.'-'.$ObjectToken->generatorTocken('tocken-door2doors-01198756765345431234534ASDFSDFSDF-');
/*<Variables generales>*/

/*<Validacion de tocken>*/
    if(isset($_POST['TockenOfdoor2doordoor2door']) && (
                                                    $_POST['TockenOfdoor2doordoor2door'] == $URLtocken  ||
                                                    $ObjectToken->validadorTocken($URLtocken) 
                                                )){      

        $JSON_RESULT            = [];
        
        /*<Controlador>*/      
            try{
                /*<Instaciacion de objetos>*/                
                    $Object = new Services_create();
                    $Nombre = '';
                /*</Instaciacion de objetos>*/ 
                        $RESULTADOS_DESCARGA_ARCHIVOS   = []; 
                        $RESULTADOS_LEER_DATOS          = []; 
                        $ARRAYS                         = [];
                        $ARRAYS_FULL                    = [];
                /*</Proceso>*/  

              /*<DESCARGAR ARCHIVO>*/
              foreach($_FILES as $file){
                if($file["error"]==UPLOAD_ERR_OK){
                    move_uploaded_file($file["tmp_name"], "./Documentos/".date("Ymdhis").$ID_CAMPANA."_".$file["name"]);   
                    $NOMBRE_ARCHIVO = date("Ymdhis").$ID_CAMPANA."_".$file["name"];                         
                }
            }     
        /*</DESCARGAR ARCHIVO>*/
                    /*<Nos Traemos el archivo>*/  
                        foreach($_FILES as $file){
                            if($file["error"]==UPLOAD_ERR_OK){
                                session_start();
                                $idUser = $_SESSION["idUser-door2door"];
                                $NombreArchivo = "_".date("Ymd_his").$idUser.$file["name"]; 
                                move_uploaded_file($file["tmp_name"], "./Documentos/".$NombreArchivo);   
                                
                                $RESULTADOS_DESCARGA_ARCHIVOS['nombre_archivo'] =  $Nombre; 
                                $JSON_RESULT['RESULTADOS_DESCARGA_ARCHIVOS']    = [];
                                $JSON_RESULT['RESULTADOS_DESCARGA_ARCHIVOS']    = $RESULTADOS_DESCARGA_ARCHIVOS;
                                
                            }
                                else
                            {
                                $RESULTADOS_DESCARGA_ARCHIVOS['nombre_archivo'] = 'no hay archivo';
                                $JSON_RESULT['RESULTADOS_DESCARGA_ARCHIVOS'] =  $RESULTADOS_DESCARGA_ARCHIVOS;
                                $JSON_RESULT['message'] = 'RESULTADOS_DESCARGA_ARCHIVOS';
                                echo json_encode($JSON_RESULT);
                                return false;
                            }
                        }   
                       
                    /*</Nos Traemos el archivo>*/  
                    /*<Leer Archivos CSV>*/
                       

                                    
                        $JSON_RESULT['RESULTADOS_LEER_DATOS'] = [];
                        $JSON_RESULT['RESULTADOS_LEER_DATOS'] = $RESULTADOS_LEER_DATOS;


                    /*</Leer Archivos CSV>*/
                    
                
                /*</Proceso>*/ 
              
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