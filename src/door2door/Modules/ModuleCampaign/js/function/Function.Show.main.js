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

    import DataTableV           from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
    import SelectFullVisitas    from '../API/API.SelectFull.Visitas.main.js';


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

                    let FECHA           = Information[i].fecha.split(' ');
                    let IdMostrar       = '';
                    let style           = '';
                    let Abrir           = '';
                    let Pausado         = '';
                    let Reanudar        = '';
                    let Cerrar        = '';
                    let Cancelar        = '';


                    if(     Information[i].estatus == 'PENDIENTE'  ){  IdMostrar = 'PENDIENTE';   style = 'color:#ffcc00;';   }
                    else if(Information[i].estatus == 'CONFIRMADA' ){  IdMostrar = 'CONFIRMADA';   style = 'color:#22bb33;';  }
                    else if(Information[i].estatus == 'CONTRATO'   ){  IdMostrar = 'CONTRATO';     style = '';                }
                    else if(Information[i].estatus == 'INCOMPLETA' ){  IdMostrar = 'INCOMPLETA';   style = 'color:#ff9966;';  }
                    else if(Information[i].estatus == 'RECHAZADA'  ){  IdMostrar = 'RECHAZADA';    style = 'color:red;';      }

                    if(Information[i].estatus == 'PAUSADA'      ){ 
                        Pausado =  ` <img  class="cursor" 
                                        title="Reaunudar" 
                                        onclick="ButtonReaunudar(${Information[i].idCampana});" 
                                        src="/d2dSocioWeb/Modules/ModulesImage/reanudar.png" 
                                        style="width:30px;height:30px" >  `; 
                    }else if(Information[i].estatus == 'ABIERTA'     ){  
                        /*<Cerrar>*/
                            Reanudar =  `<img  class="cursor" 
                                            title="Pausar" 
                                            onclick="ButtonPausar(${Information[i].idCampana});" 
                                            src="/d2dSocioWeb/Modules/ModulesImage/pausar.png" 
                                            style="width:30px;height:30px" >   `; 

                            Cerrar =  `<img  class="cursor" 
                                            title="Cerrar" 
                                            onclick="ButtonCerrar(${Information[i].idCampana});" 
                                            src="/d2dSocioWeb/Modules/ModulesImage/cerrado.png" 
                                            style="width:35px;height:35px" >   `; 
                        /*</Cerrar>*/
                    }else if(Information[i].estatus == 'BORRADOR'     ){
                        Cancelar    =  `<img  class="cursor" 
                                            title="Cerrar" 
                                            onclick="ButtonCancelar(${Information[i].idCampana});" 
                                            src="/d2dSocioWeb/Modules/ModulesImage/cancelacion.png" 
                                            style="width:25px;height:25px" >   `; 
                        Abrir       =  `<img  class="cursor" 
                                            title="Abrir" 
                                            onclick="ButtonAbrir(${Information[i].idCampana});" 
                                            src="/d2dSocioWeb/Modules/ModulesImage/abrir.png" 
                                            style="width:25px;height:25px" >   `; 
                    }
                    
                    record =  `
                            <tr>
                                <td style="width:50px;vertical-align:middle;" class="text-justify">${Information[i].folio}</td>

                                <td style="width:150px;vertical-align:middle;" class="text-justify">${Formato(FECHA[0])}</td>
                                <td style="width:250px;vertical-align:middle;" class="text-justify">${Information[i].nombre}</td>   
                                <td style="width:300px;vertical-align:middle;" class="text-justify">${Information[i].NombreSocio+' '+Information[i].ApellidoSocio}</td>    
                                <td style="width:150px;vertical-align:middle;" class="text-justify">${Information[i].tipoCampana}</td>     
                                <td style="width:150px;vertical-align:middle;${style}" class="text-justify"><strong>${Information[i].estatus}</strong></td>      
                                <td style="width:280px;vertical-align:middle;">
                                    <center>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <img    class="mostrar-visitas-deudores cursor "   
                                                        title="Mostrar " 
                                                        onclick="ButtonUpdate(
                                                                     ${Information[i].idCampana},
                                                                     ${Information[i].folio},
                                                                    '${Information[i].fecha}',
                                                                    '${Information[i].nombre}',
                                                                    '${Information[i].descripcion}',
                                                                    '${Information[i].tipoCampana}',                                                            
                                                                    '${Information[i].descripcionRecoleccion}',
                                                                    '${Information[i].estatus}',
                                                                    '${Information[i].NombreSocio}',
                                                                    '${Information[i].ApellidoSocio}',
                                                                    
                                                                );" 
                                                        src="/d2dSocioWeb/Modules/ModulesImage/mostrar.png"    
                                                        style="width:30px;height:30px" >
                                            </div>
                                            <div class="col-sm-2">
                                                ${Pausado}
                                            </div>
                                            <div class="col-sm-2">
                                                ${Reanudar}                                                 
                                            </div>
                                            <div class="col-sm-2">
                                               ${Cerrar} 
                                            </div>
                                            <div class="col-sm-2">
                                                ${Abrir} 
                                            </div>
                                            <div class="col-sm-2">
                                                ${Cancelar} 
                                            </div>
                                        </div>
                                       
                                    </center>                     
                                </td>
                            </tr> `;  
                    TableBody +=  record;
                }
                $('#table-main-door2door-informacion').html(TableBody);
                
               
               
              
                    
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
    const arrayVacio = (arr) => !Array.isArray(arr) || arr.length === 0;


        /*<export>*/
        export default Show;
    /*</export>*/
/*</Show>*/   
