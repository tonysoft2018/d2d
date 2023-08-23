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


    const Show = async (Information) => { 

        /*<Destruimos el un datatable>*/  
            let estatus = $('#update-estatus-door2door').val();
        /*<Destruimos el un datatable>*/  

        /*<Construccion del la tabla>*/ 

            let record = '';
            let TableBody= ''; 

            if(estatus == 'BORRADOR'){
                $('#table-contactos-door2door').show();
                $('#table-contactos-visitas-door2door').hide();

                $('#button-actualizar-contactos-door2door').show();
                $('#detalle-contactos-mostrar-door2door').hide();

                $('#button-cargar-contactos-door2door').show();
                $('#button-plantilla-contactos-door2door').show();

                /*<Atributios>*/
                    $('#actualizar-contactos-id-door2door').prop('disabled', false);
                    $('#actualizar-contactos-nombre-door2door').prop('disabled', false);
                    $('#actualizar-contactos-calle-door2door').prop('disabled', false);
                    $('#actualizar-contactos-colonia-door2door').prop('disabled', false);
                    $('#actualizar-contactos-noexterior-door2door').prop('disabled', false);
                    $('#actualizar-contactos-nointerior-door2door').prop('disabled', false);
                    $('#actualizar-contactos-codigopostal-door2door').prop('disabled', false);
                    $('#actualizar-contactos-entreCalle-door2door').prop('disabled', false);
                    $('#actualizar-contactos-instrucciones-door2door').prop('disabled', false);
                    $('#actualizar-contactos-telefono-door2door').prop('disabled', false);
                    $('#actualizar-contactos-email-door2door').prop('disabled', false);
                    $('#actualizar-contactos-pais-door2door').prop('disabled', false);
                    $('#actualizar-contactos-estado-door2door').prop('disabled', false);
                    $('#actualizar-contactos-municipio-door2door').prop('disabled', false);
                /*</Atributios>*/

                $('#table-contactos-door2door').dataTable().fnDestroy();   
                $('#table-contactos-door2door-informacion').html('');
    
                if(Information.length > 0){ 
                    for(let i = 0; i <Information.length; i++) {

                    

                        record =  `
                                <tr>
                                    
                                    <td style="width:250px;vertical-align:middle;" class="text-justify">${Information[i].nombre}</td>   
                                    <td style="width:350px;vertical-align:middle;" class="text-justify">${Information[i].telefono}</td>    
                                
                                    <td style="width:220px;vertical-align:middle;">
                                        <center>
                                            <div class="row">                                            
                                            
                                                <div class="col-sm-3">
                                                    <img  class="cursor" 
                                                        title="Eliminar" 
                                                        onclick="ButtonEditarContactos( 
                                                            ${Information[i].idContacto},
                                                            '${Information[i].nombre}',
                                                            '${Information[i].calle}',
                                                            '${Information[i].noInterior}',
                                                            '${Information[i].noExterior}',
                                                            '${Information[i].codigoPostal}',
                                                            '${Information[i].colonia}',
                                                            '${Information[i].idMunicipio}',
                                                            '${Information[i].idEstado}',
                                                            '${Information[i].idPais}',
                                                            '${Information[i].entreCalle}',
                                                            '${Information[i].latitud}',
                                                            '${Information[i].longitud}',
                                                            '${Information[i].instrucciones}',
                                                            '${Information[i].telefono}',
                                                            '${Information[i].email}'
                                                        );" 
                                                        src="/d2dSocioWeb/Modules/ModulesImage/editar.png" 
                                                        style="width:30px;height:30px" > 
                                                </div>
                                                <div class="col-sm-3">
                                                    <img  class="cursor" 
                                                        title="Eliminar" 
                                                        onclick="ButtonEliminarContactos( ${Information[i].idContacto}  );" 
                                                        src="/d2dSocioWeb/Modules/ModulesImage/basura.png" 
                                                        style="width:30px;height:30px" > 
                                                </div>
                                            </div>
                                            
                                        </center>                     
                                    </td>
                                </tr> `;  
                        TableBody +=  record;
                    }             
                    $('#table-contactos-door2door-informacion').html(TableBody)   
                }     
                $('#table-contactos-door2door').DataTable(DataTableV);   
            }else{

                $('#table-contactos-door2door').hide();
                $('#table-contactos-visitas-door2door').show();


                $('#button-actualizar-contactos-door2door').hide();
                $('#detalle-contactos-mostrar-door2door').show();

                $('#button-cargar-contactos-door2door').hide();
                $('#button-plantilla-contactos-door2door').hide();

                /*<Atributios>*/
                    $('#actualizar-contactos-id-door2door').prop('disabled', true);
                    $('#actualizar-contactos-nombre-door2door').prop('disabled', true);
                    $('#actualizar-contactos-calle-door2door').prop('disabled', true);
                    $('#actualizar-contactos-colonia-door2door').prop('disabled', true);
                    $('#actualizar-contactos-noexterior-door2door').prop('disabled', true);
                    $('#actualizar-contactos-nointerior-door2door').prop('disabled', true);
                    $('#actualizar-contactos-codigopostal-door2door').prop('disabled', true);
                    $('#actualizar-contactos-entreCalle-door2door').prop('disabled', true);
                    $('#actualizar-contactos-instrucciones-door2door').prop('disabled', true);
                    $('#actualizar-contactos-telefono-door2door').prop('disabled', true);
                    $('#actualizar-contactos-email-door2door').prop('disabled', true);
                    $('#actualizar-contactos-pais-door2door').prop('disabled', true);
                    $('#actualizar-contactos-estado-door2door').prop('disabled', true);
                    $('#actualizar-contactos-municipio-door2door').prop('disabled', true);
              /*</Atributios>*/

                

                $('#table-contactos-visitas-door2door').dataTable().fnDestroy();   
                $('#table-contactos-visitas-door2door-informacion').html('');

                console.log(Information)
                if(Information.length > 0){ 
                    for(let i = 0; i <Information.length; i++) {
                        record =  `
                                <tr>
                                    
                                    <td style="width:250px;vertical-align:middle;" class="text-justify">${Information[i].nombre}</td>   
                                    <td style="width:350px;vertical-align:middle;" class="text-justify">${Information[i].telefono}</td>    
                                    <td style="width:150px;vertical-align:middle;" class="text-justify">${Information[i].estatus}</td>
                                    <td style="width:220px;vertical-align:middle;">
                                        <center>
                                            <div class="row">                                            
                                            
                                                <div class="col-sm-3">
                                                    <img  class="cursor visitas-del-contacto" 
                                                        title="Eliminar" 
                                                        onclick="ButtonEditarContactos( 
                                                             ${Information[i].idContacto},
                                                            '${Information[i].nombre}',
                                                            '${Information[i].calle}',
                                                            '${Information[i].noInterior}',
                                                            '${Information[i].noExterior}',
                                                            '${Information[i].codigoPostal}',
                                                            '${Information[i].colonia}',
                                                            '${Information[i].idMunicipio}',
                                                            '${Information[i].idEstado}',
                                                            '${Information[i].idPais}',
                                                            '${Information[i].entreCalle}',
                                                            '${Information[i].latitud}',
                                                            '${Information[i].longitud}',
                                                            '${Information[i].instrucciones}',
                                                            '${Information[i].telefono}',
                                                            '${Information[i].email}'
                                                        );" 
                                                        src="/d2dSocioWeb/Modules/ModulesImage/editar.png" 
                                                        style="width:30px;height:30px" > 
                                                </div>
                                                <div class="col-sm-3">
                                                    <img  class="cursor" 
                                                        title="Eliminar" 
                                                        onclick="ButtonEliminarContactos( ${Information[i].idContacto}  );" 
                                                        src="/d2dSocioWeb/Modules/ModulesImage/basura.png" 
                                                        style="width:30px;height:30px" > 
                                                </div>
                                            </div>
                                            
                                        </center>                     
                                    </td>
                                </tr> `;  
                        TableBody +=  record;
                    }        
                    $('#table-contactos-visitas-door2door-informacion').html(TableBody)   
                }  

                $('#table-contactos-visitas-door2door').DataTable(DataTableV);   
            }
        /*</Construccion del la tabla>*/

          
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
