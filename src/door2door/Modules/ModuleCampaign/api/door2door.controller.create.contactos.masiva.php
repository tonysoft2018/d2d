<?php

/*<Include classes>*/
    include_once('../model/door2door.model.contactos.php');
    include_once('../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  door2door\Modules\ModulePugins\GeneradorTocken\GeneradorTocken as GeneradorTocken_create;
    use  door2door\Modules\ModuleCampaign\Model\Contactos\Contactos     as Contactos_create;
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
        /*<Controlador>*/
            try{
                /*<Instaciacion de objetos>*/                
                    $Object = new Contactos_create();
                /*</Instaciacion de objetos>*/     

                /*</Proceso>*/ 
                    /*<VARIABLES>*/ 

                        $RESPUESTA_CARGAR_ARREGLO           = [];
                        $RESPUESTA_GEOLOCALIZACION_UNO      = [];
                        $RESPUESTA_INSERTAR_UNO             = [];
                        $RESPUESTA_INSERTAR_TODOS           = [];
                        $RESPUESTA_FINAL                    = [];

                        $NOMBRE_ARCHIVO                     = '';
                        $ID_CAMPANA                         = 0;

                        $ID_CAMPANA                         = $_POST['idCampana'];
                        $JSON_CONTACTOS                     = [];                    

                    /*</VARIABLES>*/ 



                    /*<DESCARGAR ARCHIVO>*/
                        foreach($_FILES as $file){
                            if($file["error"]==UPLOAD_ERR_OK){
                                move_uploaded_file($file["tmp_name"], "./Documentos/".date("Ymdhis").$ID_CAMPANA."_".$file["name"]);   
                                $NOMBRE_ARCHIVO = date("Ymdhis").$ID_CAMPANA."_".$file["name"];                         
                            }
                        }     
                    /*</DESCARGAR ARCHIVO>*/

                 

                    /*<RESPUESTA_CARGAR_ARREGLO>*/
                        /*<RESPUESTA_CARGAR_ARREGLO>*/
                            $RESPUESTA_CARGAR_ARREGLO = $Object->RESPUESTA_CARGAR_ARREGLO($NOMBRE_ARCHIVO);
                        /*</RESPUESTA_CARGAR_ARREGLO>*/
                        if($RESPUESTA_CARGAR_ARREGLO['message'] != 'Good'){
                            $RESPUESTA_FINAL['RESPUESTA_CARGAR_ARREGLO']    = [];
                            $RESPUESTA_FINAL['RESPUESTA_CARGAR_ARREGLO']    = $RESPUESTA_CARGAR_ARREGLO;
                            $RESPUESTA_FINAL['message']                     = 'RESPUESTA_CARGAR_ARREGLO';
                            echo json_encode($RESPUESTA_FINAL);
                            return false;
                        }else{
                            $JSON_CONTACTOS                                 = $RESPUESTA_CARGAR_ARREGLO['Matris'];
                            $RESPUESTA_FINAL['RESPUESTA_CARGAR_ARREGLO']    = [];
                            $RESPUESTA_FINAL['RESPUESTA_CARGAR_ARREGLO']    = $RESPUESTA_CARGAR_ARREGLO;
                        }
                    /*</RESPUESTA_CARGAR_ARREGLO>*/

                   
                    /*<ARREGLO>*/
                        for($i = 1; $i < count($JSON_CONTACTOS); $i++){
                            
                            /*<VARIABLES>*/
                                /*<JSON_AUXILIAR>*/
                                    $JSON_AUXILIAR      = $JSON_CONTACTOS[$i];
                                /*</JSON_AUXILIAR>*/
                                $ARREGLO_NOMBRE         = '';
                                $ARREGLO_CALLE          = '';
                                $ARREGLO_TELEFONO       = '';           
                                $ARREGLO_NOEXTERIOR     = '';                            
                                $ARREGLO_NOINTERIOR     = '';           
                                $ARREGLO_CODIGOPOSTAL   = '';           
                                $ARREGLO_COLONIA        = '';           
                                $ARREGLO_PAIS           = '';           
                                $ARREGLO_ESTADO         = '';           
                                $ARREGLO_MUNICIPIO      = '';   
                                $ARREGLO_DEUDA          = '';      
                                $ARREGLO_EMAIL          = '';                
                            /*</VARIABLES>*/  

                            /*<PROPIEDADES DEL ARREGLO>*/
                                for($j = 0; $j < count($JSON_AUXILIAR); $j++){
                                    switch($j){
                                        case 0:     { $ARREGLO_NOMBRE       = $JSON_AUXILIAR[$j]; break; }
                                        case 1:     { $ARREGLO_CALLE        = $JSON_AUXILIAR[$j]; break; }
                                        case 2:     { $ARREGLO_TELEFONO     = $JSON_AUXILIAR[$j]; break; }
                                        case 3:     { $ARREGLO_NOEXTERIOR   = $JSON_AUXILIAR[$j]; break; }
                                        case 4:     { $ARREGLO_NOINTERIOR   = $JSON_AUXILIAR[$j]; break; }
                                        case 5:     { $ARREGLO_CODIGOPOSTAL = $JSON_AUXILIAR[$j]; break; }
                                        case 6:     { $ARREGLO_COLONIA      = $JSON_AUXILIAR[$j]; break; }
                                        case 7:     { $ARREGLO_PAIS         = $JSON_AUXILIAR[$j]; break; }
                                        case 8:     { $ARREGLO_ESTADO       = $JSON_AUXILIAR[$j]; break; }
                                        case 9:     { $ARREGLO_MUNICIPIO    = $JSON_AUXILIAR[$j]; break; }
                                        case 10:    { $ARREGLO_DEUDA        = $JSON_AUXILIAR[$j]; break; }
                                        case 11:    { $ARREGLO_EMAIL        = $JSON_AUXILIAR[$j]; break; }
                                    }                                    
                                }
                            /*<PROPIEDADES DEL ARREGLO>*/

                            /*<GEOLOCALIZACION>*/

                                /*<VARIABLE>*/
                                    $ARREGLO_LAT = 0;
                                    $ARREGLO_LGN = 0;
                                /*</VARIABLE>*/
                                $RESPUESTA_GEOLOCALIZACION_UNO = $Object->getGeocodeData(
                                    $ARREGLO_NOEXTERIOR,
                                    $ARREGLO_CALLE,
                                    $ARREGLO_MUNICIPIO,
                                    $ARREGLO_ESTADO
                                );

                                $ARREGLO_LAT    = $RESPUESTA_GEOLOCALIZACION_UNO['lat'];
                                $ARREGLO_LGN    = $RESPUESTA_GEOLOCALIZACION_UNO['lng'];

                            /*</GEOLOCALIZACION>*/

                            if( 
                                    (   
                                        $ARREGLO_LAT > 0 || 
                                        $ARREGLO_LAT < 0
                                    )  
                                        && 
                                    (
                                        $ARREGLO_LGN > 0 ||
                                        $ARREGLO_LGN < 0  
                                    )
                                ){

                                    /*<RESPUESTA_CARGAR_ARREGLO>*/

                                        /*<RESPUESTA_CARGAR_ARREGLO>*/
                                            $RESPUESTA_INSERTAR_UNO = $Object->createMasiva(    
                                                                                        $ARREGLO_NOMBRE,
                                                                                        $ARREGLO_CALLE,
                                                                                        $ARREGLO_TELEFONO,
                                                                                        $ARREGLO_NOEXTERIOR,
                                                                                        $ARREGLO_NOINTERIOR,
                                                                                        $ARREGLO_CODIGOPOSTAL,
                                                                                        $ARREGLO_COLONIA,
                                                                                        $ARREGLO_PAIS,
                                                                                        $ARREGLO_ESTADO,
                                                                                        $ARREGLO_MUNICIPIO,
                                                                                        $ARREGLO_DEUDA,
                                                                                        $ID_CAMPANA,
                                                                                        $ARREGLO_EMAIL,
                                                                                        $ARREGLO_LAT,
                                                                                        $ARREGLO_LGN 
                                                                                    );
                                        /*</RESPUESTA_CARGAR_ARREGLO>*/

                                        if($RESPUESTA_INSERTAR_UNO['message'] != 'Good'){
                                            array_push($RESPUESTA_INSERTAR_TODOS, $RESPUESTA_INSERTAR_UNO);
                                            $RESPUESTA_FINAL['RESPUESTA_INSERTAR_TODOS']    = [];
                                            $RESPUESTA_FINAL['RESPUESTA_INSERTAR_TODOS']    = $RESPUESTA_INSERTAR_TODOS;
                                            $RESPUESTA_FINAL['message']                     = 'RESPUESTA_INSERTAR_TODOS;';
                                            echo json_encode($RESPUESTA_FINAL);
                                            return false;
                                        }else{
                                            $RESPUESTA_INSERTAR_UNO['RESPUESTA_GEOLOCALIZACION_UNO'] = $RESPUESTA_GEOLOCALIZACION_UNO; 
                                            array_push($RESPUESTA_INSERTAR_TODOS, $RESPUESTA_INSERTAR_UNO);                                    
                                        }
                                    /*</RESPUESTA_CARGAR_ARREGLO>*/       
                            }else{
                                $RESPUESTA_INSERTAR_UNO['RESPUESTA_GEOLOCALIZACION_UNO']    = $RESPUESTA_GEOLOCALIZACION_UNO; 
                                $RESPUESTA_INSERTAR_UNO['ARREGLO_LGN']                      = $ARREGLO_LGN;
                                $RESPUESTA_INSERTAR_UNO['ARREGLO_LAT']                      = $ARREGLO_LAT;
                                array_push($RESPUESTA_INSERTAR_TODOS, $RESPUESTA_INSERTAR_UNO);                                   
                            }
                        }  
                        /*<CAPTURA>*/
                            $RESPUESTA_FINAL['RESPUESTA_INSERTAR_TODOS']    = [];
                            $RESPUESTA_FINAL['RESPUESTA_INSERTAR_TODOS']    = $RESPUESTA_INSERTAR_TODOS;
                        /*</CAPTURA>*/
                    /*</ARREGLO>*/

                    /*<RESPUESTA FINAL>*/
                        $RESPUESTA_FINAL['message']    = 'Good';
                        echo json_encode($RESPUESTA_FINAL);
                        return true;
                    /*</RESPUESTA FINAL>*/

               
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