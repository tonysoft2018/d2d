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

import SelectFullAPI from '../API/API.SelectFull.Messages.main.js';
import MensajeVisto from '../API/API.Mensaje.Visto.main.js';
const ShowMensajes = async (Information) => { 
 
    /*<Construccion del la tabla>*/ 
        let record = '';
        let TableBody= ''; 
        
        if(Information.length > 0){ 
            let Tamano = Information.length;
            $('#totalmensajes').html(Tamano);
            $('#totalmensajes-input').val(Tamano);
            
            for(let i = 0; i <Information.length; i++) {             
                let FECHA = Information[i].fecha.split(' ')
                record =  `
                    <a href="#" class="dropdown-item buscar-mensajes-usuario-mensaje-main" 
                        onclick="MostrarChatMain(
                             ${Information[i].idUsuario},
                             ${Information[i].idUsuarioEmisor},
                            '${Information[i].nombres}',
                            '${Information[i].apellidos}'
                            
                        )">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="${Information[i].imagen}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                ${Information[i].nombres} ${Information[i].apellidos}
                             
                                </h3>
                                <p class="text-sm">${Information[i].mensaje}</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>${Formato(FECHA[0])+' '+FormatoHora(FECHA[1]) }</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                        `;  
                TableBody +=  record;
            }
            $('#mensajesiniciales').html(TableBody);   

            $('.buscar-mensajes-usuario-mensaje-main').on('click', () => {
                setTimeout( () => {

                    let idUsuario = $('#show-id-mensajes-main-door2door').val();

                    const ResMensajeVisto = MensajeVisto(idUsuario).
                    then((result) => { console.log(result);
                        if(result){
                            if(result.message == 'Good'){

                                /*<Cambio de Cantidad>*/
                                    let TamanoM =   $('#totalmensajes-input').val();
                                    $('#totalmensajes').html(TamanoM-1);
                                    $('#totalmensajes-input').val(TamanoM-1);
                                /*<Cambio de Cantidad>*/
                                
                                const FunSelectFullAPI = SelectFullAPI(idUsuario).
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
                        
                },500);            
            });   
                
        }     
    /*</Construccion del la tabla>*/

                      
}


const  Formato = (texto) =>{
    return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
}
const  FormatoHora = (texto) =>{
    return texto.replace(/^(\d{4}):(\d{2}):(\d{2})$/g,'$3:$2');
}
const arrayVacio = (arr) => !Array.isArray(arr) || arr.length === 0;


    /*<export>*/
    export default ShowMensajes;
/*</export>*/
/*</Show>*/   
