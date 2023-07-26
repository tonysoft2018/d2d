
/*<import>*/    
    import UpdateAPI        from '../API/API.Update.main.js';
    import SelectFull       from '../API/API.SelectFull.main.js';
    import functionShow     from './Function.Show.main.js';
    import DataTableV       from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
/*</import>*/    


/*<Update>*/   
    const Update = async(ArraysDatos) => { 
       /*<Captura>*/
            let id              =   $('#update-id-door2door').val();
            let nombre          =   $('#update-nombre-door2door').val().replace(/['"`]/, '');
            
            /*<Eliminamos caracteres extraños>*/
                $('#update-nombre-door2door').val(nombre);              
            /*<Eliminamos caracteres extraños>*/
        /*</Captura>*/
        if(nombre != '' && id > 0 ){         
            let informationForm = new FormData(document.getElementById("form-update-door2door"));  
            const ResultUpdateAPI = await UpdateAPI( informationForm ).
            then((result) => {  console.log(result)                       
                if(result.message == 'Good'){
                    /*<Respuesta>*/
                        $('#message-succes-door2door').html("");
                        $('#message-succes-door2door').html('ACTUALIZACIÓN EXITOSA');
                        $('#modal-message-succes-door2door').modal('show');                             

                    
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
            /*<Respuesta>*/
                $('#message-warning-door2door').html('');
                $('#message-warning-door2door').html('FAVOR DE INTRODUCIR LOS CAMPOS OBLIGATORIOS');
                $('#modal-message-warning-door2door').modal('show')
            /*</Respuesta>*/

            /*<Respuesta>*/ 

                $('#update-nombre-door2door').addClass("is-invalid"); 
                $('#update-descripcion-door2door').addClass("is-invalid"); 
                $('#update-imagen-contrasena-door2door').addClass("is-invalid");
                
            /*</Respuesta>*/     
        }
    
    }
    /*<export>*/
        export default Update;
    /*</export>*/
/*<Update>*/