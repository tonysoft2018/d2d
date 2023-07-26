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
                    let TotalTamano = Information.length;
                    for (let i = 1; i < TotalTamano; i++ ) {
                        for (let j = 0; j < (TotalTamano - i); j++ ) 
                        {
                            if ( Information[ j ].distancia > Information[ j + 1 ].distancia ) {
                                
                                /*<Variables>*/
                                    let Aux_idContacto  = '';
                                    let Aux_latitud     = '';
                                    let Aux_longitud    = '';
                                    let Aux_tipoVisita  = '';
                                    let Aux_distancia   = '';
                                    
                                    let Aux_calle       = '';
                                    let Aux_noInterior  = '';
                                    let Aux_noExterior   = '';
                                /*<Variables>*/

                                /*<Primera Asicnacion Aux>*/
                                    Aux_idContacto  = Information[ j ].idContacto;
                                    Aux_latitud     = Information[ j ].latitud;
                                    Aux_longitud    = Information[ j ].longitud;
                                    Aux_tipoVisita  = Information[ j ].tipoVisita;
                                    Aux_distancia   = Information[ j ].distancia;

                                    Aux_calle       = Information[ j ].calle;
                                    Aux_noInterior  = Information[ j ].noInterior;
                                    Aux_noExterior  = Information[ j ].noExterior;                                    
                                /*</Primera Asicnacion Aux>*/

                                /*<Segunda Asicnacion j >*/
                                    Information[ j ].idContacto = Information[ j +1 ].idContacto;
                                    Information[ j ].latitud    = Information[ j +1 ].latitud;
                                    Information[ j ].longitud   = Information[ j +1 ].longitud;
                                    Information[ j ].tipoVisita = Information[ j +1 ].tipoVisita;
                                    Information[ j ].distancia  = Information[ j +1 ].distancia;

                                    Information[ j ].calle      = Information[ j +1 ].calle;
                                    Information[ j ].noInterior = Information[ j +1 ].noInterior;
                                    Information[ j ].noExterior = Information[ j +1 ].noExterior;
                                /*</Segunda Asicnacion j >*/

                                /*<Tercera Asicnacion j +1>*/
                                    Information[ j +1 ].idContacto = Aux_idContacto;
                                    Information[ j +1 ].latitud    = Aux_latitud;
                                    Information[ j +1 ].longitud   = Aux_longitud;
                                    Information[ j +1 ].tipoVisita = Aux_tipoVisita;
                                    Information[ j +1 ].distancia  = Aux_distancia; 

                                    Information[ j +1 ].calle       = Aux_calle; 
                                    Information[ j +1 ].noInterior  = Aux_noInterior; 
                                    Information[ j +1 ].noExterior  = Aux_noExterior; 
                                /*</Tercera Asicnacion j +1>*/
                            }
                        }
                    }
                    console.log(Information);
                /*<Ordenamiento>*/
                for(let i = 0; i <Information.length; i++) {

                    
                    record =  `
                            <div class="row" style="border: 1px solid #000;margin:2px;border-radius: 15px;">
                                <div class="col-7">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Domicilio:</label> ${Information[i].calle} No Exterior ${Information[i].noExterior} No Interior   ${Information[i].noInterior}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Tipo:</label> ${Information[i].tipoVisita}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <label>Distancia Km:</label> ${Information[i].distancia.toFixed(2)}
                                        </div>
                                    </div>

                                </div>
                                <div class="col-5">
                                    <div class="row" style="margin-bottom:3px;margin-top:10px;">
                                        <div class="col-sm-12">
                                            <a type="button" 
                                                class="btn btn-success btn-block evento-mostra-mapa-sugerencias"   
                                                id="button-create-door2door" 
                                                onclick="ShowMap(  
                                                    ${Information[i].idContacto}, 
                                                   '${Information[i].tipoVisita}',                                                                
                                                    ${Information[i].latitud},
                                                    ${Information[i].longitud},
                                                    ${Information[i].distancia.toFixed(2)}
                                                );"
                                                >Ver mapa</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button     type="button" 
                                                        class="btn btn-warning seleccciionar-visita btn-block"   
                                                        id="button-create-door2door" 
                                                        onclick="SelectedMap(  
                                                            ${Information[i].idContacto}, 
                                                           '${Information[i].tipoVisita}',                                                                
                                                            ${Information[i].latitud},
                                                            ${Information[i].longitud},
                                                            ${Information[i].distancia.toFixed(2)}
                                                        );"
                                                       
                                                >Seleccionar</button>
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
