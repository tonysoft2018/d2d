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


const ShowNotificaciones = async (Information) => { 
 
    /*<Construccion del la tabla>*/ 
        let record = '';
        let TableBody= ''; 
        
        if(Information.length > 0){ 
           
            $('#totalNotificaciones').html(Information.length);          
            $('#totalNotificacionessubmenu').html(Information.length+" notificaciones nuevas");  
            $('#totalNotificacionessubmenuTercero').html('<i class="fas fa-envelope mr-2"></i> '+Information.length+" Mensajes nuevos");          
            
            for(let i = 0; i<Information.length; i++){
                let FECHA = Information[i].fecha.split(' ');
                record += `
                            <div class="d-flex flex-row justify-content-start bg-info mostra-notificaciones" style="margin:5px;">
                                <div>
                                    <p class=" p-2 me-1 mb-1  rounded-3 "><strong> Origen:  </strong>${Information[i].nombres} ${Information[i].apellidos}</p>             
                                    <p class=" p-2 me-3 mb-1  rounded-3 "><strong> Mensage: </strong>${Information[i].mensaje}</p>                                                                    
                                    <p class=" p-2 me-3 mb-1  rounded-3 "><strong> Fecha:   </strong> ${Formato(FECHA[0])+' '+FormatoHora(FECHA[1]) }</p>
                                </div>                      
                            </div>  `;
            }
            $('#showchatnotificacionesmaindoor2door').html(record);

            $('#totalNotificacionessubmenuTercero').on('click', () => {
                let idUsuario = $('#show-id-mensajes-main-door2door').val();
                if(true){
                    let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();
                    $.ajax({
                        url: "/d2dVisitador/messages/api/controller.notificaciones.select.php",
                        type: 'post',
                        async: false,
                        dataType: "json",
                        data: { 
                            TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                            idUsuario:idUsuario 
                        }       
                    }).
                    then((result) => {
                        if(result){ console.log(result);
                            if(result.message == 'Good'){
                                $('#totalNotificaciones').html(0);    
                                $('#showchatnotificacionesmaindoor2door').html(''); 
                            }
                        }
                    })
                    .catch((err) => {

                    }); 
                }
            });
                
        }else{

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
        export default ShowNotificaciones;
    /*</export>*/
/*</Show>*/   
