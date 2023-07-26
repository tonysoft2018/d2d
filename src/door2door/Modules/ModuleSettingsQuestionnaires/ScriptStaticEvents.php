<script type="module">
    /*<import librarys>*/ 

        import functionCreate           from './js/function/Function.Update.main.js';  
        import functionSelectFullAPI    from './js/API/API.SelectFull.main.js';

        import functionSelectFullQuestionnairesAPI from '../ModuleCatalogsQuestionnaires/js/API/API.SelectFull.main.js';
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
                const functionSFAS = functionSelectFullAPI().
                then( (result) => {  console.log(result);
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/
                                let Arrays = [];
                                Arrays = result.information;
                                if(Arrays.length > 0)      {
                                    $('#create-id-door2door').val(Arrays[0].idACuestionarios);
                                    setTimeout(() => {
                                        /*<Consultar toda la iformacion>*/ 
                                            const functionSFAs = functionSelectFullQuestionnairesAPI().
                                            then( (result) => {  console.log(result.information)
                                                if(result){                                                                    
                                                    if(result.message == 'Good'){
                                                        /*<Consulta exitosa>*/
                                                            let ArraysQ = [];
                                                            ArraysQ = result.information;   
                                                            let OptionSV = '';
                                                            let OptionSC = '';

                                                            


                                                            for(let i = 0; i<ArraysQ.length; i++){
                                                               
                                                                if(ArraysQ[i].tipoCuestionario == "SOCIO VISITANTE")
                                                                {
                                                                    console.log( Arrays[0].idCuestionariosVisitante);
                                                                console.log( ArraysQ[i].idCuestionario);
                                                                    if(ArraysQ[i].idCuestionario == Arrays[0].idCuestionariosVisitante)
                                                                    {
                                                                        OptionSV += '<option value="'+ArraysQ[i].idCuestionario+'" selected >'+ArraysQ[i].nombre+'</option>';
                                                                    }else{
                                                                        OptionSV += '<option value="'+ArraysQ[i].idCuestionario+'">'+ArraysQ[i].nombre+'</option>';
                                                                    }
                                                                    
                                                                }else if(ArraysQ[i].tipoCuestionario == "SOCIO CLIENTE"){
                                                                    if(ArraysQ[i].idCuestionario == Arrays[0].idCuestionariosCliente)
                                                                    {
                                                                        OptionSC += '<option value="'+ArraysQ[i].idCuestionario+'" selected >'+ArraysQ[i].nombre+'</option>';
                                                                    }else{
                                                                        OptionSC += '<option value="'+ArraysQ[i].idCuestionario+'">'+ArraysQ[i].nombre+'</option>';
                                                                    }
                                                                
                                                                }
                                                            }        console.log( OptionSV);                                      
                                                            $('#create-sv-door2door').html(OptionSV);
                                                            $('#create-sc-door2door').html(OptionSC);
                                                        
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
                                    }, 500);
                                    


                                }else{
                                    $('#create-razonsocial-door2door').val('');
                                   
                                }
                                                                  
                                                            
                            /*<Consulta exitosa>*/                        
                        }else{
                           /*<Error de query>*/ 
                                $('#message-error-platform').html("");
                                $('#message-error-platform').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                $('#modal-message-error-platform').modal('show');
                            /*</Error de query>*/  
                        }       
                    }                           
                }).catch( (err) => { 
                    /*<Error de query>*/ 
                        $('#message-error-platform').html("");
                        $('#message-error-platform').html('¡ERROR AL RECARGAR LA PAGUINA!');
                        $('#modal-message-error-platform').modal('show');
                    /*</Error de query>*/  
                });
            /*<Consultar toda la iformacion>*/ 

            /*<Consultar toda la iformacion>*/ 
                const functionSFA = functionSelectFullQuestionnairesAPI().
                then( (result) => { console.log(result)
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/
                                let Arrays = [];
                                Arrays = result.information;   
                                let OptionSV = '';
                                let OptionSC = '';
                                for(let i = 0; i<Arrays.length; i++){
                                    if(Arrays[i].tipoCuestionario == "SOCIO VISITANTE"){
                                        OptionSV += '<option value="'+Arrays[i].idCuestionario+'">'+Arrays[i].nombre+'</option>';
                                    }else if(Arrays[i].tipoCuestionario == "SOCIO CLIENTE"){
                                        OptionSC += '<option value="'+Arrays[i].idCuestionario+'">'+Arrays[i].nombre+'</option>';
                                    }
                                }                                            
                                $('#create-sv-door2door').html(OptionSV);
                                $('#create-sc-door2door').html(OptionSC);
                              
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
                $('#button-crear-door2door').on('click', () =>{ console.log("=>"); const Funresult = functionCreate(); }); 
            /*</Evento creacion de un nuevo>*/

           
        /*</Main Module Roles>*/                                 
    });
</script>