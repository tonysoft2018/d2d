<?php
/*<Include classes>*/
    include_once('../model/door2door.model.commission.php');
    include_once('../../ModulePugins/door2door.Pugins.GeneratorTocken.php');
/*</Include classes>*/

/*<Import>*/   
    use  door2door\Modules\ModulePugins\GeneradorTocken\GeneradorTocken                           as GeneradorTocken_create;
    use door2door\Modules\ModuleCommission\Model\Commission\Commission                            as Commission_create;
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
                    $Object = new Commission_create();
                /*</Instaciacion de objetos>*/ 
                  
                  
                /*<PROCESO>*/  
                    /*<VARIABLES>*/
                        $RESPUESTA_FOLIO                        = [];
                        $RESPUESTA_INSERTA_ENCAVEZADO_CORTES    = [];   
                        $RESPUESTA_CONSEGIR_ID_CORTES           = [];
                        $RESPUESTA_INSERTAR_DETALLE_CORTES_UNO  = [];
                        $RESPUESTA_INSERTAR_DETALLE_CORTES_TODO = [];
                        $RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTES = [];
                        $RESPUESTA_ELIMINACION_CORTE            = [];
                        $RESPUESTA_FINAL                        = [];
                       

                        $FOLIO                                  = 0;
                        $ID_CORTES                              = 0;
                        $NO_VISITAS                             = 0;
                        $NO_PROCESADOS                          = 0;
                        $TOTAL_COMICIONES                       = 0;

                        $JSON_ARREGLO_VISITAS                   = $_POST['ArraysDatos'];      
                        $RESPUESTA_FINAL['tamano'] = count($JSON_ARREGLO_VISITAS);
                                        
                    /*</VARIABLES>*/

                    /*<RESPUESTA_FOLIO>*/
                        /*<RESPUESTA_FOLIO>*/
                            $RESPUESTA_FOLIO = $Object->RESPUESTA_FOLIO();
                        /*</RESPUESTA_FOLIO>*/
                        if($RESPUESTA_FOLIO <= 0){
                            $RESPUESTA_FINAL['message']                             = 'RESPUESTA_FOLIO';
                            $RESPUESTA_FINAL['RESPUESTA_FOLIO']                     = $RESPUESTA_FOLIO;
                            echo json_encode($RESPUESTA_FINAL);                
                            return false;
                        }else{
                            $FOLIO                                                  = $RESPUESTA_FOLIO;
                            $RESPUESTA_FINAL['RESPUESTA_FOLIO']                     = $RESPUESTA_FOLIO;
                        }
                    /*</RESPUESTA_FOLIO>*/

                    /*<RESPUESTA_INSERTA_ENCAVEZADO_CORTES>*/
                        /*<RESPUESTA_INSERTA_ENCAVEZADO_CORTES>*/
                            $RESPUESTA_INSERTA_ENCAVEZADO_CORTES = $Object->RESPUESTA_INSERTA_ENCAVEZADO_CORTES($FOLIO);
                        /*</RESPUESTA_INSERTA_ENCAVEZADO_CORTES>*/
                        if($RESPUESTA_INSERTA_ENCAVEZADO_CORTES['message'] != 'Good'){
                            $RESPUESTA_FINAL['message']                                                 = 'RESPUESTA_INSERTA_ENCAVEZADO_CORTES';
                            $RESPUESTA_FINAL['RESPUESTA_INSERTA_ENCAVEZADO_CORTES']                     = $RESPUESTA_INSERTA_ENCAVEZADO_CORTES;
                            echo json_encode($RESPUESTA_FINAL);                
                            return false;
                        }else{
                            $RESPUESTA_FINAL['RESPUESTA_INSERTA_ENCAVEZADO_CORTES']                     = $RESPUESTA_INSERTA_ENCAVEZADO_CORTES;
                        }
                    /*</RESPUESTA_INSERTA_ENCAVEZADO_CORTES>*/

                    /*<RESPUESTA_CONSEGIR_ID_CORTES>*/
                        /*<RESPUESTA_CONSEGIR_ID_CORTES>*/
                            $RESPUESTA_CONSEGIR_ID_CORTES = $Object->RESPUESTA_CONSEGIR_ID_CORTES($FOLIO);
                        /*</RESPUESTA_CONSEGIR_ID_CORTES>*/
                        if($RESPUESTA_CONSEGIR_ID_CORTES['message'] != 'Good'){
                            $RESPUESTA_FINAL['message']                                          = 'RESPUESTA_CONSEGIR_ID_CORTES';
                            $RESPUESTA_FINAL['RESPUESTA_CONSEGIR_ID_CORTES']                     = $RESPUESTA_CONSEGIR_ID_CORTES;
                            echo json_encode($RESPUESTA_FINAL);                
                            return false;
                        }else{
                            $ID_CORTES                                                           = $RESPUESTA_CONSEGIR_ID_CORTES['ID_CORTES'];
                            $RESPUESTA_FINAL['RESPUESTA_CONSEGIR_ID_CORTES']                     = $RESPUESTA_CONSEGIR_ID_CORTES;
                        }
                    /*</RESPUESTA_CONSEGIR_ID_CORTES>*/

                    /*<JSON_ARREGLO_VISITAS>*/                                              
                        for($i = 0; $i < count($JSON_ARREGLO_VISITAS); $i++){
                            /*<VARIABLES>*/
                                $ARREGLO_ID_VISITA      = 0;          
                                $ARREGLO_ID_COMICION    = 0;                 
                                $ARREGLO_ID_CONTACTO    = 0;   
                                $ARREGLO_ID_SELECIONAR  = 0; 
                                
                                $ARREGLO_CANTIDAD       = 0; 
                                $ARREGLO_COMISION       = 0; 
                                

                            /*</VARIABLES>*/  
                            foreach ( $JSON_ARREGLO_VISITAS[$i] as $clave => $valor ) {          
                                if( 
                                        $clave == 'idVisita'        || 
                                        $clave == 'idCComicion'     || 
                                        $clave == 'idContacto'      ||
                                        $clave == 'Seleccion'       ||
                                        $clave == 'Comision'        ||
                                        $clave == 'cantidad'       
                                    ){
                                    if(
                                            $valor != '' || 
                                            $valor != null
                                            
                                    ){
                                        if($clave == 'idVisita'    ){   $ARREGLO_ID_VISITA      = $valor;      }
                                        if($clave == 'idCComicion' ){   $ARREGLO_ID_COMICION    = $valor;      } 
                                        if($clave == 'idContacto'  ){   $ARREGLO_ID_CONTACTO    = $valor;      }  
                                        if($clave == 'Seleccion'   ){   $ARREGLO_ID_SELECIONAR  = $valor;      } 
                                        if($clave == 'Comision'    ){   $ARREGLO_COMISION       = $valor;      }   
                                        if($clave == 'cantidad'    ){   $ARREGLO_CANTIDAD       = $valor;      } 
                                    }  
                                }                        
                            }    
                            if($ARREGLO_ID_SELECIONAR == 1){         

                                $NO_VISITAS++;
                                $NO_PROCESADOS++;

                                $TOTAL_COMICIONES   = $TOTAL_COMICIONES  + ( $ARREGLO_CANTIDAD * $ARREGLO_COMISION );

                                /*<RESPUESTA_INSERTAR_DETALLE_CORTES_UNO>*/
                                    /*<RESPUESTA_INSERTAR_DETALLE_CORTES_UNO>*/
                                        $RESPUESTA_INSERTAR_DETALLE_CORTES_UNO = $Object->RESPUESTA_INSERTAR_DETALLE_CORTES_UNO(
                                                                                                                                    $ID_CORTES,
                                                                                                                                    $ARREGLO_ID_VISITA,
                                                                                                                                    $ARREGLO_ID_COMICION,
                                                                                                                                    $ARREGLO_ID_CONTACTO
                                                                                                                                );
                                    /*</RESPUESTA_INSERTAR_DETALLE_CORTES_UNO>*/
                                    if($RESPUESTA_INSERTAR_DETALLE_CORTES_UNO['message'] != 'Good'){
                                        array_push( $RESPUESTA_INSERTAR_DETALLE_CORTES_TODO , $RESPUESTA_INSERTAR_DETALLE_CORTES_UNO );
                                        $RESPUESTA_FINAL['message']                                                    = 'RESPUESTA_INSERTAR_DETALLE_CORTES_TODO';
                                        $RESPUESTA_FINAL['RESPUESTA_INSERTAR_DETALLE_CORTES_TODO']                     = $RESPUESTA_INSERTAR_DETALLE_CORTES_TODO;
                                        echo json_encode($RESPUESTA_FINAL);                
                                        return false;
                                    }else{
                                        array_push( $RESPUESTA_INSERTAR_DETALLE_CORTES_TODO , $RESPUESTA_INSERTAR_DETALLE_CORTES_UNO );
                                    }
                                /*</RESPUESTA_INSERTA_ENCAVEZADO_CORTES>*/

                            }
                        }
                    /*</JSON_ARREGLO_VISITAS>*/

                    $RESPUESTA_FINAL['RESPUESTA_INSERTAR_DETALLE_CORTES_TODO']                     = $RESPUESTA_INSERTAR_DETALLE_CORTES_TODO;
                    /*<RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTES>*/
                        /*<RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTES>*/
                            $RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTES = $Object->RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTES(
                                                                                                                            $ID_CORTES,
                                                                                                                            $NO_VISITAS,
                                                                                                                            $NO_PROCESADOS,
                                                                                                                            $TOTAL_COMICIONES
                                                                                                                        );
                        /*</RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTES>*/

                        if($RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTES['message'] != 'Good'){
                            $RESPUESTA_FINAL['message']                                          = 'RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTES';
                            $RESPUESTA_FINAL['RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTES']           = $RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTES;
                            $RESPUESTA_ELIMINACION_CORTE                                         = $Object->RESPUESTA_ELIMINACION_CORTE($ID_CORTES);
                            $RESPUESTA_FINAL['RESPUESTA_ELIMINACION_CORTE']                      = $RESPUESTA_ELIMINACION_CORTE;
                            echo json_encode($RESPUESTA_FINAL);                
                            return false;
                        }else{
                            $RESPUESTA_FINAL['message']                                           = 'Good';
                            $RESPUESTA_FINAL['RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTES']            = $RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTES;
                            echo json_encode($RESPUESTA_FINAL); 
                        }
                    /*</RESPUESTA_CONSEGIR_ID_CORTES>*/

                

                /*</PROCESO>*/ 

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