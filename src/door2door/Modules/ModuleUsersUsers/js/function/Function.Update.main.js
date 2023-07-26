
/*<import>*/    
    import UpdateAPI        from '../API/API.Update.main.js';
    import SelectFull       from '../API/API.SelectFull.main.js';
    import functionShow     from './Function.Show.main.js';
    import DataTableV       from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
/*</import>*/    


/*<Update>*/   
    const Update = async(ArraysDatos) => { 
       /*<Captura>*/
       let id              =   $('#update-id-door2door').val().replace(/['"`]/, '');
       let user            =   $('#update-usuario-door2door').val().replace(/['"`]/, '');       
       let email           =   $('#update-email-door2door').val().replace(/['"`]/, '');
       let name            =   $('#update-nombre-door2door').val().replace(/['"`]/, '');
       let apellidos       =   $('#update-apellidos-door2door').val().replace(/['"`]/, '');
        /*<Captura>*/

       /*<Eliminamos caracteres extraños>*/
           $('#update-usuario-door2door').val(user);
           $('#update-email-door2door').val(email);
           $('#update-nombre-door2door').val(name);
           $('#update-apellidos-door2door').val(apellidos)
       /*<Eliminamos caracteres extraños>*/
   /*</Captura>*/
        if(name != '' && id > 0 ){         
            /*<Consulta Datos>*/
                const ResultSelectFull = await SelectFull();
            /*</Consulta Datos>*/        
            if( ResultSelectFull.message == 'Good' ){     
                /*<ResultSelectFull>*/   
                    let ArrayData = ResultSelectFull.information;
                /*</ResultSelectFull>*/
                
                /*<Var>*/
                    let Accoun = 0;
                    let ResultName= '';
                /*</Var>*/

                /*<Recorrer>*/
                    for(let i = 0; i< ArrayData.length; i++){
                        if(
                                ArrayData[i].idUsuario  != id && 
                                ArrayData[i].usuario    == user && 
                                ArrayData[i].email      == email
                            ){
                                
                            Accoun++; 
                            ResultName += 'EL NOMBRE, USUARIO O CORREO ELECTRÓNICO SE ENCUENTRA EN USO<br>';
                        }            
                    }
                /*</Recorrer>*/
                /*<Validacion>*/
                    if(Accoun == 0){
                        let informationForm = new FormData(document.getElementById("form-update-door2door"));  
                        const ResultUpdateAPI = await UpdateAPI( informationForm ).
                        then((result) => {  console.log(result)                       
                            if(result.message == 'Good'){
                                /*<Respuesta>*/
                                    $('#message-succes-door2door').html("");
                                    $('#message-succes-door2door').html('ACTUALIZACIÓN EXITOSA');
                                    $('#modal-message-succes-door2door').modal('show');      
                                    
                                    $('#update-usuario-door2door').removeClass("is-invalid");                                    
                                    $('#update-email-door2door').removeClass("is-invalid"); 
                                    $('#update-nombre-door2door').removeClass("is-invalid");                                                         
                                    
                                    $('#update-email-door2door').val('');
                                    $('#update-nombre-door2door').val('');
                                    $('#update-tipousuario-door2door').val('');

                                    $('#modal-update-door2door').modal('hide'); 
                                /*</Respuesta>*/     

                                /*<Consultar toda la iformacion>*/ 
                                    const functionSFA = SelectFull().
                                    then( (result) => {      
                                        if(result){                                                                    
                                            if(result.message == 'Good'){
                                                /*<Consulta exitosa>*/
                                                    let ArraysRoles = [];
                                                    ArraysRoles = result.information;                        
                                                    const functionS = functionShow(ArraysRoles);       
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
                        $('#message-warning-door2door').html('');
                        $('#message-warning-door2door').html(ResultName);
                        $('#modal-message-warning-door2door').modal('show');
                    }
                /*</Validacion>*/
            
            }else{
                /*<Respuesta>*/
                    $('#message-warning-door2door').html('');
                    $('#message-warning-door2door').html('¡INTÉNTELO MÁS TARDE!');
                    $('#modal-message-warning-door2door').modal('show')
                /*</Respuesta>*/

            }
        }else{
            /*<Respuesta>*/
                $('#message-warning-door2door').html('');
                $('#message-warning-door2door').html('FAVOR DE INTRODUCIR LOS CAMPOS OBLIGATORIOS');
                $('#modal-message-warning-door2door').modal('show')
            /*</Respuesta>*/

            /*<Respuesta>*/ 

                $('#update-usuario-door2door').addClass("is-invalid"); 
                $('#update-contrasena-door2door').addClass("is-invalid"); 
                $('#update-repetir-contrasena-door2door').addClass("is-invalid"); 
                $('#update-email-door2door').addClass("is-invalid"); 
                $('#update-nombre-door2door').addClass("is-invalid"); 
                $('#update-tipousuario-door2door').addClass("is-invalid"); 
                
            /*</Respuesta>*/     
        }
    
    }
    /*<export>*/
        export default Update;
    /*</export>*/
/*<Update>*/
