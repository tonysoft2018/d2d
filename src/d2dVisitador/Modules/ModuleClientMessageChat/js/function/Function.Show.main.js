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
        /*<Construccion del la tabla>*/ 
            let record = '';
            let TableBody= ''; 

            console.log(Information)
            if(Information.length > 0){ 

                for(let i = 0; i <Information.length; i++) {

                    let FECHA = Information[i].fecha.split(' ');

                    if(Information[i].mensajes != '%#NO_TIENE_MENSAJE#%'){
                        record =  `
                                    <div class="row" style="border: 1px solid #000;margin:2px;">
                                        <div class="col-7">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                Origen: ${Information[i].nombres} 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    Fecha: ${Formato(FECHA[0]) +' '+FECHA[1]}
                                                </div>
                                            </div>                      

                                        </div>
                                        <div class="col-5">
                                            <div class="row" style="margin-bottom:3px;margin-top:10px;">
                                                <div class="col-sm-12">
                                                    <a type="button" 
                                                        class="btn btn-success btn-block buscar-mensajes-usuario"  
                                                        onclick="MensjaeMostra(
                                                                  ${Information[i].idUsuario},
                                                                 '${Information[i].nombres}', 
                                                                 '${Information[i].apellidos}', 
                                                            );"                                                   
                                                        >Mensaje</a>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                `;  
                                TableBody +=  record;
                    }  
                }
                $('#mensajes-main').html(TableBody);
                $('.buscar-mensajes-usuario').on('click', () => {
                    setTimeout( () => {
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
                                    }else{
                                        $('#update-chat-door2door').html('');
                                    }
                                    
                                }
                            }
                        });
                        setInterval( () => {
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
                                            }else{
                                                $('#update-chat-door2door').html('');
                                            }
                                            
                                        }
                                    }
                                });
                        },5000);
                    },500);
                });  

            }     
        /*</Construccion del la tabla>*/

        /*<Creamos un datatable>*/
            $('#table-main-door2door').DataTable(DataTableV);   
        /*</Creamos un datatable>*/                      
    }
    
    const  Formato = (texto) =>{
        return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
    }
    const  FormatoHora = (texto) =>{
        return texto.replace(/^(\d{4}):(\d{2}):(\d{2})$/g,'$3:$2');
    }
    /*<export>*/
        export default Show;
    /*</export>*/
/*</Show>*/   
