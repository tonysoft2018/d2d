<div    class="modal fade"  
        id="modal-message-internet-door2door" 
        data-bs-backdrop="static" 
        data-bs-keyboard="false" 
        tabindex="-1" 
        aria-labelledby="staticBackdropLabel" 
        aria-hidden="true"
        style="color:#fff;"
    >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color:#000;">Mensaje</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <center>
                            <img class="img-fluid"  src="<?= $URL?>/d2dSocio/Modules/ModulesImage/precaucion.png" style="width:150px;height:150px;"  ><br> 
                        <center>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <center>
                            <h4 id="message-internet-door2door" style="color:#000;" ></h4>
                        </center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-secondary btn-block"  data-dismiss="modal">
                            Regresar
                        </button>
                    </div>
                </div><br>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>
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

        setInterval(() => {
            if(navigator.onLine) {
                console.log("hay internter")
            } else {
                console.log("no hay internter")
                $('#message-internet-door2door').html("");
                $('#message-internet-door2door').html(`EN ESTE MOMENTO NO TIENES CONEXIÓN`);
                $('#modal-message-internet-door2door').modal('show');
            }
        }, 5000);
       

        if (    
                navigator.userAgent.match(/Android/i)       || 
                navigator.userAgent.match(/webOS/i)         || 
                navigator.userAgent.match(/iPhone/i)        || 
                navigator.userAgent.match(/iPad/i)          || 
                navigator.userAgent.match(/iPod/i)          || 
                navigator.userAgent.match(/BlackBerry/i)    || 
                navigator.userAgent.match(/Windows Phone/i) 
            ) {

            }else{
                window.location.href = "/d2dSocio/closeSession/controller/closeSession.php";
            }
                
        /*<Main Module Roles>*/               
            /*<Consultar toda la functionMensajesAPI>*/            
                const ResfunctionMensajesAPI = functionMensajesAPI().
                then( (result) => {     console.log(result)
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
                    /*<Error de query>*/  console.log(err)
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
                                                then( (result) => {  console.log(result);
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
        
            /*<EVENTO NOTIFICACIONES>*/
                $('#totalNotificacionessubmenuTercero').on('click', () => { 
                    let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();
                    $.ajax({
                        url: "/d2dSocio/messages/api/controller.notificaciones.visto.php",
                        type: 'post',
                        async: false,
                        dataType: "json",
                        data: { TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door }       
                    }).
                    then((result) => {  
                        if(result){
                            if(result.message == 'Good'){
                                $('#totalNotificaciones').html(0);          
                                $('#totalNotificacionessubmenu').html(0+" notificaciones nuevas");  
                                $('#totalNotificacionessubmenuTercero').html('<i class="fas fa-envelope mr-2"></i> '+0+" Mensajes nuevos");  
                            }
                        }
                    });                    
                });
            /*</EVENTO NOTIFICACIONES>*/
            
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