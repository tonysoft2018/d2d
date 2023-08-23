<script   src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDwQClTGJJEBxBdoDdpvZqj410LlfAb8FM&callback=initMap&'; async></script>

<script >
    
    
    /*<CREACION DEL MAPA DE GEOLOCALIZACION>*/
        /*<VARIABLES>*/
            let map;           
           // let centerll    = {lat: 20.6766867, lng: -103.3786421};
        /*</VARIABLES>*/

        /*<MAP>*/                    
            function   initMap(){
               
                
                /*<EVENTOS>*/
                    /*<MOSTRAR MAPA>*/
                    $('.evento-mostra-contactos').on('click', () => { 
                       
                            setTimeout(() => {       

                                $('.evento-mostra-mapa-campana').on('click', () =>  {                                   
                                    setTimeout(() => {                                            

                                        /*<VARIABLES>*/
                                            let latitud         = parseFloat($('#show-latitud-door2door').val());
                                            let logitud         = parseFloat($('#show-logitud-door2door').val());        
                                            let centerll        = {lat: latitud, lng: logitud};                               
                                        /*</VARIABLES>*/   
                                        console.log({lat: latitud, lng: logitud}) ;    
                                        /*<INSTANCIACION>*/
                                            map = new google.maps.Map(document.getElementById('map'), {
                                                center: centerll,
                                                zoom: 18,
                                                streetViewControl: false,               
                                                mapTypeControl: false,
                                                fullscreenControl: false,                        
                                                    
                                            });    
                                        /*<INSTANCIACION>*/    

                                        /*<POCISIONAMOS PUNTO>*/
                                            let marker1 = new google.maps.Marker({
                                                position: centerll,
                                                map:map,
                                                title: "Visita"
                                                //icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"                           
                                                
                                            });                            
                                        /*<POCISIONAMOS PUNTO>*/         
                                    
                                        $('.evento-regresar-mapa-sugerencias').on('click', () => {
                                            marker1.setMap(null);
                                        })
                                    }, 800);
                                    
                                });

                               

                              

                            }, 4000);
                    });
                    $('#button-contacto-delete-door2door').on('click', () => {  console.log("Eliminar")
                       
                        setTimeout(() => {
                            $('.evento-mostra-mapa-campana-eliminar').on('click', () =>  {                                   
                                setTimeout(() => {                                            

                                    /*<VARIABLES>*/
                                        let latitud         = parseFloat($('#show-latitud-door2door').val());
                                        let logitud         = parseFloat($('#show-logitud-door2door').val());        
                                        let centerll        = {lat: latitud, lng: logitud};                               
                                    /*</VARIABLES>*/   
                                    console.log({lat: latitud, lng: logitud}) ;    
                                    /*<INSTANCIACION>*/
                                        map = new google.maps.Map(document.getElementById('map'), {
                                            center: centerll,
                                            zoom: 18,
                                            streetViewControl: false,               
                                            mapTypeControl: false,
                                            fullscreenControl: false,                        
                                                
                                        });    
                                    /*<INSTANCIACION>*/    

                                    /*<POCISIONAMOS PUNTO>*/
                                        let marker1 = new google.maps.Marker({
                                            position: centerll,
                                            map:map,
                                            title: "Visita"
                                            //icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"                           
                                            
                                        });                            
                                    /*<POCISIONAMOS PUNTO>*/         
                                
                                    $('.evento-regresar-mapa-sugerencias').on('click', () => {
                                        marker1.setMap(null);
                                    })
                                }, 800);
                                
                            });
                        }, 4000);
                   });

                    $('#button-actualizar-contactos-door2door_').on('click', () => {  console.log("Actualizar")
                       
                        setTimeout(() => {  
                            $('.evento-mostra-mapa-campana-editar').on('click', () =>  {                                   
                                setTimeout(() => {                                            

                                    /*<VARIABLES>*/
                                        let latitud         = parseFloat($('#show-latitud-door2door').val());
                                        let logitud         = parseFloat($('#show-logitud-door2door').val());        
                                        let centerll        = {lat: latitud, lng: logitud};                               
                                    /*</VARIABLES>*/   
                                    console.log({lat: latitud, lng: logitud}) ;    
                                    /*<INSTANCIACION>*/
                                        map = new google.maps.Map(document.getElementById('map'), {
                                            center: centerll,
                                            zoom: 18,
                                            streetViewControl: false,               
                                            mapTypeControl: false,
                                            fullscreenControl: false,                        
                                                
                                        });    
                                    /*<INSTANCIACION>*/    

                                    /*<POCISIONAMOS PUNTO>*/
                                        let marker1 = new google.maps.Marker({
                                            position: centerll,
                                            map:map,
                                            title: "Visita"
                                            //icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"                           
                                            
                                        });                            
                                    /*<POCISIONAMOS PUNTO>*/         
                                
                                    $('.evento-regresar-mapa-sugerencias').on('click', () => {
                                        marker1.setMap(null);
                                    })
                                }, 800);                                    
                            });
                        }, 4000);
                    });
                    /*</MOSTRAR MAPA>*/
                /*</EVENTOS>*/
            }
        /*</MAP>*/  
    /*</CREACION DEL MAPA DE GEOLOCALIZACION>*/
       
</script>


<script type="module">
    /*<import librarys>*/ 
    
        import DataTableV                       from '../ModulePugins/Pluginjs/DataTable.var.main.js';
        import functionShow                     from './js/function/Function.Show.main.js';        
        import functionUpdate                   from './js/function/Function.Update.main.js';
        import functionCreate                   from './js/function/Function.Create.main.js';
        import functionCerrar                   from './js/function/Function.Cerrar.main.js';
        import functionCreateContactos          from './js/function/Function.Create.Contactos.main.js';
        import functionUpdateContactos          from './js/function/Function.Update.Contactos.main.js';
        import DeleteAPI                        from './js/API/API.Delete.Contactos.main.js';

        
        import functionAbrir                    from './js/function/Function.Abrir.main.js';
        import functionPausar                   from './js/function/Function.Pausar.main.js';
        import functionReanudar                 from './js/function/Function.Reanudar.main.js';
        import CreateMasivaAPI                  from './js/function/Function.Create.Contactos.Maiva.main.js';
        import functionCancelacion              from './js/function/Function.Cancelacion.main.js';
        

        import functionSelectFullAPI            from './js/API/API.SelectFull.main.js';
        import UpdateContactosAPI               from './js/API/API.Update.Contactos.main.js';

        import functionSelectFullContactos      from './js/API/API.SelectFull.Contactos.main.js';
        import functionShowContactos            from './js/function/Function.Show.Contactos.main.js';   

        
        import functionSelectFullPaisesAPI      from '../../../door2door/Modules/ModuleCatalogsPaises/js/API/API.SelectFull.main.js';
        import functionSelectFullEstadosAPI     from '../../../door2door/Modules/ModuleCatalogsEstados/js/API/API.SelectFull.main.js';
        import functionSelectFullMunicipiosAPI  from '../../../door2door/Modules/ModuleCatalogsMunicipioD/js/API/API.SelectFull.main.js';
        import functionSelectFullSocio          from '../../../door2door/Modules/ModulePerfilesSocio/js/API/API.SelectFull.main.js';


        

    /*<import librarys>*/ 
    
    
        let Folio = 0;

        $(document).ready(() =>{  
        
            setTimeout(() => {
                /*<CARGAR HIDE>*/
                    $('#id-main').removeClass('opacidad');
                    $('#body-main-div').removeClass('body-main');
                    $('#body-main-div').hide();
                /*</CARGAR HIDE>*/
            }, 1500);
            
            /*<Main Module Roles>*/        
             /*<Consultar toda la Usuarios>*/            
                const functionSFA1 = functionSelectFullSocio().
                    then( (result) => {   console.log('#################>>>');  console.log(result);
                        if(result){                                                                    
                            if(result.message == 'Good'){
                                /*<Consulta exitosa>*/
                                    let ArraysUsuarios = [];
                                    ArraysUsuarios = result.information;   
                                    let Campos
                                    for(let i = 0; i <ArraysUsuarios.length; i++) {
                                        if(ArraysUsuarios[i].tipoPerfil == "SOCIO CLIENTE"){
                                            Campos += '<option value="'+ArraysUsuarios[i].idUsuario +'">'+ArraysUsuarios[i].nombres+' '+ArraysUsuarios[i].apellidos+'</option>';
                                        }
                                    }
                                    $('#create-usuario-door2door').html(Campos);
                                
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
                        /*<Error de query>*/  console.log(err)
                            $('#message-error-door2door').html("");
                            $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                            $('#modal-message-error-door2door').modal('show');
                        /*</Error de query>*/  
                    });                
                /*<Consultar toda la iformacion>*/    

                /*<Consultar toda la iformacion>*/            
                    const functionSFA = functionSelectFullAPI().
                    then( (result) => {     console.log(result)
                        if(result){                                                                    
                            if(result.message == 'Good'){
                                /*<Consulta exitosa>*/
                                    let ArraysRoles = [];
                                    ArraysRoles = result.information;   
                                    if(ArraysRoles.length > 0){
                                        Folio = parseInt(ArraysRoles[0].folio);     
                                    }else{
                                        Folio = 0;
                                    }
                                    
                                                                        
                                    const functionS =  functionShow(ArraysRoles);  
                                
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
                        /*<Error de query>*/  console.log(err)
                            $('#message-error-door2door').html("");
                            $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                            $('#modal-message-error-door2door').modal('show');
                        /*</Error de query>*/  
                    });                
                /*<Consultar toda la iformacion>*/ 

                /*<Consultar toda la iformacion Paises Estados Municipios>*/ 
                    /*<PAISES>*/
                        const functionPaises = functionSelectFullPaisesAPI().
                        then( (result) => {  console.log(result)   
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/
                                        /*<#######>*/
                                            localStorage.setItem('JSON_CAMPANA_PAISES', JSON.stringify(result.information)); 
                                        /*</#######>*/

                                        let ArraysPaises    = [];
                                        ArraysPaises        = result.information;  
                                        let campos          =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;

                                        for(let i = 0; i<ArraysPaises.length; i++)
                                        {
                                            campos +=   `<option value="${ArraysPaises[i].idPais}"   > ${ArraysPaises[i].nombre} </option> `;                                        
                                        }     

                                        $('#create-contactos-pais-door2door').html(campos);    
                                    
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
                    /*</PAISES>*/

                    /*<ESTADOS>*/
                        const functionEstados = functionSelectFullEstadosAPI().
                        then( (result) => {  console.log(result)   
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/
                                        localStorage.setItem('JSON_CAMPANA_ESTADOS', JSON.stringify(result.information));   
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
                    /*</ESTADOS>*/

                    /*<MUNICIPIOS>*/
                        const Municipio = functionSelectFullMunicipiosAPI().
                        then( (result) => {      console.log("Municipios => ");      console.log(result)
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/
                                        localStorage.setItem('JSON_CAMPANA_MUNICIPIOS', JSON.stringify(result.information));         
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
                    /*</MUNICIPIOS>*/

                /*<Consultar toda la iformacion Paises Estados Municipio>*/ 


                /*<create-contactos-estados-door2door>*/              
                    $('#create-contactos-pais-door2door').on('change', () =>{ 
                        let idPais = $('#create-contactos-pais-door2door').val();
                        const functionSFA3 = functionSelectFullEstadosAPI().
                        then( (result) => {   console.log("Estados => ");        console.log(result)
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/
                                        let ArraysEstados = [];
                                        ArraysEstados = result.information;         
                                    
                                        let campos  =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;
                                        for(let i = 0; i<ArraysEstados.length; i++){
                                            if(idPais == ArraysEstados[i].idPais){
                                                campos +=   `<option value="${ArraysEstados[i].idEstado}"   > ${ArraysEstados[i].nombre} </option> `;      
                                            }                                                                         
                                        }            
                                        $('#create-contactos-estado-door2door').html(campos);     
                                        $('#create-contactos-municipio-door2door').html('<option value="0"  selected > -- SELEECCIONAR -- </option> ');     

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
                    }); 
                /*</create-contactos-pais-door2door>*/
                    

                /*<create-contactos-municipio-door2door>*/
                    $('#create-contactos-estado-door2door').on('change', () =>{ 
                        let idEstado = $('#create-contactos-estado-door2door').val();
                        const functionSFA4 = functionSelectFullMunicipiosAPI().
                        then( (result) => {      console.log("Municipios => ");      console.log(result)
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/
                                        let ArraysMunicipios    = [];
                                        ArraysMunicipios        = result.information;    
                                        let campos              =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;
                                        for(let i = 0; i<ArraysMunicipios.length; i++)
                                        {
                                            if(idEstado == ArraysMunicipios[i].idEstado)
                                            {
                                                campos +=   `<option value="${ArraysMunicipios[i].idMunicipio}"   > ${ArraysMunicipios[i].nombre} </option> `;    
                                            }                                                                            
                                        }              
                                        $('#create-contactos-municipio-door2door').html(campos);     
                                    
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
                    
                    });                  
                /*</create-contactos-municipio-door2door>*/

                /*<actualizar-contactos-estados-door2door>*/              
                    $('#actualizar-contactos-pais-door2door').on('change', () =>{ 
                        let idPais = $('#actualizar-contactos-pais-door2door').val();
                        const functionSFA3 = functionSelectFullEstadosAPI().
                        then( (result) => {   console.log("Estados => ");        console.log(result)
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/
                                        let ArraysEstados = [];
                                        ArraysEstados = result.information;         
                                    
                                        let campos  =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;
                                        for(let i = 0; i<ArraysEstados.length; i++){
                                            if(idPais == ArraysEstados[i].idPais){
                                                campos +=   `<option value="${ArraysEstados[i].idEstado}"   > ${ArraysEstados[i].nombre} </option> `;      
                                            }                                                                         
                                        }            
                                        $('#actualizar-contactos-estado-door2door').html(campos);     
                                        $('#actualizar-contactos-municipio-door2door').html('<option value="0"  selected > -- SELEECCIONAR -- </option> ');     

                                    
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
                    }); 
                /*</actualizar-contactos-pais-door2door>*/
                    

                /*<actualizar-contactos-municipio-door2door>*/
                    $('#actualizar-contactos-estado-door2door').on('change', () =>{ 
                        let idEstado = $('#actualizar-contactos-estado-door2door').val();
                        const functionSFA4 = functionSelectFullMunicipiosAPI().
                        then( (result) => {      console.log("Municipios => ");      console.log(result)
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/
                                        let ArraysMunicipios    = [];
                                        ArraysMunicipios        = result.information;    
                                        let campos              =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;
                                        for(let i = 0; i<ArraysMunicipios.length; i++)
                                        {
                                            if(idEstado == ArraysMunicipios[i].idEstado)
                                            {
                                                campos +=   `<option value="${ArraysMunicipios[i].idMunicipio}"   > ${ArraysMunicipios[i].nombre} </option> `;    
                                            }                                                                            
                                        }              
                                        $('#actualizar-contactos-municipio-door2door').html(campos);     

                                    
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
                    
                    });                  
                /*</actualizar-contactos-municipio-door2door>*/
                

                /*<function Create>*/
                    $('#button-create-door2door').on( 'click', () => { 
                        $('#create-folio-door2door').val(Folio+1);
                        let fecha   = new Date(); //Fecha actual
                        let mes     = fecha.getMonth()+1; //obteniendo mes
                        let dia     = fecha.getDate(); //obteniendo dia
                        let ano     = fecha.getFullYear(); //obteniendo año
                        if(dia<10)
                            dia     ='0'+   dia; 
                        if( mes<10)
                            mes     ='0'+   mes; 
                        let FECHA      = ano+"-"+mes+"-"+dia;
                        $('#create-fecha-door2door').val(FECHA);
                    });
                /*<function Create>*/

                /*<button-Rechazada>*/
                    $('#button-grabar').on('click', () => {
                        let idCampana   = $('#update-id-door2door').val();
                        $('#grabar-id-door2door').val(idCampana);
                        $('#modal-grabar-door2door').modal('show');
                    });
                /*</button-Rechazada>*/

                /*<button-Rechazada>*/
                    $('#button-abrir').on('click', () => {
                        let idCampana   = $('#update-id-door2door').val();
                        $('#abrir-id-door2door').val(idCampana);
                        $('#modal-abrir-door2door').modal('show');
                    });
                /*</button-Rechazada>*/

                /*<Evento Detalle>*/                
                    $('#detalle-contactos-mostrar-door2door').on( 'click', () => {    $('#modal-contactos-detalles-door2door').modal('show'); });
                /*</Evento Detalle>*/  
                $('#regresar-contactos-visita-detalle-door2door').on( 'click', () => {   
                    $('#modal-contactos-visita-detalle-door2door').modal('hide');
                   
                    setTimeout( () => {
                        $('#modal-update-door2door').modal('show');
                        setTimeout( () => {
                            $('#modal-contactos-door2door').modal('show');
                            setTimeout( () => {
                                $('#modal-contactos-actualizar-door2door').modal('show');
                                setTimeout( () => {
                                    $('#modal-contactos-detalles-door2door').modal('show');
                                    setTimeout( () => {
                                        $('#modal-contactos-visita-door2door').modal('show');
                                    },300);
                                },300);
                            },300);
                        },300); 
                    },300);
                });
                
                
                /*<function Create>*/
                    $('#button-new-creat-door2door').on( 'click', () => {   
                        /*<CARGAR SHOW>*/
                            $('#id-main').addClass('opacidad');
                            $('#body-main-div').addClass('body-main');
                            $('#body-main-div').show();
                        /*</CARGAR SHOW>*/
                        setTimeout(() => {
                            const FunCreate = functionCreate(); 
                        }, 1000);
                        
                    });
                /*<function Create>*/

                /*<Evento eliminacion>*/  
                    $('#button-cerrar-door2door').on('click', ()=> { const Funresult = functionCerrar();  });
                /*</Evento eliminacion>*/ 

                /*<function update>*/
                    $('#button-update-door2door').on( 'click', () => {    const FunDelete = functionUpdate(); });
                /*<function update>*/

                /*<function abrir>*/
                $('#button-pausar-door2door').on( 'click', () => {  const Funresult = functionPausar();  });
                /*<function abrir>*/
                
                /*<function abrir>*/
                    $('#button-reanudar-door2door').on( 'click', () => {  const Funresult = functionReanudar();  });
                /*<function abrir>*/

                /*<function abrir>*/
                    $('#button-grabar-door2door').on( 'click', () => {  const Funresult = functionGrabar();  });
                /*<function abrir>*/

                /*<function abrir>*/
                    $('#button-recalcular-contactos-door2door').on( 'click', () => {  $('#modal-recalculo-door2door').modal('show');  });
                /*<function abrir>*/

                /*<function abrir>*/
                    $('#button-abrir-door2door').on( 'click', () => {  
                        /*<CARGAR SHOW>*/
                            $('#id-main').addClass('opacidad');
                            $('#body-main-div').addClass('body-main');
                            $('#body-main-div').show();
                        /*</CARGAR SHOW>*/
                        const Funresult = functionAbrir();  
                    });
                /*<function abrir>*/

                /*<function cargar>*/
                    $('#button-abrir-door2door').on( 'click', () => {  
                        /*<CARGAR SHOW>*/
                            $('#id-main').addClass('opacidad');
                            $('#body-main-div').addClass('body-main');
                            $('#body-main-div').show();
                        /*</CARGAR SHOW>*/
                     
                        const Funresult = functionAbrir();  
                        $('#modal-abrir-door2door').modal('hide');
                       });
                /*<function cargar>*/

                /*<function abrir>*/
                    $('#button-cancelacion-door2door').on( 'click', () => {  const Funresult = functionCancelacion();  });
                /*<function abrir>*/

                /*<function abrir>*/
                    $('#button-actualizar-contactos-door2door_').on( 'click', () => {  
                        /*<CARGAR HIDE>*/
                          $('#id-main').addClass('opacidad');
                            $('#body-main-div').addClass('body-main');
                            $('#body-main-div').show();
                        /*</CARGAR HIDE>*/

                        /*<Captura>*/
                            let nombre                  =   $('#actualizar-contactos-nombre-door2door').val().replace(/['"`]/, '');
                            let calle                   =   $('#actualizar-contactos-calle-door2door').val().replace(/['"`]/, '');
                            let telefono                =   $('#actualizar-contactos-telefono-door2door').val().replace(/['"`]/, '');
                            let noexterior              =   $('#actualizar-contactos-noexterior-door2door').val().replace(/['"`]/, '');
                            let nointerior              =   $('#actualizar-contactos-nointerior-door2door').val().replace(/['"`]/, '');
                            let codigopostal            =   $('#actualizar-contactos-codigopostal-door2door').val().replace(/['"`]/, '');
                            let colonia                 =   $('#actualizar-contactos-colonia-door2door').val().replace(/['"`]/, '');
                            let instrucciones           =   $('#actualizar-contactos-instrucciones-door2door').val().replace(/['"`]/, '');
                            let email                   =   $('#actualizar-contactos-email-door2door').val().replace(/['"`]/, '');
                            let idCampana               =   $('#update-id-door2door').val()


                            let idPais                  =   $('#actualizar-contactos-pais-door2door').val()
                            let idEstados               =   $('#actualizar-contactos-estado-door2door').val()
                            let idMunicipio             =   $('#actualizar-contactos-municipio-door2door').val()

                            /*<Eliminamos caracteres extraños>*/
                                $('#actualizar-contactos-nombre-door2door').val(nombre);
                                $('#actualizar-contactos-calle-door2door').val(calle);
                                $('#actualizar-contactos-telefono-door2door').val(telefono);
                                $('#actualizar-contactos-noexterior-door2door').val(noexterior);
                                $('#actualizar-contactos-nointerior-door2door').val(nointerior);
                                $('#actualizar-contactos-codigopostal-door2door').val(codigopostal);
                                $('#actualizar-contactos-colonia-door2door').val(colonia);
                                $('#actualizar-contactos-email-door2door').val(email);
                                $('#actualizar-contactos-instrucciones-door2door').val(instrucciones);
                            /*<Eliminamos caracteres extraños>*/

                        /*</Captura>*/
                        
                        if(
                            nombre          != ''   &&            
                            calle           != ''   &&  
                            colonia         != ''   &&  
                            noexterior      != ''   &&  
                            codigopostal    != ''   &&  
                        
                            telefono        != ''   &&  
                                    
                            idCampana       > 0     && 
                            idPais          > 0     && 
                            idEstados       > 0     && 
                            idMunicipio     > 0      

                        ){
                            /*<Var>*/
                                let Accoun = 0;
                                let ResultName= '';
                            /*</Var>*/

                            
                            
                            /*<Validar>*/
                                    let PlataformaForm = new FormData(document.getElementById("form-actualizar-contactos-door2door")); 

                                    let estado =  $('#actualizar-contactos-estado-door2door').val();
                                    PlataformaForm.append("actualizar-contactos-estado-door2door",estado);  

                                    let pais =  $('#actualizar-contactos-pais-door2door').val();
                                    PlataformaForm.append("actualizar-contactos-pais-door2door",pais);  
                                    

                                    let municipio =  $('#actualizar-contactos-municipio-door2door').val();
                                    PlataformaForm.append("actualizar-contactos-municipio-door2door",municipio);  
                                    

                                    let colonia =  $('#actualizar-contactos-colonia-door2door').val();
                                    PlataformaForm.append("actualizar-contactos-colonia-door2door",colonia);   
                                    console.log("###>>");
                                    const ResultactualizarAPI= UpdateContactosAPI( PlataformaForm ).
                                    then((result) =>  
                                    {   console.log(result);
                                        if(result.message == 'Good'){ 

                                        

                                            /*<Respuesta>*/
                                                $('#message-succes-door2door').html("");
                                                $('#message-succes-door2door').html('CREACIÓN EXITOSA');
                                                $('#modal-message-succes-door2door').modal('show'); 
                                                
                                                $('#modal-contactos-actualizar-door2door').modal('hide');                               
                                            /*</Respuesta>*/   

                                                $('#actualizar-contactos-nombre-door2door').removeClass('is-invalid');
                                                $('#actualizar-contactos-calle-door2door').removeClass('is-invalid'); 
                                                $('#actualizar-contactos-colonia-door2door').removeClass('is-invalid');
                                                $('#actualizar-contactos-noexterior-door2door').removeClass('is-invalid');
                                                $('#actualizar-contactos-codigopostal-door2door').removeClass('is-invalid');
                                                $('#actualizar-contactos-telefono-door2door').removeClass('is-invalid'); 
                                                $('#actualizar-contactos-pais-door2door').removeClass('is-invalid');
                                                $('#actualizar-contactos-estado-door2door').removeClass('is-invalid');
                                                $('#actualizar-contactos-municipio-door2door').removeClass('is-invalid');
                                            
                                            /*<Consultar toda la iformacion>*/ 
                                            
                                                let idCampana       = $('#update-id-door2door').val();
                                            
                                                const functionSFA   = functionSelectFullContactos(idCampana).
                                                then( (result) => {       console.log(result)
                                                    if(result){                                                                    
                                                        if(result.message == 'Good'){
                                                            /*<Consulta exitosa>*/
                                                                let Information     = [];
                                                                Information         = result.information;                                 
                                                                /*<Destruimos el un datatable>*/  
                                                                let estatus = $('#update-estatus-door2door').val();
                                                                /*<Destruimos el un datatable>*/  

                                                                /*<Construccion del la tabla>*/ 

                                                                    let record = '';
                                                                    let TableBody= ''; 

                                                                    if(estatus == 'BORRADOR'){
                                                                        $('#table-contactos-door2door').show();
                                                                        $('#table-contactos-visitas-door2door').hide();

                                                                        $('#button-actualizar-contactos-door2door').show();
                                                                        $('#detalle-contactos-mostrar-door2door').hide();

                                                                        $('#button-cargar-contactos-door2door').show();
                                                                        $('#button-plantilla-contactos-door2door').show();


                                                                        $('#table-contactos-door2door').dataTable().fnDestroy();   
                                                                        $('#table-contactos-door2door-informacion').html('');

                                                                        $('#table-contactos-visitas-door2door').dataTable().fnDestroy();   
                                                                        $('#table-contactos-visitas-door2door-informacion').html('');
                                                            
                                                                        if(Information.length > 0){ 
                                                                            for(let i = 0; i <Information.length; i++) {

                                                                            

                                                                                record =  `
                                                                                        <tr>
                                                                                            
                                                                                            <td style="width:250px;vertical-align:middle;" class="text-justify">${Information[i].nombre}</td>   
                                                                                            <td style="width:350px;vertical-align:middle;" class="text-justify">${Information[i].telefono}</td>    
                                                                                            <td style="width:350px;vertical-align:middle;" class="text-justify">
                                                                                                ${Information[i].calle},   ${Information[i].noExterior}, ${Information[i].colonia}
                                                                                            </td> 
                                                                                            <td style="width:220px;vertical-align:middle;">
                                                                                                <center>
                                                                                                    <div class="row">                                            
                                                                                                    
                                                                                                        <div class="col-sm-4">
                                                                                                            <img  class="cursor" 
                                                                                                                title="Contacto" 
                                                                                                                onclick="ButtonEditarContactos( 
                                                                                                                    ${Information[i].idContacto},
                                                                                                                    '${Information[i].nombre}',
                                                                                                                    '${Information[i].calle}',
                                                                                                                    '${Information[i].noInterior}',
                                                                                                                    '${Information[i].noExterior}',
                                                                                                                    '${Information[i].codigoPostal}',
                                                                                                                    '${Information[i].colonia}',
                                                                                                                    '${Information[i].idMunicipio}',
                                                                                                                    '${Information[i].idEstado}',
                                                                                                                    '${Information[i].idPais}',
                                                                                                                    '${Information[i].entreCalle}',
                                                                                                                    '${Information[i].latitud}',
                                                                                                                    '${Information[i].longitud}',
                                                                                                                    '${Information[i].instrucciones}',
                                                                                                                    '${Information[i].telefono}',
                                                                                                                    '${Information[i].email}'
                                                                                                                );" 
                                                                                                                src="/d2dSocioWeb/Modules/ModulesImage/editar.png" 
                                                                                                                style="width:30px;height:30px" > 
                                                                                                        </div>
                                                                                                        <div class="col-sm-4">
                                                                                                            <img  class="cursor evento-mostra-mapa-campana-editar" 
                                                                                                                title="Mapa" 
                                                                                                                onclick="ButtonMostrarMapa( 
                                                                                                                    '${Information[i].latitud}',
                                                                                                                    '${Information[i].longitud}',
                                                                                                                    '${Information[i].calle}',  
                                                                                                                    '${Information[i].noExterior}', 
                                                                                                                    '${Information[i].colonia}', 
                                                                                                                    '${Information[i].codigoPostal}', 
                                                                                                                    '${Information[i].idMunicipio}',   
                                                                                                                    '${Information[i].idEstado}', 
                                                                                                                    '${Information[i].idPais}'
                                                                                                                );" 
                                                                                                                src="/door2door/Modules/ModulesImage/mapa.png" 
                                                                                                                style="width:30px;height:30px" > 
                                                                                                        </div>
                                                                                                        <div class="col-sm-4">
                                                                                                            <img  class="cursor" 
                                                                                                                title="Eliminar" 
                                                                                                                onclick="ButtonEliminarContactos( ${Information[i].idContacto}  );" 
                                                                                                                src="/d2dSocioWeb/Modules/ModulesImage/basura.png" 
                                                                                                                style="width:30px;height:30px" > 
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    
                                                                                                </center>                     
                                                                                            </td>
                                                                                        </tr> `;  
                                                                                TableBody +=  record;
                                                                            }             
                                                                            $('#table-contactos-door2door-informacion').html(TableBody)   
                                                                        }     
                                                                        
                                                                        setTimeout(() => {
                                                                            $('#table-contactos-door2door').DataTable(DataTableV);   
                                                                            setTimeout(() => {
                                                                                /*<CARGAR HIDE>*/
                                                                                    $('#id-main').removeClass('opacidad');
                                                                                    $('#body-main-div').removeClass('body-main');
                                                                                    $('#body-main-div').hide();
                                                                                /*</CARGAR HIDE>*/
                                                                            }, 300);
                                                                        }, 4000);
                                                                    }else{

                                                                        $('#table-contactos-door2door').hide();
                                                                        $('#table-contactos-visitas-door2door').show();


                                                                        //$('#button-actualizar-contactos-door2door').hide();
                                                                        $('#button-actualizar-contactos-door2door').show();
                                                                        $('#detalle-contactos-mostrar-door2door').show();

                                                                        $('#button-cargar-contactos-door2door').hide();
                                                                        $('#button-plantilla-contactos-door2door').hide();

                                                                        $('#table-contactos-visitas-door2door').dataTable().fnDestroy();   
                                                                        $('#table-contactos-visitas-door2door-informacion').html('');

                                                                        
                                                                        if(Information.length > 0){ 
                                                                            for(let i = 0; i <Information.length; i++) {
                                                                                record =  `
                                                                                        <tr>
                                                                                            
                                                                                            <td style="width:250px;vertical-align:middle;" class="text-justify">${Information[i].nombre}</td>   
                                                                                            <td style="width:150px;vertical-align:middle;" class="text-justify">${Information[i].telefono}</td>    
                                                                                            <td style="width:350px;vertical-align:middle;" class="text-justify">
                                                                                                ${Information[i].calle},   ${Information[i].noExterior}, ${Information[i].colonia}
                                                                                            </td> 
                                                                                            <td style="width:150px;vertical-align:middle;" class="text-justify">${Information[i].estatus}</td>
                                                                                            <td style="width:200px;vertical-align:middle;">
                                                                                                <center>
                                                                                                    <div class="row">                                            
                                                                                                    
                                                                                                        <div class="col-sm-4 ">
                                                                                                            <img  class="cursor visitas-del-contacto "  
                                                                                                                title="Editar" 
                                                                                                                onclick="ButtonEditarContactos( 
                                                                                                                    ${Information[i].idContacto},
                                                                                                                    '${Information[i].nombre}',
                                                                                                                    '${Information[i].calle}',
                                                                                                                    '${Information[i].noInterior}',
                                                                                                                    '${Information[i].noExterior}',
                                                                                                                    '${Information[i].codigoPostal}',
                                                                                                                    '${Information[i].colonia}',
                                                                                                                    '${Information[i].idMunicipio}',
                                                                                                                    '${Information[i].idEstado}',
                                                                                                                    '${Information[i].idPais}',
                                                                                                                    '${Information[i].entreCalle}',
                                                                                                                    '${Information[i].latitud}',
                                                                                                                    '${Information[i].longitud}',
                                                                                                                    '${Information[i].instrucciones}',
                                                                                                                    '${Information[i].telefono}',
                                                                                                                    '${Information[i].email}'
                                                                                                                );" 
                                                                                                                src="/d2dSocioWeb/Modules/ModulesImage/editar.png" 
                                                                                                                style="width:30px;height:30px" > 
                                                                                                        </div>
                                                                                                
                                                                                                        <div class="col-sm-4">
                                                                                                            <img  class="cursor evento-mostra-mapa-campana-editar" 
                                                                                                                title="Eliminar" 
                                                                                                                onclick="ButtonMostrarMapa( 
                                                                                                                    '${Information[i].latitud}',
                                                                                                                    '${Information[i].longitud}',
                                                                                                                    '${Information[i].calle}',  
                                                                                                                    '${Information[i].noExterior}', 
                                                                                                                    '${Information[i].colonia}', 
                                                                                                                    '${Information[i].codigoPostal}', 
                                                                                                                    '${Information[i].idMunicipio}',   
                                                                                                                    '${Information[i].idEstado}', 
                                                                                                                    '${Information[i].idPais}',
                                                                                                                    '${Information[i].observacionDireccion}'   
                                                                                                                    
                                                                                                                );" 
                                                                                                                src="/door2door/Modules/ModulesImage/mapa.png" 
                                                                                                                style="width:30px;height:30px" > 
                                                                                                        </div>
                                                                                                        <div class="col-sm-4">
                                                                                                            <img  class="cursor" 
                                                                                                                title="Eliminar" 
                                                                                                                onclick="ButtonEliminarContactos( ${Information[i].idContacto}  );" 
                                                                                                                src="/d2dSocioWeb/Modules/ModulesImage/basura.png" 
                                                                                                                style="width:30px;height:30px" > 
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    
                                                                                                </center>                     
                                                                                            </td>
                                                                                        </tr> `;  
                                                                                TableBody +=  record;
                                                                            }        
                                                                            $('#table-contactos-visitas-door2door-informacion').html(TableBody)   
                                                                        }  
                                                                        setTimeout(() => {
                                                                            $('#table-contactos-visitas-door2door').DataTable(DataTableV);   
                                                                            setTimeout(() => {
                                                                                    $('#actualizar-contactos-nombre-door2door').val('');
                                                                                    $('#actualizar-contactos-calle-door2door').val('');
                                                                                    $('#actualizar-contactos-colonia-door2door').val('');
                                                                                    $('#actualizar-contactos-noexterior-door2door').val('');
                                                                                    $('#actualizar-contactos-nointerior-door2door').val('');
                                                                                    $('#actualizar-contactos-codigopostal-door2door').val('');
                                                                                    $('#actualizar-contactos-entreCalle-door2door').val('');
                                                                                    
                                                                                    $('#actualizar-contactos-instrucciones-door2door').val('');
                                                                                    $('#actualizar-contactos-telefono-door2door').val('');
                                                                                    $('#actualizar-contactos-email-door2door').val('');
                                                                                /*<CARGAR HIDE>*/
                                                                                    $('#id-main').removeClass('opacidad');
                                                                                    $('#body-main-div').removeClass('body-main');
                                                                                    $('#body-main-div').hide();
                                                                                /*</CARGAR HIDE>*/
                                                                            }, 300);
                                                                        }, 4000);         
                                                                    }
                                                                /*</Construccion del la tabla>*/

                                                               
                                                            /*<Consulta exitosa>*/                        
                                                        }else{
                                                            /*<warning de query>*/ 
                                                                $('#message-warning-door2door').html("");
                                                                $('#message-warning-door2door').html('¡warning AL RECARGAR LA PAGUINA!');
                                                                $('#modal-message-warning-door2door').modal('show');
                                                            /*</warning de query>*/   
                                                        }       
                                                    }                           
                                                }).catch( (err) => {                                         
                                                    /*<warning desconocido>*/
                                                        $('#message-warning-door2door').html("");
                                                        $('#message-warning-door2door').html('¡warning AL RECARGAR LA PAGUINA!');
                                                        $('#modal-message-warning-door2door').modal('show');
                                                    /*<warning desconocido>*/
                                                });
                                            /*<Consultar toda la iformacion>*/                                                            
                                        }else{ 
                                            /*<Respuesta>*/
                                                $('#message-warning-door2door').html('');
                                                $('#message-warning-door2door').html('¡INTÉNTELO MÁS TARDE! warning AL CREAR.');
                                                $('#modal-message-warning-door2door').modal('show');
                                            /*</Respuesta>*/
                                            /*<CARGAR HIDE>*/
                                                $('#id-main').removeClass('opacidad');
                                                $('#body-main-div').removeClass('body-main');
                                                $('#body-main-div').hide();
                                            /*</CARGAR HIDE>*/
                                        }                           
                                    }).catch( (err) => { 
                                        /*<Respuesta>*/
                                            $('#message-warning-door2door').html('');
                                            $('#message-warning-door2door').html('¡INTÉNTELO MÁS TARDE! warning AL CREAR.');
                                            $('#modal-message-warning-door2door').modal('show');
                                        /*</Respuesta>*/
                                        /*<CARGAR HIDE>*/
                                            $('#id-main').removeClass('opacidad');
                                            $('#body-main-div').removeClass('body-main');
                                            $('#body-main-div').hide();
                                        /*</CARGAR HIDE>*/
                                    });
                                
                            /*</Validar>*/
                        }else{

                            /*<CARGAR HIDE>*/
                                $('#id-main').removeClass('opacidad');
                                $('#body-main-div').removeClass('body-main');
                                $('#body-main-div').hide();
                            /*</CARGAR HIDE>*/
                            
                            if( nombre          == '' ){$('#actualizar-contactos-nombre-door2door').addClass('is-invalid');         }
                            if( calle           == '' ){$('#actualizar-contactos-calle-door2door').addClass('is-invalid');          }
                            if( colonia         == '' ){$('#actualizar-contactos-colonia-door2door').addClass('is-invalid');        }
                            if( noexterior      == '' ){$('#actualizar-contactos-noexterior-door2door').addClass('is-invalid');     }
                            if( codigopostal    == '' ){$('#actualizar-contactos-codigopostal-door2door').addClass('is-invalid');   }
                            if( telefono        == '' ){$('#actualizar-contactos-telefono-door2door').addClass('is-invalid');       }

                            if( idPais          > 0    || 
                                idPais          != '' ){$('#actualizar-contactos-pais-door2door').addClass('is-invalid');           }

                            if( idEstados       > 0    || 
                                idEstados       != '' ){$('#actualizar-contactos-estado-door2door').addClass('is-invalid');         }

                            if( idMunicipio     > 0    ||
                                idMunicipio     != '' ){$('#actualizar-contactos-municipio-door2door').addClass('is-invalid');      }


                            
                            /*<Respuesta >*/
                                $('#message-warning-door2door').html('');
                                $('#message-warning-door2door').html('FAVOR DE INTRODUCIR LOS CAMPOS OBLIGATORIOS');
                                $('#modal-message-warning-door2door').modal('show')
                            /*</Respuesta>*/
                            
                        } 
                                    
                    });
                /*<function abrir>*/

                

            /*<Regresar crear contactos>*/
                    $('#regresar-contactos-crear-door2door').on('click', ()=>{
                        $('#create-contactos-nombre-door2door').removeClass('is-invalid');
                        $('#create-contactos-calle-door2door').removeClass('is-invalid'); 
                        $('#create-contactos-colonia-door2door').removeClass('is-invalid');
                        $('#create-contactos-noexterior-door2door').removeClass('is-invalid');
                        $('#create-contactos-codigopostal-door2door').removeClass('is-invalid');
                        $('#create-contactos-telefono-door2door').removeClass('is-invalid'); 
                        $('#create-contactos-pais-door2door').removeClass('is-invalid');
                        $('#create-contactos-estado-door2door').removeClass('is-invalid');
                        $('#create-contactos-municipio-door2door').removeClass('is-invalid');
                    })
                /*</Regresar crear contactos>*/

                /*<function mostrar contactos 1>*/
                    $('.button-contactos').on( 'click', () => {  
                        /*<CARGAR HIDE>*/
                            $('#id-main').addClass('opacidad');
                            $('#body-main-div').addClass('body-main');
                            $('#body-main-div').show();
                        /*</CARGAR HIDE>*/
                        setTimeout(() => {
                            let idCampana =  $('#update-id-door2door').val();                            
                            const functionSFA2 = functionSelectFullContactos(idCampana).
                            then( (result) => {  console.log(result)   
                                if(result){                                                                    
                                    if(result.message == 'Good'){
                                        /*<Consulta exitosa>*/
                                            let Information = [];
                                            Information = result.information;   
                                            /*<###############>*/
                                                /*<Destruimos el un datatable>*/  
                                                    let estatus = $('#update-estatus-door2door').val();
                                                /*<Destruimos el un datatable>*/  

                                                /*<Construccion del la tabla>*/ 

                                                    let record = '';
                                                    let TableBody= ''; 

                                                    if(estatus == 'BORRADOR'){
                                                        $('#table-contactos-door2door').show();
                                                        $('#table-contactos-visitas-door2door').hide();

                                                        $('#button-actualizar-contactos-door2door').show();
                                                        $('#detalle-contactos-mostrar-door2door').hide();

                                                        $('#button-cargar-contactos-door2door').show();
                                                        $('#button-plantilla-contactos-door2door').show();


                                                        $('#table-contactos-door2door').dataTable().fnDestroy();   
                                                        $('#table-contactos-door2door-informacion').html('');

                                                        $('#table-contactos-visitas-door2door').dataTable().fnDestroy();   
                                                        $('#table-contactos-visitas-door2door-informacion').html('');
                                            
                                                        if(Information.length > 0){ 
                                                            for(let i = 0; i <Information.length; i++) {

                                                            

                                                                record =  `
                                                                        <tr>
                                                                            
                                                                            <td style="width:250px;vertical-align:middle;" class="text-justify">${Information[i].nombre}</td>   
                                                                            <td style="width:350px;vertical-align:middle;" class="text-justify">${Information[i].telefono}</td>    
                                                                            <td style="width:350px;vertical-align:middle;" class="text-justify">
                                                                                ${Information[i].calle},   ${Information[i].noExterior}, ${Information[i].colonia}
                                                                            </td> 
                                                                            <td style="width:220px;vertical-align:middle;">
                                                                                <center>
                                                                                    <div class="row">                                            
                                                                                    
                                                                                        <div class="col-sm-4">
                                                                                            <img  class="cursor evento-mostra-mapa-campana" 
                                                                                                title="Mapa" 
                                                                                                onclick="ButtonEditarContactos( 
                                                                                                    ${Information[i].idContacto},
                                                                                                    '${Information[i].nombre}',
                                                                                                    '${Information[i].calle}',
                                                                                                    '${Information[i].noInterior}',
                                                                                                    '${Information[i].noExterior}',
                                                                                                    '${Information[i].codigoPostal}',
                                                                                                    '${Information[i].colonia}',
                                                                                                    '${Information[i].idMunicipio}',
                                                                                                    '${Information[i].idEstado}',
                                                                                                    '${Information[i].idPais}',
                                                                                                    '${Information[i].entreCalle}',
                                                                                                    '${Information[i].latitud}',
                                                                                                    '${Information[i].longitud}',
                                                                                                    '${Information[i].instrucciones}',
                                                                                                    '${Information[i].telefono}',
                                                                                                    '${Information[i].email}'
                                                                                                );" 
                                                                                                src="/d2dSocioWeb/Modules/ModulesImage/editar.png" 
                                                                                                style="width:30px;height:30px" > 
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <img  class="cursor evento-mostra-mapa-campana" 
                                                                                                title="Mapa" 
                                                                                                onclick="ButtonMostrarMapa( 
                                                                                                    '${Information[i].latitud}',
                                                                                                    '${Information[i].longitud}',
                                                                                                    '${Information[i].calle}',  
                                                                                                    '${Information[i].noExterior}', 
                                                                                                    '${Information[i].colonia}', 
                                                                                                    '${Information[i].codigoPostal}', 
                                                                                                    '${Information[i].idMunicipio}',   
                                                                                                    '${Information[i].idEstado}', 
                                                                                                    '${Information[i].idPais}'
                                                                                                );" 
                                                                                                src="/door2door/Modules/ModulesImage/mapa.png" 
                                                                                                style="width:30px;height:30px" > 
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <img  class="cursor" 
                                                                                                title="Eliminar" 
                                                                                                onclick="ButtonEliminarContactos( ${Information[i].idContacto}  );" 
                                                                                                src="/d2dSocioWeb/Modules/ModulesImage/basura.png" 
                                                                                                style="width:30px;height:30px" > 
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </center>                     
                                                                            </td>
                                                                        </tr> `;  
                                                                TableBody +=  record;
                                                            }             
                                                            $('#table-contactos-door2door-informacion').html(TableBody)   
                                                        }     
                                                       
                                                        setTimeout(() => {
                                                            $('#table-contactos-door2door').DataTable(DataTableV);   
                                                            setTimeout(() => {
                                                                /*<CARGAR HIDE>*/
                                                                    $('#id-main').removeClass('opacidad');
                                                                    $('#body-main-div').removeClass('body-main');
                                                                    $('#body-main-div').hide();
                                                                /*</CARGAR HIDE>*/
                                                            }, 300);
                                                        }, 4000);
                                                    }else{

                                                        $('#table-contactos-door2door').hide();
                                                        $('#table-contactos-visitas-door2door').show();


                                                        //$('#button-actualizar-contactos-door2door').hide();
                                                        $('#button-actualizar-contactos-door2door').show();
                                                        $('#detalle-contactos-mostrar-door2door').show();

                                                        $('#button-cargar-contactos-door2door').hide();
                                                        $('#button-plantilla-contactos-door2door').hide();

                                                        $('#table-contactos-visitas-door2door').dataTable().fnDestroy();   
                                                        $('#table-contactos-visitas-door2door-informacion').html('');

                                                        
                                                        if(Information.length > 0){ 
                                                            for(let i = 0; i <Information.length; i++) {
                                                                record =  `
                                                                        <tr>
                                                                            
                                                                            <td style="width:250px;vertical-align:middle;" class="text-justify">${Information[i].nombre}</td>   
                                                                            <td style="width:150px;vertical-align:middle;" class="text-justify">${Information[i].telefono}</td>    
                                                                            <td style="width:350px;vertical-align:middle;" class="text-justify">
                                                                                ${Information[i].calle},   ${Information[i].noExterior}, ${Information[i].colonia}
                                                                            </td> 
                                                                            <td style="width:150px;vertical-align:middle;" class="text-justify">${Information[i].estatus}</td>
                                                                            <td style="width:200px;vertical-align:middle;">
                                                                                <center>
                                                                                    <div class="row">                                            
                                                                                    
                                                                                        <div class="col-sm-4 ">
                                                                                            <img  class="cursor visitas-del-contacto evento-mostra-mapa-campana "  
                                                                                                title="Editar" 
                                                                                                onclick="ButtonEditarContactos( 
                                                                                                    ${Information[i].idContacto},
                                                                                                    '${Information[i].nombre}',
                                                                                                    '${Information[i].calle}',
                                                                                                    '${Information[i].noInterior}',
                                                                                                    '${Information[i].noExterior}',
                                                                                                    '${Information[i].codigoPostal}',
                                                                                                    '${Information[i].colonia}',
                                                                                                    '${Information[i].idMunicipio}',
                                                                                                    '${Information[i].idEstado}',
                                                                                                    '${Information[i].idPais}',
                                                                                                    '${Information[i].entreCalle}',
                                                                                                    '${Information[i].latitud}',
                                                                                                    '${Information[i].longitud}',
                                                                                                    '${Information[i].instrucciones}',
                                                                                                    '${Information[i].telefono}',
                                                                                                    '${Information[i].email}'
                                                                                                );" 
                                                                                                src="/d2dSocioWeb/Modules/ModulesImage/editar.png" 
                                                                                                style="width:30px;height:30px" > 
                                                                                        </div>
                                                                                
                                                                                        <div class="col-sm-4">
                                                                                            <img  class="cursor evento-mostra-mapa-campana" 
                                                                                                title="Eliminar" 
                                                                                                onclick="ButtonMostrarMapa( 
                                                                                                    '${Information[i].latitud}',
                                                                                                    '${Information[i].longitud}',
                                                                                                    '${Information[i].calle}',  
                                                                                                    '${Information[i].noExterior}', 
                                                                                                    '${Information[i].colonia}', 
                                                                                                    '${Information[i].codigoPostal}', 
                                                                                                    '${Information[i].idMunicipio}',   
                                                                                                    '${Information[i].idEstado}', 
                                                                                                    '${Information[i].idPais}',
                                                                                                    '${Information[i].observacionDireccion}'   
                                                                                                    
                                                                                                );" 
                                                                                                src="/door2door/Modules/ModulesImage/mapa.png" 
                                                                                                style="width:30px;height:30px" > 
                                                                                        </div>
                                                                                        <div class="col-sm-4">
                                                                                            <img  class="cursor" 
                                                                                                title="Eliminar" 
                                                                                                onclick="ButtonEliminarContactos( ${Information[i].idContacto}  );" 
                                                                                                src="/d2dSocioWeb/Modules/ModulesImage/basura.png" 
                                                                                                style="width:30px;height:30px" > 
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </center>                     
                                                                            </td>
                                                                        </tr> `;  
                                                                TableBody +=  record;
                                                            }        
                                                            $('#table-contactos-visitas-door2door-informacion').html(TableBody)   
                                                        }  

                                                    setTimeout(() => {
                                                        $('#table-contactos-visitas-door2door').DataTable(DataTableV);   
                                                        setTimeout(() => {
                                                            /*<CARGAR HIDE>*/
                                                                $('#id-main').removeClass('opacidad');
                                                                $('#body-main-div').removeClass('body-main');
                                                                $('#body-main-div').hide();
                                                            /*</CARGAR HIDE>*/
                                                        }, 300);
                                                    }, 4000);
                                                   
                                                    }
                                                /*</Construccion del la tabla>*/
                                            /*<###############>*/
                                            $('#modal-contactos-door2door').modal('show'); 
                                        
                                        
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
                        
                        }, 500);  
                        
                    });
                /*<function mostrar contactos 2>*/

            
            
                
                

                /*<function cargar>*/
                    $('#evento-regresar-mapa-sugerencias').on( 'click', () => {  
                        setTimeout(() => {
                            $('#modal-mapa-door2door').modal('hide');                                
                            setTimeout(() => {                               
                                $('#modal-update-door2door').modal('show');
                                setTimeout(() => {
                                    $('#modal-contactos-door2door').modal('show');
                                }, 400);
                            }, 400);
                        }, 400);
                    });
                /*<function cargar>*/

                /*<function cargar>*/
                    $('#button-nuevo-contactos-door2door').on( 'click', () => {    $('#modal-contactos-crear-door2door').modal('show'); });
                /*<function cargar>*/

                /*<function cargar>*/
                    $('#button-cargar-contactos-door2door').on( 'click', () => {    $('#modal-cargar-contactos-door2door').modal('show'); });
                /*<function cargar>*/

                /*<function plantilla>*/
                    $('#button-plantilla-contactos-door2door').on( 'click', () => {    $('#modal-plantilla-door2door').modal('show'); });
                /*<function plantilla>*/

                /*<function create>*/
                    $('#button-create-contactos-door2door').on( 'click', () => { const FunCreateContactos = functionCreateContactos();   });
                /*<function create>*/
        

               

                /*<function create>
                    $('#button-abrir-si-door2door').on( 'click', () => {    });*/
                /*<function create>*/

                /*<function grabar-si>
                    $('#button-grabar-si-door2door').on( 'click', () => {    });*/
                /*<function grabar-si>*/

                /*<function grabar-si>*/
                    $('#button-cargar-contactos-subir-contactos-door2door').on( 'click', () => { 
                         /*<CARGAR SHOW>*/
                            $('#id-main').addClass('opacidad');
                            $('#body-main-div').addClass('body-main');
                            $('#body-main-div').show();
                        /*</CARGAR SHOW>*/
                        setTimeout(() => {
                            const CreateMasivaAPIRes = CreateMasivaAPI(); 
                        }, 1000);
                        
                    });
                /*<function grabar-si>*/

                /*<function Eliminar-si>*/
                    $('#button-contacto-delete-door2door').on( 'click', () => { 
                         /*<CARGAR SHOW>*/
                            $('#id-main').addClass('opacidad');
                            $('#body-main-div').show();
                            $('#body-main-div').addClass('body-main');
                        /*</CARGAR SHOW>*/
                        let id = $('#delete-contacto-id-door2door').val();
                        if(id > 0){
                            /*<Delete>*/
                                let informationForm = new FormData(document.getElementById("form-contacto-delete-door2door")); 
                                const Result =  DeleteAPI(informationForm).
                                then((result)=> {  console.log(result);
                                    if(result.message == 'Good'){
                                        
                                        /*<Respuesta>*/
                                            $('#message-succes-door2door').html("");
                                            $('#message-succes-door2door').html('PROCESO EXITOSO');
                                            $('#modal-message-succes-door2door').modal('show'); 
                                            $('#modal-delete-contacto-door2door').modal('hide'); 
                                        /*</Respuesta>*/     
                                        /*<Consultar toda la iformacion>*/ 
                                            let idCampana = $('#update-id-door2door').val();
                                            const functionSFA = functionSelectFullContactos(idCampana).
                                            then( (result) => {       console.log(result);
                                                if(result){                                                                    
                                                    if(result.message == 'Good'){
                                                        let Information = [];
                                                        Information = result.information;   
                                                        /*<###############>*/
                                                            /*<Destruimos el un datatable>*/  
                                                                let estatus = $('#update-estatus-door2door').val();
                                                            /*<Destruimos el un datatable>*/  

                                                            /*<Construccion del la tabla>*/ 

                                                                let record = '';
                                                                let TableBody= ''; 

                                                                if(estatus == 'BORRADOR'){
                                                                    $('#table-contactos-door2door').show();
                                                                    $('#table-contactos-visitas-door2door').hide();

                                                                    $('#button-actualizar-contactos-door2door').show();
                                                                    $('#detalle-contactos-mostrar-door2door').hide();

                                                                    $('#button-cargar-contactos-door2door').show();
                                                                    $('#button-plantilla-contactos-door2door').show();


                                                                    $('#table-contactos-door2door').dataTable().fnDestroy();   
                                                                    $('#table-contactos-door2door-informacion').html('');

                                                                    $('#table-contactos-visitas-door2door').dataTable().fnDestroy();   
                                                                    $('#table-contactos-visitas-door2door-informacion').html('');
                                                        
                                                                    if(Information.length > 0){ 
                                                                        for(let i = 0; i <Information.length; i++) {

                                                                        

                                                                            record =  `
                                                                                    <tr>
                                                                                        
                                                                                        <td style="width:250px;vertical-align:middle;" class="text-justify">${Information[i].nombre}</td>   
                                                                                        <td style="width:350px;vertical-align:middle;" class="text-justify">${Information[i].telefono}</td>    
                                                                                        <td style="width:350px;vertical-align:middle;" class="text-justify">
                                                                                            ${Information[i].calle},   ${Information[i].noExterior}, ${Information[i].colonia}
                                                                                        </td> 
                                                                                        <td style="width:220px;vertical-align:middle;">
                                                                                            <center>
                                                                                                <div class="row">                                            
                                                                                                
                                                                                                    <div class="col-sm-4">
                                                                                                        <img  class="cursor" 
                                                                                                            title="Mapa" 
                                                                                                            onclick="ButtonEditarContactos( 
                                                                                                                ${Information[i].idContacto},
                                                                                                                '${Information[i].nombre}',
                                                                                                                '${Information[i].calle}',
                                                                                                                '${Information[i].noInterior}',
                                                                                                                '${Information[i].noExterior}',
                                                                                                                '${Information[i].codigoPostal}',
                                                                                                                '${Information[i].colonia}',
                                                                                                                '${Information[i].idMunicipio}',
                                                                                                                '${Information[i].idEstado}',
                                                                                                                '${Information[i].idPais}',
                                                                                                                '${Information[i].entreCalle}',
                                                                                                                '${Information[i].latitud}',
                                                                                                                '${Information[i].longitud}',
                                                                                                                '${Information[i].instrucciones}',
                                                                                                                '${Information[i].telefono}',
                                                                                                                '${Information[i].email}'
                                                                                                            );" 
                                                                                                            src="/d2dSocioWeb/Modules/ModulesImage/editar.png" 
                                                                                                            style="width:30px;height:30px" > 
                                                                                                    </div>
                                                                                                    <div class="col-sm-4">
                                                                                                        <img  class="cursor evento-mostra-mapa-campana-eliminar" 
                                                                                                            title="Mapa" 
                                                                                                            onclick="ButtonMostrarMapa( 
                                                                                                                '${Information[i].latitud}',
                                                                                                                '${Information[i].longitud}',
                                                                                                                '${Information[i].calle}',  
                                                                                                                '${Information[i].noExterior}', 
                                                                                                                '${Information[i].colonia}', 
                                                                                                                '${Information[i].codigoPostal}', 
                                                                                                                '${Information[i].idMunicipio}',   
                                                                                                                '${Information[i].idEstado}', 
                                                                                                                '${Information[i].idPais}'
                                                                                                            );" 
                                                                                                            src="/door2door/Modules/ModulesImage/mapa.png" 
                                                                                                            style="width:30px;height:30px" > 
                                                                                                    </div>
                                                                                                    <div class="col-sm-4">
                                                                                                        <img  class="cursor" 
                                                                                                            title="Eliminar" 
                                                                                                            onclick="ButtonEliminarContactos( ${Information[i].idContacto}  );" 
                                                                                                            src="/d2dSocioWeb/Modules/ModulesImage/basura.png" 
                                                                                                            style="width:30px;height:30px" > 
                                                                                                    </div>
                                                                                                </div>
                                                                                                
                                                                                            </center>                     
                                                                                        </td>
                                                                                    </tr> `;  
                                                                            TableBody +=  record;
                                                                        }             
                                                                        $('#table-contactos-door2door-informacion').html(TableBody)   
                                                                    }     
                                                                
                                                                    setTimeout(() => {
                                                                        $('#table-contactos-door2door').DataTable(DataTableV);   
                                                                        setTimeout(() => {
                                                                            /*<CARGAR HIDE>*/
                                                                                $('#id-main').removeClass('opacidad');
                                                                                $('#body-main-div').removeClass('body-main');
                                                                                $('#body-main-div').hide();
                                                                            /*</CARGAR HIDE>*/
                                                                        }, 300);
                                                                    }, 4000);
                                                                }else{

                                                                    $('#table-contactos-door2door').hide();
                                                                    $('#table-contactos-visitas-door2door').show();


                                                                    //$('#button-actualizar-contactos-door2door').hide();
                                                                    $('#button-actualizar-contactos-door2door').show();
                                                                    $('#detalle-contactos-mostrar-door2door').show();

                                                                    $('#button-cargar-contactos-door2door').hide();
                                                                    $('#button-plantilla-contactos-door2door').hide();

                                                                    $('#table-contactos-visitas-door2door').dataTable().fnDestroy();   
                                                                    $('#table-contactos-visitas-door2door-informacion').html('');

                                                                    
                                                                    if(Information.length > 0){ 
                                                                        for(let i = 0; i <Information.length; i++) {
                                                                            record =  `
                                                                                    <tr>
                                                                                        
                                                                                        <td style="width:250px;vertical-align:middle;" class="text-justify">${Information[i].nombre}</td>   
                                                                                        <td style="width:150px;vertical-align:middle;" class="text-justify">${Information[i].telefono}</td>    
                                                                                        <td style="width:350px;vertical-align:middle;" class="text-justify">
                                                                                            ${Information[i].calle},   ${Information[i].noExterior}, ${Information[i].colonia}
                                                                                        </td> 
                                                                                        <td style="width:150px;vertical-align:middle;" class="text-justify">${Information[i].estatus}</td>
                                                                                        <td style="width:200px;vertical-align:middle;">
                                                                                            <center>
                                                                                                <div class="row">                                            
                                                                                                
                                                                                                    <div class="col-sm-4 ">
                                                                                                        <img  class="cursor visitas-del-contacto "  
                                                                                                            title="Editar" 
                                                                                                            onclick="ButtonEditarContactos( 
                                                                                                                ${Information[i].idContacto},
                                                                                                                '${Information[i].nombre}',
                                                                                                                '${Information[i].calle}',
                                                                                                                '${Information[i].noInterior}',
                                                                                                                '${Information[i].noExterior}',
                                                                                                                '${Information[i].codigoPostal}',
                                                                                                                '${Information[i].colonia}',
                                                                                                                '${Information[i].idMunicipio}',
                                                                                                                '${Information[i].idEstado}',
                                                                                                                '${Information[i].idPais}',
                                                                                                                '${Information[i].entreCalle}',
                                                                                                                '${Information[i].latitud}',
                                                                                                                '${Information[i].longitud}',
                                                                                                                '${Information[i].instrucciones}',
                                                                                                                '${Information[i].telefono}',
                                                                                                                '${Information[i].email}'
                                                                                                            );" 
                                                                                                            src="/d2dSocioWeb/Modules/ModulesImage/editar.png" 
                                                                                                            style="width:30px;height:30px" > 
                                                                                                    </div>
                                                                                            
                                                                                                    <div class="col-sm-4">
                                                                                                        <img  class="cursor evento-mostra-mapa-campana-eliminar" 
                                                                                                            title="Eliminar" 
                                                                                                            onclick="ButtonMostrarMapa( 
                                                                                                                '${Information[i].latitud}',
                                                                                                                '${Information[i].longitud}',
                                                                                                                '${Information[i].calle}',  
                                                                                                                '${Information[i].noExterior}', 
                                                                                                                '${Information[i].colonia}', 
                                                                                                                '${Information[i].codigoPostal}', 
                                                                                                                '${Information[i].idMunicipio}',   
                                                                                                                '${Information[i].idEstado}', 
                                                                                                                '${Information[i].idPais}',
                                                                                                                '${Information[i].observacionDireccion}'   
                                                                                                                
                                                                                                            );" 
                                                                                                            src="/door2door/Modules/ModulesImage/mapa.png" 
                                                                                                            style="width:30px;height:30px" > 
                                                                                                    </div>
                                                                                                    <div class="col-sm-4">
                                                                                                        <img  class="cursor" 
                                                                                                            title="Eliminar" 
                                                                                                            onclick="ButtonEliminarContactos( ${Information[i].idContacto}  );" 
                                                                                                            src="/d2dSocioWeb/Modules/ModulesImage/basura.png" 
                                                                                                            style="width:30px;height:30px" > 
                                                                                                    </div>
                                                                                                </div>
                                                                                                
                                                                                            </center>                     
                                                                                        </td>
                                                                                    </tr> `;  
                                                                            TableBody +=  record;
                                                                        }        
                                                                        $('#table-contactos-visitas-door2door-informacion').html(TableBody)   
                                                                    }  

                                                                setTimeout(() => {
                                                                    $('#table-contactos-visitas-door2door').DataTable(DataTableV);   
                                                                    setTimeout(() => {
                                                                        /*<CARGAR HIDE>*/
                                                                            $('#id-main').removeClass('opacidad');
                                                                            $('#body-main-div').removeClass('body-main');
                                                                            $('#body-main-div').hide();
                                                                        /*</CARGAR HIDE>*/
                                                                    }, 300);
                                                                }, 4000);
                                                            
                                                                }
                                                            /*</Construccion del la tabla>*/
                                                        /*<###############>*/
                                                        $('#modal-contactos-door2door').modal('show');                        
                                                    }else{
                                                        /*<warning de query>*/ 
                                                            $('#message-warning-door2door').html("");
                                                            $('#message-warning-door2door').html('¡warning AL RECARGAR LA PAGUINA!');
                                                            $('#modal-message-warning-door2door').modal('show');
                                                        /*</warning de query>*/  
                                                    }       
                                                }else{

                                                }                           
                                            }).catch( (err) => { 
                                                /*<warning de query>*/ 
                                                    $('#message-warning-door2door').html("");
                                                    $('#message-warning-door2door').html('¡warning AL RECARGAR LA PAGUINA!');
                                                    $('#modal-message-warning-door2door').modal('show');
                                                /*</warning de query>*/ 
                                            });
                                        /*<Consultar toda la iformacion>*/  

                                    }else{
                                        /*<Respuesta>*/
                                            $('#message-warning-door2door').html('');
                                            $('#message-warning-door2door').html('¡INTÉNTELO MÁS TARDE!  warning AL ELIMINAR');
                                            $('#modal-message-warning-door2door').modal('show');
                                        /*</Respuesta>*/ 

                                    }
                                }).catch((warning) => {
                                    /*<Respuesta>*/
                                        $('#message-warning-door2door').html('');
                                        $('#message-warning-door2door').html('¡INTÉNTELO MÁS TARDE!');
                                        $('#modal-message-warning-door2door').modal('show');
                                    /*</Respuesta>*/ 
                                });
                            /*</Delete>*/         
                        }else{
                            /*<Respuesta>*/
                                $('#message-warning-door2door').html('');
                                $('#message-warning-door2door').html('¡INTÉNTELO MÁS TARDE!');
                                $('#modal-message-warning-door2door').modal('show');
                            /*</Respuesta>*/ 
                        }
                    });
                /*<function Eliminar-si>*/
                
            

                
                
            /*</Main Module Roles>*/                                 
        });
</script>