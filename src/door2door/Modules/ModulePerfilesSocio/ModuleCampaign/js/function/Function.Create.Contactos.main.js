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
/*</import>*/    

/*<Create>*/           
    const Create = async() => { 
        /*<Captura>*/
            let nombre                  =   $('#create-contactos-nombre-door2door').val().replace(/['"`]/, '');
            let calle                   =   $('#create-contactos-calle-door2door').val().replace(/['"`]/, '');
            let telefono                =   $('#create-contactos-telefono-door2door').val().replace(/['"`]/, '');
            let noexterior              =   $('#create-contactos-noexterior-door2door').val().replace(/['"`]/, '');
            let nointerior              =   $('#create-contactos-nointerior-door2door').val().replace(/['"`]/, '');
            let codigopostal            =   $('#create-contactos-codigopostal-door2door').val().replace(/['"`]/, '');
            let colonia                 =   $('#create-contactos-colonia-door2door').val().replace(/['"`]/, '');
            let idCampana               =   $('#update-id-door2door').val()

            /*<Eliminamos caracteres extraños>*/
                $('#create-contactos-nombre-door2door').val(nombre);
                $('#create-contactos-calle-door2door').val(calle);
                $('#create-contactos-telefono-door2door').val(telefono);
                $('#create-contactos-noexterior-door2door').val(noexterior);
                $('#create-contactos-nointerior-door2door').val(nointerior);
                $('#create-contactos-codigopostal-door2door').val(codigopostal);
                $('#create-contactos-colonia-door2door').val(colonia);
            /*<Eliminamos caracteres extraños>*/
        /*</Captura>*/
        
        /*<Consulta Datos>*/
             const ResultSelectFull = await SelectFull(idCampana);
        /*</Consulta Datos>*/
        
        if( ResultSelectFull.message == 'Good' ){     
            /*<ResultSelectFull>*/   
                let ArrayData = ResultSelectFull.information;
            /*</ResultSelectFull>*/
            if(nombre != '' && idCampana > 0){
                /*<Var>*/
                    let Accoun = 0;
                    let ResultName= '';
                /*</Var>*/

                /*<Recorrer>*/
                    for(let i = 0; i< ArrayData.length; i++){
                        if(ArrayData[i].nombre == nombre ){
                            Accoun++; 
                            ResultName += 'EL NOMBRE ¡"'+nombre+'" SE ENCUENTRA EN USO';
                        }            
                    }
                /*</Recorrer>*/
                
                /*<Validar>*/
                    if( Accoun == 0 ){     
                        let PlataformaForm = new FormData(document.getElementById("form-contactos-door2door")); 

                        let estado =  $('#create-contactos-estado-door2door').val();
                        PlataformaForm.append("create-contactos-estado-door2door",estado);  

                        let pais =  $('#create-contactos-pais-door2door').val();
                        PlataformaForm.append("create-contactos-pais-door2door",pais);  
                        

                        let municipio =  $('#create-contactos-municipio-door2door').val();
                        PlataformaForm.append("create-contactos-municipio-door2door",municipio);  
                        

                         let colonia =  $('#create-contactos-colonia-door2door').val();
                        PlataformaForm.append("create-contactos-colonia-door2door",colonia);   

                        const ResultCreateAPI= CreateAPI( PlataformaForm ).
                        then((result) => {    console.log(result)          
                            if(result.message == 'Good'){ 
                                /*<Respuesta>*/
                                    $('#message-succes-door2door').html("");
                                    $('#message-succes-door2door').html('CREACIÓN EXITOSA');
                                    $('#modal-message-succes-door2door').modal('show'); 
                                    
                                    $('#modal-create-door2door').modal('hide'); 
                                    
                                    $('#create-nombre-door2door').val('');
                                    $('#create-descripcion-door2door').val('');
                                    $('#create-descripcionrecoleccion-contrasena-door2door').val('');
                                   
                                /*</Respuesta>*/   

                                /*<Consultar toda la iformacion>*/ 
                                    let idCampana = $('#update-id-door2door').val();
                                    const functionSFA = SelectFull(idCampana).
                                    then( (result) => {       console.log(result)
                                        if(result){                                                                    
                                            if(result.message == 'Good'){
                                                /*<Consulta exitosa>*/
                                                    let ArraysRoles = [];
                                                    ArraysRoles = result.information;                                 
                                                    const functionS = functionShow(ArraysRoles);  

                                                    $('#create-contactos-nombre-door2door').val('');
                                                    $('#create-contactos-calle-door2door').val('');
                                                    $('#create-contactos-telefono-door2door').val('');
                                                    $('#create-contactos-noexterior-door2door').val('');
                                                    $('#create-contactos-nointerior-door2door').val('');
                                                    $('#create-contactos-codigopostal-door2door').val('');
                                                    $('#create-contactos-colonia-door2door').val('');
                                                    $('#create-contactos-deuda-door2door').val('');
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
                                        /*<Error desconocido>*/
                                            $('#message-error-door2door').html("");
                                            $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                            $('#modal-message-error-door2door').modal('show');
                                        /*<Error desconocido>*/
                                    });
                                /*<Consultar toda la iformacion>*/                                                            
                            }else{ 
                                /*<Respuesta>*/
                                    $('#message-error-door2door').html('');
                                    $('#message-error-door2door').html('¡INTÉNTELO MÁS TARDE! ERROR AL CREAR.');
                                    $('#modal-message-error-door2door').modal('show');
                                /*</Respuesta>*/
                            }                           
                        }).catch( (err) => { 
                            /*<Respuesta>*/
                                $('#message-error-door2door').html('');
                                $('#message-error-door2door').html('¡INTÉNTELO MÁS TARDE! ERROR AL CREAR.');
                                $('#modal-message-error-door2door').modal('show');
                            /*</Respuesta>*/
                        });
                    }else{
                        /*<Respuesta>*/
                            $('#message-error-door2door').html('');
                            $('#message-error-door2door').html('¡INTÉNTELO MÁS TARDE!');
                            $('#modal-message-error-door2door').modal('show');
                        /*</Respuesta>*/                  
                    }
                /*</Validar>*/
            }else{
                /*<Respuesta >*/
                    $('#message-warning-door2door').html('');
                    $('#message-warning-door2door').html('FAVOR DE INTRODUCIR LOS CAMPOS OBLIGATORIOS');
                    $('#modal-message-warning-door2door').modal('show')
                /*</Respuesta>*/

                /*<Respuesta>*/
                    $('#nombre-create-door2door').addClass("is-invalid");   
                /*</Respuesta>*/             
            }                        
        }else{
            /*<Error al cargar la nueva informacion>*/
                $('#message-error-door2door').html('');
                $('#message-error-door2door').html('¡INTÉNTELO MÁS TARDE!');
                $('#modal-message-error-door2door').modal('show');
            /*<Error al cargar la nueva informacion>*/
        }        
    }
    /*<export>*/
        export default Create;
    /*</export>*/
/*</Create>*/  
