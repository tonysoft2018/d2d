<?php

namespace  d2dSocioWeb\Modules\ModuleCampaign\Model\Contactos;
    /*<Includes>*/
        include_once('../../ModulePugins/door2door.Cofiguration.Conection.php');
    /*<Includes>*/
    /*<use>*/
        use  d2dSocioWeb\Modules\ModulePugins\Conection\Conection as ConectionContactos;
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
                                        $noExterior,
                                        $noInterior,
                                        $codigoPostal,
                                        $colonia,
                                        $idPais,
                                        $idEstado,
                                        $idMunicipio,
                                        $entreCalle,
                                        $instrucciones,
                                        $telefono,
                                        $email,
                                        $idCampana,
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
                    $JSON_RESULT['error']           = '';
                    $RESPUESTA_VALIDACION           = [];
                /*</Variables> */

                    $RESPUESTA_VALIDACION                   =   $this->RESPUESTA_VALIDAR_NOMBRE_CONTACTO_UNO( 
                                                                        $nombre, 
                                                                        $telefono, 
                                                                        $idCampana, 
                                                                        0
                                                            );
                    $JSON_RESULT['RESPUESTA_VALIDACION']    = $RESPUESTA_VALIDACION;

                if( $RESPUESTA_VALIDACION['message']    == 'Good' && $RESPUESTA_VALIDACION['total']      == 0   ){
                    if( ($latitud < 0   || $latitud > 0)  &&  ($longitud < 0  || $longitud > 0) ){
                        /*<Query>*/
                            $queryInsert = 'INSERT INTO contacto ( 
                                                    idCampana,
                                                    idUsuario,                                               
                                                    nombre,  
                                                    calle,                                                                                                          
                                                    noExterior,
                                                    noInterior, 
                                                    codigoPostal,
                                                    colonia,
                                                    idPais,
                                                    idEstado,
                                                    idMunicipio,
                                                    entreCalle,
                                                    latitud,
                                                    longitud,
                                                
                                                    instrucciones,
                                                    telefono,
                                                    email,
                                                    estatus,

                                                    fechaCierre,
                                                    fechaCancelacion,
                                                    comentarios,

                                                    fechaCreacion, 
                                                    fechaModificacion,
                                                    observacion,
                                                    bstate
                                                    ) VALUES( 
                                                        "'.$idCampana.'",
                                                        "'.$idUser.'", 
                                                        "'.$nombre.'", 
                                                        "'.$calle.'", 
                                                        "'.$noExterior.'", 
                                                        "'.$noInterior.'", 
                                                        "'.$codigoPostal.'", 
                                                        "'.$colonia.'", 
                                                        '.$idPais.', 
                                                        '.$idEstado.', 
                                                        '.$idMunicipio.', 
                                                        "'.$entreCalle.'", 
                                                        "'.$latitud.'", 
                                                        "'.$longitud.'",   

                                                        "'.$instrucciones.'", 
                                                        "'.$telefono.'", 
                                                        "'.$email.'",                                                   
                                                        "PENDIENTE", 

                                                        "0000-00-00 00:00:00",
                                                        "0000-00-00 00:00:00",
                                                        "SIN COMENTARIOS",

                                                        "'.$DATE.'",
                                                        "'.$DATE.'",
                                                        " [ INSERT '.$DATE.' ], [ idUser '.$idUser.' ] ",
                                                        1
                                                    );';
                        /*</Query>*/
                        
                        //$JSON_RESULT['queryInsert'] = $queryInsert;

                        $this->open();        
                            if ( mysqli_query( $this->Connection, $queryInsert)) {
                                $JSON_RESULT['message']     = "Good";
                            } else {
                                $JSON_RESULT['message']     = "Bad";                            
                                $JSON_RESULT['error']       = "Error: <br>" . mysqli_error($this->Connection);
                            }        
                        $this->closet();
                    }else{
                        $JSON_RESULT['message']     = "No hay latitud ni logitud";  
                    }
                }else{
                    $JSON_RESULT['message']         = "Contacto Repetido";  
                }

                    return $JSON_RESULT;    
            }
        /*</Method Create>*/

        /*<Method Update>*/
            public function Update( 
                                        $idContacto,
                                        $nombre,    
                                        $calle,
                                        $noExterior,
                                        $noInterior,
                                        $codigoPostal,
                                        $colonia,
                                        $idPais,
                                        $idEstado,
                                        $idMunicipio,
                                        $entreCalle,
                                        $instrucciones,
                                        $telefono,
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
                  
                    $JSON_RESULT['message']                         = '';
                    $JSON_RESULT['error']           = '';
                /*</Variables> */

                $RESPUESTA_VALIDACION = $this->RESPUESTA_VALIDAR_NOMBRE_CONTACTO_UNO( $nombre, $telefono, 0, $idContacto);


                $JSON_RESULT['RESPUESTA_VALIDACION'] = $RESPUESTA_VALIDACION;

                $NOMBRE_MUNICIPIO           = '';
                $NOMBRE_ESTADO              = '';

                $NOMBRE_MUNICIPIO           = $this->selectIdMunicipio( $idMunicipio);                
                $NOMBRE_ESTADO              = $this->selectIdEstado( $idEstado );

                /*<VALIDACION DE FUNCION NOMBRE_MUNICIPIO>*/
                    if($NOMBRE_MUNICIPIO['message'] != 'Good'){
                        $NOMBRE_MUNICIPIO = '';
                    }else{
                        $NOMBRE_MUNICIPIO = $NOMBRE_MUNICIPIO['nombre'];
                        
                    }
                /*</VALIDACION DE FUNCION NOMBRE_MUNICIPIO>*/

                /*<VALIDACION DE FUNCION NOMBRE_ESTADO>*/
                    if($NOMBRE_ESTADO['message'] != 'Good'){
                        $NOMBRE_ESTADO = '';
                    }else{
                        $NOMBRE_ESTADO = $NOMBRE_ESTADO['nombre'];
                    }
                /*</VALIDACION DE FUNCION NOMBRE_ESTADO>*/

                $RESPUESTA_GEOLOCALIZACION_UNO = $this->getGeocodeData(
                    $noExterior,
                    $calle,
                    $NOMBRE_MUNICIPIO,
                    $NOMBRE_ESTADO
                );

                $latitud     = $RESPUESTA_GEOLOCALIZACION_UNO['lat'];
                $longitud    = $RESPUESTA_GEOLOCALIZACION_UNO['lng'];

                if($RESPUESTA_VALIDACION['message'] == 'Good' && $RESPUESTA_VALIDACION['total']  == 0){
                    if( 
                        ($latitud < 0   || $latitud > 0)    &&
                        ($longitud < 0  || $longitud > 0)
                    ){
                        /*<Query>*/
                            $queryUpdate = 'UPDATE contacto SET                                             
                                                    nombre              =  "'.$nombre.'",  
                                                    calle               =  "'.$calle.'",                                                                                                          
                                                    noExterior          =  "'.$noExterior.'",
                                                    noInterior          =  "'.$noInterior.'", 
                                                    codigoPostal        =  "'.$codigoPostal.'",
                                                    colonia             =  "'.$colonia.'",
                                                    idPais              =  '.$idPais.',
                                                    idEstado            =  '.$idEstado.',
                                                    idMunicipio         =  '.$idMunicipio.',
                                                    entreCalle          =  "'.$entreCalle.'",
                                                    latitud             =  "'.$latitud.'",
                                                    longitud            =  "'.$longitud.'",
                                                
                                                    instrucciones       =  "'.$instrucciones.'",
                                                    telefono            =  "'.$telefono.'",
                                                    email               =  "'.$email.'",                                                 

                                                    fechaModificacion   =  "'.$DATE.'",
                                                    observacion         =  " [ INSERT '.$DATE.' ], [ idUser '.$idUser.' ] " 
                                            
                                                    WHERE  idContacto  = '.$idContacto;
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
                    }else{
                        $JSON_RESULT['message']     = "No hay latitud ni logitud";  
                    }
                }else{
                    $JSON_RESULT['message']         = "Contacto Repetido";  
                }
                return $JSON_RESULT;    
            }
        /*</Method Update>*/

        /*<Method createMasiva>*/
            public function createMasiva( 
                                        $nombre,    
                                        $calle,                                       
                                        $noExterior,
                                        $noInterior,
                                        $codigoPostal,
                                        $colonia,
                                        $idPais,
                                        $idEstado,
                                        $idMunicipio,
                                        $entreCalle,
                                        $instrucciones,                                       
                                        $telefono,
                                        $email,   

                                        $idCampana,
                                        $latitud,       
                                        $longitud,
                                        $contador,
                                        $ARREGLO_PAIS_2,
                                        $ARREGLO_ESTADO_2,
                                        $ARREGLO_MUNICIPIO_2                                 
                                    ){
                /*<Variables> */
                    /*</datos>*/
                        session_start();
                        $DATE                       = date('Y-m-d h:i:s');
                        $idUser                     = $_SESSION["idUser-door2door"];
                       
                    /*<datos>*/
                    
                    $JSON_RESULT                    = [];
                   
                    $JSON_RESULT['message']         = '';
                /*</Variables> */

                /*<resultIdPais> */
                    $resultIdPais                   = $this->selectOne('paises', 'nombre', 'idPais', $idPais);  
                    //$JSON_RESULT['resultIdPais']    = $resultIdPais; 
                    if($resultIdPais['message'] != 'Good'){    $idPais = 0; }                        
                    $idPais = $resultIdPais['id'];
                /*</resultIdPais> */

                /*<resultIdEstado> */
                    $resultIdMunicipio                  = $this->selectOne('Municipios', 'nombre', 'idMunicipio', $idMunicipio);  
                    //$JSON_RESULT['resultIdMunicipio']   = $resultIdMunicipio; 
                    if($resultIdMunicipio['message'] != 'Good'){  $idMunicipio = 0; }                    
                    $idMunicipio                        = $resultIdMunicipio['id'];
                /*</resultIdEstado> */

                /*<resultIdPais> */
                    $resultIdEstado                   = $this->selectOne('Estados', 'nombre','idEstado', $idEstado);  
                    //$JSON_RESULT['resultIdPais']      = $resultIdEstado; 
                    if($resultIdEstado['message'] != 'Good'){  $idEstado = 0; }    
                    $idEstado                         = $resultIdEstado['id'];
                /*</resultIdPais> */
                    if(
                        $idPais         > 0 &&
                        $idEstado       > 0 &&
                        $idMunicipio    > 0 
                    ){       
                        if(
                            $nombre         != '' &&
                            $calle          != '' &&
                            $noExterior     != '' &&
                            $codigoPostal   != '' &&
                            $colonia        != '' &&
                            $telefono       != ''
                        ){  
                            /*<PROCESO DE INSERCION>*/                    
                                /*<Query>*/
                                    $queryInsert = 'INSERT INTO contacto ( 
                                                            idUsuario,
                                                            idCampana, 
                                                            nombre,  
                                                            calle,                                                                                                   
                                                            noExterior,
                                                            noInterior,
                                                            codigoPostal,
                                                            colonia,
                                                            idPais,
                                                            idEstado,
                                                            idMunicipio,
                                                            entreCalle,
                                                            instrucciones,
                                                            telefono,  
                                                            email,                                             
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
                                                                "'.$noExterior.'", 
                                                                "'.$noInterior.'", 
                                                                "'.$codigoPostal.'", 
                                                                "'.$colonia.'", 
                                                                '.$idPais.', 
                                                                '.$idEstado.', 
                                                                '.$idMunicipio.', 
                                                                "'.$entreCalle.'",
                                                                "'.$instrucciones.'", 
                                                                "'.$telefono.'", 
                                                                "'.$email.'", 
                                                                "'.$latitud.'", 
                                                                "'.$longitud.'",
                                                                "PENDIENTE", 

                                                                "'.$DATE.'",
                                                                "'.$DATE.'",
                                                                " [ INSERT '.$DATE.' ], [ idUser '.$idUser.' ] ",
                                                                1
                                                            );';
                                /*</Query>*/
                                
                                //$JSON_RESULT['queryInsert'] = $queryInsert;
                                $this->open();        
                                    if ( mysqli_query( $this->Connection, $queryInsert)) {
                                        $JSON_RESULT['message']     = "Good";
                                    } else {
                                        //$JSON_RESULT['message']     = "Bad";                            
                                        //$JSON_RESULT['error']       = "Error: <br>" . mysqli_error($this->Connection);
                                        $JSON_RESULT['message']                  = "Error de Query";   
                                        $JSON_RESULT['ARREGLO_NOMBRE']           = $nombre;
                                        $JSON_RESULT['ARREGLO_CALLE']            = $calle;
                                        $JSON_RESULT['ARREGLO_NOEXTERIOR']       = $noExterior;
                                        $JSON_RESULT['ARREGLO_NOINTERIOR']       = $noInterior;
                                        $JSON_RESULT['ARREGLO_CODIGOPOSTAL']     = $codigoPostal;
                                        $JSON_RESULT['ARREGLO_COLONIA']          = $colonia;
                                        $JSON_RESULT['ARREGLO_PAIS']             = $ARREGLO_PAIS_2;
                                        $JSON_RESULT['ARREGLO_ESTADO']           = $ARREGLO_ESTADO_2;
                                        $JSON_RESULT['ARREGLO_MUNICIPIO']        = $ARREGLO_MUNICIPIO_2;
                                        $JSON_RESULT['ARREGLO_ENTRE_CALLE']      = $entreCalle;
                                        $JSON_RESULT['ARREGLO_INSTRUCCCIONES']   = $instrucciones;
                                        $JSON_RESULT['ARREGLO_TELEFONO']         = $telefono;
                                        $JSON_RESULT['ARREGLO_EMAIL']            = $email;
                                        $JSON_RESULT['queryInsert']              = $queryInsert;
                                    }        
                                $this->closet();
                            /*</PROCESO DE INSERCION>*/  
                        }else{
                            $JSON_RESULT['message']                  = "FALTAN DATOS";   
                            $JSON_RESULT['ARREGLO_NOMBRE']           = $nombre;
                            $JSON_RESULT['ARREGLO_CALLE']            = $calle;
                            $JSON_RESULT['ARREGLO_NOEXTERIOR']       = $noExterior;
                            $JSON_RESULT['ARREGLO_NOINTERIOR']       = $noInterior;
                            $JSON_RESULT['ARREGLO_CODIGOPOSTAL']     = $codigoPostal;
                            $JSON_RESULT['ARREGLO_COLONIA']          = $colonia;
                            $JSON_RESULT['ARREGLO_PAIS']             = $ARREGLO_PAIS_2;
                            $JSON_RESULT['ARREGLO_ESTADO']           = $ARREGLO_ESTADO_2;
                            $JSON_RESULT['ARREGLO_MUNICIPIO']        = $ARREGLO_MUNICIPIO_2;
                            $JSON_RESULT['ARREGLO_ENTRE_CALLE']      = $entreCalle;
                            $JSON_RESULT['ARREGLO_INSTRUCCCIONES']   = $instrucciones;
                            $JSON_RESULT['ARREGLO_TELEFONO']         = $telefono;
                            $JSON_RESULT['ARREGLO_EMAIL']            = $email;
                        }
                    }else{
                        $JSON_RESULT['message']                  = "PAIS-ESTADO-MUNICIOPIO NO LOCALIZADO";                        
                        $JSON_RESULT['ARREGLO_NOMBRE']           = $nombre;
                        $JSON_RESULT['ARREGLO_CALLE']            = $calle;
                        $JSON_RESULT['ARREGLO_NOEXTERIOR']       = $noExterior;
                        $JSON_RESULT['ARREGLO_NOINTERIOR']       = $noInterior;
                        $JSON_RESULT['ARREGLO_CODIGOPOSTAL']     = $codigoPostal;
                        $JSON_RESULT['ARREGLO_COLONIA']          = $colonia;
                        $JSON_RESULT['ARREGLO_PAIS']             = $ARREGLO_PAIS_2;
                        $JSON_RESULT['ARREGLO_ESTADO']           = $ARREGLO_ESTADO_2;
                        $JSON_RESULT['ARREGLO_MUNICIPIO']        = $ARREGLO_MUNICIPIO_2;
                        $JSON_RESULT['ARREGLO_ENTRE_CALLE']      = $entreCalle;
                        $JSON_RESULT['ARREGLO_INSTRUCCCIONES']   = $instrucciones;
                        $JSON_RESULT['ARREGLO_TELEFONO']         = $telefono;
                        $JSON_RESULT['ARREGLO_EMAIL']            = $email;
                    }
                         
              
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
                    $JSON_RESULT['test'] = '';
                    $fp = fopen("./Documentos/".$NOMBRE_ARCHIVO, "r");
                /*</VARIABLES>*/

                if ( fgetcsv ($fp, 10000, "\n")  !== NULL) 
                {
                    while( $Dato = fgetcsv ($fp, 1000, "\n")) 
                    {    
                        $Arreglo    = explode( ',' , $Dato[0]);     
                        array_push($Matris,  $Arreglo);
                    }
                    $JSON_RESULT['Dato']          = $Dato;   

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

        /*<RESPUESTA_VALIDAR_NOMBRE_CONTACTO_UNO>*/
            public function RESPUESTA_VALIDAR_NOMBRE_CONTACTO_UNO( $nombre, $telefono, $idCampana, $idContacto){
                /*<Variables> */
                    $JSON_RESULT                    = [];
                    $JSON_RESULT['information']     = [];
                    $JSON_RESULT['message']         = '';
                    $JSON_RESULT['total']           = 0;
                    $JSON_RESULT['error']           = '';
                /*</Variables> */

                /*<Query> */
                    if($idCampana > 0){
                        $ContactosQuery = 'SELECT  count(idContacto) AS total
                                                FROM contacto 
                                            WHERE 
                                                idCampana   = '.$idCampana.'    AND 
                                                bstate      = 1                 AND
                                                telefono    = "'.$telefono.'"   AND 
                                                nombre      = "'.$nombre.'"  
                                            ';
                    }else{
                        $ContactosQuery = 'SELECT  count(con1.idContacto) AS total
                                                FROM contacto con1
                                            WHERE 
                                                            con1.idCampana   = (
                                                                                SELECT con2.idCampana 
                                                                                    FROM contacto con2 
                                                                                    WHERE 
                                                                                        con2.idContacto = '.$idContacto.'
                                                                            )    AND 
                                                            con1.bstate      = 1                 AND
                                                            con1.telefono    = "'.$telefono.'"   AND 
                                                            con1.nombre      = "'.$nombre.'"     AND
                                                            con1.idContacto  != '.$idContacto.'
                                            ';
                    }                  
                /*</Query> */

                //$JSON_RESULT['ContactosQuery']      = $ContactosQuery;

                $this->open();            
                    if ($resultQuery = mysqli_query($this->Connection, $ContactosQuery)) {
                        $JSON_RESULT['message'] = "Good";   
                        if ($resultQuery->num_rows > 0) {                            
                            while ($Rol = $resultQuery->fetch_array(MYSQLI_ASSOC)) {
                                $JSON_RESULT['total'] = $Rol['total'];
                            }                            
                        }
                    } else {
                        /*<Respuesta>*/
                            $JSON_RESULT['message']         = "Bad";                            
                            $JSON_RESULT['Error']           = "Error: <br>" . mysqli_error($this->Connection);
                        /*</Respuesta>*/
                    }        
                $this->closet();
                return $JSON_RESULT;    
            }
        /*</RESPUESTA_VALIDAR_NOMBRE_CONTACTO_UNO>*/

    }

    