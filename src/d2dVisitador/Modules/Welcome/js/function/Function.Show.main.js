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

    import DataTableV                       from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
    import functionSelectFullAPIPaises      from '../../../ModuleCatalogsPaises/js/API/API.SelectFull.main.js';
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
                                <td style="width:250px;vertical-align:middle;" class="text-justify">${Information[i].nombre}</td>
                                <td style="width:200px;vertical-align:middle;" class="text-justify">${Information[i].Pais}',</td>        
                                <td style="width:220px;vertical-align:middle;">
                                    <center>
                                        <img        class="cursor"  
                                                    title="Mostrar" 
                                                    onclick="ButtonShow(
                                                                 ${Information[i].idEstado},
                                                                '${Information[i].nombre}',
                                                                '${Information[i].Pais}',
                                                            );" 
                                                    src="/d2dVisitador/Modules/ModulesImage/mostrar.png"    
                                                    style="width:30px;height:30px" >

                                        <img        class="button-actualizar cursor"  
                                                    title="Editar"  
                                                    onclick="ButtonUpdate(
                                                                 ${Information[i].idEstado},
                                                                '${Information[i].nombre}',
                                                                '${Information[i].idPais}',
                                                                );"
                                                    src="/d2dVisitador/Modules/ModulesImage/editar.png" 
                                                    style="width:30px;height:30px">  

                                        <img        class="cursor" 
                                                    title="Eliminar" 
                                                    onclick="ButtonDelete(
                                                                ${Information[i].idEstado}
                                                            );" 
                                                    src="/d2dVisitador/Modules/ModulesImage/basura.png" 
                                                    style="width:30px;height:30px" >
                                    </center>                     
                                </td>
                            </tr> `;  
                    TableBody +=  record;
                }
             

                
                $('#table-main-door2door-informacion').html(TableBody);   
                $('.button-actualizar').on( 'click', ()=> { 
                    $('#update-pais-door2door').html('');
                    setTimeout( ()=> {
                        
                        const functionSFAP = functionSelectFullAPIPaises().
                        then( (result) => {   console.log(result);
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/
                                        let ArraysPaises = [];
                                        ArraysPaises = result.information;   
        
                                        let Option = '';
                                        let Options = '';
                                        let idPais =  $('#update-idpais-door2door').val();
                                    
                                        for(let i = 0; i<ArraysPaises.length; i++ ){
                                            if(idPais == ArraysPaises[i].idPais){   
                                                Option = '<option value="'+ArraysPaises[i].idPais+'" selected  >'+ArraysPaises[i].nombre+'</option>';
                                            }else{
                                                Option = '<option value="'+ArraysPaises[i].idPais+'"   >'+ArraysPaises[i].nombre+'</option>';
                                            }                                            
                                            Options += Option;             
                                        }
                                        $('#update-pais-door2door').html(Options);
        
                                        
                                    /*<Consulta exitosa>*/                        
                                }else{
                                /*<Error de query>*/ 
                                        $('#message-error-door2door').html("");
                                        $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                        $('#modal-message-error-door2door').modal('show');
                                    /*</Error de query>*/  
                                }       
                            }                           
                        }).catch( (err) => { 
                            /*<Error de query>*/ 
                                $('#message-error-door2door').html("");
                                $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                $('#modal-message-error-door2door').modal('show');
                            /*</Error de query>*/  
                        });
                    }, 500);
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
