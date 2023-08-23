<script   src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDwQClTGJJEBxBdoDdpvZqj410LlfAb8FM&callback=initMap&'; async></script>

<script >
   
        
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

                /*<LOCALIZACION DEL USUARIO>
                    var marker = new google.maps.Marker({
                        position: centerll,
                        map:map,
                        title: "Usuario",
                        icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"                           
                        }
                    });*/ 

                   
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

                                    /*<POCISIONAMOS PUNTO>
                                        let marker1 = new google.maps.Marker({
                                            position: {lat: latitud, lng: logitud},
                                            map:map,
                                            title: "tipoDeVisita",
                                                                    
                                            
                                        });*/
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
                                           // marker1.setMap(null);
                                            
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
                                                            travelMode: 'DRIVING'
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
                then( (result) => {   console.log("result>");  console.log(result);
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            if(result.information.length > 0){
                                /*<Consulta exitosa>*/  
                                    /*<INFORMACION>*/
                                    if( result.information[0].comentarioAgenda != '' && result.information[0].comentarioAgenda != null){
                                        
                                        $('#comentario-agenda-contacto').val(result.information[0].comentarioAgenda);
                                        $('#div-comentario-agenda-contacto').show();
                                    }else{
                                        $('#div-comentario-agenda-contacto').hide();
                                    }
                                    console.log(result.information[0].calle.replace(' ','+'));

                                    let URL = "https://www.google.com.mx/maps/place/"+
                                                        result.information[0].calle.replace('  ','+').replace(' ','+').replace(' ','')             +'+'+ 
                                                        result.information[0].noExterior.replace('  ','+').replace(' ','+').replace(' ','')        +'+'+ 
                                                        result.information[0].colonia.replace('  ','+').replace(' ','+').replace(' ','')           +'+'+ 
                                                        result.information[0].codigoPostal.replace('  ','+').replace(' ','+').replace(' ','')      +'+'+ 
                                                        result.information[0].calle.replace('  ','+').replace(' ','+').replace(' ','')             +'+'+
                                                        result.information[0].Estado.replace('  ','+').replace(' ','+').replace(' ','')            +'+'+
                                                        result.information[0].codigoPostal.replace('  ','+').replace(' ','+').replace(' ','')      +'+'+
                                                        result.information[0].Pais.replace('  ','+').replace(' ','+').replace(' ','') +
                                                        '/@'+result.information[0].latitud+','+result.information[0].longitud+',17z/data=?entry=ttu'  ;

                                        $('#boton-comparti-direccion').on('click', ()=> {
                                            var win = window.open(URL, '_blank');
                                        });
                                             
                                        $('#show-latitud-door2door').val(result.information[0].latitud);         
                                        $('#show-logitud-door2door').val(result.information[0].longitud);  
                                        $('#show-idContacto-door2door').val(result.information[0].idContacto);  
                                        $('#show-idVisita-door2door').val(result.information[0].idVisita);   
                                        
                                        let Domicilio = result.information[0].calle         +' '+
                                                        result.information[0].noExterior    +' '+
                                                        result.information[0].noInterior    +' '+                                                        result.information[0].colonia    +' '+
                                                        result.information[0].Municipio     +' '+
                                                        result.information[0].Estado        +' '+
                                                        result.information[0].codigoPostal  +' '+
                                                        result.information[0].Pais;

                                                        //alert(result.information[0].instrucciones)
                                        $('#nombre-contacto-registro').val(result.information[0].nombre);  
                                        $('#instrucciones-contacto').val(result.information[0].instrucciones);  
                                        $('#instrucciones-contacto-1').val(result.information[0].instrucciones);  
                                        
                                        $('#entreCalle-contacto').val(result.information[0].entreCalle);  
                                         
                                        $('#telefono-contacto').val(result.information[0].telefono);   
                                        $('#tipoCampana-contacto-registro').val(result.information[0].tipoCampana);  

                                        $('#domicilio-contacto').val(Domicilio);      
                                        $('#domicilio-contacto-hidden').val(Domicilio);       


                                        
                                        $('#create-comentarios-door2door').val(result.information[0].comentarios_Visitador); 
                                                                            
                                    /*</INFORMACION>*/

                                    /*<FOTOS>*/
                                        console.log(result.evidencias);
                                        if(result.evidencias.length > 0){                                      
                                            for(let i = 0; i < result.evidencias.length; i++ ){
                                                
                                                let ArchivoHtml         = '';
                                                let ArchivoIMPUT         = '';
                                                let Direccion           = result.evidencias[i].archivo;
                                                let ArregloExtencion    = Direccion.split('.');

                                                let tamano              = ArregloExtencion.length;
                                                tamano                  = tamano -1;

                                                if(
                                                        ArregloExtencion[tamano] == 'mp3' ||
                                                        ArregloExtencion[tamano] == 'ogg' ||
                                                        ArregloExtencion[tamano] == 'wav' 
                                                    ){
                                                        if(ArregloExtencion[tamano] == 'mp3'){
                                                            ArchivoHtml = `
                                                                <audio controls  src="${Direccion}" type="audio/mp3" controls  loop ></audio>
                                                            `;
                                                            ArchivoIMPUT =  ArchivoHtml;
                                                        }else if(ArregloExtencion[tamano] == 'ogg'){
                                                            ArchivoHtml = `
                                                                    <audio controls  src="${Direccion}" type="audio/ogg" controls  loop ></audio>
                                                            `;
                                                            ArchivoIMPUT =  ArchivoHtml;
                                                        }else if(ArregloExtencion[tamano] == 'wav'){
                                                            ArchivoHtml = `
                                                                    <audio controls  src="${Direccion}" type="audio/wav" controls  loop ></audio>
                                                            `;
                                                            ArchivoIMPUT =  ArchivoHtml;
                                                        }
                                                
                                                }else if(
                                                            ArregloExtencion[tamano] == 'png' ||
                                                            ArregloExtencion[tamano] == 'jpg' ||
                                                            ArregloExtencion[tamano] == 'jpeg' 
                                                        ){
                                                        ArchivoHtml = `<img src="${Direccion}"  style="width:200px;height:200px;" class=""> `;
                                                        ArchivoIMPUT =   `<img src="${Direccion}"   class="img-fluid" > `;
                                                }else if(
                                                        ArregloExtencion[tamano] == 'mp4'  ||
                                                        ArregloExtencion[tamano] == 'webm' ||
                                                        ArregloExtencion[tamano] == 'ogv' 
                                                        ){
                                                        ArchivoHtml = `
                                                                <video src="${Direccion}"  width=\"300\" height="\"300\" controls ></video>
                                                        `;
                                                        ArchivoIMPUT =  ArchivoHtml;
                                                }else{     
                                                    ArchivoHtml  = '<img src="/door2door/Modules/ModulesImage/imagen.jpg"  style="width:200px;height:200px;" class="">'
                                                    ArchivoIMPUT =  ArchivoHtml;
                                                }


                                                switch(result.evidencias[i].tipoArchivo){
                                                    case 'primera-evidencia':{  $('#media-primera-parte-door2door').html(ArchivoHtml); break; }
                                                    case 'segunda-evidencia':{  $('#media-segunda-parte-door2door').html(ArchivoHtml); break; }
                                                    case 'tercera-evidencia':{  $('#media-tercera-parte-door2door').html(ArchivoHtml); break; }
                                                    case 'cuarta-evidencia':{   $('#media-cuarta-parte-door2door').html(ArchivoHtml);  break; }
                                                    case 'quinta-evidencia':{   $('#media-quinta-parte-door2door').html(ArchivoHtml);  break; }
                                                    case 'sexta-evidencia':{    $('#media-sexta-parte-door2door').html(ArchivoHtml);   break; }
                                                }       
                                                result.evidencias[i].INPUT = ArchivoIMPUT;                                   
                                            }

                                        }
                                        localStorage.setItem('JSON_EVIDENCIAS_VISITAS', JSON.stringify(result.evidencias));
                                    /*</FOTOS>*/

                                    /*<COMETARIO>*/
                                        let Comentario = '';
                                        if(result.comentarios.length > 0){ 
                                            for(let i = 0; i < result.comentarios.length; i++ ){
                                               
                                                Comentario += `
                                                                    <div class="row" style="margin:1px;text-align:center;">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label for="exampleFormControlTextarea1">Comentario # ${i+1}</label>
                                                                                <textarea disabled  style="text-align:center;" class="form-control"  
                                                                                rows="2">${result.comentarios[i].comentarios_Visitador}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                `;
                                            }   
                                        }else{
                                            Comentario = `
                                                                <div class="row" style="margin:1px;text-align:center;">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleFormControlTextarea1">Comentario</label>
                                                                            <textarea disabled  style="text-align:center;" class="form-control"  rows="2">
                                                                                NO HAY COMENTARIOS
                                                                                </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                `;
                                        }
                                        $('#comentarios-de-visitas').html(Comentario);
                                    /*</COMETARIO>*/


                                /*<Consulta exitosa>*/      
                            }else{
                                //let href ="/d2dVisitador/Modules/ModuleClientSugerenicas/";
                                //window.location.href = href;
                            }                  
                        }else{
                           /*<Error de query>*/ 
                                $('#message-warning-door2door').html("");
                                $('#message-warning-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                $('#modal-message-warning-door2door').modal('show');
                            /*</Error de query>*/  
                        }       
                    }                           
                }).catch( (err) => {  console.log("error");  console.log(err);});
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
                $('#button-registrar-visita-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide');  
                    setTimeout(() => {
                        $('#modal-finalizar-visita-door2door').modal('show');  
                    }, 500);
                    
                });
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
                        let idVisitas = $('#show-idVisita-door2door').val();
                        let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();
                        const ResultF = $.ajax({
                            url: "/d2dVisitador/Modules/ModuleClientSeguimientos/api/door2door.controller.cacelacion.php",
                            type: 'post',
                            async:  false,
                            dataType: "json",
                            data: { 
                                    TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                                    idVisitas:idVisitas
                            }  
                        }).then( (ResultF) => {
                            if(ResultF.message == 'Good'){
                                /*<CARGAR HIDE>*/
                                    $('#id-main').removeClass('opacidad');
                                    $('#body-main-div').removeClass('body-main');
                                    $('#body-main-div').hide();
                                /*</CARGAR HIDE>*/
                                let href ="/d2dVisitador/Modules/ModuleClientSugerenicas/";
                                window.location.href = href;
                            }else{
                                /*<CARGAR>*/
                                    $('#id-main').removeClass('opacidad');
                                    $('#body-main-div').removeClass('body-main');
                                    $('#body-main-div').hide();
                                /*<CARGAR>*/
                                $('#message-warning-door2door').html("");
                                $('#message-warning-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                $('#modal-message-warning-door2door').modal('show');
                            }
                        })
                       
                });
            /*</Evento cancelacion-Si>*/ 

            /*<Evento cancelacion-Si>*/  
                $('#finalizar-Si').on('click', ()=> {    
                    /*<CARGAR SHOW>*/
                        $('#id-main').addClass('opacidad');
                        $('#body-main-div').show();
                        $('#body-main-div').addClass('body-main');
                    /*</CARGAR SHOW>*/      
                    let idVisitas    = $('#show-idVisita-door2door').val();
                    let idContacto  = $('#show-idContacto-door2door').val();
                    let comentarios = $('#create-comentarios-door2doo').val();
                    let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();
                    $.ajax({
                        url: "/d2dVisitador/Modules/ModuleClientSeguimientos/api/door2door.controller.finalizada.php",
                        type: 'post',
                        async:  false,
                        dataType: "json",
                        data: { 
                                TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                                idVisitas:idVisitas,
                                comentarios:comentarios,
                                idContacto:idContacto
                        }  
                    }).                   
                    then((ResultF) => {  
                        if(ResultF.message == 'Good'){                            
                            /*<CARGAR HIDE>*/
                                $('#id-main').removeClass('opacidad');
                                $('#body-main-div').removeClass('body-main');
                                $('#body-main-div').hide();
                            /*</CARGAR HIDE>*/
                            let href ="/d2dVisitador/Modules/ModuleClientSugerenicas/";
                            window.location.href = href;
                        }else{
                            /*<CARGAR HIDE>*/
                                $('#id-main').removeClass('opacidad');
                                $('#body-main-div').removeClass('body-main');
                                $('#body-main-div').hide();
                            /*</CARGAR HIDE>*/
                            $('#message-warning-door2door').html("");
                            $('#message-warning-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                            $('#modal-message-warning-door2door').modal('show');
                        }                       
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

            /*<Evento finalizar-Si>*/  
                $('#finalizar-No').on('click', ()=> {  
                    $('#modal-finalizar-visita-door2door').modal('hide');
                    setTimeout(() => {
                        $('#modal-registrar-door2door').modal('show');  
                    }, 500);
                });
            /*</Evento finalizar-Si>*/ 

            /*<Evento Eliminar Archivo # 1>*/

                $('#button-eliminar-primera-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    setTimeout(() => {
                        $('#modal-eliminar-door2door').modal('show');  
                        $('#archivo-eliminado').val("primera-evidencia");
                    }, 500);
                }); 
                
                $('#button-eliminar-segunda-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    setTimeout(() => {
                        $('#modal-eliminar-door2door').modal('show');  
                        $('#archivo-eliminado').val("segunda-evidencia");
                    }, 500);
                }); 

                $('#button-eliminar-tercera-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    setTimeout(() => {
                        $('#modal-eliminar-door2door').modal('show');  
                        $('#archivo-eliminado').val("tercera-evidencia");
                    }, 500);
                }); 

                $('#button-eliminar-cuarta-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    setTimeout(() => {
                        $('#modal-eliminar-door2door').modal('show');  
                        $('#archivo-eliminado').val("cuarta-evidencia");
                    }, 500);
                }); 

                $('#button-eliminar-quinta-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    setTimeout(() => {
                        $('#modal-eliminar-door2door').modal('show');  
                        $('#archivo-eliminado').val("quinta-evidencia");
                    }, 500);
                }); 

                $('#button-eliminar-sexta-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    setTimeout(() => {
                        $('#modal-eliminar-door2door').modal('show');  
                        $('#archivo-eliminado').val("sexta-evidencia");
                    }, 500);
                    
                }); 
            /*<Evento Eliminar Archivo # 1>*/

            /*<Evento Cargar  Archivo # 1>*/
                $('#button-cargar-primera-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    setTimeout(() => {
                        $('#modal-cargar-door2door').modal('show');  
                        $('#tipo-evidencia').val("primera-evidencia");
                    }, 500);                    
                }); 
                
                $('#button-cargar-segunda-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    setTimeout(() => {
                        $('#modal-cargar-door2door').modal('show');  
                        $('#tipo-evidencia').val("segunda-evidencia");
                    }, 500);   
                }); 

                $('#button-cargar-tercera-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    setTimeout(() => {
                        $('#modal-cargar-door2door').modal('show');  
                        $('#tipo-evidencia').val("tercera-evidencia");
                    }, 500);
                }); 

                $('#button-cargar-cuarta-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    setTimeout(() => {
                        $('#modal-cargar-door2door').modal('show');  
                        $('#tipo-evidencia').val("cuarta-evidencia");
                    }, 500);
                }); 

                $('#button-cargar-quinta-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    setTimeout(() => {
                        $('#modal-cargar-door2door').modal('show');  
                        $('#tipo-evidencia').val("quinta-evidencia");
                    }, 500);
                }); 

                $('#button-cargar-sexta-parte-door2door').on('click', ()=> { 
                    $('#modal-registrar-door2door').modal('hide'); 
                    setTimeout(() => {
                        $('#modal-cargar-door2door').modal('show');  
                        $('#tipo-evidencia').val("sexta-evidencia");
                    }, 500);                    
                });

                
            /*<Evento Cargar  Archivo # 1>*/

            /*<Eventos de regreso>*/
                $('#elimininar-No').on('click', ()=> { 
                    $('#modal-eliminar-door2door').modal('hide');  
                    setTimeout(() => {
                        $('#modal-registrar-door2door').modal('show');  
                    }, 500);                     
                });
                
                $('#evidencias-cerrar').on('click', ()=> { 
                    $('#modal-cargar-door2door').modal('hide');                            
                    setTimeout(() => {  
                        $('#modal-registrar-door2door').modal('show');  
                    }, 500);
                    
                });

                $('#regresar-evidencia-detalle-door2door').on('click', ()=> { 
                    $('#modal-evidencia-detalle-door2door').modal('hide');  
                    setTimeout(() => {                       
                        /*<CARGAR SHOW>*/
                            $('#id-main').addClass('opacidad');
                            $('#body-main-div').show();
                            $('#body-main-div').addClass('body-main');
                        /*</CARGAR SHOW>*/   
                        setTimeout(() => {
                            /*<CARGAR SHOW>*/
                                $('#id-main').removeClass('opacidad');
                                $('#body-main-div').hide();
                                $('#body-main-div').removeClass('body-main');
                            /*</CARGAR SHOW>*/   
                            $('#modal-registrar-door2door').modal('show');  
                        }, 500);
                    }, 500);
                });

               
                

                
            /*<Eventos de regreso>*/

            /*<boton-Agendar-door2door>*/
                $('#boton-Agendar-door2door').on('click', () => {
                    $('#modal-registrar-door2door').modal('hide');
                    setTimeout(() => {
                        $('#modal-agendar-door2door').modal('show');
                    }, 700);
                   
                });
            /*</boton-Agendar-door2door>*/

            /*<boton-Agendar-door2door>*/
                $('#agendar-No').on('click', () => {
                    $('#modal-agendar-door2door').modal('hide');
                    setTimeout(() => {
                        $('#modal-registrar-door2door').modal('show');
                    }, 700);
                });
            /*</boton-Agendar-door2door>*/


            /*<boton-Agendar-door2door>*/
                $('#agendar-Si').on('click', () => {
                    /*<CARGAR SHOW>*/
                        $('#id-main').addClass('opacidad');
                        $('#body-main-div').show();
                        $('#body-main-div').addClass('body-main');
                    /*</CARGAR SHOW>*/      

                    let idVisitas   = $('#show-idVisita-door2door').val();
                    let idContacto  = $('#show-idContacto-door2door').val();
                    let comentarios = $('#Comentario-agendar').val();
                    let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();

                    console.log("idVisitas" + idVisitas + "idContacto" + idContacto + "comentarios"+comentarios);

                    if(comentarios != '' && idVisitas > 0 && idContacto > 0){                    
                        $.ajax({
                            url: "/d2dVisitador/Modules/ModuleClientSeguimientos/api/door2door.controller.agendar.php",
                            type: 'post',
                            async:  false,
                            dataType: "json",
                            data: { 
                                    TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                                    idVisitas:idVisitas,
                                    comentarios:comentarios,
                                    idContacto:idContacto
                            }  
                        }).                   
                        then((ResultF) => {  console.log(ResultF);
                            if(ResultF.message == 'Good'){                            
                                /*<CARGAR HIDE>*/
                                    $('#id-main').removeClass('opacidad');
                                    $('#body-main-div').removeClass('body-main');
                                    $('#body-main-div').hide();
                                /*</CARGAR HIDE>*/
                                let href ="/d2dVisitador/Modules/ModuleClientSugerenicas/";
                                window.location.href = href;
                            }else{
                                /*<CARGAR HIDE>*/
                                    $('#id-main').removeClass('opacidad');
                                    $('#body-main-div').removeClass('body-main');
                                    $('#body-main-div').hide();
                                /*</CARGAR HIDE>*/
                                $('#message-warning-door2door').html("");
                                $('#message-warning-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                $('#modal-message-warning-door2door').modal('show');
                            }                       
                        }); 
                    }else{
                        $('#message-warning-door2door').html("");
                        $('#message-warning-door2door').html('¡FAVOR DE LLENAR LOS COMENTARIOS DE LA REAGENDA!');
                        $('#modal-message-warning-door2door').modal('show');

                    }
                });
            /*</boton-Agendar-door2door>*/



            

            
            

        /*</Main Module Roles>*/        
                    
    });
</script>