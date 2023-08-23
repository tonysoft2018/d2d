import FinalizarAPI       from '../API/API.Finalizar.main.js';

// ActualizarUsuarioAPI Usuario            
const Crear = async() => { 
  
    /*<CARGAR HIDE>*/
        $('#id-main').addClass('opacidad');
        $('#body-main-div').addClass('body-main');
        $('#body-main-div').show();
    /*</CARGAR HIDE>*/  
        let Preguntas     = JSON.parse( localStorage.getItem('JSON_CUESTIONARIO'));
    
        const FuCrear = await FinalizarAPI(Preguntas ).
        then( (result) => {  console.log("############");  console.log(result)     
            if(result){
                /*<CARGAR HIDE>*/
                    $('#id-main').removeClass('opacidad');
                    $('#body-main-div').removeClass('body-main');
                    $('#body-main-div').hide();
                /*</CARGAR HIDE>*/  
                if(result.message == 'Good'){                  
                    $('#message-finalizado-door2door').html("");
                    $('#message-finalizado-door2door').html('¡OPERACIÓN EXITOSA!<br>SE ESTÁ PROCESADO SU SOLICITUD, FAVOR DE ESPERAR LA RESPUESTA');
                    $('#modal-message-finalizado-door2door').modal('show'); 
                }else{
                    $('#message-warning-door2door').html("");
                    $('#message-warning-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                    $('#modal-message-warning-door2door').modal('show');           
                }
            }else{
                /*<CARGAR HIDE>*/
                    $('#id-main').removeClass('opacidad');
                    $('#body-main-div').removeClass('body-main');
                    $('#body-main-div').hide();
                /*</CARGAR HIDE>*/  
                $('#message-warning-door2door').html("");
                $('#message-warning-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                $('#modal-message-warning-door2door').modal('show');            
            }                           
        }).catch( (err) => { 
            /*<CARGAR HIDE>*/
                $('#id-main').removeClass('opacidad');
                $('#body-main-div').removeClass('body-main');
                $('#body-main-div').hide();
            /*</CARGAR HIDE>*/  
            $('#message-warning-door2door').html("");
            $('#message-warning-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
            $('#modal-message-warning-door2door').modal('show');
          

        });
    
}
export default Crear;
