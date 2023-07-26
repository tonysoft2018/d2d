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
            let nombre          =   $('#create-nombre-door2door').val().replace(/['"`]/, '');
           
           
            /*<Eliminamos caracteres extraños>*/
                $('#create-nombre-door2door').val(nombre);
            /*<Eliminamos caracteres extraños>*/
        /*</Captura>*/
        
        /*<Consulta Datos>*/
             const ResultSelectFull = await SelectFull();
        /*</Consulta Datos>*/
        
        if( ResultSelectFull.message == 'Good' ){     
            /*<ResultSelectFull>*/   
                let ArrayData = ResultSelectFull.information;
            /*</ResultSelectFull>*/
            if(nombre != '' ){
                /*<Var>*/
                    let Accoun = 0;
                    let ResultName= '';
                /*</Var>*/

                /*<Recorrer>*/
                    for(let i = 0; i< ArrayData.length; i++){
                        if(ArrayData[i].nombre == nombre ){
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
                                    
                                    $('#create-nombre-door2door').val('');
                                    $('#create-descripcion-door2door').val('');
                                    $('#create-imagen-door2door').val('');

                                    $('#modal-create-door2door').modal('hide'); 
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
                    $('#create-nombre-door2door').addClass("is-invalid");   
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
