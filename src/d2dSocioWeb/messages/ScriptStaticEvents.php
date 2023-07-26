<script type="module">
    /*<import librarys>*/ 
        import functionMensajeVisto             from '../../messages/js/API/API.Mensaje.Visto.main.js'; 
        import functionMensajesAPI              from '../../messages/js/API/API.Mensajes.main.js';          
        import functionNotificacionesAPI        from '../../messages/js/API/API.Notificaciones.main.js';   
        import functionNotificacionesVisto      from '../../messages/js/API/API.Notificaciones.Visto.main.js';
        import CreateAPI                        from '../../messages/js/API/API.Create.Message.main.js';
        
        import functionMensajeShow              from '../../messages/js/Funciones/Show.Mensajes.main.js';
        import functionNotificacionesShow       from '../../messages/js/Funciones/Show.Notificaciones.main.js';

        import SelectFullAPIMensajes            from '../../messages/js/API/API.SelectFull.Messages.main.js';
        import MensajeVisto                     from '../../messages/js/API/API.Mensaje.Visto.main.js';
    /*<import librarys>*/

    $(document).ready(() =>{ 
        
        if(!Smarphone()) {  window.location.href = "/d2dSocioWeb/closeSession/controller/closeSession.php"; }   

        /*<Main Module Roles>*/               
            /*<Consultar toda la functionMensajesAPI>*/            
                const ResfunctionMensajesAPI = functionMensajesAPI().
                then( (result) => {   
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/
                                let ArraysRoles = [];
                                ArraysRoles = result.information;                                 
                                const functionS =  functionMensajeShow(ArraysRoles);                              
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
            /*</Consultar toda la functionMensajesAPI>*/ 

            setInterval(() => {
                /*<Consultar toda la functionMensajesAPI>*/            
                    const ResfunctionMensajesAPI = functionMensajesAPI().
                    then( (result) => {     
                        if(result){                                                                    
                            if(result.message == 'Good'){
                                /*<Consulta exitosa>*/
                                    let ArraysRoles = [];
                                    ArraysRoles = result.information;                                 
                                    const functionS =  functionMensajeShow(ArraysRoles);                              
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
                /*</Consultar toda la functionMensajesAPI>*/ 
            }, 10000);

            /*<Consultar toda la functionNotificacionesAPI>*/            
                const ResfunctionNotificacionesAPI = functionNotificacionesAPI().
                then( (result) => {    
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/
                                let ArraysRoles = [];
                                ArraysRoles = result.information;      
                                const functionS =  functionNotificacionesShow(ArraysRoles);                              
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
            /*</Consultar toda la functionNotificacionesAPI>*/  
            
            $('#button-enviar-mensajes-main-door2door').on( 'click', () => {
                let Mensaje = $('#show-mensaje-mensajes-main-door2door').val();
                let idUsuario = $('#show-id-mensajes-main-door2door').val();

                const ResultCreateAPI = CreateAPI(idUsuario, Mensaje).
                then((result) =>{
                    if(result){
                        if(result.message == 'Good'){
                            $('#show-mensaje-mensajes-main-door2door').val('');
                            let idUsuario = $('#show-id-mensajes-main-door2door').val();
                            /*<MOSTRAR MENSAJES>*/
                                const FunSelectFullAPI = SelectFullAPIMensajes(idUsuario).
                                then( (result) => {  
                                    if(result){
                                        if(result.message == 'Good'){

                                            let Arrays = result.information;
                                            let campo  = ''; 

                                            let idUsuario = $('#show-id-mensajes-main-door2door').val();                                        
                                            
                                            if(Arrays.length > 0)
                                            {
                                               
                                                for(let i = 0; i<Arrays.length; i++)
                                                {
                                                
                                                    if(Arrays[i].idUsuarioReceptor ==  idUsuario
                                                        ){
                                                        campo += `
                                                                    <div class="d-flex flex-row justify-content-start">
                                                                        <img src="${Arrays[i].UsuarioEmisorImagen}"    alt="avatar 1" style="width: 45px; height: 100%;">
                                                                        <div>
                                                                            <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;color;black;">${Arrays[i].mensaje}</p>
                                                                            <p class="small ms-3 mb-3 rounded-3 text-muted">${Arrays[i].fecha}</p>
                                                                        </div>
                                                                    </div>
                                                        `;
                                                    }else{
                                                        campo += `
                                                                    <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                                                                        <div>
                                                                            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">${Arrays[i].mensaje}</p>                                                                    
                                                                            <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">${Arrays[i].fecha}</p>
                                                                        </div>
                                                                        <img src="${Arrays[i].UsuarioEmisorImagen}" alt="avatar 1" style="width: 45px; height: 100%;">
                                                                    </div>
                                                        `;
                                                    }
                                                    
                                                }
                                        
                                                $('#show-chat-mensajes-main-door2door').html(campo);
                                                $("#show-chat-mensajes-main-door2door").animate({ scrollTop: $('#show-chat-mensajes-main-door2door')[0].scrollHeight}, 100);
                                            }else{
                                                $('#show-chat-mensajes-main-door2door').html('');
                                            }
                                            
                                        }
                                    }
                                });
                                let IntervalorMensajes = setInterval(() => {
                                    const ResMensajeVisto = MensajeVisto(idUsuario).
                                    then((result) => { 
                                        if(result){
                                            if(result.message == 'Good'){
                                                const FunSelectFullAPI = SelectFullAPIMensajes(idUsuario).
                                                then( (result) => { 
                                                    if(result){
                                                        if(result.message == 'Good'){

                                                            let Arrays = result.information;
                                                            let campo  = ''; 

                                                            let idUsuario = $('#show-id-mensajes-main-door2door').val();
                                                         
                                                            
                                                            if(Arrays.length > 0)
                                                            {
                                                            
                                                                for(let i = 0; i<Arrays.length; i++)
                                                                {
                                                                
                                                                    if(Arrays[i].idUsuarioReceptor ==  idUsuario
                                                                        ){
                                                                        campo += `
                                                                                    <div class="d-flex flex-row justify-content-start">
                                                                                        <img src="${Arrays[i].UsuarioEmisorImagen}"    alt="avatar 1" style="width: 45px; height: 100%;">
                                                                                        <div>
                                                                                            <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;color;black;">${Arrays[i].mensaje}</p>
                                                                                            <p class="small ms-3 mb-3 rounded-3 text-muted">${Arrays[i].fecha}</p>
                                                                                        </div>
                                                                                    </div>
                                                                        `;
                                                                    }else{
                                                                        campo += `
                                                                                    <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                                                                                        <div>
                                                                                            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">${Arrays[i].mensaje}</p>                                                                    
                                                                                            <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">${Arrays[i].fecha}</p>
                                                                                        </div>
                                                                                        <img src="${Arrays[i].UsuarioEmisorImagen}" alt="avatar 1" style="width: 45px; height: 100%;">
                                                                                    </div>
                                                                        `;
                                                                    }
                                                                    
                                                                }
                                                        
                                                                $('#show-chat-mensajes-main-door2door').html(campo);
                                                                $("#show-chat-mensajes-main-door2door").animate({ scrollTop: $('#show-chat-mensajes-main-door2door')[0].scrollHeight}, 100);
                                                            }else{
                                                                $('#show-chat-mensajes-main-door2door').html('');
                                                            }
                                                            
                                                        }
                                                    }
                                                });
                                            }
                                        }
                                    });                                        
                                }, 10000);

                                $('#regresar-mensajes-main-door2door').on('click', () => {
                                    clearInterval(IntervalorMensajes);
                                });
                                
                            /*</MOSTRAR MENSAJES>*/
                        }
                    }
                });
            });

            $('#totalNotificacionessubmenuTercero').on( 'click', () => { $('#modal-notificaciones-main-door2door').modal('show'); })
        /*</Main Module Roles>*/         
                                  
    });

    const Smarphone = () => {
        let navegador = navigator.userAgent;
        if (    
                navigator.userAgent.match(/Android/i)       || 
                navigator.userAgent.match(/webOS/i)         || 
                navigator.userAgent.match(/iPhone/i)        || 
                navigator.userAgent.match(/iPad/i)          || 
                navigator.userAgent.match(/iPod/i)          || 
                navigator.userAgent.match(/BlackBerry/i)    || 
                navigator.userAgent.match(/Windows Phone/i) 
            ) {
            console.log("Estás usando un dispositivo móvil!!");
            return false ;
        } else {
            
            return true;
        }
    }
</script>