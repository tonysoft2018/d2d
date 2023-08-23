import FinalizarAPI       from '../API/API.Finalizar.main.js';

// ActualizarUsuarioAPI Usuario            
const Crear = async() => { 
  
    let Preguntas     = JSON.parse( localStorage.getItem('JSON_CUESTIONARIO'));
    
        const FuCrear = await FinalizarAPI(Preguntas ).
        then( (result) => {  console.log("############");  console.log(result)     
            if(result){
                if(result.message == 'Good'){
                    $('#message-finalizado-door2door').html("");
                    $('#message-finalizado-door2door').html('¡OPERACIÓN EXITOSA!<br>SE ESTÁ PROCESADO SU SOLICITUD, FAVOR DE ESPERAR LA RESPUESTA');
                    $('#modal-message-finalizado-door2door').modal('show'); 
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
