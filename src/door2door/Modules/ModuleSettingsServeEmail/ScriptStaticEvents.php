<script type="module">
    /*<import librarys>*/ 

        import functionCreate           from './js/function/Function.Update.main.js';  
        import functionSelectFullAPI    from './js/API/API.SelectFull.main.js';
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
                then( (result) => {  console.log(result);
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/
                                let Arrays = [];
                                Arrays = result.information;
                                if(Arrays.length > 0)      {
                                    $('#create-id-door2door').val(               Arrays[0].idSCorreo);
                                    $('#create-usuario-door2door').val(          Arrays[0].usuarios);
                                    $('#create-contrasena-door2door').val(       Arrays[0].contrasena);
                                    $('#create-servidorssalida-door2door').val(  Arrays[0].servidor);
                                    $('#create-puerto-door2door').val(           Arrays[0].puerto);
                                    $('#create-asunto-door2door').val(           Arrays[0].asunto);
                                    $('#create-cuerpo-door2door').val(           Arrays[0].cuerpo);

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

            /*<Evento creacion de un nuevo>*/
                $('#button-create-door2door').on('click', () =>{ console.log("=>"); const Funresult = functionCreate(); }); 
            /*</Evento creacion de un nuevo>*/

           
        /*</Main Module Roles>*/                                 
    });
</script>