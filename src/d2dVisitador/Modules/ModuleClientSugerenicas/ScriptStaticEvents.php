<script   src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDwQClTGJJEBxBdoDdpvZqj410LlfAb8FM&callback=initMap&'; async></script>

<script >
        //localStorage.setItem('JSON_LOCALIZACION', JSON.stringify({lat: 1, lng: 1}));
        
    
       
</script>

<script type="module">
    /*<import librarys>*/ 
    
        import DataTableV   from '../ModulePugins/Pluginjs/DataTable.var.main.js';

        import functionShow             from './js/function/Function.Show.main.js';
        import functionCreate           from './js/function/Function.Create.main.js';  
        import functionDelete           from './js/function/Function.Delete.main.js';
        import functionSelected         from './js/API/API.Selected.main.js';
        
        import functionSelectFullAPI    from './js/API/API.SelectFull.main.js';

    /*<import librarys>*/ 
    



    $(document).ready(() =>{ 
        setTimeout(() => {
            if (true ) {
                let Arrays = JSON.parse(localStorage.getItem('JSON_LOCALIZACION'));  
                if( false 
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

                    /*<MOSTRAR>*/
                        $('#message-geolocalizacion-door2door').html("");
                        $('#message-geolocalizacion-door2door').html(`GEOLOCALIZACIÓN NO DISPONIBLE \n <br> 
                                                                        - LE RECOMENDAMOS REINICIAR LA APLICACIÓN \n <br>
                                                                        - INTENTE MOVERSE DE SU POSICIÓN \n <br>
                                                                        - PRESIONE RECARGAR ${Arrays.lat}
                                                                    `);
                        $('#modal-message-geolocalizacion-door2door').modal('show');
                    /*</MOSTRAR>*/                       
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
                                    $('#modal-contacto-seleccionado-door2door').modal('show');
                                }else{
                                    ArraysRoles = result.information;                                                
                                    const functionS =  functionShow(ArraysRoles);  
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
            
        /*</Main Module Roles>*/                                 
    });
</script>