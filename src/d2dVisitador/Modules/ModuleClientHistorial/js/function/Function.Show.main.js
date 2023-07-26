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

                    let FECHA = Information[i].fecha.split(' ');

                    record =  `
                            <div class="row" style="border: 1px solid #000;margin:2px;">
                                <div class="col-7">
                                    <div class="row">
                                        <div class="col-sm-12">
                                           Domicilio: ${Information[i].calle} No Exterior ${Information[i].noExterior} No Interior   ${Information[i].noInterior}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            Tipo: ${Information[i].tipoVisita}
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
                                            ${Information[i].estatus}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            ${Comentarios(Information[i].estatus,Information[i].comentarios )}
                                        </div>
                                    </div>
                                </div>
                             </div>
                             `;  

                             
                    TableBody +=  record;
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
    const Comentarios = (status,comentarios ) => {
        if(status == 'RECHAZADA'){
            return ` <a type="button" 
                            class="btn btn-success btn-block buscar-mensajes-usuario"  
                            onclick="ComentariosMostra( '${comentarios }' );"                                                   
                            >Ver comentarios</a>`;
        }else{
            return '';
        }
    }
    /*<export>*/
        export default Show;
    /*</export>*/
/*</Show>*/   
