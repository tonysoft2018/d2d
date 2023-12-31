<script type="module">
    /*<import librarys>*/ 
    
        import DataTableV                       from '../ModulePugins/Pluginjs/DataTable.var.main.js';

        import functionShow                     from './js/function/Function.Show.main.js';        
        import functionUpdate                   from './js/function/Function.Update.main.js';
        import functionCreate                   from './js/function/Function.Create.main.js';
        import functionCerrar                   from './js/function/Function.Cerrar.main.js';
        import functionCreateContactos          from './js/function/Function.Create.Contactos.main.js';
        import functionUpdateContactos          from './js/function/Function.Update.Contactos.main.js';
        import functionDeleteContactos          from './js/function/Function.Delete.Contactos.main.js';

        
        import functionAbrir                    from './js/function/Function.Abrir.main.js';
        import functionPausar                   from './js/function/Function.Pausar.main.js';
        import functionReanudar                 from './js/function/Function.Reanudar.main.js';
        import CreateMasivaAPI                  from './js/function/Function.Create.Contactos.Maiva.main.js';
        import functionCancelacion              from './js/function/Function.Cancelacion.main.js';
        

        import functionSelectFullAPI            from './js/API/API.SelectFull.main.js';

        import functionSelectFullContactos      from './js/API/API.SelectFull.Contactos.main.js';
        import functionShowContactos            from './js/function/Function.Show.Contactos.main.js';   

        
        import functionSelectFullPaisesAPI      from '../../../door2door/Modules/ModuleCatalogsPaises/js/API/API.SelectFull.main.js';
        import functionSelectFullEstadosAPI     from '../../../door2door/Modules/ModuleCatalogsEstados/js/API/API.SelectFull.main.js';
        import functionSelectFullMunicipiosAPI  from '../../../door2door/Modules/ModuleCatalogsMunicipioD/js/API/API.SelectFull.main.js';


        

    /*<import librarys>*/ 
    
    
        let Folio = 0;

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
                    then( (result) => {     console.log(result)
                        if(result){                                                                    
                            if(result.message == 'Good'){
                                /*<Consulta exitosa>*/
                                    let ArraysRoles = [];
                                    ArraysRoles = result.information;   
                                    if(ArraysRoles.length > 0){
                                        Folio = parseInt(ArraysRoles[0].folio);     
                                    }else{
                                        Folio = 0;
                                    }
                                    
                                                                        
                                    const functionS =  functionShow(ArraysRoles);  
                                
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
                        /*<Error de query>*/  console.log(err)
                            $('#message-error-door2door').html("");
                            $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                            $('#modal-message-error-door2door').modal('show');
                        /*</Error de query>*/  
                    });

                
                /*<Consultar toda la iformacion>*/ 

                /*<Consultar toda la iformacion Paises Estados Municipios>*/ 
                    /*<PAISES>*/
                        const functionPaises = functionSelectFullPaisesAPI().
                        then( (result) => {  console.log(result)   
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/
                                        /*<#######>*/
                                            localStorage.setItem('JSON_CAMPANA_PAISES', JSON.stringify(result.information)); 
                                        /*</#######>*/

                                        let ArraysPaises    = [];
                                        ArraysPaises        = result.information;  
                                        let campos          =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;

                                        for(let i = 0; i<ArraysPaises.length; i++)
                                        {
                                            campos +=   `<option value="${ArraysPaises[i].idPais}"   > ${ArraysPaises[i].nombre} </option> `;                                        
                                        }     

                                        $('#create-contactos-pais-door2door').html(campos);    
                                    
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
                    /*</PAISES>*/

                    /*<ESTADOS>*/
                        const functionEstados = functionSelectFullEstadosAPI().
                        then( (result) => {  console.log(result)   
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/
                                        localStorage.setItem('JSON_CAMPANA_ESTADOS', JSON.stringify(result.information));   
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
                    /*</ESTADOS>*/

                    /*<MUNICIPIOS>*/
                        const Municipio = functionSelectFullMunicipiosAPI().
                        then( (result) => {      console.log("Municipios => ");      console.log(result)
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/
                                        localStorage.setItem('JSON_CAMPANA_MUNICIPIOS', JSON.stringify(result.information));         
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
                    /*</MUNICIPIOS>*/

                /*<Consultar toda la iformacion Paises Estados Municipio>*/ 


                /*<create-contactos-estados-door2door>*/              
                    $('#create-contactos-pais-door2door').on('change', () =>{ 
                        let idPais = $('#create-contactos-pais-door2door').val();
                        const functionSFA3 = functionSelectFullEstadosAPI().
                        then( (result) => {   console.log("Estados => ");        console.log(result)
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/
                                        let ArraysEstados = [];
                                        ArraysEstados = result.information;         
                                    
                                        let campos  =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;
                                        for(let i = 0; i<ArraysEstados.length; i++){
                                            if(idPais == ArraysEstados[i].idPais){
                                                campos +=   `<option value="${ArraysEstados[i].idEstado}"   > ${ArraysEstados[i].nombre} </option> `;      
                                            }                                                                         
                                        }            
                                        $('#create-contactos-estado-door2door').html(campos);     
                                        $('#create-contactos-municipio-door2door').html('<option value="0"  selected > -- SELEECCIONAR -- </option> ');     

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
                    }); 
                /*</create-contactos-pais-door2door>*/
                    

                /*<create-contactos-municipio-door2door>*/
                    $('#create-contactos-estado-door2door').on('change', () =>{ 
                        let idEstado = $('#create-contactos-estado-door2door').val();
                        const functionSFA4 = functionSelectFullMunicipiosAPI().
                        then( (result) => {      console.log("Municipios => ");      console.log(result)
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/
                                        let ArraysMunicipios    = [];
                                        ArraysMunicipios        = result.information;    
                                        let campos              =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;
                                        for(let i = 0; i<ArraysMunicipios.length; i++)
                                        {
                                            if(idEstado == ArraysMunicipios[i].idEstado)
                                            {
                                                campos +=   `<option value="${ArraysMunicipios[i].idMunicipio}"   > ${ArraysMunicipios[i].nombre} </option> `;    
                                            }                                                                            
                                        }              
                                        $('#create-contactos-municipio-door2door').html(campos);     
                                    
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
                    
                    });                  
                /*</create-contactos-municipio-door2door>*/

                /*<actualizar-contactos-estados-door2door>*/              
                    $('#actualizar-contactos-pais-door2door').on('change', () =>{ 
                        let idPais = $('#actualizar-contactos-pais-door2door').val();
                        const functionSFA3 = functionSelectFullEstadosAPI().
                        then( (result) => {   console.log("Estados => ");        console.log(result)
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/
                                        let ArraysEstados = [];
                                        ArraysEstados = result.information;         
                                    
                                        let campos  =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;
                                        for(let i = 0; i<ArraysEstados.length; i++){
                                            if(idPais == ArraysEstados[i].idPais){
                                                campos +=   `<option value="${ArraysEstados[i].idEstado}"   > ${ArraysEstados[i].nombre} </option> `;      
                                            }                                                                         
                                        }            
                                        $('#actualizar-contactos-estado-door2door').html(campos);     
                                        $('#actualizar-contactos-municipio-door2door').html('<option value="0"  selected > -- SELEECCIONAR -- </option> ');     

                                    
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
                    }); 
                /*</actualizar-contactos-pais-door2door>*/
                    

                /*<actualizar-contactos-municipio-door2door>*/
                    $('#actualizar-contactos-estado-door2door').on('change', () =>{ 
                        let idEstado = $('#actualizar-contactos-estado-door2door').val();
                        const functionSFA4 = functionSelectFullMunicipiosAPI().
                        then( (result) => {      console.log("Municipios => ");      console.log(result)
                            if(result){                                                                    
                                if(result.message == 'Good'){
                                    /*<Consulta exitosa>*/
                                        let ArraysMunicipios    = [];
                                        ArraysMunicipios        = result.information;    
                                        let campos              =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;
                                        for(let i = 0; i<ArraysMunicipios.length; i++)
                                        {
                                            if(idEstado == ArraysMunicipios[i].idEstado)
                                            {
                                                campos +=   `<option value="${ArraysMunicipios[i].idMunicipio}"   > ${ArraysMunicipios[i].nombre} </option> `;    
                                            }                                                                            
                                        }              
                                        $('#actualizar-contactos-municipio-door2door').html(campos);     

                                    
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
                    
                    });                  
                /*</actualizar-contactos-municipio-door2door>*/
                $('#regresar-contactos-visita-detalle-door2door').on( 'click', () => {   
                    $('#modal-contactos-visita-detalle-door2door').modal('hide');                   
                    setTimeout( () => {
                        $('#modal-update-door2door').modal('show');
                        setTimeout( () => {
                            $('#modal-contactos-door2door').modal('show');
                            setTimeout( () => {
                                $('#modal-contactos-actualizar-door2door').modal('show');
                                setTimeout( () => {
                                    $('#modal-contactos-detalles-door2door').modal('show');
                                    setTimeout( () => {
                                        $('#modal-contactos-visita-door2door').modal('show');
                                    },300);
                                },300);
                            },300);
                        },300); 
                    },300);
                });

                /*<function Create>*/
                    $('#button-create-door2door').on( 'click', () => { 
                        $('#create-folio-door2door').val(Folio+1);
                        let fecha   = new Date(); //Fecha actual
                        let mes     = fecha.getMonth()+1; //obteniendo mes
                        let dia     = fecha.getDate(); //obteniendo dia
                        let ano     = fecha.getFullYear(); //obteniendo año
                        if(dia<10)
                            dia     ='0'+   dia; 
                        if( mes<10)
                            mes     ='0'+   mes; 
                        let FECHA      = ano+"-"+mes+"-"+dia;
                        $('#create-fecha-door2door').val(FECHA);
                    });
                /*<function Create>*/

                /*<button-Rechazada>*/
                    $('#button-grabar').on('click', () => {
                        let idCampana   = $('#update-id-door2door').val();
                        $('#grabar-id-door2door').val(idCampana);
                        $('#modal-grabar-door2door').modal('show');
                    });
                /*</button-Rechazada>*/

                /*<button-Rechazada>*/
                    $('#button-abrir').on('click', () => {
                        let idCampana   = $('#update-id-door2door').val();
                        $('#abrir-id-door2door').val(idCampana);
                        $('#modal-abrir-door2door').modal('show');
                    });
                /*</button-Rechazada>*/

                /*<Evento Detalle>*/                
                    $('#detalle-contactos-mostrar-door2door').on( 'click', () => {    $('#modal-contactos-detalles-door2door').modal('show'); });
                /*</Evento Detalle>*/  
                
                /*<function Create>*/
                    $('#button-new-creat-door2door').on( 'click', () => {   
                        /*<CARGAR SHOW>*/
                            $('#id-main').addClass('opacidad');
                            $('#body-main-div').addClass('body-main');
                            $('#body-main-div').show();
                        /*</CARGAR SHOW>*/
                        setTimeout(() => {
                            const FunCreate = functionCreate(); 
                        }, 1000);
                        
                    });
                /*<function Create>*/

                /*<Evento eliminacion>*/  
                    $('#button-cerrar-door2door').on('click', ()=> { const Funresult = functionCerrar();  });
                /*</Evento eliminacion>*/ 

                /*<function update>*/
                    $('#button-update-door2door').on( 'click', () => {    const FunDelete = functionUpdate(); });
                /*<function update>*/

                /*<function abrir>*/
                $('#button-pausar-door2door').on( 'click', () => {  const Funresult = functionPausar();  });
                /*<function abrir>*/
                
                /*<function abrir>*/
                    $('#button-reanudar-door2door').on( 'click', () => {  const Funresult = functionReanudar();  });
                /*<function abrir>*/

                /*<function abrir>*/
                    $('#button-grabar-door2door').on( 'click', () => {  const Funresult = functionGrabar();  });
                /*<function abrir>*/

                /*<function abrir>*/
                    $('#button-abrir-door2door').on( 'click', () => {  
                        /*<CARGAR SHOW>*/
                            $('#id-main').addClass('opacidad');
                            $('#body-main-div').addClass('body-main');
                            $('#body-main-div').show();
                        /*</CARGAR SHOW>*/
                        const Funresult = functionAbrir();  
                    });
                /*<function abrir>*/

                /*<function cargar>*/
                    $('#button-abrir-door2door').on( 'click', () => {  
                        /*<CARGAR SHOW>*/
                            $('#id-main').addClass('opacidad');
                            $('#body-main-div').addClass('body-main');
                            $('#body-main-div').show();
                        /*</CARGAR SHOW>*/
                     
                        const Funresult = functionAbrir();  
                        $('#modal-abrir-door2door').modal('hide');
                       });
                /*<function cargar>*/

                /*<function abrir>*/
                    $('#button-cancelacion-door2door').on( 'click', () => {  const Funresult = functionCancelacion();  });
                /*<function abrir>*/

                /*<function abrir>*/
                    $('#button-actualizar-contactos-door2door').on( 'click', () => {  
                        /*<CARGAR HIDE>*/
                            $('#id-main').addClass('opacidad');
                            $('#body-main-div').addClass('body-main');
                            $('#body-main-div').show();
                        /*</CARGAR HIDE>*/
                        const Funresult = functionUpdateContactos();  
                       
                    });
                /*<function abrir>*/

                

            /*<Regresar crear contactos>*/
                    $('#regresar-contactos-crear-door2door').on('click', ()=>{
                        $('#create-contactos-nombre-door2door').removeClass('is-invalid');
                        $('#create-contactos-calle-door2door').removeClass('is-invalid'); 
                        $('#create-contactos-colonia-door2door').removeClass('is-invalid');
                        $('#create-contactos-noexterior-door2door').removeClass('is-invalid');
                        $('#create-contactos-codigopostal-door2door').removeClass('is-invalid');
                        $('#create-contactos-telefono-door2door').removeClass('is-invalid'); 
                        $('#create-contactos-pais-door2door').removeClass('is-invalid');
                        $('#create-contactos-estado-door2door').removeClass('is-invalid');
                        $('#create-contactos-municipio-door2door').removeClass('is-invalid');
                    })
                /*</Regresar crear contactos>*/

                /*<function mostrar contactos 1>*/
                    $('.button-contactos').on( 'click', () => {  
                        setTimeout(() => {
                            let idCampana =  $('#update-id-door2door').val();                            
                            const functionSFA2 = functionSelectFullContactos(idCampana).
                            then( (result) => {  console.log(result)   
                                if(result){                                                                    
                                    if(result.message == 'Good'){
                                        /*<Consulta exitosa>*/
                                            let Arrays = [];
                                            Arrays = result.information;   
                                            const FunctionShowContactos = functionShowContactos(Arrays);       
                                            $('#modal-contactos-door2door').modal('show'); 
                                        
                                        
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
                        
                        }, 500);  
                        
                    });
                /*<function mostrar contactos 2>*/

            
            
                
                

               

                /*<function cargar>*/
                    $('#button-nuevo-contactos-door2door').on( 'click', () => {    $('#modal-contactos-crear-door2door').modal('show'); });
                /*<function cargar>*/

                /*<function cargar>*/
                    $('#button-cargar-contactos-door2door').on( 'click', () => {    $('#modal-cargar-contactos-door2door').modal('show'); });
                /*<function cargar>*/

                /*<function plantilla>*/
                    $('#button-plantilla-contactos-door2door').on( 'click', () => {    $('#modal-plantilla-door2door').modal('show'); });
                /*<function plantilla>*/

                /*<function create>*/
                    $('#button-create-contactos-door2door').on( 'click', () => { const FunCreateContactos = functionCreateContactos();   });
                /*<function create>*/
        

               

                /*<function create>
                    $('#button-abrir-si-door2door').on( 'click', () => {    });*/
                /*<function create>*/

                /*<function grabar-si>
                    $('#button-grabar-si-door2door').on( 'click', () => {    });*/
                /*<function grabar-si>*/

                /*<function grabar-si>*/
                    $('#button-cargar-contactos-subir-contactos-door2door').on( 'click', () => { 
                         /*<CARGAR SHOW>*/
                            $('#id-main').addClass('opacidad');
                            $('#body-main-div').addClass('body-main');
                            $('#body-main-div').show();
                        /*</CARGAR SHOW>*/
                        setTimeout(() => {
                            const CreateMasivaAPIRes = CreateMasivaAPI(); 
                        }, 1000);
                        
                    });
                /*<function grabar-si>*/

                /*<function Eliminar-si>*/
                    $('#button-contacto-delete-door2door').on( 'click', () => { const FunfunctionDeleteContactos = functionDeleteContactos();   });
                /*<function Eliminar-si>*/
                
            

                
                
            /*</Main Module Roles>*/                                 
        });
</script>