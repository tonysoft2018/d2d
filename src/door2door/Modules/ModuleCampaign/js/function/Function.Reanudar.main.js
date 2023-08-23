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
    import reanudarAPI      from '../API/API.Reanudar.main.js';
    import SelectFull       from '../API/API.SelectFull.main.js';
    import functionShow     from './Function.Show.main.js';
    import DataTableV       from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
/*</import>*/    
/*</import>*/

/*<reanudar>*/  
    const reanudar = async() => {  
        /*<CARGAR SHOW>*/
            $('#id-main').addClass('opacidad');
            $('#body-main-div').show();
            $('#body-main-div').addClass('body-main');
        /*</CARGAR SHOW>*/
        let id = $('#reanudar-id-door2door').val();
        if(id > 0){
            /*<reanudar>*/
                let informationForm = new FormData(document.getElementById("form-reanudar-door2door")); 
                const Result = await reanudarAPI(informationForm).
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
                            $('#modal-reanudar-door2door').modal('hide'); 
                        /*</Respuesta>*/     
                        /*<Consultar toda la iformacion>*/ 
                            const functionSFA = SelectFull().
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
            /*</reanudar>*/         
        }else{
            /*<Respuesta>*/
                $('#message-warning-door2door').html('');
                $('#message-warning-door2door').html('¡INTÉNTELO MÁS TARDE!');
                $('#modal-message-warning-door2door').modal('show');
            /*</Respuesta>*/ 
        }
    }
       
    /*<export>*/
        export default reanudar;
    /*</export>*/
/*</reanudar>*/  
