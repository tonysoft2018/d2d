<script type="module">
    /*<import librarys>*/ 
    
        import DataTableV   from '../ModulePugins/Pluginjs/DataTable.var.main.js';

        import functionShow             from './js/function/Function.Show.main.js';
        import functionCreate           from './js/function/Function.Create.main.js';           
        import functionUpdate           from './js/function/Function.Update.main.js';
        import functionDelete           from './js/function/Function.Delete.main.js';
        
        import functionSelectFullAPI    from './js/API/API.SelectFull.main.js';

        import functionSelectFullAPIEstados    from '../ModuleCatalogsEstados/js/API/API.SelectFull.main.js';
        import functionSelectFullAPIPaises     from '../ModuleCatalogsPaises/js/API/API.SelectFull.main.js';

    /*<import librarys>*/ 
    
    


    $(document).ready(() =>{  

        setTimeout(() => {
            /*<CARGAR HIDE>*/
                $('#id-main').removeClass('opacidad');
                $('#body-main-div').removeClass('body-main');
                $('#body-main-div').hide();
            /*</CARGAR HIDE>*/
        }, 1500);
        
        /*<Main Module Roles>*/      
        
            /*<Consultar toda la Paises>*/ 
                const functionSFAP = functionSelectFullAPIPaises().
                then( (result) => {   console.log(result)  ;
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/
                                let ArraysPaises = [];
                                ArraysPaises = result.information;   

                                let Option = '';
                                let Options = '<option value="0"  > -- SELECCIONAR -- </option>';

                                for(let i = 0; i<ArraysPaises.length; i++ ){
                                    Option = '<option value="'+ArraysPaises[i].idPais+'"  >'+ArraysPaises[i].nombre+'</option>';
                                    Options += Option;             
                                }
                                $('#create-pais-door2door').html(Options);

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
            /*<Consultar toda la Paises>*/ 

            /*<Consultar toda la Paises>*/ 
                $('#create-pais-door2door').on('change', () =>{  
                    let idpais = $('#create-pais-door2door').val();
                    const functionSFAP = functionSelectFullAPIEstados().
                    then( (result) => {   console.log(result)  ;
                        if(result){                                                                    
                            if(result.message == 'Good'){
                                /*<Consulta exitosa>*/
                                    let Estados = [];
                                    Estados = result.information;   

                                    let Option = '';
                                    let Options = '';

                                    for(let i = 0; i<Estados.length; i++ ){
                                        if(idpais == Estados[i].idPais ){
                                            Option = '<option value="'+Estados[i].idEstado+'"  >'+Estados[i].nombre+'</option>';
                                            Options += Option;    
                                        }                                       
                                               
                                    }
                                    $('#create-estado-door2door').html(Options);

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
            /*<Consultar toda la Paises>*/ 

             /*<Consultar toda la Paises>*/ 
             $('#update-pais-door2door').on('change', () =>{  
                    let idpais = $('#update-pais-door2door').val();
                    const functionSFAP = functionSelectFullAPIEstados().
                    then( (result) => {   console.log(result)  ;
                        if(result){                                                                    
                            if(result.message == 'Good'){
                                /*<Consulta exitosa>*/
                                    let Estados = [];
                                    Estados = result.information;   

                                    let Option = '';
                                    let Options = '';

                                    for(let i = 0; i<Estados.length; i++ ){
                                        if(idpais == Estados[i].idPais ){
                                            Option = '<option value="'+Estados[i].idEstado+'"  >'+Estados[i].nombre+'</option>';
                                            Options += Option;      
                                        }                                       
                                              
                                    }
                                    $('#update-estado-door2door').html(Options);

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
            /*<Consultar toda la Paises>*/ 
            
            /*<Consultar toda la iformacion>*/ 
                const functionSFA = functionSelectFullAPI().
                then( (result) => {      console.log(result)  ;
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/
                                let ArraysRoles = [];
                                ArraysRoles = result.information;                                                
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
                    /*<Error de query>*/ 
                        $('#message-error-door2door').html("");
                        $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                        $('#modal-message-error-door2door').modal('show');
                    /*</Error de query>*/  
                });
            /*<Consultar toda la iformacion>*/ 

            /*<Evento creacion de un nuevo>*/
                $('#button-create-door2door').on('click', () =>{ const Funresult = functionCreate(); }); 
            /*</Evento creacion de un nuevo>*/

            /*<Evento actualizacion>*/              
                $('#button-update-door2door').on('click', () =>{ const Funresult = functionUpdate();  });
            /*<Evento actualizacion>*/ 

            /*<Evento eliminacion>*/  
                $('#button-delete-door2door').on('click', ()=> { const Funresult = functionDelete();  });
            /*</Evento eliminacion>*/ 
            
            
            
        /*</Main Module Roles>*/                                 
    });
</script>