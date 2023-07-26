/*
*   <Information>
*       <Author> 
*           Carlos Andres González Gómez
*       </Author>
*       <Description> 
*           Funcion de javascrit para realizar peticiones
*       </Description>
*   </Information>
*/ 
/*<Show>*/         

    import DataTableV       from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
    import SelectFullAPI    from '../API/API.SelectFull.Messages.main.js';

    const Show = async (Information) => { 
        /*<Destruimos el un datatable>*/  
            $('#table-main-door2door').dataTable().fnDestroy();   
            $('#table-main-door2door-informacion').html('');
        /*<Destruimos el un datatable>*/  

        /*<Construccion del la tabla>*/ 
            let record = '';
            let TableBody= ''; 

            
            if(Information.length > 0){ 
                for(let i = 0; i <Information.length; i++) {
                    console.log(Information[i].estatus);
                    if( Information[i].estatus == "GRUPO" ){

                        record =  `
                                    <tr>
                                        <td style="width:250px;vertical-align:middle;" class="text-justify">
                                            <label> GRUPO: </label> ${Information[i].nombres} ${Information[i].apellidos}</td>
                                        <td style="width:200px;vertical-align:middle;" class="text-justify">${Information[i].FechaUltimoMensaje}</td>        
                                        <td style="width:220px;vertical-align:middle;">
                                            <center>
                                                <img        class="buscar-mensajes-usuario cursor"  
                                                            title="Mostrar" 
                                                            onclick="ButtonShow(
                                                                         ${Information[i].idUsuario},
                                                                        '${Information[i].nombres}',
                                                                        '${Information[i].apellidos}',
                                                                        '${Information[i].estatus}'
                                                                    );" 
                                                            src="/door2door/Modules/ModulesImage/mostrar.png"    
                                                            style="width:30px;height:30px;border-radius:15px;" >
                                            </center>                     
                                        </td>
                                    </tr> `;  
                    }else{

                        record =  `
                                    <tr>
                                        <td style="width:250px;vertical-align:middle;" class="text-justify">${Information[i].nombres} ${Information[i].apellidos}</td>
                                        <td style="width:200px;vertical-align:middle;" class="text-justify">${Information[i].FechaUltimoMensaje}</td>        
                                        <td style="width:220px;vertical-align:middle;">
                                            <center>
                                                <img        class="buscar-mensajes-usuario cursor"  
                                                            title="Mostrar" 
                                                            onclick="ButtonShow(
                                                                        ${Information[i].idUsuario},
                                                                        '${Information[i].nombres}',
                                                                        '${Information[i].apellidos}',
                                                                        '${Information[i].estatus}'
                                                                    );" 
                                                            src="/door2door/Modules/ModulesImage/mostrar.png"    
                                                            style="width:30px;height:30px;border-radius:15px;" >
                                            </center>                     
                                        </td>
                                    </tr> `;  

                    }
                     
                    TableBody +=  record;
                }

                
                $('#table-main-door2door-informacion').html(TableBody); 

                $('.buscar-mensajes-usuario').on('click', () => {
                    $('#update-chat-door2door').html("");
                    /*<MOSTRAR INFORMACION>*/
                        let idUsuario = $('#update-id-door2door').val();
                        let estatus   = $('#update-estatus-door2door').val();
                        const FunSelectFullAPI = SelectFullAPI(idUsuario, estatus).
                        then( (result) => { console.log(result);
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
                                                    <img src="${Arrays[i].UsuarioEmisorImagen}" class="img-circle elevation-2" style="width:100;height:100%;">
                                                    <div>
                                                        <p class="small ms-1 mb-3 rounded-1 text-primary">${Arrays[i].UsuarioEmisor}</p>
                                                        <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;color;black;">${Arrays[i].mensaje}</p>
                                                        <p class="small ms-3 mb-3 rounded-3 text-muted">${Arrays[i].fecha}</p>
                                                    </div>
                                                </div>
                                            
                                            
                                                `;
                                            }else{
                                                campo += `
                                                <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                                                    <div>
                                                    <p class="small ms-1 mb-3 rounded-1 text-primary">${Arrays[i].UsuarioEmisor}</p>
                                                        <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">${Arrays[i].mensaje}</p>                                                    
                                                        <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">${Arrays[i].fecha}</p>
                                                    </div>
                                                    <img src="${Arrays[i].UsuarioEmisorImagen}" class="img-circle elevation-2" style="width:45px;height:100%;">
                                                </div>
                                            
                                                `;
                                            }
                                            
                                        }
                                        $('#update-chat-door2door').html(campo);
                                        $("#update-chat-door2door").animate({ scrollTop: $('#update-chat-door2door')[0].scrollHeight}, 100);
                                    }else{
                                        $('#update-chat-door2door').html('');
                                    }
                                    
                                }
                            }
                        });
                    /*</MOSTRAR INFORMACION>*/

                    /*<INTERVALOS>*/
                        const Intervalos = setInterval( () => {
                            let idUsuario = $('#update-id-door2door').val();
                            let estatus   = $('#update-estatus-door2door').val();
                            const FunSelectFullAPI = SelectFullAPI(idUsuario, estatus).
                            then( (result) => { console.log(result);
                                if(result){
                                    if(result.message == 'Good'){
                                        let Arrays = result.information;
                                        let campo  = ''; 
                                        let idUsuario = $('#update-id-door2door').val();
                                        if(Arrays.length > 0){
                                            for(let i = 0; i<Arrays.length; i++){
                                                if(Arrays[i].idGMensaje != 0){
                                                    if(Arrays[i].idUsuarioReceptor ==  idUsuario){
                                                        campo += `
                                                        <div class="d-flex flex-row justify-content-start">
                                                            <img src="${Arrays[i].UsuarioEmisorImagen}" class="img-circle elevation-2" style="width:45px;height:100%;">
                                                            <div>
                                                                <p class="small ms-1 mb-3 rounded-1 text-primary">${Arrays[i].UsuarioEmisor}</p>
                                                                <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;color;black;">${Arrays[i].mensaje}</p>
                                                                <p class="small ms-3 mb-3 rounded-3 text-muted">${Arrays[i].fecha}</p>
                                                            </div>
                                                        </div>
                                                    
                                                    
                                                        `;
                                                    }else{
                                                        campo += `
                                                        <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                                                            <div>
                                                                <p class="small ms-1 mb-3 rounded-1 text-primary">${Arrays[i].UsuarioEmisor}</p>
                                                                <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">${Arrays[i].mensaje}</p>                                                    
                                                                <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">${Arrays[i].fecha}</p>
                                                            </div>
                                                            <img src="${Arrays[i].UsuarioEmisorImagen}" class="img-circle elevation-2" style="width:45px;height:100%;">
                                                        </div>
                                                    
                                                        `;
                                                    }
                                                }else{
                                                    if(Arrays[i].idUsuarioReceptor ==  idUsuario){
                                                        campo += `
                                                        <div class="d-flex flex-row justify-content-start">
                                                            <img src="${Arrays[i].UsuarioEmisorImagen}" class="img-circle elevation-2" style="width:45px;height:100%;">
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
                                                            <img src="${Arrays[i].UsuarioEmisorImagen}" class="img-circle elevation-2" style="width:45px;height:100%;">
                                                        </div>
                                                    
                                                        `;
                                                    }
                                                }
                                                
                                            }
                                            $('#update-chat-door2door').html(campo);
                                            $("#update-chat-door2door").animate({ scrollTop: $('#update-chat-door2door')[0].scrollHeight}, 100);
                                        }else{
                                            $('#update-chat-door2door').html('');
                                        }
                                        
                                    }
                                }
                            });
                        },2000);
                    /*</INTERVALOS>*/

                    /*<LEMPEAR>*/
                        $('#button-back-crate-door2door').on( 'click',()=> { clearInterval(Intervalos); });
                    /*</LEMPEAR>*/
                });  

            }     
        /*</Construccion del la tabla>*/

        /*<Creamos un datatable>*/
            $('#table-main-door2door').DataTable(DataTableV);   
        /*</Creamos un datatable>*/                      
    }
    /*<export>*/
        export default Show;
    /*</export>*/
/*</Show>*/   
