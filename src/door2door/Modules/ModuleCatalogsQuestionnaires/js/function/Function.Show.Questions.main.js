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

    const ShowQuestions = async (Information) => { 

        
        /*<Destruimos el un datatable>*/  
            $('#table-questions-door2door').dataTable().fnDestroy();   
            $('#table-questions-door2door-informacion').html('');
        /*<Destruimos el un datatable>*/  

        /*<Construccion del la tabla>*/ 
            let record = '';
            let TableBody= ''; 

            if(Information.length > 0){ 
                
                for(let i = 0; i <Information.length; i++) {
                    let option = "";
                    if(Information[i].tipoPregunta == "ABIERTA"){
                        option =  `<select class="custom-select" 
                                            id="SELECTED-${i}" 
                                            onchange="SelectedTipoPreg(${i});" 
                                            style="background:#D1F0F5;" >
                                        <option value="ABIERTA" selected >ABIERTA</option>
                                        <option value="CERRADA" >CERRADA</option>
                                    </select> `;   
                    }else  if(Information[i].tipoPregunta == "CERRADA"){
                        option =  `<select class="custom-select" 
                                            id="SELECTED-${i}" 
                                            onchange="SelectedTipoPreg(${i});" 
                                            style="background:#D1F0F5;" >
                                        <option value="ABIERTA">ABIERTA</option>
                                        <option value="CERRADA" selected >CERRADA</option>
                                    </select> `;   
                    }else{
                        option =  `<select class="custom-select" 
                                        id="SELECTED-${i}" 
                                        onchange="SelectedTipoPreg(${i});" 
                                        style="background:#D1F0F5;" >
                                    <option value="ABIERTA">ABIERTA</option>
                                    <option value="CERRADA" >CERRADA</option>
                                </select> `;   
                    }
                    record =  `
                    <tr>
                        <td style="width:50px;vertical-align:middle;" >                    ${i+1}</td>
                        <td style="width:400px;vertical-align:middle;" class="text-justify">
                            <textarea type="text"   id="TextarePregunta-${i}" 
                                                    onchange="TextarePregunta(${i});"  
                                                    class="form-control" 
                                                        >${Information[i].pregunta}
                            </textarea>
                        </td>  
                        <td style="width:200px;"> 
                            ${option}                                    
                        </td>
                        <td style="width:50px;"> 
                            <img        class="cursor" 
                                        title="Eliminar" 
                                        onclick="ButtonDeletePregunta(${i});" 
                                        src="/door2door/Modules/ModulesImage/basura.png" 
                                        style="width:30px;height:30px" >
                        </td>
                    </tr> `;  
                    
                    TableBody +=  record;
                }
                localStorage.setItem('JSON_PREGUNTAS', JSON.stringify(Information));
                               
                $('#table-questions-door2door-informacion').html(TableBody);   
            }else{
                localStorage.setItem('JSON_PREGUNTAS', JSON.stringify([]));
            }     
        /*</Construccion del la tabla>*/

        /*<Creamos un datatable>*/
            console.log("res")
            $('#table-questions-door2door').DataTable(DataTableV);   
        /*</Creamos un datatable>*/                      
    }
    /*<export>*/
        export default ShowQuestions;
    /*</export>*/
/*</Show>*/   
