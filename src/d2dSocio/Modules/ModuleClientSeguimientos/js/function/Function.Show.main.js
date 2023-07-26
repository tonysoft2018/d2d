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


import Selected from '../API/API.Selected.main.js';


    const Show = async (Information) => {   

        /*<Construccion del la tabla>*/ 
            let record = '';
            let TableBody= ''; 

            
            if(Information.length > 0){ 

                /*<Ordenamiento>*/
                   
                /*<Ordenamiento>*/
                for(let i = 0; i <Information.length; i++) {

                    
                    record =  `
                            <div class="row" style="border: 1px solid #000;margin:2px;border-radius: 15px;">
                                <div class="col-7">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Tipo:</label> ${Information[i].tipoVisita}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Domicilio:</label> ${Information[i].calle} No Exterior ${Information[i].noExterior} No Interior   ${Information[i].noInterior}
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            Numeros de visitas: ${Information[i].cantidadVisitas}
                                        </div>
                                    </div>

                                </div>
                                <div class="col-5">
                                    <div class="row" style="margin-bottom:3px;margin-top:10px;">
                                        <div class="col-sm-12">
                                           Estatus: ${Information[i].estatus}
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a type="button" 
                                                class="btn btn-success btn-block evento-mostra-mapa-sugerencias"   
                                                id="button-create-door2door" 
                                                onclick="ShowMap(  
                                                    ${Information[i].idContacto}, 
                                                   '${Information[i].tipoVisita}',                                                                
                                                    ${Information[i].latitud},
                                                    ${Information[i].longitud},
                                                    
                                                    ${Information[i].latitudVisitante},
                                                    ${Information[i].longitudVisitante}
                                                );"
                                                >Ver mapa</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             `;  

                             
                    TableBody +=  record;
                }

                
                $('#Information-main').html(TableBody);
                
               
            }     
        /*</Construccion del la tabla>*/

                       
    }
    /*<export>*/
        export default Show;
    /*</export>*/
/*</Show>*/   
