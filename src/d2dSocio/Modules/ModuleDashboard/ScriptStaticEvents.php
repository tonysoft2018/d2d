<script type="module">
    /*<import librarys>*/ 
    
        import DataTableV   from '../ModulePugins/Pluginjs/DataTable.var.main.js';

        
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
            /*<Consultar toda la iformacion>*/ 
                const functionSFA = functionSelectFullAPI().
                then( (result) => {   console.log(">");  console.log(result)
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/

                                let Information = [];
                                Information     = result.information;     

                              
                                $('#create-campanaAbiertas-door2door').val(Information[0].campanaAbiertas);  
                                $('#create-campanasCerradas-door2door').val(Information[0].campanaCerradas);                                        
                                $('#create-campanaPausadas-door2door').val(Information[0].visitasCompletadas);  
                                $('#create-visitasProgramadas-door2door').val(Information[0].visitasProgramadas);  
                                $('#create-visitasSeleccionadas-door2door').val(Information[0].visitasSeleccionadas);  
                                $('#create-visitasCompletadas-door2door').val(Information[0].visitasCompletadas);  
                            
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
        /*</Main Module Roles>*/                                 
    });
</script>