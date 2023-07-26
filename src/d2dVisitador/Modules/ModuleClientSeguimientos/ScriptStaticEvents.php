<script   src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDwQClTGJJEBxBdoDdpvZqj410LlfAb8FM&callback=initMap&'; async></script>

<script >
        //localStorage.setItem('JSON_LOCALIZACION', JSON.stringify({lat: 1, lng: 1}));
        
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
                        zoom: 17,
                        streetViewControl: false,               
                        mapTypeControl: false,
                        fullscreenControl: false,                         
                            
                    });    
                /*<INSTANCIACION>*/ 

                /*<LOCALIZACION DEL USUARIO>*/ 
                    var marker = new google.maps.Marker({
                        position: centerll,
                        map:map,
                        title: "Usuario",
                        icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"                           
                        }
                    });

                   
                /*<LOCALIZACION DEL USUARIO>*/   
                
                /*<EVENTOS>*/
                    /*<MOSTRAR MAPA>*/
                        setTimeout(() => 
                        {
                                setTimeout(() => {
                                   
                                    /*<VARIABLES>*/
                                        let latitud         = parseFloat($('#show-latitud-door2door').val());
                                        let logitud         = parseFloat($('#show-logitud-door2door').val());
                                    /*</VARIABLES>*/
                                    console.log({lat: latitud, lng: logitud})

                                    /*<POCISIONAMOS PUNTO>*/
                                        let marker1 = new google.maps.Marker({
                                            position: {lat: latitud, lng: logitud},
                                            map:map,
                                            title: "tipoDeVisita",
                                                                    
                                            
                                        });
                                    /*<POCISIONAMOS PUNTO>*/

                                    //Begin Routing
                                    const directionsService  = new google.maps.DirectionsService();
                                    const directionsRenderer = new google.maps.DirectionsRenderer();
                                    directionsRenderer.setMap(map);
                                    const request = {
                                        origin: new google.maps.LatLng(Arreglo.lat,  Arreglo.lng),
                                        destination: new google.maps.LatLng(latitud, logitud),
                                        travelMode: 'DRIVING'
                                    };
                                    directionsService.route(request, response => {
                                        directionsRenderer.setDirections(response);
                                    });
                                    /*<DEMONIO>*/                                         
                                        setInterval(() => 
                                        {    
                                            /*<LIMPIEZA>*/
                                            marker1.setMap(null);
                                            
                                            /*<LIMPIEZA>*/

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
                                                            navigator.geolocation.getCurrentPosition(success, error,  option);
                                                    }else{ console.log("Inservible"); }  
                                                /*</GEOLOCALIZACION>*/        

                                                /*<SUCCESS>*/
                                                    function success(geolocationPosition){
                                                        
                                                        let coords = geolocationPosition.coords;   

                                                        localStorage.setItem('JSON_LOCALIZACION', JSON.stringify({lat: coords.latitude, lng: coords.longitude}));
                                                        //localStorage.setItem('JSON_LOCALIZACION', JSON.stringify({lat: 20.652684681069186, lng: -103.45285311189987}));
                                                        ////console.log("###>>>");
                                                       // console.log({lat: 20.652684681069186, lng: -103.45285311189987});
                                                        const request = {
                                                            origin: new google.maps.LatLng( coords.latitude,  coords.longitude),
                                                            destination: new google.maps.LatLng(latitud, logitud),
                                                            travelMode: 'WALKING'
                                                        };
                                                        
                                                        directionsService.route(request, response => {
                                                            directionsRenderer.setDirections(response);
                                                        });
                                                            
                                                           
                                                        /*<LOCALIZACION ACTUAL>*/
                                                    }
                                                /*</SUCCESS>*/

                                                /*<ERROR>*/
                                                    function error(error){           
                                                        console.log("#################################################################");
                                                        console.log(error)
                                                    }
                                                /*</ERROR>*/
                                            /*<OPTENER GEOLOCALIZACION>*/   
                                        }, 10000);  
                                    /*</DEMONIO>*/ 
                                   
                                }, 500);
                        }, 1000);
                    /*</MOSTRAR MAPA>*/
                /*</EVENTOS>*/


                
            }
        /*</MAP>*/  

    /*</CREACION DEL MAPA DE GEOLOCALIZACION>*/
</script>

<script type="module">
    /*<import librarys>*/ 
    
        import DataTableV                   from '../ModulePugins/Pluginjs/DataTable.var.main.js';
        import functionSelectFullAPI        from './js/API/API.SelectFull.main.js';
        import functionCancelacion          from './js/function/Function.Cancelar.main.js';
        import functionFinalizar            from './js/function/Function.Finalizada.main.js';
        import functionArchivo              from './js/function/Function.Archivo.main.js';
        import functionEliminar             from './js/function/Function.EliminarArchivo.main.js';
        import functionLogsGeolocalizacion  from './js/API/API.LogsGeolocalizacion.main.js';

    /*<import librarys>*/ 
  
    
        

    $(document).ready( () =>
    {   
         
        let array = JSON.parse(localStorage.getItem('JSON_LOCALIZACION'));
        alert(array.lat);
        
        setTimeout(() => {
           
            if (window.localStorage) 
            {
                if (window.localStorage.getItem('JSON_LOCALIZACION') !== undefined && window.localStorage.getItem('JSON_LOCALIZACION') ) 
                {
                    let Arrays = JSON.parse(localStorage.getItem('JSON_LOCALIZACION'));  

                    if( 
                        (Arrays.lat > 0  ||  Arrays.lat < 0 ) &&  
                        (Arrays.lng > 0 ||  Arrays.lng < 0 ) 
                    ){
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
        
          
        setInterval(() => { 
            let Arregl1o     = JSON.parse(localStorage.getItem('JSON_LOCALIZACION'));
            let idVisita     = $('#show-idVisita-door2door').val();   
            const functionLogsGeolocalizacionres =  functionLogsGeolocalizacion(
                idVisita,
                Arregl1o.lat,
                Arregl1o.lng
            );
        
        }, 120000);//


        /*<Main Module Roles>*/               
            /*<Consultar toda la iformacion>*/ 
                const functionSFA = functionSelectFullAPI().
                then( (result) => {     console.log(result);
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            if(result.information.length > 0){
                                /*<Consulta exitosa>*/
                                    let ArraysRoles = [];
                                    ArraysRoles = result.information;    

                                    $('#show-latitud-door2door').val(result.information[0].latitud);         
                                    $('#show-logitud-door2door').val(result.information[0].longitud);  
                                    $('#show-idContacto-door2door').val(result.information[0].idContacto);  
                                    $('#show-idVisita-door2door').val(result.information[0].idVisita);   
                                    
                                    let Domicilio = result.information[0].Pais+' '+
                                                    result.information[0].Estado+' '+
                                                    result.information[0].Municipio+' '+
                                                    result.information[0].colonia+' '+
                                                    result.information[0].calle+' '+
                                                    result.information[0].noExterior+' '+
                                                    result.information[0].noInterior;
                                    $('#nombre-contacto').html("Contacto: "+result.information[0].nombre);   
                                    $('#telefono-contacto').html("Telefono: "+result.information[0].telefono);   
                                    $('#domicilio-contacto').html("Domicilio: "+Domicilio);   
                                /*<Consulta exitosa>*/      
                            }else{
                                $('#modal-message-cancelacion-door2door').modal('show');
                                $('#message-cancelacion-door2door').html('No tines visitas seleccionada');
                            }                  
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

           
        
            /*<Evento Cancelar>*/             
                $('#button-Cancelar').on('click', ()=> { 
                    $('#modal-cancelar-door2door').modal('show');  
                    $('#tipo-cancelacion').val("inicio"); 
                });

                $('#button-Cancelar-registro').on('click', ()=> { 
                    $('#modal-cancelar-door2door').modal('show'); $
                    ('#tipo-cancelacion').val("registro"); 
                 });                
            /*</Evento Cancelar>*/

            /*<Evento Registrar>*/  
                $('#button-Registrar').on('click', ()=> { $('#modal-registrar-door2door').modal('show');  });
            /*</Evento Registrar>*/ 
            /*<Evento Registrar>*/  
                $('#button-registrar-visita-door2door').on('click', ()=> { $('#modal-finalizar-visita-door2door').modal('show');  });
            /*</Evento Registrar>*/ 

            /*<Evento indicaciones>*/  
                $('#button-indicaciones').on('click', ()=> { $('#modal-comentarios-door2door').modal('show');  });
            /*</Evento indicaciones>*/ 

            

            /*<Evento cancelacion-Si>*/  
                $('#cancelacion-Si').on('click', ()=> {    
                    /*<CARGAR SHOW>*/
                        $('#id-main').addClass('opacidad');
                        $('#body-main-div').show();
                        $('#body-main-div').addClass('body-main');
                    /*</CARGAR SHOW>*/
                    const functionCancelacionResult = functionCancelacion(); 
                });
            /*</Evento cancelacion-Si>*/ 

            /*<Evento cancelacion-Si>*/  
                $('#finalizar-Si').on('click', ()=> {    
                    /*<CARGAR SHOW>*/
                        $('#id-main').addClass('opacidad');
                        $('#body-main-div').show();
                        $('#body-main-div').addClass('body-main');
                    /*</CARGAR SHOW>*/      
                    const functionFinalizarResult = functionFinalizar().then(() => {  
                        setTimeout(() => {     
                            $('#modal-esperar-door2door').modal('hide');                    
                            setTimeout(() => {
                                $('#modal-esperar-door2door').modal('hide');           
                            }, 500);
                        }, 500);
                    }); 
                });
            /*</Evento cancelacion-Si>*/ 

            /*<Evento cancelacion-Si>*/  
                $('#elimininar-Si').on('click', ()=> {   
                    /*<CARGAR SHOW>*/
                        $('#id-main').addClass('opacidad');
                        $('#body-main-div').show();
                        $('#body-main-div').addClass('body-main');
                    /*</CARGAR SHOW>*/                   
                    const functionEliminarResult = functionEliminar().then(() => { 
                        setTimeout(() => {
                            $('#modal-esperar-door2door').modal('hide'); 
                            setTimeout(() => {                               
                                $('#modal-registrar-door2door').modal('show');  
                            }, 500);
                        }, 500);
                    });            
                   
                });
            /*</Evento cancelacion-Si>*/
            
            /*<Evento Guardar Archiv>*/  
                $('#button-evidencia-door2door').on('click', ()=> { 
                    $('#modal-cargar-door2door').modal('hide');          
                    setTimeout(() => {          
                        /*<CARGAR SHOW>*/
                            $('#id-main').addClass('opacidad');
                            $('#body-main-div').show();
                            $('#body-main-div').addClass('body-main');
                        /*</CARGAR SHOW>*/   
                        setTimeout(() => {                 
                            const functionEliminarResult = functionArchivo().
                            then(() => {  
                                setTimeout(() => {
                                    $('#modal-registrar-door2door').modal('show');  
                                }, 500);                            
                            });
                        }, 500);
                    }, 1000);
                });
            /*<Evento Guardar Archiv>*/

            /*<Evento cancelacion-Si>*/  
                $('#cancelacion-No').on('click', ()=> {  
                    let tipo = $('#tipo-cancelacion').val();
                    if(tipo =="inicio"){
                        $('#modal-cancelar-door2door').modal('hide'); 
                    }else{
                        $('#modal-cancelar-door2door').modal('hide'); 
                        setTimeout(() => {
                            $('#modal-registrar-door2door').modal('show');  
                        }, 500);
                    }
                });
            /*</Evento cancelacion-Si>*/ 

            /*<Evento Eliminar Archivo # 1>*/

                $('#button-eliminar-primera-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    $('#modal-eliminar-door2door').modal('show');  
                    $('#archivo-eliminado').val("primera-evidencia");
                }); 
                
                $('#button-eliminar-segunda-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    $('#modal-eliminar-door2door').modal('show');  
                    $('#archivo-eliminado').val("segunda-evidencia");
                }); 

                $('#button-eliminar-tercera-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    $('#modal-eliminar-door2door').modal('show');  
                    $('#archivo-eliminado').val("tercera-evidencia");
                }); 

                $('#button-eliminar-cuarta-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    $('#modal-eliminar-door2door').modal('show');  
                    $('#archivo-eliminado').val("cuarta-evidencia");
                }); 

                $('#button-eliminar-quinta-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    $('#modal-eliminar-door2door').modal('show');  
                    $('#archivo-eliminado').val("quinta-evidencia");
                }); 
            /*<Evento Eliminar Archivo # 1>*/

            /*<Evento Cargar  Archivo # 1>*/
                $('#button-cargar-primera-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    $('#modal-cargar-door2door').modal('show');  
                    $('#tipo-evidencia').val("primera-evidencia");
                }); 
                
                $('#button-cargar-segunda-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    $('#modal-cargar-door2door').modal('show');  
                    $('#tipo-evidencia').val("segunda-evidencia");
                }); 

                $('#button-cargar-tercera-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    $('#modal-cargar-door2door').modal('show');  
                    $('#tipo-evidencia').val("tercera-evidencia");
                }); 

                $('#button-cargar-cuarta-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    $('#modal-cargar-door2door').modal('show');  
                    $('#tipo-evidencia').val("cuarta-evidencia");
                }); 

                $('#button-cargar-quinta-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    $('#modal-cargar-door2door').modal('show');  
                    $('#tipo-evidencia').val("quinta-evidencia");
                }); 
            /*<Evento Cargar  Archivo # 1>*/

            /*<Eventos de regreso>*/
                $('#elimininar-No').on('click', ()=> { 
                    /*<CARGAR SHOW>*/
                        $('#id-main').addClass('opacidad');
                        $('#body-main-div').show();
                        $('#body-main-div').addClass('body-main');
                    /*</CARGAR SHOW>*/   
                    setTimeout(() => {
                        $('#modal-registrar-door2door').modal('show');  
                    }, 500);                     
                });

                $('#evidencias-cerrar').on('click', ()=> { 
                   /*<CARGAR SHOW>*/
                        $('#id-main').addClass('opacidad');
                        $('#body-main-div').show();
                        $('#body-main-div').addClass('body-main');
                    /*</CARGAR SHOW>*/   
                    setTimeout(() => {
                        $('#modal-registrar-door2door').modal('show');  
                    }, 500);
                });
            /*<Eventos de regreso>*/

            
            

        /*</Main Module Roles>*/        
                    
    });
</script>