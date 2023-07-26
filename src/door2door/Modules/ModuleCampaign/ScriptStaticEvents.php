<script type="module">
    /*<import librarys>*/ 
    
        import DataTableV                       from '../ModulePugins/Pluginjs/DataTable.var.main.js';

        
        import functionShow                     from './js/function/Function.Show.main.js';        
        import functionUpdate                   from './js/function/Function.Update.main.js';
        import functionCreate                   from './js/function/Function.Create.main.js';
        import functionCerrar                   from './js/function/Function.Cerrar.main.js';
        import functionCreateContactos          from './js/function/Function.Create.Contactos.main.js';
        import functionDeleteContactos          from './js/function/Function.Delete.Contactos.main.js';

        
        import functionAbrir                    from './js/function/Function.Abrir.main.js';
        import functionPausar                   from './js/function/Function.Pausar.main.js';
        import functionReanudar                 from './js/function/Function.Reanudar.main.js';
        import CreateMasivaAPI                  from './js/function/Function.Create.Contactos.Maiva.main.js';
        import functionCancelacion              from './js/function/Function.Cancelacion.main.js';
        

        import functionSelectFullAPI            from './js/API/API.SelectFull.main.js';
        import functionSelectFullUserAPI        from '../ModulePerfilesSocio/js/API/API.SelectFull.main.js';

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
            /*<Consultar functionSelectFullUserAPI>*/     
                const functionSFA1 = functionSelectFullUserAPI().
                then( (result) => {     console.log(result)
                    if(result){                                                                    
                        if(result.message == 'Good'){
                           
                                let ArraysRoles = [];
                                ArraysRoles = result.information;   

                                localStorage.setItem('JSON_USUARIO', JSON.stringify(ArraysRoles));
                                if(ArraysRoles.length > 0){
                                    let option = '';
                                    for(let i = 0; i< ArraysRoles.length; i++){
                                        if(ArraysRoles[i].tipoPerfil == "SOCIO CLIENTE"){
                                            option  += `<option value="${ArraysRoles[i].idUsuario}" > ${ArraysRoles[i].nombres}  ${ArraysRoles[i].apellidos} </option>`;
                                        }
                                    }          
                                    $('#create-usuario-door2door').html(option);                          
                                }                    
                                            
                        }else{
                           
                                $('#message-error-door2door').html("");
                                $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                $('#modal-message-error-door2door').modal('show');
                            
                        }       
                    }                           
                }).catch( (err) => { 
                 
                        $('#message-error-door2door').html("");
                        $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                        $('#modal-message-error-door2door').modal('show');
                   
                });               
            /*<Consultar functionSelectFullUserAPI>*/
            
            /*<Consultar functionSelectFullAPI>*/            
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
            /*<Consultar functionSelectFullAPI>*/ 

            /*<Consultar toda la iformacion>*/ 
                const functionSFA2 = functionSelectFullPaisesAPI().
                then( (result) => {  console.log(result)   
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/
                                let ArraysPaises = [];
                                ArraysPaises = result.information;           
                                let campos  =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;
                                for(let i = 0; i<ArraysPaises.length; i++){
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
            /*<Consultar toda la iformacion>*/ 


            /*<create-contactos-pais-door2door>*/
               
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
                

            /*<create-contactos-estado-door2door>*/
                $('#create-contactos-estado-door2door').on('change', () =>{ 
                    let idEstado = $('#create-contactos-estado-door2door').val();
                    const functionSFA4 = functionSelectFullMunicipiosAPI().
                    then( (result) => {      console.log("Municipios => ");      console.log(result)
                        if(result){                                                                    
                            if(result.message == 'Good'){
                                /*<Consulta exitosa>*/
                                    let ArraysMunicipios = [];
                                    ArraysMunicipios = result.information;           
                                    let campos  =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;
                                    for(let i = 0; i<ArraysMunicipios.length; i++){
                                        if(idEstado == ArraysMunicipios[i].idEstado){
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
            /*</create-contactos-estado-door2door>*/
            

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


            /*<function Create>*/
                $('#button-new-creat-door2door').on( 'click', () => {   const FunCreate = functionCreate(); });
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
                $('#button-abrir-door2door').on( 'click', () => {  const Funresult = functionAbrir();  });
            /*<function abrir>*/

            /*<function abrir>*/
                $('#button-cancelacion-door2door').on( 'click', () => {  const Funresult = functionCancelacion();  });
            /*<function abrir>*/

            

            /*<function update>*/
                $('#button-contactos').on( 'click', () => {  
                    setTimeout(() => {
                        let idCampana =  $('#update-id-door2door').val();
                        console.log(idCampana)
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
            /*<function update>*/

           
           

             /*<function cargar>*/
                $('#button-cargar-contactos-door2door').on( 'click', () => {    $('#modal-cargar-contactos-door2door').modal('show'); });
            /*<function cargar>*/

             /*<function plantilla>*/
                $('#button-plantilla-contactos-door2door').on( 'click', () => {    $('#modal-plantilla-door2door').modal('show'); });
            /*<function plantilla>*/

             /*<function create>*/
                $('#button-create-contactos-door2door').on( 'click', () => { const FunCreateContactos = functionCreateContactos();   });
            /*<function create>*/
       

            /*<button-cargar-contactos-subir-contactos-door2door>*/
                $('#button-cargar-contactos-subir-contactos-door2door').on( 'click', () => {    });
            /*<button-cargar-contactos-subir-contactos-door2door>*/

            /*<function create>
                $('#button-abrir-si-door2door').on( 'click', () => {    });*/
            /*<function create>*/

            /*<function grabar-si>
                $('#button-grabar-si-door2door').on( 'click', () => {    });*/
            /*<function grabar-si>*/

            /*<function grabar-si>*/
                $('#button-cargar-contactos-subir-contactos-door2door').on( 'click', () => { const CreateMasivaAPIRes = CreateMasivaAPI(); });
            /*<function grabar-si>*/

            /*<function Eliminar-si>*/
                $('#button-contacto-delete-door2door').on( 'click', () => { const FunfunctionDeleteContactos = functionDeleteContactos();   });
            /*<function Eliminar-si>*/
            
           

            
            
        /*</Main Module Roles>*/                                 
    });
</script>