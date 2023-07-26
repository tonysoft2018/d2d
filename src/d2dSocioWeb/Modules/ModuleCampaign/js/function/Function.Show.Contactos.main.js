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


    const Show = async (Information) => { 

        /*<Destruimos el un datatable>*/  
            $('#table-contactos-door2door').dataTable().fnDestroy();   
            $('#table-contactos-door2door-informacion').html('');
        /*<Destruimos el un datatable>*/  

        /*<Construccion del la tabla>*/ 

            let record = '';
            let TableBody= ''; 
            
            if(Information.length > 0){ 
                for(let i = 0; i <Information.length; i++) {

                  

                    record =  `
                            <tr>
                                
                                <td style="width:250px;vertical-align:middle;" class="text-justify">${Information[i].nombre}</td>   
                                <td style="width:350px;vertical-align:middle;" class="text-justify">${Information[i].telefono}</td>    
                            
                                <td style="width:220px;vertical-align:middle;">
                                    <center>
                                        <div class="row">                                            
                                            <div class="col-sm-112">
                                                <img  class="cursor" 
                                                    title="Eliminar" 
                                                    onclick="ButtonEliminarContactos( ${Information[i].idContacto}  );" 
                                                    src="/d2dSocioWeb/Modules/ModulesImage/basura.png" 
                                                    style="width:30px;height:30px" > 
                                            </div>
                                        </div>
                                        
                                    </center>                     
                                </td>
                            </tr> `;  
                    TableBody +=  record;
                }
                

                
                $('#table-contactos-door2door-informacion').html(TableBody)   
            }     
        /*</Construccion del la tabla>*/

        /*<Creamos un datatable>*/
            $('#table-contactos-door2door').DataTable(DataTableV);   
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
