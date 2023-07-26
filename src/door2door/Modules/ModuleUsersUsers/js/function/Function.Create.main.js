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
    import CreateAPI        from '../API/API.Create.main.js';
    import SelectFull       from '../API/API.SelectFull.main.js';
    import functionShow     from './Function.Show.main.js';
    import DataTableV       from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
/*</import>*/    

/*<Create>*/           
    const Create = async() => { 
        /*<Captura>*/
            let user            =   $('#create-usuario-door2door').val().replace(/['"`]/, '');
            let password1       =   $('#create-contrasena-door2door').val().replace(/['"`]/, '');
            let password2       =   $('#create-repetir-contrasena-door2door').val().replace(/['"`]/, '');
            let email           =   $('#create-email-door2door').val().replace(/['"`]/, '');
            let name            =   $('#create-nombre-door2door').val().replace(/['"`]/, '');
            let apellidos       =   $('#create-apellidos-door2door').val().replace(/['"`]/, '');
           
            /*<Eliminamos caracteres extraños>*/
                $('#create-usuario-door2door').val(user);
                $('#create-contrasena-door2door').val(password1);
                $('#create-repetir-contrasena-door2door').val(password2);
                $('#create-email-door2door').val(email);
                $('#create-nombre-door2door').val(name);
                $('#create-apellidos-door2door').val(apellidos);
            /*<Eliminamos caracteres extraños>*/
        /*</Captura>*/
        
        /*<Consulta Datos>*/
             const ResultSelectFull = await SelectFull();
        /*</Consulta Datos>*/
        
        if( ResultSelectFull.message == 'Good' ){     
            /*<ResultSelectFull>*/   
                let ArrayData = ResultSelectFull.information;
            /*</ResultSelectFull>*/
            if(name != '' && apellidos != '' && email != '' && password1 != '' && password2 != ''){
                /*<Var>*/
                    let Accoun = 0;
                    let ResultName= '';
                /*</Var>*/

                /*<Recorrer>*/
                    for(let i = 0; i< ArrayData.length; i++){
                        if(ArrayData[i].usuario == user && ArrayData[i].nombre == name && ArrayData[i].email == email){
                            Accoun++; 
                            ResultName += 'EL NOMBRE ¡"'+name+'" SE ENCUENTRA EN USO';
                        }            
                    }
                /*</Recorrer>*/
                
                /*<Validar>*/
                    if( Accoun == 0 ){     
                        let informationForm = new FormData(document.getElementById("form-create-door2door")); 
                        const ResultCreateAPI= CreateAPI( informationForm ).
                        then((result) => {    console.log(result)          
                            if(result.message == 'Good'){ 
                                /*<Respuesta>*/
                                    $('#message-succes-door2door').html("");
                                    $('#message-succes-door2door').html('CREACIÓN EXITOSA');
                                    $('#modal-message-succes-door2door').modal('show'); 
                                    
                                    $('#modal-create-door2door').modal('hide'); 
                                    
                                    $('#create-usuario-door2door').val('');
                                    $('#create-contrasena-door2door').val('');
                                    $('#create-repetir-contrasena-door2door').val('');
                                    $('#create-email-door2door').val('');
                                    $('#create-nombre-door2door').val('');
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
