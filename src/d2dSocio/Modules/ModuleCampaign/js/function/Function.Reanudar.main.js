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
    const reanudar = async() => {  console.log("Hola")
        let id = $('#reanudar-id-door2door').val();
        if(id > 0){
            /*<reanudar>*/
                let informationForm = new FormData(document.getElementById("form-reanudar-door2door")); 
                const Result = await reanudarAPI(informationForm).
                then((result)=> {  console.log(result);
                    if(result.message == 'Good'){
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
                                        /*<Error de query>*/ 
                                            $('#message-error-door2door').html("");
                                            $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                            $('#modal-message-error-door2door').modal('show');
                                        /*</Error de query>*/  
                                    }       
                                }else{

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
                            $('#message-error-door2door').html('¡INTÉNTELO MÁS TARDE!  ERROR AL ELIMINAR');
                            $('#modal-message-error-door2door').modal('show');
                        /*</Respuesta>*/ 

                    }
                }).catch((error) => {
                    /*<Respuesta>*/
                        $('#message-error-door2door').html('');
                        $('#message-error-door2door').html('¡INTÉNTELO MÁS TARDE!');
                        $('#modal-message-error-door2door').modal('show');
                    /*</Respuesta>*/ 
                });
            /*</reanudar>*/         
        }else{
            /*<Respuesta>*/
                $('#message-error-door2door').html('');
                $('#message-error-door2door').html('¡INTÉNTELO MÁS TARDE!');
                $('#modal-message-error-door2door').modal('show');
            /*</Respuesta>*/ 
        }
    }
       
    /*<export>*/
        export default reanudar;
    /*</export>*/
/*</reanudar>*/  
