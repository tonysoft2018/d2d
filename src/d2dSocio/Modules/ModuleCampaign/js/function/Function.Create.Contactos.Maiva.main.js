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
    import CreateMasivaAPI        from '../API/API.Create.Contactos.Masiva.main.js';
    import SelectFull       from '../API/API.SelectFull.Contactos.main.js';
    import functionShow     from './Function.Show.Contactos.main.js';
    import DataTableV       from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
/*</import>*/    

/*<Create>*/           
    const Create = async() => { 
        /*<Captura>*/
            let idCampana               =   $('#update-id-door2door').val();
            var fileInput               = document.getElementById('create-cargar-plantilla-door2door');
            var filePath                = fileInput.value;
        /*</Captura>*/

        var allowedExtensions = /(.csv)$/i;
        if(allowedExtensions.exec(filePath) && idCampana > 0){
            /*<ENVIAR INFORMACION>*/
                /*<INFORMACION>*/
                    let PlataformaForm = new FormData(document.getElementById("form-cargar-contactos-door2door")); 
                    PlataformaForm.append("idCampana",idCampana); 
                /*</INFORMACION>*/
                console.log("=>")
                const ResultCreateAPI= CreateMasivaAPI( PlataformaForm ).
                then((result) => {    console.log(result)          
                    if(result.message == 'Good'){ 
                        /*<Respuesta>*/
                            $('#message-succes-door2door').html("");
                            $('#message-succes-door2door').html('CREACIÓN EXITOSA');
                            $('#modal-message-succes-door2door').modal('show'); 
                            
                            $('#modal-cargar-contactos-door2door').modal('hide'); 
                            
                            
                        
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

            /*</ENVIAR INFORMACION>*/   
        }else{
            $('#message-error-door2door').html("");
            $('#message-error-door2door').html('¡SOLO SE ADMITEN ARCHIVOS CSV!');
            $('#modal-message-error-door2door').modal('show');
        }
    }
    /*<export>*/
        export default Create;
    /*</export>*/
/*</Create>*/  
