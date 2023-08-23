<?php

/*<Include classes>*/
    include_once('../model/door2door.model.contactos.php');
    include_once('../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  d2dSocioWeb\Modules\ModulePugins\GeneradorTocken\GeneradorTocken as GeneradorTocken_create;
    use  d2dSocioWeb\Modules\ModuleCampaign\Model\Contactos\Contactos     as Contactos_create;
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

                        $RESPUESTA_CARGAR_ARREGLO                   = [];
                        $RESPUESTA_GEOLOCALIZACION_UNO              = [];
                        $RESPUESTA_VALIDAR_NOMBRE_CONTACTO_UNO      = [];
                        $RESPUESTA_VALIDAR_NOMBRE_CONTACTO_TODOS    = [];
                        $RESPUESTA_INSERTAR_UNO                     = [];
                        $RESPUESTA_INSERTAR_TODOS                   = [];
                        $RESPUESTA_FINAL                            = [];

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
                    $RESPUESTA_FINAL['JSON_CONTACTOS_CON'] = count($JSON_CONTACTOS);
                    if(count($JSON_CONTACTOS) <= 500){
                        /*<ARREGLO>*/
                            for($i = 0; $i < count($JSON_CONTACTOS); $i++){
                                
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
                                    $ARREGLO_ENTRE_CALLE    = '';  
                                    $ARREGLO_INSTRUCCCIONES = '';  
                                    $ARREGLO_TELEFONO       = ''; 
                                    $ARREGLO_EMAIL          = '';  
                                    
                                    $ARREGLO_PAIS_2         = '';   
                                    $ARREGLO_ESTADO_2       = '';   
                                    $ARREGLO_MUNICIPIO_2    = '';   
                                    
                                    $TOTAL_CONTACTO         = 0;
                                /*</VARIABLES>*/  

                                /*<PROPIEDADES DEL ARREGLO>*/
                                    for($j = 0; $j < count($JSON_AUXILIAR); $j++){
                                        switch($j){
                                            case 0:     { $ARREGLO_NOMBRE           = $JSON_AUXILIAR[$j]; break; }
                                            case 1:     { $ARREGLO_CALLE            = $JSON_AUXILIAR[$j]; break; }                                        
                                            case 2:     { $ARREGLO_NOEXTERIOR       = $JSON_AUXILIAR[$j]; break; }
                                            case 3:     { $ARREGLO_NOINTERIOR       = $JSON_AUXILIAR[$j]; break; }
                                            case 4:     { $ARREGLO_CODIGOPOSTAL     = $JSON_AUXILIAR[$j]; break; }
                                            case 5:     { $ARREGLO_COLONIA          = $JSON_AUXILIAR[$j]; break; }
                                            case 6:     { $ARREGLO_PAIS             = $JSON_AUXILIAR[$j]; break; }
                                            case 7:     { $ARREGLO_ESTADO           = $JSON_AUXILIAR[$j]; break; }
                                            case 8:     { $ARREGLO_MUNICIPIO        = $JSON_AUXILIAR[$j]; break; }
                                            case 9:     { $ARREGLO_ENTRE_CALLE      = $JSON_AUXILIAR[$j]; break; }
                                            case 10:    { $ARREGLO_INSTRUCCCIONES   = $JSON_AUXILIAR[$j]; break; }
                                            case 11:    { $ARREGLO_TELEFONO         = $JSON_AUXILIAR[$j]; break; }
                                            case 12:    { $ARREGLO_EMAIL            = $JSON_AUXILIAR[$j]; break; }
                                        }                                    
                                    }

                                    $ARREGLO_PAIS_2         = $ARREGLO_ESTADO_2ARREGLO_PAIS;   
                                    $ARREGLO_ESTADO_2       = $ARREGLO_ESTADO;   
                                    $ARREGLO_MUNICIPIO_2    = $ARREGLO_MUNICIPIO;   

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

                                /*<RESPUESTA_VALIDAR_NOMBRE_CONTACTO_UNO>*/
                                    /*<RESPUESTA_VALIDAR_NOMBRE_CONTACTO_UNO>*/
                                        $RESPUESTA_VALIDAR_NOMBRE_CONTACTO_UNO = $Object->RESPUESTA_VALIDAR_NOMBRE_CONTACTO_UNO(
                                            $ARREGLO_NOMBRE,
                                            $ARREGLO_TELEFONO,
                                            $ID_CAMPANA,
                                            0 
                                        );
                                    /*</RESPUESTA_VALIDAR_NOMBRE_CONTACTO_UNO>*/
                                    if($RESPUESTA_VALIDAR_NOMBRE_CONTACTO_UNO['message'] == 'Good'){
                                    array_push($RESPUESTA_VALIDAR_NOMBRE_CONTACTO_TODOS ,$RESPUESTA_VALIDAR_NOMBRE_CONTACTO_UNO);
                                    $TOTAL_CONTACTO = $RESPUESTA_VALIDAR_NOMBRE_CONTACTO_UNO['total'];
                                    }else{
                                    array_push($RESPUESTA_VALIDAR_NOMBRE_CONTACTO_TODOS ,$RESPUESTA_VALIDAR_NOMBRE_CONTACTO_UNO);
                                    $TOTAL_CONTACTO = 1;
                                    }
                                /*</RESPUESTA_VALIDAR_NOMBRE_CONTACTO_UNO>*/
                                if($TOTAL_CONTACTO == 0){                                
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
                                                                                                $ARREGLO_NOEXTERIOR,
                                                                                                $ARREGLO_NOINTERIOR,
                                                                                                $ARREGLO_CODIGOPOSTAL,
                                                                                                $ARREGLO_COLONIA,
                                                                                                $ARREGLO_PAIS,
                                                                                                $ARREGLO_ESTADO,
                                                                                                $ARREGLO_MUNICIPIO,
                                                                                                $ARREGLO_ENTRE_CALLE,
                                                                                                $ARREGLO_INSTRUCCCIONES,
                                                                                                $ARREGLO_TELEFONO,
                                                                                                $ARREGLO_EMAIL,
                                                                                                $ID_CAMPANA,
                                                                                                $ARREGLO_LAT,
                                                                                                $ARREGLO_LGN,
                                                                                                $i, 
                                                                                                $ARREGLO_PAIS_2,
                                                                                                $ARREGLO_ESTADO_2,
                                                                                                $ARREGLO_MUNICIPIO_2 
                                                                                            );
                                                /*</RESPUESTA_CARGAR_ARREGLO>*/

                                                if($RESPUESTA_INSERTAR_UNO['message'] != 'Good'){
                                                    array_push($RESPUESTA_INSERTAR_TODOS, $RESPUESTA_INSERTAR_UNO);                                        
                                                    $RESPUESTA_INSERTAR_UNO['RESPUESTA_GEOLOCALIZACION_UNO'] = $RESPUESTA_GEOLOCALIZACION_UNO; 
                                                    array_push($RESPUESTA_INSERTAR_TODOS, $RESPUESTA_INSERTAR_UNO);   
                                                }else{
                                                    // $RESPUESTA_INSERTAR_UNO['RESPUESTA_GEOLOCALIZACION_UNO'] = $RESPUESTA_GEOLOCALIZACION_UNO; 
                                                    //array_push($RESPUESTA_INSERTAR_TODOS, $RESPUESTA_INSERTAR_UNO);                                    
                                                }
                                            /*</RESPUESTA_CARGAR_ARREGLO>*/       
                                    }else{
                                        $RESPUESTA_INSERTAR_UNO['message']                  = 'GEOLOCALIZACION';
                                        $RESPUESTA_INSERTAR_UNO['ARREGLO_NOMBRE']           = $ARREGLO_NOMBRE;
                                        $RESPUESTA_INSERTAR_UNO['ARREGLO_CALLE']            = $ARREGLO_CALLE;
                                        $RESPUESTA_INSERTAR_UNO['ARREGLO_NOEXTERIOR']       = $ARREGLO_NOEXTERIOR;
                                        $RESPUESTA_INSERTAR_UNO['ARREGLO_NOINTERIOR']       = $ARREGLO_NOINTERIOR;
                                        $RESPUESTA_INSERTAR_UNO['ARREGLO_CODIGOPOSTAL']     = $ARREGLO_CODIGOPOSTAL;
                                        $RESPUESTA_INSERTAR_UNO['ARREGLO_COLONIA']          = $ARREGLO_COLONIA;
                                        $RESPUESTA_INSERTAR_UNO['ARREGLO_PAIS']             = $ARREGLO_PAIS;
                                        $RESPUESTA_INSERTAR_UNO['ARREGLO_ESTADO']           = $ARREGLO_ESTADO;
                                        $RESPUESTA_INSERTAR_UNO['ARREGLO_MUNICIPIO']        = $ARREGLO_MUNICIPIO;
                                        $RESPUESTA_INSERTAR_UNO['ARREGLO_ENTRE_CALLE']      = $ARREGLO_ENTRE_CALLE;
                                        $RESPUESTA_INSERTAR_UNO['ARREGLO_INSTRUCCCIONES']   = $ARREGLO_INSTRUCCCIONES;
                                        $RESPUESTA_INSERTAR_UNO['ARREGLO_TELEFONO']         = $ARREGLO_TELEFONO;
                                        $RESPUESTA_INSERTAR_UNO['ARREGLO_EMAIL']            = $ARREGLO_EMAIL;



                                        $RESPUESTA_INSERTAR_UNO['contador']         =  $i ;
                                        $RESPUESTA_INSERTAR_UNO['TOTAL_CONTACTO']   = $TOTAL_CONTACTO;
                                    
                                        array_push($RESPUESTA_INSERTAR_TODOS, $RESPUESTA_INSERTAR_UNO);                                   
                                    }
                                }else{
                                    $RESPUESTA_INSERTAR_UNO['message']                  = 'CONTACTO REPETIDO';
                                    $RESPUESTA_INSERTAR_UNO['ARREGLO_NOMBRE']           = $ARREGLO_NOMBRE;
                                    $RESPUESTA_INSERTAR_UNO['ARREGLO_CALLE']            = $ARREGLO_CALLE;
                                    $RESPUESTA_INSERTAR_UNO['ARREGLO_NOEXTERIOR']       = $ARREGLO_NOEXTERIOR;
                                    $RESPUESTA_INSERTAR_UNO['ARREGLO_NOINTERIOR']       = $ARREGLO_NOINTERIOR;
                                    $RESPUESTA_INSERTAR_UNO['ARREGLO_CODIGOPOSTAL']     = $ARREGLO_CODIGOPOSTAL;
                                    $RESPUESTA_INSERTAR_UNO['ARREGLO_COLONIA']          = $ARREGLO_COLONIA;
                                    $RESPUESTA_INSERTAR_UNO['ARREGLO_PAIS']             = $ARREGLO_PAIS;
                                    $RESPUESTA_INSERTAR_UNO['ARREGLO_ESTADO']           = $ARREGLO_ESTADO;
                                    $RESPUESTA_INSERTAR_UNO['ARREGLO_MUNICIPIO']        = $ARREGLO_MUNICIPIO;
                                    $RESPUESTA_INSERTAR_UNO['ARREGLO_ENTRE_CALLE']      = $ARREGLO_ENTRE_CALLE;
                                    $RESPUESTA_INSERTAR_UNO['ARREGLO_INSTRUCCCIONES']   = $ARREGLO_INSTRUCCCIONES;
                                    $RESPUESTA_INSERTAR_UNO['ARREGLO_TELEFONO']         = $ARREGLO_TELEFONO;
                                    $RESPUESTA_INSERTAR_UNO['ARREGLO_EMAIL']            = $ARREGLO_EMAIL;



                                    $RESPUESTA_INSERTAR_UNO['contador']         =  $i ;
                                    $RESPUESTA_INSERTAR_UNO['TOTAL_CONTACTO']   = $TOTAL_CONTACTO;
                                    
                                    array_push($RESPUESTA_INSERTAR_TODOS, $RESPUESTA_INSERTAR_UNO);    
                                }
                            }  
                            /*<CAPTURA>*/
                                $RESPUESTA_FINAL['RESPUESTA_INSERTAR_TODOS']    = [];
                                $RESPUESTA_FINAL['RESPUESTA_INSERTAR_TODOS']    = $RESPUESTA_INSERTAR_TODOS;

                                $RESPUESTA_FINAL['RESPUESTA_VALIDAR_NOMBRE_CONTACTO_TODOS']    = [];
                                $RESPUESTA_FINAL['RESPUESTA_VALIDAR_NOMBRE_CONTACTO_TODOS']    = $RESPUESTA_VALIDAR_NOMBRE_CONTACTO_TODOS;

                                
                            /*</CAPTURA>*/
                        /*</ARREGLO>*/
                    }else{
                        $RESPUESTA_FINAL['message']    = 'MAS DE 500 REGUISTROS';
                        echo json_encode($RESPUESTA_FINAL);
                        return true;
                    }

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