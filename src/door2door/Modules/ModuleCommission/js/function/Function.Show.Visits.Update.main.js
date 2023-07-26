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

const ShowUpdate = async (Information) => { 
     
    let Campo = '';
    let ArregloCampo = '';

    let ArraysDatos = Information;


    $('#table-visits-aceptar-door2door-informacion').html('');
    $('#table-visits-aceptar-door2door').dataTable().fnDestroy();  

    let contador  = ArraysDatos.length;
    let i = 0;

    while(i < contador){
        let Fecha = ArraysDatos[i].fecha.split(' ');
        let Seleccionar = '';
        if(ArraysDatos[i].Seleccion == 0){
            Seleccionar = `<input type="checkbox"  onclick="SelecionarVisitaAceptar(${i});"   id="item-lista-checkbox-${i}"  > `;
        }else{
            Seleccionar = `<input type="checkbox" checked  onclick="SelecionarVisitaAceptar(${i});"   id="item-lista-checkbox-${i}"  > `;
        }
        Campo =  `
                    <tr>
                    
                        <td style="width:250px;vertical-align:middle;" class="text-justify">${ArraysDatos[i].Contacto}</td>
                        <td style="width:200px;vertical-align:middle;" class="text-justify">${ArraysDatos[i].telefono}</td>      
                        <td style="width:200px;vertical-align:middle;" class="text-justify">${Formato(Fecha[0])+' '+FormatoHora(Fecha[1])}</td>        
                        <td style="width:200px;vertical-align:middle;" class="text-justify">${ArraysDatos[i].Visitador}</td>   
                        <td style="text-align:right;width:50px;vertical-align:middle;" > ${ArraysDatos[i].Comicion}  </td>   
                        <td>${Seleccionar}</td>
                    
                    </tr>
                `;  
                ArregloCampo += Campo
        i = i +1;
    }
    
    $('#table-visits-aceptar-door2door-informacion').html(ArregloCampo);
    $('#table-visits-aceptar-door2door').DataTable(DataTableV);          
}

/*<export>*/
    export default ShowUpdate;
/*</export>*/
/*</Show>*/   
const  Formato = (texto) =>{
return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
}
const  FormatoHora = (texto) =>{
return texto.replace(/^(\d{4}):(\d{2}):(\d{2})$/g,'$3:$2');
}
