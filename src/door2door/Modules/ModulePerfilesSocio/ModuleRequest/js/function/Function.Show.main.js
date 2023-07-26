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

    let DataTableV =  {
        responsive: true,
        rowReorder: {    selector: 'td:nth-child(2)'},                        
        "language": {      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
        "paging": true,
        dom: 'lBfrtip',
        order: [[0, "desc"], [1, "desc"]],
        buttons: [  'excel', 'csv', 'pdf', 'print', 'copy',   ],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    };
    import Cargando         from './Function.CargarInformacion.main.js';


    const Show = async (Information) => { 

        /*<Destruimos el un datatable>*/  
            $('#table-main-solicitudes-door2door').dataTable().fnDestroy();   
            $('#table-main-solicitudes-door2door-informacion').html('');
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
                                                onclick="ButtonEliminarSolicitudes( ${Information[i].idSolicitud} );" 
                                                src="/door2door/Modules/ModulesImage/rechazado.png" 
                                                style="width:30px;height:30px" >   `;
                    }

                    record =  `
                            <tr>
                                <td style="width:250px;vertical-align:middle;" class="text-justify">${Formato(FECHA[0])}</td>
                                <td style="width:200px;vertical-align:middle;" class="text-justify">${Information[i].nombres}</td>   
                                <td style="width:200px;vertical-align:middle;" class="text-justify">${Information[i].apellidos}</td>    
                                <td style="width:200px;vertical-align:middle;" class="text-justify">${Information[i].tipoPerfil}</td>     
                                <td style="width:200px;vertical-align:middle;${style}" class="text-justify"><strong>${Information[i].estatus}</strong></td>      
                                <td style="width:220px;vertical-align:middle;">
                                    <center>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img    class="cursor mostrar-imagenes"  
                                                        title="Mostrar" 
                                                        id=""
                                                        onclick="ButtonUpdateSolicitudes(
                                                                     ${Information[i].idUsuario},
                                                                     ${Information[i].idSolicitud},
                                                                     ${Information[i].folio},
                                                                    '${Information[i].fecha}',
                                                                    '${Information[i].nombres}',
                                                                    '${Information[i].apellidos}',
                                                                    '${Information[i].tipoPerfil}',                                                            
                                                                    '${Information[i].estatus}',
                                                                    '${Information[i].usuario}',
                                                                    '${Information[i].imagen}',
                                                                    '${Information[i].TipoDeVehiculo}',
                                                                    '${Information[i].numeroCuenta}',

                                                                    
                                                                    
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
         
                
                $('#table-main-solicitudes-door2door-informacion').html(TableBody);


                $('.mostrar-imagenes').on('click', () => {
                    setTimeout( () => {
                        const Result = Cargando();
                    }, 500);
                });
                
            }     
        /*</Construccion del la tabla>*/

        /*<Creamos un datatable>*/
            $('#table-main-solicitudes-door2door').DataTable(DataTableV);   
        /*</Creamos un datatable>*/                      
    }


    const  Formato = (texto) =>{
        return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
    }
    const  FormatoHora = (texto) =>{
        return texto.replace(/^(\d{4}):(\d{2}):(\d{2})$/g,'$3:$2');
    }
        /*<export>*/
        export default Show;
    /*</export>*/
/*</Show>*/   
