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

/*<import>*/    
    import SelectFullVisits         from '../API/API.SelectFull.Visits.main.js';
    import DataTableV               from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
    import ShowVisits               from './Function.Show.Visits.main.js';
/*</import>*/    

/*<Create>*/           
const Data = async(ContadorFolio) => { 
    let fecha   = new Date(); 
    let mes     = fecha.getMonth()+1; 
    let dia     = fecha.getDate(); 
    let ano     = fecha.getFullYear(); 
    if(dia<10)
        dia     ='0'+dia; 
    if(mes<10)
        mes     ='0'+mes 
    let FechaFinal      = ano+"-"+mes+"-"+dia;

    console.log(FechaFinal);
    console.log(ContadorFolio);
    $('#crear-fecha-inicio-door2door').val(FechaFinal); 
    $('#crear-folio-inicio-door2door').val(ContadorFolio+1); 
    
    /*Consultar Visitas*/    
        const Result = SelectFullVisits().
        then((result)=> { console.log(result);
            if(result){
                if(result.message == 'Good'){
                    let Arrays = result.information;  
                    localStorage.setItem('JSON_VISITAS_PROCESO', JSON.stringify(Arrays))
                    const ResultShowVisits  = ShowVisits(Arrays);
                }else{

                }
            }else{
                
            }
        }).
        catch((err) => {  console.log(err);  });
    /*Consultar Visitas*/    
}
/*<export>*/
    export default Data;
/*</export>*/
/*</Create>*/  
