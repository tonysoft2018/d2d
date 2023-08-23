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
    import DeleteAPI        from '../API/API.Delete.Contactos.main.js';
    import SelectFull       from '../API/API.SelectFull.Contactos.main.js';
    import functionShow     from './Function.Show.Contactos.main.js';    
    import DataTableV       from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
/*</import>*/    
/*</import>*/

/*<Delete>*/  
    const Delete = async() => {  
        /*<CARGAR SHOW>*/
            $('#id-main').addClass('opacidad');
            $('#body-main-div').show();
            $('#body-main-div').addClass('body-main');
        /*</CARGAR SHOW>*/
        let id = $('#delete-contacto-id-door2door').val();
        if(id > 0){
            /*<Delete>*/
                let informationForm = new FormData(document.getElementById("form-contacto-delete-door2door")); 
                const Result = await DeleteAPI(informationForm).
                then((result)=> {  console.log(result);
                    if(result.message == 'Good'){
                        /*<CARGAR HIDE>*/
                            $('#id-main').removeClass('opacidad');
                            $('#body-main-div').removeClass('body-main');
                            $('#body-main-div').hide();
                        /*</CARGAR HIDE>*/
                        /*<Respuesta>*/
                            $('#message-succes-door2door').html("");
                            $('#message-succes-door2door').html('PROCESO EXITOSO');
                            $('#modal-message-succes-door2door').modal('show'); 
                            $('#modal-delete-contacto-door2door').modal('hide'); 
                        /*</Respuesta>*/     
                        /*<Consultar toda la iformacion>*/ 
                            let idCampana = $('#update-id-door2door').val();
                            const functionSFA = SelectFull(idCampana).
                            then( (result) => {       console.log(result);
                                if(result){                                                                    
                                    if(result.message == 'Good'){
                                        /*<Consulta exitosa>*/
                                            let ArraysRoles = [];
                                            ArraysRoles = result.information;                               
                                            const functionS = functionShow(ArraysRoles);       
                                        /*<Consulta exitosa>*/                        
                                    }else{
                                        /*<warning de query>*/ 
                                            $('#message-warning-door2door').html("");
                                            $('#message-warning-door2door').html('¡warning AL RECARGAR LA PAGUINA!');
                                            $('#modal-message-warning-door2door').modal('show');
                                        /*</warning de query>*/  
                                    }       
                                }else{

                                }                           
                            }).catch( (err) => { 
                                /*<warning de query>*/ 
                                    $('#message-warning-door2door').html("");
                                    $('#message-warning-door2door').html('¡warning AL RECARGAR LA PAGUINA!');
                                    $('#modal-message-warning-door2door').modal('show');
                                /*</warning de query>*/ 
                            });
                        /*<Consultar toda la iformacion>*/  

                    }else{
                        /*<Respuesta>*/
                            $('#message-warning-door2door').html('');
                            $('#message-warning-door2door').html('¡INTÉNTELO MÁS TARDE!  warning AL ELIMINAR');
                            $('#modal-message-warning-door2door').modal('show');
                        /*</Respuesta>*/ 

                    }
                }).catch((warning) => {
                    /*<Respuesta>*/
                        $('#message-warning-door2door').html('');
                        $('#message-warning-door2door').html('¡INTÉNTELO MÁS TARDE!');
                        $('#modal-message-warning-door2door').modal('show');
                    /*</Respuesta>*/ 
                });
            /*</Delete>*/         
        }else{
            /*<Respuesta>*/
                $('#message-warning-door2door').html('');
                $('#message-warning-door2door').html('¡INTÉNTELO MÁS TARDE!');
                $('#modal-message-warning-door2door').modal('show');
            /*</Respuesta>*/ 
        }
    }
       
    /*<export>*/
        export default Delete;
    /*</export>*/
/*</Delete>*/  
