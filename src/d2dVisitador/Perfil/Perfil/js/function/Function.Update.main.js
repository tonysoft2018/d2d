import Update       from '../API/API.Update.main.js';

// ActualizarUsuarioAPI Usuario            
const Actualizar = async() => { 


    let razonsocial =  $('#create-razonsocial-door2door').val().replace(/['"`]/, '');
    let celular     =  $('#create-celular-door2door').val().replace(/['"`]/, '');
    
    $('#create-razonsocial-door2door').val(razonsocial);
    $('#create-celular-door2door').val(celular)




    if(razonsocial != '' && celular ){         
        let informationForm = new FormData(document.getElementById("form-create-door2door")); 
        const FuUpdate = await Update( informationForm ).
        then( (result) => {  console.log(result)   
            if(result){
                if(result.message == 'Good'){
                    
                    $('#message-succes-door2door').html("");
                    $('#message-succes-door2door').html('CREACIÓN EXITOSA');
                    $('#modal-message-succes-door2door').modal('show'); 

                    $('#create-razonsocial-door2door').removeClass("is-invalid");
                    $('#create-celular-door2door').removeClass("is-invalid");                  

                    $('#create-id-door2door').val(result.idEmpresa);
                    
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
        $('#message-error-door2door').html("");
        $('#message-error-door2door').html('¡FAVOR DE INTRODUCIR LOS CAMPOS OBLIGATORIOS!');
        $('#modal-message-error-door2door').modal('show');;

  
        $('#create-razonsocial-door2door').addClass("is-invalid");
        $('#create-celular-door2door').addClass("is-invalid");
       
        
    }
  
}
export default Actualizar;
