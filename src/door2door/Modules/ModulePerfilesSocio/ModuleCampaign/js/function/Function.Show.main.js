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

    import SelectFullVisitas    from '../API/API.SelectFull.Visitas.main.js';


    const Show = async (Information) => { 

        /*<Destruimos el un datatable>*/  
            $('#Campana-table-main-door2door').dataTable().fnDestroy();   
            $('#Campana-table-main-door2door-informacion').html('');
        /*<Destruimos el un datatable>*/  

        /*<Construccion del la tabla>*/ 

            let record = '';
            let TableBody= ''; 
            
            if(Information.length > 0){ 
                for(let i = 0; i <Information.length; i++) {

                    let FECHA           = Information[i].fecha.split(' ');
                    let style           = '';
                   

                    
                    record =  `
                            <tr>
                                <td style="width:50px;vertical-align:middle;" class="text-justify">${Information[i].folio}</td>

                                <td style="width:150px;vertical-align:middle;" class="text-justify">${Formato(FECHA[0])}</td>
                                <td style="width:250px;vertical-align:middle;" class="text-justify">${Information[i].nombre}</td>   
                                <td style="width:300px;vertical-align:middle;" class="text-justify">${Information[i].NombreSocio+' '+Information[i].ApellidoSocio}</td>    
                                <td style="width:150px;vertical-align:middle;" class="text-justify">${Information[i].tipoCampana}</td>     
                                <td style="width:150px;vertical-align:middle;${style}" class="text-justify"><strong>${Information[i].estatus}</strong></td>      
                                <td style="width:220px;vertical-align:middle;">
                                    <center>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img    class="mostrar-visitas-deudores cursor "   
                                                        title="Mostrar " 
                                                        onclick="ButtonUpdateCampanas(
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
                                                        src="/door2door/Modules/ModulesImage/mostrar.png"    
                                                        style="width:30px;height:30px" >
                                            </div>
                                            
                                        </div>
                                       
                                    </center>                     
                                </td>
                            </tr> `;  
                    TableBody +=  record;
                }
                $('#Campana-table-main-door2door-informacion').html(TableBody);
                
               
                setTimeout( () => {
                    $('.mostrar-visitas-deudores').on('click', () => {
                        let estatus =  $('#Campana-update-estatus-door2door').val();
                        if( estatus  != 'BORRADOR' && estatus  !=  'RECHAZADA' ){

                            let idCampana =  $('#update-id-door2door').val();
                            console.log("########");
                            console.log(idCampana);
                            const ResultSFV =  SelectFullVisitas(idCampana). 
                            then( (result) => { console.log(result);
                                if(result){
                                    if(result.message == 'Good'){

                                        let Arrays = result.information;
                                        let record = '';
                                        let TableBody ='';
                                        
                                        $('#Campana-table-visitas-door2door').dataTable().fnDestroy();  
                                        $('#Campana-table-visitas-door2door-informacion').html('');

                                        if(Arrays.length > 0){
                                            for(let i = 0; i <Arrays.length; i++) {

                                                let FECHA = Arrays[i].fecha.split(' ');
                                                record =  `
                                                            <tr>
                                                                <td style="width:50px;vertical-align:middle;" class="text-justify">${Arrays[i].nombre}</td>
                                                                <td style="width:50px;vertical-align:middle;" class="text-justify">${Arrays[i].telefono}</td>
                                                                <td style="width:50px;vertical-align:middle;" class="text-justify">${Formato(FECHA[0])}</td>
                                                                <td style="width:50px;vertical-align:middle;" class="text-justify">${Arrays[i].estatus}</td>
                                                                <td>
                                                                
                                                                    <div class="row">
                                                                        <div classs="col-sm-6">
                                                                            <img    class="cursor "   
                                                                                    title="Mostrar "       
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
                                                                                    src="/door2door/Modules/ModulesImage/mostrar.png"   
                                                                                    style="width:30px;height:30px" > 
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                    `
                                                TableBody +=  record;
                                            }
                                            $('#Campana-table-visitas-door2door-informacion').html(TableBody);
                                            $('#Campana-table-visitas-door2door').dataTable(DataTableV);
                                        }
                                        $('#Campana-table-visitas-door2door-informacion').html(TableBody);
                                        $('#Campana-table-visitas-door2door').dataTable(DataTableV);
                                        
                                    }
                                }
                            
                            });
                        }
                    });
                },500);
              
                    
            }     
        /*</Construccion del la tabla>*/

        /*<Creamos un datatable>*/
            $('#Campana-table-main-door2door').DataTable(DataTableV);   
        /*</Creamos un datatable>*/                      
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
