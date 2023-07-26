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
import IncompletoAPI      from '../API/API.Incompleta.main.js';
import SelectFull       from '../API/API.SelectFull.main.js';
import functionShow     from './Function.Show.main.js';
/*</import>*/ 

/*<Delete>*/  
const Incompleto = async() => { 

   
    let idSolicitud     =    $('#incompleto-id-door2door').val();
    let comentario      =    $('#incompleto-comentario-door2door').val();

   
    if( idSolicitud > 0 && comentario != ''){
        /*<incompletoAPI>*/      
            let informationForm = new FormData(document.getElementById("form-incompleto-door2door"));           
            const Result = await IncompletoAPI( informationForm ).
            then((result)=> {  console.log(result)
                if(result.message == 'Good'){

                    /*<Respuesta>*/
                        $('#message-succes-door2door').html("");
                        $('#message-succes-door2door').html('PROCESO REALIZADO CON ÉXITO');
                        $('#modal-message-succes-door2door').modal('show'); 
                        
                        $('#modal-incompleto-door2door').modal('hide'); 
                        $('#modal-update-door2door').modal('hide'); 
                        
                        $('#incompleto-comentario-door2door').val(''); 
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
        /*</incompletoAPI>*/         
    }else{
        /*<Respuesta>*/
            $('#message-warning-door2door').html('');
            $('#message-warning-door2door').html('¡INTRODUCIR COMENTARIO!');
            $('#modal-message-warning-door2door').modal('show');
        /*</Respuesta>*/ 
    }
}
   
/*<export>*/
    export default Incompleto;
/*</export>*/
/*</Delete>*/  
