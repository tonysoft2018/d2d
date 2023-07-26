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
    import APICOnsulta          from '../API/API.SelectFull.Visits.Items.main.js';    
    import APICOnsultaAceptar   from '../API/API.SelectFull.Visits.Items.Aceptar.main.js';    
    import ShowUpdate           from './Function.Show.Visits.Update.main.js';  

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

                     let Fecha = Information[i].fecha.split(' ');
                     let FechaR = Information[i].fechaRevicion.split(' ');
                     let FechaP = Information[i].fechaPago.split(' ');

                     if(Information[i].estatus == 'ABIERTO'){                     
                        record =  `
                                <tr style="font-size:12;" >
                                    <td style="width:30px;vertical-align:middle;" class="text-center">${Information[i].folio}</td>
                                    <td style="width:100px;vertical-align:middle;" class="text-justify">${Formato(Fecha[0])+' '+FormatoHora(Fecha[1])}</td> 
                                    <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].noVisitas}</td>
                                    <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].noProcesados}</td>       
                                    <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].noAceptados}</td>
                                    <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].noPagados}</td>
                                
                                    <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].totalComiciones}</td>
                                    <td style="width:100px;vertical-align:middle;" class="text-justify">${Formato(FechaR[0])+' '+FormatoHora(FechaR[1])}</td>
                                    <td style="width:100px;vertical-align:middle;" class="text-justify">${Formato(FechaP[0])+' '+FormatoHora(FechaP[1])}</td>
                                    <td style="width:100px;vertical-align:middle;" class="text-justify">${Information[i].estatus}</td>
                                    <td style="width:360px;vertical-align:middle;">
                                        <center>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                    <img        class="cursor" 
                                                                title="Eliminar" 
                                                                onclick="ButtonCancelado(
                                                                            ${Information[i].idCorte}
                                                                        );" 
                                                                src="/door2door/Modules/ModulesImage/basura.png" 
                                                                style="width:25px;height:25px" >
                                                </div>
                                                <div class="col-sm-3">
                                                    <img        class="cursor mostra-informacion-show"  
                                                                title="Mostrar" 
                                                                onclick="ButtonShow(
                                                                            ${Information[i].idCorte},
                                                                            ${Information[i].folio},
                                                                            '${Fecha[0]}',
                                                                            '${Information[i].estatus}'
                                                                        );" 
                                                                src="/door2door/Modules/ModulesImage/mostrar.png"    
                                                                style="width:25px;height:25px" >
                                                </div>
                                                <div class="col-sm-3">
                                                    <img        class="cursor mostra-informacion-update"  
                                                                title="Editar"  
                                                                onclick="ButtonUpdate(
                                                                            ${Information[i].idCorte},
                                                                            ${Information[i].folio},
                                                                            '${Fecha[0]}',
                                                                            '${Information[i].estatus}'
                                                                            );"
                                                                src="/door2door/Modules/ModulesImage/editar.png" 
                                                                style="width:25px;height:25px">  
                                                </div>
                                                <div class="col-sm-3">
                                                     
                                                    </div>
                                               
                                            </div>
                                        </center>                     
                                    </td>
                                </tr> `;  
                    }else if(Information[i].estatus == 'PROCESADO'){

                        record =  `
                                    <tr>
                                        <td style="width:30px;vertical-align:middle;" class="text-center">${Information[i].folio}</td>
                                        <td style="width:100px;vertical-align:middle;" class="text-justify">${Formato(Fecha[0])+' '+FormatoHora(Fecha[1])}</td> 
                                        <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].noVisitas}</td>
                                        <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].noProcesados}</td>       
                                        <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].noAceptados}</td>
                                        <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].noPagados}</td>
                                    
                                        <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].totalComiciones}</td>
                                        <td style="width:100px;vertical-align:middle;" class="text-justify">${Formato(FechaR[0])+' '+FormatoHora(FechaR[1])}</td>
                                        <td style="width:100px;vertical-align:middle;" class="text-justify">${Formato(FechaP[0])+' '+FormatoHora(FechaP[1])}</td>
                                        <td style="width:100px;vertical-align:middle;" class="text-justify">${Information[i].estatus}</td>
                                        <td style="width:260px;vertical-align:middle;">
                                            <center>
                                            
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <img        class="cursor" 
                                                                title="Eliminar" 
                                                                onclick="ButtonCancelado(
                                                                            ${Information[i].idCorte}
                                                                        );" 
                                                                src="/door2door/Modules/ModulesImage/basura.png" 
                                                                style="width:30px;height:30px" >
                                                </div>
                                                <div class="col-sm-3">
                                                    <img        class="cursor mostra-informacion-show"  
                                                                title="Mostrar" 
                                                                onclick="ButtonShow(
                                                                            ${Information[i].idCorte},
                                                                            ${Information[i].folio},
                                                                            '${Fecha[0]}',
                                                                            '${Information[i].estatus}'
                                                                        );" 
                                                                src="/door2door/Modules/ModulesImage/mostrar.png"    
                                                                style="width:30px;height:30px" >
                                                </div>
                                                <div class="col-sm-3">
                                                   
                                                </div>
                                                <div class="col-sm-3">
                                                        <img        class="cursor mostra-informacion-ordenpago"  
                                                                    title="Editar"  
                                                                    onclick="ButtonOrden(
                                                                                ${Information[i].idCorte},
                                                                                ${Information[i].folio},
                                                                                '${Fecha[0]}',
                                                                                '${Information[i].estatus}'
                                                                                );"
                                                                    src="/door2door/Modules/ModulesImage/orden.png" 
                                                                    style="width:30px;height:30px">  
                                                    </div>
                                               
                                            </div>
                                            </center>                     
                                        </td>
                                    </tr> `;  

                    }else if(Information[i].estatus == 'CANCELADO'){
                        record =  `
                                <tr>
                                    <td style="width:30px;vertical-align:middle;" class="text-center">${Information[i].folio}</td>
                                    <td style="width:100px;vertical-align:middle;" class="text-justify">${Formato(Fecha[0])+' '+FormatoHora(Fecha[1])}</td> 
                                    <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].noVisitas}</td>
                                    <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].noProcesados}</td>       
                                    <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].noAceptados}</td>
                                    <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].noPagados}</td>
                                
                                    <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].totalComiciones}</td>
                                    <td style="width:100px;vertical-align:middle;" class="text-justify">${Formato(FechaR[0])+' '+FormatoHora(FechaR[1])}</td>
                                    <td style="width:100px;vertical-align:middle;" class="text-justify">${Formato(FechaP[0])+' '+FormatoHora(FechaP[1])}</td>
                                    <td style="width:100px;vertical-align:middle;" class="text-justify">${Information[i].estatus}</td>
                                    <td style="width:260px;vertical-align:middle;">
                                        <center>
                                        
                                        <div class="row">
                                            <div class="col-sm-3">
                                              
                                            </div>
                                            <div class="col-sm-3">
                                                <img        class="cursor mostra-informacion-show"  
                                                            title="Mostrar" 
                                                            onclick="ButtonShow(
                                                                        ${Information[i].idCorte},
                                                                        ${Information[i].folio},
                                                                        '${Fecha[0]}',
                                                                        '${Information[i].estatus}'
                                                                    );" 
                                                            src="/door2door/Modules/ModulesImage/mostrar.png"    
                                                            style="width:30px;height:30px" >
                                            </div>
                                            <div class="col-sm-3">
                                            </div>
                                            <div class="col-sm-3">
                                                  
                                                </div>
                                           
                                        </div>
                                        </center>                     
                                    </td>
                                </tr> `;  
                    }else if(Information[i].estatus == 'ORDEN DE PAGO'){

                        record =  `
                                    <tr>
                                        <td style="width:30px;vertical-align:middle;" class="text-center">${Information[i].folio}</td>
                                        <td style="width:100px;vertical-align:middle;" class="text-justify">${Formato(Fecha[0])+' '+FormatoHora(Fecha[1])}</td> 
                                        <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].noVisitas}</td>
                                        <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].noProcesados}</td>       
                                        <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].noAceptados}</td>
                                        <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].noPagados}</td>
                                    
                                        <td style="text-align:right;width:100px;vertical-align:middle;" >${Information[i].totalComiciones}</td>
                                        <td style="width:100px;vertical-align:middle;" class="text-justify">${Formato(FechaR[0])+' '+FormatoHora(FechaR[1])}</td>
                                        <td style="width:100px;vertical-align:middle;" class="text-justify">${Formato(FechaP[0])+' '+FormatoHora(FechaP[1])}</td>
                                        <td style="width:100px;vertical-align:middle;" class="text-justify">${Information[i].estatus}</td>
                                        <td style="width:260px;vertical-align:middle;">
                                            <center>
                                            
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <img        class="cursor" 
                                                                title="Eliminar" 
                                                                onclick="ButtonCancelado(
                                                                            ${Information[i].idCorte}
                                                                        );" 
                                                                src="/door2door/Modules/ModulesImage/basura.png" 
                                                                style="width:30px;height:30px" >
                                                </div>
                                                <div class="col-sm-3">
                                                    <img        class="cursor mostra-informacion-show"  
                                                                title="Mostrar" 
                                                                onclick="ButtonShow(
                                                                            ${Information[i].idCorte},
                                                                            ${Information[i].folio},
                                                                            '${Fecha[0]}',
                                                                            '${Information[i].estatus}'
                                                                        );" 
                                                                src="/door2door/Modules/ModulesImage/mostrar.png"    
                                                                style="width:30px;height:30px" >
                                                </div>
                                                <div class="col-sm-3">
                                                   
                                                </div>
                                                <div class="col-sm-3">
                                                        <img        class="cursor mostra-informacion-ordenpago"  
                                                                    title="Editar"  
                                                                    onclick="ButtonOrden(
                                                                                ${Information[i].idCorte},
                                                                                ${Information[i].folio},
                                                                                '${Fecha[0]}',
                                                                                '${Information[i].estatus}'
                                                                                );"
                                                                    src="/door2door/Modules/ModulesImage/orden.png" 
                                                                    style="width:30px;height:30px">  
                                                    </div>
                                               
                                            </div>
                                            </center>                     
                                        </td>
                                    </tr> `;  

                    }

                    TableBody +=  record;
                }

                
                $('#table-main-door2door-informacion').html(TableBody);

                /*<Mostrar Infoprmacion>*/
                    setTimeout( () => {
                        $('.mostra-informacion-show').on('click' ,() => {
                            let id = $('#show-id-door2door').val();
                        
                            const FunAPICOnsulta = APICOnsulta(id).
                            then((result) => { console.log(result)
                                if(result){
                                    if(result.message == 'Good'){

                                        let Campo = '';
                                        let ArregloCampo = '';
                
                                        let ArraysDatos = result.information;
                
                                        $('#table-visits-show-door2door').dataTable().fnDestroy(); 
                                        $('#table-visits-show-door2door-informacion').html(''); 
                
                                        let contador  = ArraysDatos.length;
                                        let i = 0;
                                    
                                        while(i < contador){
                                            let Fecha = ArraysDatos[i].fecha.split(' ');
                                            Campo =  `
                                                        <tr>
                                                        
                                                            <td style="width:250px;vertical-align:middle;" class="text-justify">${ArraysDatos[i].Contacto}</td>
                                                            <td style="width:200px;vertical-align:middle;" class="text-justify">${ArraysDatos[i].telefono}</td>      
                                                            <td style="width:200px;vertical-align:middle;" class="text-justify">${Formato(Fecha[0])+' '+FormatoHora(Fecha[1])}</td>        
                                                            <td style="width:200px;vertical-align:middle;" class="text-justify">${ArraysDatos[i].Visitador}</td>   
                                                            <td style="text-align:right;width:50px;vertical-align:middle;" > ${ArraysDatos[i].Comicion}  </td>   
                                                        
                                                        </tr>
                                                    `;  
                                                    ArregloCampo += Campo
                                            i = i +1;
                                        }
                                        
                                        $('#table-visits-show-door2door-informacion').html(ArregloCampo);
                                        $('#table-visits-show-door2door').DataTable(DataTableV); 
                                    }
                                }
                            });
                        });
                        
                    }, 500);  
                /*</Mostrar Infoprmacion>*/

                /*<Mostrar update>*/
                    setTimeout( () => {
                        $('.mostra-informacion-update').on('click' ,() => {
                            let id = $('#update-id-door2door').val();
                        
                            const FunAPICOnsulta = APICOnsultaAceptar(id).
                            then((result) => { console.log(result)
                                if(result){
                                    if(result.message == 'Good'){
                                       const ResultShowUpdate = ShowUpdate(result.information);
                                       localStorage.setItem('JSON_VISITAS_ACEPTAR', JSON.stringify(result.information));
                                    }
                                }
                            });
                        });                        
                    }, 500);  
                /*</Mostrar update>*/
                
                /*<Mostrar orden de pago>*/
                    setTimeout( () => {
                        $('.mostra-informacion-ordenpago').on('click' ,() => {
                            let id = $('#ordenpago-id-door2door').val();
                        
                            const FunAPICOnsulta = APICOnsulta(id).
                            then((result) => { console.log(result)
                                if(result){
                                    if(result.message == 'Good'){

                                        let Campo = '';
                                        let ArregloCampo = '';
                
                                        let ArraysDatos = result.information;
                
                                    
                                        $('#table-visits-ordenapgo-door2door-informacion').html('');
                                        $('#table-visits-ordenpago-door2door').dataTable().fnDestroy();  
                
                                        let contador  = ArraysDatos.length;
                                        let i = 0;
                                    
                                        while(i < contador){
                                            let Fecha = ArraysDatos[i].fecha.split(' ');
                                            Campo =  `
                                                        <tr>
                                                        
                                                            <td style="width:250px;vertical-align:middle;" class="text-justify">${ArraysDatos[i].Contacto}</td>
                                                            <td style="width:200px;vertical-align:middle;" class="text-justify">${ArraysDatos[i].telefono}</td>      
                                                            <td style="width:200px;vertical-align:middle;" class="text-justify">${Formato(Fecha[0])+' '+FormatoHora(Fecha[1])}</td>        
                                                            <td style="width:200px;vertical-align:middle;" class="text-justify">${ArraysDatos[i].Visitador}</td>   
                                                            <td style="text-align:right;width:50px;vertical-align:middle;" > ${ArraysDatos[i].Comicion}  </td>   
                                                        
                                                        </tr>
                                                    `;  
                                                    ArregloCampo += Campo
                                            i = i +1;
                                        }
                                        
                                        $('#table-visits-ordenpago-door2door-informacion').html(ArregloCampo);
                                        $('#table-visits-ordenpago-door2door').DataTable(DataTableV); 
                                    }
                                }
                            });
                        });
                        
                    }, 500);  
                /*<Mostrar orden de pago>*/
            }     
        /*</Construccion del la tabla>*/

        /*<Creamos un datatable>*/
            $('#table-main-door2door').DataTable(DataTableV);   
        /*</Creamos un datatable>*/                      
    }
    /*<export>*/
        export default Show;
    /*</export>*/
/*</Show>*/   
const  Formato = (texto) =>{
    return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
  }
const  FormatoHora = (texto) =>{
    return texto.replace(/^(\d{4}):(\d{2}):(\d{2})$/g,'$3:$2');
}
  