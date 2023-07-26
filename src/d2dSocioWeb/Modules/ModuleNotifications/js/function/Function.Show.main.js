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

    import DataTableV from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';

    import SelectFullAPI from '../API/API.SelectFull.Messages.main.js';

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
                                                            );" 
                                                    src="/d2dSocioWeb/Modules/ModulesImage/mostrar.png"    
                                                    style="width:30px;height:30px" >
                                    </center>                     
                                </td>
                            </tr> `;  
                    TableBody +=  record;
                }
                
                $('#table-main-door2door-informacion').html(TableBody); 

                $('.buscar-mensajes-usuario').on('click', () => {
                    setTimeout( () => {
                        let idUsuario = $('#update-id-door2door').val();
                        const FunSelectFullAPI = SelectFullAPI(idUsuario).
                        then( (result) => { console.log(result)
                            if(result){
                                if(result.message == 'Good'){
                                    let Arrays = result.information;
                                    let campo  = ''; 
                                    let idUsuario = $('#update-id-door2door').val();
                                    if(Arrays.length > 0){
                                        for(let i = 0; i<Arrays.length; i++){
                                            campo += `  <div class="d-flex flex-row justify-content-start">
                                                            <img src="${Arrays[i].UsuarioImagen}" class="img-circle elevation-2" style="width: 45px; height: 100%;">
                                                            <div>
                                                                <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;color;black;">${Arrays[i].mensaje}</p>
                                                                <p class="small ms-3 mb-3 rounded-3 text-muted">${Arrays[i].fecha}</p>
                                                            </div>
                                                        </div>`;
                                            
                                        }
                                        $('#update-chat-door2door').html(campo);
                                        $("#update-chat-door2door").animate({ scrollTop: $('#update-chat-door2door')[0].scrollHeight}, 100);
                                    }else{
                                        $('#update-chat-door2door').html('');
                                    }
                                    
                                }
                            }
                        });
                    },500);
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
