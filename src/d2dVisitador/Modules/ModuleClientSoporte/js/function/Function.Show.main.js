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


    const Show = async (Information) => {   

        /*<Construccion del la tabla>*/ 
            let record = '';
            let TableBody= ''; 

            
            if(Information.length > 0){ 
                for(let i = 0; i <Information.length; i++) {

                    
                    record =  `
                            <div class="row" style="border: 1px solid #000;margin:2px;">
                                <div class="col-7">
                                    <div class="row">
                                        <div class="col-sm-12">
                                           Domicilio: ${Information[i].calle} No Exterior ${Information[i].noExterior} No Interior   ${Information[i].noInterior}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            Tipo: ${Information[i].tipoVisita}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            Distancia Klm: ${0+i}
                                        </div>
                                    </div>

                                </div>
                                <div class="col-5">
                                    <div class="row" style="margin-bottom:3px;margin-top:10px;">
                                        <div class="col-sm-12">
                                            <a type="button" 
                                                class="btn btn-success btn-block"   
                                                id="button-create-door2door" 
                                                >Ver mapa</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button     type="button" 
                                                        class="btn btn-warning btn-block"   
                                                        id="button-create-door2door" 
                                                >Seleccionar</button>
                                        </div>
                                    </div>
                                </div>
                             </div>
                             `;  

                             
                    TableBody +=  record;
                }

                
                $('#Information-main').html(TableBody)   
            }     
        /*</Construccion del la tabla>*/

        /*<Creamos un datatable>*/
           // $('#table-main-door2door').DataTable(DataTableV);   
        /*</Creamos un datatable>*/                      
    }
    /*<export>*/
        export default Show;
    /*</export>*/
/*</Show>*/   
