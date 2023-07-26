<script type="module">
    /*<import librarys>*/ 
    
        import DataTableV   from '../ModulePugins/Pluginjs/DataTable.var.main.js';

        import functionShow             from './js/function/Function.Show.main.js';
        import functionShowQuestions    from './js/function/Function.Show.Questions.main.js';
        import functionCreate           from './js/function/Function.Create.main.js';           
        import functionUpdate           from './js/function/Function.Update.main.js';
        import functionDelete           from './js/function/Function.Delete.main.js';

        import FunGuardarPreg           from './js/function/Function.Create.Questions.main.js';       
        
        import functionSelectFullAPI    from './js/API/API.SelectFull.main.js';
        import functionSelectFullAPIQuestions    from './js/API/API.SelectFull.Questions.main.js';

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
            /*<Consultar toda la iformacion>*/ 
                const functionSFA = functionSelectFullAPI().
                then( (result) => {     
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

            /*<Evento regresar>*/  
                $('#button-back-question-door2door').on( 'click', () => { 
                    localStorage.setItem('JSON_PREGUNTAS', JSON.stringify([])); 
                    $('#modal-questions-door2door').modal("hide");
                });
            /*</Evento regresar>*/  

            /*<Evento eliminacion>*/  
                $('#listar-preguntas').on('click', ()=> { 
                    setTimeout(() => {
                        /*<Consultar toda la iformacion>*/ 
                            let idCuesntionario =  $('#update-id-door2door').val();
                            const functionSFAQ = functionSelectFullAPIQuestions(idCuesntionario).
                            then( (result) => {      console.log(result)
                                if(result){                                                                     
                                    if(result.message == 'Good'){
                                        /*<Consulta exitosa>*/
                                            let Arreglo = [];
                                            Arreglo = result.information;                                                
                                            const FunShowQuestions = functionShowQuestions(Arreglo);                                        
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
                        $('#modal-questions-door2door').modal('show'); 
                    }, 500);
                });
            /*</Evento eliminacion>*/ 


            /*<nuevapregunta>*/
                $('#button-nuevapregunta-door2door').on('click', ()=> { 
                    let Arreglo = JSON.parse(localStorage.getItem('JSON_PREGUNTAS'));
                    Arreglo.push({
                                    pregunta:"",
                                    tipoPregunta:"ABIERTA"
                                });
                    const FunShowQuestions = functionShowQuestions(Arreglo);       
                    localStorage.setItem('JSON_PREGUNTAS', JSON.stringify(Arreglo));                    
                });
            /*<nuevapregunta>*/

            /*<guardarpreguntas>*/
                $('#button-guardarpreguntas-door2door').on('click', ()=> { const Funresult = FunGuardarPreg();  });
            /*<guardarpreguntas>*/
            
            
            
        /*</Main Module Roles>*/                                 
    });
</script>