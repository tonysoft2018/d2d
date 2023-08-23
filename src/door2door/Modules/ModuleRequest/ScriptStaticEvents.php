<script   src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDwQClTGJJEBxBdoDdpvZqj410LlfAb8FM&callback=initMap&'; async></script>

<script >
    /*<CREACION DEL MAPA DE GEOLOCALIZACION>*/
        /*<VARIABLES>*/
            let map;
          
            let centerll    = {lat: 20.6471168, lng: -103.4584064};
        /*</VARIABLES>*/

        /*<MAP>*/                    
            function   initMap(){
                
                /*<INSTANCIACION>*/
                    map = new google.maps.Map(document.getElementById('map-domicilio'), {
                        center: centerll,
                        zoom: 10,
                        streetViewControl: false,               
                        mapTypeControl: false,
                        fullscreenControl: false,                         
                            
                    });    
                /*<INSTANCIACION>*/ 

            
                
                /*<EVENTOS>*/
                    /*<MOSTRAR MAPA>*/                      
                        setTimeout(() => 
                        {
                            $('.evento-mostra-mapa-sugerencias').on('click', () => 
                            {
                                console.log("######################################");
                                setTimeout(() => 
                                {                                    
                                    /*<VARIABLES>*/
                                        let latitud         = parseFloat($('#update-latitud-door2door').val());
                                        let logitud         = parseFloat($('#update-longitud-door2door').val());                                       
                                    /*</VARIABLES>*/                          
                             
                                    /*<LIMPIEZA>*/
                                      

                                        let marker1 = new google.maps.Marker({
                                            position: {lat: latitud, lng: logitud},
                                            map:map,
                                            title: "direccion"                                     
                                        });                                         
                                    /*<LIMPIEZA>*/

                                       
                                    

                                    $('.evento-regresar-mapa-sugerencias').on('click', () => {
                                        console.log("Z>>>>>>>>>>>>>>>>>");
                                        marker1.setMap(null);
                                    })
                                }, 1000);
                                
                            });
                        }, 1900);
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
        import functionUpdate           from './js/function/Function.Update.main.js';  

        import functionSelectFullAPI    from './js/API/API.SelectFull.main.js';


     
        import functionRechazar         from './js/function/Function.Rechazada.main.js';
        import functionContrato         from './js/function/Function.Contrato.main.js';
        import functionIncompleto       from './js/function/Function.Incompleta.main.js';
        import functionDelete           from './js/function/Function.delete.main.js';
        import functionActiva           from './js/function/Function.Activar.main.js';
        import functionInactivo         from './js/function/Function.Inactivo.main.js';

    /*<import librarys>*/ 
    
    


    $(document).ready(() =>{  


        setTimeout(() => {
            /*<CARGAR HIDE>*/
                $('#id-main').removeClass('opacidad');
                $('#body-main-div').removeClass('body-main');
                $('#body-main-div').hide();
            /*</CARGAR HIDE>*/
        }, 1500);
        /*<Main Module Roles>*/     

            /*<Consultar toda la iformacion>*/            
                const functionSFA = functionSelectFullAPI().
                then( (result) => {     console.log(result)
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/
                                let ArraysRoles = [];
                                ArraysRoles = result.information;                                                
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

            /*<regresar>*/ 
                $('#regresar-modal-imagen').on('click', () => { 
                    $('#modal-imagen-door2door').modal("hide"); 
                    let TipoImagen = $('#dato-imagen-tipo-door2door').val();
                    setTimeout(() => {
                        console.log(TipoImagen)
                        switch(TipoImagen){
                            case 'INE':                     { $('#modal-datos-ine-door2door').modal('show');                break;}
                            case 'Comprobante-domicilio':   { $('#modal-datos-domicilio-door2door').modal('show');          break;}
                            case 'Tarjeta-circulacion':     { $('#modal-datos-tarjetacirculacion-door2door').modal('show'); break;}
                            case 'Tarjeta-bancaria':        { $('#modal-datos-bancarios-door2door').modal('show');          break;}
                            case 'Fotografia-frente':       { $('#modal-datos-personales-door2door').modal('show');        break;}
                        }
                    }, 500);                    
                });
            /*<regresar>*/          
            
            
      
            /*<button-Rechazada>*/
                $('#button-rechazar').on('click', () => {
                    let idSolicitud   = $('#update-id-door2door').val();
                    $('#rechazar-id-door2door').val(idSolicitud);
                    $('#modal-rechazar-door2door').modal('show');
                });
            /*</button-Rechazada>*/

            /*<button-incompleto>*/
                $('#button-incompleto').on('click', () => {
                    let idSolicitud   = $('#update-id-door2door').val();
                    $('#incompleto-id-door2door').val(idSolicitud);
                    $('#modal-incompleto-door2door').modal('show');
                });
            /*</button-incompleto>*/

            /*<button-contrato>*/
                $('#button-contrato').on('click', () => {
                    let idSolicitud   = $('#update-id-door2door').val();
                    $('#contrato-id-door2door').val(idSolicitud);
                    $('#modal-contrato-door2door').modal('show');
                });
            /*</button-contrato>*/

            /*<button-contrato>*/
                $('#button-activa').on('click', () => {
                    let idSolicitud   = $('#update-id-door2door').val();
                    $('#activa-id-door2door').val(idSolicitud);
                    $('#modal-activa-door2door').modal('show');
                });
            /*</button-contrato>*/

            /*<button-contrato>*/
                $('#button-inactivo').on('click', () => {
                    let idSolicitud   = $('#update-id-door2door').val();
                    $('#inactivo-id-door2door').val(idSolicitud);
                    $('#modal-inactivo-door2door').modal('show');
                });
            /*</button-contrato>*/

            /*<si-functionRechazar>*/ 
                $('#button-inactivo-door2door').on(     'click', () => {  const Result = functionInactivo(); });
            /*</si-functionRechazar>*/   
         

            
            /*<si-functionRechazar>*/ 
                $('#button-rechazar-door2door').on(     'click', () => {  const Result = functionRechazar(); });
            /*</si-functionRechazar>*/            
          

            /*<si-functionDelete>>*/
                $('#button-delete-door2door').on(       'click', () => {   const Result = functionDelete(); });
            /*</si-functionDelete>>*/

            /*<si-functionContrato>*/
                $('#button-contrato-door2door').on(     'click', () => {   const Result = functionContrato(); });
            /*</si-functionContrato>*/   

            /*<si-functionContrato>*/
                $('#button-incompleto-door2door').on(   'click', () => {   const Result = functionIncompleto(); });
            /*</si-functionContrato>*/     

            /*<si-functionContrato>*/
                $('#button-activa-door2door').on(       'click', () => {   const Result = functionActiva(); });
            /*</si-functionContrato>*/     
            
            

            
            

            /*<INE>*/
                $('#INE-frente').on('click', ()=> {
                    let Componente = $('#INE-frente-imagen').val();
                    $('#show-imagen-door2door').html('<img  class="zoom img-fluid"    src="'+Componente+'">');
                    $('#dato-imagen-tipo-door2door').val("INE");
                    $('#modal-datos-ine-door2door').modal('hide');
                    setTimeout(() => {
                        $('#modal-imagen-door2door').modal('show');
                    }, 500);
                });
                /*<>*/
                $('#INE-atras').on('click', ()=> {                               
                    let Componente = $('#INE-frente-imagen').val();
                    $('#show-imagen-door2door').html('<img  class="zoom img-fluid"    src="'+Componente+'">');
                    $('#dato-imagen-tipo-door2door').val("INE");
                    $('#modal-datos-ine-door2door').modal('hide');
                    setTimeout(() => {
                        $('#modal-imagen-door2door').modal('show');
                    }, 500);
                });
            /*</INE>*/

            /*<Comprobante>*/
                $('#Comprobante-domicilio').on('click', ()=> {
                    let Componente = $('#Comprobante-domicilio-imagen').val();
                    $('#show-imagen-door2door').html('<img  class="zoom img-fluid"    src="'+Componente+'">');
                    $('#dato-imagen-tipo-door2door').val("Comprobante-domicilio");
                    $('#modal-datos-domicilio-door2door').modal("hide");
                    setTimeout(() => {
                        $('#modal-imagen-door2door').modal('show');
                    }, 500);
                    
                });
            /*</Comprobante>*/

            /*<Tarjeta-circulacion>*/
                $('#Tarjeta-circulacion').on('click', ()=> {
                    let Componente = $('#Tarjeta-circulacion-imagen').val();
                    $('#show-imagen-door2door').html('<img  class="zoom img-fluid"   src="'+Componente+'">');
                    $('#dato-imagen-tipo-door2door').val("Tarjeta-circulacion");
                    $('#modal-datos-tarjetacirculacion-door2door').modal('hide');
                    setTimeout(() => {
                        $('#modal-imagen-door2door').modal('show');
                    }, 500);
                });
            /*</Tarjeta-circulacion>*/


            /*<Tarjeta-bancaria>*/
                $('#Tarjeta-bancaria').on('click', ()=> {
                    let Componente = $('#Tarjeta-bancaria-imagen').val();
                    $('#show-imagen-door2door').html('<img  class="zoom img-fluid"  style="width:600px;height:600px"  src="'+Componente+'">');
                    $('#dato-imagen-tipo-door2door').val("Tarjeta-bancaria");
                    $('#modal-datos-bancarios-door2door').modal("hide");
                    setTimeout(() => {
                        $('#modal-imagen-door2door').modal('show');
                    }, 500);
                    
                });
            /*</Tarjeta-bancaria>*/

            /*<Fotografia>*/
                $('#Fotografia-frente').on('click', ()=> {
                    let Componente = $('#Fotografia-frente-imagen').val();
                    $('#show-imagen-door2door').html('<img  class="zoom img-fluid"  style="width:600px;height:600px"  src="'+Componente+'">');
                    $('#dato-imagen-tipo-door2door').val("Fotografia-frente");
                    $('#modal-datos-personales-door2door').modal("hide");
                    setTimeout(() => {
                        $('#modal-imagen-door2door').modal('show');
                    }, 500);
                    
                    
                });
            /*</Fotografia>*/
            
          
            /*<EVENTOS DE NAVEGAACCION>*/
                /*<MODAL # personales>*/
                    $('#button-siguiente-datos-personales').on( 'click', ()=> {
                        $('#modal-datos-personales-door2door').modal('hide');
                        setTimeout(() => {
                            $('#modal-datos-domicilio-door2door').modal('show');
                        }, 500);
                    });
                /*</MODAL # personales>*/

                /*<MODAL # domicilio>*/
                    $('#button-atras-datos-domicilio').on( 'click', ()=> {
                        $('#modal-datos-domicilio-door2door').modal('hide');
                        setTimeout(() => {
                            $('#modal-datos-personales-door2door').modal('show');
                        }, 500);
                    });

                    $('#button-siguiente-datos-domicilio').on( 'click', ()=> {
                        $('#modal-datos-domicilio-door2door').modal('hide');
                        setTimeout(() => {
                            $('#modal-datos-ine-door2door').modal('show');
                        }, 500);
                    });
                /*</MODAL # domicilio>*/

                /*<MODAL # ine>*/
                    $('#button-atras-datos-ine').on( 'click', ()=> {
                        $('#modal-datos-ine-door2door').modal('hide');
                        setTimeout(() => {
                            $('#modal-datos-domicilio-door2door').modal('show');
                        }, 500);
                    });
                    $('#button-siguiente-datos-ine').on( 'click', ()=> {
                        $('#modal-datos-ine-door2door').modal('hide');
                        setTimeout(() => {
                            $('#modal-datos-tarjetacirculacion-door2door').modal('show');
                        }, 500);
                    });
                /*</MODAL # ine>*/

                /*<MODAL # tarjetacirculacion>*/
                    $('#button-atras-datos-tarjetacirculacion').on( 'click', ()=> {
                        $('#modal-datos-tarjetacirculacion-door2door').modal('hide');
                        setTimeout(() => {
                            $('#modal-datos-ine-door2door').modal('show');
                        }, 500);
                    });
                    $('#button-siguiente-datos-tarjetacirculacion').on( 'click', ()=> {
                        $('#modal-datos-tarjetacirculacion-door2door').modal('hide');
                        setTimeout(() => {
                            $('#modal-datos-bancarios-door2door').modal('show');
                        }, 500);
                    });
                /*</MODAL # tarjetacirculacion>*/

                /*<MODAL # 5>*/
                    $('#button-atras-datos-bancarios').on( 'click', ()=> {
                        $('#modal-datos-bancarios-door2door').modal('hide');
                        setTimeout(() => {
                            $('#modal-datos-tarjetacirculacion-door2door').modal('show');
                        }, 500);
                    });
                    
                    $('#button-siguiente-datos-bancarios').on( 'click', ()=> {
                        $('#modal-datos-bancarios-door2door').modal('hide');
                        setTimeout(() => {
                            $('#modal-datos-cuestionario-door2door').modal('show');
                        }, 500);
                    });
                /*</MODAL # 5>*/

                /*<MODAL # 6>*/
                    $('#button-atras-datos-cuestionario').on( 'click', ()=> {
                        $('#modal-datos-cuestionario-door2door').modal('hide');
                        setTimeout(() => {
                            $('#modal-datos-bancarios-door2door').modal('show');
                        }, 500);
                    });
                /*</MODAL # 6>*/
            /*</EVENTOS DE NAVEGAACCION>*/
            
            
            

            

           
        /*</Main Module Roles>*/                                 
    });
</script>