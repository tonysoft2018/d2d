import FinalizarAPI       from '../API/API.Finalizar.main.js';

// ActualizarUsuarioAPI Usuario            
const Crear = async() => { 
    let Vehiculo   = $('#create-tipoVehiculo-door2door').val()
    
    if( Vehiculo > 0){
        const FuCrear = await FinalizarAPI(
            Vehiculo
        ).
        then( (result) => {  console.log("############");  console.log(result)     
            if(result){
                if(result.message == 'Good'){
                    
                    $('#form-face-primera-door2door').hide();
                    $('#form-face-segunda-door2door').hide();
                    $('#form-face-tercera-door2door').hide();
                    $('#form-face-cuarta-door2door').hide();
                    $('#form-face-quinta-door2door').hide(); 
                    $('#form-face-sexta-door2door').hide();
                    $('#form-face-septima-door2door').hide();

                    $('#form-face-octavo-door2door').show();

                    $('#message-succes-door2door').html("");
                    $('#message-succes-door2door').html('OPERACIÓN EXITOSA');
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
    }else{
        $('#message-warning-door2door').html("");
        $('#message-warning-door2door').html('¡FAVOR DE LLENAR TODOS LOS CAMPOS!');
        $('#modal-message-warning-door2door').modal('show');
        console.log("N")
    }
    
}
export default Crear;
