<script type="module">
    /*<import librarys>*/ 
    
        import DataTableV   from '../ModulePugins/Pluginjs/DataTable.var.main.js';

        import functionShow                 from './js/function/Function.Show.main.js';
        import functionShowVisitas          from './js/function/Function.Show.Visits.main.js';
        import functionShowVisitasUpdate    from './js/function/Function.Show.Visits.Update.main.js'

        import functionProcesar             from './js/function/Function.Procesar.main.js';           
        import functionAceptar              from './js/function/Function.Aceptar.main.js';
        import functionCancelado            from './js/function/Function.Cancelado.main.js';
        import functionData                 from './js/function/Function.Data.main.js';
        import functionCargarVisitas        from './js/function/Function.CargarVisitas.main.js';
        
        import functionSelectFullAPI        from './js/API/API.SelectFull.main.js';
        import functionSelectFullOrdenPAgoAPI        from './js/API/API.SelectFull.Visits.Items.OrdenPago.main.js';
        import functionAcepraAPI            from './js/API/API.AceptarOrdenPago.main.js';
        import functionSelectBuscar         from './js/API/API.SelectFull.Buscar.main.js';

    /*<import librarys>*/ 
    
    

        let ContadorFolio = 0;
    $(document).ready(() =>{     
        
        setTimeout(() => {
            /*<CARGAR HIDE>*/
                $('#id-main').removeClass('opacidad');
                $('#body-main-div').removeClass('body-main');
                $('#body-main-div').hide();
            /*</CARGAR HIDE>*/
        }, 1500);
        
        /*<Main Module Roles>*/    

            /*<Consultar toda la iformacion>*/ 
                const functionSFA = functionSelectFullAPI().
                then( (result) => {     console.log(result);
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/
                                let ArraysRoles = [];
                                ArraysRoles = result.information;    
                                
                                let fecha   = new Date(); 
                                let mes     = fecha.getMonth()+1;
                                let dia     = fecha.getDate(); 
                                let ano     = fecha.getFullYear(); 
                                
                                if(dia<10)
                                    dia     ='0'+dia; 
                                if(mes<10)
                                    mes     ='0'+mes 
                                let FechaFinal      = ano+"-"+mes+"-"+dia;
                                let FechaInicial    = ano+"-"+mes+"-"+dia; 
                                $('#crear-fechainicio-door2door').val(FechaInicial);
                                $('#crear-fechafinal-door2door').val(FechaInicial);


                                const functionS =  functionShow(ArraysRoles);  
                                ArraysRoles = result.information;                                                
                                ContadorFolio = ArraysRoles.length;
                            /*<Consulta exitosa>*/                        
                        }else{
                           /*<Error de query>*/ 
                                $('#message-error-door2door').html("");
                                $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                $('#modal-message-error-door2door').modal('show');
                            /*</Error de query>*/  
                        }       
                    }                           
                }).catch( (err) => { 
                    /*<Error de query>*/ 
                        $('#message-error-door2door').html("");
                        $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                        $('#modal-message-error-door2door').modal('show');
                    /*</Error de query>*/  
                });
            /*<Consultar toda la iformacion>*/           

            /*<EVENTOP CREAR>*/
                $('#crear-corte-inicio').on('click', () =>{ const Funresult = functionData(ContadorFolio); }); 
            /*<EVENTOP CREAR>*/

            /*<EVENTOP >*/
                $('#button-cargar-visistas').on('click', () =>{ const Funresult = functionCargarVisitas(); }); 
            /*<EVENTOP >*/

            /*<Evento creacion de un nuevo>*/
                $('#button-procesar-informacion').on('click', () =>{ const Funresult = functionProcesar(); }); 
            /*</Evento creacion de un nuevo>*/

            /*<Evento actualizacion>*/              
                $('#button-aceptar-informacion').on('click', () =>{ const Funresult = functionAceptar();  });
            /*<Evento actualizacion>*/ 

            /*<Evento Cancelado>*/  
                $('#button-cancelado-door2door').on('click', ()=> { const Funresult = functionCancelado();  });
            /*</Evento Cancelado>*/ 


            /*<Evento Cancelado>*/  
                $('#button-ordenpago-informacion').on('click', ()=> { 
                    let idCorte = $('#ordenpago-id-door2door').val();
                    console.log(idCorte)
                    const ResultfunctionAcepraAPI = functionAcepraAPI(idCorte). 
                    then((result) => { console.log(result)
                        if(result){
                            if(result.message == 'Good'){
                                const ResultfunctionSelectFullOrdenPAgoAPI = functionSelectFullOrdenPAgoAPI(idCorte). 
                                then((result) => { console.log(result)
                                    if(result){
                                        if(result.message == 'Good'){
                                            let Information = result.information;
                                            /*<Destruimos el un datatable>*/  
                                                $('#table-ordenpago-mostrar-door2door').dataTable().fnDestroy();   
                                                $('#table-ordenpago-mostrar-door2door-informacion').html('');
                                            /*<Destruimos el un datatable>*/  

                                            /*<Construccion del la tabla>*/ 
                                                let record = '';
                                                let TableBody= ''; 

                                                
                                                if(Information.length > 0){ 
                                                    for(let i = 0; i <Information.length; i++) {

                                                        record =  `
                                                                    <tr>
                                                                        <td style="width:50px;vertical-align:middle;" >${Information[i].socio}</td>
                                                                        <td style="width:150px;vertical-align:middle;" class="text-justify">${Information[i].numeroCuenta}</td>
                                                                        <td style="width:100px;vertical-align:middle;" class="text-justify">${Information[i].Comicion}</td>      
                                                                       
                                                                    </tr> `;  
                                                        TableBody +=  record;
                                                    }

                                                    
                                                    $('#table-ordenpago-mostrar-door2door-informacion').html(TableBody)   
                                                    
                                                }     
                                            /*</Construccion del la tabla>*/
                                                
                                            /*<Creamos un datatable>*/
                                                $('#table-ordenpago-mostrar-door2door').DataTable(DataTableV);   
                                                $('#modal-ordenpago-crear-door2door').modal('show');
                                            /*</Creamos un datatable>*/                      
                                        }
                                    }
                                })
                            }
                        }
                    })
                   
                  });
            /*</Evento Cancelado>*/ 

            /*<Evento seleccionar-todos>*/  
                $('#crear-seleccionar-todos').on('click', ()=> { 
                    let ArraysDatos = JSON.parse(localStorage.getItem('JSON_VISITAS_PROCESO'));
                    let Valor = $('#crear-seleccionar-todos-input').val();
                    
                    if(Valor == 0){  Valor = 1;  }
                    else{            Valor = 0;  }

                    for(let i = 0; i< ArraysDatos.length; i++) {
                        ArraysDatos[i].Seleccion = Valor;    
                    }
                    $('#crear-seleccionar-todos-input').val(Valor);
                    localStorage.setItem('JSON_VISITAS_PROCESO', JSON.stringify(ArraysDatos));
                    const Result = functionShowVisitas(ArraysDatos);
                });
            /*</Evento seleccionar-todos>*/ 
            
            /*<Evento seleccionar-todos>*/  
                $('#update-seleccionar-todos').on('click', ()=> { 
                    let ArraysDatos = JSON.parse(localStorage.getItem('JSON_VISITAS_ACEPTAR'));
                    let Valor = $('#update-seleccionar-todos-input').val();
                    
                    if(Valor == 0){  Valor = 1;  }
                    else{            Valor = 0;  }

                    for(let i = 0; i< ArraysDatos.length; i++) {
                        ArraysDatos[i].Seleccion = Valor;    
                    }
                    $('#update-seleccionar-todos-input').val(Valor);
                    localStorage.setItem('JSON_VISITAS_ACEPTAR', JSON.stringify(ArraysDatos));
                    const Result = functionShowVisitasUpdate(ArraysDatos);
                });
            /*</Evento seleccionar-todos>*/ 
            
            

            /*<EVENTOP BUSCAR>*/
                $('#button-main-buscar-door2door').on('click', () =>{ 
                    let FechaInicio = $('#crear-fechainicio-door2door').val();
                    let FechaFinal  = $('#crear-fechafinal-door2door').val();
                    let Folio       = $('#crear-folio-door2door').val();
                    let Estatus     = $('#crear-estatus-door2door').val();

                    const Funresult = functionSelectBuscar(
                                                                FechaInicio, 
                                                                FechaFinal,
                                                                Folio,
                                                                Estatus
                                                            ).
                    then( (result) => { console.log(result);
                        if(result){
                            if(result.message == 'Good'){
                                let Arrays =  result.information;
                                const functionS = functionShow(Arrays);
                            }
                        }
                    })
                 }); 
            /*<EVENTOP BUSCAR>*/
            
            
            
        /*</Main Module Roles>*/                                 
    });
</script>