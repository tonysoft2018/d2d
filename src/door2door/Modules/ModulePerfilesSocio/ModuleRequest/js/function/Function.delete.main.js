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
import DeleteAPI      from '../API/API.Delete.main.js';
import SelectFull       from '../API/API.SelectFull.main.js';
import functionShow     from './Function.Show.main.js';
/*</import>*/ 

/*<Delete>*/  
const Delete = async() => { 

   
    let idSolicitud     =    $('#delete-id-door2door').val();
    let comentario      =    $('#delete-comentario-door2door').val();

   
    if( idSolicitud > 0 && comentario != ''){
        /*<deleteAPI>*/      
            let informationForm = new FormData(document.getElementById("form-delete-door2door"));           
            const Result = await DeleteAPI( informationForm ).
            then((result)=> {  console.log(result)
                if(result.message == 'Good'){

                    /*<Respuesta>*/
                        $('#message-succes-door2door').html("");
                        $('#message-succes-door2door').html('PROCESO REALIZADO CON ÉXITO');
                        $('#modal-message-succes-door2door').modal('show'); 
                        
                        $('#modal-delete-door2door').modal('hide'); 
                        $('#modal-update-door2door').modal('hide'); 
                        
                        $('#delete-comentario-door2door').val(''); 
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
        /*</deleteAPI>*/         
    }else{
        /*<Respuesta>*/
            $('#message-warning-door2door').html('');
            $('#message-warning-door2door').html('¡INTRODUCIR COMENTARIO!');
            $('#modal-message-warning-door2door').modal('show');
        /*</Respuesta>*/ 
    }
}
   
/*<export>*/
    export default Delete;
/*</export>*/
/*</Delete>*/  
