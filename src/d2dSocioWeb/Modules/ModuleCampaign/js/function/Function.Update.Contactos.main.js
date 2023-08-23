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
    import UpdateAPI        from '../API/API.Update.Contactos.main.js';
    import SelectFull       from '../API/API.SelectFull.Contactos.main.js';
    import functionShow     from './Function.Show.Contactos.main.js';
    import DataTableV       from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
/*</import>*/    

/*<actualizar>*/           
    const Update = async() => { 
        /*<CARGAR SHOW>*/
            $('#id-main').addClass('opacidad');
            $('#body-main-div').show();
            $('#body-main-div').addClass('body-main');
        /*</CARGAR SHOW>*/

        /*<Captura>*/
            let nombre                  =   $('#actualizar-contactos-nombre-door2door').val().replace(/['"`]/, '');
            let calle                   =   $('#actualizar-contactos-calle-door2door').val().replace(/['"`]/, '');
            let telefono                =   $('#actualizar-contactos-telefono-door2door').val().replace(/['"`]/, '');
            let noexterior              =   $('#actualizar-contactos-noexterior-door2door').val().replace(/['"`]/, '');
            let nointerior              =   $('#actualizar-contactos-nointerior-door2door').val().replace(/['"`]/, '');
            let codigopostal            =   $('#actualizar-contactos-codigopostal-door2door').val().replace(/['"`]/, '');
            let colonia                 =   $('#actualizar-contactos-colonia-door2door').val().replace(/['"`]/, '');
            let instrucciones           =   $('#actualizar-contactos-instrucciones-door2door').val().replace(/['"`]/, '');
            let email                   =   $('#actualizar-contactos-email-door2door').val().replace(/['"`]/, '');
            let idCampana               =   $('#update-id-door2door').val()


            let idPais                  =   $('#actualizar-contactos-pais-door2door').val()
            let idEstados               =   $('#actualizar-contactos-estado-door2door').val()
            let idMunicipio             =   $('#actualizar-contactos-municipio-door2door').val()

            /*<Eliminamos caracteres extraños>*/
                $('#actualizar-contactos-nombre-door2door').val(nombre);
                $('#actualizar-contactos-calle-door2door').val(calle);
                $('#actualizar-contactos-telefono-door2door').val(telefono);
                $('#actualizar-contactos-noexterior-door2door').val(noexterior);
                $('#actualizar-contactos-nointerior-door2door').val(nointerior);
                $('#actualizar-contactos-codigopostal-door2door').val(codigopostal);
                $('#actualizar-contactos-colonia-door2door').val(colonia);
                $('#actualizar-contactos-email-door2door').val(email);
                $('#actualizar-contactos-instrucciones-door2door').val(instrucciones);
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
                    let PlataformaForm = new FormData(document.getElementById("form-actualizar-contactos-door2door")); 

                    let estado =  $('#actualizar-contactos-estado-door2door').val();
                    PlataformaForm.append("actualizar-contactos-estado-door2door",estado);  

                    let pais =  $('#actualizar-contactos-pais-door2door').val();
                    PlataformaForm.append("actualizar-contactos-pais-door2door",pais);  
                    

                    let municipio =  $('#actualizar-contactos-municipio-door2door').val();
                    PlataformaForm.append("actualizar-contactos-municipio-door2door",municipio);  
                    

                    let colonia =  $('#actualizar-contactos-colonia-door2door').val();
                    PlataformaForm.append("actualizar-contactos-colonia-door2door",colonia);   
                    console.log("###>>");
                    const ResultactualizarAPI= UpdateAPI( PlataformaForm ).
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
                                $('#message-succes-door2door').html('CREACIÓN EXITOSA');
                                $('#modal-message-succes-door2door').modal('show'); 
                                
                                $('#modal-contactos-actualizar-door2door').modal('hide');                               
                            /*</Respuesta>*/   

                                $('#actualizar-contactos-nombre-door2door').removeClass('is-invalid');
                                $('#actualizar-contactos-calle-door2door').removeClass('is-invalid'); 
                                $('#actualizar-contactos-colonia-door2door').removeClass('is-invalid');
                                $('#actualizar-contactos-noexterior-door2door').removeClass('is-invalid');
                                $('#actualizar-contactos-codigopostal-door2door').removeClass('is-invalid');
                                $('#actualizar-contactos-telefono-door2door').removeClass('is-invalid'); 
                                $('#actualizar-contactos-pais-door2door').removeClass('is-invalid');
                                $('#actualizar-contactos-estado-door2door').removeClass('is-invalid');
                                $('#actualizar-contactos-municipio-door2door').removeClass('is-invalid');
                            
                            /*<Consultar toda la iformacion>*/ 
                              
                                let idCampana       = $('#update-id-door2door').val();
                               
                                const functionSFA   = SelectFull(idCampana).
                                then( (result) => {       console.log(result)
                                    if(result){                                                                    
                                        if(result.message == 'Good'){
                                            /*<Consulta exitosa>*/
                                                let ArraysRoles     = [];
                                                ArraysRoles         = result.information;                                 
                                                const functionS     = functionShow(ArraysRoles);  

                                                $('#actualizar-contactos-nombre-door2door').val('');
                                                $('#actualizar-contactos-calle-door2door').val('');
                                                $('#actualizar-contactos-colonia-door2door').val('');
                                                $('#actualizar-contactos-noexterior-door2door').val('');
                                                $('#actualizar-contactos-nointerior-door2door').val('');
                                                $('#actualizar-contactos-codigopostal-door2door').val('');
                                                $('#actualizar-contactos-entreCalle-door2door').val('');
                                                
                                                $('#actualizar-contactos-instrucciones-door2door').val('');
                                                $('#actualizar-contactos-telefono-door2door').val('');
                                                $('#actualizar-contactos-email-door2door').val('');
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
                                $('#message-warning-door2door').html('¡INTÉNTELO MÁS TARDE! warning AL CREAR.');
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
            
            if( nombre          == '' ){$('#actualizar-contactos-nombre-door2door').addClass('is-invalid');         }
            if( calle           == '' ){$('#actualizar-contactos-calle-door2door').addClass('is-invalid');          }
            if( colonia         == '' ){$('#actualizar-contactos-colonia-door2door').addClass('is-invalid');        }
            if( noexterior      == '' ){$('#actualizar-contactos-noexterior-door2door').addClass('is-invalid');     }
            if( codigopostal    == '' ){$('#actualizar-contactos-codigopostal-door2door').addClass('is-invalid');   }
            if( telefono        == '' ){$('#actualizar-contactos-telefono-door2door').addClass('is-invalid');       }

            if( idPais          > 0    || 
                idPais          != '' ){$('#actualizar-contactos-pais-door2door').addClass('is-invalid');           }

            if( idEstados       > 0    || 
                idEstados       != '' ){$('#actualizar-contactos-estado-door2door').addClass('is-invalid');         }

            if( idMunicipio     > 0    ||
                idMunicipio     != '' ){$('#actualizar-contactos-municipio-door2door').addClass('is-invalid');      }


            
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
        export default Update;
    /*</export>*/
/*</actualizar>*/  
