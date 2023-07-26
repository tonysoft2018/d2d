<script   src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDwQClTGJJEBxBdoDdpvZqj410LlfAb8FM&callback=initMap&'; async></script>

<script >
        //localStorage.setItem('JSON_LOCALIZACION', JSON.stringify({lat: 1, lng: 1}));
        
    /*<CREACION DEL MAPA DE GEOLOCALIZACION>*/
        /*<VARIABLES>*/
            let map;         
            //let centerll    = {lat: Arreglo.lat, lng: Arreglo.lng};
            let centerll    = {lat: 20.652684681069186, lng: -103.45285311189987};
        /*</VARIABLES>*/
        //20.652684681069186
        //-103.45285311189987
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

            
                
                /*<EVENTOS>*/
                    /*<MOSTRAR MAPA>*/                        
                        $('#inicio-campanas-door2door').on('change', () => 
                        {
                            console.log("cambio")
                            $('.evento-mostra-mapa-sugerencias').on('click', () => 
                            {
                                
                                setTimeout(() => 
                                {                                    
                                    /*<VARIABLES>*/
                                        let latitudContacto           = parseFloat($('#selected-latitud-contacto-door2door').val());
                                        let logitudContacto           = parseFloat($('#selected-logitud-contacto-door2door').val());  

                                        let latitudVisitantes         = parseFloat($('#selected-latitud-visitante-door2door').val());
                                        let logitudVisitantes         = parseFloat($('#selected-logitud-visitante-door2door').val());                                       
                                    /*</VARIABLES>*/ 
                                    
                                    console.log(latitudContacto);
                                    console.log(logitudContacto);
                                    console.log(latitudVisitantes);
                                    console.log(logitudVisitantes);
                                    /*<POCISIONAMOS VISITANTE>*/
                                        if(latitudVisitantes != 0 && logitudVisitantes != 0){
                                           
                                            let marker1 = new google.maps.Marker({
                                                position:  {lat: latitudVisitantes, lng: logitudVisitantes},
                                                map:map,
                                                title: "Visita"
                                                //icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"                           
                                                
                                            });     
                                        }else{
                                            marker1.setMap(null);
                                        }                               
                                    /*<POCISIONAMOS VISITANTE>*/

                                    const directionsService  = new google.maps.DirectionsService();
                                    const directionsRenderer = new google.maps.DirectionsRenderer();
                                    
                                    
                                    directionsRenderer.setMap(map);
                             
                                    /*<LIMPIEZA>*/
                                        marker1.setMap(null);   

                                        marker1 = new google.maps.Marker({
                                            position: {lat: latitudContacto, lng: logitudContacto},
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
                        });
                    /*</MOSTRAR MAPA>*/
                /*</EVENTOS>*/
            }
        /*</MAP>*/  
    /*</CREACION DEL MAPA DE GEOLOCALIZACION>*/
       
</script>

<script type="module">
    /*<import librarys>*/ 
    
        import DataTableV   from '../ModulePugins/Pluginjs/DataTable.var.main.js';

        import functionShow             from './js/function/Function.Show.main.js';
        import functionCreate           from './js/function/Function.Create.main.js';  
        import functionDelete           from './js/function/Function.Delete.main.js';
        import functionSelected         from './js/API/API.Selected.main.js';
        
        import functionSelectFullAPI    from './js/API/API.SelectFull.main.js';
        import functionCampanas         from './js/API/API.SelectFull.main.campana.js';

    /*<import librarys>*/ 
    

    $(document).ready(() =>{  


        setTimeout(() => {
            if (window.localStorage) {
                if (window.localStorage.getItem('JSON_LOCALIZACION') !== undefined && window.localStorage.getItem('JSON_LOCALIZACION') ) {
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
        
        /*<Main Module Roles>*/               
            /*<Consultar toda la iformacion>*/                 
                const functionSFA = functionCampanas().
                then( (result) => {     console.log(result);
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/
                                let Arrays = [];
                                Arrays = result.information;    
                                let campo = '';
                                 campo += '<option value="0" > -- SELECCIONAR -- </option>';  
                                for(let i = 0; i<Arrays.length; i++){
                                    campo += `<option value="${Arrays[i].idCampana}" > ${Arrays[i].nombre} / Estatus: ${Arrays[i].estatus}</option>`;
                                }
                                $('#inicio-campanas-door2door').html(campo);
                              
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

            /*<>*/
                $('#seleccionar-continuar').on('click', () => {

                    let idContacto = $('#selected-id-door2door').val();       
                    
                    let latitud    = $('#selected-latitud-door2door').val();
                    let longitud   = $('#selected-logitud-door2door').val();

                    
                    const Result = functionSelected(idContacto).
                    then((result) => { console.log(result);
                        if(result){
                            if(result.message == "Good"){
                                window.location.href = "/d2dVisitador/Modules/ModuleClientSeguimientos"
                            }else{
                                $('#message-error-door2door').html("");
                                $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                $('#modal-message-error-door2door').modal('show');
                            } 
                        }
                    }) 

                    
                            
                });
            /*<>*/
                $('#inicio-campanas-door2door').on( 'change', () =>{
                     /*<Consultar toda la iformacion>*/  
                        let idCampana                   =  $('#inicio-campanas-door2door').val();     
                        let TockenOfdoor2doordoor2door  = $('#tocken-door2doors-01198756765345431234534').val();    
                        $.ajax({
                            url: "/d2dSocio/Modules/ModuleClientSeguimientos/api/door2door.controller.select.full.php",
                            type: 'post',
                            async: false,
                            dataType: "json",
                            data: { 
                                TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                                idCampana:idCampana
                            }        
                        }).          
                        then( (result) => {    console.log("--");   console.log(result);
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/
                                    const Result = functionShow(result.information);                                    
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
                })
            
            
            
        /*</Main Module Roles>*/                                 
    });
</script>