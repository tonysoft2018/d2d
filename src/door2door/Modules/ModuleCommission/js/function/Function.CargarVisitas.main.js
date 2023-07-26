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
    const CargarVisitas = async(ContadorFolio) => { 
        /*Consultar Visitas*/    
            const Result = SelectFullVisits().
            then((result)=> { console.log(result);
                if(result){
                    if(result.message == 'Good'){
                        let Arrays = result.information;  
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
    export default CargarVisitas;
    /*</export>*/
/*</Create>*/  
