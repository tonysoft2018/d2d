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

    import DataTableV       from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
    import Cargando         from './Function.CargarInformacion.main.js';

    const DataTablesVar = {
        responsive: true,
        rowReorder: {    selector: 'td:nth-child(2)'},                        
        "language": {      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
        "paging": true,
        dom: 'lBfrtip',
        order: [[1, "desc"]],
        buttons: [  'excel', 'csv', 'pdf', 'print', 'copy'  ]
    }


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

                    let FECHA = Information[i].fecha.split(' ');
                    let IdMostrar = '';
                    let style = '';
                    let Rechazado = '';


                    if(     Information[i].estatus == 'PENDIENTE'  ){  IdMostrar = 'PENDIENTE';     style = 'color:#ffcc00;';  }
                    else if(Information[i].estatus == 'CONFIRMADA' ){  IdMostrar = 'CONFIRMADA';   style = 'color:#22bb33;';  }
                    else if(Information[i].estatus == 'CONTRATO'   ){  IdMostrar = 'CONTRATO';     style = '';                }
                    else if(Information[i].estatus == 'INCOMPLETA' ){  IdMostrar = 'INCOMPLETA';   style = 'color:#ff9966;';  }
                    else if(Information[i].estatus == 'RECHAZADA'  ){  IdMostrar = 'RECHAZADA';    style = 'color:red;';      }

                    if(Information[i].estatus != 'RECHAZADA'){

                        Rechazado =  `<img  class="cursor" 
                                                title="Eliminar" 
                                                onclick="ButtonEliminar( ${Information[i].idSolicitud} );" 
                                                src="/door2door/Modules/ModulesImage/rechazado.png" 
                                                style="width:30px;height:30px" >   `;
                    }

                    record =  `
                            <tr>                              
                                <td style="width:250px;vertical-align:middle;" class="text-justify">${ await  Formato(FECHA[0])}</td>
                                <td style="width:200px;vertical-align:middle;" class="text-justify">${Information[i].nombres}</td>   
                                <td style="width:200px;vertical-align:middle;" class="text-justify">${Information[i].apellidos}</td>    
                                <td style="width:200px;vertical-align:middle;" class="text-justify">${Information[i].email}</td>  
                                <td style="width:200px;vertical-align:middle;" class="text-justify">${Information[i].tipoPerfil}</td>     
                                <td style="width:200px;vertical-align:middle;${style}" class="text-justify"><strong>${Information[i].estatus}</strong></td>      
                                <td style="width:220px;vertical-align:middle;">
                                    <center>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img    class="cnuevo-evento-domicilio cursor mostrar-imagenes evento-mostra-mapa-sugerencias"  
                                                        title="Mostrar" 
                                                        id=""
                                                        onclick="ButtonUpdate(
                                                                     
                                                                    '${Information[i].idSolicitud}',
                                                                    '${Information[i].folio}',
                                                                    '${Information[i].fecha}',
                                                                    '${Information[i].estatus}',
                                                                    '${Information[i].idUsuario}',
                                                                    '${Information[i].usuario}',
                                                                    '${Information[i].imagen}',
                                                                    '${Information[i].nombres}',                                                            
                                                                    '${Information[i].apellidos}',
                                                                    '${Information[i].tipoPerfil}',
                                                                    '${Information[i].email}',


                                                                    '${Information[i].colonia}',
                                                                    '${Information[i].calle}',
                                                                    '${Information[i].noExterior}',
                                                                    '${Information[i].noInterior}',
                                                                    '${Information[i].codigoPostal}',
                                                                    '${Information[i].Municipio}',
                                                                    '${Information[i].Estado}',
                                                                    '${Information[i].Pais}',

                                                                    '${Information[i].banco}',
                                                                    '${Information[i].numeroCuenta}',
                                                                    '${Information[i].nombres} ${Information[i].apellidos}',


                                                                    '${Information[i].TipoDeVehiculo}',
                                                                     ${Information[i].latitud},
                                                                     ${Information[i].longitud}

                                                                );" 
                                                        src="/door2door/Modules/ModulesImage/mostrar.png"    
                                                        style="width:30px;height:30px" >
                                            </div>
                                            <div class="col-sm-6">
                                                ${Rechazado}
                                            </div>
                                        </div>
                                       
                                    </center>                     
                                </td>
                            </tr> `;  
                    TableBody +=  record;
                }         
                
                $('#table-main-door2door-informacion').html(TableBody);

                $('.mostrar-imagenes').on('click', () => {
                    setTimeout( () => {
                        const Result = Cargando();
                    }, 500);
                });
                
            }     
        /*</Construccion del la tabla>*/

        /*<Creamos un datatable>*/
            $('#table-main-door2door').DataTable(DataTablesVar);   
        /*</Creamos un datatable>*/                      
    }


    const   Formato = async (texto) =>{
        return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
    }
    const  FormatoHora = (texto) =>{
        return texto.replace(/^(\d{4}):(\d{2}):(\d{2})$/g,'$3:$2');
    }
        /*<export>*/
        export default Show;
    /*</export>*/
/*</Show>*/   
