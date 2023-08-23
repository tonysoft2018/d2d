<script   src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDwQClTGJJEBxBdoDdpvZqj410LlfAb8FM&callback=initMap&'; async></script>

<script >
    /*<OPTENER GEOLOCALIZACION>*/ 
        /*<VARIABLES>*/                 
            let option = {
                EnableHighAccuracy:true,
                Timeout:500,
                MaximunAge:0
            }
        /*</VARIABLES>*/  

        /*<GEOLOCALIZACION>*/
            if(navigator.geolocation){               
                    navigator.geolocation.getCurrentPosition(success, error,  option); console.log("hola2")
            }else{ console.log("Inservible"); }  
        /*</GEOLOCALIZACION>*/        

        /*<SUCCESS>*/
            function success(geolocationPosition){
                let coords = geolocationPosition.coords;     
                localStorage.setItem('JSON_LOCALIZACION', JSON.stringify({lat: coords.latitude, lng: coords.longitude}));
                console.log({lat: coords.latitude, lng: coords.longitude})
            }
        /*</SUCCESS>*/

        /*<ERROR>*/
            function error(error){  
                //localStorage.setItem('JSON_LOCALIZACION', JSON.stringify({lat: 20.652684681069186, lng: -103.45285311189987}));
            
                $('#message-geolocalizacion-door2door').html("");
                $('#message-geolocalizacion-door2door').html(`GEOLOCALIZACIÓN NO DISPONIBLE \n <br> 
                                                                . LE RECOMENDAMOS REINICIAR LA APLICACIÓN \n <br>
                                                                . INTENTE MOVERSE DE SU POSICIÓN \n <br>
                                                                . PRESIONE RECARGAR
                                                            `);
                $('#modal-message-geolocalizacion-door2door').modal('show');
            }
        /*</ERROR>*/
    /*<OPTENER GEOLOCALIZACION>*/
    
    /*<CREACION DEL MAPA DE GEOLOCALIZACION>*/
        /*<VARIABLES>*/
            let map;
            let Arreglo     = JSON.parse(localStorage.getItem('JSON_LOCALIZACION'));
            let centerll    = {lat: Arreglo.lat, lng: Arreglo.lng};
        /*</VARIABLES>*/

        /*<MAP>*/                    
            function   initMap(){
                /*<INSTANCIACION>*/
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: centerll,
                        zoom: 10,
                        streetViewControl: false,               
                        mapTypeControl: false,
                        fullscreenControl: false,                         
                            
                    });    
                /*<INSTANCIACION>*/ 

                /*<LOCALIZACION DEL USUARIO>*/ 
                    var marker2 = new google.maps.Marker({
                        position: centerll,
                        map:map,
                        title: "Usuario",
                        icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"                           
                        }
                    });
                /*<LOCALIZACION DEL USUARIO>*/   
                
                /*<EVENTOS>*/
                    /*<MOSTRAR MAPA>*/
                        /*<POCISIONAMOS PUNTO>*/
                            let marker1 = new google.maps.Marker({
                                position: centerll,
                                map:map,
                                title: "Visita"
                                //icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"                           
                                
                            });
                            const directionsService  = new google.maps.DirectionsService();
                            const directionsRenderer = new google.maps.DirectionsRenderer();
                            
                            
                            directionsRenderer.setMap(map);
                            
                        /*<POCISIONAMOS PUNTO>*/
                        setTimeout(() => 
                        {
                            $('.evento-mostra-mapa-sugerencias').on('click', () => 
                            {
                                setTimeout(() => 
                                {                                    
                                    /*<VARIABLES>*/
                                        let latitud         = parseFloat($('#show-latitud-door2door').val());
                                        let logitud         = parseFloat($('#show-logitud-door2door').val());                                       
                                    /*</VARIABLES>*/                          
                             
                                    /*<LIMPIEZA>*/
                                        marker1.setMap(null);   

                                        marker1 = new google.maps.Marker({
                                            position: {lat: latitud, lng: logitud},
                                            map:map,
                                            title: "Visita"                                     
                                        });                                         
                                    /*<LIMPIEZA>*/

                                       
                                    /*<RURA>*/
                                        const request = {
                                            origin: new google.maps.LatLng(Arreglo.lat,  Arreglo.lng),
                                            destination: new google.maps.LatLng(latitud, logitud),
                                            travelMode: 'DRIVING'
                                        };
                                        directionsService.route(request, response => {
                                            directionsRenderer.setDirections(response);
                                        });
                                    /*</RURA>*/

                                    $('.evento-regresar-mapa-sugerencias').on('click', () => {
                                        marker1.setMap(null);
                                    })
                                }, 500);
                                
                            });
                        }, 1000);
                    /*</MOSTRAR MAPA>*/
                /*</EVENTOS>*/
            }
        /*</MAP>*/  
    /*</CREACION DEL MAPA DE GEOLOCALIZACION>*/
       
</script>

<script type="module">
    /*<import librarys>*/ 
    
        import DataTableV   from '../ModulePugins/Pluginjs/DataTable.var.main.js';

        //import functionShow             from './js/function/Function.Show.main.js';
        import functionCreate           from './js/function/Function.Create.main.js';  
        import functionDelete           from './js/function/Function.Delete.main.js';
        import functionSelected         from './js/API/API.Selected.main.js';
        
        import functionSelectFullAPI    from './js/API/API.SelectFull.main.js';

    /*<import librarys>*/ 
    



    $(document).ready(() =>{ 
        setTimeout(() => {
            if (window.localStorage) {
                if (window.localStorage.getItem('JSON_LOCALIZACION') !== undefined && window.localStorage.getItem('JSON_LOCALIZACION') ) {
                    let Arrays = JSON.parse( localStorage.getItem('JSON_LOCALIZACION') );                          
                    if( (Arrays.lat > 0     ||  Arrays.lat < 0 ) && (Arrays.lng > 0     ||  Arrays.lng < 0 )  ){                        
                        /*<CARGAR HIDE>*/
                            $('#id-main').removeClass('opacidad');
                            $('#body-main-div').removeClass('body-main');
                            $('#body-main-div').hide();
                        /*</CARGAR HIDE>*/
                        
                    }else{
                        /*<CARGAR HIDE>*/
                            $('#id-main').removeClass('opacidad');
                            $('#body-main-div').removeClass('body-main');
                            $('#body-main-div').hide();
                        /*</CARGAR HIDE>*/
                        $('#message-geolocalizacion-door2door').html("");
                        $('#message-geolocalizacion-door2door').html(`GEOLOCALIZACIÓN NO DISPONIBLE \n <br> 
                                                                        - LE RECOMENDAMOS REINICIAR LA APLICACIÓN \n <br>
                                                                        - INTENTE MOVERSE DE SU POSICIÓN \n <br>
                                                                        - PRESIONE RECARGAR
                                                                    `);
                        $('#modal-message-geolocalizacion-door2door').modal('show');
                    }                    
                }else{
                    /*<CARGAR HIDE>*/
                        $('#id-main').removeClass('opacidad');
                        $('#body-main-div').removeClass('body-main');
                        $('#body-main-div').hide();
                    /*</CARGAR HIDE>*/
                    $('#message-geolocalizacion-door2door').html("");
                    $('#message-geolocalizacion-door2door').html(`GEOLOCALIZACIÓN NO DISPONIBLE \n <br> 
                                                                    - LE RECOMENDAMOS REINICIAR LA APLICACIÓN \n <br>
                                                                    - INTENTE MOVERSE DE SU POSICIÓN \n <br>
                                                                    - PRESIONE RECARGAR
                                                                `);
                    $('#modal-message-geolocalizacion-door2door').modal('show');
                } 
            }  
                   
        }, 1500);

        /*<Main Module Roles>*/               
            /*<Consultar toda la iformacion>*/ 
                let Arreglo     = JSON.parse(localStorage.getItem('JSON_LOCALIZACION'));
                const functionSFA = functionSelectFullAPI(Arreglo.lat,Arreglo.lng).
                then( (result) => {     console.log(result);
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/
                                let ArraysRoles = [];
                                if(result.information_visita.length > 0){
                                    let href ="/d2dVisitador/Modules/ModuleClientSeguimientos/";
                                    window.location.href = href;
                                }else{    
                                    let Information = result.information;                                          
                                    /*<Construccion del la tabla>*/ 
                                        let record = '';
                                        let TableBody= ''; 

                                        
                                        if(Information.length > 0){ 

                                            /*<Ordenamiento>*/
                                                let TotalTamano = Information.length;
                                                for (let i = 1; i < TotalTamano; i++ ) {
                                                    for (let j = 0; j < (TotalTamano - i); j++ ) 
                                                    {
                                                        if ( Information[ j ].distancia > Information[ j + 1 ].distancia ) {
                                                            
                                                            /*<Variables>*/
                                                                let Aux_idContacto  = '';
                                                                let Aux_latitud     = '';
                                                                let Aux_longitud    = '';
                                                                let Aux_tipoVisita  = '';
                                                                let Aux_distancia   = '';
                                                                
                                                                let Aux_calle       = '';
                                                                let Aux_noInterior  = '';
                                                                let Aux_noExterior  = '';
                                                                let Aux_Colonia     = '';
                                                                let Aux_Municipio   = '';
                                                                let Aux_Estado      = '';
                                                                let Aux_Estatus     = '';
                                                                let Aux_comentarioAgenda = "";
                                                            /*<Variables>*/

                                                            /*<Primera Asicnacion Aux>*/
                                                                Aux_idContacto  = Information[ j ].idContacto;
                                                                Aux_latitud     = Information[ j ].latitud;
                                                                Aux_longitud    = Information[ j ].longitud;
                                                                Aux_tipoVisita  = Information[ j ].tipoVisita;
                                                                Aux_distancia   = Information[ j ].distancia;

                                                                Aux_calle       = Information[ j ].calle;
                                                                Aux_noInterior  = Information[ j ].noInterior;
                                                                Aux_noExterior  = Information[ j ].noExterior;    
                                                                Aux_Colonia     = Information[ j ].colonia;    
                                                                Aux_Municipio   = Information[ j ].Municipio;    
                                                                Aux_Estado      = Information[ j ].Estado; 
                                                                Aux_Estatus     = Information[ j ].estatus;   
                                                                Aux_comentarioAgenda  = Information[ j ].comentarioAgenda;  
                                                                                                
                                                            /*</Primera Asicnacion Aux>*/

                                                            /*<Segunda Asicnacion j >*/
                                                                Information[ j ].idContacto = Information[ j +1 ].idContacto;
                                                                Information[ j ].latitud    = Information[ j +1 ].latitud;
                                                                Information[ j ].longitud   = Information[ j +1 ].longitud;
                                                                Information[ j ].tipoVisita = Information[ j +1 ].tipoVisita;
                                                                Information[ j ].distancia  = Information[ j +1 ].distancia;

                                                                Information[ j ].calle      = Information[ j +1 ].calle;
                                                                Information[ j ].noInterior = Information[ j +1 ].noInterior;
                                                                Information[ j ].noExterior = Information[ j +1 ].noExterior;

                                                                Information[ j ].colonia    = Information[ j +1 ].colonia;
                                                                Information[ j ].Municipio  = Information[ j +1 ].Municipio;
                                                                Information[ j ].Estado     = Information[ j +1 ].Estado;
                                                                Information[ j ].estatus    = Information[ j +1 ].estatus;
                                                                Information[ j ].comentarioAgenda =  Information[ j +1 ].comentarioAgenda;  

                                                            /*</Segunda Asicnacion j >*/

                                                            /*<Tercera Asicnacion j +1>*/
                                                                Information[ j +1 ].idContacto = Aux_idContacto;
                                                                Information[ j +1 ].latitud    = Aux_latitud;
                                                                Information[ j +1 ].longitud   = Aux_longitud;
                                                                Information[ j +1 ].tipoVisita = Aux_tipoVisita;
                                                                Information[ j +1 ].distancia  = Aux_distancia; 

                                                                Information[ j +1 ].calle       = Aux_calle; 
                                                                Information[ j +1 ].noInterior  = Aux_noInterior; 
                                                                Information[ j +1 ].noExterior  = Aux_noExterior; 

                                                                Information[ j +1 ].colonia     = Aux_Colonia; 
                                                                Information[ j +1 ].Municipio   = Aux_Municipio; 
                                                                Information[ j +1 ].Estado      = Aux_Estado; 
                                                                Information[ j +1 ].estatus     = Aux_Estatus;
                                                                Information[ j +1 ].comentarioAgenda = Aux_comentarioAgenda;  
                                                            /*</Tercera Asicnacion j +1>*/
                                                        }
                                                    }
                                                }
                                            /*<Ordenamiento>*/
                                            for(let i = 0; i <10; i++) {
                                                console.log(Information[i].estatus)
                                                if(Information[i].estatus != 'POR HACER') {
                                                    record =  `
                                                            <div class="row" style="border: 1px solid #000;border-radius: 15px;background:#EEE4E2;">
                                                                <div class="col-8">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <label>Domicilio:</label> ${Information[i].calle}  ${Information[i].colonia}  
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <label>Tipo:</label> ${Information[i].tipoVisita}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <label>Distancia Km:</label> ${Information[i].distancia.toFixed(2)}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">                                   
                                                                    <div class="row" >
                                                                        <div class="col-sm-12">
                                                                        <br><br>
                                                                            <button     type="button" 
                                                                                        class="btn btn-warning  btn-block"                                                         
                                                                                        onclick="SelectedMap(  
                                                                                            ${Information[i].idContacto}, 
                                                                                        '${Information[i].tipoVisita}',                                                                
                                                                                            ${Information[i].latitud},
                                                                                            ${Information[i].longitud},
                                                                                            ${Information[i].distancia.toFixed(2)}
                                                                                        );"                                                       
                                                                                > IR </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><hr>
                                                            `;  

                                                            
                                                    TableBody +=  record;
                                                }else{
                                                    record =  `
                                                            <div class="row" style="border: 1px solid #000;border-radius: 15px;background:#EEE4E2;">
                                                                <div class="col-8">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <label> Estatus: </label>  ${Information[i].estatus}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <label>Domicilio:</label> ${Information[i].calle}  ${Information[i].colonia}  
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <label>Tipo:</label> ${Information[i].tipoVisita}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <label>Distancia Km:</label> ${Information[i].distancia.toFixed(2)}
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="col-4"><br>
                                                                    <div class="row" style="margin:3px">
                                                                        <div class="col-sm-12" >                                                                        
                                                                            <button     type="button" 
                                                                                        class="btn btn-primary  btn-block"                                                         
                                                                                        onclick="ShowMap(  
                                                                                            '${Information[i].comentarioAgenda}', 
                                                                                        );"                                                       
                                                                                > Ver </button>
                                                                        </div>
                                                                    </div>                              
                                                                    <div class="row" style="margin:3px">
                                                                        <div class="col-sm-12">                                                                        
                                                                            <button     type="button" 
                                                                                        class="btn btn-warning  btn-block"                                                         
                                                                                        onclick="SelectedMap(  
                                                                                            ${Information[i].idContacto}, 
                                                                                            '${Information[i].tipoVisita}',                                                                
                                                                                            ${Information[i].latitud},
                                                                                            ${Information[i].longitud},
                                                                                            ${Information[i].distancia.toFixed(2)}
                                                                                        );"                                                       
                                                                                > IR </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><hr>
                                                            `;  

                                                            
                                                    TableBody +=  record;
                                                }
                                            }

                                            
                                            $('#Information-main').html(TableBody);
                                            
                                        
                                        }     
                                    /*</Construccion del la tabla>*/
                                }
                               
                              
                            /*<Consulta exitosa>*/                        
                        }else{
                           /*<Error de query>*/ 
                                $('#message-error-door2door').html("");
                                $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                $('#modal-message-error-door2door').modal('show');
                            /*</Error de query>*/  
                        }       
                    }                           
                }).catch( (err) => { 
                    /*<Error de query>*/ 
                        $('#message-error-door2door').html("");
                        $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                        $('#modal-message-error-door2door').modal('show');
                    /*</Error de query>*/  
                });
            /*<Consultar toda la iformacion>*/ 

            /*<Evento creacion de un nuevo>*/
                $('#button-create-door2door').on('click', () =>{ const Funresult = functionCreate(); }); 
            /*</Evento creacion de un nuevo>*/

            /*<Evento actualizacion>*/              
                $('#button-update-door2door').on('click', () =>{ const Funresult = functionUpdate();  });
            /*<Evento actualizacion>*/ 

            /*<Evento eliminacion>*/  
                $('#button-delete-door2door').on('click', ()=> { const Funresult = functionDelete();  });
            /*</Evento eliminacion>*/ 

            /*<Evento eliminacion>*/  
                $('#button-seleccionar-continuar').on('click', ()=> { $('#modal-seleccionar-door2door').modal('show');  });
            /*</Evento eliminacion>*/ 
            

            $('#seleccionar-continuar').on('click', () => {

                            
            });
            
        /*</Main Module Roles>*/                                 
    });
</script>