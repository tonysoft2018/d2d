
/*<import>*/    
    import createAPI        from '../API/API.Update.main.js';
    
    
/*</import>*/    


/*<create>*/   
    const create = async() => { 
       /*<Captura>*/
            let id                  =   $('#create-id-door2door').val();
            let usuario             =   $('#create-usuario-door2door').val().replace(/['"`]/, '');
            let contrasena          =   $('#create-contrasena-door2door').val().replace(/['"`]/, '');
            let servidorssalida     =   $('#create-servidorssalida-door2door').val().replace(/['"`]/, '');
            let puerto              =   $('#create-puerto-door2door').val().replace(/['"`]/, '');

            

            /*<Eliminamos caracteres extraños>*/
                $('#create-usuario-door2door').val(usuario);
                $('#create-servidorssalida-door2door').val(servidorssalida);    
                $('#create-puerto-door2door').val(puerto);   
            /*<Eliminamos caracteres extraños>*/
        /*</Captura>*/
        if(usuario != '' && contrasena != '' && servidorssalida != '' && puerto != ''){         
            let informationForm = new FormData(document.getElementById("form-create-door2door"));  
            const ResultcreateAPI = await createAPI( informationForm ).
            then((result) => {  console.log(result)                       
                if(result.message == 'Good'){
                    /*<Respuesta>*/
                        $('#message-succes-door2door').html("");
                        $('#message-succes-door2door').html('ACTUALIZACIÓN EXITOSA');
                        $('#modal-message-succes-door2door').modal('show');      
                        
                                                 
                        $('#create-usuario-door2door').removeClass("is-invalid"); 
                        $('#create-contrasena-door2door').removeClass("is-invalid"); 
                        $('#create-servidorssalida-door2door').removeClass("is-invalid");
                        $('#create-puerto-door2door').removeClass("is-invalid");                                                   
                      

                    /*</Respuesta>*/     

                                                                         
                }else{ 
                    /*<Respuesta>*/
                        $('#message-error-door2door').html('');
                        $('#message-error-door2door').html('¡INTÉNTELO MÁS TARDE! ERROR EN LA ACTUALIZACIÓN.');
                        $('#modal-message-error-door2door').modal('show');
                    /*</Respuesta>*/
                }                           
            }).catch( (err) => { 
                /*<Respuesta>*/
                    $('#message-error-door2door').html('');
                    $('#message-error-door2door').html('¡INTÉNTELO MÁS TARDE! ERROR EN LA  ACTUALIZAR.');
                    $('#modal-message-error-door2door').modal('show');
                /*</Respuesta>*/
            });
        }else{
            /*<Respuesta>*/
                $('#message-warning-door2door').html('');
                $('#message-warning-door2door').html('FAVOR DE INTRODUCIR LOS CAMPOS OBLIGATORIOS');
                $('#modal-message-warning-door2door').modal('show')
            /*</Respuesta>*/

            /*<Respuesta>*/ 

                $('#create-usuario-door2door').addClass("is-invalid"); 
                $('#create-contrasena-door2door').addClass("is-invalid"); 
                $('#create-servidorssalida-door2door').addClass("is-invalid");
                $('#create-puerto-door2door').addClass("is-invalid");
                
            /*</Respuesta>*/     
        }
    
    }
    /*<export>*/
        export default create;
    /*</export>*/
/*<create>*/
