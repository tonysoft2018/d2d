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


    const Show = async (Information) => {   

        /*<Construccion del la tabla>*/ 
            let record = '';
            let TableBody= ''; 

            
            if(Information.length > 0){ 
                for(let i = 0; i <Information.length; i++) {
                    if(Information[i].mensajes != '%#NO_TIENE_MENSAJE#%'){
                        let FECHA = Information[i].fecha.split(' ');
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
                                                    class="btn btn-success btn-block"   
                                                    id="button-show-door2door" 
                                                    onclick="MensjaeMostra(
                                                        ${Information[i].idUsuario},
                                                       '${Information[i].nombres}', 
                                                       '${Information[i].apellidos}',
                                                       '${Information[i].mensajes}', 
                                                  );"       
                                                    >Ver mensaje</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                        </div>
                                    </div>
                                </div>
                                `;  
                                TableBody +=  record;
                    }

                             
                   
                }

                
                $('#Information-main').html(TableBody)   
            }     
        /*</Construccion del la tabla>*/

        /*<Creamos un datatable>*/
           // $('#table-main-door2door').DataTable(DataTableV);   
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
