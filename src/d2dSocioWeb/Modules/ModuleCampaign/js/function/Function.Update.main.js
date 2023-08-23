
/*<import>*/    
    import UpdateAPI        from '../API/API.Update.main.js';
    import SelectFull       from '../API/API.SelectFull.main.js';
    import functionShow     from './Function.Show.main.js';
    import DataTableV       from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
/*</import>*/    


/*<Update>*/   
    const Update = async(ArraysDatos) => { 
        /*<CARGAR SHOW>*/
            $('#id-main').addClass('opacidad');
            $('#body-main-div').show();
            $('#body-main-div').addClass('body-main');
        /*</CARGAR SHOW>*/
       /*<Captura>*/
            let id                  =   $('#update-id-door2door').val();
            let nombre                  =   $('#update-nombre-door2door').val().replace(/['"`]/, '');
            let descripcion             =   $('#update-descripcion-door2door').val().replace(/['"`]/, '');
            let tipocampana             =   $('#update-tipocampana-door2door').val().replace(/['"`]/, '');
            let descripcionrecoleccion  =   $('#update-descripcionrecoleccion-door2door').val().replace(/['"`]/, '');
            
            /*<Eliminamos caracteres extraños>*/
                $('#update-nombre-door2door').val(nombre);
                $('#update-descripcion-door2door').val(descripcion);
                $('#update-tipocampana-contrasena-door2door').val(tipocampana);
                $('#update-descripcionrecoleccion-door2door').val(descripcionrecoleccion);
            /*<Eliminamos caracteres extraños>*/
        /*</Captura>*/
        if(nombre != '' && id > 0 ){         
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
                                ArrayData[i].idCampana  != id && 
                                ArrayData[i].nombre    == nombre 
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
                                 /*<CARGAR HIDE>*/
                                    $('#id-main').removeClass('opacidad');
                                    $('#body-main-div').removeClass('body-main');
                                    $('#body-main-div').hide();
                                /*</CARGAR HIDE>*/
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
                                                 /*<CARGAR HIDE>*/
                                                    $('#id-main').removeClass('opacidad');
                                                    $('#body-main-div').removeClass('body-main');
                                                    $('#body-main-div').hide();
                                                /*</CARGAR HIDE>*/
                                                /*<warning de query>*/ 
                                                    $('#message-warning-door2door').html("");
                                                    $('#message-warning-door2door').html('¡warning AL RECARGAR LA PAGUINA!');
                                                    $('#modal-message-warning-door2door').modal('show');
                                                /*</warning de query>*/  
                                            }       
                                        }                           
                                    }).catch( (err) => { 
                                        /*<CARGAR HIDE>*/
                                            $('#id-main').removeClass('opacidad');
                                            $('#body-main-div').removeClass('body-main');
                                            $('#body-main-div').hide();
                                        /*</CARGAR HIDE>*/
                                        /*<warning de query>*/ 
                                            $('#message-warning-door2door').html("");
                                            $('#message-warning-door2door').html('¡warning AL RECARGAR LA PAGUINA!');
                                            $('#modal-message-warning-door2door').modal('show');
                                        /*</warning de query>*/ 
                                    });
                                /*<Consultar toda la iformacion>*/                                                            
                            }else{ 
                                 /*<CARGAR HIDE>*/
                                 $('#id-main').removeClass('opacidad');
                                 $('#body-main-div').removeClass('body-main');
                                 $('#body-main-div').hide();
                             /*</CARGAR HIDE>*/
                                /*<Respuesta>*/
                                    $('#message-warning-door2door').html('');
                                    $('#message-warning-door2door').html('¡INTÉNTELO MÁS TARDE! warning EN LA ACTUALIZACIÓN.');
                                    $('#modal-message-warning-door2door').modal('show');
                                /*</Respuesta>*/
                            }                           
                        }).catch( (err) => {
                             /*<CARGAR HIDE>*/
                             $('#id-main').removeClass('opacidad');
                             $('#body-main-div').removeClass('body-main');
                             $('#body-main-div').hide();
                         /*</CARGAR HIDE>*/ 
                            /*<Respuesta>*/
                                $('#message-warning-door2door').html('');
                                $('#message-warning-door2door').html('¡INTÉNTELO MÁS TARDE! warning EN LA  ACTUALIZAR.');
                                $('#modal-message-warning-door2door').modal('show');
                            /*</Respuesta>*/
                        });
                    }else{
                        /*<CARGAR HIDE>*/
                            $('#id-main').removeClass('opacidad');
                            $('#body-main-div').removeClass('body-main');
                            $('#body-main-div').hide();
                        /*</CARGAR HIDE>*/
                        $('#message-warning-door2door').html('');
                        $('#message-warning-door2door').html(ResultName);
                        $('#modal-message-warning-door2door').modal('show');
                    }
                /*</Validacion>*/
            
            }else{
                /*<CARGAR HIDE>*/
                    $('#id-main').removeClass('opacidad');
                    $('#body-main-div').removeClass('body-main');
                    $('#body-main-div').hide();
                /*</CARGAR HIDE>*/
                /*<Respuesta>*/
                    $('#message-warning-door2door').html('');
                    $('#message-warning-door2door').html('¡INTÉNTELO MÁS TARDE!');
                    $('#modal-message-warning-door2door').modal('show')
                /*</Respuesta>*/

            }
        }else{
            /*<CARGAR HIDE>*/
                $('#id-main').removeClass('opacidad');
                $('#body-main-div').removeClass('body-main');
                $('#body-main-div').hide();
            /*</CARGAR HIDE>*/
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
