<script type="module">
    /*<import librarys>*/ 
    
        import DataTableV   from '../ModulePugins/Pluginjs/DataTable.var.main.js';

        import functionShow             from './js/function/Function.Show.main.js';
        import functionCreate           from './js/function/Function.Create.main.js';           
        import functionUpdate           from './js/function/Function.Update.main.js';
        import functionDelete           from './js/function/Function.Delete.main.js';
        
        import functionSelectFullAPI    from './js/API/API.SelectFull.main.js';

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
           

            /*<Evento creacion de un nuevo>*/
                $('#create-fecha-door2door').on('change', () =>{ 
                    let Fecha = $('#create-fecha-door2door').val();
                    let FechaInicial   = Fecha+'-01';
                     /*<Consultar toda la iformacion>*/ 
                        const functionSFA = functionSelectFullAPI(FechaInicial).
                        then( (result) => {     console.log(result);
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/

                                        let Information = [];
                                        Information     = result.information;     

                                        let Visitas         = 0;
                                        let Aceptadas       = 0;
                                        let Rechazadas      = 0;
                                        let PendietesPago   = 0;
                                        let Pagadas         = 0;
                                        let Comision         = 0;

                                        if(Information.length > 0){ 
                                            for(let i = 0; i <Information.length; i++) { 
                                                Visitas++;
                                                if(Information[i].estatus == 'ACEPTADOS'){
                                                    Aceptadas++;
                                                    PendietesPago++;

                                                }else if(Information[i].estatus == 'RECHAZADA'){
                                                    Rechazadas++;
                                                }else if(Information[i].estatus == 'PAGADA'){
                                                    Aceptadas++;
                                                    Pagadas++;
                                                    Comision = Comision + Information[i].Comision;
                                                }                                                 

                                            }
                                        }  
                                        $('#create-visitas-door2door').val(Visitas);  
                                        $('#create-aceptadas-door2door').val(Aceptadas);                                        
                                        $('#create-rechazadas-door2door').val(Rechazadas);  
                                        $('#create-pendientesdepago-door2door').val(PendietesPago);  
                                        $('#create-pagadas-door2door').val(Pagadas);  

                                      
                                    
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

                 }); 
            /*</Evento creacion de un nuevo>*/

            
            
            
            
        /*</Main Module Roles>*/                                 
    });
</script>