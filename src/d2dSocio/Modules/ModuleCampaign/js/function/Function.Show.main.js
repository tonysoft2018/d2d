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

    import DataTableV           from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
    import SelectFullVisitas    from '../API/API.SelectFull.Visitas.main.js';


    const Show = async (Information) => { 

        

        /*<Construccion del la tabla>*/ 

            let record = '';
            let TableBody= ''; 
            
            if(Information.length > 0){ 
                for(let i = 0; i <Information.length; i++) {

                    let FECHA           = Information[i].fecha.split(' ');
                    let IdMostrar       = '';
                    let style           = '';
                    let Rechazado       = '';
                    let Pausado         = '';
                    let Reanudar        = '';
                    let Cerrar        = '';
                    let Cancelar        = '';


                    if(     Information[i].estatus == 'PENDIENTE'  ){  IdMostrar = 'PENDIENTE';   style = 'color:#ffcc00;';   }
                    else if(Information[i].estatus == 'CONFIRMADA' ){  IdMostrar = 'CONFIRMADA';   style = 'color:#22bb33;';  }
                    else if(Information[i].estatus == 'CONTRATO'   ){  IdMostrar = 'CONTRATO';     style = '';                }
                    else if(Information[i].estatus == 'INCOMPLETA' ){  IdMostrar = 'INCOMPLETA';   style = 'color:#ff9966;';  }
                    else if(Information[i].estatus == 'RECHAZADA'  ){  IdMostrar = 'RECHAZADA';    style = 'color:red;';      }

                    if(Information[i].estatus == 'PAUSADA'      ){ 
                        Pausado =  `    <div class="row" style="margin-bottom:3px;margin-top:10px;">
                                            <div class="col-sm-12">
                                                <a type="button" 
                                                    class="btn btn-success btn-block evento-mostra-mapa-sugerencias"  
                                                    onclick="ButtonReaunudar(${Information[i].idCampana});" 
                                                    >Reanudar</a>
                                            </div>
                                        </div>  `; 
                    }else if(Information[i].estatus == 'ABIERTA'     ){  
                        /*<Cerrar>*/
                            Reanudar =  `   <div class="row" style="margin-bottom:3px;margin-top:10px;">
                                                <div class="col-sm-12">
                                                    <a type="button" 
                                                        class="btn btn-warning btn-block evento-mostra-mapa-sugerencias"  
                                                        onclick="ButtonPausar(${Information[i].idCampana});" 
                                                        >Pausar</a>
                                                </div>
                                            </div>  `; 

                            Cerrar =  ` <div class="row" style="margin-bottom:3px;margin-top:10px;">
                                            <div class="col-sm-12">
                                                <a type="button" 
                                                    class="btn btn-secondary btn-block evento-mostra-mapa-sugerencias"  
                                                    onclick="ButtonCerrar(${Information[i].idCampana});" 
                                                    >Cerrar</a>
                                            </div>
                                        </div> `; 
                        /*</Cerrar>*/
                    }else if(Information[i].estatus == 'BORRADOR'     ){
                        Cancelar =  `   <div class="row" style="margin-bottom:3px;margin-top:10px;">
                                            <div class="col-sm-12">
                                                <a type="button" 
                                                    class="btn btn-danger btn-block evento-mostra-mapa-sugerencias"   
                                                  
                                                    onclick="ButtonCancelar(${Information[i].idCampana});" 
                                                    >Cancelar</a>
                                            </div>
                                        </div>  `; 
                    }
                    record =  `
                            <div class="row" style="border: 1px solid #000;margin:2px;border-radius: 15px;">
                                <div class="col-7">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Folio:</label> ${Information[i].folio}                                 </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Fecha creacion:</label> ${Formato(FECHA[0])}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <label>Tipo:</label> ${Information[i].tipoCampana}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <label>Numero de contactos:</label> ${Information[i].numeroContactos}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <label>Estatus:</label> ${Information[i].estatus}
                                        </div>
                                    </div>

                                </div>
                                <div class="col-5">
                                    ${Cancelar}
                                    ${Pausado}
                                    ${Reanudar}
                                    <div class="row" style="margin-bottom:3px;margin-top:10px;">
                                        <div class="col-sm-12">
                                            <a type="button" 
                                                class="btn btn-info btn-block mostrar-visitas-deudores"   
                                                id="button-create-door2door" 
                                                onclick="ButtonUpdate(
                                                    ${Information[i].idCampana},
                                                    ${Information[i].folio},
                                                    '${Information[i].fecha}',
                                                    '${Information[i].nombre}',
                                                    '${Information[i].descripcion}',
                                                    '${Information[i].tipoCampana}',                                                            
                                                    '${Information[i].descripcionRecoleccion}',
                                                    '${Information[i].estatus}',
                                                    '${Information[i].NombreSocio}',
                                                    '${Information[i].ApellidoSocio}',
                                                
                                             );" 
                                                >Ver contactos</a>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                     `;  
               
                    TableBody +=  record;
                }
                $('#Information-main').html(TableBody);
                
               
                setTimeout( () => {
                    $('.mostrar-visitas-deudores').on('click', () => {
                        let estatus =  $('#update-estatus-door2door').val();

                        if( estatus  != 'BORRADOR' && estatus  !=  'RECHAZADA' ){
                            let idCampana =  $('#update-id-door2door').val();
                            const ResultSFV =  SelectFullVisitas(idCampana). 
                            then( (result) => { console.log(result);
                                if(result){
                                    if(result.message == 'Good'){

                                        let Arrays = result.information;
                                        let record = '';
                                        let TableBody ='';
                                        $('#Information-visitas-main').html("");
                                        

                                        if(Arrays.length > 0){
                                            for(let i = 0; i <Arrays.length; i++) {

                                                let FECHA = Arrays[i].fecha.split(' ');
                                                record =  `
                                                        <div class="row" style="border: 1px solid #000;margin:2px;border-radius: 15px;">
                                                            <div class="col-7">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <label>Domicilio:</label> ${Arrays[i].calle}                                 </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <label>No visitas</label> ${Formato(FECHA[0])}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                    <label>Estatus:</label> ${Arrays[i].estatus}
                                                                    </div>
                                                                </div>
                                                                
                            
                                                            </div>
                                                            <div class="col-5">
                                                                <div class="row" style="margin-bottom:3px;margin-top:10px;">
                                                                    <div class="col-sm-12">
                                                                        <a type="button" 
                                                                            class="btn btn-info btn-block evento-mostra-mapa-sugerencias"   
                                                                            id="button-create-door2door" 
                                                                            onclick="ButtonDetalleVisita( 
                                                                                '${Arrays[i].SocioVisitador}', 
                                                                                '${Arrays[i].calle}', 
                                                                                '${Arrays[i].codigoPostal}', 
                                                                                '${Arrays[i].colonia}', 
                                                                                '${Arrays[i].deuda}', 
                                                                                '${Arrays[i].estatus}', 
                                                                                '${Arrays[i].fecha}', 
                                                                                '${Arrays[i].noExterior}', 
                                                                                '${Arrays[i].noInterior}', 
                                                                                '${Arrays[i].nombre}',
                                                                                '${Arrays[i].telefono}',
                                                                                '${Arrays[i].email}'
                                                                        );"            
                                                                            >Detalle</a>
                                                                    </div>
                                                                </div>
                                                            
                                                            </div>
                                                        </div>
                                                `;  
                                   
                                               
                                                TableBody +=  record;
                                            }
                                            $('#Information-visitas-main').html(TableBody);
                                        }
                                      
                                        
                                    }
                                }
                            
                            });
                        }
                    });
                },500);
              
                    
            }     
        /*</Construccion del la tabla>*/

                     
    }


    const  Formato = (texto) =>{
        return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
    }
    const  FormatoHora = (texto) =>{
        return texto.replace(/^(\d{4}):(\d{2}):(\d{2})$/g,'$3:$2');
    }
    const arrayVacio = (arr) => !Array.isArray(arr) || arr.length === 0;


        /*<export>*/
        export default Show;
    /*</export>*/
/*</Show>*/   
