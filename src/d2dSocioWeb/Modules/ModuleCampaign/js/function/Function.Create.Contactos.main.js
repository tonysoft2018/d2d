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

/*<import>*/    
    import CreateAPI        from '../API/API.Create.Contactos.main.js';
    import SelectFull       from '../API/API.SelectFull.Contactos.main.js';
    import functionShow     from './Function.Show.Contactos.main.js';
    import DataTableV       from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
/*</import>*/    

/*<Create>*/           
    const Create = async() => { 
        /*<CARGAR SHOW>*/
            $('#id-main').addClass('opacidad');
            $('#body-main-div').show();
            $('#body-main-div').addClass('body-main');
        /*</CARGAR SHOW>*/

        /*<Captura>*/
            let nombre                  =   $('#create-contactos-nombre-door2door').val().replace(/['"`]/, '');
            let calle                   =   $('#create-contactos-calle-door2door').val().replace(/['"`]/, '');
            let telefono                =   $('#create-contactos-telefono-door2door').val().replace(/['"`]/, '');
            let noexterior              =   $('#create-contactos-noexterior-door2door').val().replace(/['"`]/, '');
            let nointerior              =   $('#create-contactos-nointerior-door2door').val().replace(/['"`]/, '');
            let codigopostal            =   $('#create-contactos-codigopostal-door2door').val().replace(/['"`]/, '');
            let colonia                 =   $('#create-contactos-colonia-door2door').val().replace(/['"`]/, '');
            let instrucciones           =   $('#create-contactos-instrucciones-door2door').val().replace(/['"`]/, '');
            let email                   =   $('#create-contactos-email-door2door').val().replace(/['"`]/, '');
            let idCampana               =   $('#update-id-door2door').val()


            let idPais                  =   $('#create-contactos-pais-door2door').val()
            let idEstados               =   $('#create-contactos-estado-door2door').val()
            let idMunicipio             =   $('#create-contactos-municipio-door2door').val()

            /*<Eliminamos caracteres extraños>*/
                $('#create-contactos-nombre-door2door').val(nombre);
                $('#create-contactos-calle-door2door').val(calle);
                $('#create-contactos-telefono-door2door').val(telefono);
                $('#create-contactos-noexterior-door2door').val(noexterior);
                $('#create-contactos-nointerior-door2door').val(nointerior);
                $('#create-contactos-codigopostal-door2door').val(codigopostal);
                $('#create-contactos-colonia-door2door').val(colonia);
                $('#create-contactos-email-door2door').val(email);
                $('#create-contactos-instrucciones-door2door').val(instrucciones);
            /*<Eliminamos caracteres extraños>*/

        /*</Captura>*/
        
       
        
        if(
            nombre          != ''   &&            
            calle           != ''   &&  
            colonia         != ''   &&  
            noexterior      != ''   &&  
            codigopostal    != ''   &&  
        
            telefono        != ''   &&  
                    
            idCampana       > 0     && 
            idPais          > 0     && 
            idEstados       > 0     && 
            idMunicipio     > 0      

        ){
            /*<Var>*/
                let Accoun = 0;
                let ResultName= '';
            /*</Var>*/

            
            
            /*<Validar>*/
                    let PlataformaForm = new FormData(document.getElementById("form-contactos-door2door")); 

                    let estado =  $('#create-contactos-estado-door2door').val();
                    PlataformaForm.append("create-contactos-estado-door2door",estado);  

                    let pais =  $('#create-contactos-pais-door2door').val();
                    PlataformaForm.append("create-contactos-pais-door2door",pais);  
                    

                    let municipio =  $('#create-contactos-municipio-door2door').val();
                    PlataformaForm.append("create-contactos-municipio-door2door",municipio);  
                    

                    let colonia =  $('#create-contactos-colonia-door2door').val();
                    PlataformaForm.append("create-contactos-colonia-door2door",colonia);   
                    console.log("###>>");
                    const ResultCreateAPI= CreateAPI( PlataformaForm ).
                    then((result) =>  
                    {   console.log(result);
                        if(result.message == 'Good'){ 

                            /*<CARGAR HIDE>*/
                                $('#id-main').removeClass('opacidad');
                                $('#body-main-div').removeClass('body-main');
                                $('#body-main-div').hide();
                            /*</CARGAR HIDE>*/
                           
                            /*<Respuesta>*/
                                $('#message-succes-door2door').html("");
                                $('#message-succes-door2door').html('CREACIÓN EXITOSA<br>');
                                $('#modal-message-succes-door2door').modal('show'); 
                                
                                $('#modal-contactos-crear-door2door').modal('hide');                               
                            /*</Respuesta>*/   

                                $('#create-contactos-nombre-door2door').removeClass('is-invalid');
                                $('#create-contactos-calle-door2door').removeClass('is-invalid'); 
                                $('#create-contactos-colonia-door2door').removeClass('is-invalid');
                                $('#create-contactos-noexterior-door2door').removeClass('is-invalid');
                                $('#create-contactos-codigopostal-door2door').removeClass('is-invalid');
                                $('#create-contactos-telefono-door2door').removeClass('is-invalid'); 
                                $('#create-contactos-pais-door2door').removeClass('is-invalid');
                                $('#create-contactos-estado-door2door').removeClass('is-invalid');
                                $('#create-contactos-municipio-door2door').removeClass('is-invalid');
                            
                            /*<Consultar toda la iformacion>*/ 
                              
                                let idCampana       = $('#update-id-door2door').val();
                               
                                const functionSFA   = SelectFull(idCampana).
                                then( (result) => {       
                                    if(result){                                                                    
                                        if(result.message == 'Good'){
                                            /*<Consulta exitosa>*/
                                                let ArraysRoles     = [];
                                                ArraysRoles         = result.information;                                 
                                                const functionS     = functionShow(ArraysRoles);  

                                                $('#create-contactos-nombre-door2door').val('');
                                                $('#create-contactos-calle-door2door').val('');
                                                $('#create-contactos-colonia-door2door').val('');
                                                $('#create-contactos-noexterior-door2door').val('');
                                                $('#create-contactos-nointerior-door2door').val('');
                                                $('#create-contactos-codigopostal-door2door').val('');
                                                $('#create-contactos-entreCalle-door2door').val('');
                                                
                                                $('#create-contactos-instrucciones-door2door').val('');
                                                $('#create-contactos-telefono-door2door').val('');
                                                $('#create-contactos-email-door2door').val('');
                                            /*<Consulta exitosa>*/                        
                                        }else{
                                            /*<warning de query>*/ 
                                                $('#message-warning-door2door').html("");
                                                $('#message-warning-door2door').html('¡warning AL RECARGAR LA PAGUINA!');
                                                $('#modal-message-warning-door2door').modal('show');
                                            /*</warning de query>*/   
                                        }       
                                    }                           
                                }).catch( (err) => {                                         
                                    /*<warning desconocido>*/
                                        $('#message-warning-door2door').html("");
                                        $('#message-warning-door2door').html('¡warning AL RECARGAR LA PAGUINA!');
                                        $('#modal-message-warning-door2door').modal('show');
                                    /*<warning desconocido>*/
                                });
                            /*<Consultar toda la iformacion>*/                                                            
                        }else{ 
                            /*<Respuesta>*/
                                $('#message-warning-door2door').html('');
                                $('#message-warning-door2door').html('¡CONTACTO REPETIDO O GEOLOCALIZACIÓN NO ENCONTRADA');
                                $('#modal-message-warning-door2door').modal('show');
                            /*</Respuesta>*/
                            /*<CARGAR HIDE>*/
                                $('#id-main').removeClass('opacidad');
                                $('#body-main-div').removeClass('body-main');
                                $('#body-main-div').hide();
                            /*</CARGAR HIDE>*/
                        }                           
                    }).catch( (err) => { 
                        /*<Respuesta>*/
                            $('#message-warning-door2door').html('');
                            $('#message-warning-door2door').html('¡INTÉNTELO MÁS TARDE! warning AL CREAR.');
                            $('#modal-message-warning-door2door').modal('show');
                        /*</Respuesta>*/
                        /*<CARGAR HIDE>*/
                            $('#id-main').removeClass('opacidad');
                            $('#body-main-div').removeClass('body-main');
                            $('#body-main-div').hide();
                        /*</CARGAR HIDE>*/
                    });
                
            /*</Validar>*/
        }else{

            /*<CARGAR HIDE>*/
                $('#id-main').removeClass('opacidad');
                $('#body-main-div').removeClass('body-main');
                $('#body-main-div').hide();
            /*</CARGAR HIDE>*/
            
            if( nombre          == '' ){$('#create-contactos-nombre-door2door').addClass('is-invalid');         }
            if( calle           == '' ){$('#create-contactos-calle-door2door').addClass('is-invalid');          }
            if( colonia         == '' ){$('#create-contactos-colonia-door2door').addClass('is-invalid');        }
            if( noexterior      == '' ){$('#create-contactos-noexterior-door2door').addClass('is-invalid');     }
            if( codigopostal    == '' ){$('#create-contactos-codigopostal-door2door').addClass('is-invalid');   }
            if( telefono        == '' ){$('#create-contactos-telefono-door2door').addClass('is-invalid');       }

            if( idPais          > 0    || 
                idPais          != '' ){$('#create-contactos-pais-door2door').addClass('is-invalid');           }

            if( idEstados       > 0    || 
                idEstados       != '' ){$('#create-contactos-estado-door2door').addClass('is-invalid');         }

            if( idMunicipio     > 0    ||
                idMunicipio     != '' ){$('#create-contactos-municipio-door2door').addClass('is-invalid');      }


            
            /*<Respuesta >*/
                $('#message-warning-door2door').html('');
                $('#message-warning-door2door').html('FAVOR DE INTRODUCIR LOS CAMPOS OBLIGATORIOS');
                $('#modal-message-warning-door2door').modal('show')
            /*</Respuesta>*/

            /*<Respuesta>*/
            /*</Respuesta>*/             
        }                
    }
    /*<export>*/
        export default Create;
    /*</export>*/
/*</Create>*/  
