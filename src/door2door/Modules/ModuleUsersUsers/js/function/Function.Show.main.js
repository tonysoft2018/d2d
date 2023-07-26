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
                                <td style="width:50px;vertical-align:middle;" >                    ${i+1}</td>
                                <td style="width:250px;vertical-align:middle;" class="text-justify">${Information[i].usuario}</td>
                                <td style="width:200px;vertical-align:middle;" class="text-justify">${Information[i].nombres}</td>   
                                <td style="width:200px;vertical-align:middle;" class="text-justify">${Information[i].apellidos}</td>    
                                <td style="width:200px;vertical-align:middle;" class="text-justify">${Information[i].email}</td>         
                                <td style="width:220px;vertical-align:middle;">
                                    <center>
                                        

                                        <img        class="cursor"  
                                                    title="Editar"  
                                                    onclick="ButtonUpdate(
                                                                  ${Information[i].idUsuario},
                                                                 '${Information[i].usuario}',
                                                                 '${Information[i].nombre}',  
                                                                 '${Information[i].apellidos}',                                                                 '${Information[i].email}',
                                                                 '${Information[i].tipoUsuario}'
                                                                );"
                                                    src="/door2door/Modules/ModulesImage/editar.png" 
                                                    style="width:30px;height:30px">  

                                        <img        class="cursor" 
                                                    title="Eliminar" 
                                                    onclick="ButtonDelete(
                                                                ${Information[i].idUsuario}
                                                            );" 
                                                    src="/door2door/Modules/ModulesImage/basura.png" 
                                                    style="width:30px;height:30px" >
                                    </center>                     
                                </td>
                            </tr> `;  
                    TableBody +=  record;
                }

                
                $('#table-main-door2door-informacion').html(TableBody)   
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
