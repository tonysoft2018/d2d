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
            $('#table-visits-door2door').dataTable().fnDestroy();   
            $('#table-visits-door2door-informacion').html('');
        /*<Destruimos el un datatable>*/  

        /*<Construccion del la tabla>*/ 
            let record = '';
            let TableBody= ''; 

            
            if(Information.length > 0){ 
                for(let i = 0; i <Information.length; i++) {
                    let Seleccionar = '';
                    if(Information[i].Seleccion == 0){
                        Seleccionar = `<input type="checkbox"  onclick="SelecionarVisitaProcesada(${i});"   id="item-lista-checkbox-${i}"  > `;
                    }else{
                        Seleccionar = `<input type="checkbox" checked  onclick="SelecionarVisitaProcesada(${i});"   id="item-lista-checkbox-${i}"  >`;
                    }

                    let Fecha = Information[i].fecha.split(' ');
                    record =  `
                                <tr>
                                    <td style="width:50px;vertical-align:middle;" >${Seleccionar}</td>
                                    <td style="width:150px;vertical-align:middle;" class="text-justify">${Information[i].Contacto}</td>
                                    <td style="width:100px;vertical-align:middle;" class="text-justify">${Information[i].telefono}</td>      
                                    <td style="width:100px;vertical-align:middle;" class="text-justify">${Formato(Fecha[0])+' '+FormatoHora(Fecha[1])}</td>        
                                    <td style="width:200px;vertical-align:middle;" class="text-justify">${Information[i].Visitador}</td>      
                                
                                </tr> `;  
                    TableBody +=  record;
                }

                
                $('#table-visits-door2door-informacion').html(TableBody)   
                
            }     
        /*</Construccion del la tabla>*/
            
        /*<Creamos un datatable>*/
            $('#table-visits-door2door').DataTable(DataTableV);   
        /*</Creamos un datatable>*/                      
    }
    
    /*<export>*/
        export default Show;
    /*</export>*/
/*</Show>*/   
const  Formato = (texto) =>{
    return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
  }
const  FormatoHora = (texto) =>{
    return texto.replace(/^(\d{4}):(\d{2}):(\d{2})$/g,'$3:$2');
}
  