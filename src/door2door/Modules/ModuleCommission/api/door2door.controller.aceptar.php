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
                        $RESPUESTA_UPDATE_DETALLE_CORTES_UNO    = [];
                        $RESPUESTA_UPDATE_DETALLE_CORTES_TODO   = [];
                        $RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTES = [];
                        $RESPUESTA_FINAL                        = [];                      

                        
                        $ID_CORTES                              = $_POST['idCorte'];    
                        $JSON_ARREGLO_VISITAS                   = $_POST['ArraysDatos'];      
                        $RESPUESTA_FINAL['tamano'] = $ID_CORTES;
                      
                                        
                    /*</VARIABLES>*/

                  
                    /*<JSON_ARREGLO_VISITAS>*/                                              
                        for($i = 0; $i < count($JSON_ARREGLO_VISITAS); $i++){
                            /*<VARIABLES>*/
                                 
                                $ARREGLO_ID_SELECIONAR      = 0; 
                                $ARREGLO_ID_VISITA      = 0;
                                
                                $ARREGLO_ID_CORTE_DETALLE   = 0; 
                                

                            /*</VARIABLES>*/  
                            foreach ( $JSON_ARREGLO_VISITAS[$i] as $clave => $valor ) {          
                                if( 
                                        
                                        $clave == 'Seleccion'       ||
                                        $clave == 'idCorteD'        ||
                                        $clave == 'idVista'
                                    ){
                                    if(
                                            $valor != '' || 
                                            $valor != null
                                            
                                    ){
                                        if($clave == 'Seleccion'    ){   $ARREGLO_ID_SELECIONAR         = $valor;      }
                                        if($clave == 'idCorteD'     ){   $ARREGLO_ID_CORTE_DETALLE      = $valor;      } 
                                        if($clave == 'idVista'      ){   $ARREGLO_ID_VISITA             = $valor;      } 
                                       
                                    }  
                                }                        
                            }    
                            if($ARREGLO_ID_SELECIONAR == 1){     

                                /*<RESPUESTA_UPDATE_DETALLE_CORTES_UNO>*/
                                    /*<RESPUESTA_UPDATE_DETALLE_CORTES_UNO>*/
                                        $RESPUESTA_UPDATE_DETALLE_CORTES_UNO = $Object->RESPUESTA_UPDATE_DETALLE_CORTES_UNO($ARREGLO_ID_CORTE_DETALLE, $ARREGLO_ID_VISITA);
                                    /*</RESPUESTA_UPDATE_DETALLE_CORTES_UNO>*/
                                    if($RESPUESTA_UPDATE_DETALLE_CORTES_UNO['message'] != 'Good'){
                                        array_push( $RESPUESTA_UPDATE_DETALLE_CORTES_TODO , $RESPUESTA_UPDATE_DETALLE_CORTES_UNO );
                                        $RESPUESTA_FINAL['message']                                                  = 'RESPUESTA_UPDATE_DETALLE_CORTES_TODO';
                                        $RESPUESTA_FINAL['RESPUESTA_UPDATE_DETALLE_CORTES_TODO']                     = $RESPUESTA_UPDATE_DETALLE_CORTES_TODO;
                                        echo json_encode($RESPUESTA_FINAL);                
                                        return false;
                                    }else{
                                        array_push( $RESPUESTA_UPDATE_DETALLE_CORTES_TODO , $RESPUESTA_INSERTAR_DETALLE_CORTES_UNO );
                                    }
                                /*</RESPUESTA_UPDATE_DETALLE_CORTES_UNO>*/

                            }
                        }
                    /*</JSON_ARREGLO_VISITAS>*/

                    $RESPUESTA_FINAL['RESPUESTA_UPDATE_DETALLE_CORTES_TODO']                     = $RESPUESTA_UPDATE_DETALLE_CORTES_TODO;

                    /*<RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTE_PROCESADO>*/
                        /*<RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTE_PROCESADO>*/
                            $RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTE_PROCESADO = $Object->RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTE_PROCESADO($ID_CORTES);
                        /*</RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTE_PROCESADO>*/

                        if($RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTE_PROCESADO['message'] != 'Good'){
                            $RESPUESTA_FINAL['message']                                                 = 'RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTE_PROCESADO';
                            $RESPUESTA_FINAL['RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTE_PROCESADO']         = $RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTE_PROCESADO;                           
                            echo json_encode($RESPUESTA_FINAL);                
                            return false;
                        }else{
                            $RESPUESTA_FINAL['message']                                           = 'Good';
                            $RESPUESTA_FINAL['RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTE_PROCESADO']            = $RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTE_PROCESADO;
                            echo json_encode($RESPUESTA_FINAL); 
                        }
                    /*</RESPUESTA_ACTUALIZAR_ENCAVEZADO_CORTE_PROCESADO>*/

                

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