import FinalizarAPI       from '../API/API.Finalizar.main.js';

// ActualizarUsuarioAPI Usuario            
const Crear = async() => { 
  
    let Preguntas     = JSON.parse( localStorage.getItem('JSON_CUESTIONARIO'));
    
        const FuCrear = await FinalizarAPI(Preguntas ).
        then( (result) => {  console.log("############");  console.log(result)     
            if(result){
                if(result.message == 'Good'){
                    $('#message-succes-door2door').html("");
                    $('#message-succes-door2door').html('OPERACION EXITOSA');
                    $('#modal-message-succes-door2door').modal('show'); 
                }else{
                    $('#message-error-door2door').html("");
                    $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                    $('#modal-message-error-door2door').modal('show');           
                }
            }else{
                $('#message-error-door2door').html("");
                $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                $('#modal-message-error-door2door').modal('show');            
            }                           
        }).catch( (err) => { 

            $('#message-error-door2door').html("");
            $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
            $('#modal-message-error-door2door').modal('show');
          

        });
    
}
export default Crear;
