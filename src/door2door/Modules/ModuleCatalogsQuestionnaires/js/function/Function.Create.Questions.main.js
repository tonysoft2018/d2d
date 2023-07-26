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
import CreateQuestionsAPI        from '../API/API.Create.Questions.main.js';
/*</import>*/    

/*<Create>*/           
const Create = async() => { 
    /*<Captura>*/
        let idCuesntionario  = $('#update-id-door2door').val();
        let Arreglo          = JSON.parse(localStorage.getItem('JSON_PREGUNTAS'));
    /*</Captura>*/
     
 
    
    const ResultCreateAPI= CreateQuestionsAPI( idCuesntionario, Arreglo ).
    then((result) => {    console.log(result)          
        if(result.message == 'Good'){ 
            /*<Respuesta>*/
                $('#message-succes-door2door').html("");
                $('#message-succes-door2door').html('CREACIÓN EXITOSA');
                $('#modal-message-succes-door2door').modal('show');      
                localStorage.setItem('JSON_PREGUNTAS', JSON.stringify([]));

                $('#modal-questions-door2door').modal('hide'); 
            /*</Respuesta>*/   
                                                                     
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
}
/*<export>*/
    export default Create;
/*</export>*/
/*</Create>*/  
