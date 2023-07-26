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

        
        
        /*<Main Module Roles>*/               
            
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
            
            
        /*</Main Module Roles>*/                                 
    });
</script>