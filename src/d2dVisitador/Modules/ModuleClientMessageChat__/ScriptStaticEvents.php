<script type="module">
    /*<import librarys>*/ 
    
        import DataTableV   from '../ModulePugins/Pluginjs/DataTable.var.main.js';
        
        import functionShow             from './js/function/Function.Show.main.js';
               
        import functionUpdate           from './js/function/Function.Update.main.js';
        import functionDelete           from './js/function/Function.Delete.main.js';
        
        import functionSelectFullAPI    from './js/API/API.SelectFull.main.js';
        import SelectFullAPI            from './js/API/API.SelectFull.Messages.main.js';
        import SelectFulUsuariosAPI     from './js/API/API.SelectFull.Users.main.js';
        import functionCreateMensaje    from './js/API/API.Create.Message.main.js';    

        import functionCreateGrupo    from './js/API/API.Create.Grupo.main.js';    

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
                let estatus = $('#main-estatus-door2door').val();
                const functionSFA = functionSelectFullAPI('usuarios',estatus).
                then( (result) => { console.log(result);
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/
                                let ArraysRoles = [];
                                ArraysRoles = result.information;                                                
                                const functionS =  functionShow(ArraysRoles); 
                                $('#nav-usuarios').addClass('active'); 
                              
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

              
            /*<Consultar toda la SelectFulUsuariosAPI>*/             
                const functionSelectFulUsuariosAPI = SelectFulUsuariosAPI().
                then( (result) => {    console.log(result)
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/
                                let Array = [];
                                Array = result.information;    
                                let Option = "";       
                                let OptionGrup = "";   

                                

                                for(let i = 0; i<Array.length; i++ ){
                                   
                                    /*<Select Group>*/
                                        Array[i].SELECCIONADO = 0;
                                    /*</Select Group>*/

                                    if(Array[i].estatus != "USUARIO" ){
                                        Option += '<option value="'+Array[i].idUsuario+'"><label>GRUPO / </label> '+Array[i].nombres+' '+Array[i].apellidos+'</option>';

                                    }else{
                                        Option += '<option value="'+Array[i].idUsuario+'"> '+Array[i].nombres+' '+Array[i].apellidos+'</option>';

                                    }
                                     /*<Option Group>*/
                                        OptionGrup += `
                                                <div class="row" sty>
                                                    <div class="col-10">
                                                        ${Array[i].nombres} ${Array[i].apellidos}
                                                    </div>
                                                    <div class="col-2">
                                                        <input type="checkbox"   onclick="CheckBoxUsuarios(${i});"  >
                                                    </div>
                                                </div>
                                            `;
                                        /*<Option Group>*/
                                    
                                   
                                }
                                localStorage.setItem('JSON_INFORMACION_CONTACTOS_GRUPO', JSON.stringify(Array));   
                                $('#create-usuarios-door2door').html(Option);
                                $('#grupos-crear').html(OptionGrup);
                              
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
            /*<Consultar toda la SelectFulUsuariosAPI>*/ 
            

            /*<Evento creacion de un nuevo>*/
                $('#nav-usuarios').on('click', () =>{ 
                    $('#nav-usuarios').removeClass('active');
                    $('#nav-socios-visitanmtes').removeClass('active');
                    $('#nav-socios-clientes').removeClass('active');

                    let estatus = $('#main-estatus-door2door').val();
                    /*<Consultar toda la iformacion>*/ 
                        const functionSFA = functionSelectFullAPI('usuarios', estatus).
                        then( (result) => {    
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/
                                        let ArraysRoles = [];
                                        ArraysRoles = result.information;                                                
                                        const functionS =  functionShow(ArraysRoles); 
                                        $('#nav-usuarios').addClass('active'); 
                                    
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

            /*<Evento creacion de un nuevo>*/
                $('#nav-socios-visitanmtes').on('click', () =>{ 
                    $('#nav-usuarios').removeClass('active');
                    $('#nav-socios-clientes').removeClass('active');
                    $('#nav-socios-visitanmtes').removeClass('active');
                    
                    let estatus = $('#main-estatus-door2door').val();
                    /*<Consultar toda la iformacion>*/ 
                        const functionSFA = functionSelectFullAPI('socios-visitanmtes', estatus).
                        then( (result) => {  
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/
                                        let ArraysRoles = [];
                                        ArraysRoles = result.information;                                                
                                        const functionS =  functionShow(ArraysRoles); 
                                        $('#nav-socios-visitanmtes').addClass('active');
                                    
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

            /*<Evento creacion de un nuevo>*/
                $('#nav-socios-clientes').on('click', () =>{ 
                    $('#nav-socios-clientes').removeClass('active');
                    $('#nav-usuarios').removeClass('active');
                    $('#nav-socios-visitanmtes').removeClass('active');

                    let estatus = $('#main-estatus-door2door').val();
                    /*<Consultar toda la iformacion>*/ 
                        const functionSFA = functionSelectFullAPI('socios-clientes', estatus).
                        then( (result) => {     
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/
                                        let ArraysRoles = [];
                                        ArraysRoles = result.information;                                                
                                        const functionS =  functionShow(ArraysRoles); 
                                        $('#nav-socios-clientes').addClass('active'); 
                                    
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



            /*<Evento creacion de un nuevo>*/
                $('#button-create-door2door').on('click', () =>{ const Funresult = functionCreate(); }); 
            /*</Evento creacion de un nuevo>*/

            /*<Evento actualizacion>*/              
                $('#button-update-door2door').on('click', () =>{ const Funresult = functionUpdate();  });
            /*<Evento actualizacion>*/ 

            /*<Evento eliminacion>*/  
                $('#button-delete-door2door').on('click', ()=> { const Funresult = functionDelete();  });
            /*</Evento eliminacion>*/ 
            
            /*<Evento eliminacion>*/  
                $('#button-crate-grupo-door2door').on('click', ()=> { $('#modal-create-grupo-door2door').modal('show');  });
            /*</Evento eliminacion>*/ 

            /*<Evento crear grupo>*/  
                $('#button-crear-grupo').on('click', ()=> {  
                    let Arreglo = JSON.parse(localStorage.getItem('JSON_INFORMACION_CONTACTOS_GRUPO')); 
                    let Nombre  = $('#crear-nombre-door2door').val();
                    let contador = 0;
                    for(let i = 0; i<Arreglo.length; i++){
                        if(Arreglo[i].SELECCIONADO == 1){
                            contador++;
                        }
                    }
                    if(contador > 2 ){
                        if(Nombre != ''){                     
                            const Result =  functionCreateGrupo(Arreglo,Nombre).
                            then((result) => { console.log(result);
                                if(result){
                                    if(result.message == 'Good'){
                                        $('#modal-create-grupo-door2door').modal('hide');       
                                        $('#modal-create-door2door').modal('hide');       
                                        $('#message-succes-door2door').html("");
                                        $('#message-succes-door2door').html('GRUPO CREADO CON ÉXITOSO');
                                        $('#modal-message-succes-door2door').modal('show');   
                                    
                                        /*<Consultar toda la iformacion>*/ 
                                            let estatus = $('#main-estatus-door2door').val();
                                            const functionSFA = functionSelectFullAPI('usuarios',estatus).
                                            then( (result) => { console.log(result);
                                                if(result){                                                                    
                                                    if(result.message == 'Good'){
                                                        /*<Consulta exitosa>*/
                                                            let ArraysRoles = [];
                                                            ArraysRoles = result.information;                                                
                                                            const functionS =  functionShow(ArraysRoles); 
                                                            $('#nav-usuarios').addClass('active'); 
                                                        
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

                                    }
                                }
                            }).catch((error) => {
                            });
                        }else{
                            $('#message-warning-door2door').html('');
                            $('#message-warning-door2door').html('¡FAVER DE COLOCAR NOMBRE AL GRUPO!');
                            $('#modal-message-warning-door2door').modal('show')
                        }
                    }else{
                        $('#message-warning-door2door').html('');
                        $('#message-warning-door2door').html('¡ES NESESARIO SELECCIONAR 2 USUARIOS!');
                        $('#modal-message-warning-door2door').modal('show')
                    }
                    
                });
            /*</Evento crear grupo>*/ 

            
            /*<enviar-mensaje-nuevo>*/ 
                $('#enviar-mensaje-nuevo').on('click', () =>{
                    /*<VARIABLES>*/
                        let mensaje     =  $('#mensaje-enviar-mensaje-nuevo').val();
                        let idUsuario   =  $('#create-usuarios-door2door').val();
                        let estatus     =  "";
                        let arrays      = JSON.parse(localStorage.getItem('JSON_INFORMACION_CONTACTOS_GRUPO'));  
                    /*</VARIABLES>*/
                    for(let i = 0; i<arrays.length; i++ ){ if(arrays[i].idUsuario == idUsuario){ estatus = arrays[i].estatus}}
                    console.log(estatus);
                    if(mensaje != '' && idUsuario > 0)
                    {
                        const MensajeEnviar = functionCreateMensaje(idUsuario, mensaje,estatus).
                        then( (result) => 
                        { 
                            if(result){ console.log(result)
                                if(result.message == 'Good'){
                                    /*<Actualizar mensajes>*/
                                        $('#mensaje-enviar-mensaje-nuevo').val('');      
                                        $('#modal-create-door2door').modal('hide');       
                                        $('#message-succes-door2door').html("");
                                        $('#message-succes-door2door').html('MENSAJE ENVIADO CON EXITOSO');
                                        $('#modal-message-succes-door2door').modal('show');                           
                                     /*<Actualizar mensajes>*/
                                }
                            }
                        })
                    }else{
                        $('#message-warning-door2door').html('');
                        $('#message-warning-door2door').html('NO HAY MENSAJE A ENVIAR');
                        $('#modal-message-warning-door2door').modal('show')
                    }
                })
            /*</enviar-mensaje-nuevo>*/ 

            /*<Evento enviar mensaje>*/  
                $('#button-update-enviar-door2door').on('click', ()=> { 
                    /*<VARIABLES>*/
                        let mensaje     =  $('#update-mensaje-door2door').val();
                        let idUsuario   =  $('#update-id-door2door').val();
                        let estatus     =  $('#update-estatus-door2door').val();
                    /*</VARIABLES>*/
                    if(mensaje != '' && idUsuario > 0)
                    {
                        const MensajeEnviar = functionCreateMensaje(idUsuario, mensaje,estatus).
                        then( (result) => { 
                            if(result){
                                if(result.message == 'Good'){
                                    /*<Actualizar mensajes>*/
                                        $('#update-mensaje-door2door').val('');
                                        let idUsuario = $('#update-id-door2door').val();
                                        const FunSelectFullAPI = SelectFullAPI(idUsuario).
                                        then( (result) => {
                                            if(result){
                                                if(result.message == 'Good'){
                                                    let Arrays = result.information;
                                                    let campo  = ''; 
                                                    let idUsuario = $('#update-id-door2door').val();
                                                    if(Arrays.length > 0){
                                                        for(let i = 0; i<Arrays.length; i++){
                                                           
                                                            if(Arrays[i].idUsuarioReceptor ==  idUsuario){
                                                                campo += `
                                                                <div class="d-flex flex-row justify-content-start">
                                                                <img src="${Arrays[i].UsuarioEmisorImagen}"
                                                                alt="avatar 1" style="width: 45px; height: 100%;">
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
                                                                    <img src="${Arrays[i].UsuarioEmisorImagen}"
                                                                    alt="avatar 1" style="width: 45px; height: 100%;">
                                                                </div>
                                                            
                                                                `;
                                                            }
                                                            
                                                        }
                                                        $('#update-chat-door2door').html(campo);
                                                        $("#update-chat-door2door").animate({ scrollTop: $('#update-chat-door2door')[0].scrollHeight}, 100);
                                                    }
                                                    
                                                }
                                            }
                                        });
                                     /*<Actualizar mensajes>*/
                                     $('#update-mensaje-door2door').val('');

                                }

                            }

                        })
                    }else{
                        $('#message-warning-door2door').html('');
                        $('#message-warning-door2door').html('NO HAY MENSAJE A ENVIAR');
                        $('#modal-message-warning-door2door').modal('show')
                    }

                });
            /*</Evento eliminacion>*/ 
            

            
            
        /*</Main Module Roles>*/                                 
    });
</script>