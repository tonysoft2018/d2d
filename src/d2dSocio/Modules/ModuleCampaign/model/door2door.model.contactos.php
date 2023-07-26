<?php

namespace  d2dSocio\Modules\ModuleCampaign\Model\Contactos;
    /*<Includes>*/
        include_once('../../ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    /*<use>*/
        use  d2dSocio\Modules\ModulePugins\Conection\Conection as ConectionContactos;
    /*<use>*/

    class Contactos extends ConectionContactos{

        /*<Method construc>*/
            public function __construct(){
                // Cosntruct Father
                parent::__construct();
            }
        /*<Method construc>*/
    
        /*<Method SelectFull>*/
            public function selectFull($idCampana){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                /*<Query> */
                    $querySelect = 'SELECT * FROM contacto WHERE idCampana = '.$idCampana.' AND bstate = 1';
                /*</Query> */
                $JSON_RESULT['querySelect']     = $querySelect;
                $this->open();            
                    if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                        if ($resultQuery->num_rows > 0) {
                            /*<Captura>*/
                                while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                    array_push($JSON_RESULT['information'], $Rol);
                                }
                            /*</Captura>*/
                        }else{
                            $JSON_RESULT['information']     = [];
                        }
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
        /*<Method SelectFull>*/

        /*<Method selectOne>*/
            public function selectOne($tabla, $columna, $idColumna, $busqueda){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['id']              = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                /*<Query> */
                    $querySelect = 'SELECT * FROM '.$tabla.' WHERE '.$columna.' like "%'.$busqueda.'%" AND bstate = 1';
                /*</Query> */
                
                $JSON_RESULT['querySelect']     = $querySelect;
                $this->open();            
                    if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                        if ($resultQuery->num_rows > 0) {
                            /*<Captura>*/
                                while ($R = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                    $JSON_RESULT['id'] = $R[$idColumna];
                                }
                            /*</Captura>*/
                        }else{
                            $JSON_RESULT['id'] = 0;
                        }
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
        /*<Method selectOne>*/
        
        /*<Method selectIdEstado>*/
            public function selectIdEstado($idEstado){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['id']              = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                /*<Query> */
                    $querySelect = 'SELECT * FROM Estados WHERE idEstado = '.$idEstado.' AND bstate = 1';
                /*</Query> */
                
                $JSON_RESULT['querySelect']     = $querySelect;
                $this->open();            
                    if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                        if ($resultQuery->num_rows > 0) {
                            /*<Captura>*/
                                while ($R = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                    $JSON_RESULT['nombre'] = $R['nombre'];
                                }
                            /*</Captura>*/
                        }else{
                            $JSON_RESULT['nombre'] = '';
                        }
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
        /*</Method selectIdEstado>*/

        /*<Method selectIdMunicipio>*/
            public function selectIdMunicipio($idMunicipio){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['id']              = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */
                /*<Query> */
                    $querySelect = 'SELECT * FROM Municipios WHERE idMunicipio = '.$idMunicipio.' AND bstate = 1';
                /*</Query> */
                
                $JSON_RESULT['querySelect']     = $querySelect;
                $this->open();            
                    if ($resultQuery = mysqli_query($this->Connection, $querySelect)) {
                        if ($resultQuery->num_rows > 0) {
                            /*<Captura>*/
                                while ($R = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                    $JSON_RESULT['nombre'] = $R['nombre'];
                                }
                            /*</Captura>*/
                        }else{
                            $JSON_RESULT['nombre'] = '';
                        }
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
        /*</Method selectIdMunicipio>*/
    
        /*<Method Create>*/
            public function create( 
                                        $nombre,    
                                        $calle,
                                        $telefono,
                                        $noExterior,
                                        $noInterior,
                                        $codigoPostal,
                                        $colonia,
                                        $idPais,
                                        $idEstado,
                                        $idMunicipio,
                                        $deuda,
                                        $idCampana,
                                        $email,
                                        $latitud,   
                                        $longitud                            
                                    ){
                /*<Variables> */

                    /*</datos>*/
                        session_start();
                        $DATE                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];
                       
                    /*<datos>*/
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['RESPUESTA_GEOLOCALIZACION_UNO']     = $RESPUESTA_GEOLOCALIZACION_UNO;
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error'] = '';
                /*</Variables> */
              
                    /*<Query>*/
                        $queryInsert = 'INSERT INTO contacto ( 
                                                idUsuario,
                                                idCampana, 
                                                nombre,  
                                                calle,  
                                                telefono,                                                  
                                                email,   
                                                noInterior,                                                   
                                                noExterior,
                                                codigoPostal,
                                                colonia,
                                                idPais,
                                                idEstado,
                                                idMunicipio,
                                                deuda,
                                                latitud,
                                                longitud,
                                                estatus,

                                                fechaCreacion, 
                                                fechaModificacion,
                                                observacion,
                                                bstate
                                                ) VALUES( 
                                                    "'.$idUser.'",
                                                    "'.$idCampana.'", 
                                                    "'.$nombre.'", 
                                                    "'.$calle.'", 
                                                    "'.$telefono.'", 
                                                    "'.$email.'", 
                                                    "'.$noInterior.'", 
                                                    "'.$noExterior.'", 
                                                    "'.$codigoPostal.'", 
                                                    "'.$colonia.'", 
                                                     '.$idPais.', 
                                                     '.$idEstado.', 
                                                     '.$idMunicipio.', 
                                                     '.$deuda.', 
                                                     "'.$latitud.'", 
                                                     "'.$longitud.'",   
                                                     "PENDIENTE", 

                                                    "'.$DATE.'",
                                                    "'.$DATE.'",
                                                    " [ INSERT '.$DATE.' ], [ idUser '.$idUser.' ] ",
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
        /*</Method Create>*/

        /*<Method createMasiva>*/
            public function createMasiva( 
                                        $nombre,    
                                        $calle,
                                        $telefono,
                                        $noExterior,
                                        $noInterior,
                                        $codigoPostal,
                                        $colonia,
                                        $idPais,
                                        $idEstado,
                                        $idMunicipio,
                                        $deuda,
                                        $idCampana,
                                        $email,   
                                        $latitud,       
                                        $longitud                              
                                    ){
                /*<Variables> */

                    /*</datos>*/
                        session_start();
                        $DATE                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];
                       
                    /*<datos>*/
                    
                    $JSON_RESULT                    = [];
                   
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error'] = '';
                /*</Variables> */

                /*<resultIdPais> */
                    $resultIdPais                   = $this->selectOne('paises', 'nombre', 'idPais', $idPais);  
                    $JSON_RESULT['resultIdPais']    = $resultIdPais; 
                    if($resultIdPais['message'] != 'Good'){  $JSON_RESULT['message'] = 'Bad'; return $JSON_RESULT; }    
                    
                    $idPais = $resultIdPais['id'];
                /*</resultIdPais> */

                /*<resultIdEstado> */
                    $resultIdMunicipio                  = $this->selectOne('Municipios', 'nombre', 'idMunicipio', $idMunicipio);  
                    $JSON_RESULT['resultIdMunicipio']   = $resultIdMunicipio; 
                    if($resultIdMunicipio['message'] != 'Good'){  $JSON_RESULT['message'] = 'Bad'; return $JSON_RESULT; }
                    
                    $idMunicipio                        = $resultIdMunicipio['id'];
                /*</resultIdEstado> */

                /*<resultIdPais> */
                    $resultIdEstado                   = $this->selectOne('Estados', 'nombre','idEstado', $idEstado);  
                    $JSON_RESULT['resultIdPais']      = $resultIdEstado; 
                    if($resultIdEstado['message'] != 'Good'){  $JSON_RESULT['message'] = 'Bad'; return $JSON_RESULT; }     

                    $idEstado                         = $resultIdEstado['id'];
                /*</resultIdPais> */
              
                    /*<Query>*/
                        $queryInsert = 'INSERT INTO contacto ( 
                                                idUsuario,
                                                idCampana, 
                                                nombre,  
                                                calle,  
                                                telefono,                                                  
                                                email,   
                                                noInterior,                                                   
                                                noExterior,
                                                codigoPostal,
                                                colonia,
                                                idPais,
                                                idEstado,
                                                idMunicipio,
                                                deuda,
                                                latitud,
                                                longitud,
                                                estatus,
                                                fechaCreacion, 
                                                fechaModificacion,
                                                observacion,
                                                bstate
                                                ) VALUES( 
                                                    "'.$idUser.'",
                                                    "'.$idCampana.'", 
                                                    "'.$nombre.'", 
                                                    "'.$calle.'", 
                                                    "'.$telefono.'", 
                                                    "'.$email.'", 
                                                    "'.$noInterior.'", 
                                                    "'.$noExterior.'", 
                                                    "'.$codigoPostal.'", 
                                                    "'.$colonia.'", 
                                                     '.$idPais.', 
                                                     '.$idEstado.', 
                                                     '.$idMunicipio.', 
                                                     '.$deuda.',
                                                     "'.$latitud.'", 
                                                     "'.$longitud.'",
                                                     "PENDIENTE", 

                                                    "'.$DATE.'",
                                                    "'.$DATE.'",
                                                    " [ INSERT '.$DATE.' ], [ idUser '.$idUser.' ] ",
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
              
                return $JSON_RESULT;
            }
        /*</Method createMasiva>*/

        /*<Method Delete>*/
            public function delete($id){       
                /*<Variables> */
                    /*</datos>*/
                        session_start();
                        $DATE                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];
                    /*<datos>*/
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['error'] = '';
                /*</Variables> */
                /*<Query>*/
                    $queryDeleteUpdate = '  UPDATE  contacto 
                                            SET     bstate              = 0,
                                                    fechaModificacion   = "'.$DATE.'",
                                                    observacion      = " [ DELETE '.$DATE.' ], [ idUser '.$idUser.' ] "
                                            WHERE idContacto = '.$id.';';
                /*</Query>*/
                
                $this->open();
                    if (mysqli_query($this->Connection, $queryDeleteUpdate)) {
                        /*<Respuesta>*/                           
                            $JSON_RESULT['message'] = "Good";   
                           
                        /*</Respuesta>*/
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";
                            $JSON_RESULT['queryDeleteUpdate']     = $queryDeleteUpdate;
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this->closet(); 
                return $JSON_RESULT;
            }
        /*</Method Delete>*/

        /*<RESPUESTA_CARGAR_ARREGLO>*/
            public function RESPUESTA_CARGAR_ARREGLO($NOMBRE_ARCHIVO){

                /*<VARIABLES>*/
                    $JSON_RESULT                    = [];
                    $Matris                         = []; 
                    $JSON_RESULT['NOMBRE_ARCHIVO']  = $NOMBRE_ARCHIVO;
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['test'] ;
                    $fp = fopen("./Documentos/".$NOMBRE_ARCHIVO, "r");
                /*</VARIABLES>*/

                if ( fgetcsv ($fp, 1000, ";")  !== NULL) 
                {
                    while( $Dato = fgetcsv ($fp, 1000, ";")) 
                    {    
                        $Arreglo    = explode( ',' , $Dato[0]);     
                        array_push($Matris,  $Arreglo);
                    }

                    $JSON_RESULT['Matris']          = $Matris;   
                    $JSON_RESULT['message']         = 'Good';

                    fclose($fp);    

                }
                    else
                {  
                    fclose($fp);
                    $JSON_RESULT['message']         = 'mal';
                }
                return $JSON_RESULT;
            }
        /*</RESPUESTA_CARGAR_ARREGLO>*/

        /*<Geolocalizacion>*/
            public function getGeocodeData($nExterior, $calle, $municipio, $estado ){

                /*<VARIABLES>*/
                    $JSON_RESULT = [];
                    $JSON_RESULT['message'] = '';
                    $JSON_RESULT['lat']     = 0;
                    $JSON_RESULT['lng']     = 0;
                    $address                = urlencode($nExterior.' '.$calle.' '.$municipio.' '.$estado);
                    $googleMapUrl           = "https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=AIzaSyDwQClTGJJEBxBdoDdpvZqj410LlfAb8FM&callback=initMap&";
                /*</VARIABLES>*/

                /*<API>*/
                    $ch         = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $googleMapUrl); 
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
                    curl_setopt($ch, CURLOPT_HEADER, 0); 
                    $Result     = curl_exec($ch); 
                    curl_close($ch); 
                /*<API>*/

                /*<PROSESAR INFORMACION>*/
                    $respuesta = json_decode($Result);
                    if($respuesta->{'status'}   == 'OK'){
                        /*<Result>*/
                            $JSON_RESULT['message'] = 'Good';
                            //$JSON_RESULT['result']  = $respuesta->{'results'}[0]->{'geometry'};
                            $JSON_RESULT['lat']     =  $respuesta->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
                            $JSON_RESULT['lng']     =  $respuesta->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
                        /*</Result>*/
                    }else{
                        /*<Result>*/

                            $JSON_RESULT['nExterior']   = $nExterior;
                            $JSON_RESULT['calle']       = $calle;
                            $JSON_RESULT['municipio']   = $municipio;
                            $JSON_RESULT['nExterior'] = $nExterior;
                            $JSON_RESULT['message'] = 'bad';
                            $JSON_RESULT['lat']     = 0;
                            $JSON_RESULT['lng']     = 0;
                        /*</Result>*/
                    }
                /*</PROSESAR INFORMACION>*/   

                return $JSON_RESULT;
            }
        /*</Geolocalizacion>*/

    }

    